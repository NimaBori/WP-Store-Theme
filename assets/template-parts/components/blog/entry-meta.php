<?php

/**
 * Template for entry meta information
 * @package Store
 * @version 1.0
 */

?>

<div class="entry-meta mb-3 text-muted small">
  <?php
  // Posted on.
  store_posted_on();

  // Posted by.
  store_posted_by();

  // Comments link.
  store_comments_link();
  ?>
</div>