<?php 

require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/custom-posts.php');
// get author name por each post in rest api
function ct_custom_rest_api() {
    register_rest_field( 'post', 'authorName', array(
        'get_callback' => function() {return get_the_author();}
    ) );


    register_rest_field( 'note', 'userNoteCount', array(
        'get_callback' => function() {return count_user_posts(get_current_user_id(), 'note');}
    ) );
}
add_action( 'rest_api_init', 'ct_custom_rest_api' );


function pageBanner($args = NULL) {

    $args['title'] = isset($args['title']) ? $args['title'] : get_the_title();

    $args['subtitle'] = isset($args['subtitle']) ? $args['subtitle'] : get_field('page_banner_subtitle');

    if(!isset($args['photo'])) {
        $pageBannerImg = get_field('page_banner_background_image'); 
        if($pageBannerImg) {
            $args['photo'] = $pageBannerImg['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/hero.jpg');
        }
    }

?>
	<section class="page-banner" style="background-image: url(<?php echo $args['photo']; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content max_container">
                        <h2><?php echo $args['title']; ?></h2>
                        <p><?php echo $args['subtitle']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }

function ct_assets() {
    wp_enqueue_style('google-font', "//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:wght@600&display=swap");
    wp_enqueue_style('bootstrap_css', get_theme_file_uri("./css/bootstrap.min.css"), null, microtime());
    wp_enqueue_style('owl.carousel.min_css', get_theme_file_uri("./css/owl.carousel.min.css"), null, microtime());
    wp_enqueue_style('ct_main_style_css', get_theme_file_uri("./css/style.css"), null, microtime());
    wp_enqueue_style('ct_main_styles', get_stylesheet_uri());

    wp_enqueue_script( 'bootstrap.bundle.min_js', get_theme_file_uri("./js/bootstrap.bundle.min.js"), array('jquery'), '1.0', true );
    wp_enqueue_script( 'owl.carousel.min_js', get_theme_file_uri("./js/owl.carousel.min.js"), array('jquery'), '1.0', true );
    wp_enqueue_script( 'ct_main_js', get_theme_file_uri("./js/script.js"), array('jquery'), '1.0', true );


    wp_localize_script('ct_main_js', 'ctData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
      ));

}
add_action('wp_enqueue_scripts', 'ct_assets');



function ct_features() {

    // register_nav_menu( "header_menu", "Header Menu" );

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size( 'professorLandscape', 400, 260, true);
    add_image_size( 'professorPortrait', 480, 650, true);
    add_image_size( 'pageBanner', 1500, 350, true);

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


// function ct_map_key($api) {
//     $api['key'] = 'AIzaSyBEv-3hQ-zHY3ZYhWAC9p7I1WhZHaGZzNY';
//     return $api;
// }
// add_filter('acf/fields/google_map/api', 'ct_map_key');


// Redirect subscriber accounts out of admin and onto homepage
function ct_redirect_subs_frontend() {
    $currentUser = wp_get_current_user();
    if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        wp_redirect( site_url('/') );
        exit;
    }
}
add_action('admin_init', 'ct_redirect_subs_frontend');

// Disable admin bar for subscriber
function ct_no_subs_adminbar() {
    $currentUser = wp_get_current_user();
    if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        show_admin_bar( false );
    }
}
add_action('wp_loaded', 'ct_no_subs_adminbar');


// Customize login screen
add_filter('login_headerurl', 'ct_login_header_url');
function ct_login_header_url() {
    return esc_url(site_url('/'));
}
function ct_login_script() {
	wp_enqueue_style( 'codemonstar-login',  get_template_directory_uri() . "/css/login.css" );
    wp_enqueue_style('google-font', "//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:wght@600&display=swap");
}
add_action( 'login_enqueue_scripts', 'ct_login_script' );

// Header title change 
// function ct_header_title() {
//     return get_bloginfo( 'name' );
// }
// add_filter( 'login_headertitle', 'ct_header_title' );

// login Form logo
add_action( 'login_header', function ($a) {
    // printf('<a class="login-logo" href="%1$s"><img src="%2$s" alt=""></a>', site_url(), get_template_directory_uri().'/assets/images/logo.svg');
    printf('<div class="login-logo-block"><a class="login-logo" href="%1$s"><strong>Code</strong>Monstar</a></div>', site_url());
} );


// Force note posts to be private
function ct_make_note_private($data, $postarr) {

    if($data['post_type'] == 'note') {

        if(count_user_posts(get_current_user_id(), 'note') > 4 AND !$postarr['ID']) {
            die('You have reached your note limit.');
        }

        $data['post_title'] = sanitize_text_field($data['post_title']);
        $data['post_content'] = sanitize_textarea_field($data['post_content']);
    }

    if($data['post_type'] == 'note' AND $data['post_status'] != 'trash') {
        $data['post_status'] = 'private';
    }
    return $data;
}
add_filter('wp_insert_post_data', 'ct_make_note_private', 10, 2);