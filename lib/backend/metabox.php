<?php

  namespace Endorsements\Backend;

  class Metabox {

    public function __construct() {
      add_action( 'add_meta_boxes_page', array( $this, 'add_meta_boxes' ) );
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

  }
