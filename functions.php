<?php

/**
 * Store Theme Functions
 *
 * @package Store
 * @version 1.0
 */

if (! defined('STORE_DIR_PATH')) {
    define('STORE_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (! defined('STORE_DIR_URI')) {
    define('STORE_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once STORE_DIR_PATH . '/inc/helpers/autoloader.php';
require_once STORE_DIR_PATH . '/inc/helpers/template-tags.php';


function store_get_theme_instance()
{
    \Store\Inc\STORE_THEME::get_instance();
}
store_get_theme_instance();

function store_enqueue_scripts() {}

add_action('wp_enqueue_scripts', 'store_enqueue_scripts');
