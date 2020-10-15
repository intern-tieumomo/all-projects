<?php if($lightbox) : ?>
	<a title="<?php echo esc_attr($video_title); ?>" href="<?php echo esc_url('https://vimeo.com/'.$media['video_id']); ?>" data-rel="prettyPhoto[single_pretty_photo]" class="edgt-portfolio-video-lightbox">
		<div class="edgt-portfolio-overlay">
			<i class="edgt-portfolio-play-icon fa fa-play"></i>
		</div>
		<img width="100%" src="<?php echo esc_url($lightbox_thumb); ?>" alt="<?php echo esc_attr($video_title); ?>"/>
	</a>

<?php else: ?>
	<div class="edgt-iframe-video-holder">
		<iframe class="edgt-iframe-video" src="<?php echo esc_url($media['video_url']); ?>" width="500" height="281" frameborder="281" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
<?php endif; ?>
