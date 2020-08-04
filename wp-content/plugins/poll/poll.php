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
