<?php

add_action('rest_api_init', 'ct_like_routes');
function ct_like_routes() {
	register_rest_route('ct/v1', 'manageLike', array(
		'methods' => 'POST',
		'callback' => 'createLike'
	));
	register_rest_route('ct/v1', 'manageLike', array(
		'methods' => 'DELETE',
		'callback' => 'deleteLike'
	));
}


function createLike($data) {
	$professorId = sanitize_text_field( $data['professorId'] );
	wp_insert_post( array(
		'post_type' => 'like',
		'post_status' => 'publish',
		'post_title' => 'Our PHP Create post test',
		'meta_input' => array(
			'liked_professor_id' => $professorId
		)
	) );
}

function deleteLike() {
	return 'Thanks for trying to delete the like. ';
}