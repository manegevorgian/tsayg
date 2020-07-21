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
	<div class="wrap">
		<section class="penci-amp-error-404 not-found">
			<header class="page-header">
				<div class="error-404__image">
					<?php
					if ( $error_img = penci_amp_get_setting( 'penci_amp_404_image' ) ) {
						printf( '<amp-img src="%s" alt="error-404" width="300" height="200" layout="responsive"></amp-img>', esc_url( $error_img ) );
					}
					?>
				</div>
				<h1 class="page-title"><?php echo wp_kses_post( penci_amp_get_setting( 'penci_amp_404_heading' ) ); ?></h1>
			</header>
			<div class="page-content">
				<p><?php echo wp_kses_post( penci_amp_get_setting( 'penci_amp_404_sub_heading' ) ); ?></p>
			</div>
		</section>
		<?php $this->load_parts( array( 'footer' ) ); ?>
	</div>
	<?php
	do_action( 'penci_amp_post_template_footer', $this );
	do_action( 'amp_post_template_footer', $this );
	?>
</div>
</body>
</html>
