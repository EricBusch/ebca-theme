<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

	if ( is_admin() ) {
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-styles' );
		add_editor_style( 'css/editor-style.css' );
	}
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(), get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

/**
 * Add new image sizes.
 */
add_action( 'after_setup_theme', function () {
	add_image_size( '2048x2048', 2048, 2048 );
} );

/**
 * Site-wide notice
 */
add_action( 'tailpress_header', function () {

	// If the $current_date is greater than the last day of the show, just return.
	if ( current_time( 'Ymd' ) > '20250517' ) {
		return;
	}

	echo '
	<div class="bg-gray-800 text-gray-200 text-xs sm:text-sm py-2 lg:py-4 px-2">
		<div class="flex flex-row items-center gap-x-3.5 justify-center">
			<span class="font-bold">Gallery Exhibition</span>
			<span class="opacity-50">/</span>
			<span>April 24 ~ May 17</span>
			<span class="opacity-50">/</span>
			<a href="https://greygallery.ca/" target="_blank" rel="noopener" class="underline">Grey Gallery</a>
		</div>
	</div>
	';
} );

/**
 * Load ACF field groups.
 */
require_once get_template_directory() . '/inc/acf/field-groups.php';

/**
 * Register ACF Options Page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => __( 'Site Options', 'ebca-theme' ),
			'menu_title' => __( 'Site Options', 'ebca-theme' ),
			'menu_slug'  => 'acf-options',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);
}

/**
 * Load custom post types.
 */
require_once get_template_directory() . '/inc/custom-post-types/collection.php';
require_once get_template_directory() . '/inc/custom-post-types/issue.php';
require_once get_template_directory() . '/inc/custom-post-types/photographer.php';
