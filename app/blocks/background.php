<?php
/**
 * Background block.
 *
 * @package mdb-theme
 */

$fields = get_fields();
$background_color = get_field('background_color');
$background_image = get_field('background_image');

if ( isset( $fields['background_image_position'] ) ) {
    $background_class = 'background-position-' . $fields['background_image_position'];
} else {
    $background_class = 'background-position-none';
}
?>

<div class="background-block <?php echo $background_class; ?>" <?php if ( $background_color ) { echo 'style="background-color: ' . $background_color . '"'; } ?>>
    <div class="background-block__media">
        <?php if ( $background_image ) : ?>
            <figure>
                <?php
                wbx_image(
                    $background_image,
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
        <?php endif; ?>
    </div>

    <?php if ( ! $fields['wide'] ) : ?>
        <div class="container">
    <?php endif; ?>

    <InnerBlocks />

    <?php if ( ! $fields['wide'] ) : ?>
        </div>
    <?php endif; ?>
</div>
