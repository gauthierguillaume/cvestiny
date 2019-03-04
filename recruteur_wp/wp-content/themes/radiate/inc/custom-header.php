<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses radiate_header_style()
 * @uses radiate_admin_header_style()
 * @uses radiate_admin_header_image()
 *
 * @package radiate
 */
function radiate_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'radiate_custom_header_args', array(
		'default-image'				=> '%s/images/header/header-image-one.jpg',
		'default-text-color'		=> '444444',
		'width'						=> 1500,
		'height'					=> 450,
		'flex-width'				=> true,
		'flex-height'				=> true,
		'video'						=> true,
		'wp-head-callback'			=> 'radiate_header_style',
		'admin-head-callback'		=> 'radiate_admin_header_style',
		'admin-preview-callback'	=> 'radiate_admin_header_image',
	) ) );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'header-image-one' => array(
			'url'           => '%s/images/header/header-image-one.jpg',
			'thumbnail_url' => '%s/images/header/header-image-one-thumbnail.jpg',
			'description'   => __( 'Header Image One', 'radiate' )
			)
	) );
}
add_action( 'after_setup_theme', 'radiate_custom_header_setup' );

if ( ! function_exists( 'radiate_header_style' ) ) :

/**
 * Styles the header text displayed on the blog.
 *
 */
function radiate_header_style() {
	$header_text_color = get_header_textcolor();

	/**
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}


	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // radiate_header_style

if ( ! function_exists( 'radiate_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see radiate_custom_header_setup().
 */
function radiate_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
			text-decoration: none;
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // radiate_admin_header_style

if ( ! function_exists( 'radiate_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see radiate_custom_header_setup().
 */
function radiate_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( function_exists( 'the_custom_header_markup' ) ) {
			the_custom_header_markup();
		} else { ?>
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
			<?php endif; ?>
		<?php } ?>
	</div>
<?php
}
endif; // radiate_admin_header_image
