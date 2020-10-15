<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="edgt-blog-whole-link" href="<?php the_permalink(); ?>"></a>
	<div class="edgt-post-content">
		<div class="edgt-post-text">
			<div class="edgt-post-text-inner">
				<div class="edgt-post-mark">
                    <span class="edgt-post-font-icon">​‌“</span>
				</div>
				<h4 class="edgt-post-title">
                    <?php if(get_post_meta(get_the_ID(), "edgt_post_quote_text_meta", true) != '') {
                        echo esc_html(get_post_meta(get_the_ID(), "edgt_post_quote_text_meta", true));
                    } else {
                        the_title();
                    } ?>
				</h4>
			</div>
		</div>
	</div>
</article>