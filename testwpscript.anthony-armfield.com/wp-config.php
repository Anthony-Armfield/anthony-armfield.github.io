<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testwpscript' );


/** Database username */
define( 'DB_USER', 'aarmfield' );


/** Database password */
define( 'DB_PASSWORD', '@*nbEgS8gD' );


/** Database hostname */
define( 'DB_HOST', 'localhost' );


/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );


/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cR#|%`7l^Vl!r~$2No0v,h84M/wnVT}wb{-B6@JEMOc|$[YoZQH@!^i2GZbRTIvX' );

define( 'SECURE_AUTH_KEY',  '.X4_xbpV3K A@8GK`])Y(s2y&`n:VJ*i^F|Dc]H;r`<YHOI.O/QC1A0CmN++3BYu' );

define( 'LOGGED_IN_KEY',    'nP4Cz3]Zl+Y.K&@5Hqe(4,YQ#50Hw(5ds]nOR* 6z9mA=YhK*AOS>d9-d{K%?D?0' );

define( 'NONCE_KEY',        'YQ;$~H-w@^?G@r/@y{gI6)AyWSxNmW15hZq|EI`bZ5#%_`=&b:Z{](2AH)c:Yy1C' );

define( 'AUTH_SALT',        '}doVb=$;SsBVp3yKiz-XVc3>CawE8%#]a:[:?(xXli|ql]zw1x/,K.!-o1+UV-c{' );

define( 'SECURE_AUTH_SALT', '<xgQ^%?stkU.1l9rIn/]z)70kdkwi~[:6MHJq4 ufWCH8v=K+P=BGY22]Z[2Dr+y' );

define( 'LOGGED_IN_SALT',   '+!m,rqQ%/Kud.J*{).!3nZzr1^g-niZRsQ_cL/Z.vM>:)FFwx%o:fiQ_~6]V?O9(' );

define( 'NONCE_SALT',       'diC?UN9CsqFqz G9Q0o$ zHgQp7lTlt% iB%q*SCh}#8^@=Q>}kh>umx3<Ir@z.k' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_testwpscript';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_ENVIRONMENT_TYPE', 'development' );



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
