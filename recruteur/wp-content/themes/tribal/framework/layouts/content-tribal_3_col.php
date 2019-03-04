<?php
/**
 * @package Tribal
 */
?>
				
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-4 grid tribal tribal3col wow fadeIn'); ?> data-wow-duration="<?php echo mt_rand(2,4)."s"; ?>" data-wow-offset="1">
	<div class="card">
		<div class="featured-thumb front">
			<div class="imgc">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('tribal-pop-thumb'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
			<?php endif; ?>
			</div>
		</div><!--.featured-thumb-->
		
		<div class="out-thumb back">
				<header class="entry-header">
					<h1 class="entry-title body-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</header><!-- .entry-header -->
			</div><!--.out-thumb-->
			
	</div>	
		
</article><!-- #post-## -->