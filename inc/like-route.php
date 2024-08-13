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


function createLike() {
	return 'Thanks for trying to create a like. ';
}

function deleteLike() {
	return 'Thanks for trying to delete the like. ';
}