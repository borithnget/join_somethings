<?php
//END Really Simple SSL
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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\wamp\www\join-something\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'joinsomethings');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'gBimGU(h4!Ut7n@RL):8BxHoQiT`$1sxVHcPM-h8ZJX!tW!7SkiihnRRV/]B(Fw0');
define('SECURE_AUTH_KEY',  'SW?vte{Ab1)[RqhMEaIY1!ap&OXw;!DD$15RfjZ>9JZ9=JkQK_3^Pdux(FX3*7L1');
define('LOGGED_IN_KEY',    '|KeXd1Az0Vtv-kk5n@Kg)w%_kQ@G?ob>@&Lgnhtx8/v.du><~*:R,n,u]AX=3L&c');
define('NONCE_KEY',        '~:hTU,/I(&^{hHilOn# jIX]GTQ]B7v E?$g?[) G,{N.k6A/+[~!(|tcSpCpk>1');
define('AUTH_SALT',        '3WW51O:q`BwSj!]snEXS%.@Cb1M;MWOz/^AE8SJY#9ZBn<[ZN.C 8jR9BllmdGtK');
define('SECURE_AUTH_SALT', 'THm1A:Elce6.tiY>-P8CSmqk,}.1FIROh;^j|)nUPw-|!%3i&;FmyhT=$(21Id0w');
define('LOGGED_IN_SALT',   'K=uwLjF)Y5Z3:Lfh`Fx1kw&{8I!L`!A^I(f{Aa+M<JJk4^K1a?w)RBhILw}jeXf8');
define('NONCE_SALT',       'o0s~N]/z>]YE/ODZd d;)fw7x/TWyey4k,n =+%wLkz7K(r5|?GrpYgctI_Vt% r');

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
define( 'WP_AUTO_UPDATE_CORE', false );

#force https add to wp-config.php
/* Allows IP to be passed from remote host to server */
if (isset($_SERVER["HTTP_X_REAL_IP"]))
    $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_X_REAL_IP"];
/* Allows SSL request to pass through nginx proxy */
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
       $_SERVER['HTTPS']='on';
define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
