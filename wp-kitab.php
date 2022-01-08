<?php

/**
 *
 * @link              https://github.com/Ahrary
 * @since             1.0.0
 * @package           WP_Kitab
 *
 * @wordpress-plugin
 * Plugin Name:       WP Kitab
 * Plugin URI:        https://github.com/Ahrary/wp-kitab
 * Description:       WP Kitab is a simple plugin that allows you to add book post type and taxonomies to your wordpress website.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Tested up to:      5.8.2
 * Requires PHP:      7.0
 * Author:            Ahrary
 * Author URI:        https://github.com/Ahrary
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-kitab
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	die('We\'re sorry, but you can not directly access this file.');
}

// define required wp version
define('AFZUNA_WP_VERSION', '4.8');
define('AFZUNA', 'wp-kitab');
define('AFZUNA_NAME', 'WP Kitab');
define('AFZUNA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AFZUNA_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AFZUNA_MIN_PHP_VERSION', '7.0');
define('AFZUNA_ACF_VERSION', '5.0.0');


// load plugin text domain
add_action('plugins_loaded', 'wp_kitab_load_textdomain');
function wp_kitab_load_textdomain()
{
	load_plugin_textdomain(AFZUNA, false, basename(dirname(__FILE__)) . '/languages');
}


// include required files
require_once AFZUNA_PLUGIN_DIR . 'includes/class-wp-kitab.php';
require_once AFZUNA_PLUGIN_DIR . 'includes/class-wp-kitab-cpt.php';
require_once AFZUNA_PLUGIN_DIR . 'includes/class-wp-kitab-taxonomies.php';
require_once AFZUNA_PLUGIN_DIR . 'includes/class-wp-kitab-acf.php';
require_once AFZUNA_PLUGIN_DIR . 'functions/functions.php';

function wp_kitab_init()
{
	// check if wp version is compatible
	if (version_compare(get_bloginfo('version'), AFZUNA_WP_VERSION, '<')) {
		add_action('admin_notices', 'wp_kitab_admin_notice_wp_version');
		return;
	}

	// check if php version is compatible
	if (version_compare(PHP_VERSION, AFZUNA_MIN_PHP_VERSION, '<')) {
		add_action('admin_notices', 'wp_kitab_admin_notice_php_version');
		return;
	}

	// create post type
	$post_type = new WP_Kitab_CPT();
	$post_type->register();

	// create taxonomy
	$taxonomy = new WP_Kitab_Taxonomies();
	$taxonomy->register();

	// flush rewrite rules
	flush_rewrite_rules();
}


add_action('init', 'wp_kitab_init');


function wp_kitab_admin_notice_php_version()
{
	$class = 'notice notice-error';
	$message = sprintf(__('WP Kitab requires PHP version %s or higher.', 'wp-kitab'), AFZUNA_MIN_PHP_VERSION);

	printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}


function wp_kitab_admin_notice_wp_version()
{
	$class = 'notice notice-error';
	$message = sprintf(__('WP Kitab requires WordPress version %s or higher.', 'wp-kitab'), AFZUNA_WP_VERSION);

	printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}


function wp_kitab_admin_notice_acf_version()
{
	$class = 'notice notice-error';
	$message = sprintf(__('WP Kitab requires Advanced Custom Fields version %s or higher.', 'wp-kitab'), AFZUNA_ACF_VERSION);

	printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}


function wp_kitab_admin_notice_acf_not_active()
{
	$class = 'notice notice-error';
	$message = __('Advanced Custom Fields is not active.', 'wp-kitab');

	printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}


function wp_kitab_admin_notice_acf_not_installed()
{
	$class = 'notice notice-error';
	$message = __('Advanced Custom Fields is not installed.', 'wp-kitab');

	printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}


// deactivation hook
function wp_kitab_deactivation()
{
	// unregister post type
	$post_type = new WP_Kitab_CPT();
	$post_type->unregister();

	// unregister taxonomy
	$taxonomy = new WP_Kitab_Taxonomies();
	$taxonomy->unregister();
}


register_deactivation_hook(__FILE__, 'wp_kitab_deactivation');


// uninstall hook
function wp_kitab_uninstall()
{
	// unregister post type
	$post_type = new WP_Kitab_CPT();
	$post_type->unregister();

	// unregister taxonomy
	$taxonomy = new WP_Kitab_Taxonomies();
	$taxonomy->unregister();
}


register_uninstall_hook(__FILE__, 'wp_kitab_uninstall');



// run plugin
function run_wp_kitab()
{
	$plugin = new WP_Kitab();
	$plugin->run();
}
