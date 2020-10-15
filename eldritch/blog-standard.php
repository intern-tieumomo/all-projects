<?php
/*
Template Name: Blog: Standard
*/

get_header();
eldritch_edge_get_title();
?>
	<div class="edgt-container">
		<?php do_action('eldritch_edge_after_container_open');
		if (have_posts()) : while (have_posts()) : the_post();
			the_content(); ?>
			<div class="edgt-container-inner">
				<?php eldritch_edge_get_blog('standard'); ?>
			</div>
		<?php endwhile; endif; ?>
		<div class="edgt-blog-after-content">
			<div class="edgt-container-inner">
				<?php do_action('eldritch_edge_page_after_content'); ?>
			</div>
		</div>
		<?php do_action('eldritch_edge_before_container_close'); ?>
	</div>
<?php get_footer(); ?>