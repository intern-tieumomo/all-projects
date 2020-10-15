<?php

if (!function_exists('eldritch_edge_side_area_slide_from_right_type_style')) {

    function eldritch_edge_side_area_slide_from_right_type_style()
    {

        if (eldritch_edge_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

            if (eldritch_edge_options()->getOptionValue('side_area_width') !== '' && eldritch_edge_options()->getOptionValue('side_area_width') >= 30) {
                echo eldritch_edge_dynamic_css('.edgt-side-menu-slide-from-right .edgt-side-menu', array(
                    'right' => '-' . eldritch_edge_options()->getOptionValue('side_area_width') . '%',
                    'width' => eldritch_edge_options()->getOptionValue('side_area_width') . '%'
                ));
            }

            if (eldritch_edge_options()->getOptionValue('side_area_content_overlay_color') !== '') {

                echo eldritch_edge_dynamic_css('.edgt-side-menu-slide-from-right .edgt-wrapper .edgt-cover', array(
                    'background-color' => eldritch_edge_options()->getOptionValue('side_area_content_overlay_color')
                ));

            }
            if (eldritch_edge_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

                echo eldritch_edge_dynamic_css('.edgt-side-menu-slide-from-right.edgt-right-side-menu-opened .edgt-wrapper .edgt-cover', array(
                    'opacity' => eldritch_edge_options()->getOptionValue('side_area_content_overlay_opacity')
                ));

            }
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_slide_from_right_type_style');

}

if (!function_exists('eldritch_edge_side_area_icon_color_styles')) {

    function eldritch_edge_side_area_icon_color_styles()
    {

        if (eldritch_edge_options()->getOptionValue('side_area_icon_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-side-menu-button-opener', array(
                'color' => eldritch_edge_options()->getOptionValue('side_area_icon_color')
            ));

        }
        if (eldritch_edge_options()->getOptionValue('side_area_icon_hover_color') !== '') {

            echo eldritch_edge_dynamic_css('.edgt-side-menu-button-opener:hover', array(
                'color' => eldritch_edge_options()->getOptionValue('side_area_icon_hover_color')
            ));

        }
        if (eldritch_edge_options()->getOptionValue('side_area_light_icon_color') !== '') {

            echo eldritch_edge_dynamic_css(
                '.edgt-light-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-side-menu-button-opener,
			    .edgt-light-header.edgt-header-style-on-scroll .edgt-page-header .edgt-side-menu-button-opener,
			    .edgt-light-header .edgt-top-bar .edgt-side-menu-button-opener',
                array('color' => eldritch_edge_options()->getOptionValue('side_area_light_icon_color') . ' !important'
            ));

        }
        if (eldritch_edge_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

            echo eldritch_edge_dynamic_css(
                '.edgt-light-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-side-menu-button-opener:hover,
			    .edgt-light-header.edgt-header-style-on-scroll .edgt-page-header .edgt-side-menu-button-opener:hover,
			    .edgt-light-header .edgt-top-bar .edgt-side-menu-button-opener:hover',
                array('color' => eldritch_edge_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
                ));

        }
        if (eldritch_edge_options()->getOptionValue('side_area_dark_icon_color') !== '') {

            echo eldritch_edge_dynamic_css(
                '.edgt-dark-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-side-menu-button-opener,
			    .edgt-dark-header.edgt-header-style-on-scroll .edgt-page-header .edgt-side-menu-button-opener,
			    .edgt-dark-header .edgt-top-bar .edgt-side-menu-button-opener',
                array('color' => eldritch_edge_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
                ));

        }
        if (eldritch_edge_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

            echo eldritch_edge_dynamic_css(
                '.edgt-dark-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-side-menu-button-opener:hover,
			    .edgt-dark-header.edgt-header-style-on-scroll .edgt-page-header .edgt-side-menu-button-opener:hover,
			    .edgt-dark-header .edgt-top-bar .edgt-side-menu-button-opener:hover',
                array('color' => eldritch_edge_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
                ));

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_icon_color_styles');

}

if (!function_exists('eldritch_edge_side_area_icon_spacing_styles')) {

    function eldritch_edge_side_area_icon_spacing_styles()
    {
        $icon_spacing = array();

        if (eldritch_edge_options()->getOptionValue('side_area_icon_padding_left') !== '') {
            $icon_spacing['padding-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_icon_padding_right') !== '') {
            $icon_spacing['padding-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_icon_margin_left') !== '') {
            $icon_spacing['margin-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_icon_margin_right') !== '') {
            $icon_spacing['margin-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
        }

        if (!empty($icon_spacing)) {

            echo eldritch_edge_dynamic_css('a.edgt-side-menu-button-opener', $icon_spacing);

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_icon_spacing_styles');
}

if (!function_exists('eldritch_edge_side_area_icon_border_styles')) {

    function eldritch_edge_side_area_icon_border_styles()
    {
        if (eldritch_edge_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

            $side_area_icon_border = array();

            if (eldritch_edge_options()->getOptionValue('side_area_icon_border_color') !== '') {
                $side_area_icon_border['border-color'] = eldritch_edge_options()->getOptionValue('side_area_icon_border_color');
            }

            if (eldritch_edge_options()->getOptionValue('side_area_icon_border_width') !== '') {
                $side_area_icon_border['border-width'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_icon_border_width')) . 'px';
            } else {
                $side_area_icon_border['border-width'] = '1px';
            }

            if (eldritch_edge_options()->getOptionValue('side_area_icon_border_radius') !== '') {
                $side_area_icon_border['border-radius'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_icon_border_radius')) . 'px';
            }

            if (eldritch_edge_options()->getOptionValue('side_area_icon_border_style') !== '') {
                $side_area_icon_border['border-style'] = eldritch_edge_options()->getOptionValue('side_area_icon_border_style');
            } else {
                $side_area_icon_border['border-style'] = 'solid';
            }

            if (!empty($side_area_icon_border)) {
                $side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
                $side_area_icon_border['transition'] = 'all 0.15s ease-out';
                echo eldritch_edge_dynamic_css('a.edgt-side-menu-button-opener', $side_area_icon_border);
            }

            if (eldritch_edge_options()->getOptionValue('side_area_icon_border_hover_color') !== '') {
                $side_area_icon_border_hover['border-color'] = eldritch_edge_options()->getOptionValue('side_area_icon_border_hover_color');
                echo eldritch_edge_dynamic_css('a.edgt-side-menu-button-opener:hover', $side_area_icon_border_hover);
            }
        }
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_icon_border_styles');

}

if (!function_exists('eldritch_edge_side_area_alignment')) {

    function eldritch_edge_side_area_alignment()
    {

        if (eldritch_edge_options()->getOptionValue('side_area_aligment')) {

            echo eldritch_edge_dynamic_css('.edgt-side-menu-slide-from-right .edgt-side-menu, .edgt-side-menu-slide-with-content .edgt-side-menu, .edgt-side-area-uncovered-from-content .edgt-side-menu', array(
                'text-align' => eldritch_edge_options()->getOptionValue('side_area_aligment')
            ));

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_alignment');

}

if (!function_exists('eldritch_edge_side_area_styles')) {

    function eldritch_edge_side_area_styles()
    {

        $side_area_styles = array();

        if (eldritch_edge_options()->getOptionValue('side_area_background_color') !== '') {
            $side_area_styles['background-color'] = eldritch_edge_options()->getOptionValue('side_area_background_color');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_padding_top') !== '') {
            $side_area_styles['padding-top'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_padding_top')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_padding_right') !== '') {
            $side_area_styles['padding-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_padding_right')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_padding_bottom') !== '') {
            $side_area_styles['padding-bottom'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_padding_bottom')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_padding_left') !== '') {
            $side_area_styles['padding-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_padding_left')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_bakground_image') !== '') {
            $side_area_styles['background-image'] = 'url(' . eldritch_edge_options()->getOptionValue('side_area_bakground_image') . ')';
        }

        if (!empty($side_area_styles)) {
            echo eldritch_edge_dynamic_css('.edgt-side-menu', $side_area_styles);
        }

        if (eldritch_edge_options()->getOptionValue('side_area_close_icon') == 'dark') {
            echo eldritch_edge_dynamic_css('.edgt-side-menu a.edgt-close-side-menu span, .edgt-side-menu a.edgt-close-side-menu i', array(
                'color' => '#000000'
            ));
        }

        if (eldritch_edge_options()->getOptionValue('side_area_close_icon_size') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-side-menu a.edgt-close-side-menu', array(
                'height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'width' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'line-height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'padding' => 0,
            ));
            echo eldritch_edge_dynamic_css('.edgt-side-menu a.edgt-close-side-menu span, .edgt-side-menu a.edgt-close-side-menu i', array(
                'font-size' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'width' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
                'line-height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
            ));
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_styles');

}

if (!function_exists('eldritch_edge_side_area_title_styles')) {

    function eldritch_edge_side_area_title_styles()
    {

        $title_styles = array();

        if (eldritch_edge_options()->getOptionValue('side_area_title_color') !== '') {
            $title_styles['color'] = eldritch_edge_options()->getOptionValue('side_area_title_color');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_fontsize') !== '') {
            $title_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_title_fontsize')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_lineheight') !== '') {
            $title_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_title_lineheight')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_texttransform') !== '') {
            $title_styles['text-transform'] = eldritch_edge_options()->getOptionValue('side_area_title_texttransform');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
            $title_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_fontstyle') !== '') {
            $title_styles['font-style'] = eldritch_edge_options()->getOptionValue('side_area_title_fontstyle');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_fontweight') !== '') {
            $title_styles['font-weight'] = eldritch_edge_options()->getOptionValue('side_area_title_fontweight');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_title_letterspacing') !== '') {
            $title_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
        }

        if (!empty($title_styles)) {

            echo eldritch_edge_dynamic_css('.edgt-side-menu-title h4, .edgt-side-menu-title h5', $title_styles);

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_title_styles');

}

if (!function_exists('eldritch_edge_side_area_text_styles')) {

    function eldritch_edge_side_area_text_styles()
    {
        $text_styles = array();

        if (eldritch_edge_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
            $text_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_fontsize') !== '') {
            $text_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_text_fontsize')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_lineheight') !== '') {
            $text_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_text_lineheight')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_fontweight') !== '') {
            $text_styles['font-weight'] = eldritch_edge_options()->getOptionValue('side_area_text_fontweight');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_fontstyle') !== '') {
            $text_styles['font-style'] = eldritch_edge_options()->getOptionValue('side_area_text_fontstyle');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_texttransform') !== '') {
            $text_styles['text-transform'] = eldritch_edge_options()->getOptionValue('side_area_text_texttransform');
        }

        if (eldritch_edge_options()->getOptionValue('side_area_text_color') !== '') {
            $text_styles['color'] = eldritch_edge_options()->getOptionValue('side_area_text_color');
        }

        if (!empty($text_styles)) {

            echo eldritch_edge_dynamic_css('.edgt-side-menu .widget, .edgt-side-menu .widget.widget_search form, .edgt-side-menu .widget.widget_search form input[type="text"], .edgt-side-menu .widget.widget_search form input[type="submit"], .edgt-side-menu .widget h6, .edgt-side-menu .widget h6 a, .edgt-side-menu .widget p, .edgt-side-menu .widget li a, .edgt-side-menu .widget.widget_rss li a.rsswidget, .edgt-side-menu #wp-calendar caption,.edgt-side-menu .widget li, .edgt-side-menu h3, .edgt-side-menu .widget.widget_archive select, .edgt-side-menu .widget.widget_categories select, .edgt-side-menu .widget.widget_text select, .edgt-side-menu .widget.widget_search form input[type="submit"], .edgt-side-menu #wp-calendar th, .edgt-side-menu #wp-calendar td, .edgt-side-menu .q_social_icon_holder i.simple_social', $text_styles);

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_text_styles');

}

if (!function_exists('eldritch_edge_side_area_link_styles')) {

    function eldritch_edge_side_area_link_styles()
    {
        $link_styles = array();

        if (eldritch_edge_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
            $link_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_font_size') !== '') {
            $link_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('sidearea_link_font_size')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_line_height') !== '') {
            $link_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('sidearea_link_line_height')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
            $link_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_font_weight') !== '') {
            $link_styles['font-weight'] = eldritch_edge_options()->getOptionValue('sidearea_link_font_weight');
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_font_style') !== '') {
            $link_styles['font-style'] = eldritch_edge_options()->getOptionValue('sidearea_link_font_style');
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_text_transform') !== '') {
            $link_styles['text-transform'] = eldritch_edge_options()->getOptionValue('sidearea_link_text_transform');
        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_color') !== '') {
            $link_styles['color'] = eldritch_edge_options()->getOptionValue('sidearea_link_color');
        }

        if (!empty($link_styles)) {

            echo eldritch_edge_dynamic_css('.edgt-side-menu .widget li a, .edgt-side-menu .widget a:not(.qbutton)', $link_styles);

        }

        if (eldritch_edge_options()->getOptionValue('sidearea_link_hover_color') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-side-menu .widget a:hover, .edgt-side-menu .widget li:hover, .edgt-side-menu .widget li:hover>a', array(
                'color' => eldritch_edge_options()->getOptionValue('sidearea_link_hover_color')
            ));
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_link_styles');

}

if (!function_exists('eldritch_edge_side_area_border_styles')) {

    function eldritch_edge_side_area_border_styles()
    {

        if (eldritch_edge_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

            if (eldritch_edge_options()->getOptionValue('side_area_bottom_border_color') !== '') {

                echo eldritch_edge_dynamic_css('.edgt-side-menu .widget', array(
                    'border-bottom:' => '1px solid ' . eldritch_edge_options()->getOptionValue('side_area_bottom_border_color'),
                    'margin-bottom:' => '10px',
                    'padding-bottom:' => '10px',
                ));

            }

        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_side_area_border_styles');

}