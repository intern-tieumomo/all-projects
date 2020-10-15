<?php

if(!function_exists('eldritch_edge_error_404_options_map')) {

	function eldritch_edge_error_404_options_map() {

		eldritch_edge_add_admin_page(array(
			'slug'  => '__404_error_page',
			'title' => esc_html__('404 Error Page','eldritch'),
			'icon'  => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = eldritch_edge_add_admin_panel(array(
			'page'  => '__404_error_page',
			'name'  => 'panel_404_options',
			'title' => esc_html__('404 Page Option','eldritch'),
		));

        eldritch_edge_add_admin_field(
            array(
                'name'          => '404_background_image',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for 404', 'eldritch'),
                'parent'        => $panel_404_options
            )
        );

        eldritch_edge_add_admin_field(
            array(
                'parent'        => $panel_404_options,
                'type'          => 'yesno',
                'name'          => '404_header',
                'default_value' => 'no',
                'label'         => esc_html__('Hide Header', 'eldritch'),
                'description'   => esc_html__('Enabling this option will hide header for 404', 'eldritch')
            )
        );

		eldritch_edge_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_title',
			'default_value' => '',
			'label'         => esc_html__('Title','eldritch'),
			'description'   => esc_html__('Enter title for 404 page','eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_subtitle',
			'default_value' => '',
			'label'         => esc_html__('Subtitle', 'eldritch'),
			'description'   => esc_html__('Enter subtitle for 404 page', 'eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => esc_html__('404_back_to_home', 'eldritch'),
			'default_value' => '',
			'label'         => esc_html__('Back to Home Button Label', 'eldritch'),
			'description'   => esc_html__('Enter label for "Back to Home" button', 'eldritch')
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_error_404_options_map', 17);

}