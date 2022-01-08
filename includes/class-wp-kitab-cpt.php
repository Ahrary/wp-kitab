<?php

/**
 * WP_Kitab_CPT class for registering book CPT.
 */
class WP_Kitab_CPT
{

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// add post type
		add_action('init', array($this, 'register'));
	}

	/**
	 * Register post type
	 */
	public function register()
	{
		// post type
		$labels = [
			'name'                  => _x('Books', 'Post Type General Name', 'wp-kitab'),
			'singular_name'         => _x('Book', 'Post Type Singular Name', 'wp-kitab'),
			'menu_name'             => __('Books', 'wp-kitab'),
			'name_admin_bar'        => __('Book', 'wp-kitab'),
			'archives'              => __('Book Archives', 'wp-kitab'),
			'attributes'            => __('Book Attributes', 'wp-kitab'),
			'parent_item_colon'     => __('Parent Book:', 'wp-kitab'),
			'all_items'             => __('All Books', 'wp-kitab'),
			'add_new_item'          => __('Add New Book', 'wp-kitab'),
			'add_new'               => __('Add New', 'wp-kitab'),
			'new_item'              => __('New Book', 'wp-kitab'),
			'edit_item'             => __('Edit Book', 'wp-kitab'),
			'update_item'           => __('Update Book', 'wp-kitab'),
			'view_item'             => __('View Book', 'wp-kitab'),
			'view_items'            => __('View Books', 'wp-kitab'),
			'search_items'          => __('Search Book', 'wp-kitab'),
			'not_found'             => __('Not found', 'wp-kitab'),
			'not_found_in_trash'    => __('Not found in Trash', 'wp-kitab'),
			'featured_image'        => __('Featured Image', 'wp-kitab'),
			'set_featured_image'    => __('Set featured image', 'wp-kitab'),
			'remove_featured_image' => __('Remove featured image', 'wp-kitab'),
			'use_featured_image'    => __('Use as featured image', 'wp-kitab'),
			'insert_into_item'      => __('Insert into book', 'wp-kitab'),
			'uploaded_to_this_item' => __('Uploaded to this book', 'wp-kitab'),
			'items_list'            => __('Books list', 'wp-kitab'),
			'items_list_navigation' => __('Books list navigation', 'wp-kitab'),
			'filter_items_list'     => __('Filter books list', 'wp-kitab'),
		];
		$args = [
			'label' => __('Book', 'wp-kitab'),
			'labels' => $labels,
			'description' => '',
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_rest' => false,
			'rest_base' => '',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive' => 'books',
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'delete_with_user' => false,
			'exclude_from_search' => false,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => true,
			'rewrite' => ['slug' => 'book', 'with_front' => false],
			'query_var' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-book',
			'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'publicize', 'comments'],
			'taxonomies' => ['book_author', 'book_main_category', 'book_categories', 'book_language', 'book_publisher', 'book_city', 'book_year', 'tags'],
			'yarpp_support' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'Book',
			'show_in_graphql' => 'Books',
		];
		if (!post_type_exists('book')) {
			register_post_type('book', $args);
		}
	}
	/**
	 * Unregister post type
	 */
	public function unregister()
	{
		if (post_type_exists('book')) {
			unregister_post_type('book');
		}
	}
}
