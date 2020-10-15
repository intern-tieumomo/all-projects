<?php
$blog_archive_pages_classes = eldritch_edge_blog_archive_pages_classes(eldritch_edge_get_default_blog_list());
?>
<?php get_header(); ?>
<?php eldritch_edge_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
	<?php do_action('eldritch_edge_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php eldritch_edge_get_blog(eldritch_edge_get_default_blog_list()); ?>
	</div>
	<?php do_action('eldritch_edge_before_container_close'); ?>
</div>
<?php get_footer(); ?>
