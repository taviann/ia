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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4IbcD{Pl]z1i? I!mB&*{Lb3,FV98k#4eDY=rLC<tWcaZ)N*mDJA#PPR[O=3aP>K' );
define( 'SECURE_AUTH_KEY',  'E*`Nv-oMczFGW*Q@etVoVy:)|e{m/bTy--.=}ACt1|{4Nw4@ro>7/_90}c[L/!X5' );
define( 'LOGGED_IN_KEY',    '0_xN@L~5,(lzXV)A+(]y@fx/ru6u&A{3yZzvZo^t^O!1D7kJd&$ex-7&dF0!>J2@' );
define( 'NONCE_KEY',        'N@WZ{N9z*;@<T>FO{_&S.%0KVF!>.%}g4YBYoVfvosYEu]04/pQj;ng!`D`aC]FS' );
define( 'AUTH_SALT',        'oslK`*}|dYp|UcxK2VkW56EmyoHPm?J=0lb,,`vn`<m~Gcn.?&O-I8^&D_b*RL:*' );
define( 'SECURE_AUTH_SALT', 'QsfaGZJsPx<tvX>8Wus_m)%qR6%L2 a?IrRVP[C6xEF{M:}~3[+>TWg#Gw01gP6~' );
define( 'LOGGED_IN_SALT',   '&S_QkqkCb/Qc3`Q5SiS.Wz:<Mi&)Xfm7_>ow#VrIHKf@B?P+=+GT,Fr#H>{b=w*H' );
define( 'NONCE_SALT',       '>P]cBO~,5n:$A$`Br5*]1Fht,9fjz:m[=FrUpMC|@>ic~~, )1 <:A3Xm|DPy.!M' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
