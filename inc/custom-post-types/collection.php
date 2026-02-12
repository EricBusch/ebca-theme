<?php
/**
 * Register Collection custom post type.
 *
 * @package EBCA_Theme
 * @since 1.0.0
 */

/**
 * Register collection post type.
 */
function ebca_register_collection_post_type() {
	$labels = array(
		'name' => __( 'Collections', 'ebca-theme' ),
		'singular_name' => __( 'Collection', 'ebca-theme' ),
		'menu_name' => __( 'Collections', 'ebca-theme' ),
		'all_items' => __( 'All Collections', 'ebca-theme' ),
		'edit_item' => __( 'Edit Collection', 'ebca-theme' ),
		'view_item' => __( 'View Collection', 'ebca-theme' ),
		'view_items' => __( 'View Collections', 'ebca-theme' ),
		'add_new_item' => __( 'Add New Collection', 'ebca-theme' ),
		'new_item' => __( 'New Collection', 'ebca-theme' ),
		'parent_item_colon' => __( 'Parent Collection:', 'ebca-theme' ),
		'search_items' => __( 'Search Collections', 'ebca-theme' ),
		'not_found' => __( 'No collections found', 'ebca-theme' ),
		'not_found_in_trash' => __( 'No collections found in Trash', 'ebca-theme' ),
		'archives' => __( 'Collection Archives', 'ebca-theme' ),
		'attributes' => __( 'Collection Attributes', 'ebca-theme' ),
		'insert_into_item' => __( 'Insert into collection', 'ebca-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this collection', 'ebca-theme' ),
		'filter_items_list' => __( 'Filter collections list', 'ebca-theme' ),
		'filter_by_date' => __( 'Filter collections by date', 'ebca-theme' ),
		'items_list_navigation' => __( 'Collections list navigation', 'ebca-theme' ),
		'items_list' => __( 'Collections list', 'ebca-theme' ),
		'item_published' => __( 'Collection published.', 'ebca-theme' ),
		'item_published_privately' => __( 'Collection published privately.', 'ebca-theme' ),
		'item_reverted_to_draft' => __( 'Collection reverted to draft.', 'ebca-theme' ),
		'item_scheduled' => __( 'Collection scheduled.', 'ebca-theme' ),
		'item_updated' => __( 'Collection updated.', 'ebca-theme' ),
		'item_link' => __( 'Collection Link', 'ebca-theme' ),
		'item_link_description' => __( 'A link to a collection.', 'ebca-theme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'collections' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-portfolio',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'collection', $args );
}
add_action( 'init', 'ebca_register_collection_post_type' );
