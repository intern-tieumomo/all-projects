<?php

if (!function_exists('eldritch_edge_blog_options_map')) {

	function eldritch_edge_blog_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__('Blog','eldritch'),
				'icon'  => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = eldritch_edge_get_custom_sidebars();

		$panel_blog_lists = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists','eldritch'),
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_list_type',
			'type'          => 'select',
			'label'         => esc_html__('Blog Layout for Archive Pages','eldritch'),
			'description'   => esc_html__('Choose a default blog layout','eldritch'),
			'default_value' => 'standard',
			'parent'        => $panel_blog_lists,
			'options'       => array(
				'standard'           => esc_html__('Blog: Standard','eldritch'),
				'masonry'            => esc_html__('Blog: Masonry','eldritch'),
				'masonry-full-width' => esc_html__('Blog: Masonry Full Width','eldritch'),
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar','eldritch'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists','eldritch'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'          => esc_html__('No Sidebar','eldritch'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right','eldritch'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right','eldritch'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left','eldritch'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left','eldritch'),
			)
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'archive_boxed_widgets',
			'type'          => 'yesno',
			'default_value' => 'yes',
			'label'         => esc_html__('Boxed Widgets','eldritch'),
			'parent'        => $panel_blog_lists
		));


		if (count($custom_sidebars) > 0) {
			eldritch_edge_add_admin_field(array(
				'name'        => 'blog_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','eldritch'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"','eldritch'),
				'parent'      => $panel_blog_lists,
				'options'     => eldritch_edge_get_custom_sidebars()
			));
		}

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'pagination',
				'default_value' => 'yes',
				'label'         => esc_html__('Pagination','eldritch'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List','eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_edgt_pagination_container'
				)
			)
		);

		$pagination_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'edgt_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_lists,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'parent'        => $pagination_container,
				'type'          => 'text',
				'name'          => 'blog_page_range',
				'default_value' => '',
				'label'         => esc_html__('Pagination Range limit','eldritch'),
				'description'   => esc_html__('Enter a number that will limit pagination to a certain range of links','eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_list_pagination',
			'type'          => 'select',
			'label'         => esc_html__('Pagination type','eldritch'),
			'description'   => esc_html__('Choose pagination for Blog lists','eldritch'),
			'parent'        => $pagination_container,
			'options'       => array(
				'standard'        => esc_html__('Standard','eldritch'),
				'load_more'       => esc_html__('Load More','eldritch'),
				'infinite_scroll' => esc_html__('Infinite scroll','eldritch'),
			),
			'default_value' => 'standard'
		));

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'masonry_filter',
				'default_value' => 'no',
				'label'         => esc_html__('Masonry Filter','eldritch'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates','eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		eldritch_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '',
				'label'         => esc_html__('Number of Words in Excerpt','eldritch'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		eldritch_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'standard_number_of_chars',
				'default_value' => '45',
				'label'         => esc_html__('Standard Type Number of Words in Excerpt','eldritch'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		eldritch_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'masonry_number_of_chars',
				'default_value' => '45',
				'label'         => esc_html__('Masonry Type Number of Words in Excerpt','eldritch'),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__('Enter a number of words in excerpt (article summary)','eldritch'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = eldritch_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__('Blog Single','eldritch'),
			)
		);

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_single_type',
			'type'          => 'select',
			'label'         => esc_html__('Blog Single Type','eldritch'),
			'description'   => esc_html__('Choose a layout type for Blog Single pages','eldritch'),
			'parent'        => $panel_blog_single,
			'options'       => array(
				'standard'    => esc_html__('Standard','eldritch'),
				'image-title' => esc_html__('Image Title','eldritch')
			),
			'default_value' => 'standard'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_single_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout','eldritch'),
			'description'   => esc_html__('Choose a sidebar layout for Blog Single pages','eldritch'),
			'parent'        => $panel_blog_single,
			'options'       => array(
				'default'          => esc_html__('No Sidebar','eldritch'),
				'sidebar-33-right' => esc_html__('Sidebar 1/3 Right','eldritch'),
				'sidebar-25-right' => esc_html__('Sidebar 1/4 Right','eldritch'),
				'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left','eldritch'),
				'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left','eldritch'),
			),
			'default_value' => 'default'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_single_boxed_widgets',
			'type'          => 'yesno',
			'default_value' => 'yes',
			'label'         => esc_html__('Boxed Widgets','eldritch'),
			'parent'        => $panel_blog_single
		));

		if (count($custom_sidebars) > 0) {
			eldritch_edge_add_admin_field(array(
				'name'        => 'blog_single_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__('Sidebar to Display','eldritch'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"','eldritch'),
				'parent'      => $panel_blog_single,
				'options'     => eldritch_edge_get_custom_sidebars()
			));
		}

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area','eldritch'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages','eldritch'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','eldritch'),
			'description'   => esc_html__('Enabling this option will show comments on your page.','eldritch'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		eldritch_edge_add_admin_field(array(
			'name'          => 'blog_single_related_posts',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Related Posts','eldritch'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.','eldritch'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Prev/Next Single Post Navigation Links','eldritch'),
				'parent'        => $panel_blog_single,
				'description'   => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)','eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_edgt_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'edgt_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Navigation Only in Current Category','eldritch'),
				'description'   => esc_html__('Limit your navigation only through current category','eldritch'),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'blog_enable_single_tags',
			'default_value' => 'yes',
			'label'         => esc_html__('Enable Tags on Single Post','eldritch'),
			'description'   => esc_html__('Enabling this option will display posts\s tags on single post page','eldritch'),
			'parent'        => $panel_blog_single
		));


		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'no',
				'label'         => esc_html__('Show Author Info Box','eldritch'),
				'parent'        => $panel_blog_single,
				'description'   => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages','eldritch'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgt_edgt_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = eldritch_edge_add_admin_container(
			array(
				'name'            => 'edgt_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);

		eldritch_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__('Show Author Email','eldritch'),
				'description'   => esc_html__('Enabling this option will show author email','eldritch'),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_blog_options_map', 12);

}











