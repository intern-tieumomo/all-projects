<?php

/*** Audio Post Format ***/

if (!function_exists('eldritch_edge_audio_post_meta_box_map')) {
	function eldritch_edge_audio_post_meta_box_map() {

		$audio_post_format_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Audio Post Format', 'eldritch'),
				'name'  => 'post_format_audio_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'eldritch'),
				'description' => esc_html__('Enter audion link', 'eldritch'),
				'parent'      => $audio_post_format_meta_box,

			)
		);

	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_audio_post_meta_box_map');
}