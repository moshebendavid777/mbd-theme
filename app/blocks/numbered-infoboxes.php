<?php
/**
 * Infoboxes Block.
 *
 * @package mbd-theme
 */

$infoboxes = get_field( 'infoboxes' );

$classes = array(
    'wbix__numbered-infoboxes',
);
?>

<?php if ( $infoboxes ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">

                        <?php foreach ( $infoboxes as $key => $infobox ) : ?>
                            <div class="col-lg-6 is-offset-1 d-flex flex-column align-items-center">
                                <?php if ( $infobox['image'] ) : ?>
                                    <div class="wbix__numbered-infoboxes__media">
                                        <figure class="wbix__numbered-infoboxes__media--icon">
                                            <?php
                                            wbx_image(
                                                $infobox['image']['id'],
                                                array(
                                                    'image_size' => 'full',
                                                    'class'      => 'object__fit--contain',
                                                )
                                            );
                                            ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>

                                <div class="wbix__numbered-infoboxes__content">
                                    <?php if ( $infobox['content'] ) : ?>
                                        <div class="wbix__numbered-infoboxes__content__bullet"><span><?php echo $key + 1; ?></span></div>
                                        <div class="wbix__numbered-infoboxes__content__wrapper">
                                            <?php if ( $infobox['title'] ) : ?>
                                                <p class="wbix__numbered-infoboxes__content__wrapper__title"><?php echo $infobox['title']; ?></p>
                                            <?php endif; ?>
                                            <div class="wbix__numbered-infoboxes__content__wrapper__content"><?php echo $infobox['content']; ?></div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
