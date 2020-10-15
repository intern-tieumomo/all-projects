<?php
$page_id = eldritch_edge_get_page_id();
$custom_footer_bottom = get_post_meta($page_id, 'edgt_footer_text_meta', true);
$custom_footer_bottom_left = get_post_meta($page_id, 'edgt_footer_bottom_left_meta', true);
$custom_footer_bottom_right = get_post_meta($page_id, 'edgt_footer_bottom_right_meta', true);
?>

<div class="edgt-grid-row edgt-footer-bottom-three-cols">

	<div class="edgt-grid-col-4 edgt-left">
		<?php
		if($custom_footer_bottom_left !== ''){
			dynamic_sidebar($custom_footer_bottom_left);
		}
		elseif(is_active_sidebar('footer_bottom_left')) {
			dynamic_sidebar('footer_bottom_left');
		}?>
	</div>

	<div class="edgt-grid-col-4">
		<?php
		if($custom_footer_bottom !== ''){
			dynamic_sidebar($custom_footer_bottom);
		}
		elseif(is_active_sidebar('footer_text')) {
			dynamic_sidebar('footer_text');
		}?>
	</div>

	<div class="edgt-grid-col-4 edgt-right">
		<?php
		if($custom_footer_bottom_right !== ''){
			dynamic_sidebar($custom_footer_bottom_right);
		}
		elseif(is_active_sidebar('footer_bottom_right')) {
			dynamic_sidebar('footer_bottom_right');
		}?>
	</div>

</div>