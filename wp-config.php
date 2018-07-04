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
define('DB_NAME', 'aktproject_legal');

/** MySQL database username */
define('DB_USER', 'aktproject_legal');

/** MySQL database password */
define('DB_PASSWORD', 'Legal@2018');

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
define('AUTH_KEY',         'j>-}AzEs{E:-}$xVg.?WOHM2fI/?zz(|D=W3 A$ y)9R_HS*!Z*1WlNb;N,o5tB@');
define('SECURE_AUTH_KEY',  '_N&g<Jd~Wi]8}gDF3tw2i]JPoR1L+]<]Xy)q+lfj2s>?.niB:w< ;r:({M&0p#0H');
define('LOGGED_IN_KEY',    'dhg)(6(ae#3CfN-VQd,mkaQMZMKIb]bEpAz2.&e97y KlKK|qKLg?FCwtMSK=yz@');
define('NONCE_KEY',        '>|fmXD}]ktC@9Oa*]jyPh7CaXq`v@jFs-.N3w M?Lb}dJ4*pjI%@jP(<r[wxKk^O');
define('AUTH_SALT',        '[&3_sru?|hpw52v;0k+V8axtlnd YrH!6Jv_n3^[kg%%5BdMe)5(5$hxBF>s{|+!');
define('SECURE_AUTH_SALT', '>l?~u{|tI?f;?N29v&kWB~bQ.xsp4xxU=_NpZf-wS9kpB%W`9B<d+$`>/lK*BX7G');
define('LOGGED_IN_SALT',   'a4 |LakLNOTe~6kvTW&gUHBS6LBY9?f`7(~gC*]]yviZXf*Jd5GH*uY<!!F7%gnF');
define('NONCE_SALT',       'aT:@#>6B~,1wMF-dH.As?ET=sr4pi)#9Oe5zT=F;vU^FDT1J]h(bM1slwfn@*`ln');

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
