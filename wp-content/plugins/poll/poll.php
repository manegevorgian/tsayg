<?php
/*
* Plugin Name: TCO Poll
* Plugin URI:  https://google.com
Description: Use a full option polling functionality to get the answers you need. TCO Poll is the perfect, easy to use poll plugin for your WordPress website.
Version:     6.1.7
Author:      TCO Team
Author URI:  https://google.com
Text Domain: tco-poll
*/
//    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    add_action('init','registerPlugin');
function registerPlugin(){
    register_activation_hook(__FILE__,'pollPluginCallback');

}
function pollPluginCallback()
{
    ?>
    <script>alert('plugin activated')</script>
<?php
}
    
//    if ( ! function_exists('tco_post_types') ) {

//// Register Custom Post Type
//        function tco_post_types() {
//
//            $labels = array(
//                'name'                  => _x( 'Polls', 'Post Type General Name', 'tsayg' ),
//                'singular_name'         => _x( 'Poll', 'Post Type Singular Name', 'tsayg' ),
//                'menu_name'             => __( 'TCO Poll', 'tsayg' ),
//                'name_admin_bar'        => __( 'TCO Poll', 'tsayg' ),
//                'archives'              => __( 'Item Archives', 'tsayg' ),
//                'attributes'            => __( 'Item Attributes', 'tsayg' ),
//                'parent_item_colon'     => __( 'Parent Item:', 'tsayg' ),
//                'all_items'             => __( 'All Items', 'tsayg' ),
//                'add_new_item'          => __( 'Add New Item', 'tsayg' ),
//                'add_new'               => __( 'Add New', 'tsayg' ),
//                'new_item'              => __( 'New Item', 'tsayg' ),
//                'edit_item'             => __( 'Edit Item', 'tsayg' ),
//                'update_item'           => __( 'Update Item', 'tsayg' ),
//                'view_item'             => __( 'View Item', 'tsayg' ),
//                'view_items'            => __( 'View Items', 'tsayg' ),
//                'search_items'          => __( 'Search Item', 'tsayg' ),
//                'not_found'             => __( 'Not found', 'tsayg' ),
//                'not_found_in_trash'    => __( 'Not found in Trash', 'tsayg' ),
//                'featured_image'        => __( 'Featured Image', 'tsayg' ),
//                'set_featured_image'    => __( 'Set featured image', 'tsayg' ),
//                'remove_featured_image' => __( 'Remove featured image', 'tsayg' ),
//                'use_featured_image'    => __( 'Use as featured image', 'tsayg' ),
//                'insert_into_item'      => __( 'Insert into item', 'tsayg' ),
//                'uploaded_to_this_item' => __( 'Uploaded to this item', 'tsayg' ),
//                'items_list'            => __( 'Items list', 'tsayg' ),
//                'items_list_navigation' => __( 'Items list navigation', 'tsayg' ),
//                'filter_items_list'     => __( 'Filter items list', 'tsayg' ),
//            );
//            $args = array(
//                'label'                 => __( 'Poll', 'tsayg' ),
//                'description'           => __( 'TCO Poll Description', 'tsayg' ),
//                'labels'                => $labels,
//                'supports'              => array( 'title', 'editor' ),
//                'hierarchical'          => false,
//                'public'                => true,
//                'show_ui'               => true,
//                'show_in_menu'          => true,
//                'menu_position'         => 5,
//                'menu_icon'             => 'dashicons-format-status',
//                'show_in_admin_bar'     => true,
//                'show_in_nav_menus'     => true,
//                'can_export'            => true,
//                'has_archive'           => true,
//                'exclude_from_search'   => false,
//                'publicly_queryable'    => true,
//                'capability_type'       => 'page',
//            );
//            register_post_type( 'tco_poll', $args );
//
//        }
//        add_action( 'init', 'tco_post_types', 0 );
//
//    }
//
function tco_poll_menu_page() {
    add_menu_page(
        'TCO Poll',
        'TCO Poll',
        'manage_options',
        'tco-poll',
        'tco_poll_menu_callback'
    );
    function tco_poll_menu_callback(){
        require_once 'poll_options.php';
    }

}
add_action( 'admin_menu', 'tco_poll_menu_page' );

// The widget class
class Tco_Poll_Widget extends WP_Widget {

    // Main constructor
    public function __construct() {
        parent::__construct(
            'tco_poll_widget',
            __( 'TCO Poll Widget', 'text_domain' ),
            array(
                'customize_selective_refresh' => true,
            )
        );
    }

    // The widget form (for the backend )
    public function form( $instance ) {
        // Set widget defaults
        $defaults = array(
            'title'    => ''
        );

        // Parse current settings with defaults
        extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

     <?php // Widget Title ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

    // Update widget settings
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        return $instance;
    }

