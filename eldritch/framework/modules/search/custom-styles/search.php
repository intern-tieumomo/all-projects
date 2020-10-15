<?php

if(!function_exists('eldritch_edge_search_covers_header_style')) {

	function eldritch_edge_search_covers_header_style() {

		if(eldritch_edge_options()->getOptionValue('search_height') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-header-bottom.edgt-animated .edgt-form-holder-outer, .edgt-search-slide-header-bottom .edgt-form-holder-outer, .edgt-search-slide-header-bottom', array(
				'height' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_height')).'px'
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_covers_header_style');

}

if(!function_exists('eldritch_edge_search_opener_icon_size')) {

	function eldritch_edge_search_opener_icon_size() {

		if(eldritch_edge_options()->getOptionValue('header_search_icon_size')) {
			echo eldritch_edge_dynamic_css('.edgt-search-opener', array(
				'font-size' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('header_search_icon_size')).'px'
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_opener_icon_size');

}

if(!function_exists('eldritch_edge_search_opener_icon_colors')) {

	function eldritch_edge_search_opener_icon_colors() {

		if(eldritch_edge_options()->getOptionValue('header_search_icon_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-page-header .edgt-search-opener', array(
				'color' => eldritch_edge_options()->getOptionValue('header_search_icon_color')
			));
		}

		if(eldritch_edge_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-page-header .edgt-search-opener:hover', array(
				'color' => eldritch_edge_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if(eldritch_edge_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-light-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-search-opener,
			.edgt-light-header.edgt-header-style-on-scroll .edgt-page-header .edgt-search-opener,
			.edgt-light-header .edgt-top-bar .edgt-search-opener', array(
				'color' => eldritch_edge_options()->getOptionValue('header_light_search_icon_color').' !important'
			));
		}

		if(eldritch_edge_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-light-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-search-opener:hover,
			.edgt-light-header.edgt-header-style-on-scroll .edgt-page-header .edgt-search-opener:hover,
			.edgt-light-header .edgt-top-bar .edgt-search-opener:hover', array(
				'color' => eldritch_edge_options()->getOptionValue('header_light_search_icon_hover_color').' !important'
			));
		}

		if(eldritch_edge_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-dark-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-search-opener,
			.edgt-dark-header.edgt-header-style-on-scroll .edgt-page-header .edgt-search-opener,
			.edgt-dark-header .edgt-top-bar .edgt-search-opener', array(
				'color' => eldritch_edge_options()->getOptionValue('header_dark_search_icon_color').' !important'
			));
		}
		if(eldritch_edge_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-dark-header .edgt-page-header > div:not(.edgt-sticky-header) .edgt-search-opener:hover,
			.edgt-dark-header.edgt-header-style-on-scroll .edgt-page-header .edgt-search-opener:hover,
			.edgt-dark-header .edgt-top-bar .edgt-search-opener:hover', array(
				'color' => eldritch_edge_options()->getOptionValue('header_dark_search_icon_hover_color').' !important'
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_opener_icon_colors');

}

if(!function_exists('eldritch_edge_search_opener_icon_background_colors')) {

	function eldritch_edge_search_opener_icon_background_colors() {

		if(eldritch_edge_options()->getOptionValue('search_icon_background_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-opener', array(
				'background-color' => eldritch_edge_options()->getOptionValue('search_icon_background_color')
			));
		}

		if(eldritch_edge_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-opener:hover', array(
				'background-color' => eldritch_edge_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_opener_icon_background_colors');
}

if(!function_exists('eldritch_edge_search_opener_text_styles')) {

	function eldritch_edge_search_opener_text_styles() {
		$text_styles = array();

		if(eldritch_edge_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = eldritch_edge_options()->getOptionValue('search_icon_text_color');
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_icon_text_fontsize')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_icon_text_lineheight')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = eldritch_edge_options()->getOptionValue('search_icon_text_texttransform');
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('search_icon_text_google_fonts')).', sans-serif';
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = eldritch_edge_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = eldritch_edge_options()->getOptionValue('search_icon_text_fontweight');
		}

		if(!empty($text_styles)) {
			echo eldritch_edge_dynamic_css('.edgt-search-icon-text', $text_styles);
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-opener:hover .edgt-search-icon-text', array(
				'color' => eldritch_edge_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_opener_text_styles');
}

if(!function_exists('eldritch_edge_search_opener_spacing')) {

	function eldritch_edge_search_opener_spacing() {
		$spacing_styles = array();

		if(eldritch_edge_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_padding_left')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_padding_right')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_margin_left')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_margin_right')).'px';
		}

		if(!empty($spacing_styles)) {
			echo eldritch_edge_dynamic_css('.edgt-search-opener', $spacing_styles);
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_opener_spacing');
}

if(!function_exists('eldritch_edge_search_bar_background')) {

	function eldritch_edge_search_bar_background() {

		if(eldritch_edge_options()->getOptionValue('search_background_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-header-bottom, .edgt-search-cover, .edgt-search-fade .edgt-fullscreen-search-holder .edgt-fullscreen-search-table, .edgt-fullscreen-search-overlay, .edgt-search-slide-window-top, .edgt-search-slide-window-top input[type="text"]', array(
				'background-color' => eldritch_edge_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_bar_background');
}

if(!function_exists('eldritch_edge_search_text_styles')) {

	function eldritch_edge_search_text_styles() {
		$text_styles = array();

		if(eldritch_edge_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = eldritch_edge_options()->getOptionValue('search_text_color');
		}
		if(eldritch_edge_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_text_fontsize')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = eldritch_edge_options()->getOptionValue('search_text_texttransform');
		}
		if(eldritch_edge_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('search_text_google_fonts')).', sans-serif';
		}
		if(eldritch_edge_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = eldritch_edge_options()->getOptionValue('search_text_fontstyle');
		}
		if(eldritch_edge_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = eldritch_edge_options()->getOptionValue('search_text_fontweight');
		}
		if(eldritch_edge_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_text_letterspacing')).'px';
		}

		if(!empty($text_styles)) {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-header-bottom input[type="text"], .edgt-search-cover input[type="text"], .edgt-fullscreen-search-holder .edgt-search-field, .edgt-search-slide-window-top input[type="text"]', $text_styles);
		}
		if(eldritch_edge_options()->getOptionValue('search_text_disabled_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-header-bottom.edgt-disabled input[type="text"]::-webkit-input-placeholder, .edgt-search-slide-header-bottom.edgt-disabled input[type="text"]::-moz-input-placeholder', array(
				'color' => eldritch_edge_options()->getOptionValue('search_text_disabled_color')
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_text_styles');
}

if(!function_exists('eldritch_edge_search_label_styles')) {

	function eldritch_edge_search_label_styles() {
		$text_styles = array();

		if(eldritch_edge_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = eldritch_edge_options()->getOptionValue('search_label_text_color');
		}
		if(eldritch_edge_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_label_text_fontsize')).'px';
		}
		if(eldritch_edge_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = eldritch_edge_options()->getOptionValue('search_label_text_texttransform');
		}
		if(eldritch_edge_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('search_label_text_google_fonts')).', sans-serif';
		}
		if(eldritch_edge_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = eldritch_edge_options()->getOptionValue('search_label_text_fontstyle');
		}
		if(eldritch_edge_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = eldritch_edge_options()->getOptionValue('search_label_text_fontweight');
		}
		if(eldritch_edge_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_label_text_letterspacing')).'px';
		}

		if(!empty($text_styles)) {
			echo eldritch_edge_dynamic_css('.edgt-fullscreen-search-holder .edgt-search-label', $text_styles);
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_label_styles');
}

if(!function_exists('eldritch_edge_search_icon_styles')) {

	function eldritch_edge_search_icon_styles() {

		if(eldritch_edge_options()->getOptionValue('search_icon_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-window-top > i, .edgt-search-slide-header-bottom .edgt-search-submit i, .edgt-fullscreen-search-holder .edgt-search-submit', array(
				'color' => eldritch_edge_options()->getOptionValue('search_icon_color')
			));
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-window-top > i:hover, .edgt-search-slide-header-bottom .edgt-search-submit i:hover, .edgt-fullscreen-search-holder .edgt-search-submit:hover', array(
				'color' => eldritch_edge_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_disabled_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-header-bottom.edgt-disabled .edgt-search-submit i, .edgt-search-slide-header-bottom.edgt-disabled .edgt-search-submit i:hover', array(
				'color' => eldritch_edge_options()->getOptionValue('search_icon_disabled_color')
			));
		}
		if(eldritch_edge_options()->getOptionValue('search_icon_size') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-window-top > i, .edgt-search-slide-header-bottom .edgt-search-submit i, .edgt-fullscreen-search-holder .edgt-search-submit', array(
				'font-size' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_icon_size')).'px'
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_icon_styles');
}

if(!function_exists('eldritch_edge_search_close_icon_styles')) {

	function eldritch_edge_search_close_icon_styles() {

		if(eldritch_edge_options()->getOptionValue('search_close_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-window-top .edgt-search-close i, .edgt-search-cover .edgt-search-close i, .edgt-fullscreen-search-close i', array(
				'color' => eldritch_edge_options()->getOptionValue('search_close_color')
			));
		}
		if(eldritch_edge_options()->getOptionValue('search_close_hover_color') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-window-top .edgt-search-close i:hover, .edgt-search-cover .edgt-search-close i:hover, .edgt-fullscreen-search-close i:hover', array(
				'color' => eldritch_edge_options()->getOptionValue('search_close_hover_color')
			));
		}
		if(eldritch_edge_options()->getOptionValue('search_close_size') !== '') {
			echo eldritch_edge_dynamic_css('.edgt-search-slide-window-top .edgt-search-close i, .edgt-search-cover .edgt-search-close i, .edgt-fullscreen-search-close i', array(
				'font-size' => eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('search_close_size')).'px'
			));
		}

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_search_close_icon_styles');
}

if(!function_exists('eldritch_edge_fullscreen_search_styles')) {
	function eldritch_edge_fullscreen_search_styles() {
		$bg_image = eldritch_edge_options()->getOptionValue('fullscreen_search_background_image');
		$selector = '.edgt-search-fade .edgt-fullscreen-search-holder';
		$styles   = array();

		if(!$bg_image) {
			return;
		}

		$styles['background-image'] = 'url('.$bg_image.')';

		echo eldritch_edge_dynamic_css($selector, $styles);
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_fullscreen_search_styles');
}

?>