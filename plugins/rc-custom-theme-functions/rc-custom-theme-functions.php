<?php

/**
 * Plugin Name:       RC | Custom theme functions
 * Description:       Custom wordpress functionalities. Essential, don't disable.
 * Version:           1.0
 * Author:            Robotcode
 * Author URI: 		  https://robotcode.me
 * Text Domain:       dr-reuter
 * Domain Path:       dr-reuter
 */

if (!defined('ABSPATH')) {
    exit;
}

class RC_Custom_Theme_Functions {
    function __construct() {
        add_filter('styles_inline_size_limit', '__return_zero');
        add_action('init', [$this, 'register_blocks']);
    }

    function register_blocks() {
        $dirUrl =  __DIR__ . '/build/';

        $originalBlocks = scandir($dirUrl);
        $originalBlocks = array_diff($originalBlocks, ['.', '..']);

        foreach ($originalBlocks as $block) {
            register_block_type($dirUrl . $block . '/block.json');
        }
    }
}

new RC_Custom_Theme_Functions();