    // Display the widget
    public function widget( $args, $instance ) {
        extract( $args );

        // Check the widget options
       // $title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';

        // WordPress core before_widget hook (always include )
       // echo $before_widget;

        // Display the widget
        //echo '<div class="widget-text wp_widget_plugin_box">';

        // Display widget title if defined
       // if ( $title ) {
            //echo '<h2 style="display: flex;align-items: center">'. $title.'</h2>';
            //echo $title;
       // }
        require_once "poll_widget.php";
        // WordPress core after_widget hook (always include )
        //echo $after_widget;
    }
}
// Register the widget
function tco_poll_widget() {
    register_widget( 'Tco_Poll_Widget' );
}
add_action( 'widgets_init', 'tco_poll_widget' );

function wpb_tco_poll_shortcode() {
    require_once "poll_widget.php";
}
add_shortcode('tco-poll', 'wpb_tco_poll_shortcode');

add_action('wp_ajax_poll_ajax_request', 'poll_ajax_request');
function poll_ajax_request()
{
    global $wpdb; // this is how you get access to the database
    
    $quest = intval( $_POST['quest'] );
    $q=$wpdb->get_row("SELECT `question`,`id` FROM wp_tco_poll_questions WHERE `id`='$quest'",ARRAY_A);
    $q_ans=$wpdb->get_results("SELECT `answer`,`id` FROM wp_tco_poll_answers WHERE `question_id`='$quest'",ARRAY_A)  ;
    $inputs = '';
    $inputs .= "<p>Question</p><input class='mb-3 changed-question' style='border-radius: 0;width:213px' type='text' id='".$q['id']."' name='".$q['question']."' value='".$q['question']."' />";
    foreach($q_ans as $ans) {
        $inputs .= "<p class='".$ans['id']."'>Answer</p><div  class='d-inline-flex ".$ans['id']."'><input class='mb-3 changed-answer ' style='border-radius: 0; border-right: none' type='text' id='".$ans['id']."' name='".$ans['answer']."' value='".$ans['answer']."' /><button id='".$ans['id']."' type='button' style='border-radius:0; border-left:0' class='btn btn-outline-secondary h-25 p-1 ans-delete ".$ans['id']." '>✘</button></div>";
    }
    
    $div = "<div class='container col-6 modal-show'>".$inputs."</div>";
    echo $div;
    wp_die();
}

add_action('wp_ajax_poll_ajax_delete', 'poll_ajax_delete');
function poll_ajax_delete(){
    global $wpdb; // this is how you get access to the database
    $quest = intval( $_POST['quest'] );
    //delete in wp_tco_poll_questions -> delete in wp_tco_poll_answers -> delete in wp_tco_poll_results
    $delete_q=$wpdb->get_row("DELETE FROM `wp_tco_poll_questions` WHERE `id`='$quest' ",ARRAY_A);
    $delete_a=$wpdb->get_row("DELETE FROM `wp_tco_poll_answers` WHERE `question_id`='$quest' ",ARRAY_A);
    $delete_r=$wpdb->get_row("DELETE FROM `wp_tco_poll_results` WHERE `question_id`='$quest' ",ARRAY_A);
    echo 'congrats';
    wp_die();
}

add_action('wp_ajax_save_changes_ajax_request', 'save_changes_ajax_request');
function save_changes_ajax_request()
{
    global $wpdb;
   if(isset($_POST["changed_q"]) && $_POST["changed_q"]!=''){
       $changed_q=$_POST["changed_q"];
       $q_id=$_POST["q_id"];
       $q=$wpdb->get_row("SELECT `id` FROM wp_tco_poll_questions WHERE `id`='$q_id'",ARRAY_A);
       var_dump($q);
       $changed_a=[];
       $a_id=[];
       $changed_a=$_POST["changed_a"];
       $a_id=$_POST["a_id"];
       for($a=0;$a<count($changed_a); $a++ ){
           if($changed_a[$a]!='') $update_a = $wpdb->query("UPDATE wp_tco_poll_answers SET `answer`='$changed_a[$a]' WHERE `id`='$a_id[$a]'");
       }
       if($changed_q!='')$update_q = $wpdb->query("UPDATE wp_tco_poll_questions SET `question`='$changed_q' WHERE `id`='$q_id'");
   }
    echo 'question has been successfully updated';
    wp_die();
}
    
    add_action('wp_ajax_poll_ajax_delete_answer', 'poll_ajax_delete_answer');
    function poll_ajax_delete_answer(){
        global $wpdb; // this is how you get access to the database
        $ans_id = intval( $_POST['ans_id'] );
        //delete in wp_tco_poll_questions -> delete in wp_tco_poll_answers -> delete in wp_tco_poll_results
        $delete_a=$wpdb->get_row("DELETE FROM `wp_tco_poll_answers` WHERE `id`='$ans_id' ",ARRAY_A);
        $delete_r=$wpdb->get_row("DELETE FROM `wp_tco_poll_results` WHERE `answer_id`='$ans_id' ",ARRAY_A);
        echo 'congrats';
        wp_die();
    }