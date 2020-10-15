<?php

use Eldritch\Modules\Header\Lib\HeaderFactory;

if (!function_exists('eldritch_edge_get_header')) {
	/**
	 * Loads header HTML based on header type option. Sets all necessary parameters for header
	 * and defines eldritch_edge_header_type_parameters filter
	 */
	function eldritch_edge_get_header() {

		//will be read from options
		$header_type = eldritch_edge_options()->getOptionValue('header_type');

        if(eldritch_edge_bbpress_installed() && is_bbpress()) {
            // check if it is not set in meta field
            if(get_post_meta(eldritch_edge_get_page_id(), 'edgt_header_type_meta', true) == '') {
                $header_type = eldritch_edge_options()->getOptionValue('bbpress_header_type');
            }
        }

		$header_behavior = eldritch_edge_get_meta_field_intersect('header_behaviour', eldritch_edge_get_page_id());

		extract(eldritch_edge_get_page_options());

		if (HeaderFactory::getInstance()->validHeaderObject()) {
			$parameters = array(
				'hide_logo'                        => eldritch_edge_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
				'show_sticky'                      => in_array($header_behavior, array(
					'sticky-header-on-scroll-up',
					'sticky-header-on-scroll-down-up'
				)) ? true : false,
				'show_fixed_wrapper'               => in_array($header_behavior, array('fixed-on-scroll')) ? true : false,
				'menu_area_background_color'       => $menu_area_background_color,
				'vertical_header_background_color' => $vertical_header_background_color,
				'vertical_header_opacity'          => $vertical_header_opacity,
				'vertical_background_image'        => $vertical_background_image,
			);

			$parameters = apply_filters('eldritch_edge_header_type_parameters', $parameters, $header_type);

			HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
		}
	}
}

if (!function_exists('eldritch_edge_get_header_top')) {
	/**
	 * Loads header top HTML and sets parameters for it
	 */
	function eldritch_edge_get_header_top() {

		//generate column width class
		switch (eldritch_edge_options()->getOptionValue('top_bar_layout')) {
			case ('two-columns'):
				$column_widht_class = 'edgt-' . eldritch_edge_options()->getOptionValue('top_bar_two_column_widths');
				break;
			case ('three-columns'):
				$column_widht_class = 'edgt-' . eldritch_edge_options()->getOptionValue('top_bar_column_widths');
				break;
		}

		$params = array(
			'column_widths'                  => $column_widht_class,
			'show_widget_center'             => eldritch_edge_options()->getOptionValue('top_bar_layout') == 'three-columns' ? true : false,
			'show_header_top'                => eldritch_edge_is_top_bar_enabled(),
			'top_bar_in_grid'                => eldritch_edge_get_meta_field_intersect('top_bar_in_grid') == 'yes' ? true : false,
		);

		$params = apply_filters('eldritch_edge_header_top_params', $params);

		eldritch_edge_get_module_template_part('templates/parts/header-top', 'header', '', $params);
	}
}

if (!function_exists('eldritch_edge_get_header_top_line')) {
	/**
	 * Loads header top line HTML and sets parameters for it
	 */
	function eldritch_edge_get_header_top_line() {

		$id = eldritch_edge_get_page_id();
		$colors = array();

		if (get_post_meta($id, 'edgt_top_line_meta', true) !== '') {
			$colors['color1'] = get_post_meta($id, 'edgt_top_line_color_1_meta', true);
			$colors['color2'] = get_post_meta($id, 'edgt_top_line_color_2_meta', true);
			$colors['color3'] = get_post_meta($id, 'edgt_top_line_color_3_meta', true);
			$colors['color4'] = get_post_meta($id, 'edgt_top_line_color_4_meta', true);
		} elseif (eldritch_edge_options()->getOptionValue('top_line') == 'yes') {
			$colors['color1'] = eldritch_edge_options()->getOptionValue('top_line_color_1');
			$colors['color2'] = eldritch_edge_options()->getOptionValue('top_line_color_2');
			$colors['color3'] = eldritch_edge_options()->getOptionValue('top_line_color_3');
			$colors['color4'] = eldritch_edge_options()->getOptionValue('top_line_color_4');
		}

		$i = 0;
		foreach ($colors as $name => $value) {
			if ($value !== "") {
				$i++;
			}
		}

		$params = array(
			'show_header_top_line' => eldritch_edge_get_meta_field_intersect('top_line') == 'yes' ? true : false,
			'number_of_colors'     => $i,
			'colors'               => $colors
		);

		eldritch_edge_get_module_template_part('templates/parts/header-top-line', 'header', '', $params);

	}
}

