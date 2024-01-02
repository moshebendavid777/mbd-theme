<?php
add_filter('acf/settings/save_json', 'sage_acf_save_json');
function sage_acf_save_json($path)
{
    $path = get_theme_file_path() . '/app/acf-json';
    return $path;
}



add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
   unset( $paths[0] );
   $paths[] = get_template_directory()  . 'app/acf-json';
   return $paths;
}

//Customizer
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {

  // Add section for credit card icons
  $wp_customize->add_section('credit_card_icons', array(
      'title' => __('Credit Card Icons', 'your-theme-text-domain'),
      'priority' => 30,
  ));

  // Add setting and control for Mastercard icon
  $wp_customize->add_setting('display_mastercard_icon', array(
      'default' => false,
      'sanitize_callback' => 'sanitize_checkbox',
  ));

  $wp_customize->add_control('display_mastercard_icon', array(
      'label' => __('Display Mastercard Icon', 'your-theme-text-domain'),
      'section' => 'credit_card_icons',
      'type' => 'checkbox',
  ));

  // Add setting and control for Amex icon
  $wp_customize->add_setting('display_amex_icon', array(
      'default' => false,
      'sanitize_callback' => 'sanitize_checkbox',
  ));

  $wp_customize->add_control('display_amex_icon', array(
      'label' => __('Display Amex Icon', 'your-theme-text-domain'),
      'section' => 'credit_card_icons',
      'type' => 'checkbox',
  ));

  // Add setting and control for Visa icon
  $wp_customize->add_setting('display_visa_icon', array(
      'default' => false,
      'sanitize_callback' => 'sanitize_checkbox',
  ));

  $wp_customize->add_control('display_visa_icon', array(
      'label' => __('Display Visa Icon', 'your-theme-text-domain'),
      'section' => 'credit_card_icons',
      'type' => 'checkbox',
  ));

  // Add setting and control for Discover icon
  $wp_customize->add_setting('display_discover_icon', array(
      'default' => false,
      'sanitize_callback' => 'sanitize_checkbox',
  ));

  $wp_customize->add_control('display_discover_icon', array(
      'label' => __('Display Discover Icon', 'your-theme-text-domain'),
      'section' => 'credit_card_icons',
      'type' => 'checkbox',
  ));


  // Logo Section
  $wp_customize->add_setting('wbix_logo', array(
      'default' => get_theme_file_uri('/images/logo.jpg'), // Add Default Image URL
      'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, 'wbix_logo_control', array(
      'label' => 'Upload Header Logo',
      'priority' => 20,
      'section' => 'title_tagline',
      'settings' => 'wbix_logo',
      'button_labels' => array(
          'select' => 'Select Logo',
          'remove' => 'Remove Logo',
          'change' => 'Change Logo',
      ),
  )));

  $wp_customize->add_setting('wbix_logo_footer', array(
    'default' => get_theme_file_uri('/images/logo.jpg'), // Add Default Image URL
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new \WP_Customize_Image_Control($wp_customize, 'wbix_logo_footer_control', array(
    'label' => 'Page Default Banner',
    'priority' => 20,
    'section' => 'title_tagline',
    'settings' => 'wbix_logo_footer',
    'button_labels' => array(
        'select' => 'Select Logo',
        'remove' => 'Remove Logo',
        'change' => 'Change Logo',
    ),
)));
  // Contact Section
  $wp_customize->add_section('contact_section', array(
      'title' => __('Contact', 'custom-theme'),
      'priority' => 30,
  ));

  // Email Field
  $wp_customize->add_setting('contact_email', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_email',
  ));

  $wp_customize->add_control('contact_email', array(
      'label' => __('Email', 'custom-theme'),
      'section' => 'contact_section',
      'type' => 'email',
  ));

  // Phone Field
  $wp_customize->add_setting('contact_phone', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('contact_phone', array(
      'label' => __('Phone', 'custom-theme'),
      'section' => 'contact_section',
      'type' => 'text',
  ));

  // Social Section
  $wp_customize->add_section('social_section', array(
      'title' => __('Social', 'custom-theme'),
      'priority' => 31,
  ));

  // Social Fields
  $social_platforms = array('Facebook', 'X', 'Instagram', 'Youtube', 'Pinterest', 'TikTok', 'Linkedin', 'Indeed');

  foreach ($social_platforms as $platform) {
      $wp_customize->add_setting('social_' . strtolower($platform), array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control('social_' . strtolower($platform), array(
          'label' => __($platform, 'custom-theme'),
          'section' => 'social_section',
          'type' => 'text',
      ));
  }

    // Add a new section
    $wp_customize->add_section('custom_copyright_section', array(
      'title' => __('Copyright', 'your-theme-textdomain'),
      'priority' => 30,
  ));

  // Add a setting for the copyright text
  $wp_customize->add_setting('custom_copyright_text', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));

  // Add a control for the copyright text
  $wp_customize->add_control('custom_copyright_text', array(
      'label' => __('Copyright Text', 'your-theme-textdomain'),
      'section' => 'custom_copyright_section',
      'settings' => 'custom_copyright_text',
      'type' => 'text',
  ));
});


