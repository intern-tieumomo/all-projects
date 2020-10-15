<?php

if (!function_exists('eldritch_edge_footer_meta_box_map')) {
	function eldritch_edge_footer_meta_box_map() {

		$edgt_custom_widgets = eldritch_edge_get_custom_sidebars();
		$footer_meta_box = eldritch_edge_create_meta_box(
			array(
                'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
				'title' => esc_html__('Footer', 'eldritch'),
				'name'  => 'footer_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_enable_footer_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Disable Footer Image for this Page', 'eldritch'),
				'description'   => esc_html__('Enabling this option will hide footer image on this page', 'eldritch'),
				'parent'        => $footer_meta_box,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '#edgt_edgt_footer_background_image_meta',
					'dependence_show_on_yes' => ''
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'            => 'edgt_footer_background_image_meta',
				'type'            => 'image',
				'label'           => esc_html__('Background Image', 'eldritch'),
				'description'     => esc_html__('Choose Background Image for Footer Area on this page', 'eldritch'),
				'parent'          => $footer_meta_box,
				'hidden_property' => 'edgt_enable_footer_image_meta',
				'hidden_value'    => 'yes'
			)
		);
		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_footer_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose Background Color for Footer Area on this page', 'eldritch'),
				'parent'      => $footer_meta_box
			)
		);
		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_footer_background_color_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__('Background Color Transparency', 'eldritch'),
				'description' => esc_html__('Choose Background Color Transparency(0-1) for Footer Area on this page', 'eldritch'),
				'parent'      => $footer_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_disable_footer_meta',
				'default_value' => '',
				'label'         => esc_html__('Disable Footer for this Page', 'eldritch'),
				'description'   => esc_html__('Enabling this option will hide footer on this page', 'eldritch'),
				'options'       => array(
					''    => esc_html__('Default', 'eldritch'),
					'yes' => 'Yes',
					'no'  => 'No'
				),
				'parent'        => $footer_meta_box,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_uncovering_footer_meta',
				'default_value' => '',
				'label'         => esc_html__('Uncovering Footer', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'eldritch'),
				'options'       => array(
					''    => esc_html__('Default', 'eldritch'),
					'yes' => 'Yes',
					'no'  => 'No'
				),
				'parent'        => $footer_meta_box,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_footer_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__('Footer in Grid', 'eldritch'),
				'description'   => esc_html__('Enabling this option will place Footer content in grid', 'eldritch'),
				'options'       => array(
					''    => esc_html__('Default', 'eldritch'),
					'yes' => 'Yes',
					'no'  => 'No'
				),
				'parent'        => $footer_meta_box,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_show_footer_top_meta',
				'default_value' => '',
				'label'         => esc_html__('Show Footer Top', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show Footer Top area', 'eldritch'),
				'options'       => array(
					''    => esc_html__('Default', 'eldritch'),
					'yes' => 'Yes',
					'no'  => 'No'
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#edgt_edgt_show_footer_top_container_meta",
						"yes" => ""
					),
					"show"       => array(
						""    => "#edgt_edgt_show_footer_top_container_meta",
						"no"  => "",
						"yes" => "#edgt_edgt_show_footer_top_container_meta"
					)
				),
				'parent'        => $footer_meta_box,
			)
		);

		$show_footer_top_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'edgt_show_footer_top_container_meta',
				'hidden_property' => 'edgt_show_footer_top_meta',
				'hidden_value'    => 'no',
				'parent'          => $footer_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_footer_top_columns_meta',
				'default_value' => '',
				'label'         => esc_html__('Footer Top Columns', 'eldritch'),
				'description'   => esc_html__('Choose number of columns for Footer Top area', 'eldritch'),
				'options'       => array(
					''  => esc_html__('Default', 'eldritch'),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent'        => $show_footer_top_container,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_footer_top_columns_alignment_meta',
				'default_value' => '',
				'label'         => esc_html__('Footer Top Columns Alignment', 'eldritch'),
				'description'   => esc_html__('Text Alignment in Footer Columns', 'eldritch'),
				'options'       => array(
					''       => esc_html__('Default', 'eldritch'),
					'left'   => esc_html__('Left', 'eldritch'),
					'center' => esc_html__('Center', 'eldritch'),
					'right'  => esc_html__('Right', 'eldritch')
				),
				'parent'        => $show_footer_top_container
			)
		);


		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_show_footer_bottom_meta',
				'default_value' => '',
				'label'         => esc_html__('Show Footer Bottom', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show Footer Bottom area', 'eldritch'),
				'options'       => array(
					''    => esc_html__('Default', 'eldritch'),
					'yes' => 'Yes',
					'no'  => 'No'
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#edgt_edgt_show_footer_bottom_container_meta",
						"yes" => ""
					),
					"show"       => array(
						""    => "#edgt_edgt_show_footer_bottom_container_meta",
						"no"  => "",
						"yes" => "#edgt_edgt_show_footer_bottom_container_meta"
					)
				),
				'parent'        => $footer_meta_box,
			)
		);

		$show_footer_bottom_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'edgt_show_footer_bottom_container_meta',
				'hidden_property' => 'edgt_show_footer_bottom_meta',
				'hidden_value'    => 'no',
				'parent'          => $footer_meta_box
			)
		);


		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_footer_bottom_columns_meta',
				'default_value' => '',
				'label'         => esc_html__('Footer Bottom Columns', 'eldritch'),
				'description'   => esc_html__('Choose number of columns for Footer Bottom area', 'eldritch'),
				'options'       => array(
					''  => esc_html__('Default', 'eldritch'),
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '3 (25%+50%+25%)',
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgt_footer_bottom_border_meta',
				'default_value' => '',
				'label'         => esc_html__('Border Top', 'eldritch'),
				'description'   => esc_html__('Enable Border Top', 'eldritch'),
				'options'       => array(
					''  => esc_html__('Default', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch'),
					'no'  => esc_html__('No', 'eldritch')
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_custom_widget_areas',
				'default_value' => 'no',
				'label'         => esc_html__('Use Custom Widget Areas in Footer', 'eldritch'),
				'description'   => '',
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_footer_custom_widget_areas'
				),
				'parent'        => $footer_meta_box,
			)
		);

		$show_footer_custom_widget_areas = eldritch_edge_add_admin_container(
			array(
				'name'            => 'footer_custom_widget_areas',
				'hidden_property' => 'show_footer_custom_widget_areas',
				'hidden_value'    => 'no',
				'parent'          => $footer_meta_box
			)
		);

		$top_cols_num = 4;

		for ($i = 1; $i <= $top_cols_num; $i++) {

			eldritch_edge_create_meta_box_field(array(
				'name'        => 'edgt_footer_top_meta_' . $i,
				'type'        => 'selectblank',
				'label'       => esc_html__('Choose Widget Area in Footer Top Column ', 'eldritch') . $i,
				'description' => esc_html__('Choose Custom Widget area to display in Footer Top Column ', 'eldritch') . $i,
				'parent'      => $show_footer_custom_widget_areas,
				'options'     => $edgt_custom_widgets
			));

		}

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_footer_text_meta',
			'type'        => 'selectblank',
			'label'       => esc_html__('Choose Widget Area in Footer Bottom', 'eldritch'),
			'description' => esc_html__('Choose Custom Widget area to display in Footer Bottom', 'eldritch'),
			'parent'      => $show_footer_custom_widget_areas,
			'options'     => $edgt_custom_widgets
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_footer_bottom_left_meta',
			'type'        => 'selectblank',
			'label'       => esc_html__('Choose Widget Area in Footer Bottom Left', 'eldritch'),
			'description' => esc_html__('Choose Custom Widget area to display in Footer Bottom', 'eldritch'),
			'parent'      => $show_footer_custom_widget_areas,
			'options'     => $edgt_custom_widgets
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_footer_bottom_right_meta',
			'type'        => 'selectblank',
			'label'       => esc_html__('Choose Widget Area in Footer Bottom Right', 'eldritch'),
			'description' => esc_html__('Choose Custom Widget area to display in Footer Right', 'eldritch'),
			'parent'      => $show_footer_custom_widget_areas,
			'options'     => $edgt_custom_widgets
		));
	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_footer_meta_box_map');
}