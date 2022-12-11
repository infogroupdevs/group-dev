import gulp, { watch, series } from 'gulp';
import connect from 'gulp-connect';
import plumber from 'gulp-plumber';
import findPort from 'find-port';
import browserSync from 'browser-sync';
import sourcemaps from 'gulp-sourcemaps';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import cleanCSS from 'gulp-clean-css';
// import pug from 'gulp-pug';
import imagemin from 'gulp-imagemin';
var rename = require('gulp-rename');
//import htmlmin from 'gulp-htmlmin';
//import htmlbeautify from 'gulp-html-beautify';
import del from 'del';
import webpack from 'webpack';
import webpackConfigDev from './webpack.dev.js';
import webpackConfigProd from './webpack.prod.js';

import iconfont from 'gulp-iconfont';
import iconfontCss from 'gulp-iconfont-css';

import uglify from 'gulp-uglify';
import babel from 'gulp-babel';

import minifycss from 'gulp-minify-css';


let fontName = 'iconfont-cl';

let server_port = 8080;
findPort(server_port, server_port + 10, function(ports) {
	server_port = ports[0];
});

const bases = {
	src: './',
	dist: './',
	prod: './',
	docs: 'docs',
	assets: 'css'
};

const paths = {
	styles: ['scss/**/*.scss', 'scss/*.scss'],
	css: ['css/**/*.css', 'css/*.css', '!./css/*.min.css'],
	js: ['js/**/*.js', 'js/*.js'],
	img: ['images/**/*.+(png|jpg|gif|svg)'],
	fonts: ['fonts/*.*']
};

export function connect_server() {
	return connect.server({
		root: bases.dist,
		port: server_port,
		livereload: true
	});
}

export function sass_task() {
	return gulp.src(paths.styles, { cwd: bases.src + '/source' })
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.init())
		.pipe(cleanCSS({
			compatibility: 'ie8',
			level: {
				1: {
					specialComments: 0,
				},
			},
		}))
		//.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(bases.dist + '/css'))
		.pipe(browserSync.reload({ stream: true }))
		.pipe(plumber())
}


/*
export function css_prod() {
	return gulp.src(paths.css, { cwd: bases.dist + bases.assets })
		.pipe(cleanCSS({ compatibility: 'ie8' }))
		.pipe(gulp.dest(bases.prod + 'css/min'));
}*/

export function scripts() {
	return new Promise((resolve, reject) => {
		webpack(webpackConfigDev, (err, stats) => {
				if (err) {
					return reject(err)
				}
				if (stats.hasErrors()) {
					return reject(new Error(stats.compilation.errors.join('\n')))
				}
				browserSync.reload({ stream: true })
				resolve()
		})
	});
}

export function js_copy() {
	return gulp.src(paths.js, { cwd: bases.src + '/source' })
		.pipe(gulp.dest(bases.dist + 'js'));
}

export function js_minify() {
	gulp.src(paths.js, { cwd: bases.src + '/source' })
		//.pipe(concat('application.js'))
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(bases.dist + 'js'))
}

export function css_minify() {
	gulp.src(paths.css, { cwd: bases.src })
		.pipe(cleanCSS({
			compatibility: 'ie8',
			level: {
				1: {
					specialComments: 0,
				},
			},
		}))
		.pipe(minifycss())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(bases.dist + 'css'))
}

export function script_prod() {
	return new Promise((resolve, reject) => {
		webpack(webpackConfigProd, (err, stats) => {
				if (err) {
					return reject(err)
				}
				if (stats.hasErrors()) {
					return reject(new Error(stats.compilation.errors.join('\n')))
				}
				resolve()
		})
	});
}

export function images() {
	return gulp.src(paths.img, { cwd: bases.src })
		.pipe(plumber())
		.pipe(imagemin([
			imagemin.mozjpeg({progressive: true}),
			imagemin.svgo({
				plugins: [
					{removeViewBox: true},
					{cleanupIDs: false}
				]
			})
		]))
		.pipe(gulp.dest(bases.dist + 'img/'))
}

export function images_prod() {
	return gulp.src(paths.img, { cwd: bases.dist + bases.assets })
		.pipe(plumber())
		.pipe(imagemin({ progressive: true, interlaced: true, svgoPlugins: [{ cleanupIDs: false }] }))
		.pipe(gulp.dest(bases.prod + 'img/'))
}

export function browser_sync() {
	return browserSync({
		server: {
			baseDir: bases.dist
		}
	});
}

export function browser_sync_prod() {
	return browserSync({
		server: {
			baseDir: bases.prod
		}
	});
}

export function watch_task() {
	watch(bases.src + 'source/' + paths.styles[0], series('sass_task'));
	watch(bases.src + 'source/' + paths.js[0], series('js_copy'));
	//watch(bases.src + paths.img[0], series('images'));
	watch(bases.src  + 'source/' + paths.img[0], series('svgToFont'));
	//watch(bases.src  + paths.img[0], series('fonts_copy'));
}

export function fonts_copy() {
  return gulp.src(bases.src + paths.fonts)
		.pipe(gulp.dest(bases.dist + bases.assets + '/fonts'));
}

export function fonts_copy_prod() {
  return gulp.src(bases.dist + bases.assets + paths.fonts)
		.pipe(gulp.dest(bases.prod + bases.assets + '/fonts'));
}

export function svgToFont() {
	return gulp.src([bases.src  + 'images/icons/*.svg'])
		.pipe(iconfontCss({
			path: bases.src  + 'source/scss/template/_icons_template.scss',
			fontName: fontName,
			targetPath: '../source/scss/utilities/_icons.scss',
			fontPath: '../fonts/'
		}))
		.pipe(iconfont({
			fontName: fontName,
			fontHeight: 100,
			appendCodePoints: true,
			normalize: true,
			centerHorizontally: true,
			prependUnicode: true, // recommended option
		}))
		.pipe(gulp.dest(bases.src + 'fonts'));
}

export const clean = () => del([ bases.dist + 'css', "*.min.css" ]);

export const clean_prod = () => del([ bases.prod ]);

export default gulp.series(gulp.parallel(svgToFont, sass_task, js_copy, js_minify, css_minify, browser_sync, watch_task));
export const start = gulp.series(browser_sync, watch_task);
export const build = gulp.series(svgToFont, sass_task, images, fonts_copy, js_copy);
//export const prod = gulp.series(clean_prod, gulp.parallel(css_prod, images_prod, fonts_copy_prod, script_prod));
