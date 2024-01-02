<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<header class="main-header">
  <div class="container">
    <div class="row">

      <div class="col">

<nav class="navbar navbar-expand-lg" role="navigation" aria-label="main navigation">
  <div class="container-fluid">

  <?php if ( get_theme_mod('wbix_logo' ) ) : 
          $logo_url = get_theme_mod('wbix_logo');
          $attachment_id = attachment_url_to_postid($logo_url);
          $image_src = wp_get_attachment_image_src($attachment_id, 'full');
?>
          <a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
            <img src="<?php echo get_theme_mod('wbix_logo'); ?>" width="<?php echo $image_src[1]; ?>" height="<?php echo $image_src[2]; ?>" alt="<?php echo get_bloginfo('name', 'display'); ?>" />
          </a>
          <?php else : ?>
          <a class="navbar-brand" href="{{ home_url( '/' ) }}" style="bottom: unset;width: 200px;">
            <img src="<?php echo get_template_directory_uri().'/src/images/webimaxlogo.webp'; ?> " alt="<?php echo get_bloginfo('name', 'display'); ?>"/>
          </a>
            <?php endif; ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasicExample" aria-controls="navbarBasicExample" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbarBasicExample" class="collapse navbar-collapse">
      <?php if ( has_nav_menu( 'primary_menu' ) ) : ?>
        <?php wp_nav_menu( ['theme_location' => 'primary_menu', 'menu_class' => 'navbar-nav ms-auto'] ); ?>
      <?php endif; ?>
    </div>
  </div>
</nav>

      </div>
    </div>
</header>
