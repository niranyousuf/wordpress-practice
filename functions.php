<?php 

function wpc_assets() {
    wp_enqueue_style('google-font', "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    wp_enqueue_style('font-awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

    wp_enqueue_style('wpc_main_index_css', get_theme_file_uri("./assets/css/index.css"), null, microtime());
    wp_enqueue_style('wpc_main_style_index_css', get_theme_file_uri("./assets/css/style-index.css"), null, microtime());
    wp_enqueue_style('wpc_main_styles', get_stylesheet_uri());

    wp_enqueue_script( 'wpc_main_js', get_theme_file_uri("./assets/js/index.js"), [], microtime(), true );
}

add_action('wp_enqueue_scripts', 'wpc_assets');