if (!function_exists('eldritch_edge_get_logo')) {
	/**
	 * Loads logo HTML
	 *
	 * @param $slug
	 */
	function eldritch_edge_get_logo($slug = '') {
		$id = eldritch_edge_get_page_id();

		if ($slug == 'sticky') {
			$logo_image = eldritch_edge_get_meta_field_intersect('logo_image_sticky', $id);
		} else {
			$logo_image = eldritch_edge_get_meta_field_intersect('logo_image', $id);
		}

		$logo_image_dark = eldritch_edge_get_meta_field_intersect('logo_image_dark', $id);
		$logo_image_light = eldritch_edge_get_meta_field_intersect('logo_image_light', $id);


		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = eldritch_edge_get_image_dimensions($logo_image);

		$logo_styles = '';
		$logo_dimensions_attr = array();
		if (is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: ' . intval($logo_height / 2) . 'px;'; //divided with 2 because of retina screens

			if (!empty($logo_dimensions['height']) && $logo_dimensions['width']) {
				$logo_dimensions_attr['height'] = $logo_dimensions['height'];
				$logo_dimensions_attr['width'] = $logo_dimensions['width'];
			}
		}

		$params = array(
			'logo_image'           => $logo_image,
			'logo_image_dark'      => $logo_image_dark,
			'logo_image_light'     => $logo_image_light,
			'logo_styles'          => $logo_styles,
			'logo_dimensions_attr' => $logo_dimensions_attr
		);

		eldritch_edge_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
	}
}

if (!function_exists('eldritch_edge_get_main_menu')) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function eldritch_edge_get_main_menu($additional_class = 'edgt-default-nav') {
		eldritch_edge_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
	}
}

if (!function_exists('eldritch_edge_get_sticky_menu')) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function eldritch_edge_get_sticky_menu($additional_class = 'edgt-default-nav') {
		eldritch_edge_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
	}
}

if (!function_exists('eldritch_edge_get_vertical_main_menu')) {
	/**
	 * Loads vertical menu HTML
	 */
	function eldritch_edge_get_vertical_main_menu($slug = '') {
		eldritch_edge_get_module_template_part('templates/parts/vertical-navigation', 'header', $slug);
	}
}

if (!function_exists('eldritch_edge_vertical_haeder_holder_class')) {
	/**
	 * return holder class
	 */
	function eldritch_edge_vertical_haeder_holder_class() {
		$holder_class = '';
		$center_content = eldritch_edge_get_meta_field_intersect('vertical_header_center_content');
		if ($center_content == 'yes') {
			$holder_class .= 'edgt-vertical-alignment-center';
		} else {
			$holder_class .= 'edgt-vertical-alignment-top';
		}

		return $holder_class;
	}
}

if (!function_exists('eldritch_edge_get_sticky_header')) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function eldritch_edge_get_sticky_header($slug = '') {
		$id = eldritch_edge_get_page_id();


		$parameters = array(
			'hide_logo'             => eldritch_edge_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
			'sticky_header_in_grid' => eldritch_edge_get_meta_field_intersect('sticky_header_in_grid', $id) == 'yes' ? true : false,
			'menu_area_position'    => eldritch_edge_get_meta_field_intersect('menu_area_position_header_' . $slug, $id)
		);

		eldritch_edge_get_module_template_part('templates/behaviors/sticky-header', 'header', $slug, $parameters);
	}
}

if (!function_exists('eldritch_edge_get_mobile_header')) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function eldritch_edge_get_mobile_header() {
		if (eldritch_edge_is_responsive_on()) {
			$header_type = eldritch_edge_options()->getOptionValue('header_type');
			$has_navigation = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' );

			//this could be read from theme options
			$mobile_header_type = 'mobile-header';

			$parameters = array(
				'show_logo'              => eldritch_edge_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
				'menu_opener_icon'       => eldritch_edge_icon_collections()->getMobileMenuIcon(eldritch_edge_options()->getOptionValue('mobile_icon_pack'), true),
				'show_navigation_opener' => $has_navigation
			);

			eldritch_edge_get_module_template_part('templates/types/' . $mobile_header_type, 'header', $header_type, $parameters);
		}
	}
}

if (!function_exists('eldritch_edge_get_mobile_logo')) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 *
	 * @param string $slug
	 */
	function eldritch_edge_get_mobile_logo($slug = '') {
		$id = eldritch_edge_get_page_id();

		//check if mobile logo has been set and use that, else use normal logo
		if (eldritch_edge_get_meta_field_intersect('logo_image_mobile', $id)) {
			$logo_image = eldritch_edge_get_meta_field_intersect('logo_image_mobile', $id);
		} else {
			$logo_image = eldritch_edge_get_meta_field_intersect('logo_image', $id);
		}

		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = eldritch_edge_get_image_dimensions($logo_image);

		$logo_height = '';
		$logo_styles = '';
		$logo_dimensions_attr = array();
		if (is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: ' . intval($logo_height / 2) . 'px'; //divided with 2 because of retina screens

			if (!empty($logo_dimensions['height']) && $logo_dimensions['width']) {
				$logo_dimensions_attr['height'] = $logo_dimensions['height'];
				$logo_dimensions_attr['width'] = $logo_dimensions['width'];
			}
		}

		//set parameters for logo
		$parameters = array(
			'logo_image'           => $logo_image,
			'logo_dimensions'      => $logo_dimensions,
			'logo_height'          => $logo_height,
			'logo_styles'          => $logo_styles,
			'logo_dimensions_attr' => $logo_dimensions_attr
		);

		eldritch_edge_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
	}
}

if (!function_exists('eldritch_edge_get_mobile_nav')) {
	/**
	 * Loads mobile navigation HTML
	 */
	function eldritch_edge_get_mobile_nav() {

		$slug = eldritch_edge_options()->getOptionValue('header_type');

		eldritch_edge_get_module_template_part('templates/parts/mobile-navigation', 'header', $slug);
	}
}

if (!function_exists('eldritch_edge_get_page_options')) {
	/**
	 * Gets options from page
	 */
	function eldritch_edge_get_page_options() {
		$id = eldritch_edge_get_page_id();

		$page_options = array();
		$menu_area_background_color_rgba = '';
		$menu_area_background_color = '';
		$menu_area_background_transparency = '';
		$vertical_header_background_color = '';
		$vertical_header_opacity = '';
		$vertical_background_image = '';

		$header_type = eldritch_edge_get_meta_field_intersect('header_type', $id);

        if(eldritch_edge_bbpress_installed() && is_bbpress()) {
            // check if it is not set in meta field
            if(get_post_meta($id, 'edgt_header_type_meta', true) == '') {
                $header_type = eldritch_edge_options()->getOptionValue('bbpress_header_type');
            }
        }

		switch ($header_type) {
			case 'header-standard':

				if (($meta_temp = get_post_meta($id, 'edgt_menu_area_background_color_header_standard_meta', true)) != '') {
					$menu_area_background_color = $meta_temp;
				}

				if (($meta_temp = get_post_meta($id, 'edgt_menu_area_background_transparency_header_standard_meta', true)) != '') {
					$menu_area_background_transparency = $meta_temp;
				}

				if (eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency) !== null) {
					$menu_area_background_color_rgba = 'background-color:' . eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
				}

				break;

			case 'header-vertical':
				if (($meta_temp = get_post_meta($id, 'edgt_vertical_header_background_color_meta', true)) !== '') {
					$vertical_header_background_color = 'background-color:' . $meta_temp;
				}

				if (get_post_meta($id, 'edgt_disable_vertical_header_background_image_meta', true) == 'yes') {
					$vertical_background_image = 'background-image:none';
				} elseif (($meta_temp = get_post_meta($id, 'edgt_vertical_header_background_image_meta', true)) !== '') {
					$vertical_background_image = 'background-image:url(' . $meta_temp . ')';
				}

				break;
		}

		$page_options['menu_area_background_color'] = $menu_area_background_color_rgba;
		$page_options['vertical_header_background_color'] = $vertical_header_background_color;
		$page_options['vertical_header_opacity'] = $vertical_header_opacity;
		$page_options['vertical_background_image'] = $vertical_background_image;

		return $page_options;
	}
}