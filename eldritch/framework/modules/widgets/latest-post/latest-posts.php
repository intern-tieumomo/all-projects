<?php

class EldritchEdgeLatestPosts extends EldritchEdgeWidget {
	protected $params;

	public function __construct() {
		parent::__construct(
			'edgt_latest_posts_widget', // Base ID
			esc_html__('Edge Latest Posts', 'eldritch'), // Name
			array('description' => esc_html__('Display posts from your blog', 'eldritch')) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name'  => 'title',
				'type'  => 'textfield',
				'title' => esc_html__('Title', 'eldritch')
			),
			array(
				'name'    => 'type',
				'type'    => 'dropdown',
				'title'   => esc_html__('Type', 'eldritch'),
				'options' => array(
					'minimal'      => esc_html__('Minimal', 'eldritch'),
					'image-in-box' => esc_html__('Image in box', 'eldritch'),
				)
			),
			array(
				'name'  => 'number_of_posts',
				'type'  => 'textfield',
				'title' => esc_html__('Number of posts', 'eldritch')
			),
			array(
				'name'    => 'order_by',
				'type'    => 'dropdown',
				'title'   => esc_html__('Order By', 'eldritch'),
				'options' => array(
					'title' => esc_html__('Title', 'eldritch'),
					'date'  => esc_html__('Date', 'eldritch')
				)
			),
			array(
				'name'    => 'order',
				'type'    => 'dropdown',
				'title'   => esc_html__('Order', 'eldritch'),
				'options' => array(
					'ASC'  => esc_html__('ASC', 'eldritch'),
					'DESC' => esc_html__('DESC', 'eldritch')
				)
			),
			array(
				'name'    => 'image_size',
				'type'    => 'dropdown',
				'title'   => esc_html__('Image Size', 'eldritch'),
				'options' => array(
					'original'  => esc_html__('Original', 'eldritch'),
					'landscape' => esc_html__('Landscape', 'eldritch'),
					'square'    => esc_html__('Square', 'eldritch'),
					'custom'    => esc_html__('Custom', 'eldritch')
				)
			),
			array(
				'name'  => 'custom_image_size',
				'type'  => 'textfield',
				'title' => esc_html__('Custom Image Size', 'eldritch')
			),
			array(
				'name'  => 'category',
				'type'  => 'textfield',
				'title' => esc_html__('Category Slug', 'eldritch'),
			),
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content = '';
		$params = array();

		//is instance empty?
		if (is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach ($instance as $key => $value) {
				$params[$key] = $value;
			}
		}

		$params['text_length'] = '0';

		echo '<div class="widget edgt-latest-posts-widget">';

		if (!empty($instance['title'])) {
			echo eldritch_edge_get_module_part($args['before_title'] . $instance['title'] . $args['after_title']);
		}

		echo eldritch_edge_execute_shortcode('edgt_blog_list', $params);

		echo '</div>'; //close edgt-latest-posts-widget
	}

}
