<?php

/**
 * CONTENT TEMPLATE PART
 *
 * This template part is used to display the content of a post that cannot be found.
 *
 * @package Store
 */
?>
<section class="no-results not-found">
  <header class="page-header">
    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'store'); ?></h1>
  </header>

  <div class="page-content">
    <?php
    if (is_home() && current_user_can('publish_posts')) :
    ?>
      <p><?php printf(wp_kses(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'store'), array('a' => array('href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>
    <?php
    else :
    ?>
      <p><?php esc_html_e('It seems we can’t find what you’re looking for. Perhaps searching can help.', 'store'); ?></p>
    <?php
      get_search_form();
    endif;
    ?>
  </div>
</section>