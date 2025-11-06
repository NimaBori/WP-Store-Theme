<?php

/**
 * Template to post entry header
 *
 * @package Store
 */

$the_post_id        = get_the_ID();
$hide_page_title  = get_post_meta($the_post_id, '_hide-page-title', true);
$heading_class = ! empty($hide_page_title) && 'yes' === $hide_page_title ? 'hide' : '';
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<header class="entry-header mb-3">
  <?php
  // Featured Image.
  if ($has_post_thumbnail) {
  ?>
    <div class="entry-thumbnail mb-3">
      <a href="<?php echo esc_url(the_permalink()); ?>" aria-hidden="true" tabindex="-1">
        <?php
        the_post_custom_thumbnail(
          $the_post_id,
          'featured-thumbnail',
          [
            'sizes' => '(max-width: 374px) 374px, 262px',
            'class' => 'img-fluid rounded',
          ]
        );
        ?>
      </a>
    </div>

  <?php
  }

  // Title
  if (is_single() || is_page()) {
    printf(
      '<h1 class="page-title %1$s">%2$s</h1>',
      esc_attr($heading_class),
      esc_html(get_the_title())
    );
  } else {
    printf(
      '<h2 class="entry-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h2>',
      esc_url(get_permalink()),
      esc_html(get_the_title())
    );
  }
  ?>
</header>