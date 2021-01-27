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
define( 'DB_NAME', 'toali_wp780' );

/** MySQL database username */
define( 'DB_USER', 'toali_wp780' );

/** MySQL database password */
define( 'DB_PASSWORD', '.I3E0dp[S9' );

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
define( 'AUTH_KEY',         'xpouvkp0aqsjvauafzqs3sjt37rn3hrlhprk94ixcj1qy3gbssr2gyt8dmni9rcq' );
define( 'SECURE_AUTH_KEY',  'ztonrl7gb2aspeo4byy3esyrtunkts0j0dvld2nb0uneo0ov6zz13zfhv9mlpdrb' );
define( 'LOGGED_IN_KEY',    'yjt87su6uj74ifejwj7sjkkcgehwtlm0y2wmyc9iuegx1321i6p4kf19wymhgurp' );
define( 'NONCE_KEY',        'muslbsnbcnypnkboiqrnz3qrnufkdb0jid7rpgqvmzmazas1s1nxujnqagc3cwqf' );
define( 'AUTH_SALT',        'qwtzytmm3ofduddbjvlppp18slu7yhifqrp0gue1arhirgkzrp73iuhvcho4r4ce' );
define( 'SECURE_AUTH_SALT', 'njd54hiou6wt498ybog7hklt6x9jnxknxybz6p78wz0h1aojooe4sryfpzraqcsj' );
define( 'LOGGED_IN_SALT',   '2zracqcg5c2aulrhbtj3uymvzzfuuleqclrmei4vpr9uwsbv8lu1v1mzya1qvvsb' );
define( 'NONCE_SALT',       'so9rsc0vcvpwawfu5nocmooqlu5fw4i6dio9nbawzp6y9feo4t3u5s5y90sgsxsp' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpjj_';

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
