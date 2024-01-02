<?php
/**
 * Accordion panels.
 *
 * @package mdb-theme
 */

$field = get_fields();
$accordion_fields = $field['panels'];
$classes = array(
    'wbx__accordion',
);
?>

<?php if ( $accordion_fields ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <?php foreach ( $accordion_fields as $accordion_item ) :
            $title = $accordion_item['title'];
            $content = $accordion_item['content'];
        ?>

            <div class="wbx__accordion__item">
                <h2 class="wbx__accordion__item__title"><?php echo $title; ?></h2>
                <div class="wbx__accordion__item__content"><?php echo $content; ?></div>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>
