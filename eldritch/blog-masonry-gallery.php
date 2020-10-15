<?php
/*
Template Name: Blog: Masonry Gallery
*/

get_header();
eldritch_edge_get_title();
?>
	<div class="edgt-full-width">
		<div class="edgt-full-width-inner clearfix">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				the_content();
				eldritch_edge_get_blog('masonry-gallery');
			endwhile; endif; ?>
			<div class="edgt-blog-after-content">
				<div class="edgt-container-inner">
					<?php do_action('connect_edge_page_after_content'); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>