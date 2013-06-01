<?php

  function better_excerpt( $excerpt ) {
  	global $post;
    return str_replace( ' [...]', '...<div class="clr"></div><a href="'. get_permalink($post->ID) . '" class="more-link">'.__( 'Continue reading &raquo;', 'theretailer' ).'</a>', $excerpt );
  }

  add_filter( 'wp_trim_excerpt', 'better_excerpt' );

  remove_filter( 'wp_trim_excerpt', 'new_excerpt_more' );
  
  function child_scripts() {
    wp_register_script('application', get_stylesheet_directory_uri() . '/js/application.js', 'jquery', '1', TRUE);
    
    wp_enqueue_script('application');
  }
  
  add_action('wp_enqueue_scripts', 'child_scripts', 99);
?>