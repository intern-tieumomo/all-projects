<?php if (eldritch_edge_options()->getOptionValue('match_single_hide_pagination') !== 'yes') : ?>

    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'edgt_match_single_back_to_link_meta', true);
    $nav_same_category = eldritch_edge_options()->getOptionValue('match_single_nav_same_category') == 'yes';
    ?>

    <div class="edgt-match-single-nav">
        <div class="edgt-container-inner clearfix">
            <?php if ($has_prev_post) : ?>
                <div class="edgt-match-prev">
                    <div class="edgt-single-nav-content-holder">
                        <h5>
                            <a href="<?php echo esc_url($prev_post['link']); ?>">
                                <?php echo esc_html($prev_post['title']); ?>
                            </a>
                        </h5>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($back_to_link !== '') : ?>
                <div class="edgt-match-back-btn">
                    <a href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                        <?php esc_html_e('MAIN LIST', 'eldritch'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($has_next_post) : ?>
                <div class="edgt-match-next">
                    <div class="edgt-single-nav-content-holder">
                        <h5>
                            <a href="<?php echo esc_url($next_post['link']); ?>">
                                <?php echo esc_html($next_post['title']); ?>
                            </a>
                        </h5>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>