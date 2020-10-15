<?php
/**
 * Woocommerce helper functions
 */

if (!function_exists('eldritch_edge_disable_woocommerce_pretty_photo')) {
	/**
	 * Function that disable WooCommerce pretty photo script and style
	 */
	function eldritch_edge_disable_woocommerce_pretty_photo() {
		//is woocommerce installed?
		if (eldritch_edge_is_woocommerce_installed()) {
			if (eldritch_edge_load_woo_assets()) {

				wp_deregister_style('woocommerce_prettyPhoto_css');
			}
		}
	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_disable_woocommerce_pretty_photo');
}

if (!function_exists('eldritch_edge_woocommerce_body_class')) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 * @return array
	 */
	function eldritch_edge_woocommerce_body_class($classes) {
		if (eldritch_edge_is_woocommerce_page()) {
			$classes[] = 'edgt-woocommerce-page';

			if (function_exists('is_shop') && is_shop()) {
				$classes[] = 'edgt-woo-main-page';
			}

			if (is_singular('product')) {
				$classes[] = 'edgt-woo-single-page';
			}
		}
		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_woocommerce_body_class');
}

if (!function_exists('eldritch_edge_woocommerce_columns_class')) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function eldritch_edge_woocommerce_columns_class($classes) {

		if (eldritch_edge_is_woocommerce_installed()) {

			$products_list_number = eldritch_edge_options()->getOptionValue('edgt_woo_product_list_columns');
			$classes[] = $products_list_number;

		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_woocommerce_columns_class');
}

if (!function_exists('eldritch_edge_woocommerce_skin_class')) {
    /**
     * Function that adds woo skin
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added woocommerce class
     */
    function eldritch_edge_woocommerce_skin_class($classes) {

        if (eldritch_edge_is_woocommerce_installed()) {

            $products_skin = eldritch_edge_options()->getOptionValue('edgt_woo_product_list_skin');
            $classes[] = $products_skin;

        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_woocommerce_skin_class');
}

if (!function_exists('eldritch_edge_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function eldritch_edge_is_woocommerce_page() {
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return is_woocommerce();
		} elseif (function_exists('is_cart') && is_cart()) {
			return is_cart();
		} elseif (function_exists('is_checkout') && is_checkout()) {
			return is_checkout();
		} elseif (function_exists('is_account_page') && is_account_page()) {
			return is_account_page();
		}
	}
}

if (!function_exists('eldritch_edge_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function eldritch_edge_is_woocommerce_shop() {
		return function_exists('is_shop') && (is_shop() || is_product_category() || is_product());
	}
}

if (!function_exists('eldritch_edge_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function eldritch_edge_get_woo_shop_page_id() {
		if (eldritch_edge_is_woocommerce_installed()) {
            //get shop page id from options table
			$shop_id = get_option( 'woocommerce_shop_page_id' );

			if ( ! empty( $shop_id ) ) {
                $page_id = $shop_id;
            } else {
                $page_id = '-1';
            }

			return $page_id;
		}
	}
}

if (!function_exists('eldritch_edge_is_product_category')) {
	function eldritch_edge_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if (!function_exists('eldritch_edge_is_product_tag')) {
	function eldritch_edge_is_product_tag() {
		return function_exists('is_product_tag') && is_product_tag();
	}
}

if (!function_exists('eldritch_edge_load_woo_assets')) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see eldritch_edge_is_woocommerce_page()
	 * @see eldritch_edge_has_woocommerce_shortcode()
	 * @see eldritch_edge_has_woocommerce_widgets()
	 * @return bool
	 */

	function eldritch_edge_load_woo_assets() {
		return eldritch_edge_is_woocommerce_installed() && (eldritch_edge_is_woocommerce_page() || eldritch_edge_has_woocommerce_shortcode() || eldritch_edge_has_woocommerce_widgets());
	}
}

if (!function_exists('eldritch_edge_return_woocommerce_global_variable')) {
	function eldritch_edge_return_woocommerce_global_variable() {
		if (eldritch_edge_is_woocommerce_installed()) {
			global $product;

			return $product;
		}
	}
}

if (!function_exists('eldritch_edge_has_woocommerce_shortcode')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function eldritch_edge_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'add_to_cart',
			'add_to_cart_url',
			'product_page',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'sale_products',
			'best_selling_products',
			'top_rated_products',
			'product_attribute',
			'related_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_order_tracking',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach ($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = eldritch_edge_has_shortcode($woocommerce_shortcode);

			if ($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if (!function_exists('eldritch_edge_has_woocommerce_widgets')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function eldritch_edge_has_woocommerce_widgets() {
		$widgets_array = array(
			'edgt_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach ($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if ($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if (!function_exists('eldritch_edge_add_woocommerce_shortcode_class')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return string
	 */
	function eldritch_edge_add_woocommerce_shortcode_class($classes) {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking'
		);

		foreach ($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = eldritch_edge_has_shortcode($woocommerce_shortcode);

			if ($has_shortcode) {
				$classes[] = 'edgt-woocommerce-page woocommerce-account edgt-' . str_replace('_', '-', $woocommerce_shortcode);
			}
		}

		return $classes;
	}

	add_filter('body_class', 'eldritch_edge_add_woocommerce_shortcode_class');
}

if (!function_exists('eldritch_edge_get_woocommerce_pages')) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function eldritch_edge_get_woocommerce_pages() {
		$woo_pages_array = array();

		if (eldritch_edge_is_woocommerce_installed()) {
			if (get_option('woocommerce_shop_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_shop_page_id'));
			}
			if (get_option('woocommerce_cart_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_cart_page_id'));
			}
			if (get_option('woocommerce_checkout_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_checkout_page_id'));
			}
			if (get_option('woocommerce_pay_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_pay_page_id '));
			}
			if (get_option('woocommerce_thanks_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_thanks_page_id '));
			}
			if (get_option('woocommerce_myaccount_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_myaccount_page_id '));
			}
			if (get_option('woocommerce_edit_address_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_edit_address_page_id '));
			}
			if (get_option('woocommerce_view_order_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_view_order_page_id '));
			}
			if (get_option('woocommerce_terms_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_terms_page_id '));
			}

			$woo_products = get_posts(array('post_type'      => 'product',
											'post_status'    => 'publish',
											'posts_per_page' => '-1'
			));

			foreach ($woo_products as $product) {
				$woo_pages_array[] = get_permalink($product->ID);
			}
		}

		return $woo_pages_array;
	}
}

if (!function_exists('eldritch_edge_woocommerce_share')) {
	/**
	 * Function that social share for product page
	 * Return array array of WooCommerce pages
	 */
	function eldritch_edge_woocommerce_share() {
		if (eldritch_edge_is_woocommerce_installed()) {

			if (eldritch_edge_core_installed() && eldritch_edge_options()->getOptionValue('enable_social_share') == 'yes' && eldritch_edge_options()->getOptionValue('enable_social_share_on_product') == 'yes') :
				print '<div class="edgt-woo-social-share-holder">';
				echo eldritch_edge_get_social_share_html(array('type' => 'dropdown'));
				print '<span>' . esc_html__('Share', 'eldritch') . '</span>';
				print '</div>';
			endif;
		}
	}
}

if (!function_exists('eldritch_edge_print_woo_content')) {
    /**
     * Function that print content for product page
     */
    function eldritch_edge_print_woo_content() {

        if (function_exists('is_shop') && (is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag())) {

            $content_post = get_post(get_option('woocommerce_shop_page_id'));
            $content = $content_post->post_content;
            if($content != '') {
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
				echo eldritch_edge_get_module_part($content);
            }
        }
    }
}