function wbx_attributes( $attrs = array(), $echo = true ) {
    $attrs = implode(
        ' ',
        array_map(
            function ( $name, $value ) {
                return 'id' === $name ? "$name=\"" . sanitize_title_with_dashes( $value ) . '"' : "$name=\"" . esc_attr( $value ) . '"';
            },
            array_keys( $attrs ),
            $attrs
        )
    );

    if ( $echo ) {
        echo wp_kses_post( $attrs );
    } else {
        return $attrs;
    }
}
//Utilities
function wbx_html( $tag, $attrs, $content = '', $return = false ) {
  $attrs = wbx_attributes( $attrs, false );

  // Void Elements, see @link for reference.
  $elementgnore = array(
      'area',
      'base',
      'br',
      'col',
      'embed',
      'hr',
      'img',
      'input',
      'link',
      'meta',
      'param',
      'source',
      'track',
      'wbr',
  );

  if ( ! empty( $content ) && is_callable( $content ) ) {
      $content = call_user_func( $content );
  }

  if ( in_array( $tag, $elementgnore, true ) ) {
      if ( ! $return ) {
          em_echo( "<$tag $attrs>" );
      } else {
          return "<$tag $attrs>";
      }
  } else {
      if ( ! $return ) {
          em_echo( "<$tag $attrs>$content</$tag>" );
      } else {
          return "<$tag $attrs>$content</$tag>";
      }
  }
}

function wbx_image( $img_id, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'image_size' => 'medium',
			'breakpoints' => array(),
			'picture_crops' => array(),
			'class' => '',
			'lazyload' => true,
			'svg_inline' => true,
			'svg_aspect_ratio' => true,
			'echo' => true,
			'link' => array(),
		)
	);

	$image_mime_type = get_post_mime_type( $img_id );
	$has_svg = 'image/svg+xml' === $image_mime_type || 'image/svg' === $image_mime_type;
	if ( $has_svg && $args['svg_inline'] ) {
		if ( $args['echo'] ) {
			wbx_svg( get_attached_file( $img_id ), $args );
		} else {
			ob_start();
			wbx_svg( get_attached_file( $img_id ), $args );
			return ob_get_clean();
		}
	} else {
		$meta = wp_get_attachment_metadata( $img_id );
		$img_attrs = array(
			'src' => wp_get_attachment_image_url( $img_id, $args['image_size'] ),
			'alt' => get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?? '',
			'class' => $args['class'],
			'lazyload' => $args['lazyload'] ? 'lazy' : 'eager',
		);

		if ( ! $has_svg ) {
			$img_attrs['srcset'] = wp_get_attachment_image_srcset( $img_id, $args['image_size'] );
		}

		if ( $meta ) {
			$img_attrs['width'] = $meta['sizes'][ $args['image_size'] ]['width'] ?? $meta['width'];
			$img_attrs['height'] = $meta['sizes'][ $args['image_size'] ]['height'] ?? $meta['height'];
		}

		if ( ! empty( $args['breakpoints'] ) ) {
			$img_attrs['sizes'] = implode( ', ', $args['breakpoints'] );
		}

		$html = wbx_html(
			'img',
			$img_attrs,
			'',
			true
		);

		if ( ! empty( $args['picture_crops'] ) ) {
			$sources = array();
			foreach ( $args['picture_crops'] as $size => $media ) {
				$sources[] = wbx_html(
					'source',
					array(
						'media' => $media,
						'srcset' => wp_get_attachment_image_url( $img_id, $size ),
					),
					'',
					true
				);
			}
			$html = '<picture>' . implode( '', $sources ) . $html . '</picture>';
		}

		if ( ! empty( $args['link'] ) ) {
			$_link = $args['link'];
			$html = wbx_html(
				'a',
				array(
					'class' => 'image-link',
					'target' => $_link['target'] ?? '_self',
					'href' => $_link['url'] ?? '#',
					'rel' => $_link['rel'] ?? '_blank' === $_link['target'] ? 'noopener noreferrer' : '',
				),
				$html,
				true
			);
		}

		if ( $args['echo'] ) {
			$allowed_html = array(
				'div' => array(
					'class' => array(),
					'style' => array(),
				),
				'img' => array(
					'alt' => array(),
					'class' => array(),
					'src' => array(),
					'srcset' => array(),
					'sizes' => array(),
					'height' => array(),
					'width' => array(),
					'loading' => array(),
				),
				'picture' => array(),
				'source' => array(
					'media' => array(),
					'srcset' => array(),
					'type' => array(),
				),
				'a' => array(
					'href' => array(),
					'rel' => array(),
					'target' => array(),
				),
			);
			echo wp_kses( $html, apply_filters( 'wbx_image_allowed_html', $allowed_html ) );
		} else {
			return $html;
		}
	}
}

