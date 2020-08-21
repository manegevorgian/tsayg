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
function deregisterPlugin(){
    register_deactivation_hook( __FILE__, 'pollPluginSecondCallback' );
}

function pollPluginCallback()
{
    ?>
    <script>alert('plugin activated')</script>
<?php
}
function pollPluginSecondCallback()
{
    ?>
    <script>alert('plugin deactivated')</script>
<?php
}
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
        require_once "poll_widget.php";
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
function poll_ajax_request(){
    global $wpdb;
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
    global $wpdb;
    $quest = intval( $_POST['quest'] );
    $delete_q=$wpdb->get_row("DELETE FROM `wp_tco_poll_questions` WHERE `id`='$quest' ",ARRAY_A);
    $delete_a=$wpdb->get_row("DELETE FROM `wp_tco_poll_answers` WHERE `question_id`='$quest' ",ARRAY_A);
    $delete_r=$wpdb->get_row("DELETE FROM `wp_tco_poll_results` WHERE `question_id`='$quest' ",ARRAY_A);
    echo 'congrats';
    wp_die();
}

add_action('wp_ajax_save_changes_ajax_request', 'save_changes_ajax_request');
function save_changes_ajax_request(){
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
        global $wpdb;
        $ans_id = intval( $_POST['ans_id'] );
        $delete_a=$wpdb->get_row("DELETE FROM `wp_tco_poll_answers` WHERE `id`='$ans_id'",ARRAY_A);
        $delete_r=$wpdb->get_row("DELETE FROM `wp_tco_poll_results` WHERE `answer_id`='$ans_id'",ARRAY_A);
        echo 'congrats';
        wp_die();
    }
    
    add_action('wp_ajax_poll_ajax_active', 'poll_ajax_active');
    function poll_ajax_active(){
        global $wpdb;
        $get_row=$wpdb->get_results("SELECT `id` FROM `wp_tco_poll_active`",ARRAY_A);
        $id=$get_row[0]["id"];
        $delete_row=$wpdb->get_row("DELETE FROM `wp_tco_poll_active` WHERE `id`='$id'",ARRAY_A);
        $tableName='wp_tco_poll_active';
        if ($_POST['quest']!='' && $_POST['quest'] != null) {
            $active_id=$_POST["quest"];
            $wpdb->insert(
                $tableName,
                array(
                    'question_id' => $active_id
                ),
                array(
                    '%d'
                )
            );
            echo $active_id;
        }
        wp_die();
    }