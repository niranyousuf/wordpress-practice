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
}

add_action('wp_enqueue_scripts', 'ct_assets');


function ct_features() {
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'ct_features' );