<html>
  <head>
    <title><?php is_front_page() ? bloginfo('description') : wp_title('');?> &raquo; <?php bloginfo('name'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset');?>">
    <?php wp_head();?>
  </head>
  <body>
    <div id="page" class="blog blog-inverse">
      <?php get_sidebar(); ?>