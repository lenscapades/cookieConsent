<?php

/**
 * The generic functionality of the plugin.
 *
 * @link       https://lenscapades.com
 * @since      1.0.0
 *
 * @package    Lcc
 * @subpackage Lcc/generic
 */

namespace Lcc\Generic;

/**
 * The generic functionality of the plugin.
 *
 * Defines the plugin name, version and some function to hook on.
 *
 * @package    Lcc
 * @subpackage Lcc/generic
 * @author     Marcus Hogh <hogh@lenscapades.com>
 */
class Hooks {
	/**
	 * An instance of this class should be passed to the run() function
	 * defined in Lcc\Includes\Loader as all of the hooks are defined
	 * in that particular class.
	 *
	 * The Lcc\Includes\Loader will then create the relationship
	 * between the defined hooks and the functions defined in this
	 * class.
	 */

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The current version of this plugin.
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The current version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for cookie consent dialog.
	 *
	 * Function to hook on 'wp_enqueue_scripts'.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 
			$this->plugin_name . '-generic', 
			plugin_dir_url( __FILE__ ) . 'css/cookie_consent.css', 
			array(), 
			$this->version, 
			'all' 
		);

	}

	/**
	 * Register the JavaScript for cookie consent dialog.
	 *
	 * Function to hook on 'wp_enqueue_scripts'.
	 * 
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_register_script( 
			$this->plugin_name . '-generic', 
			plugin_dir_url( __FILE__ ) . 'js/cookie_consent.js', 
			array(), 
			$this->version, 
			true 
		);
		wp_localize_script( 
			$this->plugin_name . '-generic', 
			'ajax_params', 
			array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) 
		);
		wp_enqueue_script( 			
			$this->plugin_name . '-generic' 
		);
	}

	/**
	 * Initialize consent cookie.
	 *
	 * Function to hook on 'init'.
	 * 
	 * Set a default consent cookie if no consent cookie is set.
	 * 
	 * @since    1.0.0
	 */
	public function init_cookie() {

		if (!isset($_COOKIE[LENSCAPADES_COOKIE_CONSENT_COOKIE_NAME])) {

			$cookie = new Includes\Cookies();

			$cookie->init();

			$cookie->set();
		} 

	}

	public function consent_dialog() {

		$declaration = new Includes\Declaration();

		$declaration->get();

		require_once( plugin_dir_path( __FILE__ ) . 'partials/consent_dialog-display.php');
		wp_die();
	}

	
}
