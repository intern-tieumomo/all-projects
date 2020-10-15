<?php
if (!function_exists('eldritch_edge_blog_meta_box_map')) {
	function eldritch_edge_blog_meta_box_map() {

		$edgt_blog_categories = array();
		$categories = get_categories();
		foreach ($categories as $category) {
			$edgt_blog_categories[$category->term_id] = $category->name;
		}

		$blog_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('page'),
				'title' => esc_html__('Blog', 'eldritch'),
				'name'  => 'blog_meta'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Blog Category', 'eldritch'),
				'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'eldritch'),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__('Number of Posts', 'eldritch'),
				'description' => esc_html__('Enter the number of posts to display', 'eldritch'),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories,
				'args'        => array("col_width" => 3)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_blog_split_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Blog Split Background Image', 'eldritch'),
				'description' => esc_html__('Set background image if Blog Split page template is selected', 'eldritch'),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories,
				'args'        => array("col_width" => 3)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_blog_split_title_meta',
				'type'        => 'text',
				'label'       => esc_html__('Blog Split Title', 'eldritch'),
				'description' => esc_html__('Set title if Blog Split page template is selected', 'eldritch'),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories,
				'args'        => array("col_width" => 12)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_blog_split_subtitle_meta',
				'type'        => 'text',
				'label'       => esc_html__('Blog Split Subtitle', 'eldritch'),
				'description' => esc_html__('Set subtitle if Blog Split page template is selected', 'eldritch'),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories,
				'args'        => array("col_width" => 12)
			)
		);

	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_blog_meta_box_map');
}