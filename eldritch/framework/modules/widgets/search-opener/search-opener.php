<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Edge_Search_Opener
 */
class EldritchEdgeSearchOpener extends EldritchEdgeWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'edgt_search_opener', // Base ID
			esc_html__('Edge Search Opener', 'eldritch') // Name
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'name'        => 'search_icon_size',
				'type'        => 'textfield',
				'title'       => esc_html__('Search Icon Size (px)', 'eldritch'),
				'description' => esc_html__('Define size for Search icon', 'eldritch')
			),
			array(
				'name'        => 'search_icon_color',
				'type'        => 'textfield',
				'title'       => esc_html__('Search Icon Color', 'eldritch'),
				'description' => esc_html__('Define color for Search icon', 'eldritch')
			),
			array(
				'name'        => 'search_icon_hover_color',
				'type'        => 'textfield',
				'title'       => esc_html__('Search Icon Hover Color', 'eldritch'),
				'description' => esc_html__('Define hover color for Search icon', 'eldritch')
			),
			array(
				'name'        => 'show_label',
				'type'        => 'dropdown',
				'title'       => esc_html__('Enable Search Icon Text', 'eldritch'),
				'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header', 'eldritch'),
				'options'     => array(
					''    => '',
					'yes' => esc_html__('Yes', 'eldritch'),
					'no'  => esc_html__('No', 'eldritch')
				)
			),
			array(
				'name'        => 'close_icon_position',
				'type'        => 'dropdown',
				'title'       => esc_html__('Close icon stays on opener place', 'eldritch'),
				'description' => esc_html__('Enable this option to set close icon on same position like opener icon', 'eldritch'),
				'options'     => array(
					'yes' => esc_html__('Yes', 'eldritch'),
					'no'  => esc_html__('No', 'eldritch')
				)
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
		global $eldritch_options, $eldritch_IconCollections;

		$search_type_class = 'edgt-search-opener';
		$fullscreen_search_overlay = false;
		$search_opener_styles = array();
		$show_search_text = $instance['show_label'] == 'yes' || $eldritch_options['enable_search_icon_text'] == 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;

		if (isset($eldritch_options['search_type']) && $eldritch_options['search_type'] == 'fullscreen-search') {
			if (isset($eldritch_options['search_animation']) && $eldritch_options['search_animation'] == 'search-from-circle') {
				$fullscreen_search_overlay = true;
			}
		}

		if (isset($eldritch_options['search_type']) && $eldritch_options['search_type'] == 'search_covers_header') {
			if (isset($eldritch_options['search_cover_only_bottom_yesno']) && $eldritch_options['search_cover_only_bottom_yesno'] == 'yes') {
				$search_type_class .= ' search_covers_only_bottom';
			}
		}

		if (!empty($instance['search_icon_size'])) {
			$search_opener_styles[] = 'font-size: ' . $instance['search_icon_size'] . 'px';
		}

		if (!empty($instance['search_icon_color'])) {
			$search_opener_styles[] = 'color: ' . $instance['search_icon_color'];
		}

		echo eldritch_edge_get_module_part($args['before_widget']);

		?>

		<a <?php echo eldritch_edge_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
			<?php if ($close_icon_on_same_position) {
				echo eldritch_edge_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
			<?php eldritch_edge_inline_style($search_opener_styles); ?>
			<?php eldritch_edge_class_attribute($search_type_class); ?> href="javascript:void(0)">
			<?php if (isset($eldritch_options['search_icon_pack'])) {
				$eldritch_IconCollections->getSearchIcon($eldritch_options['search_icon_pack'], false);
			} ?>
			<?php if ($show_search_text) { ?>
				<span class="edgt-search-icon-text"><?php esc_html_e('Search', 'eldritch'); ?></span>
			<?php } ?>
		</a>

		<?php if ($fullscreen_search_overlay) { ?>
			<div class="edgt-fullscreen-search-overlay"></div>
		<?php } ?>

		<?php do_action('eldritch_edge_after_search_opener'); ?>

		<?php echo eldritch_edge_get_module_part($args['after_widget']); ?>
	<?php }
}