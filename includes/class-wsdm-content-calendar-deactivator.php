<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/includes
 * @author     Shaqeeb Akhtar <shaqeeb.akhtar@wisdmlabs.com>
 */
class Wsdm_Content_Calendar_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		global $wpdb, $table_prefix;
		$wp_content_calendar = $table_prefix . 'content_calendar';

		$sql = "TRUNCATE `$wp_content_calendar`;";
		$wpdb->query($sql);
	}
}
