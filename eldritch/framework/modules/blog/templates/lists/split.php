<div class="<?php echo esc_attr($blog_classes) ?>"   <?php echo esc_attr($blog_data_params) ?> >
	<?php
	if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post();
		eldritch_edge_get_post_format_html($blog_type);
	endwhile;
		wp_reset_postdata();
	else:
		eldritch_edge_get_module_template_part('templates/parts/no-posts', 'blog');
	endif;
	?>
</div>