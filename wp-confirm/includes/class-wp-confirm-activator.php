<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.greelogix.com/
 * @since      1.0.0
 *
 * @package    Wp_Confirm
 * @subpackage Wp_Confirm/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Confirm
 * @subpackage Wp_Confirm/includes
 * @author     Abuzer <abuzer.cs@gmail.com>
 */
class Wp_Confirm_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$default_options = array(
			'enable_confirm_on_post_publish_0' => 'enable_confirm_on_post_publish_0',
			'enable_confirm_on_menu_save_1' => 'enable_confirm_on_menu_save_1'
		);
		update_option('wp_confirm_option_name', $default_options);
		
	}

}
