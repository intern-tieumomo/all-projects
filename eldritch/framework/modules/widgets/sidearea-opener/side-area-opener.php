<?php

class EldritchEdgeSideAreaOpener extends EldritchEdgeWidget {
	public function __construct() {
		parent::__construct(
			'edgt_side_area_opener', // Base ID
			esc_html__('Edge Side Area Opener', 'eldritch') // Name
		);

		$this->setParams();
	}

	protected function setParams() {

		$this->params = array(
			array(
				'name'        => 'side_area_opener_icon_color',
				'type'        => 'textfield',
				'title'       => esc_html__('Icon Color', 'eldritch'),
				'description' => esc_html__('Define color for Side Area opener icon', 'eldritch')
			)
		);

	}


	public function widget($args, $instance) {

		$sidearea_icon_styles = array();

		if (!empty($instance['side_area_opener_icon_color'])) {
			$sidearea_icon_styles[] = 'border-color: ' . $instance['side_area_opener_icon_color'];
		}

		echo eldritch_edge_get_module_part($args['before_widget']);

		?>
		<a class="edgt-side-menu-button-opener"
		   href="javascript:void(0)">
			<?php echo eldritch_edge_get_side_menu_icon_html($sidearea_icon_styles); ?>
		</a>

		<?php echo eldritch_edge_get_module_part($args['after_widget']); ?>

	<?php }

}