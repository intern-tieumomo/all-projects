<?php

if(!function_exists('eldritch_edge_register_full_screen_menu_nav')) {
	function eldritch_edge_register_full_screen_menu_nav() {
		register_nav_menus(
			array(
				'popup-navigation' => esc_html__('Fullscreen Navigation', 'eldritch')
			)
		);
	}

	add_action('after_setup_theme', 'eldritch_edge_register_full_screen_menu_nav');
}

if(!function_exists('eldritch_edge_register_full_screen_menu_sidebars')) {

	function eldritch_edge_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name'          => esc_html__('Fullscreen Menu Top', 'eldritch'),
			'id'            => 'fullscreen_menu_above',
			'description'   => esc_html__('This widget area is rendered above fullscreen menu', 'eldritch'),
			'before_widget' => '<div class="%2$s edgt-fullscreen-menu-above-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="edgt-fullscreen-widget-title">',
			'after_title'   => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__('Fullscreen Menu Bottom', 'eldritch'),
			'id'            => 'fullscreen_menu_below',
			'description'   => esc_html__('This widget area is rendered below fullscreen menu', 'eldritch'),
			'before_widget' => '<div class="%2$s edgt-fullscreen-menu-below-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="edgt-fullscreen-widget-title">',
			'after_title'   => '</h4>'
		));

	}

	add_action('widgets_init', 'eldritch_edge_register_full_screen_menu_sidebars');

}

if(!function_exists('eldritch_edge_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function eldritch_edge_fullscreen_menu_body_class($classes) {

        if(eldritch_edge_bbpress_installed() && is_bbpress() &&
                get_post_meta(eldritch_edge_get_page_id(), 'edgt_header_type_meta', true) == '' &&
                eldritch_edge_options()->getOptionValue('bbpress_header_type') != 'header-minimal') {
            // nothing
        }
        else if(eldritch_edge_get_meta_field_intersect('header_type') == 'header-minimal') {

			$classes[] = 'edgt-'.eldritch_edge_options()->getOptionValue('fullscreen_menu_animation_style');

		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_fullscreen_menu_body_class');
}

if(!function_exists('eldritch_edge_get_full_screen_menu')) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function eldritch_edge_get_full_screen_menu() {

        if(eldritch_edge_get_meta_field_intersect('header_type') == 'header-minimal') {

            extract(eldritch_edge_get_fullscreeen_page_options());

            $parameters = array(
                'fullscreen_menu_in_grid' => eldritch_edge_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false,
                'have_logo' => eldritch_edge_options()->getOptionValue('fullscreen_logo') !== '' ? true : false,
                'fullscreen_background_image' => $fullscreen_background_image
            );

			eldritch_edge_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);

		}

	}

}

if(!function_exists('eldritch_edge_get_full_screen_menu_navigation')) {
	/**
	 * Loads fullscreen menu navigation HTML template
	 */
	function eldritch_edge_get_full_screen_menu_navigation() {

		eldritch_edge_get_module_template_part('templates/parts/navigation', 'fullscreenmenu');

	}
}

if(!function_exists('eldritch_edge_get_fullscreeen_logo')) {
    /**
     * Loads logo HTML
     */
    function eldritch_edge_get_fullscreeen_logo() {

        $logo_image = eldritch_edge_options()->getOptionValue('fullscreen_logo');

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = eldritch_edge_get_image_dimensions($logo_image);

        $logo_styles          = '';
        $logo_dimensions_attr = array();
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens

            if(!empty($logo_dimensions['height']) && $logo_dimensions['width']) {
                $logo_dimensions_attr['height'] = $logo_dimensions['height'];
                $logo_dimensions_attr['width']  = $logo_dimensions['width'];
            }
        }

        $params = array(
            'logo_image'           => $logo_image,
            'logo_styles'          => $logo_styles,
            'logo_dimensions_attr' => $logo_dimensions_attr
        );

        eldritch_edge_get_module_template_part('templates/parts/logo', 'fullscreenmenu', '', $params);

    }

}

if(!function_exists('eldritch_edge_get_fullscreeen_page_options')) {
    /**
     * Gets options from page
     */
    function eldritch_edge_get_fullscreeen_page_options() {
        $id                                = eldritch_edge_get_page_id();
        $page_options                      = array();
        $fullscreen_background_image       = '';

        if(get_post_meta($id, 'edgt_disable_fullscreen_menu_background_image_meta', true) == 'yes') {
            $fullscreen_background_image = 'background-image:none';
        } elseif(($meta_temp = get_post_meta($id, 'edgt_fullscreen_menu_background_image_meta', true)) !== '') {
            $fullscreen_background_image = 'background-image:url('.$meta_temp.')';
        }

        $page_options['fullscreen_background_image'] = $fullscreen_background_image;

        return $page_options;
    }
}