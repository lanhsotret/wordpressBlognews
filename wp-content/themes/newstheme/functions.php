<?php
function learningWordpress_resources() {
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_register_style('stylesheet', get_template_directory_uri() . '/CSS/main.css', array(), 1, all);
        wp_enqueue_style('stylesheet');

    }
add_action('wp_enqueue_scripts', 'learningWordpress_resources');

register_nav_menus(array(
    'pageChild' => __( 'pageChild Menu'),
    'navbar' => __('navbar Menu'),
));

function learningWordpress_setup () {

    //add featured image support
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'learningWordpress_setup');

function create_custom_taxonomy($name, $post_type) {
    return function() use ($name) {
        $labels = array(
            'name' => _x( $name . 's', $name . ' General Name', $name ),
            'singular_name' => _x( $name, $name . ' Singular Name', $name ),
            'menu_name' => __( $name, $name ),
            'all_items' => __( 'All Items', $name ),
            'parent_item' => __( 'Parent Item', $name ),
            'parent_item_colon' => __( 'Parent Item:', $name ),
            'new_item_name' => __( 'New Item Name', $name ),
            'add_new_item' => __( 'Add New Item', $name ),
            'edit_item' => __( 'Edit Item', $name ),
            'update_item' => __( 'Update Item', $name ),
            'view_item' => __( 'View Item', $name ),
            'separate_items_with_commas' => __( 'Separate items with commas', $name ),
            'add_or_remove_items'  => __( 'Add or remove items', $name ),
            'choose_from_most_used' => __( 'Choose from the most used', $name ),
            'popular_items' => __( 'Popular Items', $name ),
            'search_items' => __( 'Search Items', $name ),
            'not_found' => __( 'Not Found', $name ),
            'no_terms' => __( 'No items', $name ),
            'items_list' => __( 'Items list', $name ),
            'items_list_navigation' => __( 'Items list navigation', $name )
	    );
        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true
        );
        register_taxonomy( $name, array( $post_type ), $args);
    };
}
//add_action( 'init', create_custom_taxonomy("Art"), 0);


function func_custom_post_type($name) {
    return function() use ($name) {
        $labels = array(
            'name' => _x( $name . 's', $name ),
            'singular_name' => _x( $name, $name ),
            'add_new' => _x( 'Add New', $name ),
            'add_new_item' => _x( 'Add New ' . $name, $name ),
            'edit_item' => _x( 'Edit ' . $name, $name ),
            'new_item' => _x( 'New ' . $name, $name ),
            'view_items' => _x( 'View ' . $name . 's', $name ),
            'search_items' => _x( 'Search ' . $name, $name ),
            'not_found' => _x( 'No ' . $name . ' found', $name ),
            'not_found_in_trash' => _x( 'No ' . $name . ' found in trash', $name ),
            'parent_item_colon' => _x( 'Parent ' . $name . ':', $name ),
            'menu_name' => _x( $name, $name )
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'This is my custom post type.',
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'page-attributes'
            ),
            'taxonomies' => array('category', 'post_tag', 'page-category'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'query_var' => true,
            'rewrite' => true,
            'menu_icon' => '',
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post'
        );
        register_post_type( $name, $args);
    };
}

add_action( 'init', func_custom_post_type('Anime'));
add_action( 'init', func_custom_post_type('Manga'));
add_action( 'init', func_custom_post_type('Live Action'));
add_action( 'init', func_custom_post_type('Drama'));
add_action( 'init', func_custom_post_type('Game'));
add_action( 'init', func_custom_post_type('Light Novel'));
add_action( 'init', func_custom_post_type('Music'));
add_action( 'init', func_custom_post_type('Cosplay'));
add_action( 'init', func_custom_post_type('Figure'));
add_action( 'init', func_custom_post_type('Gallery'));
add_action( 'init', func_custom_post_type('Character'));
add_action( 'init', func_custom_post_type('Art'));