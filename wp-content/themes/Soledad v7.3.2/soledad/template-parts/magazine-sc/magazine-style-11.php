<?php
/**
 * Template display for featured category style 11
 *
 * @since 1.0
 */
?>

<div class="mag-photo">
	<div class="magcat-thumb hentry">
		<?php
		/* Display Review Piechart  */
		if( function_exists('penci_display_piechart_review_html') ) {
			penci_display_piechart_review_html( get_the_ID() );
		}
		?>
		<a href="<?php the_permalink(); ?>" class="mag-overlay-photo"></a>
		<?php if( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
		<a class="penci-image-holder penci-lazy<?php echo penci_class_lightbox_enable(); ?>" data-src="<?php echo penci_get_featured_image_size( get_the_ID(), penci_featured_images_size() ); ?>" href="<?php penci_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
		</a>
		<?php } else { ?>
		<a class="penci-image-holder<?php echo penci_class_lightbox_enable(); ?>" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), penci_featured_images_size() ); ?>');" href="<?php penci_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
		</a>
		<?php } ?>

		<div class="magcat-detail">
			<h3 class="magcat-titlte entry-title"><a href="<?php the_permalink(); ?>"><?php penci_trim_post_title( get_the_ID(), $_title_length ); ?></a></h3>
			<?php if ( 'yes' != $hide_author || 'yes' != $hide_date || 'yes' == $show_viewscount  ): ?>
				<div class="grid-post-box-meta mag-meta">
					<?php if ( 'yes' != $hide_author ) : ?>
						<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
					<?php endif; ?>
					<?php if ( 'yes' != $hide_date ) : ?>
						<span><?php penci_soledad_time_link(); ?></span>
					<?php endif; ?>
					<?php
					if ( 'yes' == $show_viewscount ) {
						echo '<span>';
						echo penci_get_post_views( get_the_ID() );
						echo ' ' . penci_get_setting( 'penci_trans_countviews' );
						echo '</span>';
					}
					?>
				</div>
			<?php endif; ?>
			<?php penci_soledad_meta_schema(); ?>
		</div>
	</div>
</div>