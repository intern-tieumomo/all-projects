<?php eldritch_edge_get_module_template_part('templates/single/parts/scoreboard', 'match'); ?>

<div class="edgt-container">
    <div class="edgt-container-inner clearfix">

        <?php eldritch_edge_get_module_template_part('templates/single/parts/section-title', 'match'); ?>
        <div <?php echo eldritch_edge_get_content_sidebar_class(); ?>>
            <?php if (post_password_required()) {
                echo get_the_password_form();
            } else {
                //load proper match template

                eldritch_edge_get_module_template_part('templates/single/parts/title', 'match');

                eldritch_edge_get_module_template_part('templates/single/parts/result', 'match');

                eldritch_edge_get_module_template_part('templates/single/parts/content', 'match');

                //load match comments
                eldritch_edge_get_module_template_part('templates/single/parts/comments', 'match');

            } ?>
        </div>
        <?php if (!in_array($sidebar, array('default', ''))) : ?>
            <div <?php echo eldritch_edge_get_sidebar_holder_class(); ?>>
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!post_password_required()) {
        //load match navigation
        eldritch_edge_match_get_single_navigation();
    } ?>
    </div>