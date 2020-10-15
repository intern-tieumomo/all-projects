<?php
$cols = 4;
$page_id = eldritch_edge_get_page_id();
?>

<div class="edgt-grid-row edgt-footer-top-four-cols">
	<?php for($i = 1; $i <= $cols; $i++) : ?>
		<div class="edgt-grid-col-3 edgt-grid-col-ipad-landscape-6 edgt-grid-col-ipad-portrait-12">
			<?php
			$custom_footer_top_area = get_post_meta($page_id, 'edgt_footer_top_meta_'.$i, true);
			if($custom_footer_top_area !== ''){
				dynamic_sidebar($custom_footer_top_area);
			}elseif(is_active_sidebar('footer_column_'.$i)) {
				dynamic_sidebar('footer_column_'.$i);
			}?>
		</div>
	<?php endfor; ?>
</div>