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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          'z8UnitL`ALMaue91/ zpK{C8`IAf1!G>]PKw&_41YtXp!Wn*weGKq~hLK=j_*m$U' );
define( 'SECURE_AUTH_KEY',   '+m8A>MJo7Xod/eex;9vG)X&Q6I&~yu$WBy*+}uA*e#w+0tgc.2L>qjzN{l?a#aj:' );
define( 'LOGGED_IN_KEY',     ' @.?RqkFRw/OPlvPttyCR1uEHaAQ&2bvTEB[edXy$Lp&z {P_]W]D5C=!9Vo4y_s' );
define( 'NONCE_KEY',         '`#D#:Cc9 jn{<)70I+;y>UMU50$}uL,RUqzy5q6+^<Ep1B/Qc9 d <b/s-O->%a@' );
define( 'AUTH_SALT',         'NKxf)6alA=p4+c?eV$%7cC?M^7%dN*Zx`^YWoZ,b>D><*=Xwe5jrx(BPL9:4;m,5' );
define( 'SECURE_AUTH_SALT',  ' }*L0}Z#+bxK~)8|]k9M~tgmPn]yLEiERSa`+}aD+ENc7JVn`Tf9%#:BP`)bSuWv' );
define( 'LOGGED_IN_SALT',    '$?Idd3R$fBt>! Z96u82-:bV]8!4O`~mYW5C[~d5.gCW3)=,dw5{Uk&c!9TmPIfF' );
define( 'NONCE_SALT',        '~QZ[MzZt.m?`^vzL.9S{Jk{87e/.=h=]~-BldB{=~]n&{Cg;OOG@:^;+Mio*cI/Z' );
define( 'WP_CACHE_KEY_SALT', 'rxiZMa{yYz@5$GZ+LCsp3ndSa;8tq !Rh^.7tT@ -i*h_c7W|#c8Re[Y1 ft$7l[' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
