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
define( 'DB_NAME', 'blogwrodpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '0123456789' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/** Add here*/
define('FS_METHOD','direct');
define("FTP_HOST", "localhost");
define("FTP_USER", “wordpress”);
define("FTP_PASS", “0123456789”);
/** To here*/
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'o/K!An0=H^DNm`tX9&qO|QA7$A^=&c>-!?(GGJHYwUq[9V2DNs}Dd;;VCwj!,CI7' );
define( 'SECURE_AUTH_KEY',  'M{2sq-T!-rbn~SM+H,!ki)s=UX6;F Lf{5%9M2NR[`$#lh]j:x3l/[ac;D_.4^-#' );
define( 'LOGGED_IN_KEY',    '5Zivq+:&5f6GW{I-Bi72#Rt^Wy@{K~V]fq*QyWoTHq$o}BxOSuzU<DJ$4I!wyh-^' );
define( 'NONCE_KEY',        '` &wWoO_/A2eDn$yDC*U(h()5(H[,3VDEW`HXhAcpyzb5Pq)rlo^sT{$g)LO&-4}' );
define( 'AUTH_SALT',        '=*dw6UHh)m4cl+t=akowDjC[u:l5m(bIhDl15n$T5*97`qJ~{&#fgcmA3^pYz,;W' );
define( 'SECURE_AUTH_SALT', ' @v4qG!ZYj)f7cy&`40@GB/}96C-tPRUX2~/F=[t]:|o!)Mu_V#^o)]7=BPGt%2x' );
define( 'LOGGED_IN_SALT',   'eW{fFovzD/<whC$P?,l`C-bp19]N4tBch=!cUI[!D[/j)0EjqG+p<3*ljQN]KMs/' );
define( 'NONCE_SALT',       '58}p|Aj*O{/nS=e|QO#.N7 K4=b:`=B5X`^,?3GB0^MApG401`lu{>I=,>2/!0l%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
define( 'UPLOADS', 'wp-content/uploads' );
require_once( ABSPATH . 'wp-settings.php' );

