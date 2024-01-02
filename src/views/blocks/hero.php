<?php
$heros = get_fields();
$hero = get_fields($heros['slides']);
?>

<section class="splide main__slide" aria-label="Hero Slide">
  <div class="splide__track">
    <?php if ($hero) : ?>
      <div class="splide__list">

        <?php foreach ($hero['hero'] as $heroItem) :
          $seal = $heroItem['seal'];
          $title = $heroItem['title'];
          $content = $heroItem['content'];
          $button = $heroItem['button'];
          $image = $heroItem['image'];
        ?>
          <div class="splide__slide">
            <div class="wbx__hero__slide">
            <?php if ($image) : ?>
              <div class="wbx__hero__slide__content__media">
                <figure class="wbx__hero__slide__content__media--image">
                  <?php
                  wbx_image(
                    $image,
                    array(
                      'image_size' => 'full',
                      'class' => 'object__fit--cover',
                      'breakpoint' => array(
                        'medium' => 1023,
                      ),
                    )
                  );
                  ?>
                </figure>
              </div>
            <?php endif; ?>
              <div class="wbx__hero__slide__content text-center">

                  <?php
                  wbx_image(
                    $seal,
                    array(
                      'image_size' => 'full',
                      'class' => 'object__fit--cover',
                      'breakpoint' => array(
                        'medium' => 1023,
                      ),
                    )
                  );
                  ?>


                <?php if ($title) : ?>
                  <h2 class="wbx__hero__slide__content__title"><?php echo $title; ?> ///</h2>
                <?php endif; ?>
                <?php if ($content) : ?>
                  <div class="wbx__hero__slide__content__content"><?php echo $content; ?></div>
                <?php endif; ?>
                <?php if ($button) : ?>
                  <div class="wp-block-buttons is-layout-flex wp-container-3">
                    <div class="wp-block-button">
                      <a href="<?php echo $button['url']; ?>" class="wp-block-button__link wp-element-button" <?php echo $button['target'] ? 'target="' . $button['target'] . '"' : ''; ?>>
                        <?php echo $button['title']; ?>
                      </a>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
