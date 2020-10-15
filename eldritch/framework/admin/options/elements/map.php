<?php

if(!function_exists('eldritch_edge_load_elements_map')) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function eldritch_edge_load_elements_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_elements_page',
				'title' => esc_html__('Elements','eldritch'),
				'icon'  => 'fa fa-flag-o'
			)
		);

		do_action('eldritch_edge_options_elements_map');

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_load_elements_map', 11);

}