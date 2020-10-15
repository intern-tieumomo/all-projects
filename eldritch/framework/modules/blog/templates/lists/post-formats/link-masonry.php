<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgt-post-content">
        <div class="edgt-post-text">
            <div class="edgt-post-text-inner">
				<div class="edgt-categories-list">
					<?php eldritch_edge_get_module_template_part('templates/parts/post-info-category', 'blog'); ?>
				</div>

                <span class="edgt-masonry-icon fa fa-external-link"></span>

				<?php eldritch_edge_get_module_template_part('templates/lists/parts/title-small', 'blog'); ?>
            </div>
			<div class="edgt-post-info">
				<?php eldritch_edge_post_info(array(
					'date'     => 'yes',
					'comments' => (eldritch_edge_options()->getOptionValue('blog_single_comments') == 'yes') ? 'yes' : 'no',
					'share'    => 'yes'))
				?>
			</div>
        </div>
    </div>
</article>