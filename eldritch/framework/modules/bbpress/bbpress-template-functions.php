<?php

if(!function_exists('eldritch_edge_bbpress_enable_forum_search')) {
	function eldritch_edge_bbpress_enable_forum_search() {
		if(bbp_allow_search()) { ?>
			<div class="bbp-search-form">
				<?php bbp_get_template_part('form', 'search'); ?>
			</div>
		<?php }
	}

	//add_action('bbp_template_before_single_forum', 'eldritch_edge_bbpress_enable_forum_search');
}