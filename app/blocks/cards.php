<?php
/**
 * Cards.
 *
 * @package mdb-theme
 */

$field = get_fields();
$cards_fields = $field['cards'];
$classes = array(
    'wbx__cards',
    'columns',
    'is-multiline',
);
?>

<?php if ( $cards_fields ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <?php foreach ( $cards_fields as $card ) :
            $label = $card['label'];
            $title = $card['title'];
            $content = $card['excerpt'];
            $image = $card['image'];
        ?>
            <div class="column">
                <div class="wbx__cards__card">
                    <?php if ( $image ) : ?>
                        <div class="wbx__cards__card__media">
                            <figure>
                                <?php
                                wbx_image(
                                    $image,
                                    array(
                                        'class' => 'object__fit--cover',
                                    )
                                );
                                ?>
                            </figure>
                        </div>
                    <?php endif; ?>

                    <?php if ( $label ) : ?>
                        <div class="wbx__cards__card__label"><?php echo $label; ?></div>
                    <?php endif; ?>

                    <?php if ( $title ) : ?>
                        <h2 class="wbx__cards__card__title"><?php echo $title; ?></h2>
                    <?php endif; ?>

                    <?php if ( $content ) : ?>
                        <div class="wbx__cards__card__content"><?php echo $content; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
