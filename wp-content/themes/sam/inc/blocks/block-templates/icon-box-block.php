<?php
/**
 * Block Name: Icon Box
 */
?>

<!-- Start Icon Box Section -->
<div class="reg-choices__new">

       <?php if( get_field('image') ){ ?>
              <img class="reg-choices__image" src="<?php the_field('image'); ?>">
       <?php } ?>

       <?php if( get_field('title') ){ ?>
              <h2 class="reg-choices__name"><?php the_field('title'); ?></h2>
       <?php } ?>

       <?php if( get_field('subtitle') ){ ?>
              <p class="reg-choices__paragraph"><?php the_field('subtitle'); ?></p>
       <?php } ?>

       <?php if( get_field('button_text') || get_field('button_url') ){ ?>
              <a href="<?php the_field('button_url'); ?>" class="reg-choices__button"><?php the_field('button_text'); ?></a>
       <?php } ?>

</div>
<!-- End Section -->