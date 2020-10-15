<?php eldritch_edge_get_module_template_part('templates/lists/parts/filter', 'blog'); ?>
	<div class="<?php echo esc_attr($blog_classes) ?>"   <?php echo esc_attr($blog_data_params) ?> >
		<div class="edgt-blog-masonry-grid-sizer"></div>
		<div class="edgt-blog-masonry-grid-gutter"></div>
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

<?php /*pagination*/
if (eldritch_edge_options()->getOptionValue('pagination') == 'yes') :
	eldritch_edge_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
endif;

do_action('eldritch_edge_generate_load_more_button');
do_action('eldritch_edge_generate_scroll_trigger');