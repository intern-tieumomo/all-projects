<?php

if (!function_exists('eldritch_edge_content_bottom_meta_box_map')) {
	function eldritch_edge_content_bottom_meta_box_map() {

		$content_bottom_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
				'title' => esc_html__('Content Bottom', 'eldritch'),
				'name' => 'content_bottom_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name' => 'edgt_enable_content_bottom_area_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Enable Content Bottom Area', 'eldritch'),
				'description' => esc_html__('This option will enable Content Bottom area on pages', 'eldritch'),
				'parent' => $content_bottom_meta_box,
				'options' => array(
					'no' => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes',  'eldritch')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'' => '#edgt_edgt_show_content_bottom_meta_container',
						'no' => '#edgt_edgt_show_content_bottom_meta_container'
					),
					'show' => array(
						'yes' => '#edgt_edgt_show_content_bottom_meta_container'
					)
				)
			)
		);

		$show_content_bottom_meta_container = eldritch_edge_add_admin_container(
			array(
				'parent' => $content_bottom_meta_box,
				'name' => 'edgt_show_content_bottom_meta_container',
				'hidden_property' => 'edgt_enable_content_bottom_area_meta',
				'hidden_value' => '',
				'hidden_values' => array('','no')
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name' => 'edgt_content_bottom_sidebar_custom_display_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Sidebar to Display', 'eldritch'),
				'description' => esc_html__('Choose a Content Bottom sidebar to display', 'eldritch'),
				'options' => eldritch_edge_get_custom_sidebars(),
				'parent' => $show_content_bottom_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type' => 'selectblank',
				'name' => 'edgt_content_bottom_in_grid_meta',
				'default_value' => '',
				'label' => esc_html__('Display in Grid', 'eldritch'),
				'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'eldritch'),
				'options' => array(
					'no' => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				),
				'parent' => $show_content_bottom_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type' => 'color',
				'name' => 'edgt_content_bottom_background_color_meta',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for Content Bottom area', 'eldritch'),
				'parent' => $show_content_bottom_meta_container
			)
		);


	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_content_bottom_meta_box_map');
}