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
define( 'DB_NAME', 'woplab.loc' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '6#6jvS#1p/f(d,=w<(o}v}L0Q0nEHFSHe${HERQM6c0#6i{M1K<br~dL=nMJ(t-o' );
define( 'SECURE_AUTH_KEY',  'hB#6Kf?A>MTe)XKDw2^ML0k7^}Fwg4$m94a%asd1d5iAWt~KOrs1yQP<meDe!Xu~' );
define( 'LOGGED_IN_KEY',    'FkXYEq*_b,ohy:JBxM&Gi;4=$^:s<kZF!K1M`pxtGWm;UO;/ t$mCkH|L%%F<}=]' );
define( 'NONCE_KEY',        ']t]Zc}7v<L5&X3),Yi=`YFL-c3oWT?6Xi0d#@8O>Mc@nO!K9{C*DUWy]ZPPJOmLb' );
define( 'AUTH_SALT',        'KRzvw%c[P8cJ_?T<XQ~NPkcV,HV(#stNG)Z!rItY6`)2!sIWQSPM6-@7m]MBkc13' );
define( 'SECURE_AUTH_SALT', '0i {aW!PbRx&^;bP?~S`^u@Dca4Y=XF@=oVAsN{`1^k}tV:SugJ$_2&;s8Pl$[(q' );
define( 'LOGGED_IN_SALT',   '$>v(IJ)5$PRM=ln1YRWM*nfw*{7[qwo*9ukga$ZZSp>qBs4ps{/@56/#EkphJ!}$' );
define( 'NONCE_SALT',       '*qj.v%oC,>vd~OS0DHr7K[![s&I0Z(GU-`,INs&im1PdG:O.9u8OL``0>FZU.qxU' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
