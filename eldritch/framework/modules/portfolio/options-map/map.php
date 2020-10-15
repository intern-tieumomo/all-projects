<?php

if (!function_exists('eldritch_edge_portfolio_options_map')) {

	function eldritch_edge_portfolio_options_map() {

		eldritch_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'eldritch'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = eldritch_edge_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'eldritch'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_template',
			'type'          => 'select',
			'label'         => esc_html__('Portfolio Type', 'eldritch'),
			'default_value' => 'small-images',
			'description'   => esc_html__('Choose a default type for Single Project pages', 'eldritch'),
			'parent'        => $panel,
			'options'       => array(
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

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'eldritch'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'eldritch'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'eldritch'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'eldritch'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_author',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Author', 'eldritch'),
			'description'   => esc_html__('Enabling this option will disable author meta on Single Projects.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'eldritch'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'eldritch'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'eldritch'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'eldritch'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '#edgt_navigate_same_category_container'
			)
		));

		$container_navigate_category = eldritch_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_nav_same_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Enable Pagination Through Same Category', 'eldritch'),
			'description'   => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'eldritch'),
			'parent'        => $container_navigate_category,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'portfolio_single_numb_columns',
			'type'          => 'select',
			'label'         => esc_html__('Number of Columns', 'eldritch'),
			'default_value' => 'three-columns',
			'description'   => esc_html__('Enter the number of columns for Portfolio Gallery type', 'eldritch'),
			'parent'        => $panel,
			'options'       => array(
				'two-columns'   => esc_html__('2 columns', 'eldritch'),
				'three-columns' => esc_html__('3 columns', 'eldritch'),
				'four-columns'  => esc_html__('4 columns', 'eldritch'),
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'eldritch'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'eldritch'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_portfolio_options_map', 13);

}