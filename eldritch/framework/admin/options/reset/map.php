<?php

if(!function_exists('eldritch_edge_reset_options_map')) {
	/**
	 * Reset options panel
	 */
	function eldritch_edge_reset_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'eldritch'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'reset_to_defaults',
			'default_value' => 'no',
			'label'         => esc_html__('Reset to Defaults', 'eldritch'),
			'description'   => esc_html__('This option will reset all Edge Options values to defaults', 'eldritch'),
			'parent'        => $panel_reset
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_reset_options_map', 30);

}