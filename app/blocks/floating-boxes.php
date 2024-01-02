<?php
/**
 * Floating boxes block.
 *
 * @package mdb-theme
 */

$boxes = get_fields();
$classes = array(
    'wbix__floating-boxes',
);
$box_left = $boxes['left_box'];
$box_center = $boxes['center_box'];
$box_right = $boxes['right_box'];
?>

<?php if ( $boxes ) : ?>
    <div class="<?php echo wbx_get_classes( $classes ); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="wbix__floating-boxes__box">
                        <div class="wbix__floating-boxes__box--left">
                            <?php if ( $box_left['title'] ) : ?>
                                <p class="wbix__floating-boxes__box--title"><?php echo $box_left['title']; ?></p>
                            <?php endif; ?>
                            <?php if ( $box_left['excerpt'] ) : ?>
                                <div class="wbix__floating-boxes__box--content"><?php echo $box_left['excerpt']; ?></div>
                            <?php endif; ?>
                            <?php if ( $box_left['image'] ) : ?>
                                <div class="wbix__floating-boxes__box--left__media">
                                    <figure class="wbix__floating-boxes__box--left__media--image">
                                        <?php
                                        wbx_image(
                                            $box_left['image']['id'],
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
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="wbix__floating-boxes__box">
                        <div class="wbix__floating-boxes__box--center">
                            <?php if ( $box_center['image'] ) : ?>
                                <div class="wbix__floating-boxes__box--center__media">
                                    <figure class="wbix__floating-boxes__box--center__media--image">
                                        <?php
                                        wbx_image(
                                            $box_center['image']['id'],
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
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="wbix__floating-boxes__box">
                        <div class="wbix__floating-boxes__box--right">
                            <?php if ( $box_right['image'] ) : ?>
                                <div class="wbix__floating-boxes__box--right__media">
                                    <figure class="wbix__floating-boxes__box--right__media--image">
                                        <?php
                                        wbx_image(
                                            $box_right['image']['id'],
                                            array(
                                                'image_size' => 'full',
                                                'class'      => 'object__fit--contain',
                                            )
                                        );
                                        ?>
                                    </figure>
                                </div>
                            <?php endif; ?>
                            <?php if ( $box_right['title'] ) : ?>
                                <p class="wbix__floating-boxes__box--title"><?php echo $box_right['title']; ?></p>
                            <?php endif; ?>
                            <?php if ( $box_right['excerpt'] ) : ?>
                                <div class="wbix__floating-boxes__box--content"><?php echo $box_right['excerpt']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
