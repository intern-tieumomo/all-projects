<?php
$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if (is_array($tags) && count($tags)) :
	foreach ($tags as $tag) {
		$tag_names[] = $tag->name;
	}
	?>
	<div class="edgt-portfolio-info-item edgt-portfolio-tags clearfix">
		<h5>
			<?php esc_html_e('Tags', 'eldritch'); ?>
		</h5>

		<p>
			<?php echo esc_html(implode(', ', $tag_names)); ?>
		</p>
	</div>
<?php endif; ?>
