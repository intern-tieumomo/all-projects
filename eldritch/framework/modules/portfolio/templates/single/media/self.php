<div class="edgt-self-hosted-video-holder">
	<div class="mobile-video-image" style="background-image: url(<?php echo esc_url($media['video_cover']); ?>);"></div>
	<div class="edgt-video-wrap">
		<video class="edgt-self-hosted-video" poster="<?php echo esc_url($media['video_cover']); ?>" preload="none">
			<?php if(!empty($media['video_url']['webm'])) { ?>
				<source type="video/webm" src="<?php echo esc_url($media['video_url']['webm']); ?>"> <?php } ?>
			<?php if(!empty($media['video_url']['mp4'])) { ?>
				<source type="video/mp4" src="<?php echo esc_url($media['video_url']['mp4']); ?>"> <?php } ?>
			<?php if(!empty($media['video_url']['ogv'])) { ?>
				<source type="video/ogg" src="<?php echo esc_url($media['video_url']['ogv']); ?>"> <?php } ?>
			<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>">
				<param name="movie" value="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>"/>
				<param name="flashvars" value="controls=true&file=<?php echo esc_url($media['video_url']['mp4']); ?>"/>
				<img src="<?php echo esc_url($media['video_cover']); ?>" width="1920" height="800" title="<?php esc_attr_e('No video playback capabilities', 'eldritch'); ?>" alt="<?php esc_attr_e('Video thumb', 'eldritch'); ?>"/>
			</object>
		</video>
	</div>
</div>