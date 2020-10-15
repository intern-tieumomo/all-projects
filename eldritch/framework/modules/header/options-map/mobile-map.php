<?php

if (!function_exists('eldritch_edge_mobile_header_options_map')) {

	function eldritch_edge_mobile_header_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_mobile_header_page',
				'title' => esc_html__('Mobile Header', 'eldritch'),
				'icon'  => 'fa fa-mobile ',
			)
		);

		$panel_mobile_header = eldritch_edge_add_admin_panel(array(
			'title' => esc_html__('Mobile header', 'eldritch'),
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header_page'
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Header Height', 'eldritch'),
			'description' => esc_html__('Enter height for mobile header in pixels', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Header Background Color', 'eldritch'),
			'description' => esc_html__('Choose color for mobile header', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Background Color', 'eldritch'),
			'description' => esc_html__('Choose color for mobile menu', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Item Separator Color', 'eldritch'),
			'description' => esc_html__('Choose color for mobile menu horizontal separators', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header', 'eldritch'),
			'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices', 'eldritch'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography', 'eldritch')
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Text Color', 'eldritch'),
			'description' => esc_html__('Define color for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Hover/Active Color', 'eldritch'),
			'description' => esc_html__('Define hover/active color for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => esc_html__('Navigation Font Family', 'eldritch'),
			'description' => esc_html__('Define font family for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Font Size', 'eldritch'),
			'description' => esc_html__('Define font size for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Line Height', 'eldritch'),
			'description' => esc_html__('Define line height for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Text Transform', 'eldritch'),
			'description' => esc_html__('Define text transform for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'options'     => eldritch_edge_get_text_transform_array(true)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Style', 'eldritch'),
			'description' => esc_html__('Define font style for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'options'     => eldritch_edge_get_font_style_array(true)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Weight', 'eldritch'),
			'description' => esc_html__('Define font weight for mobile navigation text', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'options'     => eldritch_edge_get_font_weight_array(true)
		));

		eldritch_edge_add_admin_section_title(array(
			'name'   => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title'  => esc_html__('Mobile Menu Opener', 'eldritch')
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'mobile_icon_pack',
			'type'          => 'select',
			'label'         => esc_html__('Mobile Navigation Icon Pack', 'eldritch'),
			'default_value' => 'font_awesome',
			'description'   => esc_html__('Choose icon pack for mobile navigation icon', 'eldritch'),
			'parent'        => $panel_mobile_header,
			'options'       => eldritch_edge_icon_collections()->getIconCollectionsExclude(array(
				'linea_icons',
				'simple_line_icons',
				'linear_icons'
			))
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Color', 'eldritch'),
			'description' => esc_html__('Choose color for icon header', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'eldritch'),
			'description' => esc_html__('Choose hover color for mobile navigation icon ', 'eldritch'),
			'parent'      => $panel_mobile_header
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Navigation Icon size', 'eldritch'),
			'description' => esc_html__('Choose size for mobile navigation icon', 'eldritch'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));
	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_mobile_header_options_map', 5);

}