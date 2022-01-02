<?php

/**
 *
 * @link              https://github.com/Ahrary
 * @since             1.0.0
 * @package           WP_Kitab
 *
 * @wordpress-plugin
 * Plugin Name:       WP Kitab
 * Plugin URI:        https://github.com/Ahrary
 * Description:       WP Kitab is a simple plugin that allows you to add book post type and taxonomies to your website.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Tested up to:      5.8.2
 * Requires PHP:      7.0
 * Author:            Ahrary
 * Author URI:        https://github.com/Ahrary/wp-kitab
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-kitab
 * Domain Path:       languages
 */

// prevent direct access to the plugin file
defined('ABSPATH') or die('No script kiddies please!');

// Register books cpt
if (!function_exists('wp_kitab_cpt')) {
	function wp_kitab_cpt()
	{
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
			'taxonomies' => ['book_author', 'book_genre', 'book_language', 'book_publisher', 'book_city', 'book_year', 'tags'],
			'yarpp_support' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'Book',
			'show_in_graphql' => 'Books',
		];
		if (!post_type_exists('book')) {
			register_post_type('book', $args);
		}
	}

	add_action('init', 'wp_kitab_cpt');
}

/* Register book taxonomies */
if (!function_exists('wp_kitab_taxonomies')) {
	function wp_kitab_taxonomies()
	{
		/**
		 * Taxonomy: Book Authors.
		 */
		$labels = [
			'name' => _x('Authors', 'taxonomy general name', 'wp-kitab'),
			'singular_name' => _x('Author', 'taxonomy singular name', 'wp-kitab'),
			'menu_name' => __('Authors', 'wp-kitab'),
			'all_items' => __('All Authors', 'wp-kitab'),
			'edit_item' => __('Edit Author', 'wp-kitab'),
			'view_item' => __('View Author', 'wp-kitab'),
			'update_item' => __('Update Author', 'wp-kitab'),
			'add_new_item' => __('Add New Author', 'wp-kitab'),
			'new_item_name' => __('New Author Name', 'wp-kitab'),
			'search_items' => __('Search Authors', 'wp-kitab'),
			'popular_items' => __('Popular Authors', 'wp-kitab'),
			'separate_items_with_commas' => __('Separate authors with commas', 'wp-kitab'),
			'add_or_remove_items' => __('Add or remove authors', 'wp-kitab'),
			'choose_from_most_used' => __('Choose from the most used authors', 'wp-kitab'),
			'not_found' => __('No authors found', 'wp-kitab'),
			'back_to_items' => __('Back to authors', 'wp-kitab'),
		];

		$args = [
			'label' => __('Authors', 'wp-kitab'),
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => ['slug' => 'authors', 'with_front' => false,],
			'show_admin_column' => true,
			'show_in_rest' => true,
			'rest_base' => 'authors',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'author',
			'graphql_plural_name' => 'authors',
		];
		if (!taxonomy_exists('book_author')) {
			register_taxonomy('book_author', ['book'], $args);
		}

		/**
		 * Taxonomy: Genres.
		 */

		$labels = [
			'name' => __('Genres', 'taxonomy general name', 'wp-kitab'),
			'singular_name' => __('Genre', 'taxonomy singular name', 'wp-kitab'),
			'menu_name' => __('Genres', 'wp-kitab'),
			'all_items' => __('All Genres', 'wp-kitab'),
			'edit_item' => __('Edit Genre', 'wp-kitab'),
			'view_item' => __('View Genre', 'wp-kitab'),
			'update_item' => __('Update Genre', 'wp-kitab'),
			'add_new_item' => __('Add New Genre', 'wp-kitab'),
			'new_item_name' => __('New Genre Name', 'wp-kitab'),
			'search_items' => __('Search Genres', 'wp-kitab'),
			'popular_items' => __('Popular Genres', 'wp-kitab'),
			'separate_items_with_commas' => __('Separate genres with commas', 'wp-kitab'),
			'add_or_remove_items' => __('Add or remove genres', 'wp-kitab'),
			'choose_from_most_used' => __('Choose from the most used genres', 'wp-kitab'),
			'not_found' => __('No genres found', 'wp-kitab'),
			'back_to_items' => __('Back to genres', 'wp-kitab'),
		];

		$args = [
			'label' => __('Genres', 'wp-kitab'),
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => ['slug' => 'genres', 'with_front' => false,],
			'show_admin_column' => true,
			'show_in_rest' => true,
			'rest_base' => 'genre',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'Genre',
			'show_in_graphql' => 'Genres',
		];
		if (!taxonomy_exists('book_genre')) {
			register_taxonomy('book_genre', ['book'], $args);
		}

		/**
		 * Taxonomy: Languages.
		 */

		$labels = [
			'name' => __('Languages', 'taxonomy general name', 'wp-kitab'),
			'singular_name' => __('Language', 'taxonomy singular name', 'wp-kitab'),
			'menu_name' => __('Languages', 'wp-kitab'),
			'all_items' => __('All Languages', 'wp-kitab'),
			'edit_item' => __('Edit Language', 'wp-kitab'),
			'view_item' => __('View Language', 'wp-kitab'),
			'update_item' => __('Update Language', 'wp-kitab'),
			'add_new_item' => __('Add New Language', 'wp-kitab'),
			'new_item_name' => __('New Language Name', 'wp-kitab'),
			'search_items' => __('Search Languages', 'wp-kitab'),
			'popular_items' => __('Popular Languages', 'wp-kitab'),
			'separate_items_with_commas' => __('Separate languages with commas', 'wp-kitab'),
			'add_or_remove_items' => __('Add or remove languages', 'wp-kitab'),
			'choose_from_most_used' => __('Choose from the most used languages', 'wp-kitab'),
			'not_found' => __('No languages found', 'wp-kitab'),
			'back_to_items' => __('Back to languages', 'wp-kitab'),
		];

		$args = [
			'label' => __('Languages', 'wp-kitab'),
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => ['slug' => 'languages', 'with_front' => false,],
			'show_admin_column' => true,
			'show_in_rest' => true,
			'rest_base' => 'language',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'Language',
			'show_in_graphql' => 'Languages',
		];
		if (!taxonomy_exists('book_language')) {
			register_taxonomy('book_language', ['book'], $args);
		}

		/**
		 * Taxonomy: Cities.
		 */

		$labels = [
			'name' => __('Cities', 'taxonomy general name', 'wp-kitab'),
			'singular_name' => __('City', 'taxonomy singular name', 'wp-kitab'),
			'menu_name' => __('Cities', 'wp-kitab'),
			'all_items' => __('All Cities', 'wp-kitab'),
			'edit_item' => __('Edit City', 'wp-kitab'),
			'view_item' => __('View City', 'wp-kitab'),
			'update_item' => __('Update City', 'wp-kitab'),
			'add_new_item' => __('Add New City', 'wp-kitab'),
			'new_item_name' => __('New City Name', 'wp-kitab'),
			'search_items' => __('Search Cities', 'wp-kitab'),
			'popular_items' => __('Popular Cities', 'wp-kitab'),
			'separate_items_with_commas' => __('Separate cities with commas', 'wp-kitab'),
			'add_or_remove_items' => __('Add or remove cities', 'wp-kitab'),
			'choose_from_most_used' => __('Choose from the most used cities', 'wp-kitab'),
			'not_found' => __('No cities found', 'wp-kitab'),
			'back_to_items' => __('Back to cities', 'wp-kitab'),
		];

		$args = [
			'label' => __('Cities', 'wp-kitab'),
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => ['slug' => 'cities', 'with_front' => false,],
			'show_admin_column' => true,
			'show_in_rest' => true,
			'rest_base' => 'city',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit' => false,
			'show_in_graphql' => true,
			'graphql_single_name' => 'City',
			'show_in_graphql' => 'Cities',
		];
		if (!taxonomy_exists('book_city')) {
			register_taxonomy('book_city', ['book'], $args);
		}

		/**
		 * Taxonomy: Publishers.
		 */

		$labels = [
			'name' => __('Publishers', 'taxonomy general name', 'wp-kitab'),
			'singular_name' => __('Publisher', 'taxonomy singular name', 'wp-kitab'),
			'menu_name' => __('Publishers', 'wp-kitab'),
			'all_items' => __('All Publishers', 'wp-kitab'),
			'edit_item' => __('Edit Publisher', 'wp-kitab'),
			'view_item' => __('View Publisher', 'wp-kitab'),
			'update_item' => __('Update Publisher', 'wp-kitab'),
			'add_new_item' => __('Add New Publisher', 'wp-kitab'),
			'new_item_name' => __('New Publisher Name', 'wp-kitab'),
			'search_items' => __('Search Publishers', 'wp-kitab'),
			'popular_items' => __('Popular Publishers', 'wp-kitab'),
			'separate_items_with_commas' => __('Separate publishers with commas', 'wp-kitab'),
			'add_or_remove_items' => __('Add or remove publishers', 'wp-kitab'),
			'choose_from_most_used' => __('Choose from the most used publishers', 'wp-kitab'),
			'not_found' => __('No publishers found', 'wp-kitab'),
			'back_to_items' => __('Back to publishers', 'wp-kitab'),
		];

		$args = [
			'label' => __('Publishers', 'wp-kitab'),
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => ['slug' => 'publishers', 'with_front' => false,],
			'show_admin_column' => true,
			'show_in_rest' => true,
			'rest_base' => 'publisher',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'Publisher',
			'show_in_graphql' => 'Publishers',
		];
		if (!taxonomy_exists('book_publisher')) {
			register_taxonomy('book_publisher', ['book'], $args);
		}

		/**
		 * Taxonomy: Years.
		 */

		$labels = [
			'name' => __('Years', 'taxonomy general name', 'wp-kitab'),
			'singular_name' => __('Year', 'taxonomy singular name', 'wp-kitab'),
			'menu_name' => __('Years', 'wp-kitab'),
			'all_items' => __('All Years', 'wp-kitab'),
			'edit_item' => __('Edit Year', 'wp-kitab'),
			'view_item' => __('View Year', 'wp-kitab'),
			'update_item' => __('Update Year', 'wp-kitab'),
			'add_new_item' => __('Add New Year', 'wp-kitab'),
			'new_item_name' => __('New Year Name', 'wp-kitab'),
			'search_items' => __('Search Years', 'wp-kitab'),
			'popular_items' => __('Popular Years', 'wp-kitab'),
			'separate_items_with_commas' => __('Separate years with commas', 'wp-kitab'),
			'add_or_remove_items' => __('Add or remove years', 'wp-kitab'),
			'choose_from_most_used' => __('Choose from the most used years', 'wp-kitab'),
			'not_found' => __('No years found', 'wp-kitab'),
			'back_to_items' => __('Back to years', 'wp-kitab'),
		];

		$args = [
			'label' => __('Years', 'wp-kitab'),
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => ['slug' => 'years', 'with_front' => false,],
			'show_admin_column' => true,
			'show_in_rest' => true,
			'rest_base' => 'year',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'show_in_quick_edit' => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'Year',
			'show_in_graphql' => 'Years',
			'meta_box_cb' => 'post_tags_meta_box',
			'default_term' => ['name' => '2021'],
		];
		if (!taxonomy_exists('book_year')) {
			register_taxonomy('book_year', ['book'], $args);
		}
	}
	add_action('init', 'wp_kitab_taxonomies', 0);
}


