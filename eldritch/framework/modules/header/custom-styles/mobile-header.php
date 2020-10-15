<?php

if(!function_exists('eldritch_edge_mobile_header_general_styles')) {
	/**
	 * Generates general custom styles for mobile header
	 */
	function eldritch_edge_mobile_header_general_styles() {
		$mobile_header_styles = array();
		if(eldritch_edge_options()->getOptionValue('mobile_header_height') !== '') {
			$mobile_header_styles['height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_header_height')).'px';
		}

		if(eldritch_edge_options()->getOptionValue('mobile_header_background_color')) {
			$mobile_header_styles['background-color'] = eldritch_edge_options()->getOptionValue('mobile_header_background_color');
		}

		echo eldritch_edge_dynamic_css('.edgt-mobile-header .edgt-mobile-header-inner', $mobile_header_styles);
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_mobile_header_general_styles');
}

if(!function_exists('eldritch_edge_mobile_navigation_styles')) {
	/**
	 * Generates styles for mobile navigation
	 */
	function eldritch_edge_mobile_navigation_styles() {
		$mobile_nav_styles = array();
		if(eldritch_edge_options()->getOptionValue('mobile_menu_background_color')) {
			$mobile_nav_styles['background-color'] = eldritch_edge_options()->getOptionValue('mobile_menu_background_color');
		}

		echo eldritch_edge_dynamic_css('.edgt-mobile-header .edgt-mobile-nav', $mobile_nav_styles);

		$mobile_nav_item_styles = array();
		if(eldritch_edge_options()->getOptionValue('mobile_menu_separator_color') !== '') {
			$mobile_nav_item_styles['border-bottom-color'] = eldritch_edge_options()->getOptionValue('mobile_menu_separator_color');
		}

		if(eldritch_edge_options()->getOptionValue('mobile_text_color') !== '') {
			$mobile_nav_item_styles['color'] = eldritch_edge_options()->getOptionValue('mobile_text_color');
		}

		if(eldritch_edge_is_font_option_valid(eldritch_edge_options()->getOptionValue('mobile_font_family'))) {
			$mobile_nav_item_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('mobile_font_family'));
		}

		if(eldritch_edge_options()->getOptionValue('mobile_font_size') !== '') {
			$mobile_nav_item_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_font_size')).'px';
		}

		if(eldritch_edge_options()->getOptionValue('mobile_line_height') !== '') {
			$mobile_nav_item_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_line_height')).'px';
		}

		if(eldritch_edge_options()->getOptionValue('mobile_text_transform') !== '') {
			$mobile_nav_item_styles['text-transform'] = eldritch_edge_options()->getOptionValue('mobile_text_transform');
		}

		if(eldritch_edge_options()->getOptionValue('mobile_font_style') !== '') {
			$mobile_nav_item_styles['font-style'] = eldritch_edge_options()->getOptionValue('mobile_font_style');
		}

		if(eldritch_edge_options()->getOptionValue('mobile_font_weight') !== '') {
			$mobile_nav_item_styles['font-weight'] = eldritch_edge_options()->getOptionValue('mobile_font_weight');
		}

		$mobile_nav_item_selector = array(
			'.edgt-mobile-header .edgt-mobile-nav a',
			'.edgt-mobile-header .edgt-mobile-nav h4'
		);

		echo eldritch_edge_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

		$mobile_nav_item_hover_styles = array();
		if(eldritch_edge_options()->getOptionValue('mobile_text_hover_color') !== '') {
			$mobile_nav_item_hover_styles['color'] = eldritch_edge_options()->getOptionValue('mobile_text_hover_color');
		}

		$mobile_nav_item_selector_hover = array(
			'.edgt-mobile-header .edgt-mobile-nav a:hover',
			'.edgt-mobile-header .edgt-mobile-nav h4:hover'
		);

		echo eldritch_edge_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_mobile_navigation_styles');
}

if(!function_exists('eldritch_edge_mobile_logo_styles')) {
	/**
	 * Generates styles for mobile logo
	 */
	function eldritch_edge_mobile_logo_styles() {
		if(eldritch_edge_options()->getOptionValue('mobile_logo_height') !== '') { ?>
			@media only screen and (max-width: 1000px) {
			<?php echo eldritch_edge_dynamic_css(
				'.edgt-mobile-header .edgt-mobile-logo-wrapper a',
				array('height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_logo_height')).'px !important')
			); ?>
			}
		<?php }

		if(eldritch_edge_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
			@media only screen and (max-width: 480px) {
			<?php echo eldritch_edge_dynamic_css(
				'.edgt-mobile-header .edgt-mobile-logo-wrapper a',
				array('height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
			); ?>
			}
		<?php }

		if(eldritch_edge_options()->getOptionValue('mobile_header_height') !== '') {
			$max_height = intval(eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
			echo eldritch_edge_dynamic_css('.edgt-mobile-header .edgt-mobile-logo-wrapper a', array('max-height' => $max_height));
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_mobile_logo_styles');
}

if(!function_exists('eldritch_edge_mobile_icon_styles')) {
	/**
	 * Generates styles for mobile icon opener
	 */
	function eldritch_edge_mobile_icon_styles() {
		$mobile_icon_styles = array();
		if(eldritch_edge_options()->getOptionValue('mobile_icon_color') !== '') {
			$mobile_icon_styles['color'] = eldritch_edge_options()->getOptionValue('mobile_icon_color');
		}

		if(eldritch_edge_options()->getOptionValue('mobile_icon_size') !== '') {
			$mobile_icon_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_icon_size')).'px';
		}

		echo eldritch_edge_dynamic_css('.edgt-mobile-header .edgt-mobile-menu-opener a', $mobile_icon_styles);

		if(eldritch_edge_options()->getOptionValue('mobile_icon_hover_color') !== '') {
			echo eldritch_edge_dynamic_css(
				'.edgt-mobile-header .edgt-mobile-menu-opener a:hover',
				array('color' => eldritch_edge_options()->getOptionValue('mobile_icon_hover_color')));
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_mobile_icon_styles');
}