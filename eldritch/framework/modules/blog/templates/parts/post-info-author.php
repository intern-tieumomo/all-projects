<div class="edgt-post-info-author edgt-post-info-item">
	<div class="edgt-avatar">
		<a href="<?php echo esc_url(eldritch_edge_get_author_posts_url()); ?>">
			<?php echo eldritch_edge_kses_img(get_avatar(get_the_author_meta('ID'), 28)); ?>
		</a>
	</div>
	<div class="edgt-author">
		<?php echo '<span>'.esc_html__('by','eldritch').' </span>';?>
		<a href="<?php echo esc_url(eldritch_edge_get_author_posts_url()); ?>">
			<?php echo eldritch_edge_get_the_author_name(); ?>
		</a>
	</div>
</div>
