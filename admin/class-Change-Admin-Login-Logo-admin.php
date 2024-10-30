<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://ensivosolutions.com
 * @since      1.0.0
 *
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Change-Admin-Login-Logo
 * @subpackage Change-Admin-Login-Logo/admin
 * @author     Pratik Tambekar <pratik.tambekar91@gmail.com>
 */
class change_logo_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function prt_plugin_menus()
	{
		//syntax
		// add_menu_page(string $page_title,string $menu_title,string $capability,string $menu_slug, callable $function = '',string $icon_url = '',int $position = null);

		add_menu_page('Add Image', 'Add Image', 'manage_options', 'prt-playlist', array($this, 'prt_boiler_add_playlist'),'dashicons-admin-media',53 );

		//syntax for submenu
		// add_submenu_page(string $parent_slug,string $page_title,string $menu_title,string $capability,string $menu_slug,callable $function = '');
                    //Note -- we pass parent slug to chlid all palylist so when we hover on PRT Playlist it automatically activate all paylist
		// add_submenu_page('prt-playlist', "All Playlist",  "All Playlist", 'manage_options', 'prt-playlist', array($this, 'prt_boiler_all_playlist'));
		 add_submenu_page('submenu-first', "Add Image",  "Add Image", 'manage_options', 'submenu-first',array($this, 'prt_boiler_add_playlist'));
	}

	// public function prt_boiler_all_playlist()
	// {
	// 	include_once PRT_BOILER_PLUGIN_DIR.'/admin/partials/prt_boiler_all_playlist.php';

	// }

	public function prt_boiler_add_playlist()
	{
		include_once Change_Admin_Login_Logo_DIR.'/admin/partials/Change_Admin_Login_Logo_add_playlist.php';

	}



	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Change-Admin-Login-Logo as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Change-Admin-Login-Logo will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/prt-boilerplate-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'bootstrap.min.css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array() );

		wp_enqueue_style( 'jquery.dataTables.min.css', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', array() );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Change-Admin-Login-Logo as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Change-Admin-Login-Logo will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/prt-boilerplate-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'bootstrap.min.js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'jquery.dataTables.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, true );

		wp_enqueue_script( 'jquery.validate.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js', array( 'jquery' ), $this->version, true );

		wp_enqueue_script( 'custom.js', plugin_dir_url( __FILE__ ) . 'js/custom.js', array( 'jquery' ), $this->version, true );
		//like that var plugin_vars = {"ajaxurl":"http:\/\/localhost:81\/mywordpress\/wp-admin\/admin-ajax.php"};
		wp_localize_script( 'custom.js', "plugin_vars", array(

			"ajaxurl"=>admin_url("admin-ajax.php")
		) );

		wp_localize_script( 'custom.js', "plugin_vars1", array(

			"ajaxurl"=>admin_url("admin-ajax.php")
		) );

	}

	public function boiler_plugin_ajax_handler()
	{
		global $wpdb;
		$table_prefix = $wpdb->prefix . "options";
		$param = isset($_REQUEST['param'])?trim(sanitize_text_field($_REQUEST['param'])):"";
		if($param == "add_playlist")
		{
			$image_count = $wpdb->get_var( "SELECT count(*) FROM $table_prefix WHERE `option_name`='_admin_login_logo'" );
			if($image_count==0)
			{
				$wpdb->insert(
					"$table_prefix",
					array(
						"option_name"=> '_admin_login_logo',
						"option_value"=> sanitize_text_field($_REQUEST['upload-img'])
					)
					);
				if($wpdb->insert_id >0){
					echo esc_html("Record inserted successfully");
				}else{

					echo esc_html("Record doesn't inserted successfully");
				}
			}else{
				$wpdb->update( 
					$table_prefix, 
					array( 
						'option_value' => sanitize_text_field($_REQUEST['upload-img'])	// string
						
					), 
					array( 'option_name' => '_admin_login_logo' ), 
					array( 
						'%s'	// value1
						
					), 
					array( '%s' ) 
				);
				echo esc_html("Record has been updated successfully");
			}
		}
		wp_die();
	}
	function prt_update_login_logo_url1($url)
	{
	
			return get_site_url();

	}
	function prt_updatelogin_logo_title1($title)
	{
	
	 	return get_bloginfo();

	}
	function my_login_logo() {
		global $wpdb;
		$table_prefix = $wpdb->prefix . "options";
		$image_url = $wpdb->get_var( "SELECT `option_value` FROM $table_prefix WHERE `option_name`='_admin_login_logo'" );
		 ?>
		<style type="text/css">
		    #login h1 a, .login h1 a {
		        background-image: url(<?php echo esc_url($image_url);?>);
		        height: 65px;
		        width: 320px;
		        background-size: contain;
		        background-repeat: no-repeat;
		        padding-bottom: 30px;
		    }
		</style>
	        <?php }

	

}
