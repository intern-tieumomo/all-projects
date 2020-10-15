<?php if (eldritch_edge_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>

    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = eldritch_edge_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    ?>

    <div class="edgt-portfolio-single-nav">
        <div class="edgt-container-inner clearfix">
            <?php if ($has_prev_post) : ?>
                <div class="edgt-portfolio-prev <?php if ($prev_post_has_image) {
                    echo esc_attr('edgt-single-nav-with-image');
                } ?>">
                    <?php if ($prev_post_has_image) : ?>
                        <div class="edgt-single-nav-image-holder">
                            <a href="<?php echo esc_url($prev_post['link']); ?>">
                                <?php echo eldritch_edge_kses_img($prev_post['image']); ?>
                            </a>
                        </div>
                    <?php endif; ?>

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
                <div class="edgt-portfolio-back-btn">
                    <a href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                        <?php esc_html_e('MAIN LIST', 'eldritch'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($has_next_post) : ?>
                <div class="edgt-portfolio-next <?php if ($next_post_has_image) {
                    echo esc_attr('edgt-single-nav-with-image');
                } ?>">
                    <div class="edgt-single-nav-content-holder">
                        <h5>
                            <a href="<?php echo esc_url($next_post['link']); ?>">
                                <?php echo esc_html($next_post['title']); ?>
                            </a>
                        </h5>
                    </div>
                    <?php if ($next_post_has_image) : ?>
                        <div class="edgt-single-nav-image-holder">
                            <a href="<?php echo esc_url($next_post['link']); ?>">
                                <?php echo eldritch_edge_kses_img($next_post['image']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>