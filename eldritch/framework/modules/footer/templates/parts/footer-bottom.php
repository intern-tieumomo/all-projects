<?php if ($footer_bottom_border != '') {
	if ($footer_bottom_border_in_grid != '') { ?>
		<div class="edgt-footer-ingrid-border-holder-outer">
	<?php } ?>
	<div
		class="edgt-footer-bottom-border-holder <?php echo esc_attr($footer_bottom_border_in_grid); ?>" <?php eldritch_edge_inline_style($footer_bottom_border); ?>></div>
	<?php if ($footer_bottom_border_in_grid != '') { ?>
		</div>
	<?php }
} ?>

	<div class="edgt-footer-bottom-holder <?php echo esc_attr($footer_bottom_border_class); ?>">
		<div class="edgt-footer-bottom-holder-inner">
			<?php if ($footer_in_grid) { ?>
			<div class="edgt-container">
				<div class="edgt-container-inner">

					<?php }

					switch ($footer_bottom_columns) {
						case 4:
							eldritch_edge_get_footer_bottom_sidebar_25_50_25();
							break;
						case 3:
							eldritch_edge_get_footer_bottom_sidebar_three_columns();
							break;
						case 2:
							eldritch_edge_get_footer_bottom_sidebar_two_columns();
							break;
						case 1:
							eldritch_edge_get_footer_bottom_sidebar_one_column();
							break;
					}
					if ($footer_in_grid){ ?>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
<?php if ($footer_bottom_border_bottom != '') { ?>
	<div
		class="edgt-footer-bottom-border-bottom-holder" <?php eldritch_edge_inline_style($footer_bottom_border_bottom); ?>></div>
<?php } ?>