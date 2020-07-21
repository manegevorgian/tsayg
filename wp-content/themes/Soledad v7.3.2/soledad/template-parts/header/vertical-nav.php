<?php
$header_layout = penci_soledad_get_header_layout();
$logo_url_nav = esc_url( home_url('/') );
if( get_theme_mod('penci_custom_url_logo') ) {
	$logo_url = get_theme_mod('penci_custom_url_logo');
}
if( get_theme_mod('penci_custom_url_logo_vertical') ) {
	$logo_url_nav = get_theme_mod('penci_custom_url_logo_vertical');
}

if ( ! get_theme_mod( 'penci_vertical_nav_show' ) ) { ?>
	<a id="close-sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>"><?php penci_fawesome_icon('fas fa-times'); ?></a>
	<nav id="sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>" role="navigation" <?php if( ! get_theme_mod('penci_schema_sitenav') ): ?>itemscope itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>

		<?php if ( ! get_theme_mod( 'penci_header_logo_vertical' ) ) : ?>
			<div id="sidebar-nav-logo">
				<?php if ( get_theme_mod( 'penci_mobile_nav_logo' ) ) { ?>
					<a href="<?php echo $logo_url_nav; ?>"><img class="penci-lazy" src="<?php echo get_template_directory_uri() . '/images/penci-holder.png'; ?>" data-src="<?php echo esc_url( get_theme_mod( 'penci_mobile_nav_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<?php } elseif( get_theme_mod( 'penci_logo' ) ) { ?>
					<a href="<?php echo $logo_url_nav; ?>"><img class="penci-lazy" src="<?php echo get_template_directory_uri() . '/images/penci-holder.png'; ?>" data-src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<?php } else { ?>
					<a href="<?php echo $logo_url_nav; ?>"><img class="penci-lazy" src="<?php echo get_template_directory_uri() . '/images/penci-holder.png'; ?>" data-src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<?php } ?>
			</div>
		<?php endif; ?>

		<?php if ( ! get_theme_mod( 'penci_header_social_vertical' ) ) : ?>
			<div class="header-social sidebar-nav-social<?php if( get_theme_mod('penci_header_social_vertical_brand') ): echo ' penci-social-textcolored'; endif; ?>">
				<?php get_template_part( 'inc/modules/socials' ); ?>
			</div>
		<?php endif; ?>

		<?php
		/**
		 * Display main navigation
		 */
		wp_nav_menu( array(
			'container'      => false,
			'theme_location' => 'main-menu',
			'menu_class'     => 'menu',
			'fallback_cb'    => 'penci_menu_fallback',
			'walker'         => new penci_menu_walker_nav_menu()
		) );
		?>
	</nav>
<?php } ?>