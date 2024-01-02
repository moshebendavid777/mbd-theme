<?php
/**
 * Template for displaying tabs.
 *
 * @package mbd-theme
 */

$fields          = em_get_fields();
$classes         = array( 'wbx__tab' );

$inner_classes   = array( 'wbx__tab__inner' );
$content_classes = array( 'wbx__tab__content' );
$panel_id        = uniqid( 'wbx__tab-' );
$control_id      = $panel_id . '-control';

?>
<div
	id="<?php echo esc_attr( $panel_id ); ?>"
	class="<?php em_classes( $classes ); ?>"
	tabindex="0"
	aria-labelledby="<?php echo esc_attr( $control_id ); ?>"
>
	<button
		id="<?php echo esc_attr( $control_id ); ?>"
		class="wbx__tab-control"
		type="button"
		role="tab"
		aria-selected="false"
		aria-controls="<?php echo esc_attr( $panel_id ); ?>"
		tabindex="-1"
	>
		<span><?php em_echo( $fields->tab_control_text ); ?></span>
	</button>
	<div class="<?php em_classes( $inner_classes ); ?>">
		<div class="<?php em_classes( $content_classes ); ?>">
			<?php
			em_acf_inner_blocks(
				array(
					'template' => array(
						array(
							'core/paragraph',
							array(
								'placeholder' => 'Click to start adding text.',
							),
						),
					),
				)
			);
			?>
		</div>
	</div>
</div>
