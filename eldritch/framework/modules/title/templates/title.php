<?php do_action('eldritch_edge_before_page_title'); ?>
<?php if($show_title_area) { ?>

	<div class="edgt-title <?php echo eldritch_edge_title_classes(); ?>" <?php eldritch_edge_inline_style($title_styles); ?> data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10)); ?>" <?php echo esc_attr($title_background_image_width); ?>>
		<div class="edgt-title-image"><?php if($title_background_image_src != "") { ?>
				<img src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;"/> <?php } ?></div>
		<div class="edgt-title-holder" <?php eldritch_edge_inline_style($title_holder_height); ?>>
			<div class="edgt-container clearfix">
				<div class="edgt-container-inner">
					<div class="edgt-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
						<div class="edgt-title-subtitle-holder-inner">
							<?php switch($type) {
								case 'standard': ?>
									<?php if($has_subtitle) { ?>
										<h4 class="edgt-subtitle" <?php eldritch_edge_inline_style($subtitle_color); ?>><span><?php eldritch_edge_subtitle_text(); ?></span></h4>
									<?php } ?>
									<h1 <?php eldritch_edge_inline_style($title_color); ?>>
										<span><?php eldritch_edge_title_text(); ?></span>
									</h1>
									<?php if($enable_breadcrumbs) { ?>
										<div class="edgt-breadcrumbs-holder"> <?php eldritch_edge_custom_breadcrumbs(); ?></div>
									<?php } ?>
									<?php break;
								case 'breadcrumb': ?>
									<div class="edgt-breadcrumbs-holder"> <?php eldritch_edge_custom_breadcrumbs(); ?></div>
									<?php break;
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
<?php do_action('eldritch_edge_after_page_title'); ?>