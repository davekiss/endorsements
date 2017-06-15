<?php
/**
 * Plugin Name:     Endorsements
 * Plugin URI:      http://davekiss.com
 * Description:     Add social proof to your site with this React-powered WordPress plugin.
 * Author:          Dave Kiss
 * Author URI:      http://davekiss.com
 * Text Domain:     endorsements
 * Domain Path:     /languages
 * Version:         1.0
 *
 * @package         Endorsements
 */

if ( ! class_exists( 'Endorsements' ) ) {

  class Endorsements {

    /**
     * The Endorsements instance
     *
     * @var instanceof Endorsements
     */
    private static $instance = NULL;


    /**
     * Creates or returns an instance of this class.
     *
     * @return  Endorsements  A single instance of this class.
     */
    public static function get_instance() {
      if ( ! isset( self::$instance ) AND ! ( self::$instance instanceof Endorsements  ) ) {
        self::$instance = new self;
        self::$instance->_define_constants();
        self::$instance->_include_files();

        new Endorsements\CPT\Endorsement;

        if ( is_admin() ) {
          new \Endorsements\Backend\Metabox;
        }
      }

      return self::$instance;
    }


    /**
     * Define all of the constants used throughout the plugin.
     *
     * @return void
     */
    private function _define_constants() {
      define( 'ENDORSEMENTS_DEV', true);
      define( 'ENDORSEMENTS_URL',  ENDORSEMENTS_DEV ? 'http://localhost:8080/' : plugin_dir_url(__FILE__) );
      define( 'ENDORSEMENTS_APP_ROOT_URL',  ENDORSEMENTS_DEV ? 'http://localhost:8080/' : plugin_dir_url(__FILE__) . 'dist/' );
      define( 'ENDORSEMENTS_PATH', plugin_dir_path(__FILE__) );
      define( 'ENDORSEMENTS_BASENAME', plugin_basename( __FILE__ ) );
      define( 'ENDORSEMENTS_VERSION', '1.0');
    }


    /**
     * Include the files required by the Endorsements plugin.
     *
     * @return void
     */
    private function _include_files() {
      require_once ENDORSEMENTS_PATH . 'lib/core/post-types/endorsement.php';

      if ( is_admin() ) {
        require_once ENDORSEMENTS_PATH . 'lib/backend/metabox.php';
      }
    }
  }
}

/**
 * The main function responsible for returning the one true Endorsements
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $Endorsements = Endorsements(); ?>
 *
 * @return object The one true Endorsements Instance
 */
if ( ! function_exists('Endorsements') ) {

  function Endorsements() {
    return Endorsements::get_instance();
  }

  // Off to school!
  Endorsements();

}
