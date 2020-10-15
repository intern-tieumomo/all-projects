<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class EldritchEdgeSeparatorWidget extends EldritchEdgeWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'edgt_separator_widget', // Base ID
			esc_html__('Edge Separator Widget', 'eldritch') // Name
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__('Type', 'eldritch'),
				'name'    => 'type',
				'options' => array(
					'normal'     => esc_html__('Normal', 'eldritch'),
					'full-width' => esc_html__('Full Width', 'eldritch')
				)
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__('Position', 'eldritch'),
				'name'    => 'position',
				'options' => array(
					'center' => esc_html__('Center', 'eldritch'),
					'left'   => esc_html__('Left', 'eldritch'),
					'right'  => esc_html__('Right', 'eldritch')
				)
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__('Style', 'eldritch'),
				'name'    => 'border_style',
				'options' => array(
					'solid'  => esc_html__('Solid', 'eldritch'),
					'dashed' => esc_html__('Dashed', 'eldritch'),
					'dotted' => esc_html__('Dotted', 'eldritch')
				)
			),
			array(
				'type'  => 'textfield',
				'title' => esc_html__('Color', 'eldritch'),
				'name'  => 'color'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Width', 'eldritch'),
				'name'        => 'width',
				'description' => ''
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Thickness (px)', 'eldritch'),
				'name'        => 'thickness',
				'description' => ''
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Top Margin', 'eldritch'),
				'name'        => 'top_margin',
				'description' => ''
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__('Bottom Margin', 'eldritch'),
				'name'        => 'bottom_margin',
				'description' => ''
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget($args, $instance) {

		extract($args);

		//prepare variables
		$params = '';

		//is instance empty?
		if (is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach ($instance as $key => $value) {
				$params .= " $key='$value' ";
			}
		}

		echo '<div class="widget edgt-separator-widget">';

		//finally call the shortcode
		echo do_shortcode("[edgt_separator $params]"); // XSS OK

		echo '</div>'; //close div.edgt-separator-widget
	}
}