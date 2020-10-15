<?php

if(!function_exists('eldritch_edge_bbpress_custom_styles')) {
    function eldritch_edge_bbpress_custom_styles() {
	    if(eldritch_edge_options()->getOptionValue('first_color') !== "") {
		    $color_selector = array(
                '.edgt-sidebar .bbp_widget_login button:hover'
		    );

		    $background_color_selector = array(
                '#bbpress-forums div.bbp-breadcrumb .bbp-breadcrumb-current',
                '#bbpress-forums div.bbp-breadcrumb .bbp-breadcrumb-home:hover',
                '#bbpress-forums .bbp-body>ul>li a:hover',
                '#bbpress-forums .forum-titles>li a:hover',
                '#bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness>a:hover',
                '#bbpress-forums li.bbp-body ul.forum li.bbp-topic-freshness>a:hover',
                '#bbpress-forums li.bbp-body ul.topic li.bbp-forum-freshness>a:hover',
                '#bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness>a:hover',
                '#bbpress-forums .bbp-topic-started-by .bbp-author-name',
                '#bbpress-forums .bbp-replies .bbp-body div.bbp-reply-author .bbp-author-name',
                '#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a',
                '#bbpress-forums #bbp-single-user-details #bbp-user-navigation li a:hover',
                '#bbpress-forums .bbp-topics ul.sticky:after',
                '.edgt-sidebar .widget.widget_display_replies ul li',
                '.edgt-sidebar .widget.widget_display_topics ul li',
                '.edgt-sidebar .widget_display_forums li a:after',
                '.edgt-sidebar .widget_display_views li a:after',
                '.edgt-sidebar .widget_display_forums li a:hover',
                '.edgt-sidebar .widget_display_views li a:hover'
            );

		    echo eldritch_edge_dynamic_css($color_selector, array('color' => eldritch_edge_options()->getOptionValue('first_color')));
		    echo eldritch_edge_dynamic_css('::selection', array('background' => eldritch_edge_options()->getOptionValue('first_color')));
		    echo eldritch_edge_dynamic_css('::-moz-selection', array('background' => eldritch_edge_options()->getOptionValue('first_color')));
		    echo eldritch_edge_dynamic_css($background_color_selector, array('background-color' => eldritch_edge_options()->getOptionValue('first_color')));
	    }
    }

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_bbpress_custom_styles');
}


if(!function_exists('eldritch_edge_bbpress_page_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function eldritch_edge_bbpress_page_styles() {

        $bbpress_page_styles = array();

        $bbpress_page_selectors = array(
                 '.bbpress .edgt-content .edgt-content-inner > .edgt-container',
                 '.bbpress .edgt-content .edgt-content-inner > .edgt-full-width',
                 '.bbpress .edgt-content',
        );

        if(eldritch_edge_options()->getOptionValue('bbpress_background_color') !== '') {
            $bbpress_page_styles['background-color'] = eldritch_edge_options()->getOptionValue('bbpress_background_color');
        }

        if(eldritch_edge_options()->getOptionValue('bbpress_background_image') !== '') {
            $bbpress_page_styles['background-image'] = 'url('.eldritch_edge_options()->getOptionValue('bbpress_background_image').')';
        }


        echo eldritch_edge_dynamic_css($bbpress_page_selectors, $bbpress_page_styles);
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_bbpress_page_styles');
}


if(!function_exists('eldritch_edge_bbpress_header_menu_area_styles')) {
    /**
     * Generates styles for header bbpress menu
     */
    function eldritch_edge_bbpress_header_menu_area_styles() {
        global $eldritch_options;

        $bbpress_menu_area_header_styles = array();
        $bbpress_menu_area_header_classes = '
        .bbpress .edgt-page-header .edgt-logo-area,
        .bbpress .edgt-page-header .edgt-menu-area
        ';

        if($eldritch_options['bbpress_menu_area_background_color_header'] !== '') {
            $menu_area_background_color        = $eldritch_options['bbpress_menu_area_background_color_header'];
            $menu_area_background_transparency = 1;

            if($eldritch_options['bbpress_menu_area_background_transparency_header'] !== '') {
                $menu_area_background_transparency = $eldritch_options['bbpress_menu_area_background_transparency_header'];
            }

            $bbpress_menu_area_header_styles['background-color'] = eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency) . '!important';
        }

        $menu_area_background_image = $eldritch_options['bbpress_menu_area_background_image_header'];

        if ($menu_area_background_image !== '') {
            $bbpress_menu_area_header_styles['background-image'] = 'url(' . $menu_area_background_image . ') !important';
        }
        
        echo eldritch_edge_dynamic_css($bbpress_menu_area_header_classes, $bbpress_menu_area_header_styles);



    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_bbpress_header_menu_area_styles');
}

