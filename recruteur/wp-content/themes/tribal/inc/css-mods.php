<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function tribal_custom_css_mods() {

	echo "<style id='custom-css-mods'>";
	
	//TItle Tagline hidden.
	if ( get_theme_mod('tribal_hide_title_tagline') ) :
		echo "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	if ( get_theme_mod('tribal_title_font','Pacifico') ) :
		echo ".title-font, h1, h2, .section-title, .page-header, #static-bar ul li a { font-family: ".esc_html( get_theme_mod('tribal_title_font') )."; }";
	endif;
	
	if ( get_theme_mod('tribal_body_font','Montserrat') ) :
		echo "body, .body-font { font-family: ".esc_html( get_theme_mod('tribal_body_font') )."; }";
	endif;
	
	if ( get_theme_mod('tribal_site_titlecolor') ) :
		echo "#masthead h1.site-title a { color: ".esc_html( get_theme_mod('tribal_site_titlecolor', '#FFFFFF') )."; }";
	endif;
	
	
	//Check Jetpack is active
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) )
		echo '.pagination { display: none; }';

	
	if ( get_theme_mod('tribal_custom_css') ) :
		echo wp_strip_all_tags( get_theme_mod('tribal_custom_css') );
	endif;

	echo "</style>";
}

add_action('wp_head', 'tribal_custom_css_mods');