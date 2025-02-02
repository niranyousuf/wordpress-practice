<?php
// Function to get and update post views
function get_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        // Initialize view count if it doesn't exist
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return '0 Views';
    }

    return $count . ' Views';
}

// Function to increment the post views (update count)
function set_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

// Action hook to track post views when a post is viewed
function track_post_views() {
    if (is_single()) {
        $post_id = get_the_ID();
        if (!empty($post_id)) {
            set_post_views($post_id);
        }
    }
}
add_action('wp_head', 'track_post_views');

// ---------------------------
// Add Views Column to Posts List in Dashboard
// ---------------------------

// Add a custom "Views" column to the post list table in the admin dashboard
function add_views_column($columns) {
    $columns['post_views'] = __('Views');
    return $columns;
}
add_filter('manage_posts_columns', 'add_views_column');

// Display the view count in the custom "Views" column
function show_post_views_column($column, $post_id) {
    if ('post_views' === $column) {
        echo get_post_views($post_id);
    }
}
add_action('manage_posts_custom_column', 'show_post_views_column', 10, 2);

// ---------------------------
// Make the Views Column Sortable
// ---------------------------

// Make the Views column sortable
function set_sortable_views_column($columns) {
    $columns['post_views'] = 'post_views_count';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'set_sortable_views_column');

// Handle the sorting functionality by views count
function sort_by_views_column($query) {
    if (!is_admin()) return;

    $orderby = $query->get('orderby');
    if ('post_views_count' === $orderby) {
        $query->set('meta_key', 'post_views_count');
        $query->set('orderby', 'numeric');
    }
}
add_action('pre_get_posts', 'sort_by_views_column');

// ---------------------------
// Custom Admin Styles
// ---------------------------

// Optional: Add custom styles for the Views column in the admin area
function custom_admin_styles() {
    echo '<style>
        .column-post_views {
            width: 80px;
            text-align: center;
        }
    </style>';
}
add_action('admin_head', 'custom_admin_styles');
