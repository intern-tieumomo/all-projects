<div class="edgt-portfolio-item-social">
	<?php if(eldritch_edge_core_installed() && eldritch_edge_options()->getOptionValue('enable_social_share') == 'yes'
	         && eldritch_edge_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes'
	) : ?>
		<div class="edgt-portfolio-single-share-holder">
				<span class="edgt-share-label">
				    <?php esc_html_e('Share', 'eldritch'); ?>
			    </span>
			<?php echo eldritch_edge_get_social_share_html() ?>
		</div>
	<?php endif; ?>
	<div class="edgt-portfolio-single-likes">
		<?php echo eldritch_edge_like_portfolio_list(get_the_ID()); ?>
	</div>
</div>
