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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'horoskop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n]|/Jl}&/rqR!LloNK~Au!f<akED8:8|>fF-;>Sm]w{|UZ8H3G~4ClhYX%Qmlh.B');
define('SECURE_AUTH_KEY',  'uCd$c|O.Lr:o-Gw,/>Ok?wZn)qz03.|E63:a:L:YZs!`as^VNzo<%kUm.s0]|opK');
define('LOGGED_IN_KEY',    '5h~V;d?09i14|e@HG>s|-Zg@ZZAc4G3ZW-O^-k$dx8vhNx6+bE<:$2q(wDasst~c');
define('NONCE_KEY',        '2[a^W=35!AL-)-t~cv7}.E-gB- U4+RvjUm-?iXbtiU]e9sI&|UcoPlEIs!A+;~p');
define('AUTH_SALT',        'H)9>@>MVa$lqL(CikwUvwh9kA`(v:3{LTa_+<4R0pDU;>&&^-+dn.HAXxqca6*#J');
define('SECURE_AUTH_SALT', '2fJ]:jD>63y.z(g+)7P~?7)kNE%(aPlUM$(@PoWi~sb5/BQd{n%C;@G]vXE+Z,50');
define('LOGGED_IN_SALT',   '~}iKqICW+o3C#?EHKR!~SZ2[]|V3#W@{x5YTbwH!HEB!<Gd.{rIx;;)F|Ig6lL0U');
define('NONCE_SALT',       '+879Hq~EbI5g;>0q(W;R}}/`=O9[hW`Pw8oh@lu?y#$q>?)_E~o@j1(bFrp|Rz,+');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'zbmwjl';



define('WP_SITEURL','http://' . ($_SERVER['HTTP_X_WP_TEMPORARY'] ? $_SERVER['HTTP_X_WP_TEMPORARY'] : 'horoskop.dev'));
define('WP_HOME', 'http://' . ($_SERVER['HTTP_X_WP_TEMPORARY'] ? $_SERVER['HTTP_X_WP_TEMPORARY'] : 'horoskop.dev'));
define('WP_MEMORY_LIMIT', '256M');
define('WPLANG', 'sk_SK');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
