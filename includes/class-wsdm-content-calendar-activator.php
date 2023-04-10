<?php

/**
 * Fired during plugin activation
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/includes
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Content_Calendar_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		global $wpdb, $table_prefix;
		$wp_content_calendar = $table_prefix . 'content_calendar';

		$sql = "CREATE TABLE IF NOT EXISTS `$wp_content_calendar` (
			`id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`post_title` varchar(255) NOT NULL,
			`occassion` varchar(100) NOT NULL,
			`author` varchar(100) NOT NULL,
			`reviewer` varchar(100) NOT NULL
			`date` date NOT NULL
		  ) ENGINE='MyISAM';";

		$wpdb->query($sql);

		// $data = array(
		// 	'post_title' => 'test',
		// 	'occassion' => 'test',
		// 	'author' => 'test',
		// 	'reviewer' => 'test',
		// 	'date' => '10/04/2023',
		// );

		// $wpdb->insert($wp_content_calendar, $data);
	}
}