<?php
/**
 * Call to Action (CTA).
 *
 * @package mdb-theme
 */

$cta = get_fields();
$classes = array(
    'wbx__cta',
    'is-multiline',
);
?>

<?php if ( $cta ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <?php if ( $cta['background'] ) : ?>
            <div class="wbx__cta__media">
                <figure class="wbx__cta__media--image">
                    <?php
                    wbx_image(
                        $cta['background']['id'],
                        array(
                            'image_size' => 'full',
                            'class'      => 'object__fit--contain',
                        )
                    );
                    ?>
                </figure>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="wbx__cta__content">
                        <?php if ( $cta['label'] ) : ?>
                            <p class="wbx__cta__content__label"><?php echo $cta['label']; ?></p>
                        <?php endif; ?>
                        <?php if ( $cta['title'] ) : ?>
                            <h4 class="wbx__cta__content__title"><?php echo $cta['title']; ?></h4>
                        <?php endif; ?>
                        <?php if ( isset( $cta['content'] ) ) : ?>
                            <div class="wbx__cta__content__content">
                                <?php echo $cta['content']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-2 d-flex justify-content-center mt-4 mt-lg-0">
                    <?php if ( $cta['button'] ) : ?>
                        <div class="wbx__cta__cta">
                            <div class="wp-block-buttons is-layout-flex wp-container-3">
                                <div class="wp-block-button">
                                    <a href="<?php echo $cta['button']['url']; ?>" class="wp-block-button__link wp-element-button" <?php echo $cta['button']['target'] ? 'target="' . $cta['button']['target'] . '"' : ''; ?>>
                                        <?php echo $cta['button']['title']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
