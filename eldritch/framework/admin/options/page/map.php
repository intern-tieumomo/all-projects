<?php

if(!function_exists('eldritch_edge_page_options_map')) {

	function eldritch_edge_page_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__('Page','eldritch'),
				'icon'  => 'fa fa-file-o'
			)
		);

		$custom_sidebars = eldritch_edge_get_custom_sidebars();

		$panel_sidebar = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__('Design Style','eldritch')
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout','eldritch'),
			'description'   => esc_html__('Choose a sidebar layout for pages','eldritch'),
			'default_value' => 'default',
			'parent'        => $panel_sidebar,
			'options'       => array(
				'default'          => esc_html__('No Sidebar','eldritch'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right','eldritch'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right','eldritch'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left','eldritch'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left','eldritch'),
			)
		));


		if(count($custom_sidebars) > 0) {
			eldritch_edge_add_admin_field(array(
				'name'        => 'page_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','eldritch'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"','eldritch'),
				'parent'      => $panel_sidebar,
				'options'     => $custom_sidebars
			));
		}

		eldritch_edge_add_admin_field(array(
			'name'          => 'page_show_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','eldritch'),
			'description'   => esc_html__('Enabling this option will show comments on your page', 'eldritch'),
			'default_value' => 'yes',
			'parent'        => $panel_sidebar
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_page_options_map', 8);

}