<?php
get_header();
if (have_posts()) :
	while (have_posts()) : the_post();
		eldritch_edge_get_title(); ?>
		<div class="edgt-container">
			<?php eldritch_edge_image_title_featured_image(); ?>
			<div class="edgt-container-inner">
				<?php
				do_action('eldritch_edge_after_container_open');
				eldritch_edge_get_blog_single();
				do_action('eldritch_edge_before_container_close');
				?>
			</div>
			<?php eldritch_edge_get_single_post_navigation_template(); ?>
		</div>
	<?php
	endwhile; endif;
get_footer();