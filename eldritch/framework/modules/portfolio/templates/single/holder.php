<?php if ($fullwidth) : ?>
<div class="edgt-full-width">
	<div class="edgt-full-width-inner">
		<?php else: ?>
		<div class="edgt-container">
			<div class="edgt-container-inner clearfix">
				<?php endif; ?>
				<div <?php eldritch_edge_class_attribute($holder_class); ?>>
					<?php if (post_password_required()) {
						echo get_the_password_form();
					} else {
						//load proper portfolio template
						eldritch_edge_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);

						//load portfolio comments
						eldritch_edge_get_module_template_part('templates/single/parts/comments', 'portfolio');

					} ?>
				</div>
			</div>
			<?php if (!post_password_required()) {
				//load portfolio navigation
				eldritch_edge_portfolio_get_single_navigation();
			} ?>
		</div>