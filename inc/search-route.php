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
            $relatedCampuses = get_field('related_campus');

            if($relatedCampuses) {
                foreach ($relatedCampuses as $campus) {
                    array_push($searchResults['campuses'], array(
                        'title' => get_the_title($campus),
                        'permalink' => get_the_permalink($campus)
                    ));
                }
            }

            array_push($searchResults['programs'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'id' => get_the_id()
            ));
        }
        if(get_post_type() == 'campus') {
            array_push($searchResults['campuses'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                
            ));
        }
        if(get_post_type() == 'event') {
            $eventDate = new DateTime(get_field('event_date'));

            $content = get_the_content();
            $trimmed_content = wp_trim_words($content, 10, '  &raquo;');

            array_push($searchResults['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'exarpt' =>  $trimmed_content
            ));
        }

    }

    if($searchResults['programs']) {
            
        $programsMetaQuery = array('relation' => 'OR');
        foreach ($searchResults['programs'] as $item) {
            array_push($programsMetaQuery, array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' . $item['id'] . '"'
            ));
        };
        $programRelatedQuery = new WP_Query(array(
            'post_type' => array('professor', 'event', 'campus'),
            'meta_query' => $programsMetaQuery
        ));

        while($programRelatedQuery->have_posts()) {
            $programRelatedQuery->the_post();
            
            if(get_post_type() == 'professor') {
                array_push($searchResults['professors'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
                ));
            }

            if(get_post_type() == 'event') {
                $eventDate = new DateTime(get_field('event_date'));
    
                $trimmed_content = wp_trim_words(get_the_content(), 10, '  &raquo;');
    
                array_push($searchResults['events'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'month' => $eventDate->format('M'),
                    'day' => $eventDate->format('d'),
                    'exarpt' =>  $trimmed_content
                ));
            }
            
        }

        $searchResults['professors'] = array_values(array_unique($searchResults['professors'], SORT_REGULAR));
        $searchResults['events'] = array_values(array_unique($searchResults['events'], SORT_REGULAR));
    }

    return $searchResults;
}