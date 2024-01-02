<?php if ( ! is_home() && ! is_front_page() ) : ?>
    <?php get_template_part('src/views/partials/page-header'); ?>
    <?php else :?>
      <?php get_template_part('header'); ?>
   <?php endif; ?>
   





  <?php while(have_posts()) : the_post(); ?>
  
   <?php
$args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array( get_the_ID() ),
);

$query = new WP_Query($args);
?>

<div class="content-wrap-page">
  <div class="container">
    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

    <div class="wbx__recent-posts">
      <h5>Related Posts</h5>
      <hr>
      <?php if ($query->have_posts()) : ?>
        <div class="row is-multiline blog__posts">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <article class="col-12 col-md-6 col-lg-4 post-<?php the_ID(); ?> post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
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
                  @if ( get_theme_mod('rev_logo' ) )
                    <img src="{{ get_theme_mod('rev_logo') }}" alt="{{ get_bloginfo('name', 'display') }}" />
                  @else
                  <i class="fa-light fa-image"></i>
                  @endif
                  </a>
                <?php endif; ?>
                <div class="blog-card__meta">
                  <div class="day">
                    <?php echo get_the_date('F, d Y'); ?>
                  </div>
                </div>
                <div class="blog-card__content">
                  <h2 class="blog-card__content-title"><a class="archive-title-post" href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
                  <div class="blog-card__content-content">
                    <?php echo custom_excerpt(get_the_excerpt(), true, 15); ?>
                  </div>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <!-- No posts found -->
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</div>
<?php endwhile; ?>



<?php get_template_part('footer'); ?>