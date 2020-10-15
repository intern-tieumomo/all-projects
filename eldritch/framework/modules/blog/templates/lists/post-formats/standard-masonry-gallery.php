<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php eldritch_edge_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size' => $image_size)); ?>
	<div class="edgt-title-date">
        <div class="edgt-title-date-inner">
            <div class="edgt-title-date-meta">
                <span class="edgt-date"><?php the_time(get_option('date_format')); ?></span>
                <?php eldritch_edge_get_module_template_part('templates/parts/post-info-category', 'blog'); ?>
            </div>
            <?php eldritch_edge_get_module_template_part('templates/lists/parts/title-small', 'blog'); ?>
            <span class="edgt-blog-read-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html('read more', 'eldritch') ?></a></span>
	    </div>
	</div>
</article>