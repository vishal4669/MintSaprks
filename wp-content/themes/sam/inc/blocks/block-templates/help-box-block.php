<?php
/**
 * Block Name: Help Box
 */
?>

<!-- Start Help Box Section -->
<section class="help-box" <?php echo ( get_field('background_image') ? 'style="background-image: url('.get_field('background_image').');"': '' ); ?>>

    <?php if( get_field('title') ){ ?>
     <h2 class="help-box__heading"><?php the_field('title'); ?></h2>
 <?php } ?>

 <?php if( get_field('title') && get_field('title') ){ ?>
     <hr class="help-box__seperator">
 <?php } ?>

 <?php if( get_field('subtitle') ){ ?>
     <p class="help-box__paragraph"><?php the_field('subtitle'); ?></p>
 <?php } ?>
 
</section>
<!-- End Section -->