<?php
/**
 * Template for displaying tabs.
 *
 * @package mbd-theme
 */

$fields        = get_fields();
$block_classes = array( 'em-tabs__inner' );
?>

<div class="<?php echo wbx_get_classes( $block_classes ); ?>">
    <div class="tabs__tablist" role="tablist">
        <!-- Tablist content goes here -->
    </div>
    <div class="tabs__tabpanels">
        <?php
        em_acf_inner_blocks(
            array(
                'allowedBlocks' => array(
                    'acf/tab',
                ),
                'template'      => array(
                    array( 'acf/tab' ),
                ),
            )
        );
        ?>
    </div>
</div>
