<?php

if (!function_exists('eldritch_edge_social_options_map')) {

	function eldritch_edge_social_options_map() {

		eldritch_edge_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'eldritch'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = eldritch_edge_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Social Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow social share on networks of your choice', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_panel_social_networks, #edgt_panel_show_social_share_on'
			),
			'parent'        => $panel_social_share
		));

		$panel_show_social_share_on = eldritch_edge_add_admin_panel(array(
			'page'            => '_social_page',
			'name'            => 'panel_show_social_share_on',
			'title'           => esc_html__('Show Social Share On', 'eldritch'),
			'hidden_property' => esc_html__('enable_social_share', 'eldritch'),
			'hidden_value'    => 'no'
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_post',
			'default_value' => 'no',
			'label'         => esc_html__('Posts', 'eldritch'),
			'description'   => esc_html__('Show Social Share on Blog Posts', 'eldritch'),
			'parent'        => $panel_show_social_share_on
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_page',
			'default_value' => 'no',
			'label'         => esc_html__('Pages', 'eldritch'),
			'description'   => esc_html__('Show Social Share on Pages', 'eldritch'),
			'parent'        => $panel_show_social_share_on
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_attachment',
			'default_value' => 'no',
			'label'         => esc_html__('Media', 'eldritch'),
			'description'   => esc_html__('Show Social Share for Images and Videos', 'eldritch'),
			'parent'        => $panel_show_social_share_on
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_social_share_on_portfolio-item',
			'default_value' => 'no',
			'label'         => esc_html__('Portfolio Item', 'eldritch'),
			'description'   => esc_html__('Show Social Share for Portfolio Items', 'eldritch'),
			'parent'        => $panel_show_social_share_on
		));

		if (eldritch_edge_is_woocommerce_installed()) {
			eldritch_edge_add_admin_field(array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_product',
				'default_value' => 'no',
				'label'         => esc_html__('Product', 'eldritch'),
				'description'   => esc_html__('Show Social Share for Product Items', 'eldritch'),
				'parent'        => $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = eldritch_edge_add_admin_panel(array(
			'page'            => '_social_page',
			'name'            => 'panel_social_networks',
			'title'           => esc_html__('Social Networks', 'eldritch'),
			'hidden_property' => 'enable_social_share',
			'hidden_value'    => 'no'
		));

		/**
		 * Facebook
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'facebook_title',
			'title'  => esc_html__('Share on Facebook', 'eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_facebook_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via Facebook', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_facebook_share_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_facebook_share_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_facebook_share_container',
			'hidden_property' => 'enable_facebook_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'facebook_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'twitter_title',
			'title'  => esc_html__('Share on Twitter', 'eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_twitter_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via Twitter', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_twitter_share_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_twitter_share_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_twitter_share_container',
			'hidden_property' => 'enable_twitter_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'twitter_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_twitter_share_container
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'twitter_via',
			'default_value' => '',
			'label'         => esc_html__('Via', 'eldritch'),
			'parent'        => $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'google_plus_title',
			'title'  => esc_html__('Share on Google Plus', 'eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_google_plus_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via Google Plus', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_google_plus_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_google_plus_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_google_plus_container',
			'hidden_property' => 'enable_google_plus_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'google_plus_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'linkedin_title',
			'title'  => esc_html__('Share on LinkedIn', 'eldritch')
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_linkedin_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via LinkedIn', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_linkedin_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_linkedin_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_linkedin_container',
			'hidden_property' => 'enable_linkedin_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'linkedin_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'tumblr_title',
			'title'  => esc_html__('Share on Tumblr', 'eldritch')
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_tumblr_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via Tumblr', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_tumblr_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_tumblr_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_tumblr_container',
			'hidden_property' => 'enable_tumblr_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'tumblr_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'pinterest_title',
			'title'  => esc_html__('Share on Pinterest', 'eldritch'),
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_pinterest_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via Pinterest', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_pinterest_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_pinterest_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_pinterest_container',
			'hidden_property' => 'enable_pinterest_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'pinterest_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_pinterest_container
		));

		/**
		 * VK
		 */
		eldritch_edge_add_admin_section_title(array(
			'parent' => $panel_social_networks,
			'name'   => 'vk_title',
			'title'  => esc_html__('Share on VK', 'eldritch')
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'enable_vk_share',
			'default_value' => 'no',
			'label'         => esc_html__('Enable Share', 'eldritch'),
			'description'   => esc_html__('Enabling this option will allow sharing via VK', 'eldritch'),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_enable_vk_container'
			),
			'parent'        => $panel_social_networks
		));

		$enable_vk_container = eldritch_edge_add_admin_container(array(
			'name'            => 'enable_vk_container',
			'hidden_property' => 'enable_vk_share',
			'hidden_value'    => 'no',
			'parent'          => $panel_social_networks
		));

		eldritch_edge_add_admin_field(array(
			'type'          => 'image',
			'name'          => 'vk_icon',
			'default_value' => '',
			'label'         => esc_html__('Upload Icon', 'eldritch'),
			'parent'        => $enable_vk_container
		));

		if (defined('EDGE_TWITTER_FEED_VERSION')) {
			$twitter_panel = eldritch_edge_add_admin_panel(array(
				'title' => esc_html__('Twitter', 'eldritch'),
				'name'  => 'panel_twitter',
				'page'  => '_social_page'
			));

			eldritch_edge_add_admin_twitter_button(array(
				'name'   => 'twitter_button',
				'parent' => $twitter_panel
			));
		}

		if (defined('EDGE_INSTAGRAM_FEED_VERSION')) {
			$instagram_panel = eldritch_edge_add_admin_panel(array(
				'title' => esc_html__('Instagram', 'eldritch'),
				'name'  => 'panel_instagram',
				'page'  => '_social_page'
			));

			eldritch_edge_add_admin_instagram_button(array(
				'name'   => 'instagram_button',
				'parent' => $instagram_panel
			));
		}
	}

	add_action('eldritch_edge_options_map', 'eldritch_edge_social_options_map', 16);
}