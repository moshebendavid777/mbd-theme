<?php
/**
 * Template for displaying content image.
 *
 * @package mdb-theme
 */

$fields = get_fields();
$classes = array(
    'wbx__content-image',
    'container',
);

if ( $fields['flip_columns'] ) {
    $classes[] = 'has_flip_columns';
}
?>

<div class="<?php echo wbx_get_classes( $classes ); ?>">
    <div class="row">
        <div class="col wbx__content-image__content">
            <InnerBlocks />
        </div>
        <div class="col wbx__content-image__media">
            <figure>
                <?php
                wbx_image(
                    $fields['image']['id'],
                    array(
                        'class' => 'object__fit--cover',
                    )
                );
                ?>
            </figure>
        </div>
    </div>
</div>
