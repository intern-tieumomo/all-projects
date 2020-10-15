<?php
$author_info_box   = esc_attr(eldritch_edge_options()->getOptionValue('blog_author_info'));
$author_info_email = esc_attr(eldritch_edge_options()->getOptionValue('blog_author_info_email'));
$social_networks   = eldritch_edge_get_user_custom_fields();

?>
<?php if($author_info_box === 'yes') { ?>
    <div class="edgt-author-description">
        <div class="edgt-author-description-inner clearfix">
            <div class="edgt-author-description-image">
                <?php echo eldritch_edge_kses_img(get_avatar(get_the_author_meta('ID'), 102)); ?>
            </div>
            <div class="edgt-author-description-text-holder">
                <h5 class="edgt-author-name">
                    <?php
                    if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
                        echo esc_attr(get_the_author_meta('first_name'))." ".esc_attr(get_the_author_meta('last_name'));
                    } else {
                        echo esc_attr(get_the_author_meta('display_name'));
                    }
                    ?>
                </h5>

                <?php if(get_the_author_meta('position') !== '') : ?>
                    <div class="edgt-author-position-holder">
                        <h6 class="edgt-author-position"><?php echo esc_html(get_the_author_meta('position')); ?></h6>
                    </div>
                <?php endif; ?>

                <?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email'))) { ?>
                    <p class="edgt-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
                <?php } ?>
                <?php if(get_the_author_meta('description') != "") { ?>
                    <div class="edgt-author-text">
                        <p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
                    </div>
                <?php } ?>
                <?php if(is_array($social_networks) && count($social_networks)) { ?>

                    <div class="edgt-author-social-holder clearfix">
                        <?php foreach($social_networks as $network) { ?>
                            <a href="<?php echo esc_url($network['link']) ?>" target="blank">
                                <?php echo eldritch_edge_icon_collections()->renderIcon($network['class'], 'font_elegant'); ?>
                            </a>
                        <?php } ?>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>