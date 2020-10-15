<?php

/*** Link Post Format ***/
if (!function_exists('eldritch_edge_link_post_meta_box_map')) {
	function eldritch_edge_link_post_meta_box_map() {

		$link_post_format_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Link Post Format', 'eldritch'),
				'name'  => 'post_format_link_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'eldritch'),
				'description' => esc_html__('Enter link', 'eldritch'),
				'parent'      => $link_post_format_meta_box,

			)
		);
	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_link_post_meta_box_map');
}