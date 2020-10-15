<?php

class EldritchEdgeContactForm7 extends EldritchEdgeWidget {
	protected $params;

	public function __construct() {
		parent::__construct(
			'edgt_ontact_form7_widget', // Base ID
			'Edge Contact Form 7', // Name
			array('description' => esc_html__('Display Contact Form 7', 'eldritch'),) // Args
		);

		$this->setParams();
	}

	protected function setParams() {

		$contact_forms = array();

		$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

		if ($cf7) {
			foreach ($cf7 as $cform) {
				$contact_forms[$cform->ID] = $cform->post_title;
			}

		} else {
			$contact_forms[esc_html__('No contact forms found', 'eldritch')] = 0;
		}

		$this->params = array(
			array(
				'name'  => 'title',
				'type'  => 'textfield',
				'title' => esc_html__('Title', 'eldritch')
			),
			array(
				'name'  => 'text',
				'type'  => 'textfield',
				'title' => esc_html__('Text', 'eldritch')
			),
			array(
				'name'  => 'background_color',
				'type'  => 'textfield',
				'title' => esc_html__('Background Color', 'eldritch')
			),
			array(
				'name'  => 'background_image',
				'type'  => 'textfield',
				'title' => esc_html__('Background Image Url', 'eldritch')
			),
			array(
				'name'    => 'id',
				'type'    => 'dropdown',
				'title'   => esc_html__('Contact Form', 'eldritch'),
				'options' => $contact_forms
			),
			array(
				'name'        => 'html_class',
				'type'        => 'dropdown',
				'title'       => esc_html__('Style', 'eldritch'),
				'options'     => array(
					'default'            => esc_html__('Default', 'eldritch'),
					'cf7_custom_style_1' => esc_html__('Custom Style 1', 'eldritch'),
					'cf7_custom_style_2' => esc_html__('Custom Style 2', 'eldritch'),
					'cf7_custom_style_3' => esc_html__('Custom Style 3', 'eldritch'),
                    'cf7_custom_style_4' => esc_html__('Custom Style 4', 'eldritch'),

				),
				'description' => esc_html__('You can style each form element individually in Edge Options > Contact Form 7', 'eldritch')
			),
			array(
				'name'    => 'cf_type',
				'type'    => 'dropdown',
				'title'   => esc_html__('Choose Layout', 'eldritch'),
				'options' => array(
					'boxed'  => esc_html__('Boxed', 'eldritch'),
					'normal' => esc_html__('Normal', 'eldritch')
				),
			),
			array(
				'name'    => 'color_type',
				'type'    => 'dropdown',
				'title'   => esc_html__('Choose Skin', 'eldritch'),
				'options' => array(
					'light' => esc_html__('Light', 'eldritch'),
					'dark'  => esc_html__('Dark', 'eldritch')
				),
			),
		);
	}


	public function widget($args, $instance) {
		extract($args);

//      //prepare variables
//      $content        = '';
		$params = array();
//
		//is instance empty?
		if (is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach ($instance as $key => $value) {
				$params[$key] = $value;
			}
		}

		$layout_type = '';
		if (($instance['cf_type']) == 'boxed') {
			$layout_type = ' edgt-widget-cf-boxed';
		}

		$cfStyles = array();

		if (($instance['background_color']) !== '') {
			$cfStyles[] = 'background-color: ' . $instance['background_color'] . '';
		}

		if (($instance['background_image']) !== '' && ($instance['background_color']) == '') {
			$cfStyles[] = 'background-image: url(' . $instance['background_image'] . ')';
		}

		$layout_color = '';
		if (($instance['color_type']) == 'light') {
			$layout_color = ' edgt-widget-cf-light';
		}

		$cf_custom_style = '';
		if (($instance['html_class']) === 'cf7_custom_style_1') {
			$cf_custom_style = ' cf7_custom_style_1';
		} elseif (($instance['html_class']) === 'cf7_custom_style_2') {
			$cf_custom_style = ' cf7_custom_style_2';
		} elseif (($instance['html_class']) === 'cf7_custom_style_3') {
            $cf_custom_style = ' cf7_custom_style_3';
        } elseif (($instance['html_class']) === 'cf7_custom_style_4') {
            $cf_custom_style = ' cf7_custom_style_4';
        }

		echo '<div class="widget edgt-contact-form-7-widget' . $layout_type . $layout_color . $cf_custom_style . '" ' . eldritch_edge_get_inline_style($cfStyles) . '>';

		echo '<div class="edgt-contact-form-title">';
		if (!empty($instance['title'])) {
			echo eldritch_edge_get_module_part($args['before_title'] . $instance['title'] . $args['after_title']);
		}
		echo '</div>';

		echo '<div class="edgt-contact-form-text">';
		if (!empty($instance['text'])) {
			echo eldritch_edge_get_module_part($args['before_title'] . $instance['text'] . $args['after_title']);
		}
		echo '</div>';

		echo eldritch_edge_execute_shortcode('contact-form-7', $params);

		echo '</div>'; //close edgt-contact-form-7-widget
	}
}