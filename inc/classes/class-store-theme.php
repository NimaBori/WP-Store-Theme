<?php

/**
 * Bootstrap the Store Theme
 * @package Store
 * 
 */

namespace Store\Inc;

use Store\Inc\Traits\Singleton;

class STORE_THEME {
  use Singleton;

    public function __construct() {     
      
      // Load class.
      Assets::get_instance();
      Menus::get_instance();

      $this->setup_hooks();
  }

  protected function setup_hooks() {
    // Actions and Filters

    add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );    
    
  }

  public function setup_theme() {
    // Add theme support features
    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-logo', [
      'header-text' => [ 'site-title', 'site-description' ],
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
    ] );

    add_theme_support( 'custom-background', [
      'default-color' => 'ffffff',
      'default-image' => '',
      'default-repeat' => 'no-repeat',
      'default-position-x' => 'center',
    ] );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    ] );
    
    add_editor_style( );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    global $content_width;
    if ( ! isset( $content_width ) ) {
      $content_width = 1240; // max width in pixels

     }
  }
}