<?php

//WooCommerce
if (eldritch_edge_is_woocommerce_installed()) {


	if (!function_exists('eldritch_edge_woocommerce_meta_box_map')) {
		function eldritch_edge_woocommerce_meta_box_map() {

			$woocommerce_meta_box = eldritch_edge_create_meta_box(
				array(
					'scope' => array('product'),
					'title' => esc_html__('Product Meta', 'eldritch'),
					'name'  => 'woo_product_meta'
				)
			);

			eldritch_edge_create_meta_box_field(array(
				'name'        => 'edgt_single_product_new_meta',
				'type'        => 'select',
				'label'       => esc_html__('Enable New Product Mark', 'eldritch'),
				'description' => esc_html__('Enabling this option will show new product mark on your product lists and product single', 'eldritch'),
				'parent'      => $woocommerce_meta_box,
				'options'     => array(
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				)
			));

			eldritch_edge_create_meta_box_field(array(
				'name'          => 'edgt_masonry_product_list_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__('Dimensions for Masonry Product list', 'eldritch'),
				'description'   => esc_html__('Choose image layout when it appears in Masonry Product list', 'eldritch'),
				'parent'        => $woocommerce_meta_box,
				'options'       => array(
					'standard'           => esc_html__('Standard', 'eldritch'),
					'large-width'        => esc_html__('Large width', 'eldritch'),
					'large-height'       => esc_html__('Large height', 'eldritch'),
					'large-width-height' => esc_html__('Large width/height', 'eldritch'),
				),
				'default_value' => 'standard'
			));

		}

		add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_woocommerce_meta_box_map');
	}
}