<?php

if(!function_exists('eldritch_edge_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function eldritch_edge_header_top_bar_styles() {
        global $eldritch_options;

        if($eldritch_options['top_bar_height'] !== '') {
            echo eldritch_edge_dynamic_css('.edgt-top-bar .edgt-logo-wrapper a', array('max-height' => $eldritch_options['top_bar_height'].'px'));
        }

        echo eldritch_edge_dynamic_css('.edgt-top-bar-background', array('height' => eldritch_edge_get_top_bar_background_height().'px'));

        if($eldritch_options['top_bar_in_grid'] == 'yes') {
            $top_bar_grid_selector = '.edgt-top-bar .edgt-grid .edgt-vertical-align-containers';
            $top_bar_grid_styles   = array();
            if($eldritch_options['top_bar_grid_background_color'] !== '') {
                $grid_background_color        = $eldritch_options['top_bar_grid_background_color'];
                $grid_background_transparency = 1;

                if(eldritch_edge_options()->getOptionValue('top_bar_grid_background_transparency')) {
                    $grid_background_transparency = eldritch_edge_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color                   = eldritch_edge_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo eldritch_edge_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = eldritch_edge_options()->getOptionValue('top_bar_background_color');
        $border_color     = eldritch_edge_options()->getOptionValue('top_bar_border_color');
        $top_bar_styles   = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(eldritch_edge_options()->getOptionValue('top_bar_background_transparency') !== '') {
                $background_transparency = eldritch_edge_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color                   = eldritch_edge_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;

            echo eldritch_edge_dynamic_css('.edgt-top-bar-background', array('background-color'=>$background_color));
        }

        if(eldritch_edge_options()->getOptionValue('top_bar_border') == 'yes' && $border_color != '') {
            $top_bar_styles['border-bottom'] = '1px solid '.$border_color;
        }

        echo eldritch_edge_dynamic_css('.edgt-top-bar', $top_bar_styles);
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_header_top_bar_styles');
}

if(!function_exists('eldritch_edge_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function eldritch_edge_header_standard_menu_area_styles() {
        global $eldritch_options;

        $menu_area_header_standard_styles = array();

        if($eldritch_options['menu_area_background_color_header_standard'] !== '') {
            $menu_area_background_color        = $eldritch_options['menu_area_background_color_header_standard'];
            $menu_area_background_transparency = 1;

            if($eldritch_options['menu_area_background_transparency_header_standard'] !== '') {
                $menu_area_background_transparency = $eldritch_options['menu_area_background_transparency_header_standard'];
            }

            $menu_area_header_standard_styles['background-color'] = eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($eldritch_options['menu_area_height_header_standard'] !== '') {
            $max_height = intval(eldritch_edge_filter_px($eldritch_options['menu_area_height_header_standard']) * 0.9).'px';
            echo eldritch_edge_dynamic_css('.edgt-header-standard .edgt-page-header .edgt-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = eldritch_edge_filter_px($eldritch_options['menu_area_height_header_standard']).'px';

        }

        echo eldritch_edge_dynamic_css('.edgt-header-standard .edgt-page-header .edgt-menu-area', $menu_area_header_standard_styles);

        $menu_area_grid_header_standard_styles = array();

        if($eldritch_options['menu_area_in_grid_header_standard'] == 'yes' && $eldritch_options['menu_area_grid_background_color_header_standard'] !== '') {
            $menu_area_grid_background_color        = $eldritch_options['menu_area_grid_background_color_header_standard'];
            $menu_area_grid_background_transparency = 1;

            if($eldritch_options['menu_area_grid_background_transparency_header_standard'] !== '') {
                $menu_area_grid_background_transparency = $eldritch_options['menu_area_grid_background_transparency_header_standard'];
            }

            $menu_area_grid_header_standard_styles['background-color'] = eldritch_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo eldritch_edge_dynamic_css('.edgt-header-standard .edgt-page-header .edgt-menu-area .edgt-grid .edgt-vertical-align-containers', $menu_area_grid_header_standard_styles);
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_header_standard_menu_area_styles');
}

if(!function_exists('eldritch_edge_header_minimal_menu_area_styles')) {
    /**
     * Generates styles for header minimal menu
     */
    function eldritch_edge_header_minimal_menu_area_styles() {
        global $eldritch_options;

        $menu_area_header_minimal_styles = array();

        if($eldritch_options['menu_area_background_color_header_minimal'] !== '') {
            $menu_area_background_color        = $eldritch_options['menu_area_background_color_header_minimal'];
            $menu_area_background_transparency = 1;

            if($eldritch_options['menu_area_background_transparency_header_minimal'] !== '') {
                $menu_area_background_transparency = $eldritch_options['menu_area_background_transparency_header_minimal'];
            }

            $menu_area_header_minimal_styles['background-color'] = eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($eldritch_options['menu_area_height_header_minimal'] !== '') {
            $max_height = intval(eldritch_edge_filter_px($eldritch_options['menu_area_height_header_minimal']) * 0.9).'px';
            echo eldritch_edge_dynamic_css('.edgt-header-minimal .edgt-page-header .edgt-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_minimal_styles['height'] = eldritch_edge_filter_px($eldritch_options['menu_area_height_header_minimal']).'px';

        }

        echo eldritch_edge_dynamic_css('.edgt-header-minimal .edgt-page-header .edgt-menu-area', $menu_area_header_minimal_styles);

        $menu_area_grid_header_minimal_styles = array();

        if($eldritch_options['menu_area_in_grid_header_minimal'] == 'yes' && $eldritch_options['menu_area_grid_background_color_header_minimal'] !== '') {
            $menu_area_grid_background_color        = $eldritch_options['menu_area_grid_background_color_header_minimal'];
            $menu_area_grid_background_transparency = 1;

            if($eldritch_options['menu_area_grid_background_transparency_header_minimal'] !== '') {
                $menu_area_grid_background_transparency = $eldritch_options['menu_area_grid_background_transparency_header_minimal'];
            }

            $menu_area_grid_header_minimal_styles['background-color'] = eldritch_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo eldritch_edge_dynamic_css('.edgt-header-minimal .edgt-page-header .edgt-menu-area .edgt-grid .edgt-vertical-align-containers', $menu_area_grid_header_minimal_styles);
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_header_minimal_menu_area_styles');
}

if(!function_exists('eldritch_edge_header_centered_logo_area_styles')) {
    /**
     * Generates styles for header centered menu
     */
    function eldritch_edge_header_centered_logo_area_styles() {
        global $eldritch_options;

        $logo_area_header_centered_styles = array();

        if($eldritch_options['logo_area_background_color_header_centered'] !== '') {
            $logo_area_background_color        = $eldritch_options['logo_area_background_color_header_centered'];
            $logo_area_background_transparency = 1;

            if($eldritch_options['logo_area_background_transparency_header_centered'] !== '') {
                $logo_area_background_transparency = $eldritch_options['logo_area_background_transparency_header_centered'];
            }

            $logo_area_header_centered_styles['background-color'] = eldritch_edge_rgba_color($logo_area_background_color, $logo_area_background_transparency);
        }

        if(eldritch_edge_options()->getOptionValue('logo_area_border_header_centered') == 'yes' &&
            eldritch_edge_options()->getOptionValue('logo_area_border_color_header_centered') !== ''
        ) {

            $logo_area_header_centered_styles['border-bottom'] = '1px solid '.eldritch_edge_options()->getOptionValue('logo_area_border_color_header_centered');
        }

        if($eldritch_options['logo_area_height_header_centered'] !== '') {
            $max_height = intval(eldritch_edge_filter_px($eldritch_options['logo_area_height_header_centered']) * 0.9).'px';
            echo eldritch_edge_dynamic_css('.edgt-header-centered .edgt-page-header .edgt-logo-area .edgt-logo-wrapper a', array('max-height' => $max_height));

            $logo_area_header_centered_styles['height'] = eldritch_edge_filter_px($eldritch_options['logo_area_height_header_centered']).'px';

        }

        echo eldritch_edge_dynamic_css('.edgt-header-centered .edgt-page-header .edgt-logo-area', $logo_area_header_centered_styles);

        $logo_area_grid_header_centered_styles = array();

        if($eldritch_options['logo_area_in_grid_header_centered'] == 'yes' && $eldritch_options['logo_area_grid_background_color_header_centered'] !== '') {
            $logo_area_grid_background_color        = $eldritch_options['logo_area_grid_background_color_header_centered'];
            $logo_area_grid_background_transparency = 1;

            if($eldritch_options['logo_area_grid_background_transparency_header_centered'] !== '') {
                $logo_area_grid_background_transparency = $eldritch_options['logo_area_grid_background_transparency_header_centered'];
            }

            $logo_area_grid_header_centered_styles['background-color'] = eldritch_edge_rgba_color($logo_area_grid_background_color, $logo_area_grid_background_transparency);
        }

        if(eldritch_edge_options()->getOptionValue('logo_area_in_grid_border_header_centered') == 'yes' &&
            eldritch_edge_options()->getOptionValue('logo_area_in_grid_border_color_header_centered') !== ''
        ) {

            $logo_area_grid_header_centered_styles['border-bottom'] = '1px solid '.eldritch_edge_options()->getOptionValue('logo_area_in_grid_border_color_header_centered');

        } else if(eldritch_edge_options()->getOptionValue('logo_area_in_grid_border_header_centered') == 'no') {
            $logo_area_grid_header_centered_styles['border'] = '0';
        }

        echo eldritch_edge_dynamic_css('.edgt-header-centered .edgt-page-header .edgt-logo-area .edgt-grid .edgt-vertical-align-containers', $logo_area_grid_header_centered_styles);

        if(eldritch_edge_options()->getOptionValue('logo_wrapper_padding_header_centered') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-header-centered .edgt-logo-area .edgt-logo-wrapper', array('padding'=>eldritch_edge_options()->getOptionValue('logo_wrapper_padding_header_centered')));
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_header_centered_logo_area_styles');
}

if(!function_exists('eldritch_edge_header_centered_menu_area_styles')) {
    /**
     * Generates styles for header centered menu
     */
    function eldritch_edge_header_centered_menu_area_styles() {
        global $eldritch_options;

        $menu_area_header_centered_styles = array();

        if($eldritch_options['menu_area_background_color_header_centered'] !== '') {
            $menu_area_background_color        = $eldritch_options['menu_area_background_color_header_centered'];
            $menu_area_background_transparency = 1;

            if($eldritch_options['menu_area_background_transparency_header_centered'] !== '') {
                $menu_area_background_transparency = $eldritch_options['menu_area_background_transparency_header_centered'];
            }

            $menu_area_header_centered_styles['background-color'] = eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if(eldritch_edge_options()->getOptionValue('menu_area_border_header_centered') == 'yes' &&
            eldritch_edge_options()->getOptionValue('menu_area_border_color_header_centered') !== ''
        ) {

            $menu_area_header_centered_styles['border-bottom'] = '1px solid '.eldritch_edge_options()->getOptionValue('menu_area_border_color_header_centered');
        }

        if($eldritch_options['menu_area_height_header_centered'] !== '') {

            $menu_area_header_centered_styles['height'] = eldritch_edge_filter_px($eldritch_options['menu_area_height_header_centered']).'px';

        }

        echo eldritch_edge_dynamic_css('.edgt-header-centered .edgt-page-header .edgt-menu-area', $menu_area_header_centered_styles);

        $menu_area_grid_header_centered_styles = array();

        if($eldritch_options['menu_area_in_grid_header_centered'] == 'yes' && $eldritch_options['menu_area_grid_background_color_header_centered'] !== '') {
            $menu_area_grid_background_color        = $eldritch_options['menu_area_grid_background_color_header_centered'];
            $menu_area_grid_background_transparency = 1;

            if($eldritch_options['menu_area_grid_background_transparency_header_centered'] !== '') {
                $menu_area_grid_background_transparency = $eldritch_options['menu_area_grid_background_transparency_header_centered'];
            }

            $menu_area_grid_header_centered_styles['background-color'] = eldritch_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        if(eldritch_edge_options()->getOptionValue('menu_area_in_grid_border_header_centered') == 'yes' &&
            eldritch_edge_options()->getOptionValue('menu_area_in_grid_border_color_header_centered') !== ''
        ) {

            $menu_area_grid_header_centered_styles['border-bottom'] = '1px solid '.eldritch_edge_options()->getOptionValue('menu_area_in_grid_border_color_header_centered');

        } else if(eldritch_edge_options()->getOptionValue('menu_area_in_grid_border_header_centered') == 'no') {
            $menu_area_grid_header_centered_styles['border'] = '0';
        }

        echo eldritch_edge_dynamic_css('.edgt-header-centered .edgt-page-header .edgt-menu-area .edgt-grid .edgt-vertical-align-containers', $menu_area_grid_header_centered_styles);
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_header_centered_menu_area_styles');
}

if(!function_exists('eldritch_edge_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function eldritch_edge_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.edgt-header-vertical .edgt-vertical-area-background'
        );

        if(eldritch_edge_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = eldritch_edge_options()->getOptionValue('vertical_header_background_color');
        }

        if(eldritch_edge_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.eldritch_edge_options()->getOptionValue('vertical_header_background_image').')';
        }


        echo eldritch_edge_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_vertical_menu_styles');
}


if(!function_exists('eldritch_edge_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function eldritch_edge_sticky_header_styles() {
        global $eldritch_options;

        if($eldritch_options['sticky_header_in_grid'] == 'yes' && $eldritch_options['sticky_header_grid_background_color'] !== '') {
            $sticky_header_grid_background_color        = $eldritch_options['sticky_header_grid_background_color'];
            $sticky_header_grid_background_transparency = 1;

            if($eldritch_options['sticky_header_grid_transparency'] !== '') {
                $sticky_header_grid_background_transparency = $eldritch_options['sticky_header_grid_transparency'];
            }

            echo eldritch_edge_dynamic_css('.edgt-page-header .edgt-sticky-header .edgt-grid .edgt-vertical-align-containers', array('background-color' => eldritch_edge_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if($eldritch_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $eldritch_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($eldritch_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $eldritch_options['sticky_header_transparency'];
            }

            echo eldritch_edge_dynamic_css('.edgt-page-header .edgt-sticky-header .edgt-sticky-holder', array('background-color' => eldritch_edge_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($eldritch_options['sticky_header_height'] !== '') {
            $max_height = intval(eldritch_edge_filter_px($eldritch_options['sticky_header_height']) * 0.9).'px';

            echo eldritch_edge_dynamic_css('.edgt-page-header .edgt-sticky-header', array('height' => $eldritch_options['sticky_header_height'].'px'));
            echo eldritch_edge_dynamic_css('.edgt-page-header .edgt-sticky-header .edgt-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($eldritch_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $eldritch_options['sticky_color'];
        }
        if($eldritch_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = eldritch_edge_get_formatted_font_family($eldritch_options['sticky_google_fonts']);
        }
        if($eldritch_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $eldritch_options['sticky_fontsize'].'px';
        }
        if($eldritch_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $eldritch_options['sticky_lineheight'].'px';
        }
        if($eldritch_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $eldritch_options['sticky_texttransform'];
        }
        if($eldritch_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $eldritch_options['sticky_fontstyle'];
        }
        if($eldritch_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $eldritch_options['sticky_fontweight'];
        }
        if($eldritch_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $eldritch_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.edgt-page-header .edgt-sticky-header .edgt-main-menu > ul > li > a',
            '.edgt-page-header .edgt-sticky-header .edgt-main-menu > ul > li.edgt-active-item > a',
            '.edgt-page-header .edgt-sticky-header .edgt-main-menu > ul > li:hover > a',
        );

        $sticky_header_header_buttons_selsectors = array(
            '.edgt-page-header .edgt-sticky-header .edgt-side-menu-button-opener',
            '.edgt-page-header .edgt-sticky-header .edgt-search-opener',
            '.edgt-page-header .edgt-sticky-header .edgt-side-menu-button-opener:hover',
            '.edgt-page-header .edgt-sticky-header .edgt-search-opener:hover'
        );

        echo eldritch_edge_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);
        if($eldritch_options['sticky_color'] !== '') {
            echo eldritch_edge_dynamic_css($sticky_header_header_buttons_selsectors, array('color' => $sticky_menu_item_styles['color']));
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_sticky_header_styles');
}

if(!function_exists('eldritch_edge_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function eldritch_edge_fixed_header_styles() {
        global $eldritch_options;

        if($eldritch_options['fixed_header_grid_background_color'] !== '') {

            $fixed_header_grid_background_color              = $eldritch_options['fixed_header_grid_background_color'];
            $fixed_header_grid_background_color_transparency = 1;

            if($eldritch_options['fixed_header_grid_transparency'] !== '') {
                $fixed_header_grid_background_color_transparency = $eldritch_options['fixed_header_grid_transparency'];
            }

            echo eldritch_edge_dynamic_css('.edgt-header-type1 .edgt-fixed-wrapper.fixed .edgt-grid .edgt-vertical-align-containers,
                                    .edgt-header-type3 .edgt-fixed-wrapper.fixed .edgt-grid .edgt-vertical-align-containers',
                array('background-color' => eldritch_edge_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if($eldritch_options['fixed_header_background_color'] !== '') {

            $fixed_header_background_color              = $eldritch_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($eldritch_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $eldritch_options['fixed_header_transparency'];
            }

            echo eldritch_edge_dynamic_css('.edgt-header-type1 .edgt-fixed-wrapper.fixed .edgt-menu-area,
                                    .edgt-header-type3 .edgt-fixed-wrapper.fixed .edgt-menu-area',
                array('background-color' => eldritch_edge_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fixed_header_styles');
}

if(!function_exists('eldritch_edge_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function eldritch_edge_main_menu_styles() {
        global $eldritch_options;

        if($eldritch_options['menu_color'] !== '' || $eldritch_options['menu_fontsize'] != '' || $eldritch_options['menu_fontstyle'] !== '' || $eldritch_options['menu_fontweight'] !== '' || $eldritch_options['menu_texttransform'] !== '' || $eldritch_options['menu_letterspacing'] !== '' || $eldritch_options['menu_google_fonts'] != "-1") { ?>
            .edgt-main-menu.edgt-default-nav > ul > li > a,
            .edgt-page-header #lang_sel > ul > li > a,
            .edgt-page-header #lang_sel_click > ul > li > a,
            .edgt-page-header #lang_sel ul > li:hover > a{
            <?php if($eldritch_options['menu_color']) { ?> color: <?php echo esc_attr($eldritch_options['menu_color']); ?>; <?php } ?>
            <?php if($eldritch_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $eldritch_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($eldritch_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($eldritch_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($eldritch_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($eldritch_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($eldritch_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($eldritch_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($eldritch_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($eldritch_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($eldritch_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($eldritch_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($eldritch_options['menu_google_fonts'] != "-1") { ?>
            .edgt-page-header #lang_sel_list{
            font-family: '<?php echo esc_attr(str_replace('+', ' ', $eldritch_options['menu_google_fonts'])); ?>', sans-serif !important;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_hovercolor'] !== '') { ?>
            .edgt-main-menu.edgt-default-nav > ul > li:hover > a,
            .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item:hover > a,
            body:not(.edgt-menu-item-first-level-bg-color) .edgt-main-menu.edgt-default-nav > ul > li:hover > a,
            body:not(.edgt-menu-item-first-level-bg-color) .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item:hover > a,
            .edgt-page-header #lang_sel ul li a:hover,
            .edgt-page-header #lang_sel_click > ul > li a:hover{
            color: <?php echo esc_attr($eldritch_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_activecolor'] !== '') { ?>
            .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item > a,
            body:not(.edgt-menu-item-first-level-bg-color) .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item > a{
            color: <?php echo esc_attr($eldritch_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_text_background_color'] !== '') { ?>
            .edgt-main-menu.edgt-default-nav > ul > li > a span.item_inner,
            .edgt-page-header #lang_sel .lang_sel_sel,
            .edgt-top-bar #lang_sel .lang_sel_sel{
            background-color: <?php echo esc_attr($eldritch_options['menu_text_background_color']); ?>;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_hover_background_color'] !== '') {
            $menu_hover_background_color = $eldritch_options['menu_hover_background_color'];

            if($eldritch_options['menu_hover_background_color_transparency'] !== '') {
                $menu_hover_background_color_rgb = eldritch_edge_hex2rgb($menu_hover_background_color);
                $menu_hover_background_color     = 'rgba('.$menu_hover_background_color_rgb[0].', '.$menu_hover_background_color_rgb[1].', '.$menu_hover_background_color_rgb[2].', '.$eldritch_options['menu_hover_background_color_transparency'].')';
            } ?>

            .edgt-main-menu.edgt-default-nav > ul > li:hover > a span.item_inner,
            .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item:hover > a span.item_inner,
            .edgt-page-header #lang_sel li:hover .lang_sel_sel {
            background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_active_background_color'] !== '') {
            $menu_active_background_color = $eldritch_options['menu_active_background_color'];

            if($eldritch_options['menu_active_background_color_transparency'] !== '') {
                $menu_active_background_color_rgb = eldritch_edge_hex2rgb($menu_active_background_color);
                $menu_active_background_color     = 'rgba('.$menu_active_background_color_rgb[0].', '.$menu_active_background_color_rgb[1].', '.$menu_active_background_color_rgb[2].', '.$eldritch_options['menu_active_background_color_transparency'].')';
            }
            ?>
            .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item > a span.item_inner {
            background-color: <?php echo esc_attr($menu_active_background_color); ?>;
            }
        <?php } ?>


        <?php if($eldritch_options['menu_light_hovercolor'] !== '') { ?>
            .light .edgt-main-menu.edgt-default-nav > ul > li:hover > a,
            .light .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item:hover > a{
            color: <?php echo esc_attr($eldritch_options['menu_light_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_light_activecolor'] !== '') { ?>
            .light .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item > a{
            color: <?php echo esc_attr($eldritch_options['menu_light_activecolor']); ?> !important;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_dark_hovercolor'] !== '') { ?>
            .dark .edgt-main-menu.edgt-default-nav > ul > li:hover > a,
            .dark .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item:hover > a{
            color: <?php echo esc_attr($eldritch_options['menu_dark_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_dark_activecolor'] !== '') { ?>
            .dark .edgt-main-menu.edgt-default-nav > ul > li.edgt-active-item > a{
            color: <?php echo esc_attr($eldritch_options['menu_dark_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($eldritch_options['menu_lineheight'] != "" || $eldritch_options['menu_padding_left_right'] !== '') { ?>
            .edgt-main-menu.edgt-default-nav > ul > li > a span.item_inner{
            <?php if($eldritch_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($eldritch_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($eldritch_options['menu_padding_left_right']) { ?> padding: 0  <?php echo esc_attr($eldritch_options['menu_padding_left_right']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($eldritch_options['menu_margin_left_right'] !== '') { ?>
            .edgt-main-menu.edgt-default-nav > ul > li{
            margin: 0  <?php echo esc_attr($eldritch_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php
        $dropdown_styles = array();
        if($eldritch_options['dropdown_background_color'] != "" || $eldritch_options['dropdown_background_transparency'] != "" ) {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#fff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = $eldritch_options['dropdown_background_color'] !== "" ? $eldritch_options['dropdown_background_color'] : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = $eldritch_options['dropdown_background_transparency'] !== "" ? $eldritch_options['dropdown_background_transparency'] : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = eldritch_edge_hex2rgb($dropdown_bg_color);

            $dropdown_styles['background-color'] = 'rgba('.$dropdown_bg_color_rgb[0].','.$dropdown_bg_color_rgb[1].','.$dropdown_bg_color_rgb[2].','.$dropdown_bg_transparency.')';

        } //end dropdown background and transparency styles

        if($eldritch_options['dropdown_background_image'] != "") {
            $dropdown_styles['background-image'] = 'url('.eldritch_edge_options()->getOptionValue('dropdown_background_image').')';
        }

        $dropdown_selector = array(
            '.edgt-full-width-wide-menu .edgt-drop-down .wide .second',
            '.edgt-drop-down .second .inner > ul',
            '.edgt-drop-down .second .inner ul li ul',
            '.edgt-drop-down li.narrow .second .inner ul',
            '.shopping_cart_dropdown',
            '.edgt-page-header #lang_sel ul ul',
            '.edgt-top-bar #lang_sel ul ul',
            '.edgt-drop-down .wide.wide_background .second'
        );

        echo eldritch_edge_dynamic_css($dropdown_selector, $dropdown_styles);


        ?>

        <?php
        if($eldritch_options['dropdown_top_padding'] !== '') {

            if($eldritch_options['dropdown_top_padding'] !== '') {
                ?>
                li.narrow .second .inner ul,
                .edgt-drop-down .wide .second .inner > ul{
                padding-top: <?php echo esc_attr($eldritch_options['dropdown_top_padding']); ?>px;
                }
            <?php } ?>
        <?php } ?>

        <?php if($eldritch_options['dropdown_bottom_padding'] !== '') { ?>
            li.narrow .second .inner ul,
            .edgt-drop-down .wide .second .inner > ul{
            padding-bottom: <?php echo esc_attr($eldritch_options['dropdown_bottom_padding']); ?>px;
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_top_position'] !== '') { ?>
            header .edgt-drop-down .second {
            top: <?php echo esc_attr($eldritch_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_color'] !== '' || $eldritch_options['dropdown_fontsize'] !== '' || $eldritch_options['dropdown_lineheight'] !== '' || $eldritch_options['dropdown_fontstyle'] !== '' || $eldritch_options['dropdown_fontweight'] !== '' || $eldritch_options['dropdown_google_fonts'] != "-1" || $eldritch_options['dropdown_texttransform'] !== '' || $eldritch_options['dropdown_letterspacing'] !== '') { ?>
            .edgt-drop-down .second .inner > ul > li > a,
            .edgt-drop-down .second .inner > ul > li > h4,
            .edgt-main-menu.edgt-default-nav #lang_sel ul li li a,
            .edgt-main-menu.edgt-default-nav #lang_sel_click ul li ul li a,
            .edgt-main-menu.edgt-default-nav #lang_sel ul ul a,
            .edgt-main-menu.edgt-default-nav #lang_sel_click ul ul a{
            <?php if(!empty($eldritch_options['dropdown_color'])) { ?> color: <?php echo esc_attr($eldritch_options['dropdown_color']); ?>; <?php } ?>
            <?php if($eldritch_options['dropdown_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $eldritch_options['dropdown_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($eldritch_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($eldritch_options['dropdown_fontsize']); ?>px; <?php } ?>
            <?php if($eldritch_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($eldritch_options['dropdown_lineheight']); ?>px; <?php } ?>
            <?php if($eldritch_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($eldritch_options['dropdown_fontstyle']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($eldritch_options['dropdown_fontweight']); ?>; <?php } ?>
            <?php if($eldritch_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($eldritch_options['dropdown_texttransform']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($eldritch_options['dropdown_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_color'] !== '') { ?>
            .shopping_cart_dropdown ul li
            .item_info_holder .item_left a,
            .shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount{
            color: <?php echo esc_attr($eldritch_options['dropdown_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($eldritch_options['dropdown_hovercolor'])) { ?>
            .edgt-drop-down .narrow .second .inner > ul > li:hover > a,
            .edgt-main-menu.edgt-default-nav #lang_sel ul li li:hover a,
            .edgt-main-menu.edgt-default-nav #lang_sel_click ul li ul li:hover a,
            .edgt-main-menu.edgt-default-nav #lang_sel ul li:hover > a,
            .edgt-main-menu.edgt-default-nav #lang_sel_click ul li:hover > a{
            color: <?php echo esc_attr($eldritch_options['dropdown_hovercolor']); ?> !important;
            }

            .edgt-drop-down .narrow .second .inner > ul > li > a .item_text:after{
                background-color: <?php echo esc_attr($eldritch_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($eldritch_options['dropdown_background_hovercolor'])) { ?>
            .edgt-drop-down li:not(.wide) .second .inner > ul > li:hover{
            background-color: <?php echo esc_attr($eldritch_options['dropdown_background_hovercolor']); ?>;
            }
        <?php } ?>

        <?php if(!empty($eldritch_options['dropdown_padding_top_bottom'])) { ?>
            .edgt-drop-down .wide .second>.inner>ul>li.sub>ul>li>a,
            .edgt-drop-down .second .inner ul li a,
            .edgt-drop-down .wide .second ul li a,
            .edgt-drop-down .second .inner ul.right li a{
            padding-top: <?php echo esc_attr($eldritch_options['dropdown_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($eldritch_options['dropdown_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_wide_color'] !== '' || $eldritch_options['dropdown_wide_fontsize'] !== '' || $eldritch_options['dropdown_wide_lineheight'] !== '' || $eldritch_options['dropdown_wide_fontstyle'] !== '' || $eldritch_options['dropdown_wide_fontweight'] !== '' || $eldritch_options['dropdown_wide_google_fonts'] !== "-1" || $eldritch_options['dropdown_wide_texttransform'] !== '' || $eldritch_options['dropdown_wide_letterspacing'] !== '') { ?>
            .edgt-drop-down .wide .second .inner > ul > li > a{
            <?php if($eldritch_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($eldritch_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($eldritch_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $eldritch_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($eldritch_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($eldritch_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($eldritch_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($eldritch_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($eldritch_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($eldritch_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($eldritch_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($eldritch_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($eldritch_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($eldritch_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_wide_hovercolor'] !== '') { ?>
            .edgt-drop-down .wide .second .inner > ul > li:hover > a {
            color: <?php echo esc_attr($eldritch_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($eldritch_options['dropdown_wide_background_hovercolor'])) { ?>
            .edgt-drop-down .wide .second .inner > ul > li:hover > a{
            background-color: <?php echo esc_attr($eldritch_options['dropdown_wide_background_hovercolor']); ?>
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_wide_padding_top_bottom'] !== '') { ?>
            .edgt-drop-down .wide .second>.inner > ul > li.sub > ul > li > a,
            .edgt-drop-down .wide .second .inner ul li a,
            .edgt-drop-down .wide .second ul li a,
            .edgt-drop-down .wide .second .inner ul.right li a{
            padding-top: <?php echo esc_attr($eldritch_options['dropdown_wide_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($eldritch_options['dropdown_wide_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_color_thirdlvl'] !== '' || $eldritch_options['dropdown_fontsize_thirdlvl'] !== '' || $eldritch_options['dropdown_lineheight_thirdlvl'] !== '' || $eldritch_options['dropdown_fontstyle_thirdlvl'] !== '' || $eldritch_options['dropdown_fontweight_thirdlvl'] !== '' || $eldritch_options['dropdown_google_fonts_thirdlvl'] != "-1" || $eldritch_options['dropdown_texttransform_thirdlvl'] !== '' || $eldritch_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .edgt-drop-down .narrow .second .inner ul li.sub ul li a{
            <?php if($eldritch_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($eldritch_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $eldritch_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($eldritch_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($eldritch_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($eldritch_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($eldritch_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($eldritch_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($eldritch_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($eldritch_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($eldritch_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($eldritch_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($eldritch_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($eldritch_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .edgt-drop-down .narrow .second .inner ul li.sub ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
            .edgt-drop-down .narrow .second .inner ul li ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next){
                color: <?php echo esc_attr($eldritch_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }

            .edgt-drop-down .narrow .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next) .item_text:after{
                background-color: <?php echo esc_attr($eldritch_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_background_hovercolor_thirdlvl'] !== '') { ?>
            .edgt-drop-down .narrow .second .inner ul li.sub ul li:hover,
            .edgt-drop-down .narrow .second .inner ul li ul li:hover{
            background-color: <?php echo esc_attr($eldritch_options['dropdown_background_hovercolor_thirdlvl']); ?>;
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_wide_color_thirdlvl'] !== '' || $eldritch_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $eldritch_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $eldritch_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $eldritch_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $eldritch_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $eldritch_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $eldritch_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .edgt-drop-down .wide .second .inner ul li.sub ul li a,
            .edgt-drop-down .wide .second ul li ul li a{
            <?php if($eldritch_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($eldritch_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $eldritch_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($eldritch_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($eldritch_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($eldritch_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($eldritch_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($eldritch_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($eldritch_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($eldritch_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($eldritch_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($eldritch_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($eldritch_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .edgt-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
            .edgt-drop-down .wide .second .inner ul li ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover{
            color: <?php echo esc_attr($eldritch_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }

            .edgt-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next) .item_text:after{
                background-color: <?php echo esc_attr($eldritch_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($eldritch_options['dropdown_wide_background_hovercolor_thirdlvl'] !== '') { ?>
            .edgt-drop-down .wide .second .inner ul li.sub ul li:hover,
            .edgt-drop-down .wide .second .inner ul li ul li:hover{
            background-color: <?php echo esc_attr($eldritch_options['dropdown_wide_background_hovercolor_thirdlvl']); ?>;
            }
        <?php }
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_main_menu_styles');
}

if(!function_exists('eldritch_edge_vertical_main_menu_styles')) {
    /**
     * Generates styles for vertical main main menu
     */
    function eldritch_edge_vertical_main_menu_styles() {
        $dropdown_styles = array();

        if(eldritch_edge_options()->getOptionValue('vertical_dropdown_background_color') !== '' || eldritch_edge_options()->getOptionValue('vertical_dropdown_transparency') !== '') {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#fff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = eldritch_edge_options()->getOptionValue('vertical_dropdown_background_color') !== "" ? eldritch_edge_options()->getOptionValue('vertical_dropdown_background_color') : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = eldritch_edge_options()->getOptionValue('vertical_dropdown_transparency') !== "" ? eldritch_edge_options()->getOptionValue('vertical_dropdown_transparency') : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = eldritch_edge_hex2rgb($dropdown_bg_color);

            $dropdown_styles['background-color'] = 'rgba('.$dropdown_bg_color_rgb[0].','.$dropdown_bg_color_rgb[1].','.$dropdown_bg_color_rgb[2].','.$dropdown_bg_transparency.')';

        }

        if(eldritch_edge_options()->getOptionValue('vertical_dropdown_border_color') !== '') {
            $dropdown_styles['border-color'] = eldritch_edge_options()->getOptionValue('vertical_dropdown_border_color');
        }

        $dropdown_selector = array(
            '.edgt-header-vertical .edgt-vertical-dropdown-float .menu-item .second',
            '.edgt-header-vertical .edgt-vertical-dropdown-float .second .inner ul ul'
        );

        echo eldritch_edge_dynamic_css($dropdown_selector, $dropdown_styles);

        $fist_level_styles       = array();
        $fist_level_hover_styles = array();

        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_color') !== '') {
            $fist_level_styles['color'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_color');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
            $fist_level_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('vertical_menu_1st_google_fonts'));
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
            $fist_level_styles['font-size'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_fontsize').'px';
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
            $fist_level_styles['line-height'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_lineheight').'px';
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
            $fist_level_styles['text-transform'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_texttransform');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
            $fist_level_styles['font-style'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_fontstyle');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
            $fist_level_styles['font-weight'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_fontweight');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
            $fist_level_styles['letter-spacing'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_letter_spacing').'px';
        }

        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
            $fist_level_hover_styles['color'] = eldritch_edge_options()->getOptionValue('vertical_menu_1st_hover_color');
        }

        $first_level_selector       = array(
            '.edgt-header-vertical .edgt-vertical-menu > ul > li > a'
        );
        $first_level_hover_selector = array(
            '.edgt-header-vertical .edgt-vertical-menu > ul > li:hover > a',
            '.edgt-header-vertical .edgt-vertical-menu > ul > li > a.edgt-active-item'
        );

        echo eldritch_edge_dynamic_css($first_level_selector, $fist_level_styles);
        echo eldritch_edge_dynamic_css($first_level_hover_selector, $fist_level_hover_styles);
        if(eldritch_edge_options()->getOptionValue('vertical_menu_1st_hover_background_color') !== '') {

            $rgba = eldritch_edge_hex2rgb(eldritch_edge_options()->getOptionValue('vertical_menu_1st_hover_background_color'));
            echo eldritch_edge_dynamic_css('.edgt-header-vertical .edgt-vertical-menu > ul > li:hover', array('background-color' => 'rgba('.$rgba[0].','.$rgba[1].','.$rgba[2].',0.07)'));
        }

        $second_level_styles       = array();
        $second_level_hover_styles = array();

        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
            $second_level_styles['color'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_color');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
            $second_level_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
            $second_level_styles['font-size'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_fontsize').'px';
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
            $second_level_styles['line-height'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_lineheight').'px';
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
            $second_level_styles['text-transform'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_texttransform');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
            $second_level_styles['font-style'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_fontstyle');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
            $second_level_styles['font-weight'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_fontweight');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
            $second_level_styles['letter-spacing'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_letter_spacing').'px';
        }

        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
            $second_level_hover_styles['color'] = eldritch_edge_options()->getOptionValue('vertical_menu_2nd_hover_color');
        }

        $second_level_selector = array(
            '.edgt-header-vertical .edgt-vertical-menu .second .inner > ul > li > a'
        );

        $second_level_hover_selector = array(
            '.edgt-header-vertical .edgt-vertical-menu .second .inner > ul > li:hover > a',
            '.edgt-header-vertical .edgt-vertical-menu .second .inner > ul > li > a.edgt-active-item'
        );

        echo eldritch_edge_dynamic_css($second_level_selector, $second_level_styles);
        echo eldritch_edge_dynamic_css($second_level_hover_selector, $second_level_hover_styles);
        if(eldritch_edge_options()->getOptionValue('vertical_menu_2nd_hover_background_color') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-header-vertical .edgt-vertical-dropdown-float .second .inner > ul > li:hover', array('background-color' => eldritch_edge_options()->getOptionValue('vertical_menu_2nd_hover_background_color')));
        }

        $third_level_styles       = array();
        $third_level_hover_styles = array();

        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
            $third_level_styles['color'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_color');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
            $third_level_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
            $third_level_styles['font-size'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_fontsize').'px';
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
            $third_level_styles['line-height'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_lineheight').'px';
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
            $third_level_styles['text-transform'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_texttransform');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
            $third_level_styles['font-style'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_fontstyle');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
            $third_level_styles['font-weight'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_fontweight');
        }
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
            $third_level_styles['letter-spacing'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_letter_spacing').'px';
        }

        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
            $third_level_hover_styles['color'] = eldritch_edge_options()->getOptionValue('vertical_menu_3rd_hover_color');
        }

        $third_level_selector = array(
            '.edgt-header-vertical .edgt-vertical-menu .second .inner ul li ul li a'
        );

        $third_level_hover_selector = array(
            '.edgt-header-vertical .edgt-vertical-menu .second .inner ul li ul li:hover a',
            '.edgt-header-vertical .edgt-vertical-menu .second .inner ul li ul li a.edgt-active-item'
        );

        echo eldritch_edge_dynamic_css($third_level_selector, $third_level_styles);
        echo eldritch_edge_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
        if(eldritch_edge_options()->getOptionValue('vertical_menu_3rd_hover_background_color') !== '') {
            echo eldritch_edge_dynamic_css('.edgt-header-vertical .edgt-vertical-dropdown-float .second .inner ul li.sub ul li:hover', array('background-color' => eldritch_edge_options()->getOptionValue('vertical_menu_3rd_hover_background_color')));
        }
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_vertical_main_menu_styles');
}