<?php

/**
 * Register Meta Boxes
 * @package Store
 * @version 1.0
 */

namespace Store\Inc;

use Store\Inc\Traits\Singleton;

class Meta_Boxes
{
  use Singleton;

  public function __construct()
  {

    // Load class.
    $this->setup_hooks();
  }

  protected function setup_hooks()
  {
    // Actions and Filters
    add_action('add_meta_boxes', [$this, 'register_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_box_data']);
  }

  public function register_meta_boxes()
  {
    $screens = ['post'];
    foreach ($screens as $screen) {
      add_meta_box(
        'hide-page-title',                           // Unique ID
        __('Hide Page Title', 'store'),              // Box title
        [$this, 'render_product_data_meta_box'],   // Content callback, must be of type callable
        $screen,
        'side'                                      // Post type
      );
    }
  }

  public function render_product_data_meta_box($post)
  {
    $value = get_post_meta($post->ID, '_hide-page-title', true);

    /** 
     * Use nonce for verification
     */
    wp_nonce_field(plugin_basename(__FILE__), 'store_hide_title_nonce');

?>
    <label for="store-field"><?php esc_html_e('Hide the page title', 'store'); ?></label>
    <select name="store_hide_title_field" id="store-field" class="postbox">
      <option value=""><?php esc_html_e('Select', 'store'); ?></option>
      <option value="yes" <?php selected($value, 'yes'); ?>><?php esc_html_e('Yes', 'store'); ?></option>
      <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('No', 'store'); ?></option>
    </select>
<?php
  }

  public function save_meta_box_data($post_id)
  {


    /**
     * Verify that the nonce is valid.
     */
    if (!isset($_POST['store_hide_title_nonce']) || !wp_verify_nonce($_POST['store_hide_title_nonce'], plugin_basename(__FILE__))) {
      return;
    }

    /**
     * Check the user's permissions.
     */
    if (isset($_POST['post_type']) && 'page' === $_POST['post_type']) {
      if (!current_user_can('edit_page', $post_id)) {
        return;
      }
    } else {
      if (!current_user_can('edit_post', $post_id)) {
        return;
      }
    }


    if (array_key_exists('store_hide_title_field', $_POST)) {
      update_post_meta(
        $post_id,
        '_hide-page-title',
        $_POST['store_hide_title_field']
      );
    }
  }
}
