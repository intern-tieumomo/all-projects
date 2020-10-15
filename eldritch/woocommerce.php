<?php
/*
Template Name: WooCommerce
*/
?>
<?php

global $woocommerce;

$edgt_id      = get_option('woocommerce_shop_page_id');
$edgt_shop    = get_post($edgt_id);
$edgt_sidebar = eldritch_edge_sidebar_layout();

if(get_post_meta($edgt_id, 'edgt_page_background_color', true) != '') {
	$edgt_background_color = 'background-color: '.esc_attr(get_post_meta($edgt_id, 'edgt_page_background_color', true));
} else {
	$edgt_background_color = '';
}

$edgt_content_style = '';
if(get_post_meta($edgt_id, 'edgt_content-top-padding', true) != '') {
	if(get_post_meta($edgt_id, 'edgt_content-top-padding-mobile', true) == 'yes') {
		$edgt_content_style = 'padding-top:'.esc_attr(get_post_meta($edgt_id, 'edgt_content-top-padding', true)).'px !important';
	} else {
		$edgt_content_style = 'padding-top:'.esc_attr(get_post_meta($edgt_id, 'edgt_content-top-padding', true)).'px';
	}
}

if(get_query_var('paged')) {
	$edgt_paged = get_query_var('paged');
} elseif(get_query_var('page')) {
	$edgt_paged = get_query_var('page');
} else {
	$edgt_paged = 1;
}

get_header();

eldritch_edge_get_title();

$edgt_full_width = false;

if(eldritch_edge_options()->getOptionValue('edgt_woo_products_list_full_width') == 'yes' && !is_singular('product')) {
	$edgt_full_width = true;
}

if($edgt_full_width) { ?>
<div class="edgt-full-width" <?php eldritch_edge_inline_style($edgt_background_color); ?>>
	<?php } else { ?>
	<div class="edgt-container" <?php eldritch_edge_inline_style($edgt_background_color); ?>>
		<?php }
		if($edgt_full_width) { ?>
		<div class="edgt-full-width-inner" <?php eldritch_edge_inline_style($edgt_content_style); ?>>
			<?php } else { ?>
			<div class="edgt-container-inner clearfix" <?php eldritch_edge_inline_style($edgt_content_style); ?>>
				<?php }

                eldritch_edge_print_woo_content();

				//Woocommerce content
				if(!is_singular('product')) {

					switch($edgt_sidebar) {

						case 'sidebar-33-right': ?>
							<div class="edgt-two-columns-66-33 grid2 edgt-woocommerce-with-sidebar clearfix">
								<div class="edgt-column1">
									<div class="edgt-column-inner">
										<?php eldritch_edge_woocommerce_content(); ?>
									</div>
								</div>
								<div class="edgt-column2">
									<?php

									get_sidebar(); ?>
								</div>
							</div>
							<?php
							break;
						case 'sidebar-25-right': ?>
							<div class="edgt-two-columns-75-25 grid2 edgt-woocommerce-with-sidebar clearfix">
								<div class="edgt-column1 edgt-content-left-from-sidebar">
									<div class="edgt-column-inner">
										<?php eldritch_edge_woocommerce_content(); ?>
									</div>
								</div>
								<div class="edgt-column2">
									<?php
									get_sidebar(); ?>
								</div>
							</div>
							<?php
							break;
						case 'sidebar-33-left': ?>
							<div class="edgt-two-columns-33-66 grid2 edgt-woocommerce-with-sidebar clearfix">
								<div class="edgt-column1">
									<?php get_sidebar(); ?>
								</div>
								<div class="edgt-column2">
									<div class="edgt-column-inner">
										<?php eldritch_edge_woocommerce_content(); ?>
									</div>
								</div>
							</div>
							<?php
							break;
						case 'sidebar-25-left': ?>
							<div class="edgt-two-columns-25-75 grid2 edgt-woocommerce-with-sidebar clearfix">
								<div class="edgt-column1">
									<?php get_sidebar(); ?>
								</div>
								<div class="edgt-column2 edgt-content-right-from-sidebar">
									<div class="edgt-column-inner">
										<?php eldritch_edge_woocommerce_content(); ?>
									</div>
								</div>
							</div>
							<?php
							break;
						default:
							eldritch_edge_woocommerce_content();
					}

				} else {
					eldritch_edge_woocommerce_content();
				} ?>

			</div>
		</div>
		<?php get_footer(); ?>
