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
define( 'DB_NAME', 'gojek' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'wdv?t(#p5NB9gB2hD, #>*d )$24Y;K/F<Rrdkn(fGdUF663Y^^n{: ZQ,ibl?:.' );
define( 'SECURE_AUTH_KEY',  '8De0Y0JtEhA:liNS95?wo0{B8S,JH:xFH6=r2Q>[4wx!N`d_2AZ|v2p/#p/Tj5I)' );
define( 'LOGGED_IN_KEY',    'qqmJ}G1m]f5wOT3$5>y!&_C!:[q_WE5)~nHg)J1V&([J<|uf;#.%*,PLH$?:7z! ' );
define( 'NONCE_KEY',        '72rfz#X}EMg%%_ip.u?~fa7d|`rJ0TE6_=lTUR+}@g,Vm?+eFZ/]wX;w}jn*dw6i' );
define( 'AUTH_SALT',        ';Sx8J>:-jQX~YyN/,B>~^6HM:a;@lr>{f^%t#G?m(FtH&DYj$c:1;JD|{2nXqJ!$' );
define( 'SECURE_AUTH_SALT', 'bfe0Zd3ic-&~fw@8fh!Q_|w|9 !{7%u&Xm++XE:-G2d12v^$_4p-b)Y5LRz=8T^S' );
define( 'LOGGED_IN_SALT',   '#yYF} .V<ZynEG-ET*98>.J7BC!^J{F6=UY|N%#H2 e<xN%=$)3/]<W^:H!cA|RE' );
define( 'NONCE_SALT',       'b4;COKab@9IrAVppwKV:mV?du2ad2YhK.a+%PHAGJj>w-Ai!Q(3le{nM/Z/s1hgE' );

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
