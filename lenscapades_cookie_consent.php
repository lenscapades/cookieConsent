<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://lenscapades.com
 * @since             1.0.0
 * @package           Lcc
 *
 * @wordpress-plugin
 * Plugin Name:       CookieConsent
 * Plugin URI:        https://lenscapades.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Marcus Hogh
 * Author URI:        https://lenscapades.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lenscapades_cookie_consent
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * Current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Update it as you release new versions.
 */
define( 'LENSCAPADES_COOKIE_CONSENT_VERSION', '1.0.0' );

require_once plugin_dir_path( __FILE__ ) . 'config.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lenscapades_cookie_consent-activator.php
 */
function activate_lenscapades_cookie_consent() {
	Lcc\Includes\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lenscapades_cookie_consent-deactivator.php
 */
function deactivate_lenscapades_cookie_consent() {
	Lcc\Includes\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lenscapades_cookie_consent' );
register_deactivation_hook( __FILE__, 'deactivate_lenscapades_cookie_consent' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lenscapades_cookie_consent() {

	$plugin = new Lcc\Includes\CookieConsent();
	$plugin->run();

}
run_lenscapades_cookie_consent();
