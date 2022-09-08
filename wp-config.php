<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'groupdev');

/** MySQL database username */
define('DB_USER', 'wordpress_user');

/** MySQL database password */
define('DB_PASSWORD', '__change_me__');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'IYnHEGjaiZdwMyDcRTPsgmXsyPNzAb1OE5IznLVLDxIXi61gUnbLMSIV3G6rbOib');
define('SECURE_AUTH_KEY',  'kPMVA5Hj11ibYZluzEF6Uw9LDGeHnR5p04pRiEn3Mbz7E6gep0PeLFRH5zV3Wgbl');
define('LOGGED_IN_KEY',    '7DsAti7Ai7g5LvnuLiivEHbfdLGPTEQAZhhEzKXlpdkKiN8zlNJwHUlc1jEmPyka');
define('NONCE_KEY',        'IDnwC8JpfNpZykQXPSt2xn4UPbo2v1WZPVKjLskIkUEKsCjHz3HukY2Sc5sBuCnt');
define('AUTH_SALT',        'b11K9nFwtZwg6wuBfgaErAn1qk7MKTUsZmyDyQRA0lPpYhfJvVfwUv9z38761xBN');
define('SECURE_AUTH_SALT', 'SPW5R9w0dww1kjXdZMaX39X0NVVpQzVI8orUUbKij65V16lpJKCnRajx3BAfE4QL');
define('LOGGED_IN_SALT',   'orpzBAXeOpFTBJswD7XWuOzJcWICp2VXW2hfpIFPkhyHpElrBkxyZchp0XvBMk4M');
define('NONCE_SALT',       'EJKy0h0yQiOUEp2l05LX8Y0l8bbDKx56wJrM8leM4BxANdBBHOwyYftwq8cqyzql');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'es_CL');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('DISABLE_WP_CRON', true);
define('AUTOMATIC_UPDATER_DISABLED', true);
define('WP_AUTO_UPDATE_CORE', false);
define('DISALLOW_FILE_EDIT', true);
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

// ** Redis settings ** //
define('WP_REDIS_HOST', 'redis');
define('WP_REDIS_PORT', '6379');
define('WP_REDIS_DATABASE', '0');

define('FORCE_SSL_LOGIN', true);
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
	$_SERVER['HTTPS']='on';

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** Allow PHP upload plugins from WP Administrator */
define('FS_METHOD','direct');
