<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function radiate_jetpack_setup() {
	// Add theme support Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'radiate_jetpack_setup' );
