    <footer class="footer">
    <div class="container">

    <div class="row">
      <div class="col-lg-9">
      <div class="footer__copyright d-flex align-items-center">
        <?php if ( get_theme_mod( 'custom_copyright_text' ) ) :?>

       <div>Copyright &copy; <?php echo date( 'Y' ); ?> <?php echo get_theme_mod('custom_copyright_text'); ?>. All Rights Reserved.</div>
      <?php if ( has_nav_menu( 'copyright_menu' ) ) :?>
      <?php wp_nav_menu( ['theme_location' => 'copyright_menu', 'menu_class' => 'nav'] ); ?>
      <?php endif; ?> 

      <?php endif; ?>

      </div>
    </div>
      <div class="col-lg-3">
      <div class="footer__social">
        <?php
    // Social Media Links
    $social_platforms = array('Facebook', 'X', 'Instagram', 'Youtube', 'Pinterest', 'TikTok', 'Linkedin', 'Indeed');

    // Check if at least one social link is not empty
    $has_social_links = false;

    foreach ($social_platforms as $platform) {
        $social_link = get_theme_mod('social_' . strtolower($platform));

        // Check if the social link is not empty
        if (!empty($social_link)) {
            $has_social_links = true;
            break; // Exit the loop if at least one link is found
        }
    }

    // Output "Follow Us:" text if at least one social link is not empty
    if ($has_social_links) {
        echo '<span class="footer__social__getin">Get in Touch:</span> ';
    }

    // Output social media links with Bootstrap icons
    foreach ($social_platforms as $platform) {
        $social_link = get_theme_mod('social_' . strtolower($platform));

        // Check if the social link is not empty
        if (!empty($social_link)) {
            // Bootstrap icon classes
            $icon_classes = array(
                'Facebook' => 'bi-facebook',
                'X' => 'bi-twitter-x',
                'Instagram' => 'bi-instagram',
                'Youtube' => 'bi-youtube',
                'Pinterest' => 'bi-pinterest',
                'TikTok' => 'bi-tiktok',
                'Linkedin' => 'bi-linkedin',
                'Indeed' => 'bi-inbox',
            );

            echo '<a href="' . esc_url($social_link) . '" target="_blank" class="social-item" aria-label="Follow us on '. esc_attr( $platform ) .'"><i class="bi ' . esc_attr($icon_classes[$platform]) . '"></i></a>';
        }
    }
    ?>
          </div>
    </div>
      </div>
    </div>

  </footer>
  <?php wp_footer(); ?>
  </body>
</html>

