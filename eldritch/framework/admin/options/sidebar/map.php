<?php

if(!function_exists('eldritch_edge_sidebar_options_map')) {

	function eldritch_edge_sidebar_options_map() {

        eldritch_edge_add_admin_page(
            array(
                'slug'  => '_sidebar_page',
                'title' => esc_html__('Sidebar','eldritch'),
                'icon'  => 'fa fa-indent'
            )
        );


        $panel_widgets = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'eldritch')
			)
		);

		/**
		 * Navigation style
		 */

		eldritch_edge_add_admin_field(array(
			'name'          => 'page_boxed_widgets',
			'type'          => 'yesno',
			'default_value' => 'yes',
			'label'         => esc_html__('Boxed Widgets', 'eldritch'),
			'parent'        => $panel_widgets
		));

		$group_sidebar_padding = eldritch_edge_add_admin_group(array(
			'name'   => 'group_sidebar_padding',
			'title'  => esc_html__('Padding', 'eldritch'),
			'parent' => $panel_widgets
		));

		$row_sidebar_padding = eldritch_edge_add_admin_row(array(
			'name'   => 'row_sidebar_padding',
			'parent' => $group_sidebar_padding
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_top',
			'default_value' => '',
			'label'         => esc_html__('Top Padding', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_right',
			'default_value' => '',
			'label'         => esc_html__('Right Padding', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_bottom',
			'default_value' => '',
			'label'         => esc_html__('Bottom Padding', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_left',
			'default_value' => '',
			'label'         => esc_html__('Left Padding', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'select',
			'name'          => 'sidebar_alignment',
			'default_value' => '',
			'label'         => esc_html__('Text Alignment', 'eldritch'),
			'description'   => esc_html__('Choose text aligment', 'eldritch'),
			'options'       => array(
				'left'   => esc_html__('Left', 'eldritch'),
				'center' => esc_html__('Center', 'eldritch'),
				'right'  => esc_html__('Right', 'eldritch')
			),
			'parent'        => $panel_widgets
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_sidebar_options_map', 9);

}