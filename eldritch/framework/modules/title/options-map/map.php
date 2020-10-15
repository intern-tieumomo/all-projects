<?php

if (!function_exists('eldritch_edge_title_options_map')) {

	function eldritch_edge_title_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_title_page',
				'title' => esc_html__('Title', 'eldritch'),
				'icon'  => 'fa fa-list-alt'
			)
		);

		$panel_title = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title',
				'title' => esc_html__('Title Settings', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'show_title_area',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Show Title Area', 'eldritch'),
				'description'   => esc_html__('This option will enable/disable Title Area', 'eldritch'),
				'parent'        => $panel_title,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_show_title_area_container"
				)
			)
		);

		$show_title_area_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_title,
				'name'            => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value'    => 'no'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__('Title Area Type', 'eldritch'),
				'description'   => esc_html__('Choose title type', 'eldritch'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'standard'   => esc_html__('Standard', 'eldritch'),
					'breadcrumb' => esc_html__('Breadcrumb','eldritch'),
				),
				'args'          => array(
			"dependence" => true,
			"hide"       => array(
				"standard"   => "",
				"breadcrumb" => "#edgt_title_area_type_container"
			),
			"show"       => array(
				"standard"   => "#edgt_title_area_type_container",
				"breadcrumb" => ""
			)
		)
			)
		);

		$title_area_type_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $show_title_area_container,
				'name'            => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value'    => '',
				'hidden_values'   => array('breadcrumb'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_enable_breadcrumbs',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Breadcrumbs', 'eldritch'),
				'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'eldritch'),
				'parent'        => $title_area_type_container,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Title in Grid', 'eldritch'),
				'description'   => esc_html__('Set title content to be in grid', 'eldritch'),
				'parent'        => $show_title_area_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_animation',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Animations', 'eldritch'),
				'description'   => esc_html__('Choose an animation for Title Area', 'eldritch'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'no'         => esc_html__('No Animation', 'eldritch'),
					'right-left' => esc_html__('Text right to left', 'eldritch'),
					'left-right' => esc_html__('Text left to right', 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_vertial_alignment',
				'type'          => 'select',
				'default_value' => 'header_bottom',
				'label'         => esc_html__('Vertical Alignment', 'eldritch'),
				'description'   => esc_html__('Specify title vertical alignment', 'eldritch'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'eldritch'),
					'window_top'    => esc_html__('From Window Top', 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_content_alignment',
				'type'          => 'select',
				'default_value' => 'left',
				'label'         => esc_html__('Horizontal Alignment', 'eldritch'),
				'description'   => esc_html__('Specify title horizontal alignment', 'eldritch'),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'left'   => esc_html__('Left', 'eldritch'),
					'center' => esc_html__('Center', 'eldritch'),
					'right'  => esc_html__('Right', 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'title_area_background_color',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'eldritch'),
				'description' => esc_html__('Choose a background color for Title Area', 'eldritch'),
				'parent'      => $show_title_area_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'title_area_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'eldritch'),
				'description' => esc_html__('Choose an Image for Title Area', 'eldritch'),
				'parent'      => $show_title_area_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_background_image_responsive',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Background Responsive Image', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make Title background image responsive', 'eldritch'),
				'parent'        => $show_title_area_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $show_title_area_container,
				'name'            => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value'    => 'yes'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'title_area_background_image_parallax',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Background Image in Parallax', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make Title background image parallax', 'eldritch'),
				'parent'        => $title_area_background_image_responsive_container,
				'options'       => array(
					'no'       => esc_html__('No', 'eldritch'),
					'yes'      => esc_html__('Yes', 'eldritch'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'        => 'title_area_height',
			'type'        => 'text',
			'label'       => esc_html__('Height', 'eldritch'),
			'description' => esc_html__('Set a height for Title Area', 'eldritch'),
			'parent'      => $title_area_background_image_responsive_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));


		$panel_typography = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title_typography',
				'title' => esc_html__('Typography', 'eldritch'),
			)
		);

		$group_page_title_styles = eldritch_edge_add_admin_group(array(
			'name'        => 'group_page_title_styles',
			'title'       => esc_html__('Title', 'eldritch'),
			'description' => esc_html__('Define styles for page title', 'eldritch'),
			'parent'      => $panel_typography
		));

		$row_page_title_styles_1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_title_styles_1',
			'parent' => $group_page_title_styles
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_title_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'eldritch'),
			'parent'        => $row_page_title_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_title_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_title_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'eldritch'),
			'options'       => eldritch_edge_get_text_transform_array(),
			'parent'        => $row_page_title_styles_1
		));

		$row_page_title_styles_2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_title_styles_2',
			'parent' => $group_page_title_styles,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'page_title_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'eldritch'),
			'parent'        => $row_page_title_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'eldritch'),
			'options'       => eldritch_edge_get_font_style_array(),
			'parent'        => $row_page_title_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'eldritch'),
			'options'       => eldritch_edge_get_font_weight_array(),
			'parent'        => $row_page_title_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_title_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_2
		));

		$group_page_subtitle_styles = eldritch_edge_add_admin_group(array(
			'name'        => 'group_page_subtitle_styles',
			'title'       => esc_html__('Subtitle', 'eldritch'),
			'description' => esc_html__('Define styles for page subtitle', 'eldritch'),
			'parent'      => $panel_typography
		));

		$row_page_subtitle_styles_1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_subtitle_styles_1',
			'parent' => $group_page_subtitle_styles
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_subtitle_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'eldritch'),
			'parent'        => $row_page_subtitle_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'eldritch'),
			'options'       => eldritch_edge_get_text_transform_array(),
			'parent'        => $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_subtitle_styles_2',
			'parent' => $group_page_subtitle_styles,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'page_subtitle_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'eldritch'),
			'parent'        => $row_page_subtitle_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'eldritch'),
			'options'       => eldritch_edge_get_font_style_array(),
			'parent'        => $row_page_subtitle_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'eldritch'),
			'options'       => eldritch_edge_get_font_weight_array(),
			'parent'        => $row_page_subtitle_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = eldritch_edge_add_admin_group(array(
			'name'        => 'group_page_breadcrumbs_styles',
			'title'       => esc_html__('Breadcrumbs', 'eldritch'),
			'description' => esc_html__('Define styles for page breadcrumbs', 'eldritch'),
			'parent'      => $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_breadcrumbs_styles_1',
			'parent' => $group_page_breadcrumbs_styles
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_breadcrumb_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'eldritch'),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'eldritch'),
			'options'       => eldritch_edge_get_text_transform_array(),
			'parent'        => $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_breadcrumbs_styles_2',
			'parent' => $group_page_breadcrumbs_styles,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'page_breadcrumb_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'eldritch'),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'eldritch'),
			'options'       => eldritch_edge_get_font_style_array(),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'eldritch'),
			'options'       => eldritch_edge_get_font_weight_array(),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'eldritch'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = eldritch_edge_add_admin_row(array(
			'name'   => 'row_page_breadcrumbs_styles_3',
			'parent' => $group_page_breadcrumbs_styles,
			'next'   => true
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'page_breadcrumb_hovercolor',
			'default_value' => '',
			'label'         => esc_html__('Hover/Active Color', 'eldritch'),
			'parent'        => $row_page_breadcrumbs_styles_3
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_title_options_map', 6);

}