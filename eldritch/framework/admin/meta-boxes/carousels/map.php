<?php

//Carousels

if (!function_exists('eldritch_edge_carousel_meta_box_map')) {
    function eldritch_edge_carousel_meta_box_map() {

        $carousel_meta_box = eldritch_edge_create_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'eldritch'),
                'name' => 'carousel_meta'
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_carousel_image',
                'type'        => 'image',
                'label'       => esc_html__('Carousel Image', 'eldritch'),
                'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'eldritch'),
                'parent'      => $carousel_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_carousel_hover_image',
                'type'        => 'image',
                'label'       => esc_html__('Carousel Hover Image', 'eldritch'),
                'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'eldritch'),
                'parent'      => $carousel_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_carousel_item_link',
                'type'        => 'text',
                'label'       => esc_html__('Link', 'eldritch'),
                'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'eldritch'),
                'parent'      => $carousel_meta_box
            )
        );

        eldritch_edge_create_meta_box_field(
            array(
                'name'        => 'edgt_carousel_item_target',
                'type'        => 'selectblank',
                'label'       => esc_html__('Target', 'eldritch'),
                'description' => esc_html__('Specify where to open the linked document', 'eldritch'),
                'parent'      => $carousel_meta_box,
                'options' => array(
                    '_self' => esc_html__('Self', 'eldritch'),
                    '_blank' => esc_html__('Blank', 'eldritch')
                )
            )
        );

    }
    add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_carousel_meta_box_map');
}