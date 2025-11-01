<?php

namespace Store\Inc\Traits;

trait Singleton {

  public function __construct() {
    
  }
/**
   * Prevent cloning of the instance.
   */
  private function __clone() {
  }

  public static function get_instance() {
    static $instance = [];

    $called_class = get_called_class();

    if ( ! isset( $instance[ $called_class ] ) ) {
      $instance[ $called_class ] = new $called_class();

      do_action( sprintf( 'store_theme_singleton_init', $called_class ) );
    }

    return $instance[ $called_class ];
  }

}