<?php

if(!function_exists('eldritch_edge_fullscreen_menu_general_styles')) {

    function eldritch_edge_fullscreen_menu_general_styles() {
        $fullscreen_menu_background_color = '';
        if(eldritch_edge_options()->getOptionValue('fullscreen_alignment') !== '') {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu ul li, .edgt-fullscreen-above-menu-widget-holder, .edgt-fullscreen-below-menu-widget-holder, .edgt-fullscreen-logo-wrapper', array(
                'text-align' => eldritch_edge_options()->getOptionValue('fullscreen_alignment')
            ));
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
            $fullscreen_menu_background_color = eldritch_edge_hex2rgb(eldritch_edge_options()->getOptionValue('fullscreen_menu_background_color'));
            if(eldritch_edge_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
                $fullscreen_menu_background_transparency = eldritch_edge_options()->getOptionValue('fullscreen_menu_background_transparency');
            } else {
                $fullscreen_menu_background_transparency = 0.9;
            }
        }

        if($fullscreen_menu_background_color !== '') {
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-holder', array(
                'background-color' => 'rgba('.$fullscreen_menu_background_color[0].','.$fullscreen_menu_background_color[1].','.$fullscreen_menu_background_color[2].','.$fullscreen_menu_background_transparency.')'
            ));
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-holder', array(
                'background-image'    => 'url('.eldritch_edge_options()->getOptionValue('fullscreen_menu_background_image').')',
                'background-position' => 'center 0',
                'background-repeat'   => 'no-repeat'
            ));
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-holder', array(
                'background-image'    => 'url('.eldritch_edge_options()->getOptionValue('fullscreen_menu_pattern_image').')',
                'background-repeat'   => 'repeat',
                'background-position' => '0 0'
            ));
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_menu_general_styles');

}

