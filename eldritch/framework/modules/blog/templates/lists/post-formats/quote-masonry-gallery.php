<article
	id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <a class="edgt-masonry-gallery-whole-link" href="<?php the_permalink(); ?>"></a>
	<div class="edgt-masonry-gallery-quote-author">
		<div class="edgt-masonry-gallery-quote-author-inner">

            <span class="edgt-masonry-gallery-icon fa fa-quote-right"></span>

			<h3 class="edgt-masonry-gallery-quote">
				<span>"<?php echo esc_html(get_post_meta(get_the_ID(), "edgt_post_quote_text_meta", true)); ?>"</span>
			</h3>

			<div class="edgt-masonry-gallery-author">
				<h5><?php the_title(); ?></h5>
			</div>
		</div>
	</div>
</article>