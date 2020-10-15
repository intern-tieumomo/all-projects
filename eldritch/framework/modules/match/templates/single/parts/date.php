<?php //if(eldritch_edge_options()->getOptionValue('match_single_hide_date') !== 'yes') :

    $id = get_the_ID();

    $date = get_post_meta($id, 'edgt_match_date_meta', true);
    $dateobj = date_create_from_format('Y-m-d', $date);
    $date = date_format($dateobj, 'jS F Y');
    $time = get_post_meta($id, 'edgt_match_time_meta', true); ?>

    <h5 class="edgt-match-date"> <?php echo esc_attr($date) ?>, <?php echo esc_attr($time) ?></h5>

<?php // endif; ?>