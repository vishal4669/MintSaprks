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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newsam' );

/** Database username */
define( 'DB_USER', 'live' );

/** Database password */
define( 'DB_PASSWORD', 'Live@#$2022' );

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
define( 'AUTH_KEY',         ']waf%eJ5U2B:OvI>/U;Y ^+YF0t#L2DFK@|4ic%g`?|]A?|;TIV=w>Jkt]%^(1G9' );
define( 'SECURE_AUTH_KEY',  'PptG#3Wh+v,KL?89UP)1u85.-,qtiY)YZUifWRzT/7E<ryh>H6lmM%5Y]^sEA{Qm' );
define( 'LOGGED_IN_KEY',    '$vod[i!%W0ed0:GP?,kG=+Io35eN0W+T`o(>}<GKf[WUAu?JzX|?g9O!O$k^Bbyk' );
define( 'NONCE_KEY',        'ZbhuSRAX@`jit)Ty[CbKbdOjRRT&<mpY#UtQLB&/9SyhX%!^s.E4Td,|{n])lh^v' );
define( 'AUTH_SALT',        's&BKp85^q{?7ygWO/l}UfO}Lp*L^9tmAsI}IW+}2IFhuZl+7nSG5:rl}@{gC]JA=' );
define( 'SECURE_AUTH_SALT', 'X-JGc0FF5imrCGN%$cbFAjRs{_$s~d,tEf88tp4$!SQ|cjqzk>t/kf[v#V0M-Oj>' );
define( 'LOGGED_IN_SALT',   'uFptrl*Ar;WI5[iUZyIUlYYVy^7MeX# U>f,1o:4yF,j|rwS@FE_q8DF$x,-x$^Y' );
define( 'NONCE_SALT',       '++4I}FrL2@kTT-<umqevi~|e&75|Veyw$Vxmur@;5vwIXhQ1@]K(7wB@5(KK)? ^' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
