<?php
/*
Template Name: Blog: Masonry Full Width
*/

get_header();
eldritch_edge_get_title();
?>
	<div class="edgt-full-width">
		<div class="edgt-full-width-inner clearfix">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				the_content();
				eldritch_edge_get_blog('masonry-full-width');
			endwhile; endif; ?>
			<div class="edgt-blog-after-content">
				<div class="edgt-container-inner">
					<?php do_action('eldritch_edge_page_after_content'); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>