<?php

if(!function_exists('eldritch_edge_is_responsive_on')) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function eldritch_edge_is_responsive_on() {
		return eldritch_edge_options()->getOptionValue('responsiveness') !== 'no';
	}
}

if(!function_exists('eldritch_edge_is_paspartu_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function eldritch_edge_is_paspartu_on() {
        return eldritch_edge_get_meta_field_intersect('enable_paspartu',eldritch_edge_get_page_id()) == 'yes';
    }
}