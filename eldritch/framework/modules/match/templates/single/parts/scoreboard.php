<?php
$team_one_name = get_post_meta(get_the_ID(), 'edgt_match_team_one_name_meta', true);
$team_two_name = get_post_meta(get_the_ID(), 'edgt_match_team_two_name_meta', true);
$team_one_image = get_post_meta(get_the_ID(), 'edgt_match_team_one_image_meta', true);
$team_two_image = get_post_meta(get_the_ID(), 'edgt_match_team_two_image_meta', true);
$custom_image_sizes = array(200, 200);

//$featured_image = ;
$holder_style = 'background-image: url("'. get_the_post_thumbnail_url() .'")';

$status = get_post_meta(get_the_ID(), 'edgt_match_status_meta', true);

if ($status == 'finished') {
    $vs_image = EDGE_ASSETS_ROOT . '/img/vs_finished.png';
} else {
    $vs_image = EDGE_ASSETS_ROOT . '/img/vs_light.png';
}

?>
<div class="edgt-match-single-scoreboard edgt-has-parallax-background edgt-title" <?php echo eldritch_edge_get_inline_style($holder_style) ?>>
    <div class="edgt-match-item-holder">
        <div class="edgt-match-single-team">
            <div class="edgt-match-item-image-holder">
                <?php echo eldritch_edge_generate_thumbnail(null, $team_one_image, $custom_image_sizes[0], $custom_image_sizes[1]); ?>
            </div>
            <div class="edgt-match-item-text-holder">
                <h3 class="edgt-match-team-title">
                    <?php echo esc_attr($team_one_name); ?>
                </h3>
            </div>
        </div>
        <div class="edgt-match-vs-image">
            <img src="<?php echo esc_url($vs_image); ?>" alt="<?php esc_attr_e('Match image', 'eldritch'); ?>"/>
        </div>
        <div class="edgt-match-single-team">
            <div class="edgt-match-item-image-holder">
                <?php echo eldritch_edge_generate_thumbnail(null, $team_two_image, $custom_image_sizes[0], $custom_image_sizes[1]); ?>
            </div>
            <div class="edgt-match-item-text-holder">
                <h3 class="edgt-match-team-title">
                    <?php echo esc_attr($team_two_name); ?>
                </h3>
            </div>
        </div>

    </div>
</div>