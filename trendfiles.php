<?php
/*
Plugin Name: Trendfiles Plugin
Description: Site specifieke functies
Version: 1.0
License: GPL
Author: Johan van der Wijk
Author URI: https://thewebworks.nl
*/

// Custom post types
function register_taxonomy_download_categories() {

	$labels = array( 
		'name' => _x( 'Categories', 'category' ),
		'singular_name' => _x( 'Category', 'category' ),
		'search_items' => _x( 'Search Categories', 'category' ),
		'popular_items' => _x( 'Popular Categories', 'category' ),
		'all_items' => _x( 'All Categories', 'category' ),
		'parent_item' => _x( 'Parent Category', 'category' ),
		'parent_item_colon' => _x( 'Parent Category:', 'category' ),
		'edit_item' => _x( 'Edit Category', 'category' ),
		'update_item' => _x( 'Update Category', 'category' ),
		'add_new_item' => _x( 'Add New Category', 'category' ),
		'new_item_name' => _x( 'New Category Name', 'category' ),
		'separate_items_with_commas' => _x( 'Separate categories with commas', 'category' ),
		'add_or_remove_items' => _x( 'Add or remove categories', 'category' ),
		'choose_from_most_used' => _x( 'Choose from the most used categories', 'category' ),
		'menu_name' => _x( 'Categories', 'category' ),
	);

	$args = array( 
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => false,
		'show_ui' => true,
		'show_tagcloud' => false,
		'hierarchical' => true,

		'rewrite' => true,
		'query_var' => true
	);

	register_taxonomy( 'download_categories', array('download'), $args );
}
add_action( 'init', 'register_taxonomy_download_categories' );

// Custom post type voor downloads
function register_cpt_download() {
	$labels = array( 
		'name' => _x( 'Downloads', 'download' ),
		'singular_name' => _x( 'Download', 'download' ),
		'add_new' => _x( 'Add New', 'download' ),
		'add_new_item' => _x( 'Add New Download', 'download' ),
		'edit_item' => _x( 'Edit Download', 'download' ),
		'new_item' => _x( 'New Download', 'download' ),
		'view_item' => _x( 'View Download', 'download' ),
		'search_items' => _x( 'Search Downloads', 'download' ),
		'not_found' => _x( 'No downloads found', 'download' ),
		'not_found_in_trash' => _x( 'No downloads found in Trash', 'download' ),
		'parent_item_colon' => _x( 'Parent Download:', 'download' ),
		'menu_name' => _x( 'Downloads', 'download' ),
	);
	
	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Downloads van rapporten',
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'menu_order' ),
		'taxonomies' => array( 'download_categories' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,	  
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);

register_post_type( 'download', $args );
}
add_action( 'init', 'register_cpt_download' );