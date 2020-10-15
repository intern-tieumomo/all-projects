<?php

if (!function_exists('eldritch_edge_logo_options_map')) {
	/**
	 * Logo options page
	 */
	function eldritch_edge_logo_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__('Logo', 'eldritch'),
				'icon'  => 'fa fa-coffee'
			)
		);

		$panel_logo = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__('Branding', 'eldritch'),
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__('Hide Logo', 'eldritch'),
				'description'   => esc_html__('Enabling this option will hide logo image', 'eldritch'),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__('Logo Image - Default', 'eldritch'),
				'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
				'parent'        => $hide_logo_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_black.png",
				'label'         => esc_html__('Logo Image - Dark', 'eldritch'),
				'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
				'parent'        => $hide_logo_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__('Logo Image - Light', 'eldritch'),
				'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
				'parent'        => $hide_logo_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_sticky.png",
				'label'         => esc_html__('Logo Image - Sticky', 'eldritch'),
				'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
				'parent'        => $hide_logo_container
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__('Logo Image - Mobile', 'eldritch'),
				'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
				'parent'        => $hide_logo_container
			)
		);
    }

    add_action('eldritch_edge_options_map', 'eldritch_edge_logo_options_map', 2);

}