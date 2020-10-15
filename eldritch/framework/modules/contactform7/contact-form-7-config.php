<?php
if (!function_exists('eldritch_edge_contact_form_map')) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function eldritch_edge_contact_form_map() {

		vc_add_param('contact-form-7', array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Style', 'eldritch'),
			'param_name'  => 'html_class',
			'value'       => array(
				esc_html__('Default', 'eldritch')        => 'default',
				esc_html__('Custom Style 1', 'eldritch') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'eldritch') => 'cf7_custom_style_2',
                esc_html__('Custom Style 3', 'eldritch') => 'cf7_custom_style_3',
                esc_html__('Custom Style 4', 'eldritch') => 'cf7_custom_style_4'
			),
			'description' => esc_html__('You can style each form element individually in Edge Options > Contact Form 7', 'eldritch')
		));

	}

	add_action('vc_after_init', 'eldritch_edge_contact_form_map');
}
?>