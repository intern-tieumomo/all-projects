<?php

/*** Video Post Format ***/

if (!function_exists('eldritch_edge_video_post_meta_box_map')) {
	function eldritch_edge_video_post_meta_box_map() {

		$video_post_format_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Video Post Format', 'eldritch'),
				'name'  => 'post_format_video_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__('Video Type', 'eldritch'),
				'description'   => esc_html__('Choose video type', 'eldritch'),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'youtube',
				'options'       => array(
					'youtube' => esc_html__('Youtube', 'eldritch'),
					'vimeo'   => esc_html__('Vimeo', 'eldritch'),
					'self'    => esc_html__('Self Hosted', 'eldritch')
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'youtube' => '#edgt_edgt_video_self_hosted_container',
						'vimeo'   => '#edgt_edgt_video_self_hosted_container',
						'self'    => '#edgt_edgt_video_embedded_container'
					),
					'show'       => array(
						'youtube' => '#edgt_edgt_video_embedded_container',
						'vimeo'   => '#edgt_edgt_video_embedded_container',
						'self'    => '#edgt_edgt_video_self_hosted_container'
					)
				)
			)
		);

		$edgt_video_embedded_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'edgt_video_embedded_container',
				'hidden_property' => 'edgt_video_type_meta',
				'hidden_value'    => 'self'
			)
		);

		$edgt_video_self_hosted_container = eldritch_edge_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'edgt_video_self_hosted_container',
				'hidden_property' => 'edgt_video_type_meta',
				'hidden_values'   => array('youtube', 'vimeo')
			)
		);


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_video_id_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video ID', 'eldritch'),
				'description' => esc_html__('Enter Video ID', 'eldritch'),
				'parent'      => $edgt_video_embedded_container,

			)
		);


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Video Image', 'eldritch'),
				'description' => esc_html__('Upload video image', 'eldritch'),
				'parent'      => $edgt_video_self_hosted_container,

			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_video_webm_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video WEBM', 'eldritch'),
				'description' => esc_html__('Enter video URL for WEBM format', 'eldritch'),
				'parent'      => $edgt_video_self_hosted_container,

			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_video_mp4_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video MP4', 'eldritch'),
				'description' => esc_html__('Enter video URL for MP4 format', 'eldritch'),
				'parent'      => $edgt_video_self_hosted_container,

			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_video_ogv_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video OGV', 'eldritch'),
				'description' => esc_html__('Enter video URL for OGV format', 'eldritch'),
				'parent'      => $edgt_video_self_hosted_container,

			)
		);
	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_video_post_meta_box_map');
}