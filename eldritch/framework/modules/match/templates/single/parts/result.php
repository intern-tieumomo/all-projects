<?php
$result =  get_post_meta(get_the_ID(), 'edgt_match_result_meta', true); ?>

<h3 class="edgt-match-single-result-holder">
    <span><?php echo esc_html_e('Results','eldritch') ?></span>
    <span><?php echo esc_attr($result) ?></span>
</h3>