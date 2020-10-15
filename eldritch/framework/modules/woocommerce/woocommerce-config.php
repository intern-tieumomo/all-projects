<?php
/**
 * Woocommerce configuration file
 */

// Adds theme support for WooCommerce
add_theme_support('woocommerce');

//Disable the default WooCommerce stylesheet.
add_filter('woocommerce_enqueue_styles', '__return_false');


if (!function_exists('eldritch_edge_woocommerce_content')) {
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function eldritch_edge_woocommerce_content() {

		if (is_singular('product')) {

			while (have_posts()) : the_post();

				wc_get_template_part('content', 'single-product');

			endwhile;

		} else {

			if (have_posts()) :
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				woocommerce_product_subcategories();

				while (have_posts()) : the_post();

					wc_get_template_part('content', 'product');

				endwhile; // end of the loop.

				woocommerce_product_loop_end();

				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');

			elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) :

				wc_get_template('loop/no-products-found.php');

			endif;
		}
	}
}

/*************** GENERAL FILTERS - begin ***************/

//Define number of products per page
add_filter('loop_shop_per_page', 'eldritch_edge_woocommerce_products_per_page', 20);

//Set number of related products
add_filter('woocommerce_output_related_products_args', 'eldritch_edge_woocommerce_related_products_args');

//Sale flash template override
add_filter('woocommerce_sale_flash', 'eldritch_edge_woocommerce_sale_flash');
//add_filter('woocommerce_product_thumbnails', 'eldritch_edge_woocommerce_sale_flash_single');

//Out of stock template
add_filter('woocommerce_product_thumbnails', 'eldritch_edge_woocommerce_product_out_of_stock');
add_action('woocommerce_before_shop_loop_item_title', 'eldritch_edge_woocommerce_product_out_of_stock', 10);

//Add additional html tags around woocommerce pagination
add_action('woocommerce_after_shop_loop', 'eldritch_edge_woo_view_all_pagination_additional_tag_before', 9);
add_action('woocommerce_after_shop_loop', 'eldritch_edge_woo_view_all_pagination_additional_tag_after', 12);


/*************** GENERAL FILTERS - end ***************/

/*************** PRODUCT LISTS FILTERS - begin ***************/

//Add additional html tags around product lists
add_action('woocommerce_before_shop_loop', 'eldritch_edge_pl_holder_additional_tag_before', 35);
add_action('woocommerce_after_shop_loop', 'eldritch_edge_pl_holder_additional_tag_after', 5);

//Add open additional html tag around product elements
add_action('woocommerce_before_shop_loop_item', 'eldritch_edge_pl_outer_additional_tag_before', 5);
add_action('woocommerce_before_shop_loop_item', 'eldritch_edge_pl_inner_additional_tag_before', 6);

//Remove open and close link position
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

//Add additional html tags around image and marks
add_action('woocommerce_before_shop_loop_item_title', 'eldritch_edge_pl_image_additional_tag_before', 5);
add_action('woocommerce_before_shop_loop_item_title', 'eldritch_edge_pl_image_additional_tag_after', 15);

//Add end additional html tag around product elements
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_inner_additional_tag_after', 17);

//Add open and close link position
add_action('eldritch_edge_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_open', 16);
add_action('eldritch_edge_woo_pl_info_below_image', 'woocommerce_template_loop_product_link_close', 16);

//Add additional html around product info elements
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_inner_text_additional_tag_before', 5);
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_inner_text_additional_tag_after', 15);

//Add additional html at the end of product info elements
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_text_wrapper_additional_tag_before', 20);
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_text_wrapper_additional_tag_after', 30);

//Override product title with our own html
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_woocommerce_template_loop_product_title', 22);

//Change rating star position
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
//add_action('eldritch_edge_woo_pl_info_below_image', 'woocommerce_template_loop_rating', 26);

//Add additional html tags around rating star element
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_rating_additional_tag_before', 25);
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_pl_rating_additional_tag_after', 27);

//Change price position
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('eldritch_edge_woo_pl_info_below_image', 'woocommerce_template_loop_price', 24);

//Change add to cart position
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('eldritch_edge_woo_pl_info_below_image', 'woocommerce_template_loop_add_to_cart', 14);

add_action('woocommerce_after_shop_loop_item', 'eldritch_edge_pl_outer_additional_tag_after', 9);

//add_filter('woocommerce_product_thumbnails', 'eldritch_edge_woocommerce__new_product_mark');
add_action('woocommerce_before_shop_loop_item_title', 'eldritch_edge_woocommerce__new_product_mark', 10);

//Add categories position
add_action('eldritch_edge_woo_pl_info_below_image', 'eldritch_edge_get_category', 26);


/*************** PRODUCT LISTS FILTERS - end ***************/

/*************** PRODUCT SINGLE FILTERS - begin ***************/

//Add additional html around single product summary and images
add_action('woocommerce_before_single_product_summary', 'eldritch_edge_single_product_content_additional_tag_before', 5);
add_action('woocommerce_after_single_product_summary', 'eldritch_edge_single_product_content_additional_tag_after', 1);

//Add additional html around single product summary
add_action('woocommerce_before_single_product_summary', 'eldritch_edge_single_product_summary_additional_tag_before', 30);
add_action('woocommerce_after_single_product_summary', 'eldritch_edge_single_product_summary_additional_tag_after', 5);

//Change sale mark position
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 20);

//Change title position
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'eldritch_edge_woocommerce_template_single_title', 5);

//Add additional html around single product summary
add_action('woocommerce_single_product_summary', 'eldritch_edge_share_like_tag_before', 6);
add_action('woocommerce_single_product_summary', 'eldritch_edge_share_like_tag_after', 9);

//Add social share (default woocommerce_share)
add_action('woocommerce_single_product_summary', 'eldritch_edge_woocommerce_share', 7);

//Override woocommerce in stock html
add_filter('woocommerce_get_stock_html', 'eldritch_edge_woocommerce_get_stock_html');


/*************** PRODUCT SINGLE FILTERS - end ***************/