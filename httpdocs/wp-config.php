<?php


/** Set YLT IP **/
define('YLT_IP', '213.125.227.218');

/**
 * Als het bestand ../config.php bestaat zijn
 * we op een development omgeving
 */

if ( file_exists(__DIR__ .'/../config.php') )
{
    define('ENVIRONMENT', 'DEVELOPMENT');
}
else
{
    define('ENVIRONMENT', 'PRODUCTION');
}



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

if ( ENVIRONMENT == 'DEVELOPMENT' )
{
    require_once(__DIR__.'/../config.php');
}
else
{
    // ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'stipstap');

    /** MySQL database username */
    define('DB_USER', 'stipstap_usr');

    /** MySQL database password */
    define('DB_PASSWORD', 'f13Ccp6$');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');

    /** Database Charset to use in creating database tables. */
    define('DB_CHARSET', 'utf8mb4');

    /** The Database Collate type. Don't change this if in doubt. */
    define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's<$#J:KJ&u+LV=) _Y`o3:>U?G.Yp-vEcr?B,adt*[.hzB1-9N+^:nt~6^8^*hUg');
define('SECURE_AUTH_KEY',  '`!B9iLsv5vZg@v;l(Svcyuk!kgj`nTj|s=V({KGSvG7dHKqbp4DA(vR`]dtkdlx@');
define('LOGGED_IN_KEY',    'U.hrO>gC?EF<I&aI(fH|H?I-dF|BQv%G5-eb^Vk.&+[;Ct*j5CEgBT1Ic/y<cs5i');
define('NONCE_KEY',        'r]+L?z~unJOkp0Km:Gwv1nJ_~^ykmC&uOlFR$ZMyRd]JAv!xjs a?Sp>F{c/ZSZ+');
define('AUTH_SALT',        'YCKGb1.1x-gShiBb76L4e[!^FUp83-x44M3.2?J)OJlX[`<Rs!,E9t:bPuro_7`E');
define('SECURE_AUTH_SALT', 'Q[[C1s~Hu)Iy %*)j10{(F*d,`szZnAjf?:8{9;&?3i[Eg*e,U5B=U67dW$o!:@S');
define('LOGGED_IN_SALT',   'CyNBRjJ.tKC_D4Wa{0L{qm[{aL1h,Q4m!Lnh$`IDKijrAyCMBR}2hMmKsN6a<KDR');
define('NONCE_SALT',       'Qm,H0V/rr(!A$N*>$,RQYE*78wH);tW|Lq^TD[H8/+HL-4rK%,sSQ?M6o10Q4RM7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ylt_wp_';

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

if ( ENVIRONMENT == 'DEVELOPMENT' || $_SERVER['REMOTE_ADDR'] == YLT_IP )
{
	define( 'WP_DEBUG', false );
	//define( 'WP_DEBUG', true );
}
else
{
	define( 'WP_DEBUG', false );
}


/** Set default theme **/
define('WP_DEFAULT_THEME', 'ylt-theme');

/** Disable editor **/
define( 'DISALLOW_FILE_EDIT', true);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
