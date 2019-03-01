<?php
/**
 * @package Tribal
 */
?>
				
<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-2 col-md-3 col-sm-3 col-xs-6 grid tribal basichover wow fadeIn'); ?> data-wow-duration="<?php echo mt_rand(2,4)."s"; ?>" data-wow-offset="1">
	<div class="card">
		<div class="featured-thumb front">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('tribal-lens-thumb'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder-lens.jpg"; ?>"></a>
			<?php endif; ?>
			
		</div><!--.featured-thumb-->
		
			<div class="out-thumb back">
				<header class="entry-header">
					<h1 class="entry-title body-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</header><!-- .entry-header -->
			</div><!--.out-thumb -->
	</div>	
		
</article><!-- #post-## -->