  <?php if ( ! is_home() && ! is_front_page() ) : ?>
    <?php get_template_part('src/views/partials/page-header'); ?>
    <?php else :?>
      <?php get_template_part('header'); ?>
   <?php endif; ?>

<?php
if ( have_posts() ) {

do_action( 'wbix_before_post_content' );

while ( have_posts() ) :
  the_post();
  
  ?>
<div class="page-content">
  <?php the_content(); ?>
</div>
<?php

  wp_link_pages(
    array(
      'before' => '<div class="page-links">' . __( 'Pages:', 'embark' ),
      'after'  => '</div>',
    )
  );
endwhile;

do_action( 'wbix_after_post_content' );

}
?>
<?php get_template_part('footer'); ?>