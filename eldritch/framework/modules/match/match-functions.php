<?php

if(!function_exists('eldritch_edge_single_match')) {
	/**
	 * Loads holder template for match single
	 */
	function eldritch_edge_single_match() {

        $sidebar = eldritch_edge_sidebar_layout();

		$params = array(
            "sidebar"   => $sidebar
		);

		eldritch_edge_get_module_template_part('templates/single/holder', 'match', '', $params);
	}
}

if(!function_exists('eldritch_edge_match_get_info_part')) {
    /**
     * Loads match info item based on passed param
     *
     * @param $part
     */
    function eldritch_edge_match_get_info_part($part) {

        eldritch_edge_get_module_template_part('templates/single/parts/'.$part, 'match');
    }
}

if(!function_exists('eldritch_edge_match_get_single_navigation')) {
    /**
     *
     */
    function eldritch_edge_match_get_single_navigation() {
        $params = array();

        $in_same_term = eldritch_edge_options()->getOptionValue('edgt_match_single_nav_same_category') == 'yes';

        $prev_post               = get_previous_post($in_same_term, '', 'match-category');
        $next_post               = get_next_post($in_same_term, '', 'match-category');
        $params['has_prev_post'] = false;
        $params['has_next_post'] = false;

        if($prev_post) {
            $params['prev_post_object'] = $prev_post;
            $params['has_prev_post']    = true;
            $params['prev_post']        = array(
                'title' => get_the_title($prev_post->ID),
                'link'  => get_the_permalink($prev_post->ID)
            );
        }

        if($next_post) {
            $params['next_post_object'] = $next_post;
            $params['has_next_post']    = true;
            $params['next_post']        = array(
                'title' => get_the_title($next_post->ID),
                'link'  => get_the_permalink($next_post->ID)
            );
        }

        eldritch_edge_get_module_template_part('templates/single/parts/navigation', 'match', '', $params);
    }
}
