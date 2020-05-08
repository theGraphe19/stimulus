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
define( 'DB_NAME', 'stimu92x_wp532' );

/** MySQL database username */
define( 'DB_USER', 'stimu92x_wp532' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S.6A1p7j.v' );

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
define( 'AUTH_KEY',         'i41cwu91xqmbmbgkcvaasikupgxqlnlyemvpuv2bdz3qhzdttwq40f0rxxyknj88' );
define( 'SECURE_AUTH_KEY',  'k0sy31ab9waab2cptltl7zzwspvafc539vetesssju50xqtqoyl3uy6gthm1dwef' );
define( 'LOGGED_IN_KEY',    'ywmdcgx5mznfjst4do9tiu5q7xz6jyli3yeancothulhsmdy4dwqoxvjr0mxupyh' );
define( 'NONCE_KEY',        'r5mfx0uc3pdwgeuttiv54qw54fewmlrmucdnyw3r1fz5dzzo7xw0ywmjmfyfzbrw' );
define( 'AUTH_SALT',        'xbnai4gwcks3qnvxqcakcswmkojwvgm7eeevziaoxha8pfhugzjuuvvvzdy5zhj4' );
define( 'SECURE_AUTH_SALT', '2uyxoxn4a9iadus6nwqx14youhpzlgjllbxihzdg9bdu2n94nbadoiqvn3xjiy8j' );
define( 'LOGGED_IN_SALT',   'jga9pr3sgvetd9hok5rtxgpm2vxbihmxsbuddvnho57rsug2e3dkkdqgibnb4rjz' );
define( 'NONCE_SALT',       'zk1y0emptdgof4jscbzrzkzqgtoc7tjubfyhfb2tdibyabbbzue0m7bqupltpked' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpek_';

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
