<?php
$edgt_sidebar = eldritch_edge_sidebar_layout();
$edgt_excerpt_length_array = eldritch_edge_blog_lists_number_of_chars();

$edgt_excerpt_length = 0;
if (is_array($edgt_excerpt_length_array) && array_key_exists('standard', $edgt_excerpt_length_array)) {
    $edgt_excerpt_length = $edgt_excerpt_length_array['standard'];
}

?>

<?php get_header(); ?>
<?php
global $wp_query;

if (get_query_var('paged')) {
    $edgt_paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $edgt_paged = get_query_var('page');
} else {
    $edgt_paged = 1;
}

if (eldritch_edge_options()->getOptionValue('blog_page_range') != "") {
    $edgt_blog_page_range = esc_attr(eldritch_edge_options()->getOptionValue('blog_page_range'));
} else {
    $edgt_blog_page_range = $wp_query->max_num_pages;
}
?>
<?php eldritch_edge_get_title(); ?>
    <div class="edgt-container">
        <?php do_action('eldritch_edge_action_after_container_open'); ?>
        <div class="edgt-container-inner clearfix">

            <div class="edgt-grid-row">

                <div class="edgt-page-content-holder edgt-grid-col-9">
                    <h2><?php echo esc_html__('Results for: ', 'eldritch');  echo get_search_query() ?></h2>
                    <div class="edgt-search-holder">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <span class="edgt-date"><?php the_time(get_option('date_format')); ?></span>
                                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                <?php $my_excerpt = get_the_excerpt();
                                if ($my_excerpt != '') { ?>
                                    <p class="edgt-post-excerpt"><?php echo esc_html($my_excerpt); ?></p>
                                <?php }
                                $args_pages = array(
                                    'before'      => '<div class="edgt-single-links-pages"><div class="edgt-single-links-pages-inner">',
                                    'after'       => '</div></div>',
                                    'link_before' => '<span>' . esc_html__('Post Page Link: ', 'eldritch'),
                                    'link_after'  => '</span>',
                                    'pagelink'    => '%'
                                );

                                wp_link_pages($args_pages);
                                ?>
                            </article>
                        <?php
                        endwhile;
                            if(eldritch_edge_options()->getOptionValue('pagination') == 'yes') {
                                    eldritch_edge_pagination($wp_query->max_num_pages, $edgt_blog_page_range, $edgt_paged);
                            }

                        else
                            eldritch_edge_get_module_template_part('templates/parts/no-posts', 'blog');
                        endif;
                        ?>
                    </div>
                </div>

                <div class="edgt-sidebar-holder edgt-grid-col-3">
                    <aside class="edgt-sidebar">
                    <?php if(eldritch_edge_options()->getOptionValue('search_page_custom_sidebar') != ''){  echo eldritch_edge_get_dynamic_sidebar(eldritch_edge_options()->getOptionValue('search_page_custom_sidebar'));  }
                          else { get_sidebar(); }?>
                    </aside>
                </div>


            </div>

        </div>
    </div>
<?php get_footer(); ?>