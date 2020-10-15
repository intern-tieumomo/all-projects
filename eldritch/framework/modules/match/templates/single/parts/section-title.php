<?php $separator_image_src = eldritch_edge_options()->getOptionValue('match_single_separator'); ?>

<div class="edgt-section-title edgt-section-align-center">

    <div class="edgt-st-inner">
        <div class="edgt-st-title-holder">
            <h2 class="edgt-st-title">
            <span><?php esc_html_e('Single Match Results','eldritch') ?></span>
            </h2>
        </div>
    </div>

    <?php if ($separator_image_src !== '') { ?>
        <div class="edgt-separator-image">
            <img src="<?php echo esc_url($separator_image_src); ?>" alt="<?php esc_attr_e('Separator image', 'eldritch'); ?>"/>
        </div>
    <?php } ?>
</div>