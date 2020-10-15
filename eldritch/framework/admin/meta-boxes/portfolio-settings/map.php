<?php

if (!function_exists('eldritch_edge_portfolio_settings_meta_box_map')) {
	function eldritch_edge_portfolio_settings_meta_box_map() {

		$meta_box = eldritch_edge_create_meta_box(array(
			'scope' => 'portfolio-item',
			'title' => esc_html__('Portfolio Settings', 'eldritch'),
			'name'  => 'portfolio_settings_meta_box'
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'edgt_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'eldritch'),
			'description' => esc_html__('Choose a default type for Single Project pages', 'eldritch'),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__('Default', 'eldritch'),
				'small-images'      => esc_html__('Portfolio small images', 'eldritch'),
				'small-slider'      => esc_html__('Portfolio small slider', 'eldritch'),
				'big-images'        => esc_html__('Portfolio big images', 'eldritch'),
				'big-slider'        => esc_html__('Portfolio big slider', 'eldritch'),
				'custom'            => esc_html__('Portfolio custom', 'eldritch'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'eldritch'),
				'gallery'           => esc_html__('Portfolio gallery', 'eldritch'),
				'video'             => esc_html__('Portfolio video', 'eldritch'),
			)
		));

		$all_pages = array();
		$pages = get_pages();
		foreach ($pages as $page) {
			$all_pages[$page->ID] = $page->post_title;
		}

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'portfolio_single_back_to_link',
			'type'        => 'select',
			'label'       => esc_html__('"Back To" Link', 'eldritch'),
			'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'eldritch'),
			'parent'      => $meta_box,
			'options'     => $all_pages
		));

		$group_portfolio_external_link = eldritch_edge_add_admin_group(array(
			'name'        => 'group_portfolio_external_link',
			'title'       => esc_html__('Portfolio External Link', 'eldritch'),
			'description' => esc_html__('Enter URL to link from Portfolio List page', 'eldritch'),
			'parent'      => $meta_box
		));

		$row_portfolio_external_link = eldritch_edge_add_admin_row(array(
			'name'   => 'row_gradient_overlay',
			'parent' => $group_portfolio_external_link
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'portfolio_external_link',
			'type'        => 'textsimple',
			'label'       => esc_html__('Link', 'eldritch'),
			'description' => '',
			'parent'      => $row_portfolio_external_link,
			'args'        => array(
				'col_width' => 3
			)
		));

		eldritch_edge_create_meta_box_field(array(
			'name'        => 'portfolio_external_link_target',
			'type'        => 'selectsimple',
			'label'       => esc_html__('Target', 'eldritch'),
			'description' => '',
			'parent'      => $row_portfolio_external_link,
			'options'     => array(
				'_self'  => esc_html__('Same Window', 'eldritch'),
				'_blank' => esc_html__('New Window', 'eldritch')
			)
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'portfolio_masonry_dimenisions',
				'type'        => 'select',
				'label'       => esc_html__('Dimensions for Masonry', 'eldritch'),
				'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'eldritch'),
				'parent'      => $meta_box,
				'options'     => array(
					'default'            => esc_html__('Default', 'eldritch'),
					'large_width'        => esc_html__('Large width', 'eldritch'),
					'large_height'       => esc_html__('Large height', 'eldritch'),
					'large_width_height' => esc_html__('Large width/height', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'portfolio_background_color',
				'type'        => 'color',
				'label'       => esc_html__('Portfolio Background Color', 'eldritch'),
				'description' => esc_html__('Portfolio background color used for some portfolio list hover animations', 'eldritch'),
				'parent'      => $meta_box,

			)
		);

	}


	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_portfolio_settings_meta_box_map');
}