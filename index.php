<?php get_template_part( 'header' ); ?>
<div class="page-header">
    <div class="page-header--background">
    <?php

         if ( get_theme_mod('wbix_logo_footer' ) ) {
          $logo_url = get_theme_mod('wbix_logo_footer');
          $attachment_id = attachment_url_to_postid($logo_url);
          wbx_image(
            $attachment_id,
            array(
              'image_size' => 'full',
              'class' => 'object__fit--cover',
              'breakpoint' => array(
                'medium' => 1023,
              ),
            )
          );
         }
      ?>
      </div>
      <div class="page-header--title">
        <div class="container">
          <h1 class="page-title">Blog</h1>
        </div>
      </div>
  </div>
</div>

<?php
if ( have_posts() ) {

do_action( 'wbix_before_post_content' );
  ?>


<div class="page-content">

<div class="content-wrap-page">
  <div class="container">
    <div class="row">
  <?php while (have_posts()) : the_post();  ?>


    <article <?php post_class('col-12 col-md-6 col-lg-4'); ?>>
    <div class="blog-card">
      
    <?php if (get_post_thumbnail_id()) : ?>
                  <a class="blog-card__img" href="<?php echo esc_url(get_permalink()); ?>">
                    <figure>
                      <?php
                        wbx_image(
                          get_post_thumbnail_id(),
                          array(
                            'class' => 'object__fit--cover',
                          )
                        );
                      ?>
                    </figure>
                  </a>
                <?php else:?>
                  <a class="blog-card__img has-no-image" href="<?php echo esc_url(get_permalink()); ?>">
                  <?php if ( get_theme_mod('rev_logo' ) ) : ?>
                    <img src="<?php echo get_theme_mod('rev_logo'); ?>" alt="<?php echo get_bloginfo('name', 'display'); ?>" />
                  <?php else :?>
                  <i class="fa-light fa-image"></i>
                 <?php endif; ?>
                  </a>
                <?php endif; ?>
      <div class="blog-card__meta">
        <div class="day">
        <?php echo get_the_date( 'F, d Y' ); ?>
        </div>
      </div>

      <div class="blog-card__content">
        <h2 class="blog-card__content-title"><a class="archive-title-post" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
       <div class="blog-card__content-content">
       <?php echo custom_excerpt(get_the_excerpt(), true, 15 ) ;?>
       </div> 
      </div>
    </div>
</article> 
   <?php endwhile; ?>
   </div>
  </div>
</div>

  <?php custom_numbered_navigation(); ?>
</div>


<?php


do_action( 'wbix_after_post_content' );

}
?>
<?php get_template_part('footer'); ?>