<?php

if(!function_exists('eldritch_edge_register_widgets')) {

	function eldritch_edge_register_widgets() {

		$widgets = array(
			'EldritchEdgeLatestPosts',
			'EldritchEdgeSearchOpener',
			'EldritchEdgeSideAreaOpener',
			'EldritchEdgeStickySidebar',
			'EldritchEdgeSocialIconWidget',
			'EldritchEdgeSeparatorWidget',
			'EldritchEdgeHtmlWidget',
			'EldritchEdgeInfoWidget',
			'EldritchEdgeMatchList',
			'EldritchEdgeMatchFeaturedList'
		);

		if( eldritch_edge_is_woocommerce_installed() ) {
			$widgets[] = 'EldritchEdgeWoocommerceDropdownCart';
		}

		if( eldritch_edge_contact_form_7_installed() ) {
			$widgets[] = 'EldritchEdgeContactForm7';
		}

		if( eldritch_edge_core_installed() ) {
			foreach ($widgets as $widget) {
				eldritch_edge_create_wp_widget($widget);
			}
		}
	}
}

add_action('widgets_init', 'eldritch_edge_register_widgets');