<div class="edgt-grid-row">
	<div <?php echo eldritch_edge_get_content_sidebar_class(); ?>>
		<div class="edgt-blog-holder edgt-blog-single <?php echo esc_attr($single_template); ?>">
			<?php eldritch_edge_get_single_html(); ?>
		</div>
	</div>

	<?php if (!in_array($sidebar, array('default', ''))) : ?>
		<div <?php echo eldritch_edge_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
</div>