<?php

if (!function_exists('eldritch_edge_match_options_map')) {

	function eldritch_edge_match_options_map() {

		eldritch_edge_add_admin_page(array(
			'slug'  => '_match',
			'title' => esc_html__('Match', 'eldritch'),
			'icon'  => 'fa fa-gamepad'
		));

        $panel_match = eldritch_edge_add_admin_panel(array(
			'title' => esc_html__('Match Single', 'eldritch'),
			'name'  => 'panel_match_single',
			'page'  => '_match'
		));

        eldritch_edge_add_admin_field(array(
            'name'          => 'edgt_match_single_hide_pagination',
            'type'          => 'yesno',
            'label'         => esc_html__('Hide Pagination', 'eldritch'),
            'description'   => esc_html__('Enabling this option will turn off match pagination functionality.', 'eldritch'),
            'parent'        => $panel_match,
            'default_value' => 'no',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '#edgt_navigate_same_category_container'
            )
        ));

        $container_navigate_category = eldritch_edge_add_admin_container(array(
            'name'            => 'navigate_same_category_container',
            'parent'          => $panel_match,
            'hidden_property' => 'match_single_hide_pagination',
            'hidden_value'    => 'yes'
        ));

        eldritch_edge_add_admin_field(array(
            'name'          => 'edgt_match_single_nav_same_category',
            'type'          => 'yesno',
            'label'         => esc_html__('Enable Pagination Through Same Category', 'eldritch'),
            'description'   => esc_html__('Enabling this option will make match pagination sort through current category.', 'eldritch'),
            'parent'        => $container_navigate_category,
            'default_value' => 'no'
        ));

        eldritch_edge_add_admin_field(
            array(
                'name'          => 'match_single_separator',
                'type'          => 'image',
                'default_value' => EDGE_ASSETS_ROOT . '/img/separator.png',
                'label'         => esc_html__('Separator On Section Title', 'eldritch'),
                'description'   => esc_html__('Choose a default separator image on match single ', 'eldritch'),
                'parent'        => $panel_match
            )
        );

        eldritch_edge_add_admin_field(array(
            'name'          => 'match_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments', 'eldritch'),
            'description'   => esc_html__('Enabling this option will show comments on your page.', 'eldritch'),
            'parent'        => $panel_match,
            'default_value' => 'no'
        ));


    }

	add_action('eldritch_edge_options_map', 'eldritch_edge_match_options_map', 15);

}