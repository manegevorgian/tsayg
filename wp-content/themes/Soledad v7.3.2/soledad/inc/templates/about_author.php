<?php
/**
 * Display detail author of current post
 * Use in single post
 *
 * @since 1.0
 */
?>
<div class="post-author">
	<div class="author-img">
		<?php if( function_exists('get_simple_local_avatar') ){
			if( get_simple_local_avatar( get_the_author_meta( 'ID' ) ) ){
				echo get_simple_local_avatar( get_the_author_meta( 'ID' ), '100' );
			} else {
				echo get_avatar( get_the_author_meta( 'email' ), '100' );
			}
		} else {
			echo get_avatar( get_the_author_meta( 'email' ), '100' );
		}	
		?>
	</div>
	<div class="author-content">
		<h5><?php the_author_posts_link(); ?></h5>
		<p><?php the_author_meta( 'description' ); ?></p>
		<?php if ( get_the_author_meta( 'user_url' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="<?php the_author_meta( 'user_url'); ?>"><?php penci_fawesome_icon('fas fa-globe'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'facebook' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="http://facebook.com/<?php echo esc_attr( the_author_meta( 'facebook' ) ); ?>"><?php penci_fawesome_icon('fab fa-facebook-f'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'twitter' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="http://twitter.com/<?php echo esc_attr( the_author_meta( 'twitter' ) ); ?>"><?php penci_fawesome_icon('fab fa-twitter'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'instagram' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="http://instagram.com/<?php echo esc_attr( the_author_meta( 'instagram' ) ); ?>"><?php penci_fawesome_icon('fab fa-instagram'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="http://pinterest.com/<?php echo esc_attr( the_author_meta( 'pinterest' ) ); ?>"><?php penci_fawesome_icon('fab fa-pinterest'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'tumblr' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="http://<?php echo esc_attr( the_author_meta( 'tumblr' ) ); ?>.tumblr.com/"><?php penci_fawesome_icon('fab fa-tumblr'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="<?php echo esc_url( the_author_meta( 'linkedin' ) ); ?>"><?php penci_fawesome_icon('fab fa-linkedin-in'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'soundcloud' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="<?php echo esc_url( the_author_meta( 'soundcloud' ) ); ?>"><?php penci_fawesome_icon('fab fa-soundcloud'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'youtube' ) ) : ?>
			<a rel="nofollow" target="_blank" class="author-social" href="<?php echo esc_url( the_author_meta( 'youtube' ) ); ?>"><?php penci_fawesome_icon('fab fa-youtube'); ?></a>
		<?php endif; ?>
		<?php if ( get_the_author_meta( 'email' ) && get_theme_mod( 'penci_post_author_email' ) ) : ?>
			<a rel="nofollow" class="author-social" href="mailto:<?php echo esc_attr( the_author_meta( 'email' ) ); ?>"><?php penci_fawesome_icon('fas fa-envelope'); ?></a>
		<?php endif; ?>
	</div>
</div>