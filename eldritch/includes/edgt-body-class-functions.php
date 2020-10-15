<?php

if (!function_exists('eldritch_edge_boxed_class')) {
	/**
	 * Function that adds classes on body for boxed layout
	 */
	function eldritch_edge_boxed_class($classes) {

        //if (eldritch_edge_bbpress_installed() && is_bbpress() && get_post_meta(eldritch_edge_get_page_id(), 'edgt_boxed_meta', true) == '' && eldritch_edge_options()->getOptionValue('bbpress_boxed') == 'yes' && (eldritch_edge_options()->getOptionValue('bbpress_header_type') !== 'header-vertical' || (eldritch_edge_options()->getOptionValue('bbpress_header_type') == '' && eldritch_edge_get_meta_field_intersect('header_type') !== 'header-vertical'))) {
        if (eldritch_edge_bbpress_installed() && is_bbpress() && eldritch_edge_options()->getOptionValue('bbpress_boxed') == 'yes'
            && eldritch_edge_options()->getOptionValue('bbpress_header_type') !== 'header-vertical') {

            if (eldritch_edge_get_meta_field_intersect('header_footer_in_box') == 'yes') {
                $classes[] = 'edgt-boxed';//
            } else {
                $classes[] = 'edgt-boxed-content';//
            }
        }

        else {
            //is boxed layout turned on?
            if (eldritch_edge_get_meta_field_intersect('boxed') == 'yes' && eldritch_edge_get_meta_field_intersect('header_type') !== 'header-vertical') {
                if(eldritch_edge_get_meta_field_intersect('header_footer_in_box') == 'yes'){
                    $classes[] = 'edgt-boxed';//
                }
                else {
                    $classes[] = 'edgt-boxed-content';//
                }
            }
        }



		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_boxed_class');
}

if (!function_exists('eldritch_edge_theme_version_class')) {
	/**
	 * Function that adds classes on body for version of theme
	 */
	function eldritch_edge_theme_version_class($classes) {
		$current_theme = wp_get_theme();

		//is child theme activated?
		if ($current_theme->parent()) {
			//add child theme version
			$classes[] = strtolower($current_theme->get('Name')) . '-child-ver-' . $current_theme->get('Version');

			//get parent theme
			$current_theme = $current_theme->parent();
		}

		if ($current_theme->exists() && $current_theme->get('Version') != '') {
			$classes[] = strtolower($current_theme->get('Name')) . '-ver-' . $current_theme->get('Version');
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_theme_version_class');
}

if (!function_exists('eldritch_edge_smooth_scroll_class')) {
	/**
	 * Function that adds classes on body for smooth scroll
	 */
	function eldritch_edge_smooth_scroll_class($classes) {
		//is smooth scroll enabled enabled and not Mac device?
		if (eldritch_edge_options()->getOptionValue('smooth_scroll') == 'yes') {
			$classes[] = 'edgt-smooth-scroll';
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_smooth_scroll_class');
}

if (!function_exists('eldritch_edge_smooth_page_transitions_class')) {
	/**
	 * Function that adds classes on body for smooth page transitions
	 */
	function eldritch_edge_smooth_page_transitions_class($classes) {

		if (eldritch_edge_options()->getOptionValue('smooth_page_transitions') == 'yes') {
			$classes[] = 'edgt-smooth-page-transitions';
		} else {
			$classes[] = '';
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_smooth_page_transitions_class');
}

if (!function_exists('eldritch_edge_smooth_ajax_class')) {
	/**
	 * Function that adds classes on body for smooth page transitions
	 */
	function eldritch_edge_smooth_ajax_class($classes) {

		if (eldritch_edge_options()->getOptionValue('smooth_page_transitions') == "yes") {
			$classes[] = 'edgt-mimic-ajax';
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_smooth_ajax_class');
}

if (!function_exists('eldritch_edge_content_initial_width_body_class')) {
	/**
	 * Function that adds transparent content class to body.
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with transparent content body class added
	 */
	function eldritch_edge_content_initial_width_body_class($classes) {

		if (eldritch_edge_options()->getOptionValue('initial_content_width')) {
			$classes[] = 'edgt-' . eldritch_edge_options()->getOptionValue('initial_content_width');
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_content_initial_width_body_class');
}

if (!function_exists('eldritch_edge_set_blog_body_class')) {
	/**
	 * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with blog body class added
	 */
	function eldritch_edge_set_blog_body_class($classes) {

		if (eldritch_edge_load_blog_assets()) {
			$classes[] = 'edgt-blog-installed';
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_set_blog_body_class');
}


if (!function_exists('eldritch_edge_set_portfolio_single_info_follow_body_class')) {
	/**
	 * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single small images or small slider
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with follow portfolio info class body class added
	 */

	function eldritch_edge_set_portfolio_single_info_follow_body_class($classes) {

		if (is_singular('portfolio-item')) {
			if (eldritch_edge_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes') {
				$classes[] = 'edgt-follow-portfolio-info';
			}
		}


		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_set_portfolio_single_info_follow_body_class');
}

if (!function_exists('eldritch_edge_paspartu_body_class')) {
	/**
	 * Function that adds paspartu class to body
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with paspartu class body class added
	 */
	function eldritch_edge_paspartu_body_class($classes) {

		$id = eldritch_edge_get_page_id();
		$paspartu_enabled = eldritch_edge_get_meta_field_intersect('enable_paspartu', $id) == 'yes';
		if ($paspartu_enabled) {
			$classes[] = 'edgt-paspartu-enabled';
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_paspartu_body_class');
}

if (!function_exists('eldritch_edge_sidebar_boxed_widgets_body_class')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */

	function eldritch_edge_sidebar_boxed_widgets_body_class($classes) {

		$boxed_widgets = '';
		$page_id = eldritch_edge_get_page_id();

		$boxed_widgets_meta = get_post_meta($page_id, 'edgt_boxed_widgets_meta', true);

		if (($boxed_widgets_meta !== '') && $page_id !== -1) {
			$boxed_widgets = $boxed_widgets_meta !== '' ? $boxed_widgets_meta : '';
		} else {
			if (is_single() && eldritch_edge_options()->getOptionValue('blog_single_boxed_widgets')) {
				$boxed_widgets = esc_attr(eldritch_edge_options()->getOptionValue('blog_single_boxed_widgets'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && eldritch_edge_options()->getOptionValue('archive_boxed_widgets')) {
				$boxed_widgets = esc_attr(eldritch_edge_options()->getOptionValue('archive_boxed_widgets'));
			} elseif (is_page() && eldritch_edge_options()->getOptionValue('page_boxed_widgets')) {
				$boxed_widgets = esc_attr(eldritch_edge_options()->getOptionValue('page_boxed_widgets'));
			}
		}

		if ($boxed_widgets === 'yes') {
			$classes[] = 'edgt-boxed-widgets';
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_sidebar_boxed_widgets_body_class');

}

if(!function_exists('eldritch_edge_has_protfolio_scrolling_body_class')) {

    function eldritch_edge_has_protfolio_scrolling_body_class($classes) {
        if(eldritch_edge_has_protfolio_scrolling_shortcode()) {
            $classes[] = 'edgt-horizontally-scrolling-portfolio-list-page';
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_has_protfolio_scrolling_body_class');
}