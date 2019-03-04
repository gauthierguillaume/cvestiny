<?php
/**
 * @package Tribal
 */
?>

<?php $s1 = htmlspecialchars('<h1 class="entry-title body-font"><a href="');
$s2 = htmlspecialchars('" rel="bookmark">');
$s3 = htmlspecialchars('</a></h1><div class="entry-excerpt">'); 
$s4 = htmlspecialchars('</div><a class="morelink" href="');
$s5 = htmlspecialchars('">');
$s6 = htmlspecialchars('</a>')?>
				
<article id="post-<?php the_ID(); ?>" title="<?php echo $s1.esc_url(get_the_permalink()).$s2.get_the_title().$s3.substr(get_the_excerpt(),0,100).(get_the_excerpt() ? "..." : "" ).$s4.esc_url(get_the_permalink()).$s5.__('View More','tribal').$s6; ?>" <?php post_class('col-lg-2 col-md-3 col-sm-3 col-xs-2 grid tribal wow fadeIn'); ?> data-wow-duration="<?php echo mt_rand(2,4)."s"; ?>" data-wow-offset="1">
	<div class="card">
		<div class="featured-thumb front">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('tribal-lens-thumb'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder-lens.jpg"; ?>"></a>
			<?php endif; ?>
			
		</div><!--.featured-thumb-->
		
<div class="out-thumb back">
				<header class="entry-header">
					<h1 class="entry-title body-font"><a rel="bookmark" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h1>
				</header><!-- .entry-header -->
			</div><!--.out-thumb -->
	</div>	
		
</article><!-- #post-## -->