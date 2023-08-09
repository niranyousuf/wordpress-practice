<?php 

function ct_assets() {
    wp_enqueue_style('google-font', "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    wp_enqueue_style('font-awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

    wp_enqueue_style('bootstrap_css', get_theme_file_uri("./css/bootstrap.min.css"), null, microtime());
    wp_enqueue_style('owl.carousel.min_css', get_theme_file_uri("./css/owl.carousel.min.css"), null, microtime());
    wp_enqueue_style('ct_main_style_css', get_theme_file_uri("./css/style.css"), null, microtime());
    wp_enqueue_style('ct_main_styles', get_stylesheet_uri());

    wp_enqueue_script( 'bootstrap.bundle.min_js', get_theme_file_uri("./js/bootstrap.bundle.min.js"), array('jquery'), '1.0', true );
    wp_enqueue_script( 'owl.carousel.min_js', get_theme_file_uri("./js/owl.carousel.min.js"), array('jquery'), '1.0', true );
    wp_enqueue_script( 'ct_main_js', get_theme_file_uri("./js/script.js"), array('jquery'), '1.0', true );


    // wp_localize_script('main-university-js', 'universityData', array(
    //     'root_url' => get_site_url(),
    //     'nonce' => wp_create_nonce('wp_rest')
    //   ));

}
add_action('wp_enqueue_scripts', 'ct_assets');



function ct_features() {

    // register_nav_menu( "header_menu", "Header Menu" );

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

}
add_action( 'after_setup_theme', 'ct_features' );



// Events post filtering Query
function ct_adjust_queries($query) {

    if(!is_admin() && is_post_type_archive('program') && $query->is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    if(!is_admin() && is_post_type_archive('event') && $query->is_main_query()){
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        ));
    }

}
add_action('pre_get_posts', 'ct_adjust_queries');