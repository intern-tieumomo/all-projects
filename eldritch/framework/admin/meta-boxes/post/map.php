<?php

/*** Post Options ***/

if (!function_exists('eldritch_edge_blog_post_meta_box_map')) {
	function eldritch_edge_blog_post_meta_box_map() {

		$post_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Post', 'eldritch'),
				'name'  => 'post_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_blog_single_type_meta',
				'type'          => 'select',
				'label'         => esc_html__('Post Type', 'eldritch'),
				'description'   => esc_html__('Choose post type', 'eldritch'),
				'parent'        => $post_meta_box,
				'default_value' => 'standard',
				'options'       => array(
					''             => '',
					'standard'     => esc_html__('Standard', 'eldritch'),
					'image-title' => esc_html__('Image Title', 'eldritch'),
				),
                'args'          => array(
                    "dependence" => true,
                    "hide"       => array(
                        ""    => "#edgt_edgt_blog_title_meta_container",
                        "standard"  => "#edgt_edgt_blog_title_meta_container",
                        "image-title" => ""
                    ),
                    "show"       => array(
                        ""    => "",
                        "standard"  => "",
                        "image-title" => "#edgt_edgt_blog_title_meta_container"
                    )
                )
			)
		);

		eldritch_edge_create_meta_box_field(array(
			'name'          => 'edgt_blog_masonry_gallery_dimensions',
			'type'          => 'select',
			'label'         => esc_html__('Dimensions for Masonry Gallery', 'eldritch'),
			'description'   => esc_html__('Choose image layout when it appears in Masonry Gallery list', 'eldritch'),
			'parent'        => $post_meta_box,
			'options'       => array(
				'square'             => esc_html__('Square', 'eldritch'),
				'large-width'        => esc_html__('Large width', 'eldritch'),
				'large-height'       => esc_html__('Large height', 'eldritch'),
				'large-width-height' => esc_html__('Large width/height', 'eldritch'),
			),
			'default_value' => 'square'
		));


        $blog_title_meta_container = eldritch_edge_add_admin_container(
            array(
                'parent'          => $post_meta_box,
                'name'            => 'edgt_blog_title_meta_container',
                'hidden_property' => 'edgt_blog_single_type_meta',
                'hidden_values'    => array('standard', '')
            )
        );

        eldritch_edge_create_meta_box_field(array(
            'name'          => 'edgt_title_subtitle_meta',
            'type'          => 'text',
            'default_value' => '',
            'label'         => esc_html__('Subtitle Text', 'eldritch'),
            'description'   => esc_html__('Enter your subtitle text', 'eldritch'),
            'parent'        => $blog_title_meta_container,
            'args'          => array(
                'col_width' => 6
            )
        ));


	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_blog_post_meta_box_map');
}