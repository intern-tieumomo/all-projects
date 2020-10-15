<?php

if (!function_exists('eldritch_edge_footer_options_map')) {
	/**
	 * Add footer options
	 */
	function eldritch_edge_footer_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__('Footer', 'eldritch'),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = eldritch_edge_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'eldritch'),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'uncovering_footer',
				'default_value' => 'no',
				'label'         => esc_html__('Uncovering Footer', 'eldritch'),
				'description'   => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'eldritch'),
				'parent'        => $footer_panel,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'        => 'footer_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'eldritch'),
				'description' => esc_html__('Choose Background Image for Footer Area', 'eldritch'),
				'parent'      => $footer_panel
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__('Footer in Grid', 'eldritch'),
				'description'   => esc_html__('Enabling this option will place Footer content in grid', 'eldritch'),
				'parent'        => $footer_panel,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__('Show Footer Top', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show Footer Top area', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_top_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'default_value' => '4',
				'label'         => esc_html__('Footer Top Columns', 'eldritch'),
				'description'   => esc_html__('Choose number of columns for Footer Top area', 'eldritch'),
				'options'       => array(
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

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => '',
				'label'         => esc_html__('Footer Top Columns Alignment', 'eldritch'),
				'description'   => esc_html__('Text Alignment in Footer Columns', 'eldritch'),
				'options'       => array(
					'left'   => esc_html__('Left', 'eldritch'),
					'center' => esc_html__('Center', 'eldritch'),
					'right'  => esc_html__('Right', 'eldritch'),
				),
				'parent'        => $show_footer_top_container,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__('Show Footer Bottom', 'eldritch'),
				'description'   => esc_html__('Enabling this option will show Footer Bottom area', 'eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);


		eldritch_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__('Footer Bottom Columns', 'eldritch'),
				'description'   => esc_html__('Choose number of columns for Footer Bottom area', 'eldritch'),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '3 (25%+50%+25%)',

				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_bottom_border',
				'default_value' => 'no',
				'label'         => esc_html__('Border Top', 'eldritch'),
				'description'   => esc_html__('Enable Border Top', 'eldritch'),
				'parent'        => $show_footer_bottom_container,
			)
		);

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_footer_options_map', 10);

}