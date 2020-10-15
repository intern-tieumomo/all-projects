<?php if(eldritch_edge_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

	<div class="edgt-portfolio-info-item edgt-portfolio-date clearfix">
		<h5><?php esc_html_e('Date', 'eldritch'); ?></h5>

		<p><?php the_time(get_option('date_format')); ?></p>
	</div>

<?php endif; ?>