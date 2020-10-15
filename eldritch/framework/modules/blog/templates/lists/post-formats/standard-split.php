<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgt-post-content">
		<div class="edgt-post-text">
			<div class="edgt-post-text-inner">
				<?php eldritch_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php eldritch_edge_excerpt($excerpt_length); ?>
				<div class="edgt-post-info">
					<?php eldritch_edge_post_info(array('date' => 'yes')) ?>
				</div>
			</div>
		</div>
	</div>
</article>