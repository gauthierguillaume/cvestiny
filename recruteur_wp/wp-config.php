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
define( 'DB_NAME', 'cv_destiny_recruteur' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'ChST0D2rynJtVritR?F>qftHV_H6HVBHe#HiCog3q]3$CC!/;g)HGSVTtACw0O6a' );
define( 'SECURE_AUTH_KEY',  'uJTcu$bU_{-OP6mUp*Z0#*ki{{o^e#ZW{U`&jMY%l&c:Tn7{rHpi<a<ap<5h`Xf]' );
define( 'LOGGED_IN_KEY',    'ou*Ll?^;RM.t$xSz7Uvwp6^t2ddzzc9Q3-QvVb%.V)rlTH,+.9Llac6]3Z}= fUD' );
define( 'NONCE_KEY',        '^mOW#~t 8(f1Ilk|1BPa%KhSyOc6Y <<YKK14IvqeB1Ry;PYdWzDS&QZ3F#bV+b-' );
define( 'AUTH_SALT',        'D3126h48::J^FW?cvghV/a~c0GV .<)D/mnG^[M&gj{%eEhZPrw|:>+yBY?YX0V<' );
define( 'SECURE_AUTH_SALT', '+DHa<Dq,y|}Pn^&Ch7PI34yiJHIG,or~jHu?pk@C0Zvz}w%Ol}&sQyqa=)kzai6Y' );
define( 'LOGGED_IN_SALT',   'cXaEBfOEwU1Hvr/Lx#gBl7+1=}GYfuV16in=mwUtf3*RC)&_JnE9{a1Zv_iz:5hj' );
define( 'NONCE_SALT',       '39;vpUdSis:+|F &tO32#3,3<*j.j2]!1CR|3c5sF]{E1>>oOK/R^MW*LUU}pgz>' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'cv';

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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
