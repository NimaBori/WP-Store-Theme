<?php

/**
 * CONTENT TEMPLATE PART
 *
 * This template part is used to display the content of a post.
 *
 * @package Store
 */

?>

<!-- <h3><?php the_title(); ?></h3>
<div>
  <?php the_excerpt(); ?>
</div> -->

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-4'); ?>>
  <?php
  get_template_part('assets/template-parts/components/blog/entry-header');
  get_template_part('assets/template-parts/components/blog/entry-meta');
  get_template_part('assets/template-parts/components/blog/entry-content');
  get_template_part('assets/template-parts/components/blog/entry-footer');
  ?>

</article>