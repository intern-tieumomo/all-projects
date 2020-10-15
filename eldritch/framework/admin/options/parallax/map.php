<?php

if(!function_exists('eldritch_edge_parallax_options_map')) {
	/**
	 * Parallax options page
	 */
	function eldritch_edge_parallax_options_map() {

		$panel_parallax = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax','eldritch'),
			)
		);

		eldritch_edge_add_admin_field(array(
			'type'          => 'onoff',
			'name'          => 'parallax_on_off',
			'default_value' => 'off',
			'label'         => esc_html__('Parallax on touch devices','eldritch'),
			'description'   => esc_html__('Enabling this option will allow parallax on touch devices','eldritch'),
			'parent'        => $panel_parallax
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'parallax_min_height',
			'default_value' => '400',
			'label'         => esc_html__('Parallax Min Height', 'eldritch'),
			'description'   => esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'eldritch'),
			'args'          => array(
				'col_width' => 3,
				'suffix'    => 'px'
			),
			'parent'        => $panel_parallax
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_parallax_options_map');

}