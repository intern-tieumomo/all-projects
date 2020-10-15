<?php

if(!function_exists('eldritch_edge_bbpress_disable_breadcrumbs')) {
    /**
     * This function disable breadcrumbs on BBPress
     * @return bool
     */
    function eldritch_edge_bbpress_disable_breadcrumbs() {
        return true;
    }

	//add_filter('bbp_no_breadcrumb', 'eldritch_edge_bbpress_disable_breadcrumbs');
}

if(!function_exists('eldritch_edge_bbpress_remove_single_forum_description')) {
    /**
     * This function overwrite description from BBPress plugin
     * @return string
     */
    function eldritch_edge_bbpress_remove_single_forum_description() {
		return '';
    }

	//add_filter('bbp_get_single_forum_description', 'eldritch_edge_bbpress_remove_single_forum_description');
}

if(!function_exists('eldritch_edge_bbpress_remove_single_forum_subscribe_link')) {
    function eldritch_edge_bbpress_remove_single_forum_subscribe_link() {
        /**
         * This function overwrite subscribe link from BBPress plugin
         * @return string
         */
		return '';
    }

	add_filter('bbp_get_forum_subscribe_link', 'eldritch_edge_bbpress_remove_single_forum_subscribe_link');
}

if(!function_exists('eldritch_edge_bbpress_remove_single_user_subscribe_link')) {
    function eldritch_edge_bbpress_remove_single_user_subscribe_link() {
        /**
         * This function overwrite subscribe link from BBPress plugin
         * @return string
         */
		return '';
    }

	add_filter('bbp_get_user_subscribe_link', 'eldritch_edge_bbpress_remove_single_user_subscribe_link');
}

if(!function_exists('eldritch_edge_bbpress_remove_single_user_favorites_link')) {
    function eldritch_edge_bbpress_remove_single_user_favorites_link() {
        /**
         * This function overwrite favorites link from BBPress plugin
         * @return string
         */
		return '';
    }

	add_filter('bbp_get_user_favorites_link', 'eldritch_edge_bbpress_remove_single_user_favorites_link');
}

if(!function_exists('eldritch_edge_bbpress_bbp_get_breadcrumb')) {
    function eldritch_edge_bbpress_bbp_get_breadcrumb() {
        /**
         * This function overwrite breadcrumbs separator from BBPress plugin
         *
         */

        return "";

    }

	add_filter('bbp_breadcrumb_separator', 'eldritch_edge_bbpress_bbp_get_breadcrumb');
}

if(!function_exists('eldritch_edge_bbpress_body_class')) {
    /**
     * This function add BBPress class if it is installed
     * @param $classes
     * @return array
     */
    function eldritch_edge_bbpress_body_class($classes) {
        $classes[] = 'edgt-bbpress-installed';

	    return $classes;
    }

	add_filter('body_class', 'eldritch_edge_bbpress_body_class');
}

if(!function_exists('eldritch_edge_bbpress_remove_content_top')) {
    function eldritch_edge_bbpress_remove_content_top() {
        /**
         * This function overwrite options for content top
         * @return string
         */

        $content_top_widget = eldritch_edge_options()->getOptionValue('bbpress_content_top_widget') == 'yes' ? false : true;

        return $content_top_widget;
    }

    add_filter('eldritch_edge_get_content_top_options', 'eldritch_edge_bbpress_remove_content_top');
}

if(!function_exists('eldritch_edge_bbpress_remove_content_bottom')) {
    function eldritch_edge_bbpress_remove_content_bottom() {
        /**
         * This function overwrite options for content bottom
         * @return string
         */

        $content_bottom_widget = eldritch_edge_options()->getOptionValue('bbpress_content_bottom_widget') == 'yes' ? false : true;

        return $content_bottom_widget;
    }

    add_filter('eldritch_edge_get_content_bottom_options', 'eldritch_edge_bbpress_remove_content_bottom');
}


if(!function_exists('eldritch_edge_bbpress_forums_slider_shortcode')) {
    /**
     * Funtion that hooks to slider shortcode filter and adds slider to BBPress forums page
     * if set in global options
     *
     * @param $shortcode
     *
     * @return bool|void
     */
    function eldritch_edge_bbpress_forums_slider_shortcode() {
        if(bbp_is_forum_archive()) {
            $option = eldritch_edge_options()->getOptionValue('bbpress_archive_slider');

            if($option !== '') {
                $shortcode = $option;

            echo '<div class="edgt-slider"><div class="edgt-slider-inner">';
			echo do_shortcode(wp_kses_post($shortcode)); // XSS OK
            echo '</div></div>';

            }
        }

    }

    add_action('eldritch_edge_after_container_open', 'eldritch_edge_bbpress_forums_slider_shortcode');
}