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
class Declaration {

  public $content;

	/**
	 * Initialize the class.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

  }

  public function get() {

    $language = $this->getLanguage();
        
    $this->auto = $this->json_file_get_contents( 
      plugin_dir_path( __FILE__ ) . 'data/auto.json', 
      $language 
    );

    $this->content = $this->json_file_get_contents( 
      plugin_dir_path( __FILE__ ) . 'data/content.json', 
      $language 
    );

    $this->cookies = $this->json_file_get_contents( 
      plugin_dir_path( __FILE__ ) . 'data/cookies.json', 
      $language 
    );

    $this->cookies_by_class = $this->cookies_by_class( $this->cookies );

  }
  
  public function getLanguage() {

    if (isset($_POST['language']) && $_POST['language']) {

      $language = $_POST['language'];
    }
    else
    {
      if ( function_exists( 'pll_current_language' ) ) {

        $language = pll_current_language( 'locale');

      } 
      else 
      {
        $language = get_locale();
      }
    }

    if (preg_match('/^de/i', $language)) {
        $language = 'de';
    }
    else
    {
      $language = 'en';
    }

    return $language;
  }

  public function json_file_get_contents( $file, $language ) {

		$json_data = file_get_contents( $file );

		$data = json_decode( $json_data, true );

		$this->json_error( $data );

		return $data[ $language ];
	}

	public function json_error( $decoded ) {
		//Backwards compatability.
		if ( !function_exists( 'json_last_error' ) ) {
			if ( $decoded === false || $decoded === null ) {
				throw new Exception( 'Could not decode JSON!' );
			}
		} else {
			//Get the last JSON error.
			$jsonError = json_last_error();
			//In some cases, this will happen.
			if ( is_null( $decoded ) && $jsonError == JSON_ERROR_NONE ) {
				throw new Exception('Could not decode JSON!');
			}
			//If an error exists.
			if ( $jsonError != JSON_ERROR_NONE ) {
				$error = 'Could not decode JSON! ';
				//Use a switch statement to figure out the exact error.
				switch ( $jsonError ) {
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
				throw new Exception( $error );
			}
    }
  }

  public function cookies_by_class( $cookies ) {

    $classes = [
      "essential" => "",
      "functional" => "",
      "analytical" => "",
      "3rd-party" => ""
    ];

    foreach ( $cookies as $cookie ) {
      if ( $cookie[ "class" ] === "essential" ) {
        $classes[ "essential" ] .= $cookie[ "name" ] . "\n";
      }
      if ( $cookie[ "class" ] === "functional" ) {
        $classes[ "functional" ] .= $cookie[ "name" ] . "\n";
      }
      if ( $cookie[ "class" ] === "analytical" ) {
        $classes[ "analytical" ] .= $cookie[ "name" ] . "\n";
      }
      if ( $cookie[ "class" ] === "3rd-party" ) {
        $classes[ "3rd-party" ] .= $cookie[ "name" ] . "\n";
      }
    }
    return $classes;
  }

}	