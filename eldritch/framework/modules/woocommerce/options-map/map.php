<?php

if (!function_exists('eldritch_edge_woocommerce_options_map')) {

	/**
	 * Add Woocommerce options page
	 */
	function eldritch_edge_woocommerce_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'eldritch'),
				'icon'  => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__('Product List', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'edgt_woo_product_list_columns',
			'type'          => 'select',
			'label'         => esc_html__('Product List Columns', 'eldritch'),
			'default_value' => 'edgt-woocommerce-columns-4',
			'description'   => esc_html__('Choose number of columns for product listing and related products on single product', 'eldritch'),
			'options'       => array(
				'edgt-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'eldritch'),
				'edgt-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'eldritch')
			),
			'parent'        => $panel_product_list,
		));

        eldritch_edge_add_admin_field(array(
            'name'          => 'edgt_woo_product_list_skin',
            'type'          => 'select',
            'label'         => esc_html__('Product List Skin', 'eldritch'),
            'default_value' => '',
            'description'   => esc_html__('Choose skin for product listing and single product', 'eldritch'),
            'options'       => array(
                '' => esc_html__('Light', 'eldritch'),
                'edgt-woocommerce-dark-skin' => esc_html__('Dark', 'eldritch')
            ),
            'parent'        => $panel_product_list,
        ));

		eldritch_edge_add_admin_field(array(
			'name'          => 'edgt_woo_products_per_page',
			'type'          => 'text',
			'label'         => esc_html__('Number of products per page', 'eldritch'),
			'default_value' => '',
			'description'   => esc_html__('Set number of products on shop page', 'eldritch'),
			'parent'        => $panel_product_list,
			'args'          => array(
				'col_width' => 3
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'edgt_products_list_title_tag',
			'type'          => 'select',
			'label'         => esc_html__('Products Title Tag', 'eldritch'),
			'default_value' => 'h5',
			'description'   => '',
			'options'       => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'        => $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__('Single Product', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'edgt_single_product_title_tag',
			'type'          => 'select',
			'label'         => esc_html__('Single Product Title Tag', 'eldritch'),
			'default_value' => 'h2',
			'description'   => '',
			'options'       => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'        => $panel_single_product,
		));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'eldritch')
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'edgt_woo_dropdown_cart_description',
			'type'          => 'text',
			'label'         => esc_html__('Cart Description', 'eldritch'),
			'default_value' => '',
			'description'   => esc_html__('Enter dropdown cart description', 'eldritch'),
			'parent'        => $panel_dropdown_cart
		));
	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_woocommerce_options_map', 20);
}