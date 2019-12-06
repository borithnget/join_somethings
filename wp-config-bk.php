<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'themepug_wordpress');

/** MySQL database username */
define('DB_USER', 'themepug_root');

/** MySQL database password */
define('DB_PASSWORD', 'Pa$$w0rd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'JWrVoq3(LFezE91|hyKJ)epX!I.x~&{B.V9rG0l%3#(W-9bJIj%6E *%F0tx`:<=');
define('SECURE_AUTH_KEY',  '~5=5$v3$mn(eoEtIVq!w`LlI5R}MexfCb4TJmJi(V|ulOqs>CzsFyX!OWOmUMNb-');
define('LOGGED_IN_KEY',    ',-<8p{G=TN9G4 /n~8U<Ha3oj[EryKd:ze#H;<rnUp:{?O?TDPwL,<D~J<`GeA=M');
define('NONCE_KEY',        'V? MCX^vU!OC`LI[.LsCdR|uSevW}A:+nG~H^8;kG j&)q*f0~*R;&<cuR?+/ ly');
define('AUTH_SALT',        '&x EbBG]t|o5QnXVdSVUm62,Bf~GXIDcn}lM#AfW-zSJ,1p99]>i&DD7Q21E-YDx');
define('SECURE_AUTH_SALT', 'a~owuBSu {2im j6K]u~Kgpo~$N>=J.?F_Th>oY4V6UVl5T=Dym`~J7iC#!PdZKS');
define('LOGGED_IN_SALT',   'GQ*Dc=&{><w(@db^IAZIv1:an4oduh2t_n88UA9eq2:@+OR.08+>ErylZdxr(Fal');
define('NONCE_SALT',       '-#as.!R$YK(QTsSyPU<ME/}>/YORO7?3R.S`euOPFLyB{|.cyI|>0j5-92mM@B30');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
