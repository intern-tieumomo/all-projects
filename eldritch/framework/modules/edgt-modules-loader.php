<?php

if(!function_exists('eldritch_edge_load_modules')) {
	/**
	 * Loades all modules by going through all folders that are placed directly in modules folder
	 * and loads load.php file in each. Hooks to eldritch_edge_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function eldritch_edge_load_modules() {
		foreach(glob(EDGE_FRAMEWORK_ROOT_DIR.'/modules/*/load.php') as $module_load) {
			include_once $module_load;
		}
	}

	add_action('eldritch_edge_before_options_map', 'eldritch_edge_load_modules');
}

if(!function_exists('eldritch_edge_load_widget_class')) {
	/**
	 * Loades widget class file.
	 *
	 */
	function eldritch_edge_load_widget_class() {
		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/widgets/lib/widget-class.php';
	}

	add_action('eldritch_edge_before_options_map', 'eldritch_edge_load_widget_class',9);  //9 is because of the cf7 widget that is loaded from module
}

if(!function_exists('eldritch_edge_load_widgets')) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to eldritch_edge_after_options_map action
	 */
	function eldritch_edge_load_widgets() {

		foreach(glob(EDGE_FRAMEWORK_ROOT_DIR.'/modules/widgets/*/load.php') as $widget_load) {
			include_once $widget_load;
		}

		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/widgets/lib/widget-loader.php';
	}

	add_action('eldritch_edge_before_options_map', 'eldritch_edge_load_widgets');
}