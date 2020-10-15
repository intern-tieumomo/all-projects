<?php

if (!function_exists('eldritch_edge_register_sidebars')) {
	/**
	 * Function that registers theme's sidebars
	 */
	function eldritch_edge_register_sidebars() {

		register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'eldritch'),
			'id'            => 'sidebar',
			'description'   => esc_html__('Default Sidebar', 'eldritch'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="edgt-sidearea-title"><span>',
			'after_title'   => '</span></h4>'
		));

	}

	add_action('widgets_init', 'eldritch_edge_register_sidebars');
}

if (!function_exists('eldritch_edge_add_support_custom_sidebar')) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates EldritchEdgeSidebar object
	 */
	function eldritch_edge_add_support_custom_sidebar() {
		add_theme_support('EldritchEdgeSidebar');
		if (get_theme_support('EldritchEdgeSidebar')) {
			new EldritchEdgeSidebar();
		}
	}

	add_action('after_setup_theme', 'eldritch_edge_add_support_custom_sidebar');
}
