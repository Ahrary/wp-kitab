<?php

/**
 * Functions
 *
 * @package wp-kitab
 * @author Ahrary
 * @version 1.0.0
 * @link https://github.com/Ahrary/wp-kitab
 * @license http://www.gnu.org/licenses/gpl-2.0.html
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

		// update the book post name by the book_title acf text field
		if (get_locale() == 'en_US' || get_locale() == 'en_GB') {
			$book['post_name'] = sanitize_title($book_title . '-en');
		} else if (get_locale() == 'ru_RU') {
			$book['post_name'] = sanitize_title($book_title . '-ru');
		} else {
			$book['post_name'] = sanitize_title($book_title);
		}

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
add_action('acf/save_post', 'wp_kitab_auto_assign_featured_image', 11);


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
	$a = shortcode_atts(
		[
			'id' => '',
		],
		$atts
	);

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
	$a = shortcode_atts([
			'id' => '',
			'range' => '',
			'all' => '',
		],
		$atts
	);

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
	$a = shortcode_atts([
		'id' => '',
	], $atts);

	$color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	return $color;
}

add_shortcode('wp_kitab_random_color', 'wp_kitab_add_random_color_to_shortcode');


/**
 * Add book_published_date to shortcode
 * @param $atts
 * @return string
 * @since 1.0.4
 * @author Ahrary
 */
function wp_kitab_add_book_published_date_to_shortcode($atts)
{
	$a = shortcode_atts([
		'id' => '',
	], $atts);

	$book_published_date = get_field('published_date', $a['id']);
	if ($book_published_date) {
		return $book_published_date;
	}
}
add_shortcode('book_published_date', 'wp_kitab_add_book_published_date_to_shortcode');


/**
 * Add Open Graph tags for Book
 * @param $post_id
 * @since 1.0.4
 * @author Ahrary
 * @link https://developers.facebook.com/docs/sharing/webmasters
 * @link https://developers.facebook.com/docs/sharing/best-practices
 * @link https://developers.facebook.com/docs/sharing/opengraph
 * @link https://developers.facebook.com/docs/sharing/best-practices#images
 */
/*
function wp_kitab_add_open_graph_tags($post_id)
{
	if (get_post_type($post_id) == 'book') {
		$book_authors = get_the_terms($post_id, 'book_author');

		if ($book_authors) {
			$book_authors_names = [];

			foreach ($book_authors as $book_author) {
				$book_authors_names[] = $book_author->name;
			}
		}

		$book_cover = get_field('cover', $post_id);
		if ($book_cover) {
			if (!is_numeric($book_cover)) {
				$book_cover = $book_cover['ID'];
			}
			$book_cover_url = wp_get_attachment_image_src($book_cover, 'full')[0];
		}

		$book_title = get_field('title', $post_id);

		$book_release_date = get_the_terms($post_id, 'book_published_date');

		if ($book_release_date) {
			$book_release_date = $book_release_date[0]->name;
		}

		$book_description = get_field('description', $post_id);

		$book_isbn = get_field('isbn', $post_id);

		$book_tags = get_the_terms($post_id, 'book_tag');

		if ($book_tags && isset($book_tags[0])) {
			$book_tags_names = [];

			foreach ($book_tags as $book_tag) {
				$book_tags_names[] = $book_tag->name;
				if (is_object($book_tags_names))
					$book_tags_names;
			}
		}
	}

	$book_url = get_permalink($post_id);

	echo '<meta property="og:type" content="book">&#13;&#10;';
	echo '<meta property="og:title" content="' . $book_title . '">&#13;&#10;';
	echo '<meta property="og:description" content="' . $book_description . '">&#13;&#10;';
	echo '<meta property="og:url" content="' . $book_url . '">&#13;&#10;';
	echo '<meta property="og:image" content="' . $book_cover_url . '">&#13;&#10;';
	echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '">&#13;&#10;';

	if (!is_object($book_authors_names)) {
		return;
	} else if (count($book_authors_names) > 1) {
		for ($i = 1; $i < count($book_authors_names); $i++) {
			echo '<meta property="book:author" content="' . $book_authors_names[$i] . '">&#13;&#10;';
		}
	} else {
		echo '<meta property="book:author" content="' . $book_authors_names[0] . '">&#13;&#10;';
	}
	echo '<meta property="book:isbn" content="' . $book_isbn . '">';
	echo '<meta property="book:release_date" content="' . $book_release_date . '">&#13;&#10;';

	if (taxonomy_exists($book_tags) && count($book_tags_names) > 1) {
		for ($i = 1; $i < count($book_tags_names); $i++) {
			echo '<meta property="book:tag" content="' . $book_tags_names[$i] . '">&#13;&#10;';
		}
	} else {
		echo '<meta property="book:tag" content="' . $book_tags_names[0] . '">&#13;&#10;';
	}

	echo '<meta property="og:locale" content="tg_TJ">&#13;&#10;';
}
add_action('wp_head', 'wp_kitab_add_open_graph_tags');
*/

