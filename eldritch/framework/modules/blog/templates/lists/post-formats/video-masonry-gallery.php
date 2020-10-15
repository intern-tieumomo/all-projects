<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>

    <?php
	$_video_type = get_post_meta(get_the_ID(), "edgt_video_type_meta", true);
	$_video_link_meta =  get_post_meta(get_the_ID(), "edgt_post_video_id_meta", true);
	$_video_link = $_video_link_meta !== '' ? $_video_link_meta : '#';

	if ($_video_type == "youtube") {
        $_video_link = 'https://www.youtube.com/watch?v=' . $_video_link_meta;
    } elseif ($_video_type == "vimeo") {
        $_video_link = 'https://www.vimeo.com/' . $_video_link_meta;
    } elseif ($_video_type == "self") {
        $_video_link = get_post_meta(get_the_ID(), "edgt_post_video_mp4_link_meta", true) . '?iframe=true&width50%&height=50%';
    }

    if(has_post_thumbnail()) { ?>
        <div class="edgt-post-image">
            <a href="<?php echo esc_url($_video_link); ?>" data-rel="prettyPhoto[<?php the_ID(); ?>]" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail($image_size); ?>
            </a>
        </div>
    <?php } ?>

    <div class="edgt-title-date"></div>

	<a class="edgt-video-post-link" href="<?php echo esc_url($_video_link); ?>"
	   data-rel="prettyPhoto[<?php the_ID(); ?>]">
		<?php echo eldritch_edge_icon_collections()->renderIcon('arrow_triangle-right_alt2', 'font_elegant', array('icon_attributes' => array('class' => 'edgt-vb-play-icon'))); ?>
	</a>
</article>