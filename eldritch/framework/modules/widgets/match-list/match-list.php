<?php

class EldritchEdgeMatchList extends EldritchEdgeWidget {
	protected $params;

	public function __construct() {
		parent::__construct(
			'edgt_match_list_widget', // Base ID
			esc_html__('Edge Match List', 'eldritch'), // Name
			array('description' => esc_html__('Display matches from Match Post', 'eldritch')) // Args
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
                'type'          => 'dropdown',
                'title'         => esc_html__('Style', 'eldritch'),
                'name'          => 'skin',
                'options'       => array(
                    'dark' => esc_html__('Dark', 'eldritch'),
                    'light' => esc_html__('Light', 'eldritch')
                )
            ),
            array(
                'type'        => 'dropdown',
                'title'     => esc_html__('Team Name Tag', 'eldritch'),
                'name'        => 'team_title_tag',
                'options'       => array(
                    'h5' => 'h5',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h6' => 'h6',
                )
            ),
            array(
                'name'    => 'show_categories',
                'type'    => 'dropdown',
                'title'   => esc_html__('Show Categories', 'eldritch'),
                'options' => array(
                    'no'  => esc_html__('No', 'eldritch'),
                    'yes' => esc_html__('Yes', 'eldritch')
                )
            ),
            array(
                'name'    => 'show_date',
                'type'    => 'dropdown',
                'title'   => esc_html__('Show Date', 'eldritch'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'eldritch'),
                    'no'  => esc_html__('No', 'eldritch')
                )
            ),
			array(
				'name'  => 'number',
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
				'name'  => 'category',
				'type'  => 'textfield',
				'title' => esc_html__('Category Slug', 'eldritch'),
			),
            array(
				'name'  => 'selected_projects',
				'type'  => 'textfield',
				'title' => esc_html__('Show Only Projects with Listed IDs', 'eldritch'),
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

		echo '<div class="widget edgt-match-list-widget">';

		if (!empty($instance['title'])) {
			echo eldritch_edge_get_module_part($args['before_title'] . $instance['title'] . $args['after_title']);
		}

		echo eldritch_edge_execute_shortcode('edgt_match_small_list', $params);

		echo '</div>'; //close edgt-match-list-widget
	}

}