/**
 * Update the title of the book post type
 * by the book_authors taxonomy field and the book_title acf field
 */
function wp_kitab_update_title_and_excerpt($post_id)
{
	if (get_post_type($post_id) == 'book') {
		$book = [];
		$book['ID'] = $post_id;

		$book_authors = get_the_terms($post_id, 'book_author');
		$book_title = get_field('book_title', $post_id);

		$book_description = get_field('book_description', $post_id);
		$book_description = wp_trim_words($book_description, 26, '...');

		$book_authors_names = [];

		foreach ($book_authors as $book_author) {
			$book_authors_names[] = $book_author->name;
		}

		// if $book_authors_names array has more than one name
		// then return the first one
		if (count($book_authors_names) > 1) {
			$book_authors_names = [
				$book_authors_names[0],
				__('and others', 'wp-kitab'),
			];
		}

		$book['post_title'] = implode(', ', $book_authors_names) . '. ' . $book_title;
		$book['post_excerpt'] = $book_description;

		wp_update_post($book);
	}
}
add_action('acf/save_post', 'wp_kitab_update_title_and_excerpt', 20);


//Auto assign Featured image from 'book_cover' field
add_action('acf/save_post', function ($post_id) {
	$book_cover = get_field('book_cover', $post_id);
	if ($book_cover) {
		if (!is_numeric($book_cover)) {
			$book_cover = $book_cover['ID'];
		}
		update_post_meta($post_id, '_thumbnail_id', $book_cover);
	} else {
		delete_post_meta($post_id, '_thumbnail_id');
	}
}, 11);


// Flush rewrite rules
register_activation_hook( __FILE__, 'wp_kitab_rewrite_flush' );
function wp_kitab_rewrite_flush() {
    wp_kitab_cpt();
	flush_rewrite_rules();
}
