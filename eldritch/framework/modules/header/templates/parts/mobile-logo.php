<?php do_action('eldritch_edge_before_mobile_logo'); ?>

	<div class="edgt-mobile-logo-wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" <?php eldritch_edge_inline_style($logo_styles); ?>>
			<img <?php echo eldritch_edge_get_inline_attrs($logo_dimensions_attr); ?> src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('mobile logo', 'eldritch'); ?>"/>
		</a>
	</div>

<?php do_action('eldritch_edge_after_mobile_logo'); ?>