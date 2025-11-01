<?php

/**
 * Register Menus
 * @package Store
 * @version 1.0
 */

namespace Store\Inc;

use Store\Inc\Traits\Singleton;

class Menus {
  use Singleton;

    public function __construct() {     
      
      // Load class.
      $this->setup_hooks();
  }

  protected function setup_hooks() {
    // Actions and Filters
    add_action( 'init', [ $this, 'register_menus' ] );

  }

  public function register_menus() {
    // Register Menus
    register_nav_menus( [
      'store-header-menu' => esc_html__( 'Header Menu', 'store' ),
      'store-footer-menu'  => esc_html__( 'Footer Menu', 'store' ),
    ] );
  }


  public function get_menu_id( $location ) {
    // Get all the locations
    $locations = get_nav_menu_locations();
    
    $menu_id = isset( $locations[ $location ] ) ? $locations[ $location ] : '';

    return $menu_id;
  }

  public function get_child_menu_items( $parent_id, $menu_items ) {
    $child_menu_items = [];
    
    if ( is_array( $menu_items ) ) {
      foreach ( $menu_items as $menu_item ) {
        if ( intval( $menu_item->menu_item_parent ) === intval( $parent_id ) ) {
          $child_menu_items[] = $menu_item;
        }
      }      
    }

    return $child_menu_items;
  }
  
}