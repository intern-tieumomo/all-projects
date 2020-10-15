<?php

class EldritchEdgeInfoWidget extends EldritchEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edgt_info_widget', // Base ID
			esc_html__('Info Widget', 'eldritch') // Name
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
				'name'  => 'text',
				'type'  => 'textarea',
				'title' => esc_html__('Text', 'eldritch')
			),
			array(
				'name'  => 'phone_number',
				'type'  => 'textfield',
				'title' => esc_html__('Phone number', 'eldritch')
			)
		);
	}

	public function widget($args, $instance) {
		echo eldritch_edge_get_module_part($args['before_widget']);

		if (!empty($instance['title'])) {
			echo eldritch_edge_get_module_part($args['before_title'] . $instance['title'] . $args['after_title']);
		} ?>

		<p class="edgt-info-text">
			<?php echo eldritch_edge_get_module_part($instance['text']); ?>
		</p>

		<p class="edgt-info-phone">
			<span aria-hidden="true" class="edgt-icon-font-elegant icon_phone "></span>
			<a href="tel:<?php echo eldritch_edge_get_module_part($instance['phone_number']); ?>">
				<?php echo eldritch_edge_get_module_part($instance['phone_number']); ?>
			</a>
		</p>

		<?php echo eldritch_edge_get_module_part($args['after_widget']);
	}

}