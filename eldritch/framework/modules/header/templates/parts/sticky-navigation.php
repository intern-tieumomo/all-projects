<?php do_action('eldritch_edge_before_top_navigation'); ?>

	<nav class="edgt-main-menu edgt-drop-down <?php echo esc_attr($additional_class); ?>">
		<?php
		wp_nav_menu(array(
			'theme_location'  => 'main-navigation',
			'container'       => '',
			'container_class' => '',
			'menu_class'      => 'clearfix',
			'menu_id'         => '',
			'fallback_cb'     => 'top_navigation_fallback',
			'link_before'     => '<span>',
			'link_after'      => '</span>',
			'walker'          => new EldritchEdgeStickyNavigationWalker()
		));
		?>
	</nav>

<?php do_action('eldritch_edge_after_top_navigation'); ?>