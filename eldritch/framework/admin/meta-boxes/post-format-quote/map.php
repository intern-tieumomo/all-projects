<?php

/*** Quote Post Format ***/

if (!function_exists('eldritch_edge_quote_post_meta_box_map')) {
	function eldritch_edge_quote_post_meta_box_map() {

		$quote_post_format_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Quote Post Format', 'eldritch'),
				'name'  => 'post_format_quote_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Quote Text', 'eldritch'),
				'description' => esc_html__('Enter Quote text', 'eldritch'),
				'parent'      => $quote_post_format_meta_box,

			)
		);
	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_quote_post_meta_box_map');
}