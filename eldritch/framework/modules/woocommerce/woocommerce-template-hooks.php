<?php

if (!function_exists('eldritch_edge_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function eldritch_edge_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (eldritch_edge_options()->getOptionValue('edgt_woo_products_per_page')) {
			$products_per_page = eldritch_edge_options()->getOptionValue('edgt_woo_products_per_page');
		}
		if (isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if (!function_exists('eldritch_edge_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function eldritch_edge_woocommerce_related_products_args($args) {

		if (eldritch_edge_options()->getOptionValue('edgt_woo_product_list_columns')) {

			$related = eldritch_edge_options()->getOptionValue('edgt_woo_product_list_columns');
			switch ($related) {
				case 'edgt-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'edgt-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('eldritch_edge_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function eldritch_edge_woocommerce_template_loop_product_title() {

		$tag = eldritch_edge_options()->getOptionValue('edgt_products_list_title_tag');
		if ($tag === '') {
			$tag = 'h5';
		}
		the_title('<' . $tag . ' class="edgt-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>');
	}
}

if (!function_exists('eldritch_edge_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function eldritch_edge_woocommerce_template_single_title() {

		$tag = eldritch_edge_options()->getOptionValue('edgt_single_product_title_tag');
		if ($tag === '') {
			$tag = 'h1';
		}
		the_title('<' . $tag . '  itemprop="name" class="edgt-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('eldritch_edge_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function eldritch_edge_woocommerce_sale_flash() {
		if (!is_single()) {
			return '<span class="edgt-on-sale edgt-product-mark">' . esc_html__('SALE', 'eldritch') . '</span>';
		}
	}
}

if (!function_exists('eldritch_edge_woocommerce_sale_flash_single')) {
	/**
	 * Function for overriding Sale Flash Template on Single product page
	 * @return string
	 */
	function eldritch_edge_woocommerce_sale_flash_single() {
		global $product;
		if ($product->is_on_sale()) {
			print '<span class="edgt-on-sale edgt-product-mark">' . esc_html__('SALE', 'eldritch') . '</span>';
		}
	}
}

if ( ! function_exists( 'eldritch_edge_woo_single_product_image_behavior_class' ) ) {
    function eldritch_edge_woo_single_product_image_behavior_class( $classes ) {

        $classes[] = 'edgt-woo-single-has-pretty-photo';
        return $classes;
    }

    add_filter( 'body_class', 'eldritch_edge_woo_single_product_image_behavior_class' );
}

if (!function_exists('eldritch_edge_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function eldritch_edge_woocommerce_product_out_of_stock() {

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="edgt-out-of-stock edgt-product-mark">' . esc_html__('SOLD OUT', 'eldritch') . '</span>';
		}
	}
}

if (!function_exists('eldritch_edge_woo_view_all_pagination_additional_tag_before')) {
	function eldritch_edge_woo_view_all_pagination_additional_tag_before() {

		print '<div class="edgt-woo-pagination-holder"><div class="edgt-woo-pagination-inner">';
	}
}

if (!function_exists('eldritch_edge_woo_view_all_pagination_additional_tag_after')) {
	function eldritch_edge_woo_view_all_pagination_additional_tag_after() {

		print '</div></div>';
	}
}

if (!function_exists('eldritch_edge_single_product_content_additional_tag_before')) {
	function eldritch_edge_single_product_content_additional_tag_before() {

		print '<div class="edgt-single-product-content">';
	}
}

if (!function_exists('eldritch_edge_single_product_content_additional_tag_after')) {
	function eldritch_edge_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('eldritch_edge_single_product_summary_additional_tag_before')) {
	function eldritch_edge_single_product_summary_additional_tag_before() {

		print '<div class="edgt-single-product-summary">';
	}
}

if (!function_exists('eldritch_edge_single_product_summary_additional_tag_after')) {
	function eldritch_edge_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('eldritch_edge_pl_holder_additional_tag_before')) {
	function eldritch_edge_pl_holder_additional_tag_before() {

		print '<div class="edgt-pl-main-holder">';
	}
}

if (!function_exists('eldritch_edge_pl_holder_additional_tag_after')) {
	function eldritch_edge_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('eldritch_edge_pl_outer_additional_tag_before')) {
	function eldritch_edge_pl_outer_additional_tag_before() {
		global $product;

		$rating = $product->get_average_rating();

		if ($rating > 0) {
			print '<div class="edgt-pl-outer rating">';
		} else {
			print '<div class="edgt-pl-outer">';
		}
	}
}

if (!function_exists('eldritch_edge_pl_inner_additional_tag_before')) {
	function eldritch_edge_pl_inner_additional_tag_before() {

		print '<div class="edgt-pl-inner">';
	}
}

if (!function_exists('eldritch_edge_pl_inner_additional_tag_after')) {
	function eldritch_edge_pl_inner_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('eldritch_edge_pl_outer_additional_tag_after')) {
	function eldritch_edge_pl_outer_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('eldritch_edge_pl_image_additional_tag_before')) {
	function eldritch_edge_pl_image_additional_tag_before() {

		print '<div class="edgt-pl-image">';
	}
}

if (!function_exists('eldritch_edge_pl_image_additional_tag_after')) {
	function eldritch_edge_pl_image_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('eldritch_edge_pl_inner_text_additional_tag_before')) {
	function eldritch_edge_pl_inner_text_additional_tag_before() {

		print '<div class="edgt-pl-cart-holder"><div class="edgt-pl-cart"><div class="edgt-pl-cart-inner">';
	}
}

if (!function_exists('eldritch_edge_pl_inner_text_additional_tag_after')) {
	function eldritch_edge_pl_inner_text_additional_tag_after() {

		print '</div></div></div>';
	}
}

if (!function_exists('eldritch_edge_pl_text_wrapper_additional_tag_before')) {
	function eldritch_edge_pl_text_wrapper_additional_tag_before() {

		print '<div class="edgt-pl-text-wrapper"><div class="edgt-pl-text-wrapper-inner">';
	}
}

if (!function_exists('eldritch_edge_pl_text_wrapper_additional_tag_after')) {
	function eldritch_edge_pl_text_wrapper_additional_tag_after() {

		print '</div></div>';
	}
}

if (!function_exists('eldritch_edge_pl_rating_additional_tag_before')) {
	function eldritch_edge_pl_rating_additional_tag_before() {
		global $product;

		if (get_option('woocommerce_enable_review_rating') !== 'no') {

			// this condition is only for woocommerce 3.0, because get_rating_html function is deprecated, when they release new update remove else
			if (function_exists('wc_get_rating_html')) {
				$rating_html = wc_get_rating_html($product->get_average_rating());
			} else {
				$rating_html = $product->get_rating_html();
			}

			if ($rating_html !== '') {
				print '<div class="edgt-pl-rating-holder">';
			}
		}
	}
}

if (!function_exists('eldritch_edge_pl_rating_additional_tag_after')) {
	function eldritch_edge_pl_rating_additional_tag_after() {
		global $product;

		if (get_option('woocommerce_enable_review_rating') !== 'no') {

			// this condition is only for woocommerce 3.0, because get_rating_html function is deprecated, when they release new update remove else
			if (function_exists('wc_get_rating_html')) {
				$rating_html = wc_get_rating_html($product->get_average_rating());
			} else {
				$rating_html = $product->get_rating_html();
			}

			if ($rating_html !== '') {
				print '</div>';
			}
		}
	}
}

if (!function_exists('eldritch_edge_woocommerce__new_product_mark')) {
	/**
	 * Function for adding New Product Template
	 *
	 * @return string
	 */
	function eldritch_edge_woocommerce__new_product_mark() {
		global $product;

		if (get_post_meta($product->get_id(), 'edgt_single_product_new_meta', true) === 'yes') {
			print '<span class="edgt-new-product edgt-product-mark">' . esc_html__('NEW', 'eldritch') . '</span>';
		}
	}
}

if (!function_exists('eldritch_edge_get_category')) {
	/**
	 * Function for adding New Product Template
	 *
	 * @return string
	 */
	function eldritch_edge_get_category() {
		global $product;
        $args = array(
            'orderby'    => 'title',
            'order'      => 'ASC',
            'include'    => $product->get_category_ids()
        );
        $product_categories = get_terms( 'product_cat', $args );
        $count = count($product_categories);
        if ( $count > 0 ){
            print '<div class="edgt-product-list-category">';
            foreach ( $product_categories as $product_category ) {
                print '<a href="' . get_term_link( $product_category ) . '">' . esc_attr($product_category->name) . '</a>';
            }
            print '</div>';
        }
	}
}


if (!function_exists('eldritch_edge_share_like_tag_before')) {
	/**
	 * Function that adds tag before share and like section
	 */
	function eldritch_edge_share_like_tag_before() {
		print '<div class="edgt-single-product-share-like">';
	}
}

if (!function_exists('eldritch_edge_share_like_tag_after')) {
	/**
	 * Function that adds tag before share and like section
	 */
	function eldritch_edge_share_like_tag_after() {
		print '</div>';
	}
}

if (!function_exists('eldritch_edge_woocommerce_get_stock_html')) {
	function eldritch_edge_woocommerce_get_stock_html($availability_html, $product = null) {
		global $product;

		$availability = $product->get_availability();

		return empty($availability['availability']) ? '' : '</td><td class="stock">' . $availability_html;
	}
}