<?php
$edgt_sidebar = eldritch_edge_sidebar_layout();
get_header();
eldritch_edge_get_title(); ?>
	<div class="edgt-container">
        <?php do_action('eldritch_edge_after_container_open'); ?>
		<div class="edgt-container-inner clearfix">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="edgt-grid-row">
					<div <?php echo eldritch_edge_get_content_sidebar_class(); ?>>
						<?php
						the_content();
						do_action('eldritch_edge_page_after_content');
						?>
					</div>

					<?php if (!in_array($edgt_sidebar, array('default', ''))) : ?>
						<div <?php echo eldritch_edge_get_sidebar_holder_class(); ?>>
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; endif; ?>
		</div>
		<?php do_action('eldritch_edge_before_container_close'); ?>
	</div>
<?php get_footer(); ?>