<?php

/**
 * Fired during plugin activation
 *
 * @link       http://ensivosolutions.com
 * @since      1.0.0
 *
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/includes
 * @author     Pratik Tambekar <pratik.tambekar91@gmail.com>
 */
class Activator {

	public $table;
	public function __construct($table_var)
	{
		$this->table = $table_var;
	}
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		
	}

}
