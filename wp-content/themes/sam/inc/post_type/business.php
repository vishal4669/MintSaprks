<?php
/**
 * Business post_type
 *
 * @link https://wordpress.org/
 *
 * @package WordPress
 * @subpackage Sam
 */


add_action( 'init', 'register_business_post_type' );

/**
 * Business post_type Callback
 */
function register_business_post_type() {

	/* Set UI labels for Business Post Type */
	$labels = array(
		'name'                => _x( 'Business', 'Post Type Normal Name', 'twentytwenty' ),
		'singular_name'       => _x( 'Business', 'Post Type Singular Name', 'twentytwenty' ),
		'menu_name'           => __( 'Business', 'twentytwenty' ),
		'parent_item_colon'   => __( 'Parent Business', 'twentytwenty' ),
		'all_items'           => __( 'All Business', 'twentytwenty' ),
		'view_item'           => __( 'View Business', 'twentytwenty' ),
		'add_new_item'        => __( 'Add New Business', 'twentytwenty' ),
		'add_new'             => __( 'Add New', 'twentytwenty' ),
		'edit_item'           => __( 'Edit Business', 'twentytwenty' ),
		'update_item'         => __( 'Update Business', 'twentytwenty' ),
		'search_items'        => __( 'Search Business', 'twentytwenty' ),
		'not_found'           => __( 'Not Found', 'twentytwenty' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
	);

	/* Other arguments for Business Post Type */
	$args = array(
		'label'               => __( 'Business', 'twentytwenty' ),
		'description'         => __( 'Business news and reviews', 'twentytwenty' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array( 'genres' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);

	register_post_type( 'business', $args );

}