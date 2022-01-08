<?php

/**
 * Functions
 */

/**
 * Update the title of the book post type
 * by the book_authors taxonomy field and the book_title acf text field
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
