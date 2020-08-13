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




//TCO Poll
function wpb_tco_poll_shortcode() {
    require_once "poll_widget.php";
}
//poll shortcode
add_shortcode('tco-poll', 'wpb_tco_poll_shortcode');
