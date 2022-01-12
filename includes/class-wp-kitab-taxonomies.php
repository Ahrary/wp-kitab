<?php

/**
 * This class for registering
 * book_author,
 * book_category,
 * book_genres,
 * book_language,
 * book_city,
 * book_publisher,
 * book_published_date taxonomies
 * and book_tags taxonomies for Book CPT.
 */
$taxonomies = [
    'book_author',
    'book_category',
    'book_genres',
    'book_language',
    'book_city',
    'book_publisher',
    'book_published_date',
    'book_tag',
];

class WP_Kitab_Taxonomies
{

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_taxes']);
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
            'separate_items_with_commas' => __('Separate Authors with commas', 'wp-kitab'),
            'add_or_remove_items' => __('Add or remove Authors', 'wp-kitab'),
            'choose_from_most_used' => __('Choose from the most used Authors', 'wp-kitab'),
            'not_found' => __('No authors found', 'wp-kitab'),
            'back_to_items' => __('Back to Authors', 'wp-kitab'),
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
            'rewrite' => ['slug' => 'book_author', 'with_front' => false,],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'author',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookAuthor',
            'graphql_plural_name' => 'bookAuthors',
        ];
        if (!taxonomy_exists('book_author')) {
            register_taxonomy('book_author', ['book'], $args);
        }

        /**
         * Register book_category taxonomy
         */

        $labels = [
            'name' => _x('Categories', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Category', 'taxonomy singular name', 'wp-kitab'),
            'all_items' => __('All Categories', 'wp-kitab'),
            'edit_item' => __('Edit Category', 'wp-kitab'),
            'view_item' => __('View Category', 'wp-kitab'),
            'update_item' => __('Update Category', 'wp-kitab'),
            'add_new_item' => __('Add New Category', 'wp-kitab'),
            'new_item_name' => __('New Category Name', 'wp-kitab'),
            'search_items' => __('Search Categories', 'wp-kitab'),
            'menu_name' => __('Categories', 'wp-kitab'),
            'popular_items' => __('Popular Categories', 'wp-kitab'),
            'separate_items_with_commas' => __('Separate Categories with commas', 'wp-kitab'),
            'add_or_remove_items' => __('Add or remove Categories', 'wp-kitab'),
            'choose_from_most_used' => __('Choose from the most used Categories', 'wp-kitab'),
            'not_found' => __('No Categories found', 'wp-kitab'),
            'back_to_items' => __('Back to Categories', 'wp-kitab'),
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
            'rewrite' => [
                'slug' => 'book_category',
                'with_front' => false,
            ],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'book_category',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookCategory',
            'graphql_plural_name' => 'bookCategories',
        ];
        if (!taxonomy_exists('book_category')) {
            register_taxonomy('book_category', ['book'], $args);
        }

        /**
         * Register book_categories taxonomy
         */
        $labels = [
            'name' => _x('Genres', 'taxonomy general name', 'wp-kitab'),
            'singular_name' => _x('Genre', 'taxonomy singular name', 'wp-kitab'),
            'menu_name' => __('Genres', 'wp-kitab'),
            'all_items' => __('All Genres', 'wp-kitab'),
            'edit_item' => __('Edit Genre', 'wp-kitab'),
            'view_item' => __('View Genre', 'wp-kitab'),
            'update_item' => __('Update Genre', 'wp-kitab'),
            'add_new_item' => __('Add New Genre', 'wp-kitab'),
            'new_item_name' => __('New Genre Name', 'wp-kitab'),
            'search_items' => __('Search Genres', 'wp-kitab'),
            'popular_items' => __('Popular Genres', 'wp-kitab'),
            'separate_items_with_commas' => __('Separate Genres with commas', 'wp-kitab'),
            'add_or_remove_items' => __('Add or remove Genres', 'wp-kitab'),
            'choose_from_most_used' => __('Choose from the most used Genres', 'wp-kitab'),
            'not_found' => __('No Genres found', 'wp-kitab'),
            'back_to_items' => __('Back to Genres', 'wp-kitab'),
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
            'rewrite' => [
                'slug' => 'genres',
                'with_front' => false,
            ],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'genres',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookGenre',
            'graphql_plural_name' => 'bookGenres',
        ];
        if (!taxonomy_exists('book_genres')) {
            register_taxonomy('book_genres', ['book'], $args);
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
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => [
                'slug' => 'language',
                'with_front' => false,
            ],
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
            'rewrite' => [
                'slug' => 'city',
                'with_front' => false,
            ],
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
            'popular_items' => __('Popular Publishers', 'wp-kitab'),
            'separate_items_with_commas' => __('Separate publishers with commas', 'wp-kitab'),
            'add_or_remove_items' => __('Add or remove publishers', 'wp-kitab'),
            'choose_from_most_used' => __('Choose from the most used publishers', 'wp-kitab'),
            'not_found' => __('No publishers found', 'wp-kitab'),
            'back_to_items' => __('Back to publishers', 'wp-kitab'),
            'all_items' => __('All Publishers', 'wp-kitab'),
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
            'rewrite' => [
                'slug' => 'publisher',
                'with_front' => false,
            ],
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
            'rewrite' => [
                'slug' => 'published_date',
                'with_front' => false,
            ],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'published_date',
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
            'rewrite' => [
                'slug' => 'book_tags',
                'with_front' => false,
            ],
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rest_base' => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_quick_edit' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'bookTag',
            'graphql_plural_name' => 'bookTags',
        ];
        if (!taxonomy_exists('book_tags')) {
            register_taxonomy('book_tags', ['book'], $args);
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
