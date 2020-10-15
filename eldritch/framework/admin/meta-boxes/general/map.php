<?php

if (!function_exists('eldritch_edge_general_meta_box_map')) {
	function eldritch_edge_general_meta_box_map() {

		$general_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
				'title' => esc_html__('General', 'eldritch'),
				'name'  => 'general_meta'
			)
		);


		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_first_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Page Main Color', 'eldritch'),
				'description'   => esc_html__('Choose page main color', 'eldritch'),
				'parent'        => $general_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_page_background_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Page Background Color', 'eldritch'),
				'description'   => esc_html__('Choose background color for page content', 'eldritch'),
				'parent'        => $general_meta_box
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_page_skin_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Page Skin', 'eldritch'),
                'description'   => esc_html__('Choose Page Skin for this page', 'eldritch'),
                'parent'        => $general_meta_box,
                'options'       => array(
                    ''    => esc_html__('Default (Dark)', 'eldritch'),
                    'edgt-page-content-skin-light' => esc_html__('Light', 'eldritch')
                ),
            )
        );


        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_page_background_image_meta',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Page Background Image', 'eldritch'),
                'description'   => esc_html__('Set background image for page content', 'eldritch'),
                'parent'        => $general_meta_box
            )
        );


		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_comments_background_color_meta',
			'type'          => 'color',
			'label'         => esc_html__('Comments Background Color', 'eldritch'),
			'description'   => esc_html__('Choose comments background color', 'eldritch'),
			'parent'        => $general_meta_box,
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_page_padding_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Page Padding', 'eldritch'),
				'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'eldritch'),
				'parent'        => $general_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Always put content behind header', 'eldritch'),
				'description'   => esc_html__('Enabling this option will put page content behind page header', 'eldritch'),
				'parent'        => $general_meta_box,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_enable_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Passepartout', 'eldritch'),
				'description'   => esc_html__('Enabling this option will display passepartout around site content', 'eldritch'),
				'parent'        => $general_meta_box,
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#edgt_edgt_paspartu_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#edgt_edgt_paspartu_meta_container',
						'no'  => '',
						'yes' => '#edgt_edgt_paspartu_meta_container'
					)
				)
			)
		);

		$paspartu_meta_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'edgt_paspartu_meta_container',
				'hidden_property' => 'edgt_enable_paspartu_meta',
				'hidden_values'   => array('', 'no')
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_paspartu_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Color', 'eldritch'),
				'description'   => esc_html__('Choose passepartout color. Default value is #fff', 'eldritch'),
				'parent'        => $paspartu_meta_container,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_paspartu_size_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Size', 'eldritch'),
				'description'   => esc_html__('Enter size amount for passepartout.Default value is 15px', 'eldritch'),
				'parent'        => $paspartu_meta_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		if (eldritch_edge_options()->getOptionValue('smooth_pt_true_ajax') === 'yes') {
			eldritch_edge_create_meta_box_field(
				array(
					'name'          => 'edgt_page_transition_type',
					'type'          => 'selectblank',
					'label'         => esc_html__('Page Transition', 'eldritch'),
					'description'   => esc_html__('Choose the type of transition to this page', 'eldritch'),
					'parent'        => $general_meta_box,
					'default_value' => '',
					'options'       => array(
						'no-animation' => esc_html__('No animation', 'eldritch'),
						'fade'         => esc_html__('Fade', 'eldritch')
					)
				)
			);
		}

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_page_comments_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Show Comments', 'eldritch'),
				'description' => esc_html__('Enabling this option will show comments on your page', 'eldritch'),
				'parent'      => $general_meta_box,
                'default_value' => '',
				'options'     => array(
					'yes' => esc_html__('Yes', 'eldritch'),
					'no'  => esc_html__('No', 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_boxed_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Boxed Layout', 'eldritch'),
				'description'   => '',
				'parent'        => $general_meta_box,
				'options'       => array(
					''    => '',
					'yes' => esc_html__('Yes', 'eldritch'),
					'no'  => esc_html__('No', 'eldritch'),
				),
				'args'          => array(
					"dependence" => true,
					'show'       => array(
						''    => '',
						'yes' => '#edgt_edgt_boxed_container_meta',
						'no'  => '',

					),
					'hide'       => array(
						''    => '#edgt_edgt_boxed_container_meta',
						'yes' => '',
						'no'  => '#edgt_edgt_boxed_container_meta',
					)
				)
			)
		);

		$boxed_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'edgt_boxed_container_meta',
				'hidden_property' => 'edgt_boxed_meta',
				'hidden_values'   => array('', 'no')
			)
		);

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_header_footer_in_box_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Boxed Layout Header/Footer', 'eldritch'),
                'description'   => esc_html__('Choose if the Header and the Footer will be placed in a boxed layout or fullwidth.', 'eldritch'),
                'parent'      => $boxed_container,
                'options'       => array(
                    ''    => '',
                    'yes' => esc_html__('Yes', 'eldritch'),
                    'no'  => esc_html__('No', 'eldritch'),
                )
            )
        );

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_page_background_color_in_box_meta',
				'type'        => 'color',
				'label'       => esc_html__('Page Background Color', 'eldritch'),
				'description' => esc_html__('Choose the page background color outside box.', 'eldritch'),
				'parent'      => $boxed_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_boxed_pattern_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Background Pattern', 'eldritch'),
				'description' => esc_html__('Choose an image to be used as background pattern', 'eldritch'),
				'parent'      => $boxed_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_boxed_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'eldritch'),
				'description' => esc_html__('Choose an image to be displayed in background', 'eldritch'),
				'parent'      => $boxed_container,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__('Background Image Attachment', 'eldritch'),
				'description'   => esc_html__('Choose background image attachment if background image option is set', 'eldritch'),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__('Fixed', 'eldritch'),
					'scroll' => esc_html__('Scroll', 'eldritch')
				)
			)
		);

	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_general_meta_box_map');
}