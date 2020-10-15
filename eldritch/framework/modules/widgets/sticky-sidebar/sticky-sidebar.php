<?php

class EldritchEdgeStickySidebar extends EldritchEdgeWidget {
	protected $params;

	public function __construct() {
		parent::__construct(
			'edgt_sticky_sidebar', // Base ID
			esc_html__('Edge Sticky Sidebar', 'eldritch'), // Name
			array('description' => esc_html__('Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'eldritch'),) // Args
		);
		$this->setParams();
	}

	protected function setParams() {

	}

	public function widget($args, $instance) {
		echo '<div class="widget widget_sticky-sidebar"></div>';
	}

}
