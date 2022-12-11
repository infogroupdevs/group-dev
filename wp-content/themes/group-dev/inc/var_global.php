<?php

if (!defined('PATH_INC')) {
	define("PATH_INC", get_template_directory() . '/inc');
}

if (!defined('UPLOAD_DIR')) {
	define("UPLOAD_DIR", wp_upload_dir()['baseurl']);
}

