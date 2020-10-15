<?php

if (!function_exists('eldritch_edge_title_meta_box_map')) {
	function eldritch_edge_title_meta_box_map() {

		$title_meta_box = eldritch_edge_create_meta_box(
			array(
                'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
				'title' => esc_html__('Title', 'eldritch'),
				'name'  => 'title_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Show Title Area', 'eldritch'),
				'description'   => esc_html__('Disabling this option will turn off page title area', 'eldritch'),
				'parent'        => $title_meta_box,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__( 'Yes', 'eldritch')
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#edgt_edgt_show_title_area_meta_container",
						"yes" => ""
					),
					"show"       => array(
						""    => "#edgt_edgt_show_title_area_meta_container",
						"no"  => "",
						"yes" => "#edgt_edgt_show_title_area_meta_container"
					)
				)
			)
		);

		$show_title_area_meta_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $title_meta_box,
				'name'            => 'edgt_show_title_area_meta_container',
				'hidden_property' => 'edgt_show_title_area_meta',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Title Area Type', 'eldritch'),
				'description'   => esc_html__('Choose title type', 'eldritch'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => '',
					'standard'   => esc_html__('Standard', 'eldritch'),
					'breadcrumb' => esc_html__('Breadcrumb', 'eldritch'),
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"standard"   => "",
						"breadcrumb" => "#edgt_edgt_title_area_type_meta_container"
					),
					"show"       => array(
						""           => "#edgt_edgt_title_area_type_meta_container",
						"standard"   => "#edgt_edgt_title_area_type_meta_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_meta_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'edgt_title_area_type_meta_container',
				'hidden_property' => 'edgt_title_area_type_meta',
				'hidden_value'    => '',
				'hidden_values'   => array('breadcrumb'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_enable_breadcrumbs_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Enable Breadcrumbs', 'eldritch'),
				'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'eldritch'),
				'parent'        => $title_area_type_meta_container,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch'),
				),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Title in Grid', 'eldritch'),
				'description'   => esc_html__('Set title content to be in grid', 'eldritch'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_animation_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Animations', 'eldritch'),
				'description'   => esc_html__('Choose an animation for Title Area', 'eldritch'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => '',
					'no'         => esc_html__('No Animation', 'eldritch'),
					'right-left' => esc_html__('Text right to left', 'eldritch'),
					'left-right' => esc_html__('Text left to right', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_vertial_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Vertical Alignment', 'eldritch'),
				'description'   => esc_html__('Specify title vertical alignment', 'eldritch'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''              => '',
					'header_bottom' => esc_html__('From Bottom of Header', 'eldritch'),
					'window_top'    => esc_html__('From Window Top', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_content_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Horizontal Alignment', 'eldritch'),
				'description'   => esc_html__('Specify title horizontal alignment', 'eldritch'),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''       => '',
					'left'   => esc_html__('Left', 'eldritch'),
					'center' => esc_html__('Center', 'eldritch'),
					'right'  => esc_html__('Right', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_title_text_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Title Color', 'eldritch'),
				'description' => esc_html__('Choose a color for title text', 'eldritch'),
				'parent'      => $show_title_area_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_title_breadcrumb_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Breadcrumb Color', 'eldritch'),
				'description' => esc_html__('Choose a color for breadcrumb text', 'eldritch'),
				'parent'      => $show_title_area_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_title_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for Title Area', 'eldritch'),
				'parent'      => $show_title_area_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_hide_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Hide Background Image', 'eldritch'),
				'description'   => esc_html__('Enable this option to hide background image in Title Area', 'eldritch'),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt_edgt_hide_background_image_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_background_image_meta_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'edgt_hide_background_image_meta_container',
				'hidden_property' => 'edgt_hide_background_image_meta',
				'hidden_value'    => 'yes'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_title_area_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'eldritch'),
				'description' => esc_html__('Choose an Image for Title Area', 'eldritch'),
				'parent'      => $hide_background_image_meta_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_background_image_responsive_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Background Responsive Image', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make Title background image responsive', 'eldritch'),
				'parent'        => $hide_background_image_meta_container,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "",
						"yes" => "#edgt_edgt_title_area_background_image_responsive_meta_container, #edgt_edgt_title_area_height_meta"
					),
					"show"       => array(
						""    => "#edgt_edgt_title_area_background_image_responsive_meta_container, #edgt_edgt_title_area_height_meta",
						"no"  => "#edgt_edgt_title_area_background_image_responsive_meta_container, #edgt_edgt_title_area_height_meta",
						"yes" => ""
					)
				)
			)
		);

		$title_area_background_image_responsive_meta_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $hide_background_image_meta_container,
				'name'            => 'edgt_title_area_background_image_responsive_meta_container',
				'hidden_property' => 'edgt_title_area_background_image_responsive_meta',
				'hidden_value'    => 'yes'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_title_area_background_image_parallax_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Background Image in Parallax', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make Title background image parallax', 'eldritch'),
				'parent'        => $title_area_background_image_responsive_meta_container,
				'options'       => array(
					''         => '',
					'no'       => esc_html__('No', 'eldritch'),
					'yes'      => esc_html__('Yes', 'eldritch'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_title_area_height_meta',
			'type'        => 'text',
			'label'       => esc_html__('Height', 'eldritch'),
			'description' => esc_html__('Set a height for Title Area', 'eldritch'),
			'parent'      => $show_title_area_meta_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_disable_title_bottom_border_meta',
			'type'          => 'yesno',
			'label'         => esc_html__('Disable Title Bottom Border', 'eldritch'),
			'description'   => esc_html__('This option will disable title area bottom border', 'eldritch'),
			'parent'        => $show_title_area_meta_container,
			'default_value' => 'no'
		));

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_title_area_subtitle_meta',
			'type'          => 'text',
			'default_value' => '',
			'label'         => esc_html__('Subtitle Text', 'eldritch'),
			'description'   => esc_html__('Enter your subtitle text', 'eldritch'),
			'parent'        => $show_title_area_meta_container,
			'args'          => array(
				'col_width' => 6
			)
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_subtitle_color_meta',
				'type'        => 'color',
				'label'       => esc_html__('Subtitle Color', 'eldritch'),
				'description' => esc_html__('Choose a color for subtitle text', 'eldritch'),
				'parent'      => $show_title_area_meta_container
			)
		);

	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_title_meta_box_map');
}