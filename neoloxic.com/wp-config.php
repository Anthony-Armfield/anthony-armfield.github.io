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
define( 'DB_NAME', 'aarmfiel_wp1' );

/** Database username */
define( 'DB_USER', 'aarmfiel_wp1' );

/** Database password */
define( 'DB_PASSWORD', 'T.mEcbo58A6PFVbVAHb05' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'G8U9pkr1YrCIbkpUwJYeTxe7eLcyqRwbl48ThdyeXmtALUj6LoL0AIYTc91W41o2');
define('SECURE_AUTH_KEY',  '7s4qQStS81HudjcD4RYAzJHWgqV11eFn0ITuZT8qiS8DT8fSitfJTAFRIgDhlJaH');
define('LOGGED_IN_KEY',    'PWznZl7fhrMs5BOe8KeSXfb9vtSavq9BGmpRQTrWLFpjKU7tcNFKu2w8ePHz2Fn3');
define('NONCE_KEY',        'LptmQEXMGJuh5ccZx7uAbvSy7IecWCukxzEedtiss0enVWY67GqWOEkgUB3x9u0Y');
define('AUTH_SALT',        'ZdVIU6QwWvHDecadm46PbRrWwoC0anX4E4xQV2AqrW03hz5N69WyPNekCbPfao8P');
define('SECURE_AUTH_SALT', 'CUvT7KfErfjP7NjgyP8qJwu9FuBzL3oRltZnNzmV8LxKTPSsdfkEZ2qjuylrNYzZ');
define('LOGGED_IN_SALT',   'EuTDMeQqSlldWiegvprt7APmUs5aY7Yz6CZkMsBKsqsygeXHMUWYEXvN6UAvcHmR');
define('NONCE_SALT',       'wVhQLrPGtllHhSu9DRV506AzD6R4d2jX8hRtugMEV4lGZHA6YM73uCJ0QrQ1JRHT');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
