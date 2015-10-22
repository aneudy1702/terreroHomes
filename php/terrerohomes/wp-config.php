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
define('DB_NAME', 'terreroh_wordpress8b2');

/** MySQL database username */
define('DB_USER', 'terreroh_word8b2');

/** MySQL database password */
define('DB_PASSWORD', 'sYQrFPbEp3LU');

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
define('AUTH_KEY', 'QYsOyB%aVS^^^A-kLM$%W<]UDLHhpkf+Bk]hjbGNxPqSFKeD-()SZ$KoMKDfepj_fkk{OUucpcdetrXDLBW<CV&ONi$dN+H$HQsn-lB@yenwsO]%%APTlYa-_gtl[Tc-');
define('SECURE_AUTH_KEY', 'dhiYZcjQPC+xl!El/zIUMV&z=*dX>@dsR$)XI*-pF|<iuBntk)l]WyJWvsN?w@u@dvsno$aW[ScErOG>P]Z?YFNH%_;a|jUbF)wR&;MPKmL}Wf<Fx=Sh]}vnC$e]Rt[Y');
define('LOGGED_IN_KEY', '?}afJOf|^Gb|t]/;_ub|/tuj!Z<mODeeCQ@eMg%;yceBz<!mQ<<PowDJi=Nt@RO]L{<F?LZxB-wx=y/AAZ|n[OUwIc{EU)(IYi(&_T=*OEh[]ZCBJGJ!a_m]nUY;EBP=');
define('NONCE_KEY', 'Nv>GjLM%[^BbHI)_Q(U)fp!NC[I<}Hw=DX>|q@|E)p?/>!v)zm_VpctEw_NEM+o{$)Dl(Yv${;_iBrG]w+w![VW!|Gxm<-IU^(hy=AIK[ait-PLIL++mHqw[W}Rxbwv(');
define('AUTH_SALT', 'eIAM)aNbkwJKoFkf$Hco$}J&D(rX)*QZUSG_oH}zBXWtkLH?{N$S;AggmZLu)&UCc;oJYGEjhfO>r_z]$&wRiuVwfEbstF{sfd&NqtmvzoPR/RnZGp/g*RkDS@nXw<Xo');
define('SECURE_AUTH_SALT', 'TVI$Q-!Ime_]*zE?&EK/DUdV_fjJO&-[zw[J^Gw?{c+L?;GpwaTOwz@RHg;w{ytKcWR>G]gha!UuqX{FmSQ<wOba?+%b)n;RV-son?<q&yT+}D{$CNCYf(!nF;OJN[se');
define('LOGGED_IN_SALT', 'rvl(=Xo!WjHj_$zaSL$}Y>XLfTz(v>_!iW(>EC_EBZ$^m]$w[}$e@TtxilBqvYaMQ_G!i);C;DcEsB;f<F<Dqpwt^qPGAHj^l/&jF+aTmNl;davDYp=SKE?]KrhI(EV|');
define('NONCE_SALT', 't_Icb[Uj*dK-PEm*nKFlx;Y(^yKkrmdgNi(Z^{a{e>_O{k<p*VVnQo{p/o<QRYbzhP(y+o!>iLT/i}XXla;W|&*IwQy<}VNFLHICIk(oqmdQbIIBhS$-Hd$U|W]vcpib');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_rshn_';

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
