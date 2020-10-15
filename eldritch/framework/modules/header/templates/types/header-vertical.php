<?php do_action('eldritch_edge_before_vertical_header'); ?>
<aside class="edgt-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
    <div class="edgt-vertical-menu-area-inner">
        <div class="edgt-vertical-area-background" <?php eldritch_edge_inline_style(array(
            $vertical_header_background_color,
            $vertical_header_opacity,
            $vertical_background_image
        )); ?>></div>
        <?php if(!$hide_logo) {
            eldritch_edge_get_logo('vertical');
        } ?>
        <?php eldritch_edge_get_vertical_main_menu(); ?>
        <div class="edgt-vertical-area-widget-holder">
            <?php if(is_active_sidebar('edgt-vertical-area')) : ?>
                <?php dynamic_sidebar('edgt-vertical-area'); ?>
            <?php endif; ?>
        </div>
    </div>
</aside>
<?php do_action('eldritch_edge_after_page_header'); ?>

