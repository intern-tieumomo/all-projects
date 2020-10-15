<?php

if (!function_exists('eldritch_edge_header_meta_box_map')) {
	function eldritch_edge_header_meta_box_map() {

		$header_meta_box = eldritch_edge_create_meta_box(
			array(
                'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
				'title' => esc_html__('Header', 'eldritch'),
				'name'  => 'header_meta'
			)
		);

		$temp_holder_show = '';
		$temp_holder_hide = '';
		$temp_array_standard = array();
		$temp_array_minimal = array();
		$temp_array_centered = array();
		$temp_array_vertical = array();
		$temp_array_top_header = array(
			'hidden_value'  => 'default',
			'hidden_values' => array('header-vertical'));
		$temp_array_top_line = array(
			'hidden_value'  => 'default',
			'hidden_values' => array('header-vertical'));
		$temp_array_behaviour = array();
		switch (eldritch_edge_options()->getOptionValue('header_type')) {

			case 'header-standard':
				$temp_holder_show = '#edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_behaviour_meta';
				$temp_holder_hide = '#edgt_edgt_header_vertical_type_meta_container, #edgt_edgt_header_minimal_type_meta_container, #edgt_edgt_header_centered_type_meta_container';

				$temp_array_standard = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'header-vertical',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_minimal = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'',
						'header-standard',
						'header-vertical',
						'header-centered',
					)
				);

				$temp_array_centered = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'',
						'header-standard',
						'header-minimal',
						'header-vertical',
					)
				);

				$temp_array_vertical = array(
					'hidden_values' => array(
						'',
						'header-standard',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_behaviour = array(
					'hidden_values' => array('header-vertical')
				);

				break;

			case 'header-minimal':
				$temp_holder_show = '#edgt_edgt_header_minimal_type_meta_container, #edgt_edgt_header_behaviour_meta';
				$temp_holder_hide = '#edgt_edgt_header_vertical_type_meta_container, #edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_centered_type_meta_container';

				$temp_array_standard = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'',
						'header-vertical',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_minimal = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'header-standard',
						'header-vertical',
						'header-centered',
					)
				);

				$temp_array_centered = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'',
						'header-standard',
						'header-minimal',
						'header-vertical',
					)
				);


				$temp_array_vertical = array(
					'hidden_values' => array(
						'',
						'header-standard',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_behaviour = array(
					'hidden_values' => array('header-vertical')
				);

				break;

			case 'header-centered':
				$temp_holder_show = '#edgt_edgt_header_centered_type_meta_container, #edgt_edgt_header_behaviour_meta';
				$temp_holder_hide = '#edgt_edgt_header_vertical_type_meta_container, #edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_minimal_type_meta_container';

				$temp_array_standard = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'',
						'header-vertical',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_minimal = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'',
						'header-standard',
						'header-vertical',
						'header-centered',
					)
				);

				$temp_array_centered = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'header-standard',
						'header-minimal',
						'header-vertical',
					)
				);


				$temp_array_vertical = array(
					'hidden_values' => array(
						'',
						'header-standard',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_behaviour = array(
					'hidden_values' => array('header-vertical')
				);

				break;

			case 'header-vertical':
				$temp_holder_show = '#edgt_edgt_header_vertical_type_meta_container';
				$temp_holder_hide = '#edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_minimal_type_meta_container, #edgt_edgt_header_behaviour_meta, #edgt_edgt_header_centered_type_meta_container';

				$temp_array_standard = array(
					'hidden_values' => array(
						'',
						'header-vertical',
						'header-minimal',
						'header-centered',
					)
				);

				$temp_array_minimal = array(
					'hidden_values' => array(
						'',
						'header-vertical',
						'header-standard',
						'header-centered',
					)
				);

				$temp_array_centered = array(
					'hidden_values' => array(
						'',
						'header-standard',
						'header-minimal',
						'header-vertical',
					)
				);

				$temp_array_vertical = array(
					'hidden_value'  => 'default',
					'hidden_values' => array(
						'header-standard',
						'header-minimal',
						'header-centered',
					)
				);


				$temp_array_behaviour = array(
					'hidden_values' => array('', 'header-vertical')
				);

				break;
		}


		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $header_meta_box,
				'type'          => 'select',
				'name'          => 'edgt_enable_wide_menu_background_meta',
				'default_value' => '',
				'label'         => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'eldritch'),
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Choose Header Type', 'eldritch'),
				'description'   => esc_html__('Select header type layout', 'eldritch'),
				'parent'        => $header_meta_box,
				'options'       => array(
					''                         => 'Default',
					'header-standard'          => esc_html__('Standard Header', 'eldritch'),
					'header-minimal'           => esc_html__('Minimal Header', 'eldritch'),
					'header-centered'          => esc_html__('Centered Header', 'eldritch'),
					'header-vertical'          => esc_html__('Vertical Header', 'eldritch')
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""                         => $temp_holder_hide,
						'header-standard'          => '#edgt_edgt_header_vertical_type_meta_container, #edgt_edgt_header_minimal_type_meta_container, #edgt_edgt_header_centered_type_meta_container',
						'header-minimal'           => '#edgt_edgt_header_vertical_type_meta_container, #edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_centered_type_meta_container',
						'header-centered'          => '#edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_vertical_type_meta_container, #edgt_edgt_header_minimal_type_meta_container',
						'header-vertical'          => '#edgt_edgt_header_standard_type_meta_container, #edgt_edgt_header_minimal_type_meta_container, #edgt_edgt_top_bar_container_meta_container, #edgt_edgt_top_line_container_meta_container, #edgt_edgt_header_behaviour_meta, #edgt_edgt_header_centered_type_meta_container',
					),
					"show"       => array(
						""                         => $temp_holder_show,
						"header-standard"          => '#edgt_edgt_header_standard_type_meta_container, #edgt_edgt_top_bar_container_meta_container, #edgt_edgt_top_line_container_meta_container, #edgt_edgt_header_behaviour_meta',
						"header-minimal"           => '#edgt_edgt_header_minimal_type_meta_container, #edgt_edgt_top_bar_container_meta_container, #edgt_edgt_top_line_container_meta_container, #edgt_edgt_header_behaviour_meta',
						'header-centered'          => '#edgt_edgt_header_centered_type_meta_container, #edgt_edgt_top_bar_container_meta_container, #edgt_edgt_top_line_container_meta_container, #edgt_edgt_header_behaviour_meta',
						"header-vertical"          => '#edgt_edgt_header_vertical_type_meta_container'
					)
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'type'            => 'select',
					'name'            => 'edgt_header_behaviour_meta',
					'default_value'   => '',
					'label'           => esc_html__('Choose Header behaviour', 'eldritch'),
					'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'eldritch'),
					'options'         => array(
						''                                => '',
						'no-behavior'                     => esc_html__('No Behavior', 'eldritch'),
						'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'eldritch'),
						'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'eldritch'),
						'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'eldritch')
					),
					'hidden_property' => 'edgt_header_type_meta',
					'hidden_value'    => '',
					'args'            => array(
						'dependence' => true,
						'show'       => array(
							''                                => '',
							'sticky-header-on-scroll-up'      => '',
							'sticky-header-on-scroll-down-up' => '#edgt_edgt_sticky_amount_container_meta_container',
							'no-behavior'                     => ''
						),
						'hide'       => array(
							''                                => '#edgt_edgt_sticky_amount_container_meta_container',
							'sticky-header-on-scroll-up'      => '#edgt_edgt_sticky_amount_container_meta_container',
							'sticky-header-on-scroll-down-up' => '',
							'no-behavior'                     => '#edgt_edgt_sticky_amount_container_meta_container'
						)
					)
				),
				$temp_array_behaviour
			)
		);

		$sticky_amount_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'edgt_sticky_amount_container_meta_container',
				'hidden_property' => 'edgt_header_behaviour_meta',
				'hidden_value'    => '',
				'hidden_values'   => array('', 'no-behavior', 'sticky-header-on-scroll-up'),
			)
		);

		$sticky_amount_group = eldritch_edge_add_admin_group(array(
			'name'        => 'sticky_amount_group',
			'title'       => esc_html__('Scroll Amount for Sticky Header Appearance', 'eldritch'),
			'parent'      => $sticky_amount_container,
			'description' => esc_html__('Enter the amount of pixels for sticky header appearance, or set browser height to "Yes" for predefined sticky header appearance amount', 'eldritch')
		));

		$sticky_amount_row = eldritch_edge_add_admin_row(array(
			'name'   => 'sticky_amount_group',
			'parent' => $sticky_amount_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_scroll_amount_for_sticky_meta',
				'type'   => 'textsimple',
				'label'  => esc_html__('Amount in px', 'eldritch'),
				'parent' => $sticky_amount_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_scroll_amount_for_sticky_fullscreen_meta',
				'type'          => 'yesnosimple',
				'label'         => esc_html__('Browser Height', 'eldritch'),
				'default_value' => 'no',
				'parent'        => $sticky_amount_row
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Header Skin', 'eldritch'),
				'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'eldritch'),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => '',
					'light-header' => esc_html__('Light', 'eldritch'),
					'dark-header'  => esc_html__('Dark', 'eldritch')
				)
			)
		);

		/* Main menu per page style - START */

		$main_menu_style_group = eldritch_edge_add_admin_group(
			array(
				'name'        => 'main_menu_style_group',
				'title'       => esc_html__('Main Menu Style', 'eldritch'),
				'description' => esc_html__('Define styles for Main menu area', 'eldritch'),
				'parent'      => $header_meta_box
			)
		);

		$main_menu_style_row1 = eldritch_edge_add_admin_row(
			array(
				'name'   => 'main_menu_style_row1',
				'next'   => true,
				'parent' => $main_menu_style_group
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_menu_color_meta',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Color', 'eldritch'),
				'parent' => $main_menu_style_row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_menu_hovercolor_meta',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Hover Text Color', 'eldritch'),
				'parent' => $main_menu_style_row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_menu_activecolor_meta',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Active Text Color', 'eldritch'),
				'parent' => $main_menu_style_row1
			)
		);

		$main_menu_style_row2 = eldritch_edge_add_admin_row(
			array(
				'name'   => 'main_menu_style_row2',
				'next'   => true,
				'parent' => $main_menu_style_group
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_menu_text_background_color_meta',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Background Color', 'eldritch'),
				'parent' => $main_menu_style_row2
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_menu_hover_background_color_meta',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Hover Text Background Color', 'eldritch'),
				'parent' => $main_menu_style_row2
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_menu_active_background_color_meta',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Active Text Background Color', 'eldritch'),
				'parent' => $main_menu_style_row2
			)
		);

		/* Main menu per page style - END */

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $header_meta_box,
				'type'          => 'select',
				'name'          => 'edgt_enable_header_style_on_scroll_meta',
				'default_value' => '',
				'label'         => esc_html__('Enable Header Style on Scroll', 'eldritch'),
				'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'eldritch'),
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				)
			)
		);

		$header_standard_type_meta_container = eldritch_edge_add_admin_container(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'name'            => 'edgt_header_standard_type_meta_container',
					'hidden_property' => 'edgt_header_type_meta',

				),
				$temp_array_standard
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_custom_sidebar_header_standard_meta',
			'type'        => 'selectblank',
			'label'       => esc_html__('Choose Widget Area to Display', 'eldritch'),
			'description' => esc_html__('Choose Custom Widget area to display in Header', 'eldritch'),
			'parent'      => $header_standard_type_meta_container,
			'options'     => eldritch_edge_get_custom_sidebars()
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_position_header_standard_meta',
			'type'          => 'select',
			'label'         => esc_html__('Menu Area position', 'eldritch'),
			'description'   => esc_html__('Set menu area position', 'eldritch'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''       => esc_html__('Default', 'eldritch'),
				'center' => esc_html__('Center', 'eldritch'),
				'left'   => esc_html__('Left', 'eldritch'),
				'right'  => esc_html__('Right', 'eldritch'),
			)
		));


        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_menu_area_height_header_standard_meta',
                'type'        => 'text',
                'label'       => esc_html__('Menu Area Height', 'eldritch'),
                'description' => esc_html__('Enter header height', 'eldritch'),
                'parent'      => $header_standard_type_meta_container,
                'args'        => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_in_grid_header_standard_meta',
			'type'          => 'select',
			'label'         => esc_html__('Header In Grid', 'eldritch'),
			'description'   => esc_html__('Set header content to be in grid', 'eldritch'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_menu_area_in_grid_header_standard_container',
					'no'  => '#edgt_menu_area_in_grid_header_standard_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_menu_area_in_grid_header_standard_container'
				)
			)
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_sticky_header_in_grid_meta',
			'type'          => 'select',
			'label'         => esc_html__('Sticky Header In Grid', 'eldritch'),
			'description'   => esc_html__('Set sticky header content to be in grid', 'eldritch'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_menu_area_in_grid_header_standard_container',
					'no'  => '#edgt_menu_area_in_grid_header_standard_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_menu_area_in_grid_header_standard_container'
				)
			)
		));

		$menu_area_in_grid_header_standard_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'menu_area_in_grid_header_standard_container',
			'parent'          => $header_standard_type_meta_container,
			'hidden_property' => 'edgt_menu_area_in_grid_header_standard_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_grid_background_color_header_standard_meta',
				'type'        => 'color',
				'label'       => esc_html__('Grid Background Color', 'eldritch'),
				'description' => esc_html__('Set grid background color for header area', 'eldritch'),
				'parent'      => $menu_area_in_grid_header_standard_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_grid_background_transparency_header_standard_meta',
				'type'        => 'text',
				'label'       => esc_html__('Grid Background Transparency', 'eldritch'),
				'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $menu_area_in_grid_header_standard_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_in_grid_shadow_header_standard_meta',
			'type'          => 'select',
			'label'         => esc_html__('Grid Area Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on grid area', 'eldritch'),
			'parent'        => $menu_area_in_grid_header_standard_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_background_color_header_standard_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for header area', 'eldritch'),
				'parent'      => $header_standard_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_background_transparency_header_standard_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'eldritch'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $header_standard_type_meta_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_menu_area_disable_background_image_header_standard_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Disable Background Image', 'eldritch'),
                'description'   => esc_html__('Enabling this option will hide background image', 'eldritch'),
                'parent'        => $header_standard_type_meta_container,
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_menu_area_background_image_header_standard_container'
                    ),
                    'show'       => array(
                        ''    => '#edgt_edgt_menu_area_background_image_header_standard_container',
                        'no'  => '#edgt_edgt_menu_area_background_image_header_standard_container',
                        'yes' => ''
                    )
                )
            )
        );

        $menu_area_background_image_header_standard_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_standard_type_meta_container,
                'name'            => 'edgt_menu_area_background_image_header_standard_container',
                'hidden_property' => 'edgt_menu_area_disable_background_image_header_standard_meta',
                'hidden_value'    => 'yes',
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_menu_area_background_image_header_standard_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for header', 'eldritch'),
                'parent'        => $menu_area_background_image_header_standard_container
            )
        );

        eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_shadow_header_standard_meta',
			'type'          => 'select',
			'label'         => esc_html__('Header Area Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on header area', 'eldritch'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));


        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $header_standard_type_meta_container,
                'type'          => 'select',
                'name'          => 'edgt_menu_area_border_header_standard_meta',
                'default_value' => '',
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'label'         => esc_html__('Header Area Border', 'eldritch'),
                'description'   => esc_html__('Set border on header area', 'eldritch'),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '#edgt_edgt_menu_area_border_header_standard_container',
                        'no'  => '#edgt_edgt_menu_area_border_header_standard_container',
                        'yes' => ''
                    ),
                    'show'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_menu_area_border_header_standard_container'
                    )
                )
            )
        );

        $menu_area_border_header_standard_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_standard_type_meta_container,
                'name'            => 'edgt_menu_area_border_header_standard_container',
                'hidden_property' => 'edgt_menu_area_border_header_standard_meta',
                'hidden_value'    => 'no'
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $menu_area_border_header_standard_container,
                'type'          => 'color',
                'name'          => 'edgt_menu_area_border_color_header_standard_meta',
                'default_value' => '',
                'label'         => esc_html__('Header Area Border Color', 'eldritch'),
                'description'   => esc_html__('Set border color for header area', 'eldritch'),
            )
        );

		$header_minimal_type_meta_container = eldritch_edge_add_admin_container(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'name'            => 'edgt_header_minimal_type_meta_container',
					'hidden_property' => 'edgt_header_type_meta',

				),
				$temp_array_minimal
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_menu_area_height_header_minimal_meta',
                'type'        => 'text',
                'label'       => esc_html__('Menu Area Height', 'eldritch'),
                'description' => esc_html__('Enter header height', 'eldritch'),
                'parent'      => $header_minimal_type_meta_container,
                'args'        => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_in_grid_header_minimal_meta',
			'type'          => 'select',
			'label'         => esc_html__('Header In Grid', 'eldritch'),
			'description'   => esc_html__('Set header content to be in grid', 'eldritch'),
			'parent'        => $header_minimal_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_menu_area_in_grid_header_minimal_container',
					'no'  => '#edgt_menu_area_in_grid_header_minimal_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_menu_area_in_grid_header_minimal_container'
				)
			)
		));

		$menu_area_in_grid_header_minimal_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'menu_area_in_grid_header_minimal_container',
			'parent'          => $header_minimal_type_meta_container,
			'hidden_property' => 'edgt_menu_area_in_grid_header_minimal_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_grid_background_color_header_minimal_meta',
				'type'        => 'color',
				'label'       => esc_html__('Grid Background Color', 'eldritch'),
				'description' => esc_html__('Set grid background color for header area', 'eldritch'),
				'parent'      => $menu_area_in_grid_header_minimal_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_grid_background_transparency_header_minimal_meta',
				'type'        => 'text',
				'label'       => esc_html__('Grid Background Transparency', 'eldritch'),
				'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $menu_area_in_grid_header_minimal_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_in_grid_shadow_header_minimal_meta',
			'type'          => 'select',
			'label'         => esc_html__('Grid Area Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on grid area', 'eldritch'),
			'parent'        => $menu_area_in_grid_header_minimal_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_background_color_header_minimal_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for header area', 'eldritch'),
				'parent'      => $header_minimal_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_background_transparency_header_minimal_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'eldritch'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $header_minimal_type_meta_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_menu_area_disable_background_image_header_minimal_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Disable Background Image', 'eldritch'),
                'description'   => esc_html__('Enabling this option will hide background image', 'eldritch'),
                'parent'        => $header_minimal_type_meta_container,
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_menu_area_background_image_header_minimal_container'
                    ),
                    'show'       => array(
                        ''    => '#edgt_edgt_menu_area_background_image_header_minimal_container',
                        'no'  => '#edgt_edgt_menu_area_background_image_header_minimal_container',
                        'yes' => ''
                    )
                )
            )
        );

        $menu_area_background_image_header_minimal_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_minimal_type_meta_container,
                'name'            => 'edgt_menu_area_background_image_header_minimal_container',
                'hidden_property' => 'edgt_menu_area_disable_background_image_header_minimal_meta',
                'hidden_value'    => 'yes',
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_menu_area_background_image_header_minimal_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for header', 'eldritch'),
                'parent'        => $menu_area_background_image_header_minimal_container
            )
        );

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_shadow_header_minimal_meta',
			'type'          => 'select',
			'label'         => esc_html__('Header Area Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on header area', 'eldritch'),
			'parent'        => $header_minimal_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));


        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $header_minimal_type_meta_container,
                'type'          => 'select',
                'name'          => 'edgt_menu_area_border_header_minimal_meta',
                'default_value' => '',
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'label'         => esc_html__('Header Area Border', 'eldritch'),
                'description'   => esc_html__('Set border on header area', 'eldritch'),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '#edgt_edgt_menu_area_border_header_minimal_container',
                        'no'  => '#edgt_edgt_menu_area_border_header_minimal_container',
                        'yes' => ''
                    ),
                    'show'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_menu_area_border_header_minimal_container'
                    )
                )
            )
        );

        $menu_area_border_header_minimal_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_minimal_type_meta_container,
                'name'            => 'edgt_menu_area_border_header_minimal_container',
                'hidden_property' => 'edgt_menu_area_border_header_minimal_meta',
                'hidden_value'    => 'no'
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $menu_area_border_header_minimal_container,
                'type'          => 'color',
                'name'          => 'edgt_menu_area_border_color_header_minimal_meta',
                'default_value' => '',
                'label'         => esc_html__('Header Area Border Color', 'eldritch'),
                'description'   => esc_html__('Set border color for header area', 'eldritch'),
            )
        );

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_fullscreen_menu_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Fullscreen Background Image', 'eldritch'),
				'description'   => esc_html__('Set background image for Fullscreen Menu', 'eldritch'),
				'parent'        => $header_minimal_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_disable_fullscreen_menu_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Disable Fullscreen Background Image', 'eldritch'),
				'description'   => esc_html__('Enabling this option will hide background image in Fullscreen Menu', 'eldritch'),
				'parent'        => $header_minimal_type_meta_container
			)
		);

		$header_centered_type_meta_container = eldritch_edge_add_admin_container(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'name'            => 'edgt_header_centered_type_meta_container',
					'hidden_property' => 'edgt_header_type_meta',

				),
				$temp_array_centered
			)
		);

		eldritch_edge_add_admin_section_title(array(
			'name'   => 'logo_area_centered_title',
			'parent' => $header_centered_type_meta_container,
			'title'  => esc_html__('Logo Area', 'eldritch')
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_logo_area_in_grid_header_centered_meta',
			'type'          => 'select',
			'label'         => esc_html__('Logo Area In Grid', 'eldritch'),
			'description'   => esc_html__('Set logo area content to be in grid', 'eldritch'),
			'parent'        => $header_centered_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_logo_area_in_grid_header_centered_container',
					'no'  => '#edgt_logo_area_in_grid_header_centered_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_logo_area_in_grid_header_centered_container'
				)
			)
		));

		$logo_area_in_grid_header_centered_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'logo_area_in_grid_header_centered_container',
			'parent'          => $header_centered_type_meta_container,
			'hidden_property' => 'edgt_logo_area_in_grid_header_centered_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_logo_area_grid_background_color_header_centered_meta',
				'type'        => 'color',
				'label'       => esc_html__('Grid Background Color', 'eldritch'),
				'description' => esc_html__('Set grid background color for logo area', 'eldritch'),
				'parent'      => $logo_area_in_grid_header_centered_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_logo_area_grid_background_transparency_header_centered_meta',
				'type'        => 'text',
				'label'       => esc_html__('Grid Background Transparency', 'eldritch'),
				'description' => esc_html__('Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $logo_area_in_grid_header_centered_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_logo_area_in_grid_border_header_centered_meta',
			'type'          => 'select',
			'label'         => esc_html__('Grid Area Border', 'eldritch'),
			'description'   => esc_html__('Set border on grid area', 'eldritch'),
			'parent'        => $logo_area_in_grid_header_centered_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_logo_area_in_grid_border_header_centered_container',
					'no'  => '#edgt_logo_area_in_grid_border_header_centered_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_logo_area_in_grid_border_header_centered_container'
				)
			)
		));

		$logo_area_in_grid_border_header_centered_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'logo_area_in_grid_border_header_centered_container',
			'parent'          => $logo_area_in_grid_header_centered_container,
			'hidden_property' => 'edgt_logo_area_in_grid_border_header_centered_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_logo_area_in_grid_border_color_header_centered_meta',
			'type'        => 'color',
			'label'       => esc_html__('Border Color', 'eldritch'),
			'description' => esc_html__('Set border color for grid area', 'eldritch'),
			'parent'      => $logo_area_in_grid_border_header_centered_container
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_logo_area_background_color_header_centered_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for logo area', 'eldritch'),
				'parent'      => $header_centered_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_logo_area_background_transparency_header_centered_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'eldritch'),
				'description' => esc_html__('Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $header_centered_type_meta_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_area_disable_background_image_header_centered_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Disable Background Image', 'eldritch'),
                'description'   => esc_html__('Enabling this option will hide background image', 'eldritch'),
                'parent'        => $header_centered_type_meta_container,
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_logo_area_background_image_header_centered_container'
                    ),
                    'show'       => array(
                        ''    => '#edgt_edgt_logo_area_background_image_header_centered_container',
                        'no'  => '#edgt_edgt_logo_area_background_image_header_centered_container',
                        'yes' => ''
                    )
                )
            )
        );

        $logo_area_background_image_header_centered_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_centered_type_meta_container,
                'name'            => 'edgt_logo_area_background_image_header_centered_container',
                'hidden_property' => 'edgt_logo_area_disable_background_image_header_centered_meta',
                'hidden_value'    => 'yes',
            )
        );



        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_area_background_image_header_centered_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for logo area', 'eldritch'),
                'parent'        => $logo_area_background_image_header_centered_container
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $header_centered_type_meta_container,
                'type'          => 'text',
                'name'          => 'edgt_logo_area_height_header_centered_meta',
                'default_value' => '',
                'label'         => esc_html__('Height', 'eldritch'),
                'description'   => esc_html__('Enter logo area height', 'eldritch'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_logo_area_border_header_centered_meta',
			'type'          => 'select',
			'label'         => esc_html__('Logo Area Border', 'eldritch'),
			'description'   => esc_html__('Set border on logo area', 'eldritch'),
			'parent'        => $header_centered_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_logo_border_bottom_color_container',
					'no'  => '#edgt_logo_border_bottom_color_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_logo_border_bottom_color_container'
				)
			)
		));

		$border_bottom_color_centered_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'logo_border_bottom_color_container',
			'parent'          => $header_centered_type_meta_container,
			'hidden_property' => 'edgt_logo_area_border_header_centered_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_logo_area_border_color_header_centered_meta',
			'type'        => 'color',
			'label'       => esc_html__('Border Color', 'eldritch'),
			'description' => esc_html__('Choose color of logo area bottom border', 'eldritch'),
			'parent'      => $border_bottom_color_centered_container
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_logo_wrapper_padding_header_centered_meta',
				'type'        => 'text',
				'label'       => esc_html__('Logo Padding', 'eldritch'),
				'description' => esc_html__('Insert padding in format: 0px 0px 1px 0px', 'eldritch'),
				'parent'      => $header_centered_type_meta_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		eldritch_edge_add_admin_section_title(array(
			'name'   => 'menu_area_centered_title',
			'parent' => $header_centered_type_meta_container,
			'title'  => esc_html__('Menu Area', 'eldritch')
		));

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_menu_area_height_header_centered_meta',
                'type'        => 'text',
                'label'       => esc_html__('Menu Area Height', 'eldritch'),
                'description' => esc_html__('Enter header height', 'eldritch'),
                'parent'      => $header_centered_type_meta_container,
                'args'        => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_in_grid_header_centered_meta',
			'type'          => 'select',
			'label'         => esc_html__('Menu Area In Grid', 'eldritch'),
			'description'   => esc_html__('Set menu area content to be in grid', 'eldritch'),
			'parent'        => $header_centered_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_menu_area_in_grid_header_centered_container',
					'no'  => '#edgt_menu_area_in_grid_header_centered_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_menu_area_in_grid_header_centered_container'
				)
			)
		));

		$menu_area_in_grid_header_centered_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'menu_area_in_grid_header_centered_container',
			'parent'          => $header_centered_type_meta_container,
			'hidden_property' => 'edgt_menu_area_in_grid_header_centered_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_grid_background_color_header_centered_meta',
				'type'        => 'color',
				'label'       => esc_html__('Grid Background Color', 'eldritch'),
				'description' => esc_html__('Set grid background color for menu area', 'eldritch'),
				'parent'      => $menu_area_in_grid_header_centered_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_grid_background_transparency_header_centered_meta',
				'type'        => 'text',
				'label'       => esc_html__('Grid Background Transparency', 'eldritch'),
				'description' => esc_html__('Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $menu_area_in_grid_header_centered_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_in_grid_shadow_header_centered_meta',
			'type'          => 'select',
			'label'         => esc_html__('Grid Area Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on grid area', 'eldritch'),
			'parent'        => $menu_area_in_grid_header_centered_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_background_color_header_centered_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for menu area', 'eldritch'),
				'parent'      => $header_centered_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_menu_area_background_transparency_header_centered_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'eldritch'),
				'description' => esc_html__('Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'eldritch'),
				'parent'      => $header_centered_type_meta_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_menu_area_disable_background_image_header_centered_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Disable Background Image', 'eldritch'),
                'description'   => esc_html__('Enabling this option will hide background image', 'eldritch'),
                'parent'        => $header_centered_type_meta_container,
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_menu_area_background_image_header_centered_container'
                    ),
                    'show'       => array(
                        ''    => '#edgt_edgt_menu_area_background_image_header_centered_container',
                        'no'  => '#edgt_edgt_menu_area_background_image_header_centered_container',
                        'yes' => ''
                    )
                )
            )
        );

        $menu_area_background_image_header_centered_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_centered_type_meta_container,
                'name'            => 'edgt_menu_area_background_image_header_centered_container',
                'hidden_property' => 'edgt_menu_area_disable_background_image_header_centered_meta',
                'hidden_value'    => 'yes',
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_menu_area_background_image_header_centered_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for menu area', 'eldritch'),
                'parent'        => $menu_area_background_image_header_centered_container
            )
        );


        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $header_centered_type_meta_container,
                'type'          => 'select',
                'name'          => 'edgt_menu_area_border_header_centered_meta',
                'default_value' => '',
                'options'       => array(
                    ''    => '',
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                ),
                'label'         => esc_html__('Header Area Border', 'eldritch'),
                'description'   => esc_html__('Set border on header area', 'eldritch'),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '#edgt_edgt_menu_area_border_header_centered_container',
                        'no'  => '#edgt_edgt_menu_area_border_header_centered_container',
                        'yes' => ''
                    ),
                    'show'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#edgt_edgt_menu_area_border_header_centered_container'
                    )
                )
            )
        );

        $menu_area_border_header_centered_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $header_centered_type_meta_container,
                'name'            => 'edgt_menu_area_border_header_centered_container',
                'hidden_property' => 'edgt_menu_area_border_header_centered_meta',
                'hidden_values'    => array('no', '')
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'parent'        => $menu_area_border_header_centered_container,
                'type'          => 'color',
                'name'          => 'edgt_menu_area_border_color_header_centered_meta',
                'default_value' => '',
                'label'         => esc_html__('Header Area Border Color', 'eldritch'),
                'description'   => esc_html__('Set border color for header area', 'eldritch'),
            )
        );

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_menu_area_shadow_header_centered_meta',
			'type'          => 'select',
			'label'         => esc_html__('Menu Area Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on menu area', 'eldritch'),
			'parent'        => $header_centered_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));


		$top_bar_container = eldritch_edge_add_admin_container(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'name'            => 'edgt_top_bar_container_meta_container',
					'hidden_property' => 'edgt_header_type_meta',

				),
				$temp_array_top_header
			)
		);

		eldritch_edge_add_admin_section_title(array(
			'name'   => 'top_bar_section_title',
			'parent' => $top_bar_container,
			'title'  => esc_html__('Top Bar', 'eldritch')
		));

		$top_bar_global_option = eldritch_edge_options()->getOptionValue('top_bar');

		$top_bar_default_dependency = array(
			'' => '#edgt_top_bar_container_no_style'
		);

		$top_bar_show_array = array(
			'yes' => '#edgt_top_bar_container_no_style'
		);

		$top_bar_hide_array = array(
			'no' => '#edgt_top_bar_container_no_style'
		);

		if ($top_bar_global_option === 'yes') {
			$top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
			$top_bar_container_hide_array = array('no');
		} else {
			$top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
			$top_bar_container_hide_array = array('', 'no');
		}


		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_top_bar_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Top Bar on This Page', 'eldritch'),
			'description'   => esc_html__('Enabling this option will enable top bar on this page', 'eldritch'),
			'parent'        => $top_bar_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'show'       => $top_bar_show_array,
				'hide'       => $top_bar_hide_array
			)
		));

		$top_bar_container = eldritch_edge_add_admin_container_no_style(array(
			'name'            => 'top_bar_container_no_style',
			'parent'          => $top_bar_container,
			'hidden_property' => 'edgt_top_bar_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => $top_bar_container_hide_array
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_top_bar_in_grid_meta',
			'type'          => 'select',
			'label'         => esc_html__('Top Bar In Grid', 'eldritch'),
			'description'   => esc_html__('Set top bar content to be in grid', 'eldritch'),
			'parent'        => $top_bar_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));

		eldritch_edge_create_meta_box_field(array(
			'name'    => 'edgt_top_bar_skin_meta',
			'type'    => 'select',
			'label'   => esc_html__('Top Bar Skin', 'eldritch'),
			'options' => array(
				''      => esc_html__('Default', 'eldritch'),
				'light' => esc_html__('White', 'eldritch'),
				'dark'  => esc_html__('Black', 'eldritch'),
				'gray'  => esc_html__('Gray', 'eldritch'),
			),
			'parent'  => $top_bar_container
		));

		eldritch_edge_create_meta_box_field(array(
			'name'   => 'edgt_top_bar_background_color_meta',
			'type'   => 'color',
			'label'  => esc_html__('Top Bar Background Color', 'eldritch'),
			'parent' => $top_bar_container
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_top_bar_background_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Top Bar Background Color Transparency', 'eldritch'),
			'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'eldritch'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 3
			)
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_top_bar_border_meta',
			'type'          => 'select',
			'label'         => esc_html__('Top Bar Border', 'eldritch'),
			'description'   => esc_html__('Set border on top bar', 'eldritch'),
			'parent'        => $top_bar_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#edgt_top_bar_border_container',
					'no'  => '#edgt_top_bar_border_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#edgt_top_bar_border_container'
				)
			)
		));

		$top_bar_border_container = eldritch_edge_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'top_bar_border_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'edgt_top_bar_border_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_top_bar_border_color_meta',
			'type'        => 'color',
			'label'       => esc_html__('Border Color', 'eldritch'),
			'description' => esc_html__('Choose color for top bar border', 'eldritch'),
			'parent'      => $top_bar_border_container
		));


		$top_line_container = eldritch_edge_add_admin_container(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'name'            => 'edgt_top_line_container_meta_container',
					'hidden_property' => 'edgt_header_type_meta',

				),
				$temp_array_top_line
			)
		);

		eldritch_edge_add_admin_section_title(array(
			'name'   => 'top_line_section_title',
			'parent' => $top_line_container,
			'title'  => esc_html__('Top LIne', 'eldritch')
		));

		$top_line_global_option = eldritch_edge_options()->getOptionValue('top_line');

		$top_line_default_dependency = array(
			'' => '#edgt_top_line_container_no_style'
		);

		$top_line_show_array = array(
			'yes' => '#edgt_top_line_container_no_style'
		);

		$top_line_hide_array = array(
			'no' => '#edgt_top_line_container_no_style'
		);

		if ($top_line_global_option === 'yes') {
			$top_line_show_array = array_merge($top_line_show_array, $top_line_default_dependency);
			$top_line_container_hide_array = array('no');
		} else {
			$top_line_hide_array = array_merge($top_line_hide_array, $top_line_default_dependency);
			$top_line_container_hide_array = array('', 'no');
		}


		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_top_line_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Top Line on This Page', 'eldritch'),
			'description'   => esc_html__('Enabling this option will enable top line on this page', 'eldritch'),
			'parent'        => $top_line_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch'),
				'no'  => esc_html__('No', 'eldritch')
			),
			'args'          => array(
				'dependence' => true,
				'show'       => $top_line_show_array,
				'hide'       => $top_line_hide_array
			)
		));

		$top_line_container = eldritch_edge_add_admin_container_no_style(array(
			'name'            => 'top_line_container_no_style',
			'parent'          => $top_line_container,
			'hidden_property' => 'edgt_top_line_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => $top_line_container_hide_array
		));

		$group_top_line_colors = eldritch_edge_add_admin_group(array(
			'name'        => 'group_line_colors',
			'title'       => esc_html__('Top Line Colors', 'eldritch'),
			'description' => esc_html__('Define colors for top line (not all of them are mandatory)', 'eldritch'),
			'parent'      => $top_line_container
		));

		eldritch_edge_create_meta_box_field(array(
			'name'   => 'edgt_top_line_color_1_meta',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 1', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_create_meta_box_field(array(
			'name'   => 'edgt_top_line_color_2_meta',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 2', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_create_meta_box_field(array(
			'name'   => 'edgt_top_line_color_3_meta',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 3', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_create_meta_box_field(array(
			'name'   => 'edgt_top_line_color_4_meta',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 4', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		$header_vertical_type_meta_container = eldritch_edge_add_admin_container(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'name'            => 'edgt_header_vertical_type_meta_container',
					'hidden_property' => 'edgt_header_type_meta'
				),
				$temp_array_vertical
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_vertical_header_background_color_meta',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'eldritch'),
			'description' => esc_html__('Set background color for vertical menu', 'eldritch'),
			'parent'      => $header_vertical_type_meta_container
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Background Image', 'eldritch'),
				'description'   => esc_html__('Set background image for vertical menu', 'eldritch'),
				'parent'        => $header_vertical_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Disable Background Image', 'eldritch'),
				'description'   => esc_html__('Enabling this option will hide background image in Vertical Menu', 'eldritch'),
				'parent'        => $header_vertical_type_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_vertical_header_shadow_meta',
			'type'          => 'select',
			'label'         => esc_html__('Shadow', 'eldritch'),
			'description'   => esc_html__('Set shadow on vertical menu', 'eldritch'),
			'parent'        => $header_vertical_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_vertical_header_center_content_meta',
			'type'          => 'select',
			'label'         => esc_html__('Center Content', 'eldritch'),
			'description'   => esc_html__('Set content in vertical center', 'eldritch'),
			'parent'        => $header_vertical_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'eldritch'),
				'yes' => esc_html__('Yes', 'eldritch')
			)
		));

	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_header_meta_box_map');
}
