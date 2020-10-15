<div class="edgt-container-inner">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="edgt-post-content">
			<div
				class="edgt-post-link clearfix">
				<div class="edgt-post-mark">
					<?php echo eldritch_edge_icon_collections()->renderIcon('icon_link', 'font_elegant'); ?>
				</div>
				<h1 class="edgt-post-title">
					<a href="<?php echo esc_url(get_post_meta(get_the_ID(), "edgt_post_link_link_meta", true)); ?>"
					   title="<?php the_title_attribute(); ?> " target="_blank"><?php the_title(); ?></a>
				</h1>
			</div>
			<div class="edgt-post-text">
				<div class="edgt-post-text-inner clearfix">
					<div class="edgt-post-info">
						<?php eldritch_edge_post_info(array('date' => 'yes')) ?>
						<div class="edgt-post-info-category">
							<?php the_category('/ ') ?>
						</div>
					</div>
					<?php the_content(); ?>
				</div>
				<div class="edgt-tags-share-holder clearfix">
					<?php do_action('eldritch_edge_before_blog_article_closed_tag'); ?>
					<div class="edgt-share-icons-single">
						<?php $post_info_array['share'] = eldritch_edge_options()->getOptionValue('enable_social_share') == 'yes'; ?>
						<?php if (eldritch_edge_core_installed() && $post_info_array['share'] == 'yes'): ?>
							<span class="edgt-share-label"><?php esc_html_e('Share', 'eldritch'); ?></span>
						<?php endif; ?>
						<?php if ( eldritch_edge_core_installed() ) { ?>
                            <?php echo eldritch_edge_get_social_share_html(array(
                                'type'      => 'list',
                                'icon_type' => 'normal'
                            )); ?>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>