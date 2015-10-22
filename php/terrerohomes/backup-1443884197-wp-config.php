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
define('DB_NAME', 'terreroh_wordpress270');

/** MySQL database username */
define('DB_USER', 'terreroh_word270');

/** MySQL database password */
define('DB_PASSWORD', 'abe8OAHGKfvQ');

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
define('AUTH_KEY', 'fg*b?CvpZEi?bU|O??$U<@M*GL)lDcR@FXieBmsCD)!R$a*L;Zmcsp!Y=ZbEpU)LUY^Xl+!ApC*vYPhaHrGwRcZt-y-x=XW_W>IWEc[;lw_-QTWPGTVpvQKhU+PPaz{[');
define('SECURE_AUTH_KEY', 'rQh-s?NcCd|ssWdyZR[{|Kefn-cdBbE=P+}(q[{xt%?q;?SA$%V|Il/OG%Z(*)l*YQ!_q/JJMCY/(}BnUZy==)QtbQXo[lK|a;WAVGyOaJo$eIdzaq)Diu&ZhOxZ})mw');
define('LOGGED_IN_KEY', 'hWc%O[ngD}[wPz^wchV@]McIMNweeBoH(RtE%kFW/{o?j&|%%&aizb=<uS;uG=leT+G{NF<|dOe/R$dal{xzUQ/H|;$VXGr%Lcr|!>/DK*$_+vdgz<+ZYw;HX|y_gOKz');
define('NONCE_KEY', 'F<H}BKeS/qBHyAQ/qW{}GAKtUEQIqxQts>$nIjTrXKB&AZggwVR%Mep^qwuS=OyWQ?KSXnK>BLhtdSkfLZnink[nm!K)HVhXizHN-t){xwP*}dc<ZGnAnfaTRcTivHSJ');
define('AUTH_SALT', ';A/dYULYzZ$y)zcT=H|]@dmUCkI<hKv[tRVbrxJhtR+f^/}BBqB-yHz)v@dNHe<neC<j*%{S@_AW*%+j{Ml>[YWWGpbYU{qkB$S}KYi%tP$$(K?BUp_&aNc>cf?oyBko');
define('SECURE_AUTH_SALT', 'Dy>rr^zCiI(nbqdZcWC<Fxt[>Wd?X(V?Ku{=-pMUfoAl%C@UNdgd>&pJVe^bOASZVZCk!=oZmMW$xYZAyeem*LrUSrP_|DZI!Lqp{^@RrFxe}y&@^)BIX$-uVYQ=WCwx');
define('LOGGED_IN_SALT', 'y;GYkaf[ok=lBCa{+cvi-k;bUpBnUgg(pI)Apj%ya_<s^b/|qyqvkk|[hD!M<wVy)ceMS{e-ls@Gc^jGZ!_tGSHzL-^QuOgf&ye*bfZ|hMF(_k;F}]TN]C]fZ&SFRi?h');
define('NONCE_SALT', 'gYTSd!IESMmBhLYxJoxrybEGYvSz/LCd*ckl$@?*_fdf+>EU%*d-K({%kyDuh%JUnz[kXrG@gryybwCTZH>a}qzHW=/z[drt<yIKhIR^HT>EgzelW%o|RYyLU;P?B?rO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_uwgl_';

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
/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
