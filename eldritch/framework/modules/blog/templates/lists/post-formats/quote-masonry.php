<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgt-post-content">
        <div class="edgt-post-text">
            <div class="edgt-post-text-inner">
				<div class="edgt-categories-list">
					<?php eldritch_edge_get_module_template_part('templates/parts/post-info-category', 'blog'); ?>
				</div>

                <span class="edgt-masonry-icon fa fa-quote-right"></span>

                <div class="edgt-post-title">
                    <h4>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "edgt_post_quote_text_meta", true)); ?></a>
                    </h4>
                    <h6 class="quote_author">&mdash; <?php the_title(); ?></h6>
                </div>
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