/**
 * Add Open Graph tags for Author
 * @param $post_id
 * @since 1.0.4
 * @author Ahrary
 * @link https://developers.facebook.com/docs/sharing/webmasters
 * @link https://developers.facebook.com/docs/sharing/best-practices
 * @link https://developers.facebook.com/docs/sharing/opengraph
 * @link https://developers.facebook.com/docs/sharing/best-practices#images
 */
/*
function wp_kitab_add_open_graph_tags_for_author($post_id)
{
	if (get_taxonomy($post_id) == 'book_author') {
		$book_author_name = get_the_title($post_id);
		$book_author_url = get_permalink($post_id);

		echo '<meta property="og:type" content="book.author">';
		echo '<meta property="og:title" content="' . $book_author_name . '">';
		echo '<meta property="og:description" content="' . $book_author_name . '">';
		echo '<meta property="og:url" content="' . $book_author_url . '">';
		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '">';
		echo '<meta property="og:locale" content="tg_TJ">';
	}
}
add_action('wp_head', 'wp_kitab_add_open_graph_tags_for_author');
*/

/**
 * Create SVG Placeholder from book details
 * @param $post_id
 * @since 1.0.4
 * @author Ahrary
 * @link https://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src
 * @link https://codex.wordpress.org/Function_Reference/get_post_meta
 * @link https://codex.wordpress.org/Function_Reference/get_post_thumbnail_id
 * @link https://codex.wordpress.org/Function_Reference/get_post_meta
 */
/*
function wp_kitab_svg_placeholder($post_id)
{
	if (get_post_type($post_id) == 'book') {
		$book_title = get_field('title', $post_id);
		$book_authors = get_the_terms($post_id, 'book_author');
		$book_authors_name = $book_authors[0]->name;

		$book_published_date = get_the_terms($post_id, 'book_published_date');
		$book_published_date_name = $book_published_date[0]->name;

		$book_cover_url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
		$book_cover_url = $book_cover_url[0];

		// SVG Placeholder
		$svg_placeholder = '<svg xmlns="http://www.w3.org/2000/svg" width="300" height="400" viewBox="0 0 300 400">
			<rect width="300" height="400" fill="#f5f5f5" />
			<text x="150" y="150" text-anchor="middle" dominant-baseline="middle" font-family="sans-serif" font-size="24" fill="#333">' . $book_title . '</text>
			<text x="150" y="40" text-anchor="middle" dominant-baseline="middle" font-family="sans-serif" font-size="14" fill="#333">' . $book_authors_name . '</text>
			<text x="150" y="360" text-anchor="middle" dominant-baseline="middle" font-family="sans-serif" font-size="14" fill="#333">' . $book_published_date_name . '</text>
			<image x="0" y="0" width="300" height="400" xlink:href="' . $book_cover_url . '" />
		</svg>';


		// Save SVG Placeholder
		$upload_dir = wp_upload_dir();
		$upload_dir = $upload_dir['basedir'] . '/svg-placeholders/';
		$upload_file = $upload_dir . $post_id . '.svg';

		if (!file_exists($upload_dir)) {
			mkdir($upload_dir, 0777, true);
		}

		file_put_contents($upload_file, $svg_placeholder);

		// Set SVG Placeholder as Featured Image
		set_post_thumbnail($post_id, $upload_file . '.svg');


		 // Set SVG Placeholder as Featured Image
		$post_data = [
			'ID' => $post_id,
			'post_status' => 'publish',
			'post_type' => 'book',
		];

		wp_update_post($post_data);
	}
}
add_action('save_post', 'wp_kitab_svg_placeholder', 10, 3);
*/
