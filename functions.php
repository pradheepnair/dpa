<?php
/**
 * Theme functions and definitions.
 *
 * @package     Dubai Private Adventure Theme
 * @link        http://www.dubaiprivateadventure.com
 * @author      Pradheep Nair <pradheep.pnair@gmail.com>
 * @since       1.0
 */
 final class DPA {
     private static $instance;
     public $version = '1.0';
     
     public static function instance(): DPA { 
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof DPA ) ) {
			self::$instance = new DPA();

			self::$instance->constants();
			self::$instance->includes();
// 			self::$instance->objects(); 
			
			do_action( 'dpa_loaded' );
		}
		return self::$instance;
	}
	
	private function constants() {

		if ( ! defined( 'DPA_THEME_VERSION' ) ) {
			define( 'DPA_THEME_VERSION', $this->version );
		}

		if ( ! defined( 'DPA_THEME_URI' ) ) {
			define( 'DPA_THEME_URI', get_parent_theme_file_uri() );
		}

		if ( ! defined( 'DPA_THEME_PATH' ) ) {
			define( 'DPA_THEME_PATH', get_parent_theme_file_path() );
		}
	}	
	
	public function includes() { 
	    require_once DPA_THEME_PATH . '/assets/inc/customizer.php';
	    require_once DPA_THEME_PATH . '/assets/inc/common.php';
	    // require_once DPA_THEME_PATH . '/inc/rest-api.php';
	}
 }
 
 function init() {
	return DPA::instance();
 }

 init();
 ?>