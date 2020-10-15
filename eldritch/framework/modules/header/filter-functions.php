<?php

if (!function_exists('eldritch_edge_header_class')) {
    /**
     * Function that adds class to header based on theme options
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added header class
     */
    function eldritch_edge_header_class($classes)
    {
        $header_type = eldritch_edge_get_meta_field_intersect('header_type', eldritch_edge_get_page_id());

        if(eldritch_edge_bbpress_installed() && is_bbpress()) {
            // check if it is not set in meta field
            if(get_post_meta(eldritch_edge_get_page_id(), 'edgt_header_type_meta', true) == '') {
                $header_type = eldritch_edge_options()->getOptionValue('bbpress_header_type');
            }
        }

        $classes[] = 'edgt-' . $header_type;

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_header_class');
}

if (!function_exists('eldritch_edge_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added behaviour class
     */
    function eldritch_edge_header_behaviour_class($classes)
    {
        $id = eldritch_edge_get_page_id();

        $classes[] = 'edgt-' . eldritch_edge_get_meta_field_intersect('header_behaviour', $id);

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_header_behaviour_class');
}

if (!function_exists('eldritch_edge_mobile_header_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_mobile_header_class($classes)
    {
        $classes[] = 'edgt-default-mobile-header';

        $classes[] = 'edgt-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_mobile_header_class');
}

if (!function_exists('eldritch_edge_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added first level menu background color class
     */
    function eldritch_edge_header_class_first_level_bg_color($classes)
    {

        //check if first level hover background color is set
        if (eldritch_edge_options()->getOptionValue('menu_hover_background_color') !== '') {
            $classes[] = 'edgt-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_header_class_first_level_bg_color');
}

if (!function_exists('eldritch_edge_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added menu dropdown appearance class
     */
    function eldritch_edge_menu_dropdown_appearance($classes)
    {

        if (eldritch_edge_options()->getOptionValue('menu_dropdown_appearance') !== 'default') {
            $classes[] = 'edgt-' . eldritch_edge_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_menu_dropdown_appearance');
}

if (!function_exists('eldritch_edge_header_skin_class')) {

    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_header_skin_class($classes)
    {

        $id = eldritch_edge_get_page_id();

        if(eldritch_edge_bbpress_installed()
            && is_bbpress() && get_post_meta(eldritch_edge_get_page_id(), 'edgt_header_type_meta', true) == ''
            && eldritch_edge_options()->getOptionValue('bbpress_header_style') !== '') {
            $classes[] = 'edgt-' . eldritch_edge_options()->getOptionValue('bbpress_header_style');
        } else if (($meta_temp = get_post_meta($id, 'edgt_header_style_meta', true)) !== '') {
            $classes[] = 'edgt-' . $meta_temp;
        } else if (eldritch_edge_options()->getOptionValue('header_style') !== '') {
            $classes[] = 'edgt-' . eldritch_edge_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'eldritch_edge_header_skin_class');

}

if (!function_exists('eldritch_edge_header_scroll_style_class')) {

    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_header_scroll_style_class($classes)
    {

        if (eldritch_edge_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes') {
            $classes[] = 'edgt-header-style-on-scroll';
        }

        return $classes;

    }

    add_filter('body_class', 'eldritch_edge_header_scroll_style_class');

}

if (!function_exists('eldritch_edge_header_global_js_var')) {
    /**
     * @param $global_variables
     *
     * @return mixed
     */
    function eldritch_edge_header_global_js_var($global_variables)
    {

        $global_variables['edgtTopBarHeight'] = eldritch_edge_get_top_bar_height();
        $global_variables['edgtStickyHeaderHeight'] = eldritch_edge_get_sticky_header_height();
        $global_variables['edgtStickyHeaderTransparencyHeight'] = eldritch_edge_get_sticky_header_height_of_complete_transparency();

        return $global_variables;
    }

    add_filter('eldritch_edge_js_global_variables', 'eldritch_edge_header_global_js_var');
}

if (!function_exists('eldritch_edge_header_per_page_js_var')) {
    /**
     * @param $perPageVars
     *
     * @return mixed
     */
    function eldritch_edge_header_per_page_js_var($perPageVars)
    {
        $id = eldritch_edge_get_page_id();

        $perPageVars['edgtStickyScrollAmount'] = eldritch_edge_get_sticky_scroll_amount();
        $perPageVars['edgtStickyScrollAmountFullScreen'] = get_post_meta($id, 'edgt_scroll_amount_for_sticky_fullscreen_meta', true) === 'yes';

        return $perPageVars;
    }

    add_filter('eldritch_edge_per_page_js_vars', 'eldritch_edge_header_per_page_js_var');
}

if (!function_exists('eldritch_edge_full_width_wide_menu_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_full_width_wide_menu_class($classes)
    {
        if (eldritch_edge_get_meta_field_intersect('enable_wide_menu_background') === 'yes') {
            $classes[] = 'edgt-full-width-wide-menu';
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_full_width_wide_menu_class');
}

if (!function_exists('eldritch_edge_header_bottom_border_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_header_bottom_border_class($classes)
    {
        $id = eldritch_edge_get_page_id();

        $disable_border = get_post_meta($id, 'edgt_menu_area_bottom_border_disable_header_standard_meta', true) == 'yes';
        if ($disable_border) {
            $classes[] = 'edgt-header-standard-border-disable';
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_header_bottom_border_class');
}

if (!function_exists('eldritch_edge_header_bottom_shadow_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_header_bottom_shadow_class($classes)
    {
        $id = eldritch_edge_get_page_id();
        $header_type = eldritch_edge_get_meta_field_intersect('header_type', $id);
        switch ($header_type) {
            case 'header-standard':
                $disable_shadow_standard = eldritch_edge_get_meta_field_intersect('menu_area_shadow_header_standard', $id) == 'no';
                if ($disable_shadow_standard) {
                    $classes[] = 'edgt-header-standard-shadow-disable';
                }

                $disable_grid_shadow_standard = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_shadow_header_standard', $id) == 'no';
                if ($disable_grid_shadow_standard) {
                    $classes[] = 'edgt-header-standard-in-grid-shadow-disable';
                }
                break;
            case 'header-minimal':
                $disable_shadow_minimal = eldritch_edge_get_meta_field_intersect('menu_area_shadow_header_minimal', $id) == 'no';
                if ($disable_shadow_minimal) {
                    $classes[] = 'edgt-header-minimal-shadow-disable';
                }

                $disable_grid_shadow_minimal = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_shadow_header_minimal', $id) == 'no';
                if ($disable_grid_shadow_minimal) {
                    $classes[] = 'edgt-header-minimal-in-grid-shadow-disable';
                }
                break;
            case 'header-centered':
                $disable_logo_border_centered = eldritch_edge_get_meta_field_intersect('logo_area_border_header_centered', $id) == 'no';
                if ($disable_logo_border_centered) {
                    $classes[] = 'edgt-header-centered-logo-border-disable';
                }

                $disable_menu_shadow_centered = eldritch_edge_get_meta_field_intersect('menu_area_shadow_header_centered', $id) == 'no';
                if ($disable_menu_shadow_centered) {
                    $classes[] = 'edgt-header-centered-menu-shadow-disable';
                }

                $disable_logo_grid_border_centered = eldritch_edge_get_meta_field_intersect('logo_area_in_grid_border_header_centered', $id) == 'no';
                if ($disable_logo_grid_border_centered) {
                    $classes[] = 'edgt-header-centered-logo-in-grid-border-disable';
                }

                $disable_menu_grid_border_centered = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_border_header_centered', $id) == 'no';
                if ($disable_menu_grid_border_centered) {
                    $classes[] = 'edgt-header-centered-menu-in-grid-border-disable';
                }
                break;
            case 'header-vertical':
                $disable_shadow_vertical = eldritch_edge_get_meta_field_intersect('vertical_header_shadow', $id) == 'no';
                if ($disable_shadow_vertical) {
                    $classes[] = 'edgt-header-vertical-shadow-disable';
                }
                break;
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_header_bottom_shadow_class');
}

if (!function_exists('eldritch_edge_get_top_bar_styles')) {
    /**
     * Sets per page styles for header top bar
     *
     * @param $styles
     *
     * @return array
     */
    function eldritch_edge_get_top_bar_styles($styles)
    {
        $id = eldritch_edge_get_page_id();
        $class_prefix = eldritch_edge_get_unique_page_class();
        $top_bar_style = array();

        $current_style = '';

        $top_bar_bg_color = get_post_meta($id, 'edgt_top_bar_background_color_meta', true);

        $top_bar_selector = array(
            $class_prefix . ' .edgt-top-bar',
            $class_prefix . ' .edgt-top-bar-background'
        );

        if ($top_bar_bg_color !== '') {
            $top_bar_transparency = get_post_meta($id, 'edgt_top_bar_background_transparency_meta', true);
            if ($top_bar_transparency === '') {
                $top_bar_transparency = 1;
            }

            $top_bar_style['background-color'] = eldritch_edge_rgba_color($top_bar_bg_color, $top_bar_transparency);
        }

        $current_style .= eldritch_edge_dynamic_css($top_bar_selector, $top_bar_style);

        $styles = $current_style . $styles;

        return $styles;
    }

    add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_get_top_bar_styles');
}

if (!function_exists('eldritch_edge_get_main_menu_styles')) {
    /**
     * Sets per page styles for header top bar
     *
     * @param $style
     *
     * @return array
     */
    function eldritch_edge_get_main_menu_styles($style)
    {
        $id = eldritch_edge_get_page_id();
        $class_prefix = eldritch_edge_get_unique_page_class();

        $current_style = '';


        //Main Menu COLOR
        $main_menu_color_style = array();

        $main_menu_color = get_post_meta($id, 'edgt_menu_color_meta', true);

        $main_menu_color_selector = array(
            $class_prefix . ' .edgt-main-menu > ul > li > a',
            $class_prefix . ' .edgt-page-header #lang_sel > ul > li > a',
            $class_prefix . ' .edgt-page-header #lang_sel_click > ul > li > a',
            $class_prefix . ' .edgt-page-header #lang_sel ul > li:hover > a',
        );

        if ($main_menu_color !== '') {
            $main_menu_color_style['color'] = $main_menu_color;
        }

        $current_style .= eldritch_edge_dynamic_css($main_menu_color_selector, $main_menu_color_style);

        //Main Menu HOVER COLOR
        $main_menu_hovercolor_style = array();

        $main_menu_hovercolor = get_post_meta($id, 'edgt_menu_hovercolor_meta', true);

        $main_menu_hover_color_selector = array(
            $class_prefix . ' .edgt-main-menu > ul > li:hover > a',
            $class_prefix . ' .edgt-main-menu > ul > li.edgt-active-item:hover > a',
            $class_prefix . ':not(.edgt-menu-item-first-level-bg-color) .edgt-main-menu > ul > li:hover > a',
            $class_prefix . ':not(.edgt-menu-item-first-level-bg-color) .edgt-main-menu > ul > li.edgt-active-item:hover > a',
            $class_prefix . ' .edgt-page-header #lang_sel ul li a:hover',
            $class_prefix . ' .edgt-page-header #lang_sel_click > ul > li a:hover'
        );

        if ($main_menu_hovercolor !== '') {
            $main_menu_hovercolor_style['color'] = $main_menu_hovercolor;
        }

        $current_style .= eldritch_edge_dynamic_css($main_menu_hover_color_selector, $main_menu_hovercolor_style);

        //Main Menu ACTIVE COLOR
        $main_menu_activecolor_style = array();

        $main_menu_activecolor = get_post_meta($id, 'edgt_menu_activecolor_meta', true);

        $main_menu_active_color_selector = array(
            $class_prefix . ' .edgt-main-menu > ul > li.edgt-active-item > a',
            $class_prefix . ':not(.edgt-menu-item-first-level-bg-color) .edgt-main-menu > ul > li.edgt-active-item > a',
        );

        if ($main_menu_activecolor !== '') {
            $main_menu_activecolor_style['color'] = $main_menu_activecolor;
        }

        $current_style .= eldritch_edge_dynamic_css($main_menu_active_color_selector, $main_menu_activecolor_style);

        //Main Menu BACKGROUND TEXT COLOR
        $main_menu_text_background_color_style = array();

        $main_menu_text_background_color = get_post_meta($id, 'edgt_menu_text_background_color_meta', true);

        $main_menu_text_background_color_selector = array(
            $class_prefix . ' .edgt-main-menu > ul > li > a span.item_inner',
            $class_prefix . ' .edgt-page-header #lang_sel .lang_sel_sel',
            $class_prefix . ' .edgt-top-bar #lang_sel .lang_sel_sel'
        );

        if ($main_menu_text_background_color !== '') {
            $main_menu_text_background_color_style['background-color'] = $main_menu_text_background_color;
        }

        $current_style .= eldritch_edge_dynamic_css($main_menu_text_background_color_selector, $main_menu_text_background_color_style);

        //Main Menu HOVER BACKGROUND TEXT COLOR
        $main_menu_hover_background_color_style = array();

        $main_menu_hover_background_color = get_post_meta($id, 'edgt_menu_hover_background_color_meta', true);

        $main_menu_hover_background_color_selector = array(
            $class_prefix . ' .edgt-main-menu > ul > li:hover > a span.item_inner',
            $class_prefix . ' .edgt-main-menu > ul > li.edgt-active-item:hover > a span.item_inner',
            $class_prefix . ' .edgt-page-header #lang_sel li:hover .lang_sel_sel'
        );

        if ($main_menu_hover_background_color !== '') {
            $main_menu_hover_background_color_style['background-color'] = $main_menu_hover_background_color;
        }

        $current_style .= eldritch_edge_dynamic_css($main_menu_hover_background_color_selector, $main_menu_hover_background_color_style);

        //Main Menu ACTIVE BACKGROUND TEXT COLOR
        $main_menu_active_background_color_style = array();

        $main_menu_active_background_color = get_post_meta($id, 'edgt_menu_active_background_color_meta', true);

        $main_menu_active_background_color_selector = array(
            $class_prefix . ' .edgt-main-menu > ul > li.edgt-active-item > a span.item_inner'
        );

        if ($main_menu_active_background_color !== '') {
            $main_menu_active_background_color_style['background-color'] = $main_menu_active_background_color;
        }

        $current_style .= eldritch_edge_dynamic_css($main_menu_active_background_color_selector, $main_menu_active_background_color_style);

        $style = $current_style . $style;

        return $style;
    }

    add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_get_main_menu_styles');
}

if (!function_exists('eldritch_edge_top_bar_skin_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function eldritch_edge_top_bar_skin_class($classes)
    {
        $id = eldritch_edge_get_page_id();
        $top_bar_skin = get_post_meta($id, 'edgt_top_bar_skin_meta', true);

        if ($top_bar_skin !== '') {
            $classes[] = 'edgt-top-bar-' . $top_bar_skin;
        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_top_bar_skin_class');
}