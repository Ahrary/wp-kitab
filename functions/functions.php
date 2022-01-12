<?php

/**
 * Functions
 *
 * @package wp-kitab
 * @author Ahrary
 * @version 1.0.0
 * @link https://github.com/Ahrary/wp-kitab
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @since 1.0.2
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
		$book_title = get_field('title', $post_id);

		$book_description = get_field('description', $post_id);
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

		if (empty($book['post_title'])) {
			$book['post_title'] = implode(' ', $book_authors_names) . '. ' . $book_title;
		}

		$book['post_excerpt'] = $book_description;

		wp_update_post($book);
	}
}

add_action('acf/save_post', 'wp_kitab_update_title_and_excerpt', 20);


//Auto assign Featured image from 'book_cover' field
function wp_kitab_auto_assign_featured_image($post_id)
{
	if (get_post_type($post_id) == 'book') {

		$book_cover = get_field('cover', $post_id);
		if ($book_cover) {
			if (!is_numeric($book_cover)) {
				$book_cover = $book_cover['ID'];
			}
			update_post_meta($post_id, '_thumbnail_id', $book_cover);
		} else {
			delete_post_meta($post_id, '_thumbnail_id');
		}
	}
}

add_action('acf/save_post', 'auto_assign_featured_image', 11);


/**
 * Add book_cover url to shortcode
 */
function wp_kitab_add_featured_image_url_to_shortcode($atts)
{
	$a = shortcode_atts(array(
		'id' => '',
	), $atts);

	$book_cover = get_field('cover', $a['id']);
	if ($book_cover) {
		if (!is_numeric($book_cover)) {
			$book_cover = $book_cover['ID'];
		}
		$book_cover_url = wp_get_attachment_image_src($book_cover, 'full')[0];
		return $book_cover_url;
	}
}
add_shortcode('book_cover', 'wp_kitab_add_featured_image_url_to_shortcode');

/**
 * Add book_title to shortcode
 */
function wp_kitab_add_book_title_to_shortcode($atts)
{
	$a = shortcode_atts(array(
		'id' => '',
	), $atts);

	$book_title = get_field('title', $a['id']);
	if ($book_title) {
		return $book_title;
	}
}
add_shortcode('book_title', 'wp_kitab_add_book_title_to_shortcode');

/**
 * Add book_author to shortcode
 * @param $atts
 * @return string
 * @since 1.0.3
 * @author Ahrary
 * shortcode [book_author 1-2] return the first and second author name
 * shortcode [book_author range="1-10,12-20"] return the first to tenth author name and the 12 to 20 author name in a range
 * shortcode [book_author] return 1 author name
 * shortcode [book_author all] return all author name
 */
function wp_kitab_add_book_author_to_shortcode($atts)
{
	$a = shortcode_atts(array(
		'id' => '',
		'range' => '',
		'all' => '',
	), $atts);

	$book_authors = get_the_terms($a['id'], 'book_author');

	if ($book_authors) {
		$book_authors_names = [];

		foreach ($book_authors as $book_author) {
			$book_authors_names[] = $book_author->name;
		}

		if ($a['range']) {
			$range = explode(',', $a['range']);
			$book_authors_names = array_slice($book_authors_names, $range[0], $range[1] - $range[0] + 1);
		}

		if ($a['all'] == 'all') {
			return implode(', ', $book_authors_names);
		} else {
			return $book_authors_names[0];
		}
	}
}

add_shortcode('book_author', 'wp_kitab_add_book_author_to_shortcode');


/**
 * Generate random color for book
 * and add it to shortcode
 * @param $atts
 * @return string
 * @since 1.0.3
 * @author Ahrary
 * shortcode [wp_kitab_random_color] return one random color
 */
function wp_kitab_add_random_color_to_shortcode($atts)
{
	$a = shortcode_atts(array(
		'id' => '',
	), $atts);

	$color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	return $color;
}


add_shortcode('wp_kitab_random_color', 'wp_kitab_add_random_color_to_shortcode');

