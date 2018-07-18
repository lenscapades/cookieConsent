<?php 

/**
 * Fired during plugin activation
 *
 * @link       https://lenscapades.com
 * @since      1.0.0
 *
 * @package    Lcc
 * @subpackage Lcc/includes
 */

namespace Lcc\Includes;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Lcc
 * @subpackage Lcc/includes
 * @author     Marcus Hogh <hogh@lenscapades.com>
 */
class Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		\Lcc\Includes\Activator::createDbTable();
	}

	public static function createDbTable() {

		global $wpdb;
		
		$table_name = \Lcc\Includes\Activator::getDbTableName();
		
		$charset_collate = $wpdb->get_charset_collate();
	
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			name tinytext NOT NULL,
			text text NOT NULL,
			url varchar(55) DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	
		add_option( 'lcc_db_version', LENSCAPADES_COOKIE_CONSENT_VERSION );
		
	}

	public static function getDbTableName() {

		global $wpdb;
		
		return $wpdb->prefix . LENSCAPADES_COOKIE_CONSENT_DBTABLE_NAME;

	}
}
