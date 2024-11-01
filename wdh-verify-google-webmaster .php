<?php
/*
Plugin Name: Verify Google Webmaster Tools
Plugin URI: http://webdevelopmenthub.com
Description: Verify Your Google webmaster tool account with meta tag. 
Version: 1.3
Author: Molina Angeline
Author URI: http://webdevelopmenthub.com
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', content_url());
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', content_url());
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', plugin_dir_path());
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', plugin_dir_path());

function activate_google_w_master_tools() {
  add_option('gwebmasters_code', 'Paste your Google Webmaster Tools verification code here');
}

function deactive_google_w_master_tools() {
  delete_option('gwebmasters_code');
}

function admin_init_google_w_master_tools() {
  register_setting('google_w_master_tools', 'gwebmasters_code');
}

function admin_menu_google_w_master_tools() {
  add_options_page('Google Webmaster Tools', 'Verify Google Webmaster', 'manage_options', 'google_w_master_tools', 'options_page_google_w_master_tools');
}

function options_page_google_w_master_tools() {
  include(WP_PLUGIN_DIR.'/wdh-verify-google-webmaster/options.php');  
}

function google_w_master_tools() {
  $gwebmasters_code = get_option('gwebmasters_code');
?>

<!-- Google Webmaster Tools plugin for WordPress -->
<?php echo $gwebmasters_code ?>

<?php
}

register_activation_hook(__FILE__, 'activate_google_w_master_tools');
register_deactivation_hook(__FILE__, 'deactive_google_w_master_tools');

if (is_admin()) {
  add_action('admin_init', 'admin_init_google_w_master_tools');
  add_action('admin_menu', 'admin_menu_google_w_master_tools');
}

if (!is_admin()) {
  add_action('wp_head', 'google_w_master_tools');
}

?>