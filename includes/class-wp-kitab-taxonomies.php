<?php

/**
 * This class for registering
 * book_author,
 * book_main_category,
 * book_genre,
 * book_language,
 * book_city,
 * book_publisher,
 * book_published_date taxonomies
 * and book_tags taxonomies for Book CPT.
 */
$taxonomies = [
    'book_author',
    'book_main_category',
    'book_categories',
    'book_language',
    'book_city',
    'book_publisher',
    'book_published_date',
    'book_tags',
];

class WP_Kitab_Taxonomies
{

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_taxonomies']);
    }

    /**
     * Register taxonomies
     */
    public function register()
    {
        $this->register_taxes();
    }

    public function register_taxes()
    {
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
         * Register book_main_category taxonomy
         */

        $labels = [
            'name' => _x('Main Categories', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Main Category', 'taxonomy singular name', 'wp-kitab'),
            'all_items' => __('All Main Categories', 'wp-kitab'),
            'edit_item' => __('Edit Main Category', 'wp-kitab'),
            'view_item' => __('View Main Category', 'wp-kitab'),
            'update_item' => __('Update Main Category', 'wp-kitab'),
            'add_new_item' => __('Add New Main Category', 'wp-kitab'),
            'new_item_name' => __('New Main Category Name', 'wp-kitab'),
            'search_items' => __('Search Main Categories', 'wp-kitab'),
            'menu_name' => __('Main Categories', 'wp-kitab'),
            'popular_items' => __('Popular Main Categories', 'wp-kitab'),
            'separate_items_with_commas' => __('Separate main categories with commas', 'wp-kitab'),
            'add_or_remove_items' => __('Add or remove main categories', 'wp-kitab'),
            'choose_from_most_used' => __('Choose from the most used main categories', 'wp-kitab'),
            'not_found' => __('No main categories found', 'wp-kitab'),
            'back_to_items' => __('Back to main categories', 'wp-kitab'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'main_category', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'mainCategory',
            'graphql_plural_name' => 'mainCategories',
        ];
        if (!taxonomy_exists('book_main_category')) {
            register_taxonomy('book_main_category', ['book'], $args);
        }

        /**
         * Register book_categories taxonomy
         */
        $labels = [
            'name' => _x('Categories', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Category', 'taxonomy singular name', 'wp-kitab'),
            'menu_name' => __('Categories', 'wp-kitab'),
            'all_items' => __('All Categories', 'wp-kitab'),
            'edit_item' => __('Edit Category', 'wp-kitab'),
            'view_item' => __('View Category', 'wp-kitab'),
            'update_item' => __('Update Category', 'wp-kitab'),
            'add_new_item' => __('Add New Category', 'wp-kitab'),
            'new_item_name' => __('New Category Name', 'wp-kitab'),
            'search_items' => __('Search Categories', 'wp-kitab'),
            'popular_items' => __('Popular Categories', 'wp-kitab'),
            'separate_items_with_commas' => __('Separate genres with commas', 'wp-kitab'),
            'add_or_remove_items' => __('Add or remove genres', 'wp-kitab'),
            'choose_from_most_used' => __('Choose from the most used genres', 'wp-kitab'),
            'not_found' => __('No genres found', 'wp-kitab'),
            'back_to_items' => __('Back to genres', 'wp-kitab'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'categories', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'categories',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'Category',
            'graphql_plural_name' => 'Categories',
        ];
        if (!taxonomy_exists('book_categories')) {
            register_taxonomy('book_categories', ['book'], $args);
        }

        /**
         * Register book_language taxonomy
         */
        $labels = [
            'name' => _x('Languages', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Language', 'taxonomy singular name', 'wp-kitab'),
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
            'rewrite' => ['slug' => 'language', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'language',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookLanguage',
            'graphql_plural_name' => 'bookLanguages',
        ];
        if (!taxonomy_exists('book_language')) {
            register_taxonomy('book_language', ['book'], $args);
        }

        /**
         * Register register_book_city_taxonomy
         */
        $labels = [
            'name' => _x('Cities', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('City', 'taxonomy singular name', 'wp-kitab'),
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
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'city', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'city',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'city',
            'graphql_plural_name' => 'cities',
        ];
        if (!taxonomy_exists('book_city')) {
            register_taxonomy('book_city', ['book'], $args);
        }

        /**
         * Register book_publisher taxonomy
         */
        $labels = [
            'name' => _x('Publishers', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Publisher', 'taxonomy singular name', 'wp-kitab'),
            'search_items' => __('Search Publishers', 'wp-kitab'),
            'all_items' => __('All Publishers', 'wp-kitab'),
            'parent_item' => __('Parent Publisher', 'wp-kitab'),
            'parent_item_colon' => __('Parent Publisher:', 'wp-kitab'),
            'edit_item' => __('Edit Publisher', 'wp-kitab'),
            'update_item' => __('Update Publisher', 'wp-kitab'),
            'add_new_item' => __('Add New Publisher', 'wp-kitab'),
            'new_item_name' => __('New Publisher Name', 'wp-kitab'),
            'menu_name' => __('Publishers', 'wp-kitab'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'publisher', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookPublisher',
            'graphql_plural_name' => 'bookPublishers',
        ];
        if (!taxonomy_exists('book_publisher')) {
            register_taxonomy('book_publisher', ['book'], $args);
        }

        /**
         * Register book_published_date taxonomy
         */
        $labels = [
            'name' => _x('Published Date', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Published Date', 'taxonomy singular name', 'wp-kitab'),
            'search_items' => __('Search Published Date', 'wp-kitab'),
            'all_items' => __('All Published Date', 'wp-kitab'),
            'parent_item' => __('Parent Published Date', 'wp-kitab'),
            'parent_item_colon' => __('Parent Published Date:', 'wp-kitab'),
            'edit_item' => __('Edit Published Date', 'wp-kitab'),
            'update_item' => __('Update Published Date', 'wp-kitab'),
            'add_new_item' => __('Add New Published Date', 'wp-kitab'),
            'new_item_name' => __('New Published Date Name', 'wp-kitab'),
            'menu_name' => __('Published Date', 'wp-kitab'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'published_date', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookPublishedDate',
            'graphql_plural_name' => 'bookPublishedDate',
        ];
        if (!taxonomy_exists('book_published_date')) {
            register_taxonomy('book_published_date', ['book'], $args);
        }

        /**
         * Register book_tags taxonomy
         */
        $labels = [
            'name' => _x('Tags', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Tag', 'taxonomy singular name', 'wp-kitab'),
            'search_items' => __('Search Tags', 'wp-kitab'),
            'all_items' => __('All Tags', 'wp-kitab'),
            'parent_item' => __('Parent Tag', 'wp-kitab'),
            'parent_item_colon' => __('Parent Tag:', 'wp-kitab'),
            'edit_item' => __('Edit Tag', 'wp-kitab'),
            'update_item' => __('Update Tag', 'wp-kitab'),
            'add_new_item' => __('Add New Tag', 'wp-kitab'),
            'new_item_name' => __('New Tag Name', 'wp-kitab'),
            'menu_name' => __('Tags', 'wp-kitab'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'book_tag', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookTag',
            'graphql_plural_name' => 'bookTags',
        ];
        if (!taxonomy_exists('book_tag')) {
            register_taxonomy('book_tag', ['book'], $args);
        }
    }
    /**
     * WP Unregister taxonomies
     */
    public function unregister()
    {
        global $taxonomies;
        foreach ($taxonomies as $taxonomy) {
            if (taxonomy_exists($taxonomy)) {
                unregister_taxonomy_for_object_type($taxonomy, 'book');
            }
        }
    }
}
