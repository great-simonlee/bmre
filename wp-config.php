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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '4ac03fd16af01beeab32e62a0bbbc6dc2b62fdad26ceca69');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CiIc!tF@Q~yu%8Hm8}iM:IC*8M-YrIn:*vG?hFFB3@0U8,;hem!vU`jg]YqmIqIc');
define('SECURE_AUTH_KEY',  '3w#87Gvu] -Vi{M$-[`,f-<wzY.z3]hI8lsvx^8!{^Wr) N%v&9}CfL[8**<Nuf`');
define('LOGGED_IN_KEY',    '{1|IL~.s `L+`6GDxJ<(+QWC4`/C9wJO3/R h<$p;@`Od^mQ)]T|5JZMXmhC& ji');
define('NONCE_KEY',        '9X8]}b38ML=rB&EBZzg_@NI0/Z)>:b#@G*%6]{HQ)_YB8uw=W|QhQ:fJaJrQZ2BB');
define('AUTH_SALT',        '};w*=*=1r72L&n$z*Lzjh;Z41hK7x^v}|0w:]yMOhJP#B0!.O]F12vX>nP6aK;#Y');
define('SECURE_AUTH_SALT', 'L%=o.FOhH g2s1?_b7)vy^21WS~Ctagw;9kqHmeyNd)oUZtu&TB~a1}J8~DQAUX/');
define('LOGGED_IN_SALT',   '%0g5)Z|yhK&dC*vbPI9 a+>NQYSyvaR.g} r5vn?j,,.?mO;j0yi3^yJD*dl^0%>');
define('NONCE_SALT',       '1+v-X3kYqB&}FHKm]Sb<eRWt#a72h2Aqi<6QfK(<e+n%$@_dfOjl,njB1I%W#mxf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);