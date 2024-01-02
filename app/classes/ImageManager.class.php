<?php
/**
 * ImageManager class for managing custom image sizes and attributes.
 *
 * @package App
 */

namespace App;

class ImageManager {

    /**
     * Custom image sizes.
     *
     * @var array
     */
    public $custom_sizes;

    /**
     * ImageManager constructor.
     *
     * @param array $sizes Custom image sizes.
     */
    public function __construct( $sizes ) {
        $this->custom_sizes = $sizes;

        // Add hooks for custom image sizes.
        add_action( 'after_setup_theme', array( $this, 'set_custom_sizes' ) );
        add_action( 'image_size_names_choose', array( $this, 'customize_image_size_names' ) );
        add_filter( 'wp_get_attachment_image_attributes', array( $this, 'add_custom_attributes' ), 10, 3 );
    }

    /**
     * Set custom image sizes.
     */
    public function set_custom_sizes() {
        foreach ( $this->custom_sizes as $slug => $properties ) {
            if ( isset( $properties['width'], $properties['height'], $properties['crop'] ) ) {
                // Add custom image size.
                add_image_size( $slug, $properties['width'], $properties['height'], $properties['crop'] );
            }
        }
    }

    /**
     * Customize image size names.
     *
     * @param array $existing_names Existing image size names.
     * @return array
     */
    public function customize_image_size_names( $existing_names ) {
        $friendly_names = array();

        foreach ( $this->custom_sizes as $slug => $properties ) {
            if ( isset( $properties['friendly_name'] ) ) {
                // Add friendly names for custom image sizes.
                $friendly_names[ $slug ] = $properties['friendly_name'];
            }
        }

        return array_merge( $existing_names, $friendly_names );
    }

    /**
     * Add custom attributes to image tag.
     *
     * @param array $attr       Image tag attributes.
     * @param object $attachment Image attachment object.
     * @param string $size       Image size.
     * @return array
     */
    public function add_custom_attributes( $attr, $attachment, $size ) {
        // Customize image attributes if needed.

        return $attr;
    }

    /**
     * Get breakpoint size based on screen width.
     *
     * @param int $breakpoint Screen width breakpoint.
     * @return string
     */
    public function get_breakpoint_size( $breakpoint ) {
        $breakpoint_sizes = array(
            'medium' => 1023,
            'mobile' => 480,
            // Add more breakpoints as needed.
        );

        foreach ( $breakpoint_sizes as $size => $max_width ) {
            if ( $breakpoint <= $max_width ) {
                return $size;
            }
        }

        return 'full'; // Change this to your default size if needed.
    }

}
