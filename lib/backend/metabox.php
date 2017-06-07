<?php

  namespace Endorsements\Backend;

  class Metabox {

    public function __construct() {
      add_action( 'add_meta_boxes_page', array( $this, 'add_meta_boxes' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_app' ) );
    }

    /**
     * Registers a metabox where the Endorsement editor will appear in the WP page editor.
     */
    public function add_meta_boxes($page) {
      add_meta_box('endorsements', 'Endorsements Editor', array($this, 'add_metabox'), 'page', 'normal', 'high' );
    }

    /**
     * Output the content of the metabox
     *
     * @param  WP_Post $page The page object currently being edited in the admin.
     * @return void
     */
    public function add_metabox($page) {
      echo 'Hello, friends!';
      return;
    }

    /**
     * Loads the backend React app script if we are on the Edit Page screen in the WordPress admin.
     * @param  string $hook pagename
     * @return void
     */
    public function load_backend_app($hook) {
      if ( $hook !== 'post.php' ) {
        return;
      }

      global $post_type;

      if ( $post_type !== 'page' ) {
        return;
      }

      wp_register_script('endorsements', ENDORSEMENTS_URL . 'dist/admin.js', array(), false, true);
      wp_enqueue_script('endorsements');
    }

  }