//classes
function wbx_get_classes($classes) {
    return implode(' ', $classes);
}
function theme_setup() {
  register_nav_menus(array(
      'primary_menu' => __('Primary Menu', 'text-domain'),
      'copyright_menu' => __('Copyright Menu', 'text-domain'),
  ));
}
add_action('after_setup_theme', 'theme_setup');


function theme_register_widget_areas() {
  // Sidebar Widget Area
  register_sidebar(array(
      'name'          => __('Sidebar', 'text-domain'), // Replace 'text-domain' with your theme's text domain
      'id'            => 'sidebar-1',
      'description'   => __('Add widgets here to appear in your sidebar.', 'text-domain'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
  ));

  // Footer Widget Area
  register_sidebar(array(
      'name'          => __('Footer 1', 'text-domain'), // Replace 'text-domain' with your theme's text domain
      'id'            => 'footer-1',
      'description'   => __('Add widgets here to appear in your footer.', 'text-domain'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 2', 'text-domain'), // Replace 'text-domain' with your theme's text domain
    'id'            => 'footer-2',
    'description'   => __('Add widgets here to appear in your footer.', 'text-domain'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
));

register_sidebar(array(
  'name'          => __('Footer 3', 'text-domain'), // Replace 'text-domain' with your theme's text domain
  'id'            => 'footer-3',
  'description'   => __('Add widgets here to appear in your footer.', 'text-domain'),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widget-title">',
  'after_title'   => '</h2>',
));

register_sidebar(array(
  'name'          => __('Footer 4', 'text-domain'), // Replace 'text-domain' with your theme's text domain
  'id'            => 'footer-4',
  'description'   => __('Add widgets here to appear in your footer.', 'text-domain'),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h2 class="widget-title">',
  'after_title'   => '</h2>',
));
}
add_action('widgets_init', 'theme_register_widget_areas');

function customize_menu_item_classes($classes, $item, $args) {
  // Add custom class to each navigation item
  $classes[] = 'nav-item';

  // Add 'active' class to the current menu item
  if (in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
  }

  if (in_array('menu-item-has-children', $item->classes) && $args->depth === 0) {
     $classes[] = 'dropdown';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'customize_menu_item_classes', 10, 3);

function customize_menu_item_attributes($atts, $item, $args) {
  // Add custom class to the link
  $atts['class'] = 'nav-link';

  // Add 'active' attribute to the current menu item
  if (in_array('current-menu-item', $item->classes)) {
      $atts['aria-current'] = 'page';
  }
  
  if (in_array('menu-item-has-children', $item->classes)) {
    $atts['class'] = 'nav-link dropdown-toggle';
    $atts['data-bs-toggle'] = 'dropdown';
  }

  return $atts;
}
add_filter('nav_menu_link_attributes', 'customize_menu_item_attributes', 10, 3);

function customize_submenu_item_classes($classes, $args, $depth) {
  // Add custom classes to submenu items
  $classes[] = 'dropdown-menu';

  return $classes;
}
add_filter('nav_menu_submenu_css_class', 'customize_submenu_item_classes', 10, 3);

function remove_menu_container($args) {
  $args['container'] = false;
  return $args;
}

add_filter('wp_nav_menu_args', 'remove_menu_container');

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

function custom_content_filter($content) {
  // Check if the content is empty
  if (empty($content)) {
      // Replace with Lorem Ipsum or any placeholder text
      $content = '
      <div class="container pt-4 pb-4">
        <h2>Lorem ipsum dolor sit amet</h2>
        <p>Consectetur adipiscing elit. Vestibulum eu scelerisque massa. Etiam at iaculis orci, a pharetra odio. Sed dictum turpis id nisi consequat accumsan. Duis libero metus, interdum in sapien in, pulvinar porta nulla. Donec id eros vitae ligula consequat dictum. Nulla ullamcorper nibh a elit interdum, et porttitor erat ullamcorper. Cras faucibus tortor sapien, non volutpat lectus venenatis id. Maecenas semper quam nec ligula semper imperdiet.</p>
        <h3>Nulla nec lacinia risus</h3>
        <p>Ut mattis ultrices nisl, quis lacinia nibh tincidunt ac. Integer semper finibus urna sed luctus. Aliquam quis orci facilisis, scelerisque ex nec, volutpat erat. Praesent ac arcu sit amet massa maximus tempor. Integer consequat bibendum eros, nec imperdiet mauris ultrices vel. Fusce tincidunt facilisis bibendum. Aliquam tristique, purus eget tempus aliquet, tellus ligula porta ante, id interdum libero urna at quam. Integer tellus arcu, vulputate vitae ipsum vel, suscipit porta libero. Morbi arcu arcu, dignissim ut bibendum sed, blandit eleifend nibh. Integer aliquet, nisi vel mattis ultrices, nulla eros suscipit orci, eu gravida leo erat vel nunc. Praesent accumsan augue neque, a tempor arcu interdum at.</p>      
        <ul>
          <li>Sed purus ligula, cursus quis pulvinar id, molestie eget erat.</li>
          <li>Aliquam in porta enim. Ut pulvinar eros nulla.</li>
          <li>Fusce feugiat sed nibh eget laoreet.</li>
          <ul>
            <li>Aenean vel imperdiet nunc, sed laoreet ante.</li>
          </ul>
          <li>Pellentesque in sodales orci.</li>
        </ul>
        <p>Praesent at consequat justo. Nam vulputate, ante et lobortis finibus, sapien elit elementum lorem, vitae finibus nibh tortor vitae turpis. Nam ac venenatis sapien, et sollicitudin ex. Pellentesque sit amet dui nec diam faucibus volutpat ut at neque. Nam eu consectetur massa, quis congue velit. Morbi elementum risus ex, ultrices suscipit sapien bibendum at. Praesent et vulputate arcu.</p>
        <ol>
          <li>Sed purus ligula, cursus quis pulvinar id, molestie eget erat.</li>
          <li>Aliquam in porta enim. Ut pulvinar eros nulla.</li>
            <ul>
              <li>Fusce feugiat sed nibh eget laoreet.</li>
              <li>Aenean vel imperdiet nunc, sed laoreet ante.</li>
            </ul>
          <li>Pellentesque in sodales orci.</li>
        </ol>
        </div>
      ';
  }

  return $content;
}

add_filter('the_content', 'custom_content_filter');

// Sanitize checkbox value
function sanitize_checkbox($value) {
  return (bool) $value;
}


function custom_numbered_navigation() {
    global $wp_query;
  
    $total_pages = $wp_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));
  
    if ($total_pages > 1) {
        echo '<div class="custom-pagination">';
        
        echo paginate_links(array(
            'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'    => '?paged=%#%',
            'current'   => $current_page,
            'total'     => $total_pages,
            'prev_text' => '&lsaquo;',
            'next_text' => '&rsaquo;',
            'mid_size'  => 3, // Show three page numbers before and after the current page
            'end_size'  => 1, // Show one page number at the beginning and end
        ));
  
        echo '</div>';
    }
  }

  function custom_excerpt($excerpt, $add_read_more = true, $word_count = 60) {
    $trimmed_excerpt = wp_trim_words($excerpt, $word_count, '');
  
    if ($add_read_more) {
        $permalink = get_permalink();
        $read_more_link = ' <a href="' . esc_url($permalink) . '" class="read_more">... Read more</a>';
        $modified_excerpt = $trimmed_excerpt . $read_more_link;
    } else {
        $modified_excerpt = $trimmed_excerpt . '...';
    }
  
    return $modified_excerpt;
  }

  add_image_size( 'mobile', 480, 0 ); // Set 0 for proportional height

  function add_lcp_image_preload() {
    echo '<link rel="preload" href="https://www.skinny.tax.etemps.info/wp-content/uploads/2023/08/heroimage.webp" as="image" type="image/webp">';
}

// Adjust the priority to ensure it runs at the right time
add_action('wp_head', 'add_lcp_image_preload', 1);