if(!function_exists('eldritch_edge_fullscreen_menu_first_level_style')) {

    function eldritch_edge_fullscreen_menu_first_level_style() {

        $first_menu_style = array();

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_color') !== '') {
            $first_menu_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_color');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
            $first_menu_style['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('fullscreen_menu_google_fonts')).',sans-serif';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
            $first_menu_style['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontsize')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
            $first_menu_style['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_lineheight')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
            $first_menu_style['font-style'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_fontstyle');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
            $first_menu_style['font-weight'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_fontweight');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
            $first_menu_style['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_letterspacing')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
            $first_menu_style['text-transform'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_texttransform');
        }

        if(!empty($first_menu_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu > ul > li > a, nav.edgt-fullscreen-menu > ul > li > h6', $first_menu_style);
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_color') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener.opened .edgt-line:after, .edgt-fullscreen-menu-opener.opened .edgt-line:before', array(
                'background-color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_color')
            ));
        }

        $first_menu_hover_style = array();

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
            $first_menu_hover_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_color');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_background_color') !== '') {
            $first_menu_hover_style['background-color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_background_color');
        }

        if(!empty($first_menu_hover_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu > ul > li > a:hover, nav.edgt-fullscreen-menu > ul > li > h6:hover', $first_menu_hover_style);
        }

        $first_menu_active_style = array();

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
            $first_menu_active_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_active_color');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_active_background_color') !== '') {
            $first_menu_active_style['background-color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_active_background_color');
        }

        if(!empty($first_menu_active_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu > ul > li > a.current', $first_menu_active_style);
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_menu_first_level_style');

}

if(!function_exists('eldritch_edge_fullscreen_menu_second_level_style')) {

    function eldritch_edge_fullscreen_menu_second_level_style() {
        $second_menu_style = array();
        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
            $second_menu_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_color_2nd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
            $second_menu_style['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')).',sans-serif';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
            $second_menu_style['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontsize_2nd')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
            $second_menu_style['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_lineheight_2nd')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
            $second_menu_style['font-style'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
            $second_menu_style['font-weight'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
            $second_menu_style['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
            $second_menu_style['text-transform'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
        }

        if(!empty($second_menu_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu > ul > li > ul > li > a, nav.edgt-fullscreen-menu > ul > li > ul > li > h6', $second_menu_style);
        }

        $second_menu_hover_style = array();

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
            $second_menu_hover_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd') !== '') {
            $second_menu_hover_style['background-color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd');
        }

        if(!empty($second_menu_hover_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu > ul > li > ul > li > a:hover, nav.edgt-fullscreen-menu > ul > li > ul > li > h6:hover', $second_menu_hover_style);
        }
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_menu_second_level_style');

}

if(!function_exists('eldritch_edge_fullscreen_menu_third_level_style')) {

    function eldritch_edge_fullscreen_menu_third_level_style() {
        $third_menu_style = array();
        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
            $third_menu_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_color_3rd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
            $third_menu_style['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')).',sans-serif';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
            $third_menu_style['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontsize_3rd')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
            $third_menu_style['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_lineheight_3rd')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
            $third_menu_style['font-style'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
            $third_menu_style['font-weight'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
            $third_menu_style['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
            $third_menu_style['text-transform'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
        }

        if(!empty($third_menu_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu ul li ul li ul li a', $third_menu_style);
        }

        $third_menu_hover_style = array();

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
            $third_menu_hover_style['color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd') !== '') {
            $third_menu_hover_style['background-color'] = eldritch_edge_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd');
        }

        if(!empty($third_menu_hover_style)) {
            echo eldritch_edge_dynamic_css('nav.edgt-fullscreen-menu ul li ul li ul li a:hover', $third_menu_hover_style);
        }
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_menu_third_level_style');

}

if(!function_exists('eldritch_edge_fullscreen_menu_icon_styles')) {

    function eldritch_edge_fullscreen_menu_icon_styles() {

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener', array(
                'color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_color')
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener:hover', array(
                'color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_hover_color')
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-light-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-fullscreen-menu-opener:not(.opened),
			.edgt-light-header.edgt-header-style-on-scroll .edgt-page-header .edgt-fullscreen-menu-opener:not(.opened),
			.edgt-light-header .edgt-top-bar .edgt-fullscreen-menu-opener:not(.opened)', array(
                'color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_light_icon_color').' !important'
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-light-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-fullscreen-menu-opener:not(.opened):hover,
			.edgt-light-header.edgt-header-style-on-scroll .edgt-page-header .edgt-fullscreen-menu-opener:not(.opened):hover,
			.edgt-light-header .edgt-top-bar .edgt-fullscreen-menu-opener:not(.opened):hover', array(
                'color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_light_icon_hover_color').' !important'
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-dark-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-fullscreen-menu-opener:not(.opened),
			.edgt-dark-header.edgt-header-style-on-scroll .edgt-page-header .edgt-fullscreen-menu-opener:not(.opened),
			.edgt-dark-header .edgt-top-bar .edgt-fullscreen-menu-opener:not(.opened)', array(
                'color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_dark_icon_color').' !important'
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-dark-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-fullscreen-menu-opener:not(.opened):hover ,
			.edgt-dark-header.edgt-header-style-on-scroll .edgt-page-header .edgt-fullscreen-menu-opener:not(.opened):hover,
			.edgt-dark-header .edgt-top-bar .edgt-fullscreen-menu-opener:not(.opened):hover', array(
                'color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color').' !important'
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_background_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener', array(
                '-webkit-backface-visibility' => 'hidden',
                'display'                     => 'inline-block'
            ));
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener.normal', array(
                'padding' => '10px 15px',
            ));
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener.medium', array(
                'padding' => '10px 13px',
            ));
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener.large', array(
                'padding' => '15px',
            ));
            echo eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener:not(.opened)', array(
                'background-color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_background_color')
            ));

        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_background_hover_color') !== '') {

            eldritch_edge_dynamic_css('.edgt-fullscreen-menu-opener.normal:not(.opened):hover, .edgt-fullscreen-menu-opener.medium:not(.opened):hover, .edgt-fullscreen-menu-opener.large:not(.opened):hover', array(
                'background-color' => eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_background_hover_color')
            ));

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_menu_icon_styles');

}

if(!function_exists('eldritch_edge_fullscreen_menu_icon_spacing')) {

    function eldritch_edge_fullscreen_menu_icon_spacing() {

        $fullscreen_menu_icon_spacing = array();

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
            $fullscreen_menu_icon_spacing['padding-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_padding_left')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
            $fullscreen_menu_icon_spacing['padding-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_padding_right')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
            $fullscreen_menu_icon_spacing['margin-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_margin_left')).'px';
        }

        if(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
            $fullscreen_menu_icon_spacing['margin-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('fullscreen_menu_icon_margin_right')).'px';
        }

        if(!empty($fullscreen_menu_icon_spacing)) {
            echo eldritch_edge_dynamic_css('a.edgt-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_menu_icon_spacing');

}