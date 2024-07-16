<?php
function drreuter_scripts() {
    $url_path = get_template_directory_uri() . '/assets';

    wp_enqueue_style('bootstrap', $url_path . '/css/bootstrap.min.css', false, true, 'all');
    wp_enqueue_style('poppins', $url_path . '/fonts/font-poppins.css', false, true, 'all');
    if (is_archive()) {
        wp_enqueue_style('compare', $url_path . '/fonts/compare-slider.css', false, true, 'all');
    }
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], true, 'all');
    wp_enqueue_style('style', $url_path . '/css/style.css', ['bootstrap', 'poppins'], true, 'all');

    wp_enqueue_script('bootstrap', $url_path . '/js/bootstrap.bundle.min.js', false, true, ['strategy' => 'defer']);
    if (is_archive()) {
        wp_enqueue_script('compare', $url_path . '/js/compare-slider.js', false, true, ['strategy' => 'defer']);
    }
    
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', false, true, ['strategy' => 'defer']);
    wp_enqueue_script('main', $url_path . '/js/script.js', false, true, ['strategy' => 'defer']);
}

add_action('wp_enqueue_scripts', 'drreuter_scripts');
add_action('customize_preview_init', 'drreuter_scripts');
