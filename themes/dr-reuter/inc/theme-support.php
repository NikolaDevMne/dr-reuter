<?php

function drreuter_custom_logo_setup() {
  $defaults = array(
    'height'               => 100,
    'width'                => 300,
  );
  add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'drreuter_custom_logo_setup');

function allow_svg_upload($mime_types) {
  $mime_types['svg'] = 'image/svg+xml';
  return $mime_types;
}
add_filter('upload_mimes', 'allow_svg_upload');


function my_login_logo_one() {
  $custom_logo_id = get_theme_mod('custom_logo');
  $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?= $logo_url ?>);
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
      height: auto;
      width: auto;
    }
  </style>
<?php }

$role_object = get_role('editor');
$role_object->add_cap('edit_theme_options');

add_action('login_enqueue_scripts', 'my_login_logo_one');

add_theme_support("title-tag");

add_theme_support('automatic-feed-links');

add_theme_support('custom-spacing');

add_theme_support('post-thumbnails');
