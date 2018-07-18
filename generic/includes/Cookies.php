<?php 

/**
 * ...
 *
 * @link       https://lenscapades.com
 * @since      1.0.0
 *
 * @package    Lcc
 * @subpackage Lcc/generic
 */

namespace Lcc\Generic\Includes;

/**
 * ...
 *
 * ...
 *
 * @since      1.0.0
 * @package    Lcc
 * @subpackage Lcc/generic
 * @author     Marcus Hogh <hogh@lenscapades.com>
 */
class Cookies {

	/**
	 * The cookie data.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $cookie_data    The cookie_data.
	 */

	private $cookie_data;

	/**
	 * Initialize the class.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->cookie_data = null;

	}
	/**
	 * Initialize cookie data.
	 *
	 *
	 * @since    1.0.0
	 */
	public function init() {

		$this->cookie_data = array(
			'id' => $this->getUserHash(),
			'necessary' => 1,
			'preferences' => 1,
			'statistics' => 1,
			'marketing' => 0,
			'consented' => 0,
			'declined' => 0,
			'hasResponse' => 0,
			'doNotTrack' => 0
		);
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function toString() {

		return join( ':', $this->cookie_data );
	}

	/**
	 * Set cookie.
	 *
	 * @since    1.0.0
	 */
	public function set() {

		setcookie(
			LENSCAPADES_COOKIE_CONSENT_COOKIE_NAME, 
			$this->toString(),
			time() + LENSCAPADES_COOKIE_CONSENT_EXPIRATION,
			LENSCAPADES_COOKIE_CONSENT_COOKIE_PATH,
			LENSCAPADES_COOKIE_CONSENT_COOKIE_DOMAIN
		);
	}

	/**
	 * Get user IP.
	 *
	 * @since    1.0.0
	 */
	public function getUserIp() {

		$serverKeys = array(
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_X_CLUSTER_CLIENT_IP',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'REMOTE_ADDR'
		);

		foreach ($serverKeys as $key) {
			if (array_key_exists($key, $_SERVER) === true) {
					foreach (explode(',', $_SERVER[$key]) as $ip) {
						 if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
						 	return $ip;
					 }
				 }
			}
	 }
	 return '';
 }

 /**
	 * Get user hash.
	 *
	 * @since    1.0.0
	 */
	public function getUserHash() {

		return hash( 'sha256', time() . $this->getUserIp() );
	}
}
