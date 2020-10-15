<?php

if(!function_exists('eldritch_edge_register_top_header_areas')) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function eldritch_edge_register_top_header_areas() {
		$top_bar_layout = eldritch_edge_options()->getOptionValue('top_bar_layout');

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Left', 'eldritch'),
			'id'            => 'edgt-top-bar-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgt-top-bar-widget"><div class="edgt-top-bar-widget-inner">',
			'after_widget'  => '</div></div>',
			'description'   => esc_html__('Widgets added here will appear on the left side in the top bar header', 'eldritch')
		));

		//register this widget area only if top bar layout is three columns
		if($top_bar_layout === 'three-columns') {
			register_sidebar(array(
				'name'          => esc_html__('Top Bar Center', 'eldritch'),
				'id'            => 'edgt-top-bar-center',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgt-top-bar-widget"><div class="edgt-top-bar-widget-inner">',
				'after_widget'  => '</div></div>',
				'description'   => esc_html__('Widgets added here will appear on the center in the top bar header', 'eldritch')
			));
		}

		register_sidebar(array(
			'name'          => esc_html__('Top Bar Right', 'eldritch'),
			'id'            => 'edgt-top-bar-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgt-top-bar-widget"><div class="edgt-top-bar-widget-inner">',
			'after_widget'  => '</div></div>',
			'description'   => esc_html__('Widgets added here will appear on the right side in the top bar header', 'eldritch')
		));
	}

	add_action('widgets_init', 'eldritch_edge_register_top_header_areas');
}

if(!function_exists('eldritch_edge_header_standard_widget_areas')) {
	/**
	 * Registers widget areas for standard header type
	 */
	function eldritch_edge_header_standard_widget_areas() {

        register_sidebar(array(
            'name'          => esc_html__('Right From Logo', 'eldritch'),
            'id'            => 'edgt-right-from-logo',
            'before_widget' => '<div id="%1$s" class="widget %2$s edgt-right-from-logo-widget"><div class="edgt-right-from-logo-widget-inner">',
            'after_widget'  => '</div></div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the logo - Standard Extended header type only', 'eldritch')
        ));

        if( eldritch_edge_core_installed() ) {
			register_sidebar(array(
				'name' => esc_html__('Right From Main Menu', 'eldritch'),
				'id' => 'edgt-right-from-main-menu',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgt-right-from-main-menu-widget"><div class="edgt-right-from-main-menu-widget-inner">',
				'after_widget' => '</div></div>',
				'description' => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'eldritch')
			));
		}
	}

	add_action('widgets_init', 'eldritch_edge_header_standard_widget_areas');
}

if(!function_exists('eldritch_edge_header_vertical_widget_areas')) {
	/**
	 * Registers widget areas for vertical header
	 */
	function eldritch_edge_header_vertical_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Vertical Area', 'eldritch'),
            'id'            => 'edgt-vertical-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s edgt-vertical-area-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'eldritch')
        ));
	}

	add_action('widgets_init', 'eldritch_edge_header_vertical_widget_areas');
}

if(!function_exists('eldritch_edge_register_mobile_header_areas')) {
	/**
	 * Registers widget areas for mobile header
	 */
	function eldritch_edge_register_mobile_header_areas() {
		if(eldritch_edge_is_responsive_on()) {
			register_sidebar(array(
				'name'          => esc_html__('Right From Mobile Logo', 'eldritch'),
				'id'            => 'edgt-right-from-mobile-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgt-right-from-mobile-logo">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'eldritch')
			));
		}
	}
	add_action('widgets_init', 'eldritch_edge_register_mobile_header_areas');
}

if(!function_exists('eldritch_edge_register_sticky_header_areas')) {
	/**
	 * Registers widget area for sticky header
	 */
	function eldritch_edge_register_sticky_header_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Sticky Right', 'eldritch'),
            'id'            => 'edgt-sticky-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s edgt-sticky-right-widget"><div class="edgt-sticky-right-widget-inner">',
            'after_widget'  => '</div></div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'eldritch')
        ));
	}
	add_action('widgets_init', 'eldritch_edge_register_sticky_header_areas');
}