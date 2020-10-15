<?php
if (!isset($image_size)) {
	$image_size = 'full';
}

$image_gallery_val = get_post_meta(get_the_ID(), 'edgt_post_gallery_images_meta', true); ?>

<?php if ($image_gallery_val !== "") { ?>
	<div class="edgt-post-image">
		<div class="edgt-blog-gallery edgt-slick-slider edgt-light-navigation">
			<?php
			if ($image_gallery_val != '') {
				$image_gallery_array = explode(',', $image_gallery_val);
			}
			if (isset($image_gallery_array) && count($image_gallery_array) != 0):
				foreach ($image_gallery_array as $gimg_id): ?>
					<div>
						<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($gimg_id, $image_size); ?></a>
					</div>
				<?php endforeach;
			endif;
			?>
		</div>
	</div>
<?php } ?>