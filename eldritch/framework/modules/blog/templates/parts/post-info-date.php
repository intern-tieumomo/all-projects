<div class="edgt-post-info-date">
    <?php if(!eldritch_edge_post_has_title()) { ?>
    <a href="<?php the_permalink() ?>">
        <?php } ?>
        <span class="edgt-date"><?php the_time(get_option('date_format')); ?></span>
        <?php if(!eldritch_edge_post_has_title()) { ?>
    </a>
<?php } ?>
</div>