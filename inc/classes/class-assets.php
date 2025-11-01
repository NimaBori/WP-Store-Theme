<?php

/**
 * Enqueue Theme Assets
 * @package Store
 * @version 1.0
 */

namespace Store\Inc;

use Store\Inc\Traits\Singleton;

class Assets {
  use Singleton;

    public function __construct() {     
      
      // Load class.
      $this->setup_hooks();
  }

  protected function setup_hooks() {
    // Actions and Filters
    add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
  }

  public function register_styles() {
    // Registered Styles
    wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( STORE_DIR_PATH . '/style.css' ), 'all' );
    wp_register_style( 'bootstrap-css', STORE_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

    // Enqueue Styles
    wp_enqueue_style( 'style-css' );
    wp_enqueue_style( 'bootstrap-css' );
  }

  public function register_scripts() {
    // Registered Scripts
    wp_register_script( 'main-js', STORE_DIR_URI . '/assets/main.js', [ 'jquery' ], filemtime( STORE_DIR_PATH . '/assets/main.js' ), true );
    wp_register_script( 'bootstrap-js', STORE_DIR_URI . '/assets/src/library/js/bootstrap.bundle.min.js', [ 'jquery' ], false, true );
    
    // Enqueue Scripts
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
  }
}