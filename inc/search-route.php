<?php

add_action('rest_api_init', 'ct_custom_rest_search');

function ct_custom_rest_search() {
    register_rest_route('ct/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'ctSearchResults'
    ));
}

function ctSearchResults() {
    return 'WOW I have just created a new API';
}