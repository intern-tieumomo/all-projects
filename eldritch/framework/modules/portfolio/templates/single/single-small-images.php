<div class="edgt-two-columns-66-33 clearfix">
	<div class="edgt-column1">
		<div class="edgt-column-inner">
			<?php
			$media = eldritch_edge_get_portfolio_single_media();

			if (is_array($media) && count($media)) : ?>
				<div class="edgt-portfolio-media">
					<?php foreach ($media as $single_media) : ?>
						<div class="edgt-portfolio-single-media">
							<?php eldritch_edge_portfolio_get_media_html($single_media); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="edgt-column2">
		<div class="edgt-column-inner">
			<div class="edgt-portfolio-info-holder">
				<div class="edgt-portfolio-content">
					<?php
					//get portfolio content section
					eldritch_edge_portfolio_get_info_part('content');

					//get portfolio custom fields section
					?>
				</div>
				<?php
				//get portfolio author section
				eldritch_edge_portfolio_get_info_part('author');
				?>
				<div class="edgt-portfolio-fields">
					<?php
					eldritch_edge_portfolio_get_info_part('custom-fields');

					//get portfolio date section
					eldritch_edge_portfolio_get_info_part('date');

					//get portfolio tags section
					eldritch_edge_portfolio_get_info_part('tags');

					//get portfolio share section
					eldritch_edge_portfolio_get_info_part('social');
					?>
				</div>
			</div>
		</div>
	</div>
</div>