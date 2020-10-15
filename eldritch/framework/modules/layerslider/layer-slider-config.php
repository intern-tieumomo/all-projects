<?php
if(!function_exists('eldritch_edge_layerslider_overrides')) {
	/**
	 * Disables Layer Slider auto update box
	 */
	function eldritch_edge_layerslider_overrides() {
		$GLOBALS['lsAutoUpdateBox'] = false;
	}

	add_action('layerslider_ready', 'eldritch_edge_layerslider_overrides');
}
?>