<?php
/*
Plugin Name: Zentester for Wordpress
Plugin URI: http://www.zentester.com
Description: Enables <a href="http://www.zentester.com/">Zentester</a> on all pages.
Version: 1.0.0
Author: Evolutionary Software
Author URI: http://www.evosoft.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_zentester() {
  add_option('zentester_test_key', 'XXXXXXXXXXXXXXXX');
}

function deactive_zentester() {
  delete_option('zentester_test_key');
}

function admin_init_zentester() {
  register_setting('zentester', 'zentester_test_key');
}

function admin_menu_zentester() {
  add_options_page('Zentester', 'Zentester', 8, 'zentester', 'options_page_zentester');
}

function options_page_zentester() {
  include(WP_PLUGIN_DIR.'/zentester/options.php');  
}

function load_zentester($zentester_test_key) {
?>
<script type="text/javascript" src="http://app.zentester.com/index.php/remote/load_zentester/<?php echo $zentester_test_key?>/zentester.js"></script>"
<?php
}

function zentester() { 
  
  $zentester_test_key = get_option('zentester_test_key');
  
  load_zentester($zentester_test_key);

}

register_activation_hook(__FILE__, 'activate_zentester');
register_deactivation_hook(__FILE__, 'deactive_zentester');

if (is_admin()) {
  add_action('admin_init', 'admin_init_zentester');
  add_action('admin_menu', 'admin_menu_zentester');
}

add_action('wp_head', 'zentester');

?>