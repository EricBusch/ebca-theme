<?php
/**
 * Register Photographer custom post type.
 *
 * @package EBCA_Theme
 * @since 1.0.0
 */

/**
 * Register photographer post type.
 */
function ebca_register_photographer_post_type() {
	$labels = array(
		'name' => __( 'Photographers', 'ebca-theme' ),
		'singular_name' => __( 'Photographer', 'ebca-theme' ),
		'menu_name' => __( 'Photographers', 'ebca-theme' ),
		'all_items' => __( 'All Photographers', 'ebca-theme' ),
		'edit_item' => __( 'Edit Photographer', 'ebca-theme' ),
		'view_item' => __( 'View Photographer', 'ebca-theme' ),
		'view_items' => __( 'View Photographers', 'ebca-theme' ),
		'add_new_item' => __( 'Add New Photographer', 'ebca-theme' ),
		'add_new' => __( 'Add New Photographer', 'ebca-theme' ),
		'new_item' => __( 'New Photographer', 'ebca-theme' ),
		'parent_item_colon' => __( 'Parent Photographer:', 'ebca-theme' ),
		'search_items' => __( 'Search Photographers', 'ebca-theme' ),
		'not_found' => __( 'No photographers found', 'ebca-theme' ),
		'not_found_in_trash' => __( 'No photographers found in Trash', 'ebca-theme' ),
		'archives' => __( 'Photographer Archives', 'ebca-theme' ),
		'attributes' => __( 'Photographer Attributes', 'ebca-theme' ),
		'insert_into_item' => __( 'Insert into photographer', 'ebca-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this photographer', 'ebca-theme' ),
		'filter_items_list' => __( 'Filter photographers list', 'ebca-theme' ),
		'filter_by_date' => __( 'Filter photographers by date', 'ebca-theme' ),
		'items_list_navigation' => __( 'Photographers list navigation', 'ebca-theme' ),
		'items_list' => __( 'Photographers list', 'ebca-theme' ),
		'item_published' => __( 'Photographer published.', 'ebca-theme' ),
		'item_published_privately' => __( 'Photographer published privately.', 'ebca-theme' ),
		'item_reverted_to_draft' => __( 'Photographer reverted to draft.', 'ebca-theme' ),
		'item_scheduled' => __( 'Photographer scheduled.', 'ebca-theme' ),
		'item_updated' => __( 'Photographer updated.', 'ebca-theme' ),
		'item_link' => __( 'Photographer Link', 'ebca-theme' ),
		'item_link_description' => __( 'A link to a photographer.', 'ebca-theme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => false,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'photographer' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-camera',
		'supports'           => array( 'title', 'thumbnail' ),
	);

	register_post_type( 'photographer', $args );
}
add_action( 'init', 'ebca_register_photographer_post_type' );
