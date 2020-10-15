<?php
if (!function_exists('eldritch_edge_design_styles')) {
	/**
	 * Generates general custom styles
	 */
	function eldritch_edge_design_styles() {

		$preload_background_styles = array();

		if (eldritch_edge_options()->getOptionValue('preload_pattern_image') !== "") {
			$preload_background_styles['background-image'] = 'url(' . eldritch_edge_options()->getOptionValue('preload_pattern_image') . ') !important';
		} else {
			$preload_background_styles['background-image'] = 'url(' . esc_url(EDGE_ASSETS_ROOT . "/img/preload_pattern.png") . ') !important';
		}

		echo eldritch_edge_dynamic_css('.edgt-preload-background', $preload_background_styles);

		if (eldritch_edge_options()->getOptionValue('google_fonts')) {
			$font_family = eldritch_edge_options()->getOptionValue('google_fonts');
			if (eldritch_edge_is_font_option_valid($font_family)) {
				echo eldritch_edge_dynamic_css('body', array('font-family' => eldritch_edge_get_font_option_val($font_family)));
			}
		}
		if (eldritch_edge_options()->getOptionValue('first_color') !== "") {

			extract(eldritch_edge_generate_first_color_selectors());

			echo eldritch_edge_dynamic_css($color_selector, array('color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($color_selector_new, array('color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($color_selector_new2, array('color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($color_important_selector, array('color' => eldritch_edge_options()->getOptionValue('first_color') . '!important'));
			echo eldritch_edge_dynamic_css('::selection', array('background' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css('::-moz-selection', array('background' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($background_color_selector, array('background-color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($background_color_important_selector, array('background-color' => eldritch_edge_options()->getOptionValue('first_color') . '!important'));
			echo eldritch_edge_dynamic_css($border_color_selector, array('border-color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($border_color_important_selector, array('border-color' => eldritch_edge_options()->getOptionValue('first_color') . '!important'));

			echo eldritch_edge_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($border_top_color_selector, array('border-top-color' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($stroke_color_selector, array('stroke' => eldritch_edge_options()->getOptionValue('first_color')));
			echo eldritch_edge_dynamic_css($shadow_selector, array(
			    'box-shadow' => '0 0 0 1px '.eldritch_edge_options()->getOptionValue('first_color'),
                ));
            echo eldritch_edge_dynamic_css($shadow_selector, array(
                '-moz-box-shadow' => '0 0 0 1px '.eldritch_edge_options()->getOptionValue('first_color'),
            ));
            echo eldritch_edge_dynamic_css($shadow_selector, array(
                '-webkit-box-shadow' => '0 0 0 1px '.eldritch_edge_options()->getOptionValue('first_color')
            ));

		}

		if (eldritch_edge_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.edgt-content .edgt-content-inner > .edgt-container',
				'.edgt-content .edgt-content-inner > .edgt-full-width'
			);
			echo eldritch_edge_dynamic_css($background_color_selector, array('background-color' => eldritch_edge_options()->getOptionValue('page_background_color')));
		}


		$comments_background_color = eldritch_edge_options()->getOptionValue('comments_background_color');
		if ($comments_background_color) {
			$background_color_selector = array(
				'.edgt-comment-holder .edgt-comment'
			);
			echo eldritch_edge_dynamic_css($background_color_selector, array('background-color' => $comments_background_color));
		}

		if (eldritch_edge_options()->getOptionValue('selection_color')) {
			echo eldritch_edge_dynamic_css('::selection', array('background' => eldritch_edge_options()->getOptionValue('selection_color')));
			echo eldritch_edge_dynamic_css('::-moz-selection', array('background' => eldritch_edge_options()->getOptionValue('selection_color')));
		}

		$gradient_style1_start_color = eldritch_edge_options()->getOptionValue('gradient_style1_start_color');
		$gradient_style1_end_color = eldritch_edge_options()->getOptionValue('gradient_style1_end_color');

		if ($gradient_style1_start_color !== '#0090f0' && $gradient_style1_start_color !== '' &&
			$gradient_style1_end_color !== '#00edfd' && $gradient_style1_end_color !== ''
		) {

			echo eldritch_edge_dynamic_css('.edgt-type1-gradient-left-to-right', array(
				'background' => '-webkit-linear-gradient(left,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => '-o-linear-gradient(right,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => '-moz-linear-gradient(right,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => 'linear-gradient(to right,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
			));

            echo eldritch_edge_dynamic_css('.edgt-type1-separator-gradient-left-to-right', array(
                'border-image' => '-webkit-linear-gradient(left,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
                'border-image' => '-o-linear-gradient(right,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
                'border-image' => '-moz-linear-gradient(right,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
                'border-image' => 'linear-gradient(to right,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
                'border-image-slice' => '1'
            ));

			echo eldritch_edge_dynamic_css('.edgt-type1-gradient-bottom-to-top, .edgt-type1-gradient-bottom-to-top-after:after', array(
				'background' => '-webkit-linear-gradient(bottom,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => '-o-linear-gradient(top,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => '-moz-linear-gradient(top,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => 'linear-gradient(to top,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type1-gradient-left-bottom-to-right-top', array(
				'background' => '-webkit-linear-gradient(right top,' . $gradient_style1_end_color . ', ' . $gradient_style1_start_color . ')',
				'background' => '-o-linear-gradient(right top,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => '-moz-linear-gradient(right top,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
				'background' => 'linear-gradient(to right top,' . $gradient_style1_start_color . ', ' . $gradient_style1_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type1-gradient-left-to-right-2x', array(
				'background'      => '-webkit-linear-gradient(left,' . $gradient_style1_start_color . ' 0%, ' . $gradient_style1_end_color . ' 50% ,' . $gradient_style1_start_color . ' 100%)',
				'background'      => '-o-linear-gradient(right,' . $gradient_style1_start_color . ' 0%, ' . $gradient_style1_end_color . ' 50% ,' . $gradient_style1_start_color . ' 100%)',
				'background'      => '-moz-linear-gradient(right,' . $gradient_style1_start_color . ' 0%, ' . $gradient_style1_end_color . ' 50% ,' . $gradient_style1_start_color . ' 100%)',
				'background'      => 'linear-gradient(to right,' . $gradient_style1_start_color . ' 0%, ' . $gradient_style1_end_color . ' 50%,' . $gradient_style1_start_color . ' 100%)',
				'background-size' => '200% 200%'
			));

			echo eldritch_edge_dynamic_css('.edgt-type1-gradient-left-to-right-text i, .edgt-type1-gradient-left-to-right-text i:before, .edgt-type1-gradient-left-to-right-text span', array(
				'background'              => '-webkit-linear-gradient(right top,' . $gradient_style1_end_color . ', ' . $gradient_style1_start_color . ')',
				'color'                   => $gradient_style1_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

			echo eldritch_edge_dynamic_css('.edgt-type1-gradient-bottom-to-top-text i, .edgt-type1-gradient-bottom-to-top-text i:before, .edgt-type1-gradient-bottom-to-top-text span', array(
				'background'              => '-webkit-linear-gradient(bottom,' . $gradient_style1_end_color . ', ' . $gradient_style1_start_color . ')',
				'color'                   => $gradient_style1_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

		}

		$gradient_style2_start_color = eldritch_edge_options()->getOptionValue('gradient_style2_start_color');
		$gradient_style2_end_color = eldritch_edge_options()->getOptionValue('gradient_style2_end_color');

		if ($gradient_style2_start_color !== '#ad6ef0' && $gradient_style2_start_color !== '' &&
			$gradient_style2_end_color !== '#03a9f5' && $gradient_style2_end_color !== ''
		) {

			echo eldritch_edge_dynamic_css('.edgt-type2-gradient-left-to-right', array(
				'background' => '-webkit-linear-gradient(left,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => '-o-linear-gradient(right,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => '-moz-linear-gradient(right,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => 'linear-gradient(to right,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
			));

            echo eldritch_edge_dynamic_css('.edgt-type2-separator-gradient-left-to-right', array(
                'border-image' => '-webkit-linear-gradient(left,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
                'border-image' => '-o-linear-gradient(right,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
                'border-image' => '-moz-linear-gradient(right,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
                'border-image' => 'linear-gradient(to right,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
                'border-image-slice' => '1'
            ));

			echo eldritch_edge_dynamic_css('.edgt-type2-gradient-bottom-to-top, .edgt-type2-gradient-bottom-to-top-after:after', array(
				'background' => '-webkit-linear-gradient(bottom,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => '-o-linear-gradient(top,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => '-moz-linear-gradient(top,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => 'linear-gradient(to top,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type2-gradient-left-bottom-to-right-top', array(
				'background' => '-webkit-linear-gradient(right top,' . $gradient_style2_end_color . ', ' . $gradient_style2_start_color . ')',
				'background' => '-o-linear-gradient(right top,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => '-moz-linear-gradient(right top,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
				'background' => 'linear-gradient(to right top,' . $gradient_style2_start_color . ', ' . $gradient_style2_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type2-gradient-left-to-right-2x', array(
				'background'      => '-webkit-linear-gradient(left,' . $gradient_style2_start_color . ' 0%, ' . $gradient_style2_end_color . ' 50% ,' . $gradient_style2_start_color . ' 100%)',
				'background'      => '-o-linear-gradient(right,' . $gradient_style2_start_color . ' 0%, ' . $gradient_style2_end_color . ' 50% ,' . $gradient_style2_start_color . ' 100%)',
				'background'      => '-moz-linear-gradient(right,' . $gradient_style2_start_color . ' 0%, ' . $gradient_style2_end_color . ' 50% ,' . $gradient_style2_start_color . ' 100%)',
				'background'      => 'linear-gradient(to right,' . $gradient_style2_start_color . ' 0%, ' . $gradient_style2_end_color . ' 50%,' . $gradient_style2_start_color . ' 100%)',
				'background-size' => '200% 200%'
			));

			echo eldritch_edge_dynamic_css('.edgt-type2-gradient-left-to-right-text i, .edgt-type2-gradient-left-to-right-text i:before, .edgt-type2-gradient-left-to-right-text span', array(
				'background'              => '-webkit-linear-gradient(right top,' . $gradient_style2_end_color . ', ' . $gradient_style2_start_color . ')',
				'color'                   => $gradient_style2_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

			echo eldritch_edge_dynamic_css('.edgt-type2-gradient-bottom-to-top-text i, .edgt-type2-gradient-bottom-to-top-text i:before, .edgt-type2-gradient-bottom-to-top-text span', array(
				'background'              => '-webkit-linear-gradient(bottom,' . $gradient_style2_end_color . ', ' . $gradient_style2_start_color . ')',
				'color'                   => $gradient_style2_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

		}

		$gradient_style3_start_color = eldritch_edge_options()->getOptionValue('gradient_style3_start_color');
		$gradient_style3_end_color = eldritch_edge_options()->getOptionValue('gradient_style3_end_color');

		if ($gradient_style3_start_color !== '#3b3860' && $gradient_style3_start_color !== '' &&
			$gradient_style3_end_color !== '#5d569f' && $gradient_style3_end_color !== ''
		) {

			echo eldritch_edge_dynamic_css('.edgt-type3-gradient-left-to-right', array(
				'background' => '-webkit-linear-gradient(left,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => '-o-linear-gradient(right,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => '-moz-linear-gradient(right,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => 'linear-gradient(to right,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
			));

            echo eldritch_edge_dynamic_css('.edgt-type3-separator-gradient-left-to-right', array(
                'border-image' => '-webkit-linear-gradient(left,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
                'border-image' => '-o-linear-gradient(right,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
                'border-image' => '-moz-linear-gradient(right,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
                'border-image' => 'linear-gradient(to right,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
                'border-image-slice' => '1'
            ));

			echo eldritch_edge_dynamic_css('.edgt-type3-gradient-bottom-to-top, .edgt-type3-gradient-bottom-to-top-after:after', array(
				'background' => '-webkit-linear-gradient(bottom,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => '-o-linear-gradient(top,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => '-moz-linear-gradient(top,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => 'linear-gradient(to top,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type3-gradient-left-bottom-to-right-top', array(
				'background' => '-webkit-linear-gradient(right top,' . $gradient_style3_end_color . ', ' . $gradient_style3_start_color . ')',
				'background' => '-o-linear-gradient(right top,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => '-moz-linear-gradient(right top,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
				'background' => 'linear-gradient(to right top,' . $gradient_style3_start_color . ', ' . $gradient_style3_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type3-gradient-left-to-right-2x', array(
				'background'      => '-webkit-linear-gradient(left,' . $gradient_style3_start_color . ' 0%, ' . $gradient_style3_end_color . ' 50% ,' . $gradient_style3_start_color . ' 100%)',
				'background'      => '-o-linear-gradient(right,' . $gradient_style3_start_color . ' 0%, ' . $gradient_style3_end_color . ' 50% ,' . $gradient_style3_start_color . ' 100%)',
				'background'      => '-moz-linear-gradient(right,' . $gradient_style3_start_color . ' 0%, ' . $gradient_style3_end_color . ' 50% ,' . $gradient_style3_start_color . ' 100%)',
				'background'      => 'linear-gradient(to right,' . $gradient_style3_start_color . ' 0%, ' . $gradient_style3_end_color . ' 50%,' . $gradient_style3_start_color . ' 100%)',
				'background-size' => '200% 200%'
			));

			echo eldritch_edge_dynamic_css('.edgt-type3-gradient-left-to-right-text i, .edgt-type3-gradient-left-to-right-text i:before, .edgt-type3-gradient-left-to-right-text span', array(
				'background'              => '-webkit-linear-gradient(right top,' . $gradient_style3_end_color . ', ' . $gradient_style3_start_color . ')',
				'color'                   => $gradient_style3_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

			echo eldritch_edge_dynamic_css('.edgt-type3-gradient-bottom-to-top-text i, .edgt-type3-gradient-bottom-to-top-text i:before, .edgt-type3-gradient-bottom-to-top-text span', array(
				'background'              => '-webkit-linear-gradient(bottom,' . $gradient_style3_end_color . ', ' . $gradient_style3_start_color . ')',
				'color'                   => $gradient_style3_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

		}

		$gradient_style4_start_color = eldritch_edge_options()->getOptionValue('gradient_style4_start_color');
		$gradient_style4_end_color = eldritch_edge_options()->getOptionValue('gradient_style4_end_color');

		if ($gradient_style4_start_color !== '#3b3860' && $gradient_style4_start_color !== '' &&
			$gradient_style4_end_color !== '#5d569f' && $gradient_style4_end_color !== ''
		) {

			echo eldritch_edge_dynamic_css('.edgt-type4-gradient-left-to-right', array(
				'background' => '-webkit-linear-gradient(left,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => '-o-linear-gradient(right,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => '-moz-linear-gradient(right,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => 'linear-gradient(to right,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
			));

            echo eldritch_edge_dynamic_css('.edgt-type4-separator-gradient-left-to-right', array(
                'border-image' => '-webkit-linear-gradient(left,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
                'border-image' => '-o-linear-gradient(right,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
                'border-image' => '-moz-linear-gradient(right,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
                'border-image' => 'linear-gradient(to right,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
                'border-image-slice' => '1'
            ));

			echo eldritch_edge_dynamic_css('.edgt-type4-gradient-bottom-to-top, .edgt-type4-gradient-bottom-to-top-after:after', array(
				'background' => '-webkit-linear-gradient(bottom,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => '-o-linear-gradient(top,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => '-moz-linear-gradient(top,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => 'linear-gradient(to top,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type4-gradient-left-bottom-to-right-top', array(
				'background' => '-webkit-linear-gradient(right top,' . $gradient_style4_end_color . ', ' . $gradient_style4_start_color . ')',
				'background' => '-o-linear-gradient(right top,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => '-moz-linear-gradient(right top,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
				'background' => 'linear-gradient(to right top,' . $gradient_style4_start_color . ', ' . $gradient_style4_end_color . ')',
			));

			echo eldritch_edge_dynamic_css('.edgt-type4-gradient-left-to-right-2x', array(
				'background'      => '-webkit-linear-gradient(left,' . $gradient_style4_start_color . ' 0%, ' . $gradient_style4_end_color . ' 50% ,' . $gradient_style4_start_color . ' 100%)',
				'background'      => '-o-linear-gradient(right,' . $gradient_style4_start_color . ' 0%, ' . $gradient_style4_end_color . ' 50% ,' . $gradient_style4_start_color . ' 100%)',
				'background'      => '-moz-linear-gradient(right,' . $gradient_style4_start_color . ' 0%, ' . $gradient_style4_end_color . ' 50% ,' . $gradient_style4_start_color . ' 100%)',
				'background'      => 'linear-gradient(to right,' . $gradient_style4_start_color . ' 0%, ' . $gradient_style4_end_color . ' 50%,' . $gradient_style4_start_color . ' 100%)',
				'background-size' => '200% 200%'
			));

			echo eldritch_edge_dynamic_css('.edgt-type4-gradient-left-to-right-text i, .edgt-type4-gradient-left-to-right-text i:before, .edgt-type4-gradient-left-to-right-text span', array(
				'background'              => '-webkit-linear-gradient(right top,' . $gradient_style4_end_color . ', ' . $gradient_style4_start_color . ')',
				'color'                   => $gradient_style4_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

			echo eldritch_edge_dynamic_css('.edgt-type4-gradient-bottom-to-top-text i, .edgt-type4-gradient-bottom-to-top-text i:before, .edgt-type4-gradient-bottom-to-top-text span', array(
				'background'              => '-webkit-linear-gradient(bottom,' . $gradient_style4_end_color . ', ' . $gradient_style4_start_color . ')',
				'color'                   => $gradient_style4_start_color,
				'-webkit-background-clip' => 'text',
				'-webkit-text-fill-color' => 'transparent'
			));

		}

        $boxed_class_selector = '.edgt-boxed .edgt-wrapper';

		if (eldritch_edge_get_meta_field_intersect('header_footer_in_box') == 'no') {
            $boxed_class_selector = '.edgt-boxed-content .edgt-wrapper';
        }

		$boxed_background_style = array();
		if (eldritch_edge_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = eldritch_edge_options()->getOptionValue('page_background_color_in_box');
		}

		if (eldritch_edge_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url(' . esc_url(eldritch_edge_options()->getOptionValue('boxed_background_image')) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (eldritch_edge_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url(' . esc_url(eldritch_edge_options()->getOptionValue('boxed_pattern_background_image')) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (eldritch_edge_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (eldritch_edge_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo eldritch_edge_dynamic_css($boxed_class_selector, $boxed_background_style);

	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_design_styles');
}

if (!function_exists('eldritch_edge_h1_styles')) {

	function eldritch_edge_h1_styles() {

		$h1_styles = array();

		if (eldritch_edge_options()->getOptionValue('h1_color') !== '') {
			$h1_styles['color'] = eldritch_edge_options()->getOptionValue('h1_color');
		}
		if (eldritch_edge_options()->getOptionValue('h1_google_fonts') !== '-1') {
			$h1_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('h1_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('h1_fontsize') !== '') {
			$h1_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h1_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h1_lineheight') !== '') {
			$h1_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h1_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h1_texttransform') !== '') {
			$h1_styles['text-transform'] = eldritch_edge_options()->getOptionValue('h1_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('h1_fontstyle') !== '') {
			$h1_styles['font-style'] = eldritch_edge_options()->getOptionValue('h1_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('h1_fontweight') !== '') {
			$h1_styles['font-weight'] = eldritch_edge_options()->getOptionValue('h1_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('h1_letterspacing') !== '') {
			$h1_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h1_letterspacing')) . 'px';
		}

		$h1_selector = array(
			'h1'
		);

		if (!empty($h1_styles)) {
			echo eldritch_edge_dynamic_css($h1_selector, $h1_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_h1_styles');
}

if (!function_exists('eldritch_edge_h2_styles')) {

	function eldritch_edge_h2_styles() {

		$h2_styles = array();

		if (eldritch_edge_options()->getOptionValue('h2_color') !== '') {
			$h2_styles['color'] = eldritch_edge_options()->getOptionValue('h2_color');
		}
		if (eldritch_edge_options()->getOptionValue('h2_google_fonts') !== '-1') {
			$h2_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('h2_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('h2_fontsize') !== '') {
			$h2_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h2_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h2_lineheight') !== '') {
			$h2_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h2_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h2_texttransform') !== '') {
			$h2_styles['text-transform'] = eldritch_edge_options()->getOptionValue('h2_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('h2_fontstyle') !== '') {
			$h2_styles['font-style'] = eldritch_edge_options()->getOptionValue('h2_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('h2_fontweight') !== '') {
			$h2_styles['font-weight'] = eldritch_edge_options()->getOptionValue('h2_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('h2_letterspacing') !== '') {
			$h2_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h2_letterspacing')) . 'px';
		}

		$h2_selector = array(
			'h2'
		);

		if (!empty($h2_styles)) {
			echo eldritch_edge_dynamic_css($h2_selector, $h2_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_h2_styles');
}

if (!function_exists('eldritch_edge_h3_styles')) {

	function eldritch_edge_h3_styles() {

		$h3_styles = array();

		if (eldritch_edge_options()->getOptionValue('h3_color') !== '') {
			$h3_styles['color'] = eldritch_edge_options()->getOptionValue('h3_color');
		}
		if (eldritch_edge_options()->getOptionValue('h3_google_fonts') !== '-1') {
			$h3_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('h3_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('h3_fontsize') !== '') {
			$h3_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h3_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h3_lineheight') !== '') {
			$h3_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h3_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h3_texttransform') !== '') {
			$h3_styles['text-transform'] = eldritch_edge_options()->getOptionValue('h3_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('h3_fontstyle') !== '') {
			$h3_styles['font-style'] = eldritch_edge_options()->getOptionValue('h3_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('h3_fontweight') !== '') {
			$h3_styles['font-weight'] = eldritch_edge_options()->getOptionValue('h3_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('h3_letterspacing') !== '') {
			$h3_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h3_letterspacing')) . 'px';
		}

		$h3_selector = array(
			'h3'
		);

		if (!empty($h3_styles)) {
			echo eldritch_edge_dynamic_css($h3_selector, $h3_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_h3_styles');
}

if (!function_exists('eldritch_edge_h4_styles')) {

	function eldritch_edge_h4_styles() {

		$h4_styles = array();

		if (eldritch_edge_options()->getOptionValue('h4_color') !== '') {
			$h4_styles['color'] = eldritch_edge_options()->getOptionValue('h4_color');
		}
		if (eldritch_edge_options()->getOptionValue('h4_google_fonts') !== '-1') {
			$h4_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('h4_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('h4_fontsize') !== '') {
			$h4_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h4_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h4_lineheight') !== '') {
			$h4_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h4_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h4_texttransform') !== '') {
			$h4_styles['text-transform'] = eldritch_edge_options()->getOptionValue('h4_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('h4_fontstyle') !== '') {
			$h4_styles['font-style'] = eldritch_edge_options()->getOptionValue('h4_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('h4_fontweight') !== '') {
			$h4_styles['font-weight'] = eldritch_edge_options()->getOptionValue('h4_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('h4_letterspacing') !== '') {
			$h4_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h4_letterspacing')) . 'px';
		}

		$h4_selector = array(
			'h4'
		);

		if (!empty($h4_styles)) {
			echo eldritch_edge_dynamic_css($h4_selector, $h4_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_h4_styles');
}

if (!function_exists('eldritch_edge_h5_styles')) {

	function eldritch_edge_h5_styles() {

		$h5_styles = array();

		if (eldritch_edge_options()->getOptionValue('h5_color') !== '') {
			$h5_styles['color'] = eldritch_edge_options()->getOptionValue('h5_color');
		}
		if (eldritch_edge_options()->getOptionValue('h5_google_fonts') !== '-1') {
			$h5_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('h5_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('h5_fontsize') !== '') {
			$h5_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h5_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h5_lineheight') !== '') {
			$h5_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h5_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h5_texttransform') !== '') {
			$h5_styles['text-transform'] = eldritch_edge_options()->getOptionValue('h5_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('h5_fontstyle') !== '') {
			$h5_styles['font-style'] = eldritch_edge_options()->getOptionValue('h5_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('h5_fontweight') !== '') {
			$h5_styles['font-weight'] = eldritch_edge_options()->getOptionValue('h5_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('h5_letterspacing') !== '') {
			$h5_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h5_letterspacing')) . 'px';
		}

		$h5_selector = array(
			'h5'
		);

		if (!empty($h5_styles)) {
			echo eldritch_edge_dynamic_css($h5_selector, $h5_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_h5_styles');
}

if (!function_exists('eldritch_edge_h6_styles')) {

	function eldritch_edge_h6_styles() {

		$h6_styles = array();

		if (eldritch_edge_options()->getOptionValue('h6_color') !== '') {
			$h6_styles['color'] = eldritch_edge_options()->getOptionValue('h6_color');
		}
		if (eldritch_edge_options()->getOptionValue('h6_google_fonts') !== '-1') {
			$h6_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('h6_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('h6_fontsize') !== '') {
			$h6_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h6_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h6_lineheight') !== '') {
			$h6_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h6_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('h6_texttransform') !== '') {
			$h6_styles['text-transform'] = eldritch_edge_options()->getOptionValue('h6_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('h6_fontstyle') !== '') {
			$h6_styles['font-style'] = eldritch_edge_options()->getOptionValue('h6_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('h6_fontweight') !== '') {
			$h6_styles['font-weight'] = eldritch_edge_options()->getOptionValue('h6_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('h6_letterspacing') !== '') {
			$h6_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('h6_letterspacing')) . 'px';
		}

		$h6_selector = array(
			'h6'
		);

		if (!empty($h6_styles)) {
			echo eldritch_edge_dynamic_css($h6_selector, $h6_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_h6_styles');
}

if (!function_exists('eldritch_edge_text_styles')) {

	function eldritch_edge_text_styles() {

		$text_styles = array();

		if (eldritch_edge_options()->getOptionValue('text_color') !== '') {
			$text_styles['color'] = eldritch_edge_options()->getOptionValue('text_color');
		}
		if (eldritch_edge_options()->getOptionValue('text_google_fonts') !== '-1') {
			$text_styles['font-family'] = eldritch_edge_get_formatted_font_family(eldritch_edge_options()->getOptionValue('text_google_fonts'));
		}
		if (eldritch_edge_options()->getOptionValue('text_fontsize') !== '') {
			$text_styles['font-size'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('text_fontsize')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('text_lineheight') !== '') {
			$text_styles['line-height'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('text_lineheight')) . 'px';
		}
		if (eldritch_edge_options()->getOptionValue('text_texttransform') !== '') {
			$text_styles['text-transform'] = eldritch_edge_options()->getOptionValue('text_texttransform');
		}
		if (eldritch_edge_options()->getOptionValue('text_fontstyle') !== '') {
			$text_styles['font-style'] = eldritch_edge_options()->getOptionValue('text_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('text_fontweight') !== '') {
			$text_styles['font-weight'] = eldritch_edge_options()->getOptionValue('text_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('text_letterspacing')) . 'px';
		}

		$text_selector = array(
			'p'
		);

		if (!empty($text_styles)) {
			echo eldritch_edge_dynamic_css($text_selector, $text_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_text_styles');
}

if (!function_exists('eldritch_edge_link_styles')) {

	function eldritch_edge_link_styles() {

		$link_styles = array();

		if (eldritch_edge_options()->getOptionValue('link_color') !== '') {
			$link_styles['color'] = eldritch_edge_options()->getOptionValue('link_color');
		}
		if (eldritch_edge_options()->getOptionValue('link_fontstyle') !== '') {
			$link_styles['font-style'] = eldritch_edge_options()->getOptionValue('link_fontstyle');
		}
		if (eldritch_edge_options()->getOptionValue('link_fontweight') !== '') {
			$link_styles['font-weight'] = eldritch_edge_options()->getOptionValue('link_fontweight');
		}
		if (eldritch_edge_options()->getOptionValue('link_fontdecoration') !== '') {
			$link_styles['text-decoration'] = eldritch_edge_options()->getOptionValue('link_fontdecoration');
		}

		$link_selector = array(
			'a',
			'p a'
		);

		if (!empty($link_styles)) {
			echo eldritch_edge_dynamic_css($link_selector, $link_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_link_styles');
}

if (!function_exists('eldritch_edge_link_hover_styles')) {

	function eldritch_edge_link_hover_styles() {

		$link_hover_styles = array();

		if (eldritch_edge_options()->getOptionValue('link_hovercolor') !== '') {
			$link_hover_styles['color'] = eldritch_edge_options()->getOptionValue('link_hovercolor');
		}
		if (eldritch_edge_options()->getOptionValue('link_hover_fontdecoration') !== '') {
			$link_hover_styles['text-decoration'] = eldritch_edge_options()->getOptionValue('link_hover_fontdecoration');
		}

		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);

		if (!empty($link_hover_styles)) {
			echo eldritch_edge_dynamic_css($link_hover_selector, $link_hover_styles);
		}

		$link_heading_hover_styles = array();

		if (eldritch_edge_options()->getOptionValue('link_hovercolor') !== '') {
			$link_heading_hover_styles['color'] = eldritch_edge_options()->getOptionValue('link_hovercolor');
		}

		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);

		if (!empty($link_heading_hover_styles)) {
			echo eldritch_edge_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_link_hover_styles');
}

if (!function_exists('eldritch_edge_smooth_page_transition_styles')) {

	function eldritch_edge_smooth_page_transition_styles() {

		$loader_style = array();

		if (eldritch_edge_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
			$loader_style['background-color'] = eldritch_edge_options()->getOptionValue('smooth_pt_bgnd_color');
		}

		$loader_selector = array('.edgt-smooth-transition-loader');

		if (!empty($loader_style)) {
			echo eldritch_edge_dynamic_css($loader_selector, $loader_style);
		}

		$spinner_style = array();

		if (eldritch_edge_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
			$spinner_style['background-color'] = eldritch_edge_options()->getOptionValue('smooth_pt_spinner_color');
		}

		$spinner_selectors = array(
			'.edgt-st-loader .pulse',
			'.edgt-st-loader .double_pulse .double-bounce1',
			'.edgt-st-loader .double_pulse .double-bounce2',
			'.edgt-st-loader .cube',
			'.edgt-st-loader .rotating_cubes .cube1',
			'.edgt-st-loader .rotating_cubes .cube2',
			'.edgt-st-loader .stripes > div',
			'.edgt-st-loader .wave > div',
			'.edgt-st-loader .two_rotating_circles .dot1',
			'.edgt-st-loader .two_rotating_circles .dot2',
			'.edgt-st-loader .five_rotating_circles .container1 > div',
			'.edgt-st-loader .five_rotating_circles .container2 > div',
			'.edgt-st-loader .five_rotating_circles .container3 > div',
			'.edgt-st-loader .atom .ball-1:before',
			'.edgt-st-loader .atom .ball-2:before',
			'.edgt-st-loader .atom .ball-3:before',
			'.edgt-st-loader .atom .ball-4:before',
			'.edgt-st-loader .clock .ball:before',
			'.edgt-st-loader .mitosis .ball',
			'.edgt-st-loader .lines .line1',
			'.edgt-st-loader .lines .line2',
			'.edgt-st-loader .lines .line3',
			'.edgt-st-loader .lines .line4',
			'.edgt-st-loader .fussion .ball',
			'.edgt-st-loader .fussion .ball-1',
			'.edgt-st-loader .fussion .ball-2',
			'.edgt-st-loader .fussion .ball-3',
			'.edgt-st-loader .fussion .ball-4',
			'.edgt-st-loader .wave_circles .ball',
			'.edgt-st-loader .pulse_circles .ball'
		);

		if (!empty($spinner_style)) {
			echo eldritch_edge_dynamic_css($spinner_selectors, $spinner_style);
		}

		if (eldritch_edge_options()->getOptionValue('smooth_pt_spinner_type') == 'svg_spinner') {
			$svg_spinner_style = array();

			if (eldritch_edge_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
				$svg_spinner_style['stroke'] = eldritch_edge_options()->getOptionValue('smooth_pt_spinner_color');
			}

			if (!empty($svg_spinner_style)) {
				echo eldritch_edge_dynamic_css('.edgt-svg-spinner-holder svg>path', $svg_spinner_style);
			}
		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_smooth_page_transition_styles');
}

if (!function_exists('eldritch_edge_paspartu_styles')) {

	function eldritch_edge_paspartu_styles() {
		$paspartu_enabled = eldritch_edge_options()->getOptionValue('enable_paspartu') == 'yes';


		if ($paspartu_enabled) {

			$paspartu_style = array();
			$paspartu_selectors = array(
				'body.edgt-paspartu-enabled .edgt-wrapper-paspartu'
			);

			$paspartu_color = eldritch_edge_options()->getOptionValue('paspartu_color');
			$paspartu_size = eldritch_edge_options()->getOptionValue('paspartu_size');

			if ($paspartu_color !== '') {
				$paspartu_style['background-color'] = $paspartu_color;
			}

			if ($paspartu_size !== '') {
				$paspartu_style['padding'] = eldritch_edge_filter_px($paspartu_size) . 'px';
			}

			if (!empty($paspartu_style)) {
				echo eldritch_edge_dynamic_css($paspartu_selectors, $paspartu_style);
			}

		}
	}

	add_action('eldritch_edge_style_dynamic', 'eldritch_edge_paspartu_styles');
}

if (!function_exists('eldritch_edge_404_styles')) {

    function eldritch_edge_404_styles() {


        $not_found_style = array();
        $not_found_selectors = array(
            '.edgt-404-page'
        );

        $not_found_image = eldritch_edge_options()->getOptionValue('404_background_image');

        if ($not_found_image !== '') {
            $not_found_style['background-image'] = 'url('.esc_url($not_found_image).')';
        }

        if (!empty($not_found_style)) {
            echo eldritch_edge_dynamic_css($not_found_selectors, $not_found_style);
        }


        $not_found_style = array();
        $not_found_selectors = array(
            '.error404 header'
        );

        $not_found_header = eldritch_edge_options()->getOptionValue('404_header');

        if ($not_found_header == 'yes') {
            $not_found_style['display'] = 'none';
        }

        if (!empty($not_found_style)) {
            echo eldritch_edge_dynamic_css($not_found_selectors, $not_found_style);
        }

    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_404_styles');
}