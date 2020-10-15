<?php if (eldritch_edge_options()->getOptionValue('portfolio_single_hide_author') !== 'yes') : ?>

	<div class="edgt-portfolio-author-holder clearfix">
		<div class="edgt-image-author-holder clearfix">
			<div class="edgt-author-description-image">
				<?php echo eldritch_edge_kses_img(get_avatar(get_the_author_meta('ID'), 40)); ?>
			</div>
			<div class="edgt-author-name-position">
				<h6 class="edgt-author-name">
					<span class="edgt-label-by"><?php esc_html_e('by', 'eldritch'); ?></span>
					<?php
					if (get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
						echo esc_attr(get_the_author_meta('first_name')) . " " . esc_attr(get_the_author_meta('last_name'));
					} else {
						echo esc_attr(get_the_author_meta('display_name'));
					}
					?>
				</h6>
			</div>
		</div>
	</div>
<?php endif; ?>