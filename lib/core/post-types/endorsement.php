<?php

  namespace Endorsements\CPT;

  class Endorsement {

    public function __construct() {
      add_action( 'init', array($this, 'register') );
    }

    /**
     * Register the Endorsement custom post type.
     * 
     * @return void
     */
    public function register() {
      register_post_type( 'endorsement', array(
        'labels'            => array(
          'name'                => __( 'Endorsements', 'endorsements' ),
          'singular_name'       => __( 'Endorsement', 'endorsements' ),
          'all_items'           => __( 'All Endorsements', 'endorsements' ),
          'new_item'            => __( 'New Endorsement', 'endorsements' ),
          'add_new'             => __( 'Add New', 'endorsements' ),
          'add_new_item'        => __( 'Add New Endorsement', 'endorsements' ),
          'edit_item'           => __( 'Edit Endorsement', 'endorsements' ),
          'view_item'           => __( 'View Endorsement', 'endorsements' ),
          'search_items'        => __( 'Search Endorsements', 'endorsements' ),
          'not_found'           => __( 'No Endorsements found', 'endorsements' ),
          'not_found_in_trash'  => __( 'No Endorsements found in trash', 'endorsements' ),
          'parent_item_colon'   => __( 'Parent Endorsement', 'endorsements' ),
          'menu_name'           => __( 'Endorsements', 'endorsements' ),
        ),
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => false,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor' ),
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-admin-post',
        'show_in_rest'      => true,
        'rest_base'         => 'endorsement',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
      ) );
    }

  }
