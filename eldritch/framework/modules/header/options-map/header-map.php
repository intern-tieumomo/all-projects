<?php

if (!function_exists('eldritch_edge_header_options_map')) {

	function eldritch_edge_header_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_header_page',
				'title' => esc_html__('Header', 'eldritch'),
				'icon'  => 'fa fa-header',
			)
		);

		$panel_header = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header',
				'title' => esc_html__('Header', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'radiogroup',
				'name'          => 'header_type',
				'default_value' => 'header-standard',
				'label'         => esc_html__('Choose Header Type', 'eldritch'),
				'description'   => esc_html__('Select the type of header you would like to use', 'eldritch'),
				'options'       => array(
					'header-standard'          => array(
						'image' => EDGE_FRAMEWORK_ROOT . '/admin/assets/img/header-standard.png',
						'label' => esc_html__('Standard', 'eldritch')
					),
					'header-minimal'           => array(
						'image' => EDGE_FRAMEWORK_ROOT . '/admin/assets/img/header-minimal.png',
						'label' => esc_html__('Minimal', 'eldritch')
					),
					'header-centered'          => array(
						'image' => EDGE_FRAMEWORK_ROOT . '/admin/assets/img/header-centered.png',
						'label' => esc_html__('Centered', 'eldritch')
					),
					'header-vertical'          => array(
						'image' => EDGE_FRAMEWORK_ROOT . '/admin/assets/img/header-vertical.png',
						'label' => esc_html__('Vertical', 'eldritch')
					),
				),
				'args'          => array(
					'use_images'  => true,
					'hide_labels' => true,
					'dependence'  => true,
					'show'        => array(
						'header-standard'          => '#edgt_panel_header_standard,#edgt_header_behaviour,#edgt_panel_sticky_header,#edgt_panel_main_menu',
						'header-minimal'           => '#edgt_panel_header_minimal,#edgt_header_behaviour,#edgt_panel_fullscreen_menu,#edgt_panel_sticky_header',
						'header-centered'          => '#edgt_panel_header_centered,#edgt_header_behaviour,#edgt_panel_sticky_header,#edgt_panel_main_menu',
						'header-vertical'          => '#edgt_panel_header_vertical,#edgt_panel_vertical_main_menu',
					),
					'hide'        => array(
						'header-standard'          => '#edgt_panel_header_vertical,#edgt_panel_vertical_main_menu,#edgt_panel_header_minimal,#edgt_panel_header_centered,#edgt_panel_fullscreen_menu,#edgt_panel_fixed_header',
						'header-minimal'           => '#edgt_panel_header_standard,#edgt_panel_main_menu,#edgt_panel_header_vertical,#edgt_panel_fixed_header,#edgt_panel_header_centered',
						'header-centered'          => '#edgt_panel_header_standard,#edgt_panel_header_minimal,#edgt_panel_header_vertical,#edgt_panel_vertical_main_menu,#edgt_panel_fullscreen_menu,#edgt_panel_fixed_header',
						'header-vertical'          => '#edgt_panel_header_standard,#edgt_header_behaviour,#edgt_panel_fixed_header,#edgt_panel_sticky_header,#edgt_panel_main_menu,#edgt_panel_header_minimal,#edgt_panel_header_centered,#edgt_panel_fullscreen_menu',
					)
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'          => $panel_header,
				'type'            => 'select',
				'name'            => 'header_behaviour',
				'default_value'   => 'sticky-header-on-scroll-up',
				'label'           => esc_html__('Choose Header behaviour', 'eldritch'),
				'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'eldritch'),
				'options'         => array(
					'no-behavior'                     => esc_html__('No Behavior', 'eldritch'),
					'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'eldritch'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'eldritch'),
					'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'eldritch')
				),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array('header-vertical'),
				'args'            => array(
					'dependence' => true,
					'show'       => array(
						'sticky-header-on-scroll-up'      => '#edgt_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgt_panel_sticky_header',
						'fixed-on-scroll'                 => '',
					),
					'hide'       => array(
						'sticky-header-on-scroll-up'      => '#edgt_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgt_panel_fixed_header',
						'no-behavior'                     => '#edgt_panel_fixed_header, #edgt_panel_fixed_header, #edgt_panel_sticky_header',
						'fixed-on-scroll'                 => '#edgt_panel_sticky_header',
					)
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'top_line',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Top Line', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show top line above header', 'eldritch'),
				'parent'        => $panel_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_top_line_container"
				)
			)
		);

		$top_line_container = eldritch_edge_add_admin_container(array(
			'name'            => 'top_line_container',
			'parent'          => $panel_header,
			'hidden_property' => 'top_line',
			'hidden_value'    => 'no'
		));

		$group_top_line_colors = eldritch_edge_add_admin_group(array(
			'name'        => 'group_top_colors',
			'title'       => esc_html__('Top Line Colors', 'eldritch'),
			'description' => esc_html__('Define colors for top line (not all of them are mandatory)', 'eldritch'),
			'parent'      => $top_line_container
		));

		eldritch_edge_add_admin_field(array(
			'name'   => 'top_line_color_1',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 1', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_add_admin_field(array(
			'name'   => 'top_line_color_2',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 2', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_add_admin_field(array(
			'name'   => 'top_line_color_3',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 3', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_add_admin_field(array(
			'name'   => 'top_line_color_4',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Color 4', 'eldritch'),
			'parent' => $group_top_line_colors
		));

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Top Bar', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show top bar area', 'eldritch'),
				'parent'        => $panel_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_top_bar_container"
				)
			)
		);

		$top_bar_container = eldritch_edge_add_admin_container(array(
			'name'            => 'top_bar_container',
			'parent'          => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value'    => 'no'
		));

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $top_bar_container,
				'type'          => 'select',
				'name'          => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label'         => esc_html__('Choose top bar layout', 'eldritch'),
				'description'   => esc_html__('Select the layout for top bar', 'eldritch'),
				'options'       => array(
					'two-columns'   => esc_html__('Two columns', 'eldritch'),
					'three-columns' => esc_html__('Three columns', 'eldritch')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'two-columns'   => '#edgt_top_bar_layout_container',
						'three-columns' => '#edgt_top_bar_two_columns_layout_container'
					),
					'show'       => array(
						'two-columns'   => '#edgt_top_bar_two_columns_layout_container',
						'three-columns' => '#edgt_top_bar_layout_container'
					)
				)
			)
		);

		$top_bar_layout_container = eldritch_edge_add_admin_container(array(
			'name'            => 'top_bar_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array('two-columns'),
		));

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $top_bar_layout_container,
				'type'          => 'select',
				'name'          => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label'         => esc_html__('Choose column widths', 'eldritch'),
				'description'   => '',
				'options'       => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		$top_bar_two_columns_layout = eldritch_edge_add_admin_container(array(
			'name'            => 'top_bar_two_columns_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array('three-columns'),
		));

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $top_bar_two_columns_layout,
				'type'          => 'select',
				'name'          => 'top_bar_two_column_widths',
				'default_value' => '50-50',
				'label'         => esc_html__('Choose column widths', 'eldritch'),
				'description'   => '',
				'options'       => array(
					'50-50' => '50% - 50%',
					'33-66' => '33% - 66%',
					'66-33' => '66% - 33%'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Top Bar in grid', 'eldritch'),
				'description'   => esc_html__('Set top bar content to be in grid', 'eldritch'),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = eldritch_edge_add_admin_container(array(
			'name'            => 'top_bar_in_grid_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value'    => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'top_bar_grid_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Grid Background Color', 'eldritch'),
			'description' => esc_html__('Set grid background color for top bar', 'eldritch'),
			'parent'      => $top_bar_in_grid_container
		));


		eldritch_edge_add_admin_field(array(
			'name'        => 'top_bar_grid_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Grid Background Transparency', 'eldritch'),
			'description' => esc_html__('Set grid background transparency for top bar', 'eldritch'),
			'parent'      => $top_bar_in_grid_container,
			'args'        => array('col_width' => 3)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'top_bar_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'eldritch'),
			'description' => esc_html__('Set background color for top bar', 'eldritch'),
			'parent'      => $top_bar_container
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'top_bar_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'eldritch'),
			'description' => esc_html__('Set background transparency for top bar', 'eldritch'),
			'parent'      => $top_bar_container,
			'args'        => array('col_width' => 3)
		));

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Top Bar Border', 'eldritch'),
				'description'   => esc_html__('Set top bar border', 'eldritch'),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_top_bar_border_container"
				)
			)
		);

		$top_bar_border_container = eldritch_edge_add_admin_container(array(
			'name'            => 'top_bar_border_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_border',
			'hidden_value'    => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'top_bar_border_color',
			'type'        => 'color',
			'label'       => esc_html__('Top Bar Border', 'eldritch'),
			'description' => esc_html__('Set border color for top bar', 'eldritch'),
			'parent'      => $top_bar_border_container
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'top_bar_height',
			'type'        => 'text',
			'label'       => esc_html__('Top bar height', 'eldritch'),
			'description' => esc_html__('Enter top bar height (Default is 37px)', 'eldritch'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_style',
				'default_value' => '',
				'label'         => esc_html__('Header Skin', 'eldritch'),
				'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'eldritch'),
				'options'       => array(
					''             => '',
					'light-header' => esc_html__('Light', 'eldritch'),
					'dark-header'  => esc_html__('Dark', 'eldritch')
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'yesno',
				'name'          => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Header Style on Scroll', 'eldritch'),
				'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'eldritch'),
			)
		);

		$panel_header_standard = eldritch_edge_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_standard',
				'title'           => esc_html__('Header Standard', 'eldritch'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-vertical',
					'header-minimal',
					'header-centered',
				)
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name'   => 'menu_area_title',
				'title'  => esc_html__('Menu Area', 'eldritch')
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'select',
				'default_value' => 'right',
				'name'          => 'menu_area_position_header_standard',
				'options'       => array(
					'center' => esc_html__('Center', 'eldritch'),
					'left'   => esc_html__('Left', 'eldritch'),
					'right'  => esc_html__('Right', 'eldritch')
				),
				'label'         => esc_html__('Menu Area position', 'eldritch'),
				'description'   => esc_html__('Set menu area position', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_header_standard',
				'default_value' => 'yes',
				'label'         => esc_html__('Header In Grid', 'eldritch'),
				'description'   => esc_html__('Set header content to be in grid', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_header_standard,
				'name'            => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Color', 'eldritch'),
				'description'   => esc_html__('Set grid background color for header area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Transparency', 'eldritch'),
				'description'   => esc_html__('Set grid background transparency for header', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow_header_standard',
				'default_value' => 'no',
				'label'         => esc_html__('Grid Area Shadow', 'eldritch'),
				'description'   => esc_html__('Set shadow on grid area', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'eldritch'),
				'description'   => esc_html__('Set background color for header', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'eldritch'),
				'description'   => esc_html__('Set background transparency for header', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'menu_area_background_image_header_standard',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for header', 'eldritch'),
                'parent'        => $panel_header_standard
            )
        );

        eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow_header_standard',
				'default_value' => 'yes',
				'label'         => esc_html__('Header Area Shadow', 'eldritch'),
				'description'   => esc_html__('Set shadow on header area', 'eldritch'),
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_standard',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'eldritch'),
                'description'   => esc_html__('Set border on header area', 'eldritch'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgt_menu_area_border_header_standard_container'
                )
            )
        );

        $menu_area_border_header_standard_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $panel_header_standard,
                'name'            => 'menu_area_border_header_standard_container',
                'hidden_property' => 'menu_area_border_header_standard',
                'hidden_value'    => 'no'
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $menu_area_border_header_standard_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_color_header_standard',
                'default_value' => '',
                'label'         => esc_html__('Header Area Border Color', 'eldritch'),
                'description'   => esc_html__('Set border color for header area', 'eldritch'),
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Height', 'eldritch'),
				'description'   => esc_html__('Enter header height (default is 100px)', 'eldritch'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		$panel_header_minimal = eldritch_edge_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_minimal',
				'title'           => esc_html__('Header Minimal', 'eldritch'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-vertical',
					'header-standard',
					'header-centered',
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_minimal,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_header_minimal',
				'default_value' => 'no',
				'label'         => esc_html__('Header In Grid', 'eldritch'),
				'description'   => esc_html__('Set header content to be in grid', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_menu_area_in_grid_header_minimal_container'
				)
			)
		);

		$menu_area_in_grid_header_minimal_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_header_minimal,
				'name'            => 'menu_area_in_grid_header_minimal_container',
				'hidden_property' => 'menu_area_in_grid_header_minimal',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_minimal_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color_header_minimal',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Color', 'eldritch'),
				'description'   => esc_html__('Set grid background color for header area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_minimal_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency_header_minimal',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Transparency', 'eldritch'),
				'description'   => esc_html__('Set grid background transparency for header', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_minimal_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow_header_minimal',
				'default_value' => 'no',
				'label'         => esc_html__('Grid Area Shadow', 'eldritch'),
				'description'   => esc_html__('Set shadow on grid area', 'eldritch'),
			)
		);

        eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_minimal,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_minimal',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'eldritch'),
				'description'   => esc_html__('Set background color for header', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_minimal,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_minimal',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'eldritch'),
				'description'   => esc_html__('Set background transparency for header', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'menu_area_background_image_header_minimal',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for header', 'eldritch'),
                'parent'        => $panel_header_minimal
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_minimal,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow_header_minimal',
				'default_value' => 'yes',
				'label'         => esc_html__('Header Area Shadow', 'eldritch'),
				'description'   => esc_html__('Set shadow on header area', 'eldritch'),
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_minimal',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'eldritch'),
                'description'   => esc_html__('Set border on header area', 'eldritch'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgt_menu_area_border_header_minimal_container'
                )
            )
        );

        $menu_area_border_header_minimal_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $panel_header_minimal,
                'name'            => 'menu_area_border_header_minimal_container',
                'hidden_property' => 'menu_area_border_header_minimal',
                'hidden_value'    => 'no'
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $menu_area_border_header_minimal_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Header Area Border Color', 'eldritch'),
                'description'   => esc_html__('Set border color for header area', 'eldritch'),
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_minimal,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_minimal',
				'default_value' => '',
				'label'         => esc_html__('Height', 'eldritch'),
				'description'   => esc_html__('Enter header height (default is 100px)', 'eldritch'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		/***************** Centered Header Layout - start ****************/

		$panel_header_centered = eldritch_edge_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_centered',
				'title'           => esc_html__('Header Centered', 'eldritch'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-vertical',
					'header-standard',
					'header-minimal',
				)
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_centered,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__('Logo Area', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_header_centered',
				'default_value' => 'no',
				'label'         => esc_html__('Logo Area In Grid', 'eldritch'),
				'description'   => esc_html__('Set menu area content to be in grid', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_logo_area_in_grid_header_centered_container'
				)
			)
		);

		$logo_area_in_grid_header_centered_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_header_centered,
				'name'            => 'logo_area_in_grid_header_centered_container',
				'hidden_property' => 'logo_area_in_grid_header_centered',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_header_centered_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Color', 'eldritch'),
				'description'   => esc_html__('Set grid background color for logo area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_header_centered_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Transparency', 'eldritch'),
				'description'   => esc_html__('Set grid background transparency', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_header_centered_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border_header_centered',
				'default_value' => 'no',
				'label'         => esc_html__('Grid Area Border', 'eldritch'),
				'description'   => esc_html__('Set border on grid area', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_logo_area_in_grid_border_header_centered_container'
				)
			)
		);

		$logo_area_in_grid_border_header_centered_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_header_centered_container,
				'name'            => 'logo_area_in_grid_border_header_centered_container',
				'hidden_property' => 'logo_area_in_grid_border_header_centered',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_border_header_centered_container,
				'type'          => 'color',
				'name'          => 'logo_area_in_grid_border_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'eldritch'),
				'description'   => esc_html__('Set border color for grid area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'color',
				'name'          => 'logo_area_background_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'eldritch'),
				'description'   => esc_html__('Set background color for logo area', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'eldritch'),
				'description'   => esc_html__('Set background transparency for logo area', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'logo_area_background_image_header_centered',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for logo area', 'eldritch'),
                'parent'        => $panel_header_centered
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'yesno',
				'name'          => 'logo_area_border_header_centered',
				'default_value' => 'no',
				'label'         => esc_html__('Logo Area Border', 'eldritch'),
				'description'   => esc_html__('Set border on logo area', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_logo_area_border_header_centered_container'
				)
			)
		);

		$logo_area_border_header_centered_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_header_centered,
				'name'            => 'logo_area_border_header_centered_container',
				'hidden_property' => 'logo_area_border_header_centered',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $logo_area_border_header_centered_container,
				'type'          => 'color',
				'name'          => 'logo_area_border_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'eldritch'),
				'description'   => esc_html__('Set border color for logo area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'logo_wrapper_padding_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Logo Padding', 'eldritch'),
				'description'   => esc_html__('Insert padding in format: 0px 0px 1px 0px', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'logo_area_height_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Height', 'eldritch'),
				'description'   => esc_html__('Enter logo area height (default is 155px)', 'eldritch'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);


		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_centered,
				'name'   => 'main_menu_area_title',
				'title'  => esc_html__('Menu Area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_header_centered',
				'default_value' => 'no',
				'label'         => esc_html__('Menu Area In Grid', 'eldritch'),
				'description'   => esc_html__('Set menu area content to be in grid', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_menu_area_in_grid_header_centered_container'
				)
			)
		);

		$menu_area_in_grid_header_centered_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_header_centered,
				'name'            => 'menu_area_in_grid_header_centered_container',
				'hidden_property' => 'menu_area_in_grid_header_centered',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_centered_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Color', 'eldritch'),
				'description'   => esc_html__('Set grid background color for menu area', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_centered_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Transparency', 'eldritch'),
				'description'   => esc_html__('Set grid background transparency', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_centered_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow_header_centered',
				'default_value' => 'no',
				'label'         => esc_html__('Grid Area Shadow', 'eldritch'),
				'description'   => esc_html__('Set shadow on grid area', 'eldritch')
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'menu_area_background_image_header_centered',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for menu area', 'eldritch'),
                'parent'        => $panel_header_centered
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'eldritch'),
				'description'   => esc_html__('Set background color for menu area', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'eldritch'),
				'description'   => esc_html__('Set background transparency for menu area', 'eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow_header_centered',
				'default_value' => 'no',
				'label'         => esc_html__('Menu Area Shadow', 'eldritch'),
				'description'   => esc_html__('Set border on menu area', 'eldritch')
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_header_centered,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_centered',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'eldritch'),
                'description'   => esc_html__('Set border on header area', 'eldritch'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgt_menu_area_border_header_centered_container'
                )
            )
        );

        $menu_area_border_header_centered_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $panel_header_centered,
                'name'            => 'menu_area_border_header_centered_container',
                'hidden_property' => 'menu_area_border_header_centered',
                'hidden_value'    => 'no'
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $menu_area_border_header_centered_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_color_header_centered',
                'default_value' => '',
                'label'         => esc_html__('Header Area Border Color', 'eldritch'),
                'description'   => esc_html__('Set border color for header area', 'eldritch'),
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_centered',
				'default_value' => '',
				'label'         => esc_html__('Height', 'eldritch'),
				'description'   => esc_html__('Enter menu area height (default is 100px)', 'eldritch'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		/***************** Centered Header Layout - end ****************/

        /***************** Vertical Header Layout - start ****************/


		do_action('eldritch_edge_header_options_map');

		$panel_header_vertical = eldritch_edge_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_vertical',
				'title'           => esc_html__('Header Vertical', 'eldritch'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-standard',
					'header-minimal',
					'header-centered',
				)
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'        => 'vertical_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'eldritch'),
			'description' => esc_html__('Set background color for vertical menu', 'eldritch'),
			'parent'      => $panel_header_vertical
		));

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'vertical_header_background_image',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Background Image', 'eldritch'),
				'description'   => esc_html__('Set background image for vertical menu', 'eldritch'),
				'parent'        => $panel_header_vertical
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_vertical,
				'type'          => 'yesno',
				'name'          => 'vertical_header_shadow',
				'default_value' => 'yes',
				'label'         => esc_html__('Shadow', 'eldritch'),
				'description'   => esc_html__('Set shadow on vertical header', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_header_vertical,
				'type'          => 'yesno',
				'name'          => 'vertical_header_center_content',
				'default_value' => 'no',
				'label'         => esc_html__('Center Content', 'eldritch'),
				'description'   => esc_html__('Set content in vertical center', 'eldritch'),
			)
		);

        /***************** Vertical Header Layout - end ****************/

		$panel_sticky_header = eldritch_edge_add_admin_panel(
			array(
				'title'           => esc_html__('Sticky Header', 'eldritch'),
				'name'            => 'panel_sticky_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values'   => array(
					'no-behavior',
					'fixed-on-scroll'

				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'scroll_amount_for_sticky',
				'type'        => 'text',
				'label'       => esc_html__('Scroll Amount for Sticky', 'eldritch'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'eldritch'),
				'parent'      => $panel_sticky_header,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'sticky_header_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Sticky Header in grid', 'eldritch'),
				'description'   => esc_html__('Set sticky header content to be in grid', 'eldritch'),
				'parent'        => $panel_sticky_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = eldritch_edge_add_admin_container(array(
			'name'            => 'sticky_header_in_grid_container',
			'parent'          => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value'    => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'sticky_header_grid_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Grid Background Color', 'eldritch'),
			'description' => esc_html__('Set grid background color for sticky header', 'eldritch'),
			'parent'      => $sticky_header_in_grid_container
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'sticky_header_grid_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Sticky Header Grid Transparency', 'eldritch'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'eldritch'),
			'parent'      => $sticky_header_in_grid_container,
			'args'        => array(
				'col_width' => 1
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'sticky_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'eldritch'),
			'description' => esc_html__('Set background color for sticky header', 'eldritch'),
			'parent'      => $panel_sticky_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'sticky_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Sticky Header Transparency', 'eldritch'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'eldritch'),
			'parent'      => $panel_sticky_header,
			'args'        => array(
				'col_width' => 1
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'sticky_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Sticky Header Height', 'eldritch'),
			'description' => esc_html__('Enter height for sticky header (default is 100px)', 'eldritch'),
			'parent'      => $panel_sticky_header,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		$group_sticky_header_menu = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Sticky Header Menu', 'eldritch'),
			'name'        => 'group_sticky_header_menu',
			'parent'      => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'eldritch'),
		));

		$row1_sticky_header_menu = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_sticky_header_menu
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'sticky_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Text Color', 'eldritch'),
			'description' => '',
			'parent'      => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = eldritch_edge_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_sticky_header_menu
		));

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'sticky_google_fonts',
				'type'          => 'fontsimple',
				'label'         => esc_html__('Font Family', 'eldritch'),
				'default_value' => '-1',
				'parent'        => $row2_sticky_header_menu,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_fontsize',
				'label'         => esc_html__('Font Size', 'eldritch'),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_lineheight',
				'label'         => esc_html__('Line height', 'eldritch'),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_texttransform',
				'label'         => esc_html__('Text transform', 'eldritch'),
				'default_value' => '',
				'options'       => eldritch_edge_get_text_transform_array(),
				'parent'        => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = eldritch_edge_add_admin_row(array(
			'name'   => 'row3',
			'parent' => $group_sticky_header_menu
		));

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'eldritch'),
				'options'       => eldritch_edge_get_font_style_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'eldritch'),
				'options'       => eldritch_edge_get_font_weight_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_letterspacing',
				'label'         => esc_html__('Letter Spacing', 'eldritch'),
				'default_value' => '',
				'parent'        => $row3_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = eldritch_edge_add_admin_panel(
			array(
				'title'           => esc_html__('Fixed Header', 'eldritch'),
				'name'            => 'panel_fixed_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values'   => array(
					'sticky-header-on-scroll-up',
					'sticky-header-on-scroll-down-up',
					'no-behavior',
					'fixed-on-scroll'
				)
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'fixed_header_grid_background_color',
			'type'          => 'color',
			'default_value' => '',
			'label'         => esc_html__('Grid Background Color', 'eldritch'),
			'description'   => esc_html__('Set grid background color for fixed header', 'eldritch'),
			'parent'        => $panel_fixed_header
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'fixed_header_grid_transparency',
			'type'          => 'text',
			'default_value' => '',
			'label'         => esc_html__('Header Transparency Grid', 'eldritch'),
			'description'   => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'eldritch'),
			'parent'        => $panel_fixed_header,
			'args'          => array(
				'col_width' => 1
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'fixed_header_background_color',
			'type'          => 'color',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'eldritch'),
			'description'   => esc_html__('Set background color for fixed header', 'eldritch'),
			'parent'        => $panel_fixed_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'fixed_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Header Transparency', 'eldritch'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'eldritch'),
			'parent'      => $panel_fixed_header,
			'args'        => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = eldritch_edge_add_admin_panel(
			array(
				'title'           => esc_html__('Main Menu', 'eldritch'),
				'name'            => 'panel_main_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => array('header-vertical', 'header-minimal')
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name'   => 'main_menu_area_title',
				'title'  => esc_html__('Main Menu General Settings', 'eldritch')
			)
		);

		$drop_down_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'drop_down_group',
				'title'       => esc_html__('Main Dropdown Menu', 'eldritch'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'eldritch')
			)
		);

		$drop_down_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'drop_down_row1',
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'textsimple',
				'name'          => 'dropdown_background_transparency',
				'default_value' => '',
				'label'         => esc_html__('Transparency', 'eldritch'),
			)
		);

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $drop_down_row1,
                'type'          => 'imagesimple',
                'name'          => 'dropdown_background_image',
                'default_value' => EDGE_ASSETS_ROOT . "/css/img/pattern-dark.png",
                'label'         => esc_html__('Background Image (Pattern)', 'eldritch'),
            )
        );

		$drop_down_padding_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'drop_down_padding_group',
				'title'       => esc_html__('Main Dropdown Menu Padding', 'eldritch'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'eldritch')
			)
		);

		$drop_down_padding_row = eldritch_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name'   => 'drop_down_padding_row',
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $drop_down_padding_row,
				'type'          => 'textsimple',
				'name'          => 'dropdown_top_padding',
				'default_value' => '',
				'label'         => esc_html__('Top Padding', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $drop_down_padding_row,
				'type'          => 'textsimple',
				'name'          => 'dropdown_bottom_padding',
				'default_value' => '',
				'label'         => esc_html__('Bottom Padding', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label'         => esc_html__('Main Dropdown Menu Appearance', 'eldritch'),
				'description'   => esc_html__('Choose appearance for dropdown menu', 'eldritch'),
				'options'       => array(
					'dropdown-default'           => esc_html__('Default', 'eldritch'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'eldritch'),
					'dropdown-slide-from-top'    => esc_html__('Slide From Top', 'eldritch'),
					'dropdown-animate-height'    => esc_html__('Animate Height', 'eldritch'),
					'dropdown-slide-from-left'   => esc_html__('Slide From Left', 'eldritch')
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'text',
				'name'          => 'dropdown_top_position',
				'default_value' => '',
				'label'         => esc_html__('Dropdown position', 'eldritch'),
				'description'   => esc_html__('Enter value in percentage of entire header height', 'eldritch'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_wide_menu_background',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'eldritch'),
			)
		);

		$first_level_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'first_level_group',
				'title'       => esc_html__('1st Level Menu', 'eldritch'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'eldritch')
			)
		);

		$first_level_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover Text Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_activecolor',
				'default_value' => '',
				'label'         => esc_html__('Active Text Color', 'eldritch'),
			)
		);

		$first_level_row2 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'colorsimple',
				'name'          => 'menu_text_background_color',
				'default_value' => '',
				'label'         => esc_html__('Text Background Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'colorsimple',
				'name'          => 'menu_hover_background_color',
				'default_value' => '',
				'label'         => esc_html__('Hover Text Background Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'colorsimple',
				'name'          => 'menu_active_background_color',
				'default_value' => '',
				'label'         => esc_html__('Active Text Background Color', 'eldritch'),
			)
		);

		$first_level_row3 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Hover Text Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_activecolor',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Active Text Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_border_color',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Border Hover/Active Color', 'eldritch'),
			)
		);

		$first_level_row4 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row4',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Hover Text Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_activecolor',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Active Text Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_border_color',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Border Hover/Active Color', 'eldritch'),
			)
		);

		$first_level_row5 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row5',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'fontsimple',
				'name'          => 'menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label'         => esc_html__('Hover Background Color Transparency', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label'         => esc_html__('Active Background Color Transparency', 'eldritch'),
			)
		);

		$first_level_row6 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row6',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'eldritch'),
				'options'       => eldritch_edge_get_font_style_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'eldritch'),
				'options'       => eldritch_edge_get_font_weight_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'textsimple',
				'name'          => 'menu_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'eldritch'),
				'options'       => eldritch_edge_get_text_transform_array()
			)
		);

		$first_level_row7 = eldritch_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row7',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_padding_left_right',
				'default_value' => '',
				'label'         => esc_html__('Padding Left/Right', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_margin_left_right',
				'default_value' => '',
				'label'         => esc_html__('Margin Left/Right', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_group',
				'title'       => esc_html__('2nd Level Menu', 'eldritch'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'eldritch')
			)
		);

		$second_level_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Background Color', 'eldritch')
			)
		);

		$second_level_row2 = eldritch_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label'         => esc_html__('Padding Top/Bottom', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = eldritch_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font style', 'eldritch'),
				'options'       => eldritch_edge_get_font_style_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font weight', 'eldritch'),
				'options'       => eldritch_edge_get_font_weight_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter spacing', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'eldritch'),
				'options'       => eldritch_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_wide_group',
				'title'       => esc_html__('2nd Level Wide Menu', 'eldritch'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'eldritch')
			)
		);

		$second_level_wide_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row1'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Background Color', 'eldritch')
			)
		);

		$second_level_wide_row2 = eldritch_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row2',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label'         => esc_html__('Padding Top/Bottom', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = eldritch_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row3',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font style', 'eldritch'),
				'options'       => eldritch_edge_get_font_style_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font weight', 'eldritch'),
				'options'       => eldritch_edge_get_font_weight_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter spacing', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'eldritch'),
				'options'       => eldritch_edge_get_text_transform_array()
			)
		);

		$third_level_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_group',
				'title'       => esc_html__('3nd Level Menu', 'eldritch'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'eldritch')
			)
		);

		$third_level_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row1'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Background Color', 'eldritch')
			)
		);

		$third_level_row2 = eldritch_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row2',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = eldritch_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row3',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font style', 'eldritch'),
				'options'       => eldritch_edge_get_font_style_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font weight', 'eldritch'),
				'options'       => eldritch_edge_get_font_weight_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Letter spacing', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'eldritch'),
				'options'       => eldritch_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_wide_group',
				'title'       => esc_html__('3rd Level Wide Menu', 'eldritch'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'eldritch')
			)
		);

		$third_level_wide_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row1'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Background Color', 'eldritch')
			)
		);

		$third_level_wide_row2 = eldritch_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row2',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = eldritch_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row3',
				'next'   => true
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font style', 'eldritch'),
				'options'       => eldritch_edge_get_font_style_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font weight', 'eldritch'),
				'options'       => eldritch_edge_get_font_weight_array()
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Letter spacing', 'eldritch'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'eldritch'),
				'options'       => eldritch_edge_get_text_transform_array()
			)
		);

		$panel_vertical_main_menu = eldritch_edge_add_admin_panel(
			array(
				'title'           => esc_html__('Vertical Main Menu', 'eldritch'),
				'name'            => 'panel_vertical_main_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => array(
					'header-standard',
					'header-minimal'
				)
			)
		);

		$drop_down_group = eldritch_edge_add_admin_group(
			array(
				'parent'      => $panel_vertical_main_menu,
				'name'        => 'vertical_drop_down_group',
				'title'       => esc_html__('Main Dropdown Menu', 'eldritch'),
				'description' => esc_html__('Set a style for dropdown menu', 'eldritch')
			)
		);

		$vertical_drop_down_row1 = eldritch_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'edgt_drop_down_row1',
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $vertical_drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'vertical_dropdown_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $vertical_drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'vertical_dropdown_border_color',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $vertical_drop_down_row1,
				'type'          => 'textsimple',
				'name'          => 'vertical_dropdown_transparency',
				'default_value' => '',
				'label'         => esc_html__('Transparency', 'eldritch'),
			)
		);

		$group_vertical_first_level = eldritch_edge_add_admin_group(array(
			'name'        => 'group_vertical_first_level',
			'title'       => esc_html__('1st level', 'eldritch'),
			'description' => esc_html__('Define styles for 1st level menu', 'eldritch'),
			'parent'      => $panel_vertical_main_menu
		));

		$row_vertical_first_level_1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_first_level_1',
			'parent' => $group_vertical_first_level
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'eldritch'),
			'parent'        => $row_vertical_first_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Color', 'eldritch'),
			'parent'        => $row_vertical_first_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_hover_background_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'eldritch'),
			'parent'        => $row_vertical_first_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_1
		));

		$row_vertical_first_level_2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_first_level_2',
			'parent' => $group_vertical_first_level,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'eldritch'),
			'options'       => eldritch_edge_get_text_transform_array(),
			'parent'        => $row_vertical_first_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_1st_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'eldritch'),
			'parent'        => $row_vertical_first_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'eldritch'),
			'options'       => eldritch_edge_get_font_style_array(),
			'parent'        => $row_vertical_first_level_2
		));

		$row_vertical_first_level_3 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_first_level_3',
			'parent' => $group_vertical_first_level,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'eldritch'),
			'options'       => eldritch_edge_get_font_weight_array(),
			'parent'        => $row_vertical_first_level_3
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_3
		));

		$group_vertical_second_level = eldritch_edge_add_admin_group(array(
			'name'        => 'group_vertical_second_level',
			'title'       => esc_html__('2nd level', 'eldritch'),
			'description' => esc_html__('Define styles for 2nd level menu', 'eldritch'),
			'parent'      => $panel_vertical_main_menu
		));

		$row_vertical_second_level_1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_second_level_1',
			'parent' => $group_vertical_second_level
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'eldritch'),
			'parent'        => $row_vertical_second_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Color', 'eldritch'),
			'parent'        => $row_vertical_second_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_hover_background_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'eldritch'),
			'parent'        => $row_vertical_second_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_1
		));

		$row_vertical_second_level_2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_second_level_2',
			'parent' => $group_vertical_second_level,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'eldritch'),
			'options'       => eldritch_edge_get_text_transform_array(),
			'parent'        => $row_vertical_second_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_2nd_google_fonts',
			'default_value' => '-1',
			'label'         => 'Font Family',
			'parent'        => $row_vertical_second_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'eldritch'),
			'options'       => eldritch_edge_get_font_style_array(),
			'parent'        => $row_vertical_second_level_2
		));

		$row_vertical_second_level_3 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_second_level_3',
			'parent' => $group_vertical_second_level,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'eldritch'),
			'options'       => eldritch_edge_get_font_weight_array(),
			'parent'        => $row_vertical_second_level_3
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_3
		));

		$group_vertical_third_level = eldritch_edge_add_admin_group(array(
			'name'        => 'group_vertical_third_level',
			'title'       => esc_html__('3rd level', 'eldritch'),
			'description' => esc_html__('Define styles for 3rd level menu', 'eldritch'),
			'parent'      => $panel_vertical_main_menu
		));

		$row_vertical_third_level_1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_third_level_1',
			'parent' => $group_vertical_third_level
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'eldritch'),
			'parent'        => $row_vertical_third_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Color', 'eldritch'),
			'parent'        => $row_vertical_third_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_hover_background_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'eldritch'),
			'parent'        => $row_vertical_third_level_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_1
		));

		$row_vertical_third_level_2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_third_level_2',
			'parent' => $group_vertical_third_level,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'eldritch'),
			'options'       => eldritch_edge_get_text_transform_array(),
			'parent'        => $row_vertical_third_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_3rd_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'eldritch'),
			'parent'        => $row_vertical_third_level_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'eldritch'),
			'options'       => eldritch_edge_get_font_style_array(),
			'parent'        => $row_vertical_third_level_2
		));

		$row_vertical_third_level_3 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_vertical_third_level_3',
			'parent' => $group_vertical_third_level,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'eldritch'),
			'options'       => eldritch_edge_get_font_weight_array(),
			'parent'        => $row_vertical_third_level_3
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_3
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_header_options_map', 4);

}