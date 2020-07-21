<?php
/**
 * Template part for Slider Style 17
 */

$post_thumb_size = ! empty( $post_thumb_size ) ? $post_thumb_size : 'penci-thumb';
$bpost_thumb_size = ! empty( $bpost_thumb_size ) ? $bpost_thumb_size : 'penci-magazine-slider';
?>
<?php if ( $feat_query->have_posts() ) : ?>
	<div class="item">
		<div class="wrapper-item wrapper-item-classess">
			<?php $i = 1; $num_posts = $feat_query->post_count;
			while ( $feat_query->have_posts() ) : $feat_query->the_post();
			$thumb = $post_thumb_size;
			if( $i%5 == 3 ): $thumb = $bpost_thumb_size; endif;
			?>

			<?php if( $i%5 == 1 ): ?>
				<div class="penci-slider17-mag-item penci-slide17-item-<?php echo ( $i%5 ); ?>">
			<?php endif; ?>

			<div class="penci-item-mag penci-item-<?php echo ( $i%5 ); ?> <?php echo ( $i%5 == 3 ? 'penci-pitem-big' : 'penci-pitem-small' ) ?>">
				<?php if( ! $disable_lazyload ) { ?>
					<a class="penci-image-holder owl-lazy" data-src="<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
				<?php } else { ?>
					<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
				<?php }?>
				<div class="penci-slide-overlay penci-slider6-overlay">
					<a class="overlay-link" href="<?php the_permalink(); ?>"></a>
					<?php if( ! $hide_format_icons && ( has_post_format( 'video' ) || has_post_format( 'audio' ) || has_post_format( 'link' ) || has_post_format( 'quote' ) || has_post_format( 'gallery' ) ) ): ?>
						<a href="<?php the_permalink(); ?>" class="overlay-icon-format <?php if( $i%5 == 3 ): echo ' lager-size-icon'; endif; ?>">
							<?php if ( has_post_format( 'video' ) ) : ?>
								<?php penci_fawesome_icon('fas fa-play'); ?>
							<?php endif; ?>
							<?php if ( has_post_format( 'audio' ) ) : ?>
								<?php penci_fawesome_icon('fas fa-music'); ?>
							<?php endif; ?>
							<?php if ( has_post_format( 'link' ) ) : ?>
								<?php penci_fawesome_icon('fas fa-link'); ?>
							<?php endif; ?>
							<?php if ( has_post_format( 'quote' ) ) : ?>
								<?php penci_fawesome_icon('fas fa-quote-left'); ?>
							<?php endif; ?>
							<?php if ( has_post_format( 'gallery' ) ) : ?>
								<?php penci_fawesome_icon('far fa-image'); ?>
							<?php endif; ?>
						</a>
					<?php endif; ?>
					<div class="penci-mag-featured-content">
						<div class="feat-text<?php if ( $meta_date_hide ): echo ' slider-hide-date'; endif;?>">
							<?php if( $i%5 == 3 && ! $hide_categories ): ?>
								<div class="cat featured-cat"><?php penci_category( '' ); ?></div>
							<?php endif; ?>
							<h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>" href="<?php the_permalink() ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a></h3>
							<?php if ( ! $hide_meta_comment || ! $meta_date_hide || $show_viewscount ): ?>
								<div class="feat-meta">
									<?php if ( ! $meta_date_hide ): ?>
										<span class="feat-time"><?php penci_soledad_time_link(); ?></span>
									<?php endif; ?>
									<?php if ( ! $hide_meta_comment ): ?>
										<span class="feat-comments"><a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 '. penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
									<?php endif; ?>
									<?php
									if ( $show_viewscount  ) {
										echo '<span class="feat-countviews">';
										echo penci_get_post_views( get_the_ID() );
										echo ' ' . penci_get_setting( 'penci_trans_countviews' );
										echo '</span>';
									}
									?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<?php if( $i%5 == 2 || $i%5 == 3 ): ?>
				</div><div class="penci-slider17-mag-item penci-slide17-item-<?php echo ( $i%5 ); ?>">
			<?php endif; ?>

			<?php if( $i%5 == 0 && $i > 1 && $i < $num_posts ):  echo '</div></div></div><div class="item"><div class="wrapper-item wrapper-item-classess">';  endif;?>

			<?php if( $i == $num_posts ): ?>
				</div>
			<?php endif; ?>

			<?php $i++; endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>