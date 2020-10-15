<?php

if(!function_exists('eldritch_edge_bbpress_style_dynamic_deps')) {
	/**
	 * Adds BBPress styles to dependencies array of style dynamic
	 * @param $deps
	 *
	 * @return array
	 */
	function eldritch_edge_bbpress_style_dynamic_deps($deps) {
        $deps[] = 'eldritch_edge_bb_press';

	    return $deps;
    }

	add_filter('eldritch_edge_style_dynamic_dependencies', 'eldritch_edge_bbpress_style_dynamic_deps');
}

if(!function_exists('eldritch_edge_bbpress_forums_display_page_title')) {
	/**
	 * Function that hooks to title area parameters filter and either displays or hides page title area
	 * based on global BBPress option
	 * @param $parameters
	 *
	 * @return mixed
	 */
	function eldritch_edge_bbpress_forums_display_page_title($parameters) {
		$show_title_area = eldritch_edge_options()->getOptionValue('bbpress_show_archive_title') === 'yes';

		if(bbp_is_forum_archive()) {
			$parameters['show_title_area'] = $show_title_area;
		}
	    return $parameters;
    }

	add_filter('eldritch_edge_title_area_height_params', 'eldritch_edge_bbpress_forums_display_page_title');
}

if (!function_exists('eldritch_edge_bbpress_skin_class')) {
    /**
     * Function that bbpress skin color
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added bbpress class
     */
    function eldritch_edge_bbpress_skin_class($classes) {

        if (eldritch_edge_is_woocommerce_installed()) {

            $bbpress_skin = eldritch_edge_options()->getOptionValue('bbpress_skin');
            $classes[] = $bbpress_skin;

        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_bbpress_skin_class');
}

if(!function_exists('eldritch_edge_bbpress_forums_archive_title_text')) {
	/**
	 * Function that hooks to title text filter and changes it for forums achive page
	 * @param $title_text
	 *
	 * @return string
	 */
	function eldritch_edge_bbpress_forums_archive_title_text($title_text) {
        if(bbp_is_forum_archive()) {
	        $title_text = esc_html__('Forums', 'eldritch');
        }

	    return $title_text;
    }

	add_filter('eldritch_edge_title_text', 'eldritch_edge_bbpress_forums_archive_title_text');
}

if(!function_exists('eldritch_edge_bbpress_sidebar_layout')) {
	/**
	 * Function that hooks to sidebar layout filter and changes it to option set for bbpress sidebar layout
	 * @param $layout
	 *
	 * @return bool|void
	 */
	function eldritch_edge_bbpress_sidebar_layout($layout) {
		if(is_bbpress()) {
			$layout_option = eldritch_edge_options()->getOptionValue('bbpress_sidebar_layout');

			if($layout_option !== '') {
				$layout = $layout_option;
			}
		}

	    return $layout;
    }

	add_filter('eldritch_edge_sidebar_layout', 'eldritch_edge_bbpress_sidebar_layout');
}

if(!function_exists('eldritch_edge_bbpress_sidebar')) {
	/**
	 * Function that hooks to sidebar filter and changes it to option set for bbpress sidebar
	 * @param $sidebar
	 *
	 * @return bool|void
	 */
	function eldritch_edge_bbpress_sidebar($sidebar) {
		if(is_bbpress()) {
			$sidebar_option = eldritch_edge_options()->getOptionValue('bbpress_sidebar');

			if($sidebar_option !== '') {
				$sidebar = $sidebar_option;
			}
		}

	    return $sidebar;
    }

	add_filter('eldritch_edge_sidebar', 'eldritch_edge_bbpress_sidebar');
}