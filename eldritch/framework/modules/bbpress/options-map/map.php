<?php

if(!function_exists('eldritch_edge_bbpress_options_map')) {
	/**
	 * Maps options that are specific to BBPress
	 */
	function eldritch_edge_bbpress_options_map() {
		$custom_sidebars = eldritch_edge_get_custom_sidebars();

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_bbpress',
				'title' => esc_html__('BBPress','eldritch'),
				'icon'  => 'fa fa-users'
			)
		);

		$panel_bbpress = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_bbpress',
				'name'  => 'panel_bbpress',
				'title' => esc_html__('eldritch','eldritch')
			)
		);

        eldritch_edge_add_admin_section_title(array(
            'name'   => 'bbpress_header_title',
            'parent' => $panel_bbpress,
            'title'  => esc_html__('Header', 'eldritch')
        ));


        eldritch_edge_add_admin_field(
            array(
                'name'          => 'bbpress_header_type',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Choose Header Type', 'eldritch'),
                'description'   => esc_html__('Select header type layout', 'eldritch'),
                'parent'        => $panel_bbpress,
                'options'       => array(
                    ''                         => 'Default',
                    'header-standard'          => esc_html__('Standard Header', 'eldritch'),
                    'header-minimal'           => esc_html__('Minimal Header', 'eldritch'),
                    'header-centered'          => esc_html__('Centered Header', 'eldritch'),
                    'header-vertical'          => esc_html__('Vertical Header', 'eldritch')
                ),
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_bbpress,
                'type'          => 'select',
                'name'          => 'bbpress_header_style',
                'default_value' => '',
                'label'         => esc_html__('Header Skin', 'eldritch'),
                'description'   => esc_html__('Choose a header style to make header elements (main menu) in that predefined style', 'eldritch'),
                'options'       => array(
                    ''             => '',
                    'light-header' => esc_html__('Light', 'eldritch'),
                    'dark-header'  => esc_html__('Dark', 'eldritch')
                )
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_bbpress,
                'type'          => 'color',
                'name'          => 'bbpress_menu_area_background_color_header',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'eldritch'),
                'description'   => esc_html__('Set background color for header', 'eldritch')
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_bbpress,
                'type'          => 'text',
                'name'          => 'bbpress_menu_area_background_transparency_header',
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
                'name'          => 'bbpress_menu_area_background_image_header',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for header', 'eldritch'),
                'parent'        => $panel_bbpress
            )
        );


        eldritch_edge_add_admin_section_title(array(
            'name'   => 'bbpress_page_title',
            'parent' => $panel_bbpress,
            'title'  => esc_html__('Page', 'eldritch')
        ));

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'bbpress_boxed',
                'type'          => 'select',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'eldritch'),
                'description'   => '',
                'parent'        => $panel_bbpress,
                'options'       => array(
                    ''                         => 'Default',
                    'yes'          => esc_html__('Yes', 'eldritch'),
                    'no'           => esc_html__('No', 'eldritch')
                ),
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'bbpress_show_archive_title',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Display Page Title on Forums Page?','eldritch'),
                'description'   => esc_html__('Enabling this option will display page title on forums page','eldritch'),
                'parent'        => $panel_bbpress
            )
        );

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'bbpress_archive_slider',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Forums Page Slider Shortcode','eldritch'),
				'description'   => esc_html__('Enter shortcode for slider that will be displayed on forums page','eldritch'),
				'parent'        => $panel_bbpress,
				'args'          => array(
					'col_width' => 4
				)
			)
		);

        eldritch_edge_add_admin_field(array(
            'name'          => 'bbpress_skin',
            'type'          => 'select',
            'label'         => esc_html__('BBPress Skin', 'eldritch'),
            'default_value' => '',
            'description'   => esc_html__('Choose skin for BBPress pages', 'eldritch'),
            'options'       => array(
                '' => esc_html__('Light', 'eldritch'),
                'edgt-bbpress-dark-skin' => esc_html__('Dark', 'eldritch')
            ),
            'parent'        => $panel_bbpress,
        ));



        eldritch_edge_add_admin_field(
            array(
                'name'          => 'bbpress_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Forums Page Background Color', 'eldritch'),
                'default_value' => '',
                'description'   => esc_html__('Set background color for forums page', 'eldritch'),
                'parent'        => $panel_bbpress,
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'bbpress_background_image',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Forums Page Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for forums page', 'eldritch'),
                'parent'        => $panel_bbpress
            )
        );

        eldritch_edge_add_admin_section_title(array(
            'name'   => 'bbpress_sidebar_title',
            'parent' => $panel_bbpress,
            'title'  => esc_html__('Sidebar', 'eldritch')
        ));

        eldritch_edge_add_admin_field(array(
			'name'        => 'bbpress_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('BBPress Sidebar','eldritch'),
			'description' => esc_html__('Choose a sidebar layout for all BBPress pages','eldritch'),
			'parent'      => $panel_bbpress,
			'options'     => array(
				'default'          => esc_html('No Sidebar', 'eldritch'),
				'sidebar-33-right' => esc_html('Sidebar 1/3 Right', 'eldritch'),
				'sidebar-25-right' => esc_html('Sidebar 1/4 Right', 'eldritch'),
				'sidebar-33-left'  => esc_html('Sidebar 1/3 Left', 'eldritch'),
				'sidebar-25-left'  => esc_html('Sidebar 1/4 Left', 'eldritch')
			)
		));


		if(count($custom_sidebars) > 0) {
			eldritch_edge_add_admin_field(array(
				'name'        => 'bbpress_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','eldritch'),
				'description' => esc_html__('Choose a sidebar to display on all BBPress pages. Default sidebar is "Sidebar Page"','eldritch'),
				'parent'      => $panel_bbpress,
				'options'     => eldritch_edge_get_custom_sidebars()
			));
		}
	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_bbpress_options_map', 22);
}