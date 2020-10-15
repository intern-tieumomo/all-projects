<?php do_action('eldritch_edge_before_site_logo'); ?>

	<div class="edgt-logo-wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" <?php eldritch_edge_inline_style($logo_styles); ?>>
			<img <?php echo eldritch_edge_get_inline_attrs($logo_dimensions_attr); ?> class="edgt-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('logo', 'eldritch'); ?>"/>
			<?php if(!empty($logo_image_dark)) { ?>
				<img <?php echo eldritch_edge_get_inline_attrs($logo_dimensions_attr); ?> class="edgt-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_attr_e('dark logo', 'eldritch'); ?>"/><?php } ?>
			<?php if(!empty($logo_image_light)) { ?>
				<img <?php echo eldritch_edge_get_inline_attrs($logo_dimensions_attr); ?> class="edgt-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_attr_e('light logo', 'eldritch'); ?>"/><?php } ?>
		</a>
	</div>

<?php do_action('eldritch_edge_after_site_logo'); ?>