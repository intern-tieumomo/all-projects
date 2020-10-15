<?php do_action('eldritch_edge_before_top_navigation'); ?>
<div class="edgt-vertical-menu-outer">
	<nav data-navigation-type='float' class="edgt-vertical-menu edgt-vertical-dropdown-float">
		<?php
		wp_nav_menu(array(
			'theme_location'  => 'vertical-navigation',
			'container'       => '',
			'container_class' => '',
			'menu_class'      => '',
			'menu_id'         => '',
			'fallback_cb'     => 'top_navigation_fallback',
			'link_before'     => '<span>',
			'link_after'      => '</span>',
			'walker'          => new EldritchEdgeTopNavigationWalker()
		));
		?>
	</nav>
</div>
<?php do_action('eldritch_edge_after_top_navigation'); ?>