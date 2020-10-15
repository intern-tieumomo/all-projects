<?php

class EldritchEdgeWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'edgt_woocommerce_dropdown_cart', // Base ID
			esc_html__('Edge Woocommerce Dropdown Cart', 'eldritch'), // Name
			array('description' => esc_html__('Edge Woocommerce Dropdown Cart', 'eldritch'),) // Args
		);

		$this->setParams();
	}

	protected function setParams() {

		$this->params = array(
			array(
				'name'        => 'woocommerce_dropdown_cart_margin',
				'type'        => 'textfield',
				'title'       => esc_html__('Margin (top right bottom left)', 'eldritch'),
				'description' => esc_html__('Define margin for woocommerce dropdown cart icon', 'eldritch')
			),
			array(
				'type'        => 'dropdown',
				'title'       => esc_html__('Enable Cart Info', 'eldritch'),
				'name'        => 'woocommerce_enable_cart_info',
				'options'     => array(
					'no'  => esc_html__('No', 'eldritch'),
					'yes' => esc_html__('Yes', 'eldritch')
				),
				'description' => esc_html__('Enabling this option will show cart info (products number and price) at the right side of dropdown cart icon', 'eldritch')
			),
		);
	}

	/**
	 * Generate widget form based on $params attribute
	 *
	 * @param array $instance
	 *
	 * @return null
	 */
	public function form($instance) {
		if (is_array($this->params) && count($this->params)) {
			foreach ($this->params as $param_array) {
				$param_name = $param_array['name'];
				${$param_name} = isset($instance[$param_name]) ? esc_attr($instance[$param_name]) : '';
			}

			foreach ($this->params as $param) {
				switch ($param['type']) {
					case 'textfield':
						?>
						<p>
							<label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo
								esc_html($param['title']); ?>:</label>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"
								   name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" type="text"
								   value="<?php echo esc_attr(${$param['name']}); ?>"/>
							<?php if (!empty($param['description'])) : ?>
								<span
									class="edgt-field-description"><?php echo esc_html($param['description']); ?></span>
							<?php endif; ?>
						</p>
						<?php
						break;
					case 'dropdown':
						?>
						<p>
							<label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo
								esc_html($param['title']); ?>:</label>
							<?php if (isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
								<select class="widefat"
										name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>"
										id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>">
									<?php foreach ($param['options'] as $param_option_key => $param_option_val) {
										$option_selected = '';
										if (${$param['name']} == $param_option_key) {
											$option_selected = 'selected';
										}
										?>
										<option <?php echo esc_attr($option_selected); ?>
											value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_attr($param_option_val); ?></option>
									<?php } ?>
								</select>
							<?php } ?>
							<?php if (!empty($param['description'])) : ?>
								<span
									class="edgt-field-description"><?php echo esc_html($param['description']); ?></span>
							<?php endif; ?>
						</p>

						<?php
						break;
				}
			}
		} else { ?>
			<p><?php esc_html_e('There are no options for this widget.', 'eldritch'); ?></p>
		<?php }
	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update($new_instance, $old_instance) {
		$instance = array();
		foreach ($this->params as $param) {
			$param_name = $param['name'];

			$instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
		}

		return $instance;
	}

	public function widget($args, $instance) {
		global $post;
		extract($args);

		global $woocommerce;

		$icon_styles = array();

		if (!empty($instance['woocommerce_dropdown_cart_margin'])) {
			$icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
		}

		$icon_class = 'edgt-cart-info-is-disabled';

		if (!empty($instance['woocommerce_enable_cart_info']) && $instance['woocommerce_enable_cart_info'] === 'yes') {
			$icon_class = 'edgt-cart-info-is-active';
		}

		$cart_description = eldritch_edge_options()->getOptionValue('edgt_woo_dropdown_cart_description');

		echo eldritch_edge_get_module_part($args['before_widget']);
		?>
		<div
			class="edgt-shopping-cart-holder <?php echo esc_attr($icon_class); ?>" <?php eldritch_edge_inline_style($icon_styles) ?>>
			<div class="edgt-shopping-cart-inner">
				<?php $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0; ?>
				<a itemprop="url" class="edgt-header-cart" href="<?php echo wc_get_cart_url(); ?>">
					<span class="edgt-cart-icon icon_bag_alt"><span
							class="edgt-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'eldritch'), WC()->cart->cart_contents_count); ?></span></span>
					<span class="edgt-cart-info">
						<span
							class="edgt-cart-info-number"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'eldritch'), WC()->cart->cart_contents_count); ?></span>
						<span
							class="edgt-cart-info-total"><?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array('span' => array('class' => true, 'id' => true))); ?></span>
					</span>
				</a>
				<?php if (!$cart_is_empty) : ?>
					<div class="edgt-shopping-cart-dropdown">
						<ul>
							<?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if (!$_product->exists() || $cart_item['quantity'] == 0) {
									continue;
								}
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
?>
								<li>
									<div class="edgt-item-image-holder">
										<a itemprop="url"
										   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
											<?php echo wp_kses($_product->get_image(), array(
												'img' => array(
													'src'    => true,
													'width'  => true,
													'height' => true,
													'class'  => true,
													'alt'    => true,
													'title'  => true,
													'id'     => true
												)
											)); ?>
										</a>
									</div>
									<div class="edgt-item-info-holder">
										<h5 itemprop="name" class="edgt-product-title"><a itemprop="url"
																						   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('eldritch_edge_woo_widget_cart_product_title', $_product->get_title(), $_product); ?></a>
										</h5>
										<span
											class="edgt-quantity"><?php echo esc_html($cart_item['quantity']); ?></span>
										<?php echo apply_filters('eldritch_edge_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
										<?php echo apply_filters('eldritch_edge_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span arie-hidden="true" class="icon_close"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__('Remove this item', 'eldritch')), $cart_item_key); ?>
									</div>
								</li>
							<?php endforeach; ?>
							<li class="edgt-cart-bottom">
								<div class="edgt-subtotal-holder clearfix">
									<span class="edgt-total"><?php esc_html_e('Total:', 'eldritch'); ?></span>
									<span class="edgt-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
												'class' => true,
												'id'    => true
											)
										)); ?>
									</span>
								</div>
								<?php if (!empty($cart_description)) { ?>
									<div class="edgt-cart-description">
										<div class="edgt-cart-description-inner">
											<span><?php echo esc_html($cart_description); ?></span>
										</div>
									</div>
								<?php } ?>
								<div class="edgt-btn-holder clearfix">
                                    <a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>"
                                       class="edgt-view-cart"
                                       data-title="<?php esc_attr_e('VIEW CART', 'eldritch'); ?>"><span><?php esc_html_e('VIEW CART', 'eldritch'); ?></span></a>
                                    <a itemprop="url"
									   href="<?php echo esc_url(wc_get_checkout_url()); ?>"
									   class="edgt-checkout"
									   data-title="<?php esc_attr_e('CHECKOUT', 'eldritch'); ?>"><span><?php esc_html_e('CHECKOUT', 'eldritch'); ?></span></a>

								</div>
							</li>
						</ul>
					</div>
				<?php else : ?>
					<div class="edgt-shopping-cart-dropdown">
						<ul>
							<li class="edgt-empty-cart"><?php esc_html_e('No products in the cart.', 'eldritch'); ?></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php
		echo eldritch_edge_get_module_part($args['after_widget']);
	}
}

