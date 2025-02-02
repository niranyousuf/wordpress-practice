<?php
// Query for most viewed posts
function get_most_viewed_posts($posts_per_page = 5)
{
	$args = array(
		'post_type'      => 'post', // You can change this to any custom post type
		'posts_per_page' => $posts_per_page,
		'meta_key'       => 'post_views_count', // The custom meta key
		'orderby'        => 'meta_value_num', // Sort by numeric meta value
		'order'          => 'DESC', // Descending order (most viewed first)
		'meta_query'     => array(
			array(
				'key'     => 'post_views_count',
				'compare' => 'EXISTS', // Ensure the meta field exists
			),
		),
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		echo '<ul>';
		while ($query->have_posts()) {
			$query->the_post();
			echo '<li><a href="' . get_permalink() . '">' . get_the_title() . ' - ' . get_post_views(get_the_ID()) . '</a></li>';
		}
		echo '</ul>';
	} else {
		echo 'No posts found.';
	}

	// Reset post data after custom query
	wp_reset_postdata();
}



// Display top 5 most viewed posts
get_most_viewed_posts(5);
