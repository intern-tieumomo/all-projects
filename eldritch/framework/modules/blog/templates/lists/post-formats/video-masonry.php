<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgt-post-content">
		<div class="edgt-post-image-video">
			<?php
			eldritch_edge_get_module_template_part('templates/lists/parts/image', 'blog');

			$_video_type = get_post_meta(get_the_ID(), "edgt_video_type_meta", true);
			$_video_link_meta = get_post_meta(get_the_ID(), "edgt_post_video_id_meta", true);
			$_video_link = $_video_link_meta !== '' ? $_video_link_meta : '#';

			if ($_video_type == "youtube") {
				$_video_link = 'https://www.youtube.com/watch?v=' . $_video_link_meta;
			} elseif ($_video_type == "vimeo") {
				$_video_link = 'https://www.vimeo.com/' . $_video_link_meta;
			} elseif ($_video_type == "self") {
				$_video_link = get_post_meta(get_the_ID(), "edgt_post_video_mp4_link_meta", true) . '?iframe=true&width50%&height=50%';
			}
			?>
			<div class="edgt-post-video">
				<a class="edgt-video-post-link" href="<?php echo esc_url($_video_link); ?>"
				   data-rel="prettyPhoto[<?php the_ID(); ?>]">
					<?php echo eldritch_edge_icon_collections()->renderIcon('arrow_triangle-right', 'font_elegant'); ?>
				</a>
			</div>
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