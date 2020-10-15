<?php

if(!function_exists('eldritch_edge_search_body_class')) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function eldritch_edge_search_body_class($classes) {

        if(is_active_widget(false, false, 'edgt_search_opener')) {

            $classes[] = 'edgt-'.eldritch_edge_options()->getOptionValue('search_type');

            if(eldritch_edge_options()->getOptionValue('search_type') == 'fullscreen-search') {

                $is_fullscreen_bg_image_set = eldritch_edge_options()->getOptionValue('fullscreen_search_background_image') !== '';

                if($is_fullscreen_bg_image_set) {
                    $classes[] = 'edgt-fullscreen-search-with-bg-image';
                }

                $classes[] = 'edgt-search-fade';

            }

        }

        return $classes;

    }

    add_filter('body_class', 'eldritch_edge_search_body_class');
}

if(!function_exists('eldritch_edge_get_search')) {
    /**
     * Loads search HTML based on search type option.
     */
    function eldritch_edge_get_search() {

        if(eldritch_edge_active_widget(false, false, 'edgt_search_opener')) {

            $search_type = eldritch_edge_options()->getOptionValue('search_type');

            if($search_type == 'search-covers-header') {
                eldritch_edge_set_position_for_covering_search();

                return;
            } else if($search_type == 'search-slides-from-window-top') {
                eldritch_edge_set_search_position_in_menu($search_type);
                if(eldritch_edge_is_responsive_on()) {
                    eldritch_edge_set_search_position_mobile();
                }

                return;
            } elseif($search_type === 'search-dropdown') {
                eldritch_edge_set_dropdown_search_position();

                return;
            }

            eldritch_edge_load_search_template();

        }
    }

}

if(!function_exists('eldritch_edge_set_position_for_covering_search')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function eldritch_edge_set_position_for_covering_search() {

        $containing_sidebar = eldritch_edge_active_widget(false, false, 'edgt_search_opener');

        foreach($containing_sidebar as $sidebar) {

            if(strpos($sidebar, 'top-bar') !== false) {
                add_action('eldritch_edge_after_header_top_html_open', 'eldritch_edge_load_search_template');
            } else if(strpos($sidebar, 'main-menu') !== false) {
                add_action('eldritch_edge_after_header_menu_area_html_open', 'eldritch_edge_load_search_template');
            } else if(strpos($sidebar, 'mobile-logo') !== false) {
                add_action('eldritch_edge_after_mobile_header_html_open', 'eldritch_edge_load_search_template');
            } else if(strpos($sidebar, 'logo') !== false) {
                add_action('eldritch_edge_after_header_logo_area_html_open', 'eldritch_edge_load_search_template');
            } else if(strpos($sidebar, 'sticky') !== false) {
                add_action('eldritch_edge_after_sticky_menu_html_open', 'eldritch_edge_load_search_template');
            }

        }

    }

}

if(!function_exists('eldritch_edge_set_search_position_in_menu')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function eldritch_edge_set_search_position_in_menu($type) {

        add_action('eldritch_edge_after_header_menu_area_html_open', 'eldritch_edge_load_search_template');

    }
}

if(!function_exists('eldritch_edge_set_search_position_mobile')) {
    /**
     * Hooks search template to mobile header
     */
    function eldritch_edge_set_search_position_mobile() {

        add_action('eldritch_edge_after_mobile_header_html_open', 'eldritch_edge_load_search_template');

    }

}

if(!function_exists('eldritch_edge_load_search_template')) {
    /**
     * Loads HTML template with parameters
     */
    function eldritch_edge_load_search_template() {
        global $eldritch_IconCollections;

        $search_type = eldritch_edge_options()->getOptionValue('search_type');

        $search_icon       = '';
        $search_icon_close = '';
        if(eldritch_edge_options()->getOptionValue('search_icon_pack') !== '') {
            $search_icon       = $eldritch_IconCollections->getSearchIcon(eldritch_edge_options()->getOptionValue('search_icon_pack'), true);
            $search_icon_close = $eldritch_IconCollections->getSearchClose(eldritch_edge_options()->getOptionValue('search_icon_pack'), true);
        }

        $parameters = array(
            'search_in_grid'    => eldritch_edge_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
            'search_icon'       => $search_icon,
            'search_icon_close' => $search_icon_close
        );

        eldritch_edge_get_module_template_part('templates/types/'.$search_type, 'search', '', $parameters);

    }

}

if(!function_exists('eldritch_edge_set_dropdown_search_position')) {
    function eldritch_edge_set_dropdown_search_position() {
        add_action('eldritch_edge_after_search_opener', 'eldritch_edge_load_search_template');
    }
}