<?php do_action('eldritch_edge_before_page_header'); ?>

<header class="edgt-page-header">
	<?php if($show_fixed_wrapper) : ?>
	<div class="edgt-fixed-wrapper">
		<?php endif; ?>
		<div class="edgt-menu-area">
			<?php if($menu_area_in_grid) : ?>
			<div class="edgt-grid">
				<?php endif; ?>
				<?php do_action('eldritch_edge_after_header_menu_area_html_open') ?>
				<div class="edgt-vertical-align-containers">
					<div class="edgt-position-left">
						<div class="edgt-position-left-inner">
							<?php if(!$hide_logo) {
								eldritch_edge_get_logo();
							} ?>
						</div>
					</div>
					<div class="edgt-position-right">
						<div class="edgt-position-right-inner">
                            <a href="javascript:void(0)" class="edgt-fullscreen-menu-opener">
                                <span class="edgt-fullscreen-menu-opener-icon">
                                    <span class="edgt-fsm-first-line"></span>
                                    <span class="edgt-fsm-second-line"></span>
                                    <span class="edgt-fsm-third-line"></span>
                                </span>
                            </a>
						</div>
					</div>
				</div>
				<?php if($menu_area_in_grid) : ?>
			</div>
		<?php endif; ?>
		</div>
		<?php if($show_fixed_wrapper) : ?>
	</div>
<?php endif; ?>
	<?php if($show_sticky) {
		eldritch_edge_get_sticky_header('minimal');
	} ?>
</header>

<?php do_action('eldritch_edge_after_page_header'); ?>

