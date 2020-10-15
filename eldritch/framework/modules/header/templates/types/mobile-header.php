<?php do_action('eldritch_edge_before_mobile_header'); ?>

	<header class="edgt-mobile-header">
		<div class="edgt-mobile-header-inner">
			<?php do_action('eldritch_edge_after_mobile_header_html_open') ?>
			<div class="edgt-mobile-header-holder">
				<div class="edgt-grid">
					<div class="edgt-vertical-align-containers">
						<?php if($show_navigation_opener) : ?>
							<div class="edgt-mobile-menu-opener">
								<a href="javascript:void(0)">
                    <span class="edgt-mobile-opener-icon-holder">
                        <?php echo eldritch_edge_get_module_part($menu_opener_icon); ?>
                    </span>
								</a>
							</div>
						<?php endif; ?>
						<?php if($show_logo) : ?>
							<div class="edgt-position-center">
								<div class="edgt-position-center-inner">
									<?php eldritch_edge_get_mobile_logo(); ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="edgt-position-right">
							<div class="edgt-position-right-inner">
								<?php if(is_active_sidebar('edgt-right-from-mobile-logo')) {
									dynamic_sidebar('edgt-right-from-mobile-logo');
								} ?>
							</div>
						</div>
					</div>
					<!-- close .edgt-vertical-align-containers -->
				</div>
			</div>
			<?php eldritch_edge_get_mobile_nav(); ?>
		</div>
	</header> <!-- close .edgt-mobile-header -->

<?php do_action('eldritch_edge_after_mobile_header'); ?>