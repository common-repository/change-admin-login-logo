<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://ensivosolutions.com
 * @since      1.0.0
 *
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/includes
 * @author     Pratik Tambekar <pratik.tambekar91@gmail.com>
 */
class Deactivator {

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
	public function deactivate() {
		

	}

}
