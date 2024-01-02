<?php
/**
 * Register Custom Post Type: Hero.
 */
function create_custom_hero_post_type() {
    $labels = array(
        'name'                  => _x( 'Heroes', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Hero', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Heroes', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Hero', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Hero', 'textdomain' ),
        'new_item'              => __( 'New Hero', 'textdomain' ),
        'edit_item'             => __( 'Edit Hero', 'textdomain' ),
        'view_item'             => __( 'View Hero', 'textdomain' ),
        'all_items'             => __( 'All Heroes', 'textdomain' ),
        'search_items'          => __( 'Search Heroes', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Heroes:', 'textdomain' ),
        'not_found'             => __( 'No heroes found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No heroes found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Hero Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set hero image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove hero image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as hero image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Hero archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into hero', 'Overrides the “Insert into item”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this hero', 'Overrides the “Uploaded to this item”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter heroes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Heroes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Heroes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'hero' ), // Change 'hero' to your desired URL slug
        'capability_type'    => 'post',
        'has_archive'        => false, // Disable archives
        'hierarchical'       => false,
        'menu_position'      => null,
        'exclude_from_search' => true, // Exclude from search results
        'menu_icon'          => 'dashicons-embed-generic', // Change to your desired icon
        'supports'           => array( 'title', 'custom-fields' ),
    );

    register_post_type( 'hero', $args );
}
add_action( 'init', 'create_custom_hero_post_type' );
