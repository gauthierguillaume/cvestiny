<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cv_destiny_recruteur');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g9{&Hp^OMxO$W15mubVH9k*LUtn?&>?[a4NY8UHwPKmc*L?m<_1CQ=~Ph98-Q[)7');
define('SECURE_AUTH_KEY',  '0M%IubVETl+Sx+5*k!#O:o6J{n8auR4P2HFWQHnnPf;X#e.Bn^9hR^tIJIH^m@av');
define('LOGGED_IN_KEY',    'O8G2K~crS:^,VQ}7/Uhpvg@VLd&73prk?1yY|-@-.WmH7*57y{O,0)Q?n*}7)y^&');
define('NONCE_KEY',        'Tp/^!_h~]j->i^E>KS_`M5O@;1^zM{q^{-]=ir]M1[%=Lrkbx,1x2;Eu$c#!#YT@');
define('AUTH_SALT',        ')^hJC3Fn]Haz[(,wiQBU [k%iOSJL`NPT2mugUX.6,Y5CO9TAd#Kx|X<.z^aR+6i');
define('SECURE_AUTH_SALT', 'f/-sMUY3j,|4^Rb|0DC$Q},4s{-mtIo~oEBp9$~ECw=VrH)8kIHcn5wZd-j+_78e');
define('LOGGED_IN_SALT',   '~h,oVw.[H3Vi DxJk>YjCeINPGBaXip@o^b.6mOpLlu*[ico%Z<=,IiWT.BIG2y$');
define('NONCE_SALT',       'N5WJX/F7j_DG9q(8y+p4=cUJg;sllA7,iCZRN:l@[dUwMsxEz-NjgQIEBPnY/_u?');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'cv_destiny_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');