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
define('DB_NAME', 'lsdev_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '{73TiY*KY~zOn4G;%X>@;!E]Gov9aL-AZE<mE(z7Ni6Xs%>(nV-sC+N^y!EJ~~@}');
define('SECURE_AUTH_KEY',  'X0p-,<l6~#w|`,:91%aS2c,4|/0Myo@~0TDUm@2],0yq^&n@1R;R|a||&Gk|6{!G');
define('LOGGED_IN_KEY',    'Iy9DBn{:5o+n#7/Nc4y%l]Bd|OJ!ym%EdEeqS8Ge6Cw{OJ8uF4}*<wdH2TQm+ u&');
define('NONCE_KEY',        '[95bW~3IC/Q)]LChIZP._D8*|lQscTk,XlT+ .;rg{.]R%`o#8pwl^]x`|Je{ `?');
define('AUTH_SALT',        'Y[@{<zAj,phO-D4,z8W[~>G!{}u<fgPfNO-CU.r0$_1vV+)9^ELj+A<p9h`E81|P');
define('SECURE_AUTH_SALT', 'zi:~J8MAP8}?2etVtkv-}Kf`* TzwG)M|7D_,gT)6MBb+9rm/jgG<?t;G[-k`z/j');
define('LOGGED_IN_SALT',   'hEf=X!b.p`J<+.$&=ahM1w#93R)Yav(5K `n@+@<O|yr_u0Ry{*Cs3ALe,b2+@:b');
define('NONCE_SALT',       'S3V4j0.dYE<@r|z)iyOE?<Vh$mb_&&t&s*[].cB;]->W(cYI)CYq!Mr,eW{}53qF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wplsdv_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);			/* turn this off */

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
