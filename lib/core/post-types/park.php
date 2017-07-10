<?php

  namespace Field_Notes\CPT;

  class Park {

    public function __construct() {
      add_action( 'init', array($this, 'register') );
    }

    /**
     * Register the Park custom post type.
     * 
     * @return void
     */
    public function register() {
      register_post_type( 'park', array(
        'labels'            => array(
          'name'                => __( 'Parks', 'field-notes' ),
          'singular_name'       => __( 'Park', 'field-notes' ),
          'all_items'           => __( 'All Parks', 'field-notes' ),
          'new_item'            => __( 'New Park', 'field-notes' ),
          'add_new'             => __( 'Add New', 'field-notes' ),
          'add_new_item'        => __( 'Add New Parks', 'field-notes' ),
          'edit_item'           => __( 'Edit Parks', 'field-notes' ),
          'view_item'           => __( 'View Parks', 'field-notes' ),
          'search_items'        => __( 'Search Parks', 'field-notes' ),
          'not_found'           => __( 'No Parks found', 'field-notes' ),
          'not_found_in_trash'  => __( 'No Parks found in trash', 'field-notes' ),
          'parent_item_colon'   => __( 'Parent Parks', 'field-notes' ),
          'menu_name'           => __( 'Parks', 'field-notes' ),
        ),
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor' ),
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-location-alt',
        'show_in_rest'      => true,
        'rest_base'         => 'parks',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
      ) );
    }

  }
