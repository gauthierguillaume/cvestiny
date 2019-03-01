<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tribal
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tribal' ); ?></a>
	
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	
	
	<div id="outmenu">
		<div class="container">
			<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
		</div>
	</div>
	
	<header id="masthead" class="site-header container-fluid" role="banner">
				<div id="top-left" class="col-md-3 col-sm-3">
					<div class="menulink">
						<i class="fa fa-bars"></i><?php _e('Menu','tribal'); ?>
					</div>
					
				</div>
				<div class="site-branding col-md-6 col-sm-6">
					<?php if ( get_theme_mod('tribal_logo') != "" ) : ?>
						<div id="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod('tribal_logo') ); ?>"></a>
						</div>
					<?php else: ?>
						<div id="text-title-desc">
						<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						</div>
					<?php endif; ?>
				</div>	
				<div class="social-icons col-md-3 col-sm-3">
					<?php get_template_part('social', 'sociocon'); ?>	
				</div>
	</header><!-- #masthead -->
			
		<div id="content" class="site-content container-fluid">