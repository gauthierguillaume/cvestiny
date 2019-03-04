<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package tribal
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */ 
function tribal_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
	    'type'           => 'click',
	    'footer_widgets' => true,
	    'container'      => 'main',
	    'render'		 => 'tribal_jetpack_render_posts',
	    'posts_per_page' => 6,
	    'wrapper' 		 => false,
	) );
}
add_action( 'after_setup_theme', 'tribal_jetpack_setup' );

function tribal_jetpack_render_posts() {
		while( have_posts() ) {
	    the_post();
	    do_action('tribal_blog_layout'); 
	}
}

function tribal_filter_jetpack_infinite_scroll_js_settings( $settings ) {
    $settings['text'] = __( 'Load more...', 'tribal' );
 
    return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'tribal_filter_jetpack_infinite_scroll_js_settings' );