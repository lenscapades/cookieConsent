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
class JSON {

  private static $caller;

  private static $data;

  public static function decode($json, $assoc=FALSE) {

    JSON::$caller = 'decode';

    JSON::$data = json_decode($json, $assoc);

    JSON::error();

    return JSON::$data;
  }

  public static function file_get_contents($file) {

		return JSON::decode(file_get_contents($file));
  }

  private static function get_error_msg() {

    switch (JSON::$caller) {

      case 'decode':

        $error_msg = 'Could not decode JSON!';
        break;

      case 'encode':

        $error_msg = 'Could not encode to JSON!';
        break;

      default:

        $error_msg = 'Unknown JSON error!';
        break;
    }

    return $error_msg;
  }

  private static function error() {

		/**
     * This is for backwards compatability.
     */
		if (!function_exists('json_last_error')) {

		  if (JSON::$data === false || JSON::$data === null) {

				trigger_error(JSON::get_error_msg(), E_USER_ERROR);
			}
    } 
    else 
    {
			/**
       * Get the last JSON error.
       */
			$jsonError = json_last_error();
			/**
       * In some cases, this will happen.
       */
			if (is_null(JSON::$data) && $jsonError == JSON_ERROR_NONE) {

				trigger_error(JSON::get_error_msg(), E_USER_ERROR);
			}
			/**
       * If an error exists.
       */
			if ($jsonError != JSON_ERROR_NONE) {

				$error = JSON::get_error_msg() . ' ';
				
				switch ($jsonError) {

          case JSON_ERROR_DEPTH:
          
						$error .= 'Maximum depth exceeded!';
            break;
            
          case JSON_ERROR_STATE_MISMATCH:
          
						$error .= 'Underflow or the modes mismatch!';
            break;
            
          case JSON_ERROR_CTRL_CHAR:
          
						$error .= 'Unexpected control character found';
            break;
            
          case JSON_ERROR_SYNTAX:
          
						$error .= 'Malformed JSON';
            break;
            
          case JSON_ERROR_UTF8:
          
						$error .= 'Malformed UTF-8 characters found!';
            break;
            
          default:
          
						$error .= 'Unknown error!';
						break;
        }
        
				trigger_error($error, E_USER_ERROR);
			}
    }
  }
}