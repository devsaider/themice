<?php
define('THEMICE_VERSION', "0.1a");

if (!isset($content_width)) {
  $content_width = 900;
}

function themice_scripts() {
  wp_register_script('fullscreen', get_template_directory_uri() . '/js/fullscreen.js', '', THEMICE_VERSION, true);

  wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css', '', THEMICE_VERSION);
  wp_enqueue_script('fullscreen');
}

add_action('wp_enqueue_scripts', 'themice_scripts');