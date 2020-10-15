<?php

class EldritchEdgeHtmlWidget extends EldritchEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edgt_html_widget', // Base ID
			esc_html__('Edge Raw HTML', 'eldritch') // Name
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name'  => 'html',
				'type'  => 'textarea',
				'title' => esc_html__('Raw HTML', 'eldritch')
			)
		);
	}

	public function widget($args, $instance) {
		echo eldritch_edge_get_module_part($args['before_widget']); ?>
		<div class="edgt-html-widget">
			<?php echo eldritch_edge_get_module_part($instance['html']); ?>
		</div>
		<?php echo eldritch_edge_get_module_part($args['after_widget']);
	}

}