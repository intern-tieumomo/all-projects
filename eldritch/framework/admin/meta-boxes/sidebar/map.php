<?php

if (!function_exists('eldritch_edge_sidebar_meta_box_map')) {
	function eldritch_edge_sidebar_meta_box_map() {

		$edgt_custom_sidebars = eldritch_edge_get_custom_sidebars();

		$edgt_sidebar_meta_box = eldritch_edge_create_meta_box(
			array(
                'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
				'title' => esc_html__('Sidebar', 'eldritch'),
				'name'  => 'sidebar_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_sidebar_meta',
				'type'        => 'select',
				'label'       => esc_html__('Layout', 'eldritch'),
				'description' => esc_html__('Choose the sidebar layout', 'eldritch'),
				'parent'      => $edgt_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__('Default', 'eldritch'),
					'no-sidebar'       => esc_html__('No Sidebar', 'eldritch'),
					'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'eldritch'),
					'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'eldritch'),
					'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'eldritch'),
					'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_boxed_widgets_meta',
				'type'    => 'selectblank',
				'label'   => esc_html__('Boxed Widgets', 'eldritch'),
				'parent'  => $edgt_sidebar_meta_box,
				'options' => array(
					'yes' => esc_html__('Yes', 'eldritch'),
					'no'  => esc_html__('No', 'eldritch')
				)
			)
		);

		if (count($edgt_custom_sidebars) > 0) {
			eldritch_edge_create_meta_box_field(array(
				'name'        => 'edgt_custom_sidebar_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Choose Widget Area in Sidebar', 'eldritch'),
				'description' => esc_html__('Choose Custom Widget area to display in Sidebar', 'eldritch'),
				'parent'      => $edgt_sidebar_meta_box,
				'options'     => $edgt_custom_sidebars
			));
		}

	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_sidebar_meta_box_map');
}