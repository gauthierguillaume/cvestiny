<?php
/**
 * Functions for configuring demo importer.
 *
 * @package Importer/Functions
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Setup demo importer config.
 *
 * @deprecated 1.5.0
 *
 * @param  array $demo_config Demo config.
 * @return array
 */
function radiate_demo_importer_packages( $packages ) {
	$new_packages = array(
		'radiate-free' => array(
			'name'    => esc_html__( 'Radiate', 'radiate' ),
			'preview' => 'https://demo.themegrill.com/radiate/',
		),
		'radiate-pro'  => array(
			'name'     => esc_html__( 'Radiate Pro', 'radiate' ),
			'preview'  => 'https://demo.themegrill.com/radiate-pro/',
			'pro_link' => 'https://themegrill.com/themes/radiate/',
		),
	);

	return array_merge( $new_packages, $packages );
}

add_filter( 'themegrill_demo_importer_packages', 'radiate_demo_importer_packages' );
