<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgt-post-content">
        <?php eldritch_edge_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
        <div class="edgt-post-text">
            <div class="edgt-post-text-inner">
                <?php eldritch_edge_get_module_template_part('templates/parts/audio', 'blog'); ?>
                <?php eldritch_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <div class="edgt-post-info">
                    <?php eldritch_edge_post_info(array(
                        'date'     => 'yes',
                        'author'   => 'yes',
                        'category' => 'yes',
                        'comments' => 'yes',
                        'share'    => 'yes',
                        'like'     => 'yes'
                    )) ?>
                </div>
                <?php
                eldritch_edge_excerpt();
                $args_pages = array(
                    'before'      => '<div class="edgt-single-links-pages"><div class="edgt-single-links-pages-inner">',
                    'after'       => '</div></div>',
                    'link_before' => '<span>' . esc_html__('Post Page Link: ', 'eldritch'),
                    'link_after'  => '</span> ',
                    'pagelink'    => '%'
                );

                wp_link_pages($args_pages);
                ?>
                <?php eldritch_edge_get_module_template_part('templates/parts/social-share', 'blog'); ?>
            </div>
        </div>
    </div>
</article>