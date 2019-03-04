<?php
/**
 * @package tribal
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('tribal-single'); ?>>
	<div class="row">
	<?php if (has_post_thumbnail() ) : ?>
		<div id="featured-image" class="col-md-4">
				<?php the_post_thumbnail('full'); ?>
		</div>
	<?php endif; ?>
	
	<header class="entry-header col-md-8">
		<?php the_title( '<h1 class="entry-title body-font">', '</h1>' ); ?>			
		<div class="entry-meta">
				<div class="author">
					<i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
				</div>
				<div class="date">
					<i class="fa fa-calendar"></i><span><?php the_time('F j Y'); ?></span>
				</div>	
				<?php if ( get_the_category_list() ) : ?>	
				<div class="categories">
					<i class="fa fa-folder"></i><?php echo get_the_category_list(); ?>
				</div>
				<?php endif; ?>
				<?php if ( get_the_tag_list() ) : ?>
				<div class="tags">
					<i class="fa fa-tag"></i><?php echo get_the_tag_list(); ?>
				</div>		
				<?php endif; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	</div>
	

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tribal' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
