<?php

if (!function_exists('eldritch_edge_match_meta_box_map')) {
	function eldritch_edge_match_meta_box_map() {

		$match_meta_box = eldritch_edge_create_meta_box(
			array(
                'scope' => array('match-item'),
				'title' => esc_html__('Match', 'eldritch'),
				'name'  => 'match_meta'
			)
		);

        eldritch_edge_add_admin_section_title(array(
            'name'   => 'match_general_title',
            'parent' => $match_meta_box,
            'title'  => esc_html__('General', 'eldritch')
        ));


        eldritch_edge_create_meta_box_field(
            array(
                'type'          => 'select',
                'name'          => 'edgt_match_status_meta',
                'default_value' => 'to_be_played',
                'label'         => esc_html__('Match Status', 'eldritch'),
                'description'   => esc_html__('Choose match status for this match', 'eldritch'),
                'options'       => array(
                    'to_be_played'    => esc_html__('To Be Played', 'eldritch'),
                    'in_progress' => esc_html__('In Progress', 'eldritch'),
                    'finished'  => esc_html__('Finished', 'eldritch'),
                    'canceled'  => esc_html__('Canceled', 'eldritch'),
                ),
                'parent'        => $match_meta_box,
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_match_result_meta',
                'type'        => 'text',
                'label'       => esc_html__('Result', 'eldritch'),
                'description' => esc_html__('Insert result for this match', 'eldritch'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_match_date_meta',
                'type'        => 'date',
                'label'       => esc_html__('Date', 'eldritch'),
                'description' => esc_html__('Choose date for this match', 'eldritch'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_match_time_meta',
                'type'        => 'text',
                'label'       => esc_html__('Time', 'eldritch'),
                'description' => esc_html__('Insert time for this match', 'eldritch'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        $all_pages = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        eldritch_edge_create_meta_box_field(array(
            'name'        => 'edgt_match_single_back_to_link_meta',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'eldritch'),
            'description' => esc_html__('Choose "Back To" page to link from match Single Match page', 'eldritch'),
            'parent'      => $match_meta_box,
            'options'     => $all_pages
        ));

        eldritch_edge_add_admin_section_title(array(
            'name'   => 'match_first_team_title',
            'parent' => $match_meta_box,
            'title'  => esc_html__('Team 1', 'eldritch')
        ));

		eldritch_edge_create_meta_box_field(
			array(
				'name'            => 'edgt_match_team_one_image_meta',
				'type'            => 'image',
				'label'           => esc_html__('Team Image', 'eldritch'),
				'description'     => esc_html__('Choose Team Image for this match', 'eldritch'),
				'parent'          => $match_meta_box,
			)
		);
		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_match_team_one_name_meta',
				'type'        => 'text',
				'label'       => esc_html__('Team Name', 'eldritch'),
				'description' => esc_html__('Insert team name for this match', 'eldritch'),
				'parent'      => $match_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

        eldritch_edge_add_admin_section_title(array(
            'name'   => 'match_second_team_title',
            'parent' => $match_meta_box,
            'title'  => esc_html__('Team 2', 'eldritch')
        ));

        eldritch_edge_create_meta_box_field(
            array(
                'name'            => 'edgt_match_team_two_image_meta',
                'type'            => 'image',
                'label'           => esc_html__('Team Image', 'eldritch'),
                'description'     => esc_html__('Choose Team Image for this match', 'eldritch'),
                'parent'          => $match_meta_box,
            )
        );
        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_match_team_two_name_meta',
                'type'        => 'text',
                'label'       => esc_html__('Team Name', 'eldritch'),
                'description' => esc_html__('Insert team name for this match', 'eldritch'),
                'parent'      => $match_meta_box,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );
	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_match_meta_box_map');
}