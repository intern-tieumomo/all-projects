<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <a class="edgt-masonry-gallery-whole-link" href="<?php echo esc_url(get_post_meta(get_the_ID(), "edgt_post_link_link_meta", true)); ?>"
       title="<?php the_title_attribute(); ?>" target="_blank"></a>
	<div class="edgt-masonry-gallery-link">
		<div class="edgt-masonry-gallery-link-inner">
            <span class="edgt-masonry-gallery-icon fa fa-external-link"></span>
            <h3 class="edgt-masonry-gallery-link-title">
                <?php the_title(); ?>
            </h3>
		</div>
	</div>
</article>