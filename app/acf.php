<?php
/**
 * Register custom ACF blocks.
 *
 * @package App
 */

// Hook into ACF initialization.
add_action( 'acf/init', function () {

    if ( function_exists( 'acf_register_block' ) ) {

        // Content + Image Block.
        acf_register_block( array(
            'name'            => 'content-image',
            'title'           => __( 'Content + Image', 'txtdomain' ),
            'description'     => __( 'Content + Image', 'txtdomain' ),
            'category'        => 'formatting',
            'icon'            => 'admin-comments',
            'render_template' => 'app/blocks/content-image.php',
            'supports'        => array(
                'align'            => false,
                'anchor'           => true,
                'customClassName'  => true,
                'jsx'              => true,
            ),
        ) );

        // Content + Icon Block.
        acf_register_block( array(
            'name'            => 'content-icon',
            'title'           => __( 'Content + Icon', 'txtdomain' ),
            'description'     => __( 'Content + Icon', 'txtdomain' ),
            'category'        => 'formatting',
            'icon'            => 'admin-comments',
            'render_template' => 'app/blocks/content-icon.php',
            'supports'        => array(
                'align'            => false,
                'anchor'           => true,
                'customClassName'  => true,
                'jsx'              => true,
            ),
        ) );

        // Accordion Block.
        acf_register_block( array(
            'name'            => 'accordion',
            'title'           => __( 'Accordion', 'wbix' ),
            'description'     => __( 'Accordion', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'accordion', 'panel' ),
            'render_template' => 'app/blocks/accordion.php',
            'mode'            => 'edit',
            'nowrap'          => true,
            'supports'        => array(
                'jsx' => true,
            ),
        ) );

        // Cards Block.
        acf_register_block( array(
            'name'            => 'cards',
            'title'           => __( 'Cards', 'wbix' ),
            'description'     => __( 'Cards', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'cards', 'panel' ),
            'render_template' => 'app/blocks/cards.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

        // Call to Action Block.
        acf_register_block( array(
            'name'            => 'cta',
            'title'           => __( 'Call to Action', 'wbix' ),
            'description'     => __( 'Call to Action', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'cards', 'panel' ),
            'render_template' => 'app/blocks/cta.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

        // Tax Calculator Block.
        acf_register_block( array(
            'name'            => 'tax-calculator',
            'title'           => __( 'Tax Calculator', 'wbix' ),
            'description'     => __( 'Tax Calculator', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'cards', 'panel' ),
            'render_template' => 'app/blocks/tax-calculator.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

        // Numbered Icon Block.
        acf_register_block( array(
            'name'            => 'numbered-icon',
            'title'           => __( 'Numbered Icon', 'wbix' ),
            'description'     => __( 'Numbered Icon', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'numbers', 'icon' ),
            'render_template' => 'app/blocks/numbered-icon.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

        // Numbered Infoboxes Block.
        acf_register_block( array(
            'name'            => 'numbered-infoboxes',
            'title'           => __( 'Numbered Infoboxes', 'wbix' ),
            'description'     => __( 'Numbered Infoboxes', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'cards', 'panel' ),
            'render_template' => 'app/blocks/numbered-infoboxes.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

        // Floating Boxes Block.
        acf_register_block( array(
            'name'            => 'floating-boxes',
            'title'           => __( 'Floating Boxes', 'wbix' ),
            'description'     => __( 'Floating Boxes', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'cards', 'panel' ),
            'render_template' => 'app/blocks/floating-boxes.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

        // Hero Block.
        acf_register_block( array(
            'name'            => 'hero',
            'title'           => __( 'Hero', 'wbix' ),
            'description'     => __( 'Hero', 'wbix' ),
            'icon'            => 'table-row-after',
            'keywords'        => array( 'hero', 'panel' ),
            'render_template' => 'app/blocks/hero.php',
            'mode'            => 'edit',
            'nowrap'          => true,
        ) );

    }
} );
