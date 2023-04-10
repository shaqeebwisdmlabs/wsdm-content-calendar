<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/admin
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Content_Calendar_Admin
{

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
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wsdm_Content_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wsdm_Content_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wsdm-content-calendar-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wsdm_Content_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wsdm_Content_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wsdm-content-calendar-admin.js', array('jquery'), $this->version, false);
	}

	public function wsdm_register_menu()
	{
		add_menu_page("WSDM Content Calendar Settings", "WSDM Calendar", "manage_options", "wsdm-content-calendar", array($this, "wsdm_calendar_settings"), "dashicons-calendar-alt", 6);

		add_submenu_page("wsdm-content-calendar", "Plan Content", "Plan Content", "manage_options", "wsdm-content-calendar", array($this, "wsdm_calendar_settings"));

		add_submenu_page("wsdm-content-calendar", "WSDM Content Calendar", "Content Calendar", "manage_options", "content-calendar", array($this, "wsdm_calendar_sub_page"));
	}

	public function wsdm_calendar_settings()
	{
		require_once 'partials/wsdm-content-calendar-admin-display.php';
	}

	public function wsdm_calendar_sub_page()
	{
		require_once 'partials/content-calendar.php';
	}

	// public function wsdm_register_calendar_settings()
	// {
	// 	register_setting('content_calendar', 'publishingdate');
	// 	register_setting('content_calendar', 'occasion');
	// 	register_setting('content_calendar', 'posttitle');
	// 	register_setting('content_calendar', 'post_author');
	// 	register_setting('content_calendar', 'post_reviewer');
	// }
}