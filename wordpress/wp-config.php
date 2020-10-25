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
define( 'DB_NAME', 'e1895623' );

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
define( 'AUTH_KEY',         '*ABo*#t5f/(TE^Gr`?.n<La0-#N]iQL1I%dHJNg(S`y*LY=gf1_zF@_ut^1A(/jt' );
define( 'SECURE_AUTH_KEY',  'HZ0K){CmqzBid)8.KFaH`$R]p`MAG-]>iMUsL1c=e/:L/#.)k|/k(UxeL-Q{jkm0' );
define( 'LOGGED_IN_KEY',    'I*P*,9h#E4HMjyEq>R&9*WFbqfq+jd_n|HR0E5/L?||DZ40X|.n]a^rx%e]xa|]+' );
define( 'NONCE_KEY',        'UO8tP9>r2r6^*MvEp&VkBr5[09}$P=QnX`7}mplX/j27FQ{?Y*@Xn;Or{*1^4c4N' );
define( 'AUTH_SALT',        'q7;}S:DQ8Jv g%=9AvQ(A2jzt&?DzI D8wqw6P{CRH7MEGg;.e8Py,CkRKkJ4gkh' );
define( 'SECURE_AUTH_SALT', '[JHx~Ldg#j3^wf_j}infQCHxU&l%% &N]!>O$brn=(H#P,7BT4$5&;VLwPeuBRA#' );
define( 'LOGGED_IN_SALT',   'L)d`Qy,0@(zFa>c.~r?)C9=jlaTZ.$6aFw*f+$`Js_-%%IFz@]LVfLl45CTC??Zu' );
define( 'NONCE_SALT',       '${N6l0X?f#{0-t;{xm dTdh#3eB?+!ar[3fUEY>6FuV:~:J#$;U>KW,H#Aol`L.g' );

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
require_once( ABSPATH . 'wp-settings.php' );
