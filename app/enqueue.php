<?php
/**
 * Enqueue custom styles for the theme.
 */
function enqueue_custom_styles() {
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), '2.0.0' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

/**
 * Enqueue custom script for the theme.
 */
function enqueue_my_script() {
    wp_enqueue_script( 'my-main-script', get_template_directory_uri() . '/dist/js/main.min.js', array(), '3.0.p', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_script' );

/**
 * Remove the wp-i18n script.
 */
function remove_wp_i18n_script() {
    wp_deregister_script( 'wp-i18n' );
}
add_action( 'wp_enqueue_scripts', 'remove_wp_i18n_script' );

/**
 * Remove default scripts and styles.
 */
function remove_default_scripts() {

    // Deregister emoji script.
    wp_deregister_script( 'emoji' );

    // Deregister default block styles.
    wp_deregister_style( 'wp-block-library-theme' );

    // Deregister WordPress default CSS.
    wp_deregister_style( 'buttons' );
    wp_deregister_style( 'forms' );
    wp_deregister_style( 'dashicons' );
}

add_action( 'wp_enqueue_scripts', 'remove_default_scripts', 999 );

/**
 * Remove the admin bar for non-admin users.
 */
add_action( 'after_setup_theme', 'remove_admin_bar' );
function remove_admin_bar() {
    show_admin_bar( false );
}
