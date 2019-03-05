<?php
/**
 * @package GetCV
 * @version 1.7.1
 */
/*
Plugin Name: Get CV
Description: Plugin permettant d'afficher les cv stockées dans une base de donnees externe
Author: Yamna MELKI & Baptiste ANGOT
Version: 0.1.0
*/

function get($resource){
    $apiUrl = 'http://localhost/projets/cvestiny/recruteur/wp-json';
    $json = file_get_contents($apiUrl.$resource);
    $result = json_decode($json);
}

// Interroge le service "/"
$api = get('/');

// Affiche le nom du site Wordpress
echo $api->name . ' ';

// Affiche la description du site Wordpress
echo $api->description;
echo '<br>';
$pages = get('/wp/v2/pages');

foreach ($pages as $page) {
    echo 'Page ' . $page->id . ' : ' . $page->slug . '<br>';
}

add_shortcode('getcv', 'get_cv');










// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	.block-editor-page #dolly {
		display: none;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );