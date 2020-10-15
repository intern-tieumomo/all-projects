<?php
if (!function_exists('eldritch_edge_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function eldritch_edge_register_side_area_sidebar() {

		register_sidebar(array(
			'name'          => esc_html__('Side Area', 'eldritch'),
			'id'            => 'sidearea', //TODO Change name of sidebar
			'description'   => esc_html__('Side Area', 'eldritch'),
			'before_widget' => '<div id="%1$s" class="widget edgt-sidearea %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="edgt-sidearea-widget-title">',
			'after_title'   => '</h4>'
		));

	}

	add_action('widgets_init', 'eldritch_edge_register_side_area_sidebar');

}

if (!function_exists('eldritch_edge_side_menu_body_class')) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function eldritch_edge_side_menu_body_class($classes) {

		if (is_active_widget(false, false, 'edgt_side_area_opener')) {

			if (eldritch_edge_options()->getOptionValue('side_area_type')) {

				$classes[] = 'edgt-' . eldritch_edge_options()->getOptionValue('side_area_type');

				if (eldritch_edge_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'edgt-' . eldritch_edge_options()->getOptionValue('side_area_slide_with_content_width');

				}

			}

		}

		return $classes;

	}

	add_filter('body_class', 'eldritch_edge_side_menu_body_class');
}


if (!function_exists('eldritch_edge_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function eldritch_edge_get_side_area() {

		if (is_active_widget(false, false, 'edgt_side_area_opener')) {

			$parameters = array(
				'show_side_area_title' => eldritch_edge_options()->getOptionValue('side_area_title') !== '' ? true : false,
				//Dont show title if empty
			);

			eldritch_edge_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if (!function_exists('eldritch_edge_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function eldritch_edge_get_side_area_title() {

		$parameters = array(
			'side_area_title' => eldritch_edge_options()->getOptionValue('side_area_title')
		);

		eldritch_edge_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

if (!function_exists('eldritch_edge_get_side_menu_icon_html')) {
	/**
	 * Function that outputs html for side area icon opener.
	 * Uses $eldritch_IconCollections global variable
	 * @param $styles
	 * @return string generated html
	 */
	function eldritch_edge_get_side_menu_icon_html($styles = array()) {


		$icon_html = '<span class="edgt-side-area-icon" ' . eldritch_edge_get_inline_style($styles) . '>';
		$icon_html .= eldritch_edge_icon_collections()->renderIcon('icon_menu', 'font_elegant');
		$icon_html .= '</span >';


		return $icon_html;
	}
}