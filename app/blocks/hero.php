<?php
/**
 * Hero Block.
 *
 * @package mdb-theme
 */

$heros = get_fields();
$hero = get_fields($heros['heroes']);

$classes = array(
    'wbx__hero',
    'is-multiline',
);
?>

<?php if ( $hero ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <div class="container">
            <div class="row">
                <?php foreach ( $hero['hero'] as $hero ) :
                    $label = $hero['label'];
                    $title = $hero['title'];
                    $content = $hero['content'];
                    $button = $hero['button'];
                    $image = $hero['image'];
                ?>
                    <div class="col-12 col-lg-6">
                        <div class="wbx__hero__slide">
                            <div class="wbx__hero__slide__content">
                                <?php if ( $label ) : ?>
                                    <div class="wbx__hero__slide__content__label"><?php echo $label; ?></div>
                                <?php endif; ?>
                                <?php if ( $title ) : ?>
                                    <h2 class="wbx__hero__slide__content__title"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if ( $content ) : ?>
                                    <div class="wbx__hero__slide__content__content"><?php echo $content; ?></div>
                                <?php endif; ?>
                                <?php if ( $button ) : ?>
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
                    <div class="col-12 col-lg-6 d-none d-md-flex d-lg-flex">
                        <?php if ( $image ) : ?>
                            <div class="wbx__hero__slide__content__media">
                                <figure class="wbx__hero__slide__content__media--image">
                                    <?php
                                    wbx_image(
                                        $image,
                                        array(
                                            'image_size' => 'full',
                                            'class'      => 'object__fit--contain',
                                        )
                                    );
                                    ?>
                                </figure>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