// WooCommerce plugin changed hooks in 3.0 version and because of that we have this condition
if ( version_compare( WOOCOMMERCE_VERSION, '3.0' ) >= 0 ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'eldritch_edge_woocommerce_header_add_to_cart_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'eldritch_edge_woocommerce_header_add_to_cart_fragment' );
}

function eldritch_edge_woocommerce_header_add_to_cart_fragment($fragments) {
	global $woocommerce;

	$cart_description = eldritch_edge_options()->getOptionValue('edgt_woo_dropdown_cart_description');

	ob_start();

	?>

	<div class="edgt-shopping-cart-inner">
		<?php $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0; ?>
		<a itemprop="url" class="edgt-header-cart" href="<?php echo wc_get_cart_url(); ?>">
			<span class="edgt-cart-icon icon_bag_alt"><span
					class="edgt-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'eldritch'), WC()->cart->cart_contents_count); ?></span></span>
			<span class="edgt-cart-info">
				<span
					class="edgt-cart-info-number"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'eldritch'), WC()->cart->cart_contents_count); ?></span>
				<span
					class="edgt-cart-info-total"><?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array('span' => array('class' => true, 'id' => true))); ?></span>
			</span>
		</a>
		<?php if (!$cart_is_empty) : ?>
			<div class="edgt-shopping-cart-dropdown">
				<ul>
					<?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
						$_product = $cart_item['data'];
						// Only display if allowed
						if (!$_product->exists() || $cart_item['quantity'] == 0) {
							continue;
						}
						// Get price
						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
						?>
						<li>
							<div class="edgt-item-image-holder">
								<a itemprop="url"
								   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
									<?php echo wp_kses($_product->get_image(), array(
										'img' => array(
											'src'    => true,
											'width'  => true,
											'height' => true,
											'class'  => true,
											'alt'    => true,
											'title'  => true,
											'id'     => true
										)
									)); ?>
								</a>
							</div>
							<div class="edgt-item-info-holder">
								<h5 itemprop="name" class="edgt-product-title"><a itemprop="url"
																				   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('eldritch_edge_woo_widget_cart_product_title', $_product->get_title(), $_product); ?></a>
								</h5>
								<span class="edgt-quantity"><?php echo esc_html($cart_item['quantity']); ?></span>
								<?php echo apply_filters('eldritch_edge_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
								<?php echo apply_filters('eldritch_edge_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span aria-hidden="true" class="icon_close"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__('Remove this item', 'eldritch')), $cart_item_key); ?>
							</div>
						</li>
					<?php endforeach; ?>
					<li class="edgt-cart-bottom">
						<div class="edgt-subtotal-holder clearfix">
							<span class="edgt-total"><?php esc_html_e('Total:', 'eldritch'); ?></span>
							<span class="edgt-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
										'class' => true,
										'id'    => true
									)
								)); ?>
							</span>
						</div>
						<?php if (!empty($cart_description)) { ?>
							<div class="edgt-cart-description">
								<div class="edgt-cart-description-inner">
									<span><?php echo esc_html($cart_description); ?></span>
								</div>
							</div>
						<?php } ?>
						<div class="edgt-btn-holder clearfix">
							<a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>"
							   class="edgt-view-cart"
							   data-title="<?php esc_attr_e('VIEW CART', 'eldritch'); ?>"><span><?php esc_html_e('VIEW CART', 'eldritch'); ?></span></a>
                            <a itemprop="url" href="<?php echo esc_url(wc_get_checkout_url()); ?>"
                               class="edgt-checkout"
                               data-title="<?php esc_attr_e('CHECKOUT', 'eldritch'); ?>"><span><?php esc_html_e('CHECKOUT', 'eldritch'); ?></span></a>
						</div>
					</li>
				</ul>
			</div>
		<?php else : ?>
			<div class="edgt-shopping-cart-dropdown">
				<ul>
					<li class="edgt-empty-cart"><?php esc_html_e('No products in the cart.', 'eldritch'); ?></li>
				</ul>
			</div>
		<?php endif; ?>
	</div>

	<?php
	$fragments['div.edgt-shopping-cart-inner'] = ob_get_clean();

	return $fragments;
}

?>