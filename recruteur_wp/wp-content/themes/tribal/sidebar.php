<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package tribal
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( tribal_load_sidebar() ) : ?>
	<div id="top-search" class="<?php do_action('tribal_secondary-width') ?>">
		<?php get_search_form(); ?>
	</div>
	
	<div id="secondary" class="widget-area <?php do_action('tribal_secondary-width') ?>" role="complementary">	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php echo ( get_theme_mod('tribal_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','tribal') ) : get_theme_mod('tribal_footer_text'); ?> <br />
				<?php printf( __( 'Powered By %1$s.', 'tribal' ), '<a href="'.esc_url("https://rohitink.com/2015/05/02/tribal-photography-theme/").'" rel="nofollow">Tribal Theme</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		
	</div><!-- #secondary -->

<?php endif; ?>
