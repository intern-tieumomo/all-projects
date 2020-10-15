<?php
/*
Template Name: Landing Page
*/
$edgt_sidebar = eldritch_edge_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<?php
	/**
	 * eldritch_edge_header_meta hook
	 *
	 * @see eldritch_edge_header_meta() - hooked with 10
	 * @see edgt_user_scalable_meta() - hooked with 10
	 */
		do_action('eldritch_edge_header_meta');
	    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>

<?php
if(eldritch_edge_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$ajax_class = 'edgt-mimic-ajax';
	?>
	<div class="edgt-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
		<div class="edgt-st-loader">
			<div class="edgt-st-loader1">
				<?php echo eldritch_edge_loading_spinners(true); ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="edgt-wrapper">
	<div class="edgt-wrapper-inner">
		<div class="edgt-content">
			<div class="edgt-content-inner">
				<?php eldritch_edge_get_title(); ?>
				<div class="edgt-full-width">
					<div class="edgt-full-width-inner">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<div class="edgt-grid-row">
								<div <?php echo eldritch_edge_get_content_sidebar_class(); ?>>
									<?php the_content(); ?>
									<?php do_action('eldritch_edge_page_after_content'); ?>
								</div>

								<?php if(!in_array($edgt_sidebar, array('default', ''))) : ?>
									<div <?php echo eldritch_edge_get_sidebar_holder_class(); ?>>
										<?php get_sidebar(); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>