<?php

add_action('rest_api_init', 'ct_custom_rest_search');

function ct_custom_rest_search() {
    register_rest_route('ct/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'ctSearchQuery'
    ));
}

function ctSearchQuery($data) {
    $searchQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'event', 'campus', 'program', 'professor'),
        's' => sanitize_text_field($data['term'])
    ));

    $searchResults = array(
        'generalInfo' => array(),
        'events' => array(),
        'professors' => array(),
        'programs' => array(),
        'campuses' => array()
    );

    while($searchQuery->have_posts()) {
        $searchQuery->the_post();

        if(get_post_type() == 'post' OR get_post_type() == 'page') {
            array_push($searchResults['generalInfo'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'postType' => get_post_type(),
                'authorName' => get_the_author()
            ));
        }

        if(get_post_type() == 'professor') {
            array_push($searchResults['professors'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
            ));
        }
        if(get_post_type() == 'program') {
            array_push($searchResults['programs'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                
            ));
        }
        if(get_post_type() == 'campus') {
            array_push($searchResults['campuses'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                
            ));
        }
        if(get_post_type() == 'event') {
            array_push($searchResults['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                
            ));
        }

    }

    return $searchResults;
}