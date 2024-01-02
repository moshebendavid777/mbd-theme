<?php get_template_part( 'header' ); ?>
<div class="page-header <?php echo get_post_thumbnail_id() ? 'has-icon' : '';?>">
  <div class="container">
    <h1><?php the_title();?></h1>
  </div>
  <?php if ( get_post_thumbnail_id() ) :?>

      <?php if(! is_single()) :?>
        <div class="page-header__media">
    <figure>
      <?php
      wbx_image(
        get_post_thumbnail_id(),
        array(
          'class' => 'object__fit--contain',
          'image_size' => 'icon',
        )
      );
      ?>
    </figure>
    </div>
  <?php endif;?>
  <?php endif;?>
</div>