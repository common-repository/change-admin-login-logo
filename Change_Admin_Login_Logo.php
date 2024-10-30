<?php

/**
 * https://www.youtube.com/watch?v=X8qArsKeRjM&list=PLT9miexWCpPU4FFva8j-0cq2FcwOouOZQ&index=4
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ensivosolutions.com
 * @since             1.0.0
 * @package           Change-Admin-Login-Logo
 *
 * @wordpress-plugin
 * Plugin Name:       Admin-Logo-Title-URL Changer
 * Plugin URI:        http://ensivosolutions.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Pratik Tambekar
 * Author URI:        http://ensivosolutions.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Admin-Logo-Title-URL Changer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'Change_Admin_Login_Logo_VERSION', '1.0.0' );

if(!defined('Change_Admin_Login_Logo_DIR'))
{
	define('Change_Admin_Login_Logo_DIR', plugin_dir_path(__FILE__));
}
if(!defined('Change_Admin_Login_Logo_URL'))
{
	define('Change_Admin_Login_Logo_URL', plugins_url() . "/change-admin-login-logo"); //change-admin-login-logo is slug name
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-prt-boilerplate-activator.php
 */
function activate_change_admin_logo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-Change-Admin-Login-Logo-activator.php';
	//$tables = prt_boiler_table_generator();
	$activator = new Activator($tables);
	$activator->activate();
	//Prt_Boilerplate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-prt-boilerplate-deactivator.php
 */
function deactivate_change_admin_logo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-Change-Admin-Login-Logo-deactivator.php';
	//$tables = prt_boiler_table_generator();
	$deactivator = new Deactivator($tables);
	$deactivator->deactivate();
	//Prt_Boilerplate_Deactivator::deactivate();
}

// function prt_boiler_table_generator()
// {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prt-boiler-tables_name.php';
// 	$table = new Prt_Boilerplate_Tables();
// 	return $table;

// }

register_activation_hook( __FILE__, 'activate_change_admin_logo' );
register_deactivation_hook( __FILE__, 'deactivate_change_admin_logo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-Change-Admin-Login-Logo.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_change_admin_logo() {

	$plugin = new Change_Logo();
	$plugin->run();

}
run_change_admin_logo();
