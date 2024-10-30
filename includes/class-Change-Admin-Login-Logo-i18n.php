<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://ensivosolutions.com
 * @since      1.0.0
 *
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/includes
 * @author     Pratik Tambekar <pratik.tambekar91@gmail.com>
 */
class change_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'Change-Admin-Login-Logo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
