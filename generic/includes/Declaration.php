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

    $this->category = $this->json_file_get_contents( 
      plugin_dir_path( __FILE__ ) . 'data/category.json', 
      $language 
    );

    $this->cookiesByClass = $this->cookiesByClass();

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


  public function cookiesByClass() {

    $header = '<thead><tr>';
    $header .= '<th>' . $this->category->name . '</th>';
    $header .= '<th>' . $this->category->provider . '</th>';
    $header .= '<th>' . $this->category->purpose . '</th>';
    $header .= '<th>' . $this->category->expiry . '</th>';
    $header .= '<th>' . $this->category->type . '</th>';
    $header .= '</tr></thead>';

    $classes = [
      "essential" => "<table>$header",
      "functional" => "<table>$header",
      "analytical" => "<table>$header",
      "3rd-party" => "<table>$header"
    ];

    foreach ( $this->cookies as $cookie ) {

      if ( $cookie->class === "essential" ) {

        $classes[ "essential" ] .= $this->cookieTableRow($cookie);
      }

      if ( $cookie->class === "functional" ) {

        $classes[ "functional" ] .= $this->cookieTableRow($cookie);
      }

      if ( $cookie->class === "analytical" ) {

        $classes[ "analytical" ] .= $this->cookieTableRow($cookie);
      }

      if ( $cookie->class === "3rd-party" ) {

        $classes[ "3rd-party" ] .= $this->cookieTableRow($cookie);
      }
    }
    $classes[ "essential" ] .= '</table>';
    $classes[ "functional" ] .= '</table>';
    $classes[ "analytical" ] .= '</table>';
    $classes[ "3rd-party" ] .= '</table>';

    return $classes;
  }

  private function cookieTableRow($cookie) {

    $html = '<tr>';
    $html .= '<td data-header="'. $this->category->name .'">' . $cookie->name . '</td>';
    $html .= '<td data-header="'. $this->category->provider .'">' . $cookie->provider . '</td>';
    $html .= '<td data-header="'. $this->category->purpose .'">' . $cookie->purpose . '</td>';
    $html .= '<td data-header="'. $this->category->expiry .'">' . $cookie->expiry . '</td>';
    $html .= '<td data-header="'. $this->category->type .'">' . $cookie->type . '</td>';
    $html .= '<tr>';

    return $html;
  }
}	