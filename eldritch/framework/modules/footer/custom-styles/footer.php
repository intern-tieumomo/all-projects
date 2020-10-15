<?php

if(!function_exists('eldritch_edge_footer_bg_image_styles')) {
    /**
     * Outputs background image styles for footer
     */
    function eldritch_edge_footer_bg_image_styles() {
        $background_image = eldritch_edge_options()->getOptionValue('footer_background_image');

        if($background_image !== '') {
            $footer_bg_image_styles['background-image'] = 'url('.$background_image.')';

            echo eldritch_edge_dynamic_css('body.edgt-footer-with-bg-image .edgt-page-footer', $footer_bg_image_styles);
        }
    }

    add_action('eldritch_edge_style_dynamic', 'eldritch_edge_footer_bg_image_styles');
}
