<?php

if (!function_exists('eldritch_edge_general_options_map')) {
	/**
	 * General options page
	 */
	function eldritch_edge_general_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__('General', 'eldritch'),
				'icon'  => 'fa fa-institution'
			)
		);

		$panel_design_style = eldritch_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__('Appearance', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'description'   => esc_html__('Choose a default Google font for your site', 'eldritch'),
				'parent'        => $panel_design_style
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Additional Google Fonts', 'eldritch'),
				'description'   => '',
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_additional_google_fonts_container"
				)
			)
		);

		$additional_google_fonts_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'description'   => esc_html__('Choose additional Google font for your site', 'eldritch'),
				'parent'        => $additional_google_fonts_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'description'   => esc_html__('Choose additional Google font for your site', 'eldritch'),
				'parent'        => $additional_google_fonts_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'description'   => esc_html__('Choose additional Google font for your site', 'eldritch'),
				'parent'        => $additional_google_fonts_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'description'   => esc_html__('Choose additional Google font for your site', 'eldritch'),
				'parent'        => $additional_google_fonts_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'description'   => esc_html__('Choose additional Google font for your site', 'eldritch'),
				'parent'        => $additional_google_fonts_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__('First Main Color', 'eldritch'),
				'description' => esc_html__('Choose the most dominant theme color. Default color is #ff1d4d', 'eldritch'),
				'parent'      => $panel_design_style
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__('Page Background Color', 'eldritch'),
				'description' => esc_html__('Choose the background color for page content. Default color is #ffffff', 'eldritch'),
				'parent'      => $panel_design_style
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'comments_background_color',
				'type'        => 'color',
				'label'       => esc_html__('Comments Background Color', 'eldritch'),
				'description' => esc_html__('Choose comments background color', 'eldritch'),
				'parent'      => $panel_design_style
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__('Text Selection Color', 'eldritch'),
				'description' => esc_html__('Choose the color users see when selecting text', 'eldritch'),
				'parent'      => $panel_design_style
			)
		);

		$group_gradient = eldritch_edge_add_admin_group(array(
			'name'        => 'group_gradient',
			'title'       => esc_html__('Gradient Colors', 'eldritch'),
			'description' => esc_html__('Define colors for gradient styles', 'eldritch'),
			'parent'      => $panel_design_style
		));

		$row_gradient_style1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_gradient_style1',
			'parent' => $group_gradient
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style1_start_color',
			'default_value' => '#0090f0',
			'label'         => esc_html__('Style 1 - Start Color (def. #0090f0)', 'eldritch'),
			'parent'        => $row_gradient_style1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style1_end_color',
			'default_value' => '#00edfd',
			'label'         => esc_html__('Style 1 - End Color (def. #00edfd)', 'eldritch'),
			'parent'        => $row_gradient_style1
		));

		$row_gradient_style2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_gradient_style2',
			'parent' => $group_gradient
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style2_start_color',
			'default_value' => '#ad6ef0',
			'label'         => esc_html__('Style 2 - Start Color (def. #ad6ef0)', 'eldritch'),
			'parent'        => $row_gradient_style2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style2_end_color',
			'default_value' => '#03a9f5',
			'label'         => esc_html__('Style 2 - End Color (def. #03a9f5)', 'eldritch'),
			'parent'        => $row_gradient_style2
		));

		$row_gradient_style3 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_gradient_style3',
			'parent' => $group_gradient
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style3_start_color',
			'default_value' => '#3b3860',
			'label'         => esc_html__('Style 3 - Start Color (def. #3b3860)', 'eldritch'),
			'parent'        => $row_gradient_style3
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style3_end_color',
			'default_value' => '#5d569f',
			'label'         => esc_html__('Style 3 - End Color (def. #5d569f)', 'eldritch'),
			'parent'        => $row_gradient_style3
		));

		$row_gradient_style4 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_gradient_style4',
			'parent' => $group_gradient
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style4_start_color',
			'default_value' => '#32343a',
			'label'         => esc_html__('Style 4 - Start Color (def. #32343a)', 'eldritch'),
			'parent'        => $row_gradient_style4
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'gradient_style4_end_color',
			'default_value' => '#bfa155',
			'label'         => esc_html__('Style 4 - End Color (def. #bfa155)', 'eldritch'),
			'parent'        => $row_gradient_style4
		));

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Boxed Layout', 'eldritch'),
				'description'   => '',
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_boxed_container"
				)
			)
		);

		$boxed_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'boxed_container',
				'hidden_property' => 'boxed',
				'hidden_value'    => 'no'
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'header_footer_in_box',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Boxed Layout Header/Footer', 'eldritch'),
                'description'   => esc_html__('Choose if the Header and the Footer will be placed in a boxed layout or fullwidth.', 'eldritch'),
                'parent'        => $boxed_container
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'page_background_color_in_box',
				'type'        => 'color',
				'label'       => esc_html__('Page Background Color', 'eldritch'),
				'description' => esc_html__('Choose the page background color outside box.', 'eldritch'),
				'parent'      => $boxed_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'boxed_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'eldritch'),
				'description' => esc_html__('Choose an image to be displayed in background', 'eldritch'),
				'parent'      => $boxed_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'boxed_pattern_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Pattern', 'eldritch'),
				'description' => esc_html__('Choose an image to be used as background pattern', 'eldritch'),
				'parent'      => $boxed_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__('Background Image Attachment', 'eldritch'),
				'description'   => esc_html__('Choose background image attachment', 'eldritch'),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__('Fixed', 'eldritch'),
					'scroll' => esc_html__('Scroll', 'eldritch')
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
                'parent'        => $panel_design_style,
				'default_value' => 'grid-1300',
				'label'         => esc_html__('Initial Width of Content', 'eldritch'),
				'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"', 'eldritch'),
				'options'       => array(
					"grid-1300" => esc_html__("1300px - default", 'eldritch'),
					"grid-1200" => esc_html__("1200px", 'eldritch'),
					""          => esc_html__("1100px", 'eldritch'),
					"grid-1000" => esc_html__("1000px", 'eldritch'),
					"grid-800"  => esc_html__("800px", 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'preload_pattern_image',
				'type'        => 'image',
				'label'       => esc_html__('Preload Pattern Image', 'eldritch'),
				'description' => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'eldritch'),
				'parent'      => $panel_design_style
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'element_appear_amount',
				'type'        => 'text',
				'label'       => esc_html__('Element Appearance', 'eldritch'),
				'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'eldritch'),
				'parent'      => $panel_design_style,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'enable_paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Passepartout', 'eldritch'),
				'description'   => esc_html__('Enabling this option will display passepartout around site content', 'eldritch'),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_paspartu_container"
				)
			)
		);

		$paspartu_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'paspartu_container',
				'hidden_property' => 'enable_paspartu',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'paspartu_color',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Color', 'eldritch'),
				'description'   => esc_html__('Choose passepartout color. Default value is #fff', 'eldritch'),
				'parent'        => $paspartu_container,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'paspartu_size',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Size', 'eldritch'),
				'description'   => esc_html__('Enter size amount for passepartout.Default value is 15px', 'eldritch'),
				'parent'        => $paspartu_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		eldritch_edge_add_admin_field(
			array(
				'name'          => 'paspartu_mobile_size',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Size on Mobile Devices', 'eldritch'),
				'description'   => esc_html__('Enter size amount for passepartout on mobile devices. Default value is 10px', 'eldritch'),
				'parent'        => $paspartu_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);


		$panel_settings = eldritch_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__('Behavior', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Smooth Scroll', 'eldritch'),
				'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'eldritch'),
				'parent'        => $panel_settings
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Smooth Page Transitions', 'eldritch'),
				'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'eldritch'),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_page_transitions_container"
				)
			)
		);

		$page_transitions_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_settings,
				'name'            => 'page_transitions_container',
				'hidden_property' => 'smooth_page_transitions',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'   => 'smooth_pt_bgnd_color',
				'type'   => 'color',
				'label'  => esc_html__('Page Loader Background Color', 'eldritch'),
				'parent' => $page_transitions_container
			)
		);

		$group_pt_spinner_animation = eldritch_edge_add_admin_group(array(
			'name'        => 'group_pt_spinner_animation',
			'title'       => esc_html__('Loader Style', 'eldritch'),
			'description' => esc_html__('Define styles for loader spinner animation', 'eldritch'),
			'parent'      => $page_transitions_container
		));

		$row_pt_spinner_animation = eldritch_edge_add_admin_row(array(
			'name'   => 'row_pt_spinner_animation',
			'parent' => $group_pt_spinner_animation
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectsimple',
			'name'          => 'smooth_pt_spinner_type',
			'default_value' => 'eldritch',
			'label'         => esc_html__('Spinner Type', 'eldritch'),
			'parent'        => $row_pt_spinner_animation,
			'options'       => array(
				"eldritch"    		=> esc_html__("Eldritch", 'eldritch'),
			    "pulse" => esc_html__("Pulse", "eldritch"),
			    "double_pulse" => esc_html__("Double Pulse", "eldritch"),
			    "cube" => esc_html__("Cube", "eldritch"),
			    "rotating_cubes" => esc_html__("Rotating Cubes", "eldritch"),
			    "stripes" => esc_html__("Stripes", "eldritch"),
			    "wave" =>esc_html__( "Wave", "eldritch"),
			    "two_rotating_circles" => esc_html__("2 Rotating Circles", "eldritch"),
			    "five_rotating_circles" => esc_html__("5 Rotating Circles", "eldritch"),
			    "atom" => esc_html__("Atom", "eldritch"),
			    "clock" => esc_html__("Clock", "eldritch"),
			    "mitosis" => esc_html__("Mitosis", "eldritch"),
			    "lines" => esc_html__("Lines", "eldritch"),
			    "fussion" => esc_html__("Fussion", "eldritch"),
			    "wave_circles" => esc_html__("Wave Circles", "eldritch"),
			    "pulse_circles" => esc_html__("Pulse Circles", "eldritch")
			),
			'args' => array(
			    "dependence"             => true,
			    'show' => array(
					"eldritch"    			=> "",
			        "pulse"                 => "#edgt_smooth_pt_spinner_color",
			        "double_pulse"          => "#edgt_smooth_pt_spinner_color",
			        "cube"                  => "#edgt_smooth_pt_spinner_color",
			        "rotating_cubes"        => "#edgt_smooth_pt_spinner_color",
			        "stripes"               => "#edgt_smooth_pt_spinner_color",
			        "wave"                  => "#edgt_smooth_pt_spinner_color",
			        "two_rotating_circles"  => "#edgt_smooth_pt_spinner_color",
			        "five_rotating_circles" => "#edgt_smooth_pt_spinner_color",
			        "atom"                  => "#edgt_smooth_pt_spinner_color",
			        "clock"                 => "#edgt_smooth_pt_spinner_color",
			        "mitosis"               => "#edgt_smooth_pt_spinner_color",
			        "lines"                 => "#edgt_smooth_pt_spinner_color",
			        "fussion"               => "#edgt_smooth_pt_spinner_color",
			        "wave_circles"          => "#edgt_smooth_pt_spinner_color",
			        "pulse_circles"         => "#edgt_smooth_pt_spinner_color"
			    ),
			    'hide' => array(
					"eldritch"    			=> "#edgt_smooth_pt_spinner_color",
			        "pulse"                 => "",
			        "double_pulse"          => "",
			        "cube"                  => "",
			        "rotating_cubes"        => "",
			        "stripes"               => "",
			        "wave"                  => "",
			        "two_rotating_circles"  => "",
			        "five_rotating_circles" => "",
			        "atom"                  => "",
			        "clock"                 => "",
			        "mitosis"               => "",
			        "lines"                 => "",
			        "fussion"               => "",
			        "wave_circles"          => "",
			        "pulse_circles"         => ""
			    )
			)
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'smooth_pt_spinner_color',
			'default_value' => '',
			'label'         => esc_html__('Spinner Color', 'eldritch'),
			'parent'        => $row_pt_spinner_animation
		));

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'elements_animation_on_touch',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Elements Animation on Mobile/Touch Devices', 'eldritch'),
				'description'   => esc_html__('Enabling this option will allow elements (shortcodes) to animate on mobile / touch devices', 'eldritch'),
				'parent'        => $panel_settings
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Show "Back To Top Button"', 'eldritch'),
				'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'eldritch'),
				'parent'        => $panel_settings
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Responsiveness', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make all pages responsive', 'eldritch'),
				'parent'        => $panel_settings
			)
		);

		$panel_custom_code = eldritch_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__('Custom Code', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__('Custom CSS', 'eldritch'),
				'description' => esc_html__('Enter your custom CSS here', 'eldritch'),
				'parent'      => $panel_custom_code
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__('Custom JS', 'eldritch'),
				'description' => esc_html__('Enter your custom Javascript here', 'eldritch'),
				'parent'      => $panel_custom_code
			)
		);

		$panel_google_api = eldritch_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__('Google API', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__('Google Maps Api Key', 'eldritch'),
				'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'eldritch'),
				'parent'      => $panel_google_api
			)
		);
	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_general_options_map', 1);

}