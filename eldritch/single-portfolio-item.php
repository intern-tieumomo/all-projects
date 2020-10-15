<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
	eldritch_edge_get_title();
	eldritch_edge_single_portfolio();
endwhile; endif;
get_footer();