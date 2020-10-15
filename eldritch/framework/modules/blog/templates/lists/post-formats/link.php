<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="edgt-blog-whole-link" href="<?php echo esc_url(get_post_meta(get_the_ID(), "edgt_post_link_link_meta", true)); ?>"
       title="<?php the_title_attribute(); ?>" target="_blank"></a>
	<div class="edgt-post-content">
		<div class="edgt-post-text">
			<div class="edgt-post-text-inner">
				<div class="edgt-post-mark">
					<span aria-hidden="true" class="icon-share-alt"></span>
				</div>
                <h4 class="edgt-post-title">
                    <?php the_title(); ?>
                </h4>
			</div>
		</div>
	</div>
</article>