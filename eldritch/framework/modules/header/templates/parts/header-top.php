<?php if($show_header_top) : ?>

	<?php do_action('eldritch_edge_before_header_top'); ?>
	<div class="edgt-top-bar">
		<?php if($top_bar_in_grid) : ?>
		<div class="edgt-grid">
			<?php endif; ?>
			<?php do_action('eldritch_edge_after_header_top_html_open'); ?>
			<div class="edgt-vertical-align-containers <?php echo esc_attr($column_widths); ?>">
				<div class="edgt-position-left edgt-top-bar-widget-area">
					<div class="edgt-position-left-inner edgt-top-bar-widget-area-inner">
						<?php if(is_active_sidebar('edgt-top-bar-left')) : ?>
							<?php dynamic_sidebar('edgt-top-bar-left'); ?>
						<?php endif; ?>
					</div>
				</div>
				<?php if($show_widget_center) { ?>
					<div class="edgt-position-center edgt-top-bar-widget-area">
						<div class="edgt-position-center-inner edgt-top-bar-widget-area-inner">
							<?php if(is_active_sidebar('edgt-top-bar-center')) : ?>
								<?php dynamic_sidebar('edgt-top-bar-center'); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php } ?>
				<div class="edgt-position-right edgt-top-bar-widget-area">
					<div class="edgt-position-right-inner edgt-top-bar-widget-area-inner">
						<?php if(is_active_sidebar('edgt-top-bar-right')) : ?>
							<?php dynamic_sidebar('edgt-top-bar-right'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if($top_bar_in_grid) : ?>
		</div>
	<?php endif; ?>
	</div>

	<?php do_action('eldritch_edge_after_header_top'); ?>

<?php endif; ?>