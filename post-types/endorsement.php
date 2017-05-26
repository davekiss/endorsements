<?php

function endorsement_init() {
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
		'show_ui'           => true,
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
add_action( 'init', 'endorsement_init' );

function endorsement_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['endorsement'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Endorsement updated. <a target="_blank" href="%s">View Endorsement</a>', 'endorsements'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'endorsements'),
		3 => __('Custom field deleted.', 'endorsements'),
		4 => __('Endorsement updated.', 'endorsements'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Endorsement restored to revision from %s', 'endorsements'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Endorsement published. <a href="%s">View Endorsement</a>', 'endorsements'), esc_url( $permalink ) ),
		7 => __('Endorsement saved.', 'endorsements'),
		8 => sprintf( __('Endorsement submitted. <a target="_blank" href="%s">Preview Endorsement</a>', 'endorsements'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Endorsement scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Endorsement</a>', 'endorsements'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Endorsement draft updated. <a target="_blank" href="%s">Preview Endorsement</a>', 'endorsements'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'endorsement_updated_messages' );
