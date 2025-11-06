<?php

function store_get_the_post_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attr = [])
{
  $custom_thumbnail = '';

  if (null === $post_id) {
    $post_id = get_the_ID();
  }

  if (has_post_thumbnail($post_id)) {
    $default_attribute = [
      'loading' => 'lazy'

    ];
    $attr = array_merge($additional_attr, $default_attribute);

    $custom_thumbnail = wp_get_attachment_image(
      get_post_thumbnail_id($post_id),
      $size,
      false,
      $attr
    );
  }
  return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attr = [])
{
  echo store_get_the_post_thumbnail($post_id, $size, $additional_attr);
}

function store_posted_on()
{
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

  // Check if the post has been modified
  if (get_the_time('U') !== get_the_modified_time('U')) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf(
    $time_string,
    esc_attr(get_the_date(DATE_W3C)),
    esc_html(get_the_date()),
    esc_attr(get_the_modified_date(DATE_W3C)),
    esc_html(get_the_modified_date())
  );

  $posted_on = sprintf(
    esc_html_x('Posted on %s', 'post date', 'store'),
    '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
  );

  echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}

function store_posted_by()
{
  $author = sprintf(
    esc_html_x(' by %s', 'post author', 'store'),
    '<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
  );

  echo '<span class="posted-by text-secondary">' . $author . '</span>';
}

function store_comments_link()
{
  $comments = get_comments_number();

  if (comments_open()) {
    $comments_link = sprintf(
      esc_html_x(' %s Comments', 'post comments', 'store'),
      number_format_i18n($comments)
    );
  } else {
    $comments_link = esc_html_x('Comments are closed', 'post comments', 'store');
  }

  echo '<span class="comments-link">' . $comments_link . '</span>';
}
