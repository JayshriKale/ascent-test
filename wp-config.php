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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ascent' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '.Bb{)}#/@lj{OH:MSza=%d,,b-([kkT*c>V|&aQ3/J2SIFbWW(ZOSH=6@t<l1Mq#' );
define( 'SECURE_AUTH_KEY',  'LSH#J/i[q@`a$9R7*_ZS}38$`PN1QJ!_No]dd9Gp1<W&7g#if2uH7xg*d3vp/h$^' );
define( 'LOGGED_IN_KEY',    'lx+bo6-CfVE5~PP(T4hF;l^{{NiAQ%:$cM}pH@QMBl#!Kqd}Q_`2pTbZ+5Z,M0;w' );
define( 'NONCE_KEY',        'pY%G-KGzwiCFk(I(rB?O#,l284]z+nmcZ#n~/Mqw)QMk2H #s5`J>-cy_@^|[RH#' );
define( 'AUTH_SALT',        '%A5YqQ3wA=5HL=fXgolbTY}Z04^Pk>8-7}}^f=egb+^u!l 1Z)V0ZOyBz_)n{rz<' );
define( 'SECURE_AUTH_SALT', '8j8lU=]Wnp>,Wrl%Su~rC|50MK/i:Y*C4eFB}O?0P#<p*w&0=WmM^?cTiLZC*OK ' );
define( 'LOGGED_IN_SALT',   'K>qY(-Y8R<ToYu;,vo<E?Ta:q{z$Q56:g^vjD:g2G?zXhopsd.Ku)M8u9{;a^+$9' );
define( 'NONCE_SALT',       'f#1~#)A6Pzxi$(e`TX(MM^*TyWK,Cp.$csSs`muagyAn/Rsc%?1<A@(s:b;Cl7E/' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
