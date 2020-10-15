<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgt-post-content">
		<div class="edgt-audio-image-holder">
			<?php eldritch_edge_get_module_template_part('templates/lists/parts/image', 'blog'); ?>

			<?php if (has_post_thumbnail()) : ?>
				<div class="edgt-audio-player-holder">
					<?php eldritch_edge_get_module_template_part('templates/parts/audio', 'blog'); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="edgt-post-text">
			<div class="edgt-post-text-inner">
				<div class="edgt-categories-list">
					<?php eldritch_edge_get_module_template_part('templates/parts/post-info-category', 'blog'); ?>
				</div>
				<?php eldritch_edge_get_module_template_part('templates/lists/parts/title-small', 'blog'); ?>
				<?php
				eldritch_edge_excerpt($excerpt_length);
				$args_pages = array(
					'before'      => '<div class="edgt-single-links-pages"><div class="edgt-single-links-pages-inner">',
					'after'       => '</div></div>',
                    'link_before' => '<span>' . esc_html__('Post Page Link: ', 'eldritch'),
					'link_after'  => '</span> ',
					'pagelink'    => '%'
				);

				wp_link_pages($args_pages);
				?>
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