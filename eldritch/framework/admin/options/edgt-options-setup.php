<?php

add_action('after_setup_theme', 'eldritch_edge_admin_map_init', 0);

function eldritch_edge_admin_map_init() {

	do_action('eldritch_edge_before_options_map');

	foreach(glob(EDGE_FRAMEWORK_ROOT_DIR.'/admin/options/*/map.php') as $options_map_load) {
		include_once $options_map_load;
	}


	do_action('eldritch_edge_options_map');

	do_action('eldritch_edge_after_options_map');

}