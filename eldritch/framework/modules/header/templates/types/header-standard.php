<?php do_action('eldritch_edge_before_page_header'); ?>

<header class="edgt-page-header">
	<?php if ($show_fixed_wrapper) : ?>
	<div class="edgt-fixed-wrapper">
		<?php endif; ?>
		<div class="edgt-menu-area">
			<?php if ($menu_area_in_grid) : ?>
			<div class="edgt-grid">
				<?php endif; ?>
				<?php do_action('eldritch_edge_after_header_menu_area_html_open') ?>
				<div class="edgt-vertical-align-containers">
					<div class="edgt-position-left">
						<div class="edgt-position-left-inner">
							<?php if (!$hide_logo) {
								eldritch_edge_get_logo();
							} ?>
						</div>
						<?php if ($menu_area_position === 'left') {
							eldritch_edge_get_main_menu();
						}
						?>
					</div>
					<?php
					if ($menu_area_position === 'center') { ?>
						<div class="edgt-position-center">
							<div class="edgt-position-center-inner">
								<?php eldritch_edge_get_main_menu(); ?>
							</div>
						</div>
					<?php } ?>
					<div class="edgt-position-right">
						<div class="edgt-position-right-inner">
							<?php
							if ($menu_area_position === 'right') {
								eldritch_edge_get_main_menu();
							}
							if (get_post_meta(eldritch_edge_get_page_id(), 'edgt_custom_sidebar_header_standard_meta', true) !== '') { ?>
								<div class="edgt-right-from-main-menu-widget">
									<div class="edgt-right-from-main-menu-widget-inner">
										<?php dynamic_sidebar(get_post_meta(eldritch_edge_get_page_id(), 'edgt_custom_sidebar_header_standard_meta', true)); ?>
									</div>
								</div>
							<?php } else if (is_active_sidebar('edgt-right-from-main-menu')) { ?>
								<div class="edgt-main-menu-widget-area">
									<div class="edgt-main-menu-widget-area-inner">
										<?php dynamic_sidebar('edgt-right-from-main-menu'); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php if ($menu_area_in_grid) : ?>
			</div>
		<?php endif; ?>
		</div>
		<?php if ($show_fixed_wrapper) : ?>
	</div>
<?php endif; ?>
	<?php if ($show_sticky) {
		eldritch_edge_get_sticky_header('standard');
	} ?>
</header>

<?php do_action('eldritch_edge_after_page_header'); ?>

