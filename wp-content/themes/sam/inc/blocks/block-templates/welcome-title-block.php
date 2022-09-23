<?php
/**
 * Block Name: Page Welcome Title
 */
?>

<!-- Start Welcome Section -->
<section class="page-welcome-title">

  <?php if( get_field('title_headline') || get_field('main_title') ){ ?>
    <h1 class="page-welcome-title__heading">

      <?php if( get_field('title_headline') ){ ?>
        <span class="page-welcome-title__heading-alt-sm"><?php the_field('title_headline'); ?></span>
      <?php } ?>

      <?php if( get_field('main_title') ){ ?>
        <span class="page-welcome-title__heading-lg"><?php the_field('main_title'); ?></span>
      <?php } ?>

    </h1>
  <?php } ?>

  <?php if( get_field('description') ){ ?>
    <p class="page-welcome-title__paragraph narrow text-xs"><?php the_field('description'); ?></p>
  <?php } ?>

</section>
<!-- End Section -->