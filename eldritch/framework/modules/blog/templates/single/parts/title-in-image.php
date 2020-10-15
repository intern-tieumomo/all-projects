
<?php $subtitle = get_post_meta(eldritch_edge_get_page_id(), 'edgt_title_subtitle_meta', true);

if($subtitle != '') { ?>
        <h4 class="edgt-post-image-title-subtitle"><?php echo esc_attr($subtitle) ?></h4>
<?php }

if(isset($title_tag)) {
    $title_tag = $title_tag;
} else {
    $title_tag = 'h1';
}
?>
<<?php echo esc_attr($title_tag); ?> class="edgt-post-title">
<?php the_title(); ?>
</<?php echo esc_attr($title_tag); ?>>