<?php

//Testimonials

if (!function_exists('eldritch_edge_testimonial_meta_box_map')) {
	function eldritch_edge_testimonial_meta_box_map() {

		$testimonial_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('testimonials'),
				'title' => esc_html__('Testimonial', 'eldritch'),
				'name'  => 'testimonial_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_testimonaial_logo_image',
				'type'        => 'image',
				'label'       => esc_html__('Logo Image', 'eldritch'),
				'description' => esc_html__('Choose testimonial logo image ', 'eldritch'),
				'parent'      => $testimonial_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__('Title', 'eldritch'),
				'description' => esc_html__('Enter testimonial title', 'eldritch'),
				'parent'      => $testimonial_meta_box,
			)
		);


		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__('Author', 'eldritch'),
				'description' => esc_html__('Enter author name', 'eldritch'),
				'parent'      => $testimonial_meta_box,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__('Job Position', 'eldritch'),
				'description' => esc_html__('Enter job position', 'eldritch'),
				'parent'      => $testimonial_meta_box,
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__('Text', 'eldritch'),
				'description' => esc_html__('Enter testimonial text', 'eldritch'),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_testimonial_meta_box_map');
}