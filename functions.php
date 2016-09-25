<?php
define('THEMICE_VERSION', "0.3a");

if (!isset($content_width)) {
  $content_width = 900;
}

function themice_scripts() {
  wp_register_script('fullscreen', get_template_directory_uri() . '/js/fullscreen.js', '', THEMICE_VERSION, true);

  wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css', '', THEMICE_VERSION);
  wp_enqueue_script('fullscreen');
}

add_action('wp_enqueue_scripts', 'themice_scripts');

/* theme menu */
function themice_settings_menu() {
  // create new top-level menu
  add_menu_page( 
    __('Themice Settings', 'textdomain'),
    'Themice',
    'manage_options',
    'tm_settings_main',
    'themice_settings_page',
    get_stylesheet_directory_uri() . '/images/icon.png',
    6
  );

  // call register settings function
  add_action('admin_init', 'themice_settings_register');
}

function themice_settings_page() {
?>
  <div class="section panel">
    <h1>Custom Theme Options</h1>
    <form method="post" enctype="multipart/form-data" action="options.php">
      <?php 
        settings_fields('tm_theme_options'); 
      
        do_settings_sections('tm_theme_options.php');
      ?>
          <p class="submit">  
              <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
          </p>  
          
    </form>
  </div>
  <?php
}

function themice_settings_register() {
  // Register the settings with Validation callback
  register_setting('tm_theme_options', 'tm_theme_options');

  // Add settings section
  add_settings_section('tm_fb_section', 'Facebook', 'tm_display_section', 'tm_theme_options.php');

  $field_args = array(
    'type'      => 'checkbox',
    'id'        => 'tm_fbenabled',
    'name'      => 'tm_fbenabled',
    'desc'      => '',
    'std'       => '',
    'label_for' => 'tm_fbenabled',
    'class'     => 'css_class'
  );

  add_settings_field('fb_enabled', 'Enabled', 'tm_display_setting', 'tm_theme_options.php', 'tm_fb_section', $field_args);

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_fblink',
    'name'      => 'tm_fblink',
    'desc'      => 'Without http:// (ex. fb.com/devsaider)',
    'std'       => '',
    'label_for' => 'tm_fblink',
    'class'     => 'css_class'
  );

  add_settings_field('fb_link', 'Link', 'tm_display_setting', 'tm_theme_options.php', 'tm_fb_section', $field_args);

  // custom link section
  add_settings_section('tm_cl_section', 'Custom Link', 'tm_display_section', 'tm_theme_options.php');

  $field_args = array(
    'type'      => 'checkbox',
    'id'        => 'tm_clenabled',
    'name'      => 'tm_clenabled',
    'desc'      => '',
    'std'       => '',
    'label_for' => 'tm_clenabled',
    'class'     => 'css_class'
  );

  add_settings_field('cl_enabled', 'Enabled', 'tm_display_setting', 'tm_theme_options.php', 'tm_cl_section', $field_args);

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_cl_name',
    'name'      => 'tm_cl_name',
    'desc'      => 'ex. Dashboard',
    'std'       => '',
    'label_for' => 'tm_cl_name',
    'class'     => 'css_class'
  );

  add_settings_field('custom_link_name', 'Name', 'tm_display_setting', 'tm_theme_options.php', 'tm_cl_section', $field_args);

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_cl',
    'name'      => 'tm_cl',
    'desc'      => 'ex. https://my.mice.tf/',
    'std'       => '',
    'label_for' => 'tm_cl',
    'class'     => 'css_class'
  );

  add_settings_field('custom_link', 'Link', 'tm_display_setting', 'tm_theme_options.php', 'tm_cl_section', $field_args);

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_cdndomain',
    'name'      => 'tm_cdndomain',
    'desc'      => 'full domain name (ex. cdn.mice.tf)',
    'std'       => '',
    'label_for' => 'tm_cdndomain',
    'class'     => 'css_class'
  );

  add_settings_field('tm_cdndomain', 'CDN domain', 'tm_display_setting', 'tm_theme_options.php', 'tm_cl_section', $field_args);

  add_settings_section('tm_ad_section', 'AdSense', 'tm_display_section', 'tm_theme_options.php');

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_pub_1',
    'name'      => 'tm_pub_1',
    'desc'      => '160x600 or 120x600',
    'std'       => '',
    'label_for' => 'tm_pub_1',
    'class'     => 'css_class'
  );

  add_settings_field('tm_pub_1', 'Adsense #1', 'tm_display_setting', 'tm_theme_options.php', 'tm_ad_section', $field_args);

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_pub_2',
    'name'      => 'tm_pub_2',
    'desc'      => '728x90 before game',
    'std'       => '',
    'label_for' => 'tm_pub_2',
    'class'     => 'css_class'
  );

  add_settings_field('tm_pub_2', 'Adsense #2', 'tm_display_setting', 'tm_theme_options.php', 'tm_ad_section', $field_args);

  $field_args = array(
    'type'      => 'text',
    'id'        => 'tm_pub_3',
    'name'      => 'tm_pub_3',
    'desc'      => '728x90 after game',
    'std'       => '',
    'label_for' => 'tm_pub_3',
    'class'     => 'css_class'
  );

  add_settings_field('tm_pub_3', 'Adsense #3', 'tm_display_setting', 'tm_theme_options.php', 'tm_ad_section', $field_args);
}

function tm_display_setting($args)
{
    extract($args);

    $option_name = 'tm_theme_options';

    $options = get_option($option_name);

    switch ($type) {  
      case 'text':  
        $options[$id] = stripslashes($options[$id]);  
        $options[$id] = esc_attr( $options[$id]);  
        echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
        echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
        break;

      case 'checkbox':  
        $options[$id] = stripslashes($options[$id]);  
        $options[$id] = esc_attr( $options[$id]);  
        echo "<input class='$class' type='checkbox' id='$id' name='" . $option_name . "[$id]' " . (('on' == $options[$id]) ? 'checked="checked"' : '') . " />";  
        echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
        break;  
    }
}

add_action('admin_menu', 'themice_settings_menu');

function more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
}

function get_current_domain() {
  $options = get_option('tm_theme_options');

  if ($options["tm_cdndomain"] != "") {
    return $options["tm_cdndomain"];
  } else {
    $host = $_SERVER['SERVER_NAME'];
    list($subd, $domain) = explode('.', $host, 2);
    return "cdn." . $domain;
  }
}