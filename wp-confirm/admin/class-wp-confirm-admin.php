<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.greelogix.com/
 * @since      1.0.0
 *
 * @package    Wp_Confirm
 * @subpackage Wp_Confirm/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Confirm
 * @subpackage Wp_Confirm/admin
 * @author     Abuzer <abuzer.cs@gmail.com>
 */
class Wp_Confirm_Admin {

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
		 * defined in Wp_Confirm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Confirm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-confirm-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wp_Confirm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Confirm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-confirm-admin.js', array( 'jquery' ), $this->version, false );

	}

}


/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class WPConfirm {
	private $wp_confirm_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wp_confirm_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wp_confirm_page_init' ) );
	}

	public function wp_confirm_add_plugin_page() {
		add_options_page(
			'WP Confirm', // page_title
			'WP Confirm', // menu_title
			'manage_options', // capability
			'wp-confirm', // menu_slug
			array( $this, 'wp_confirm_create_admin_page' ) // function
		);
	}

	public function wp_confirm_create_admin_page() {
		$this->wp_confirm_options = get_option( 'wp_confirm_option_name' ); ?>

		<div class="wrap">
			<h2>WP Confirm</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'wp_confirm_option_group' );
					do_settings_sections( 'wp-confirm-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function wp_confirm_page_init() {
		register_setting(
			'wp_confirm_option_group', // option_group
			'wp_confirm_option_name', // option_name
			array( $this, 'wp_confirm_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'wp_confirm_setting_section', // id
			'Settings', // title
			array( $this, 'wp_confirm_section_info' ), // callback
			'wp-confirm-admin' // page
		);

		add_settings_field(
			'enable_confirm_on_post_publish_0', // id
			'Enable confirm on post publish?', // title
			array( $this, 'enable_confirm_on_post_publish_0_callback' ), // callback
			'wp-confirm-admin', // page
			'wp_confirm_setting_section' // section
		);

		add_settings_field(
			'enable_confirm_on_menu_save_1', // id
			'Enable confirm on menu save?', // title
			array( $this, 'enable_confirm_on_menu_save_1_callback' ), // callback
			'wp-confirm-admin', // page
			'wp_confirm_setting_section' // section
		);

		// add_settings_field(
		// 	'enable_confirm_on_permalink_save_2', // id
		// 	'Enable confirm on permalink save?', // title
		// 	array( $this, 'enable_confirm_on_permalink_save_2_callback' ), // callback
		// 	'wp-confirm-admin', // page
		// 	'wp_confirm_setting_section' // section
		// );
	}

	public function wp_confirm_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['enable_confirm_on_post_publish_0'] ) ) {
			$sanitary_values['enable_confirm_on_post_publish_0'] = $input['enable_confirm_on_post_publish_0'];
		}

		if ( isset( $input['enable_confirm_on_menu_save_1'] ) ) {
			$sanitary_values['enable_confirm_on_menu_save_1'] = $input['enable_confirm_on_menu_save_1'];
		}

		if ( isset( $input['enable_confirm_on_permalink_save_2'] ) ) {
			$sanitary_values['enable_confirm_on_permalink_save_2'] = $input['enable_confirm_on_permalink_save_2'];
		}

		return $sanitary_values;
	}

	public function wp_confirm_section_info() {
		
	}

	public function enable_confirm_on_post_publish_0_callback() {
		printf(
			'<input type="checkbox" name="wp_confirm_option_name[enable_confirm_on_post_publish_0]" id="enable_confirm_on_post_publish_0" value="enable_confirm_on_post_publish_0" %s>',
			( isset( $this->wp_confirm_options['enable_confirm_on_post_publish_0'] ) && $this->wp_confirm_options['enable_confirm_on_post_publish_0'] === 'enable_confirm_on_post_publish_0' ) ? 'checked' : ''
		);
	}

	public function enable_confirm_on_menu_save_1_callback() {
		printf(
			'<input type="checkbox" name="wp_confirm_option_name[enable_confirm_on_menu_save_1]" id="enable_confirm_on_menu_save_1" value="enable_confirm_on_menu_save_1" %s>',
			( isset( $this->wp_confirm_options['enable_confirm_on_menu_save_1'] ) && $this->wp_confirm_options['enable_confirm_on_menu_save_1'] === 'enable_confirm_on_menu_save_1' ) ? 'checked' : ''
		);
	}

	public function enable_confirm_on_permalink_save_2_callback() {
		printf(
			'<input type="checkbox" name="wp_confirm_option_name[enable_confirm_on_permalink_save_2]" id="enable_confirm_on_permalink_save_2" value="enable_confirm_on_permalink_save_2" %s>',
			( isset( $this->wp_confirm_options['enable_confirm_on_permalink_save_2'] ) && $this->wp_confirm_options['enable_confirm_on_permalink_save_2'] === 'enable_confirm_on_permalink_save_2' ) ? 'checked' : ''
		);
	}

}
if ( is_admin() )
	$wp_confirm = new WPConfirm();

/* 
 * Retrieve this value with:
 * $wp_confirm_options = get_option( 'wp_confirm_option_name' ); // Array of All Options
 * $enable_confirm_on_post_publish_0 = $wp_confirm_options['enable_confirm_on_post_publish_0']; // Enable confirm on post publish?
 * $enable_confirm_on_menu_save_1 = $wp_confirm_options['enable_confirm_on_menu_save_1']; // Enable confirm on menu save?
 * $enable_confirm_on_permalink_save_2 = $wp_confirm_options['enable_confirm_on_permalink_save_2']; // Enable confirm on permalink save?
 */




function wpconfirm_confirm_message_publish(){

	$c_message = 'Are you sure you want to publish this post?'; 

	$wp_confirm_options = get_option( 'wp_confirm_option_name' ); // Array of All Options
	$enable_confirm_on_post_publish_0 = $wp_confirm_options['enable_confirm_on_post_publish_0']; // Enable confirm on post publish?
	$enable_confirm_on_menu_save_1 = $wp_confirm_options['enable_confirm_on_menu_save_1']; // Enable confirm on menu save?
	$enable_confirm_on_permalink_save_2 = $wp_confirm_options['enable_confirm_on_permalink_save_2']; // Enable confirm on permalink save?

	if (
		isset( $wp_confirm_options['enable_confirm_on_post_publish_0'] ) 
		&& 
		$wp_confirm_options['enable_confirm_on_post_publish_0'] === 'enable_confirm_on_post_publish_0' 
		){
		echo ' <script type="text/javascript">
		var publish = document.getElementById("publish");
		if (publish !== null ) 
		    publish.onclick = function(){ if( document.getElementById("publish").value == "Publish" ) {return confirm("'.$c_message.'");} };
		</script>';
	}

	$c_message = 'Are you sure you want to save menu?'; 

	if (
		isset( $wp_confirm_options['enable_confirm_on_menu_save_1'] ) 
		&& 
		$wp_confirm_options['enable_confirm_on_menu_save_1'] === 'enable_confirm_on_menu_save_1' 
		){
		echo ' <script type="text/javascript">
		var save_menu_header = document.getElementById("save_menu_header");
		if (save_menu_header !== null ) 
		    save_menu_header.onclick = function(){ if( document.getElementById("save_menu_header").value == "Save Menu" ) {return confirm("'.$c_message.'");} };
		</script>';
	}


	
	
}



add_action('admin_footer', 'wpconfirm_confirm_message_publish');
