<?php

/**
 * Registering the fields for the ACF plugin.
 */

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(
        [
            'key' => 'group_60438237185b5',
            'title' => 'Book',
            'fields' => [
                [
                    'key' => 'field_6043849e1926b',
                    'label' => __('Title', 'wp-kitab'),
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => __('Enter the Title', 'wp-kitab'),
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => 'title',
                        'id' => 'title',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'show_column' => 1,
                    'show_column_sortable' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],

                /**
                 * Book Authors Field
                 */
                [
                    'key' => 'field_605eec2842efa',
                    'label' => __('Authors', 'wp-kitab'),
                    'name' => 'authors',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the Authors', 'wp-kitab'),
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => 'authors',
                        'id' => 'authors',
                    ],
                    'taxonomy' => 'book_author',
                    'field_type' => 'multi_select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book city field
                 */
                [
                    'key' => 'field_6043851b1926d',
                    'label' => __('City', 'wp-kitab'),
                    'name' => 'city',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the City', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'city',
                        'id' => 'city',
                    ],
                    'taxonomy' => 'book_city',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book Publisher field
                 */
                [
                    'key' => 'field_604385561926e',
                    'label' => __('Publisher', 'wp-kitab'),
                    'name' => 'publisher',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the Publisher', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'publisher',
                        'id' => 'publisher',
                    ],
                    'taxonomy' => 'book_publisher',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book Published Date field
                 */
                [
                    'key' => 'field_61d5e14bf74a1',
                    'label' => __('Published Date', 'wp-kitab'),
                    'name' => 'published_date',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the Published Date', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'published-date',
                        'id' => 'published-date',
                    ],
                    'taxonomy' => 'book_published_date',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book Volume field
                 */
                [
                    'key' => 'field_604385a61926f',
                    'label' => __('Volume', 'wp-kitab'),
                    'name' => 'volume',
                    'type' => 'number',
                    'instructions' => __('Enter the Volume', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'volume',
                        'id' => 'volume',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                    'show_column' => 1,
                    'show_column_sortable' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],

                /**
                 * Book Page Count field
                 */
                [
                    'key' => 'field_6043862c19270',
                    'label' => __('Page Count', 'wp-kitab'),
                    'name' => 'page_count',
                    'type' => 'text',
                    'instructions' => __('Enter the Page Count', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'page-count',
                        'id' => 'page-count',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'show_column' => 1,
                    'show_column_sortable' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],

                /**
                 * Book Category field
                 */
                [
                    'key' => 'field_61d5e25ef74a2',
                    'label' => __('Category', 'wp-kitab'),
                    'name' => 'category',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the Category', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'category',
                        'id' => 'category',
                    ],
                    'taxonomy' => 'book_category',
                    'field_type' => 'multi_select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book Genres field
                 */
                [
                    'key' => 'field_6154b240a829b',
                    'label' => __('Genres', 'wp-kitab'),
                    'name' => 'genres',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the Genres', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'genres',
                        'id' => 'genres',
                    ],
                    'taxonomy' => 'book_genres',
                    'field_type' => 'multi_select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book Language field
                 */
                [
                    'key' => 'field_61bf6e906a659',
                    'label' => __('Language', 'wp-kitab'),
                    'name' => 'language',
                    'type' => 'taxonomy',
                    'instructions' => __('Select or add the Language', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'language',
                        'id' => 'language',
                    ],
                    'taxonomy' => 'book_language',
                    'field_type' => 'multi_select',
                    'allow_null' => 0,
                    'add_term' => 1,
                    'save_terms' => 1,
                    'load_terms' => 1,
                    'return_format' => 'id',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                    'multiple' => 0,
                ],

                /**
                 * Book ISBN field
                 */
                [
                    'key' => 'field_61d1af3eefec3',
                    'label' => __('ISBN', 'wp-kitab'),
                    'name' => 'isbn',
                    'type' => 'text',
                    'instructions' => __('Enter book ISBN', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '33',
                        'class' => 'isbn',
                        'id' => 'isbn',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => 'ISBN',
                    'append' => '',
                    'maxlength' => '',
                    'show_column' => 1,
                    'show_column_sortable' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],

                /**
                 * Book File field
                 */
                [
                    'key' => 'field_609913d61bf86',
                    'label' => __('File', 'wp-kitab'),
                    'name' => 'file',
                    'type' => 'file',
                    'instructions' => __('Attach the book file', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '50',
                        'class' => 'file',
                        'id' => 'file',
                    ],
                    'return_format' => 'array',
                    'library' => 'all',
                    'min_size' => '',
                    'max_size' => '',
                    'mime_types' => 'pdf, docx, doc, rtf',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],

                /**
                 * Book Cover field
                 */
                [
                    'key' => 'field_61bf5066c6498',
                    'label' => __('Cover', 'wp-kitab'),
                    'name' => 'cover',
                    'type' => 'image',
                    'instructions' => __('Attach the Cover', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '50',
                        'class' => 'cover',
                        'id' => 'cover',
                    ],
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                    'show_column' => 1,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],

                /**
                 * Book Description field
                 */
                [
                    'key' => 'field_61bf208f1e397',
                    'label' => __('Description', 'wp-kitab'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => __('Enter Book Description', 'wp-kitab'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => 'description',
                        'id' => 'description',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => 'wpautop',
                    'show_column' => 0,
                    'show_column_weight' => 1000,
                    'allow_quickedit' => 0,
                    'allow_bulkedit' => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'book',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'revisions',
                2 => 'author',
                3 => 'format',
                4 => 'categories',
            ],
            'active' => true,
            'description' => 'The fields for a book properties',
            'show_in_rest' => 1,
        ]
    );

endif;
