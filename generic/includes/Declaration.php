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

    $this->cookiesByClass = $this->cookiesByClass( $this->cookies );

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

  public function json_file_get_contents($file, $language) {

		$data = JSON::file_get_contents($file);

		return $data->{$language};
	}


  public function cookiesByClass($cookies) {

    $classes = [
      "essential" => "",
      "functional" => "",
      "analytical" => "",
      "3rd-party" => ""
    ];

    foreach ( $cookies as $cookie ) {

      if ( $cookie->class === "essential" ) {
        $classes[ "essential" ] .= $cookie->name . "\n";
      }
      if ( $cookie->class === "functional" ) {
        $classes[ "functional" ] .= $cookie->name . "\n";
      }
      if ( $cookie->class === "analytical" ) {
        $classes[ "analytical" ] .= $cookie->name . "\n";
      }
      if ( $cookie->class === "3rd-party" ) {
        $classes[ "3rd-party" ] .= $cookie->name . "\n";
      }
    }
    return $classes;
  }

}	