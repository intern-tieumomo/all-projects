<?php

/*** Gallery Post Format ***/


if (!function_exists('eldritch_edge_gallery_post_meta_box_map')) {
	function eldritch_edge_gallery_post_meta_box_map() {
		$gallery_post_format_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Gallery Post Format', 'eldritch'),
				'name'  => 'post_format_gallery_meta'
			)
		);

		eldritch_edge_add_multiple_images_field(
			array(
				'name'        => 'edgt_post_gallery_images_meta',
				'label'       => esc_html__('Gallery Images', 'eldritch'),
				'description' => esc_html__('Choose your gallery images', 'eldritch'),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_gallery_post_meta_box_map');
}