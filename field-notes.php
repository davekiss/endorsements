<?php
/**
 * Plugin Name:     Field Notes
 * Plugin URI:      http://davekiss.com
 * Description:     Track the trails you've traversed using this React-powered WordPress plugin.
 * Author:          Dave Kiss
 * Author URI:      http://davekiss.com
 * Text Domain:     field-notes
 * Domain Path:     /languages
 * Version:         1.0
 *
 * @package         Endorsements
 */

if ( ! class_exists( 'Field_Notes' ) ) {

  class Field_Notes {

    /**
     * The Endorsements instance
     *
     * @var instanceof Field_Notes
     */
    private static $instance = NULL;


    /**
     * Creates or returns an instance of this class.
     *
     * @return  Endorsements  A single instance of this class.
     */
    public static function get_instance() {
      if ( ! isset( self::$instance ) AND ! ( self::$instance instanceof Field_Notes  ) ) {
        self::$instance = new self;
        self::$instance->_define_constants();
        self::$instance->_include_files();

        new Field_Notes\CPT\Park;

        if ( is_admin() ) {
          new \Field_Notes\Backend\Metabox;
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
      define( 'FIELD_NOTES_DEV', true);
      define( 'FIELD_NOTES_URL',  FIELD_NOTES_DEV ? 'http://localhost:8080/' : plugin_dir_url(__FILE__) );
      define( 'FIELD_NOTES_APP_ROOT_URL',  FIELD_NOTES_DEV ? 'http://localhost:8080/' : plugin_dir_url(__FILE__) . 'dist/' );
      define( 'FIELD_NOTES_PATH', plugin_dir_path(__FILE__) );
      define( 'FIELD_NOTES_BASENAME', plugin_basename( __FILE__ ) );
      define( 'FIELD_NOTES_VERSION', '1.0');
    }


    /**
     * Include the files required by the Field Notes plugin.
     *
     * @return void
     */
    private function _include_files() {
      require_once FIELD_NOTES_PATH . 'lib/core/post-types/park.php';

      if ( is_admin() ) {
        require_once FIELD_NOTES_PATH . 'lib/backend/metabox.php';
      }
    }
  }
}

/**
 * The main function responsible for returning the one true Field_Notes
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $Field_Notes = Field_Notes(); ?>
 *
 * @return object The one true Field_Notes Instance
 */
if ( ! function_exists('Field_Notes') ) {

  function Field_Notes() {
    return Field_Notes::get_instance();
  }

  // Enjoy your hike!
  Field_Notes();

}
