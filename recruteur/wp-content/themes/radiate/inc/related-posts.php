<?php $related_posts = radiate_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts-wrapper">

		<h4 class="related-posts-main-title">
			<span><?php esc_html_e( 'You May Also Like', 'radiate' ); ?></span>
		</h4>

		<div class="related-posts clearfix">

			<?php
			$count = 1;
			while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
				<?php
				$class = "tg-one-third";
				if ( $count % 3 == 0 ) {
					$class = "tg-one-third tg-one-third-last";
				}
				?>

				<div class="<?php echo esc_attr( $class ); ?>">

					<?php if ( has_post_thumbnail() ): ?>
						<div class="post-thumbnails">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail( 'radiate-featured-image' ); ?>
							</a>
						</div>
					<?php endif; ?>

					<div class="wrapper">

						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h3><!--/.post-title-->

						<div class="entry-meta">
							<?php
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
							if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
								$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
							}

							$time_string = sprintf( $time_string,
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_attr( get_the_modified_date( 'c' ) ),
								esc_html( get_the_modified_date() )
							);

							printf( '<span class="posted-on">%1$s</span><span class="byline">%2$s</span>',
								sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
									esc_url( get_permalink() ),
									$time_string
								),
								sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
									esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
									esc_html( get_the_author() )
								)
							);
							?>

							<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
							<span class="comments-link"><?php comments_popup_link( __( '0 Comment', 'radiate' ), __( '1 Comment', 'radiate' ), __( ' % Comments', 'radiate' ) ); ?></span>
							<?php endif; ?>
						</div>

					</div>

				</div><!--/.related-->
			<?php
			$count ++;
		endwhile; ?>

		</div><!--/.post-related-->

	</div>
<?php endif; ?>

<?php wp_reset_query(); ?>
