<?php

//top line
add_action('eldritch_edge_before_page_header', 'eldritch_edge_get_header_top_line');

//top header bar
add_action('eldritch_edge_before_page_header', 'eldritch_edge_get_header_top');

//mobile header
add_action('eldritch_edge_after_page_header', 'eldritch_edge_get_mobile_header');