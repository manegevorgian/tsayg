<!doctype html>
<html ⚡ <?php echo Penci_AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'penci_amp_post_template_head', $this ); ?>
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'penci_amp_post_template_css', $this ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>

<?php $sticky_header = penci_amp_get_setting( 'penci_amp_sticky_header' ) ? ' sticky-header' : ''; ?>
<body  class="<?php echo join( ' ', get_body_class( 'penci-amp-body' . $sticky_header ) ); ?>">
<?php do_action( 'penci_amp_after_body_tag', $this ); ?>
<?php $this->load_parts( array( 'sidebar' ) ); ?>
	<div class="penci-amp-wrapper">
		<?php $this->load_parts( array( 'header-bar' ) ); ?>
		<?php $this->load_parts( array( 'featured-slider' ) ); ?>
		<?php if(  function_exists( 'penci_amp_render_google_adsense' ) ) : echo penci_amp_render_google_adsense( 'penci_amp_ad_home_below_slider' ); endif; ?>
		<div class="wrap">
			<?php
			if( get_theme_mod( 'penci_amp_home_featured_cat' ) ){
				$this->load_parts( array( 'featured-cats' ) );
			}

			$this->load_parts( array( 'featured-posts' ) );
			?>
			<?php $this->load_parts( array( 'pagination' ) ); ?>
			<?php if(  function_exists( 'penci_amp_render_google_adsense' ) ) : echo penci_amp_render_google_adsense( 'penci_amp_ad_home_below_latest_posts' ); endif; ?>
			<?php $this->load_parts( array( 'footer' ) ); ?>
		</div>
		<?php
		do_action( 'penci_amp_post_template_footer', $this );
		do_action( 'amp_post_template_footer', $this );
		?>
	</div>
</body>
</html>
