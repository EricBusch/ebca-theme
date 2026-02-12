<?php
/**
 * Register Issue custom post type.
 *
 * @package EBCA_Theme
 * @since 1.0.0
 */

/**
 * Register issue post type.
 */
function ebca_register_issue_post_type() {
	$labels = array(
		'name' => __( 'Issues', 'ebca-theme' ),
		'singular_name' => __( 'Issue', 'ebca-theme' ),
		'menu_name' => __( 'Issues', 'ebca-theme' ),
		'all_items' => __( 'All Issues', 'ebca-theme' ),
		'edit_item' => __( 'Edit Issue', 'ebca-theme' ),
		'view_item' => __( 'View Issue', 'ebca-theme' ),
		'view_items' => __( 'View Issues', 'ebca-theme' ),
		'add_new_item' => __( 'Add New Issue', 'ebca-theme' ),
		'add_new' => __( 'Add New Issue', 'ebca-theme' ),
		'new_item' => __( 'New Issue', 'ebca-theme' ),
		'parent_item_colon' => __( 'Parent Issue:', 'ebca-theme' ),
		'search_items' => __( 'Search Issues', 'ebca-theme' ),
		'not_found' => __( 'No issues found', 'ebca-theme' ),
		'not_found_in_trash' => __( 'No issues found in Trash', 'ebca-theme' ),
		'archives' => __( 'Issue Archives', 'ebca-theme' ),
		'attributes' => __( 'Issue Attributes', 'ebca-theme' ),
		'insert_into_item' => __( 'Insert into issue', 'ebca-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this issue', 'ebca-theme' ),
		'filter_items_list' => __( 'Filter issues list', 'ebca-theme' ),
		'filter_by_date' => __( 'Filter issues by date', 'ebca-theme' ),
		'items_list_navigation' => __( 'Issues list navigation', 'ebca-theme' ),
		'items_list' => __( 'Issues list', 'ebca-theme' ),
		'item_published' => __( 'Issue published.', 'ebca-theme' ),
		'item_published_privately' => __( 'Issue published privately.', 'ebca-theme' ),
		'item_reverted_to_draft' => __( 'Issue reverted to draft.', 'ebca-theme' ),
		'item_scheduled' => __( 'Issue scheduled.', 'ebca-theme' ),
		'item_updated' => __( 'Issue updated.', 'ebca-theme' ),
		'item_link' => __( 'Issue Link', 'ebca-theme' ),
		'item_link_description' => __( 'A link to a issue.', 'ebca-theme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => false,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'issue' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => 'dashicons-book',
		'supports'           => array( 'title', 'thumbnail' ),
	);

	register_post_type( 'issue', $args );
}
add_action( 'init', 'ebca_register_issue_post_type' );
