<?php

if (!function_exists('eldritch_edge_logo_meta_box_map')) {
    function eldritch_edge_logo_meta_box_map() {

        $logo_meta_box = eldritch_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post', 'forum', 'topic', 'reply', 'match-item'),
                'title' => esc_html__('Logo', 'eldritch'),
                'name'  => 'logo_meta'
            )
        );


        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_image_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Default', 'eldritch'),
                'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
                'parent'        => $logo_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_image_dark_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Dark', 'eldritch'),
                'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
                'parent'        => $logo_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_image_light_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Light', 'eldritch'),
                'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
                'parent'        => $logo_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_image_sticky_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Sticky', 'eldritch'),
                'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
                'parent'        => $logo_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'          => 'edgt_logo_image_mobile_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Mobile', 'eldritch'),
                'description'   => esc_html__('Choose a default logo image to display ', 'eldritch'),
                'parent'        => $logo_meta_box
            )
        );
    }

    add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_logo_meta_box_map');
}