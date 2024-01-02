<?php
/**
 * Icons block.
 *
 * @package mdb-theme
 */

$icons = get_field('icons');

$classes = array(
    'wbx__content-icon',
);
?>

<?php if ( $icons ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <div class="container">
            <div class="row d-flex flex-row justify-content-center">
                <?php if ( $icons ) : ?>
                    <?php foreach ( $icons as $icon ) : ?>
                        <div class="col-6 col-lg-3 col-md-6">

                            <?php if ( $icon['icon'] ) : ?>
                                <div class="wbx__content-icon__media">
                                    <figure class="wbx__content-icon__media--icon">
                                        <?php
                                        wbx_image(
                                            $icon['icon']['id'],
                                            array(
                                                'image_size' => 'full',
                                                'class' => 'object__fit--contain',
                                            )
                                        );
                                        ?>
                                    </figure>
                                </div>
                            <?php endif; ?>

                            <div class="wbx__content-icon__content">
                                <?php if ( $icon['heading'] ) : ?>
                                    <p class="wbx__content-icon__content__title"><?php echo  $icon['heading']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
