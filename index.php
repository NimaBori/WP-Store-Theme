<?php

/**
 * Main template file
 * 
 * @package Store
 * @version 1.0
 * 
 */

get_header();
?>

<div id="primary">
  <main id="main" class="site-main mt-5" role="main">
    <?php
    if (have_posts()) :
    ?>
      <div class="container">
        <?php
        if (is_home() && ! is_front_page()) {
        ?>
          <header class="page-header mb-5">
            <h1 class="page-title">
              <?php single_post_title(); ?>
            </h1>
          </header>
        <?php
        }
        ?>

        <div class="row">
          <?php
          // Start the Loop.
          while (have_posts()) : the_post();
          ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <?php get_template_part('assets/template-parts/content'); ?>
            </div>
          <?php
          endwhile;
          ?>
        </div>
      </div>
    <?php

    else :
      get_template_part('assets/template-parts/content-none');
    endif;
    ?>
  </main>
</div>

<?php
get_footer();
