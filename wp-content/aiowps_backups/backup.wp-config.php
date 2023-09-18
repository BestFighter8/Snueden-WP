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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'web69_db1' );

/** Database username */
define( 'DB_USER', 'web69_1' );

/** Database password */
define( 'DB_PASSWORD', 'RmN5Zj3zxyow2EpQ' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

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
define( 'AUTH_KEY',          'mo<GPfnc8^<tUZl20BpLBG<$k>ft#xlS6SDA&C1q ~x_gs=z+X:>Mog3JY>fb4``' );
define( 'SECURE_AUTH_KEY',   'TzO]XFU=3AxTP:#VG{n0/`8d*.^i^4E};62Pkvf1|Mpb[lJmt3Ff<hC!.=IFy?=h' );
define( 'LOGGED_IN_KEY',     'Zf;28}2t8-y8*}bu_!5kXQ</Ap[yl5pV|(2MVoFH7Wm!PT:|.FC(UxGSw{`704ik' );
define( 'NONCE_KEY',         'Z N`0Z_x?n{k{:sH?uk>mKB VE#ez&~v=*w5Z0Ww8n[zS1B]?F[)X?J.{aKQ_ZzN' );
define( 'AUTH_SALT',         '(3xjyAqBwM|3:H8]9FTb({`kdr/V6M_n/jXMrog(<d5q1-|pO6G%?%$HVm5a*u0D' );
define( 'SECURE_AUTH_SALT',  '~kfGX}XNGOESN(1=~CL>9{]%h dDafU3Z[)_DD+|`2|&z$EQChOOe)Nl~*XN&Vb3' );
define( 'LOGGED_IN_SALT',    'OznwWV;ElF?mhsPD=dumsgB<14pwupPkak6|c:w13n3<2fbH4b71dP;/b yKmuK.' );
define( 'NONCE_SALT',        '0OX{A!9}=z;Pqde)av?p|u9AFI.[>#&sAdcZF/LQp9zLPkW^4w&g2SV2@Pf? JUt' );
define( 'WP_CACHE_KEY_SALT', '6X4u_L17=`^?]Y_)j0~KC;vfj[3vGHz5kX(f!`rYs&`^Q>.mJ >&{HgxPEtwi+m[' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gowp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
