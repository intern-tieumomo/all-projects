<?php

if(!function_exists('eldritch_edge_title_area_typography_style')) {

	function eldritch_edge_title_area_typography_style() {

		$title_styles = array();

		if(eldritch_edge_options()->getOptionValue('page_title_color') !== '') {
			$title_styles['color'] = eldritch_edge_options()->getOptionValue('page_title_color');
		}
		if(eldritch_edge_options()->getOptionValue('page_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('page_title_google_fonts'));
		}
		if(eldritch_edge_options()->getOptionValue('page_title_fontsize') !== '') {
			$title_styles['font-size'] = eldritch_edge_options()->getOptionValue('page_title_fontsize').'px';
		}
		if(eldritch_edge_options()->getOptionValue('page_title_lineheight') !== '') {
			$title_styles['line-height'] = eldritch_edge_options()->getOptionValue('page_title_lineheight').'px';
		}
		if(eldritch_edge_options()->getOptionValue('page_title_texttransform') !== '') {
			$title_styles['text-transform'] = eldritch_edge_options()->getOptionValue('page_title_texttransform');
		}
		if(eldritch_edge_options()->getOptionValue('page_title_fontstyle') !== '') {
			$title_styles['font-style'] = eldritch_edge_options()->getOptionValue('page_title_fontstyle');
		}
		if(eldritch_edge_options()->getOptionValue('page_title_fontweight') !== '') {
			$title_styles['font-weight'] = eldritch_edge_options()->getOptionValue('page_title_fontweight');
		}
		if(eldritch_edge_options()->getOptionValue('page_title_letter_spacing') !== '') {
			$title_styles['letter-spacing'] = eldritch_edge_options()->getOptionValue('page_title_letter_spacing').'px';
		}

		$title_selector = array(
			'.edgt-title .edgt-title-holder h1'
		);

		echo eldritch_edge_dynamic_css($title_selector, $title_styles);


		$subtitle_styles = array();

		if(eldritch_edge_options()->getOptionValue('page_subtitle_color') !== '') {
			$subtitle_styles['color'] = eldritch_edge_options()->getOptionValue('page_subtitle_color');
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_google_fonts') !== '-1') {
			$subtitle_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('page_subtitle_google_fonts'));
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_fontsize') !== '') {
			$subtitle_styles['font-size'] = eldritch_edge_options()->getOptionValue('page_subtitle_fontsize').'px';
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_lineheight') !== '') {
			$subtitle_styles['line-height'] = eldritch_edge_options()->getOptionValue('page_subtitle_lineheight').'px';
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_texttransform') !== '') {
			$subtitle_styles['text-transform'] = eldritch_edge_options()->getOptionValue('page_subtitle_texttransform');
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_fontstyle') !== '') {
			$subtitle_styles['font-style'] = eldritch_edge_options()->getOptionValue('page_subtitle_fontstyle');
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_fontweight') !== '') {
			$subtitle_styles['font-weight'] = eldritch_edge_options()->getOptionValue('page_subtitle_fontweight');
		}
		if(eldritch_edge_options()->getOptionValue('page_subtitle_letter_spacing') !== '') {
			$subtitle_styles['letter-spacing'] = eldritch_edge_options()->getOptionValue('page_subtitle_letter_spacing').'px';
		}

		$subtitle_selector = array(
			'.edgt-title .edgt-title-holder .edgt-subtitle'
		);

		echo eldritch_edge_dynamic_css($subtitle_selector, $subtitle_styles);


		$breadcrumb_styles = array();

		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_color') !== '') {
			$breadcrumb_styles['color'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_color');
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_google_fonts') !== '-1') {
			$breadcrumb_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('page_breadcrumb_google_fonts'));
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_fontsize') !== '') {
			$breadcrumb_styles['font-size'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_fontsize').'px';
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_lineheight') !== '') {
			$breadcrumb_styles['line-height'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_lineheight').'px';
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_texttransform') !== '') {
			$breadcrumb_styles['text-transform'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_texttransform');
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_fontstyle') !== '') {
			$breadcrumb_styles['font-style'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_fontstyle');
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_fontweight') !== '') {
			$breadcrumb_styles['font-weight'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_fontweight');
		}
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_letter_spacing') !== '') {
			$breadcrumb_styles['letter-spacing'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_letter_spacing').'px';
		}

		$breadcrumb_selector = array(
			'.edgt-title .edgt-title-holder .edgt-breadcrumbs a, .edgt-title .edgt-title-holder .edgt-breadcrumbs span'
		);

		echo eldritch_edge_dynamic_css($breadcrumb_selector, $breadcrumb_styles);

		$breadcrumb_selector_styles = array();
		if(eldritch_edge_options()->getOptionValue('page_breadcrumb_hovercolor') !== '') {
			$breadcrumb_selector_styles['color'] = eldritch_edge_options()->getOptionValue('page_breadcrumb_hovercolor');
		}

		$breadcrumb_hover_selector = array(
			'.edgt-title .edgt-title-holder .edgt-breadcrumbs a:hover'
		);

		echo eldritch_edge_dynamic_css($breadcrumb_hover_selector, $breadcrumb_selector_styles);

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_title_area_typography_style');

}


