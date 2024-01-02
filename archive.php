<?php
/**
 * Default template
 *
 * @package Webix
 * @since   1.0.0
 */

get_header();

get_template_part( 'src/views' . apply_filters( 'wbx_header_partial', 'page-header' ) );

get_template_part( 'src/views' . apply_filters( 'wbx_content_partial', 'content' ) );

get_footer();
