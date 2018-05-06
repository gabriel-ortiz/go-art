<?php
function site_scripts() {
  
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  
  wp_register_script( 'slick',   get_template_directory_uri() . '/assets/scripts/vendors/slick.min.js', array(), '', true );
      
  // Adding scripts file in the footer
  wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery', 'slick' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
  
  // Register main stylesheet
  wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );
  
  wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css');    

  
  // Comment reply script for threaded comments
  if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
    wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);