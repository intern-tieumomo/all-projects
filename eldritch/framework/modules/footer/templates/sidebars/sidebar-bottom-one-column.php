<?php
$page_id = eldritch_edge_get_page_id();
$custom_footer_bottom_area = get_post_meta($page_id, 'edgt_footer_text_meta', true);
?>

<div class="edgt-grid-row edgt-footer-bottom-one-col">
	<div class="edgt-grid-col-12">

		<?php
		if($custom_footer_bottom_area !== ''){
			dynamic_sidebar($custom_footer_bottom_area);
		}
		elseif(is_active_sidebar('footer_text')) {
			dynamic_sidebar('footer_text');
		}
		?>

	</div>
</div>