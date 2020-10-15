<?php get_header(); ?>

<div class="edgt-container edgt-404-page">
	<?php do_action('eldritch_edge_after_container_open'); ?>
	<div class="edgt-page-not-found">
        <div class="edgt-404-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/404.png') ?>"
                 alt="<?php esc_attr_e('404', 'eldritch'); ?>"/>
        </div>

		<h1 class="edgt-error-page-title">
			<?php if (eldritch_edge_options()->getOptionValue('404_title')) {
				echo esc_html(eldritch_edge_options()->getOptionValue('404_title'));
			} else {
				esc_html_e('Go Back To The Shadow!', 'eldritch');
			} ?>
		</h1>

        <div class="edgt-404-separator">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/separator.png') ?>"
                 alt="<?php esc_attr_e('404 separator', 'eldritch'); ?>"/>
        </div>

        <h5 class="edgt-error-page-subtitle">
            <?php if (eldritch_edge_options()->getOptionValue('404_subtitle')) {
                echo esc_html(eldritch_edge_options()->getOptionValue('404_subtitle'));
            } else {
                esc_html_e('The page you are looking for no longer exists. Perhaps you can return back to the site\'s 
                            homepage and see if you can find what you are looking for.', 'eldritch');
            } ?>
        </h5>

        <?php
        if (eldritch_edge_core_installed()) {
            $params = array('custom_class' => 'edgt-404-button');
            if (eldritch_edge_options()->getOptionValue('404_back_to_home')) {
                $params['text'] = eldritch_edge_options()->getOptionValue('404_back_to_home');
            } else {
                $params['text'] = esc_html__('Go Back', 'eldritch');
            }

            $params['type'] = 'white-outline';
            $params['hover_type'] = 'black';
            $params['hover_border_color'] = '#fff';
            $params['hover_animation'] = 'glow';
            $params['link'] = esc_url(home_url('/'));
            $params['target'] = '_self';
            echo eldritch_edge_execute_shortcode('edgt_button', $params);
        } ?>

	</div>
	<?php do_action('eldritch_edge_before_container_close'); ?>
</div>

<?php wp_footer(); ?>
