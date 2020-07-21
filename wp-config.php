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
define( 'DB_NAME', 'tsayg' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'p^@|iGV-]Y-<A&45yhpi[ZD|tW$yO=ZAHg).kSax^|aoaNzzqw&2QbJ?kQ., 8of' );
define( 'SECURE_AUTH_KEY',  '0F=x{YF`0,T%V#[PVh=ef^01H|O$Y^IkW`m]sbH~Z&^0;^m*B(iW9NlkzL(cNet:' );
define( 'LOGGED_IN_KEY',    'QmfhW,=_uNt2.uO>ndXAD$>Kkq}7[_[AU#jfv2#&ByMiW`cp)oB??!Cj9Q1;*+v~' );
define( 'NONCE_KEY',        '1QsYmEd~C^@R;af#{&%oxnA.(Hou|_q,k@(=0{)BQ,#LmB[M]F?+Hv,S`fvt.F+p' );
define( 'AUTH_SALT',        'F3YPd;?`#xskPrvRi,iK}|SbS5q4mEBlg=eZR8*=RQw$x)my7d[P`MQ~it+l?70N' );
define( 'SECURE_AUTH_SALT', '(sZp)?V#^+Q15^u4|ZBYn~&@>Q*~XEs*_taZPe&.`ip2|`v{.kjHv9z~}!vgyx/0' );
define( 'LOGGED_IN_SALT',   'tr]0ikcY9x[88jgQ7ve0)fjO:f`dTS12zNSb>bko]r u1##Z)aNqWKG3!OJ$i~t!' );
define( 'NONCE_SALT',       'DIeJ],Q3*=RG#0RDEv0I Hp`2e#*O$IfBnvwmD58fk J!>/BW;dZMCns{|{+{|;y' );

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
