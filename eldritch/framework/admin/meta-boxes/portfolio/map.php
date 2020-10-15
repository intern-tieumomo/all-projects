<?php

if (!function_exists('eldritch_edge_portfolio_meta_box_map')) {
	function eldritch_edge_portfolio_meta_box_map() {

		$edgt_pages = array();
		$pages = get_pages();
		global $eldritch_Framework;

		foreach($pages as $page) {
			$edgt_pages[$page->ID] = $page->post_title;
		}

		//Portfolio Images

		$edgtPortfolioImages = new EldritchEdgeMetaBox("portfolio-item", esc_html__('Portfolio Images (multiple upload)','eldritch'), '', '', 'portfolio_images');
		$eldritch_Framework->edgtMetaBoxes->addMetaBox("portfolio_images",$edgtPortfolioImages);

		$edgt_portfolio_image_gallery = new EldritchEdgeMultipleImages("edgt_portfolio-image-gallery", esc_html__('Portfolio Images','eldritch'), esc_html('Choose your portfolio images','eldritch'));
		$edgtPortfolioImages->addChild("edgt_portfolio-image-gallery",$edgt_portfolio_image_gallery);

		//Portfolio Images/Videos 2

		$edgtPortfolioImagesVideos2 = new EldritchEdgeMetaBox("portfolio-item", esc_html__('Portfolio Images/Videos (single upload)','eldritch'));
		$eldritch_Framework->edgtMetaBoxes->addMetaBox("portfolio_images_videos2",$edgtPortfolioImagesVideos2);

		$edgt_portfolio_images_videos2 = new EldritchEdgeImagesVideosFramework(esc_html__('Portfolio Images/Videos 2', 'eldritch'),esc_html__('ThisIsDescription', 'eldritch'));
		$edgtPortfolioImagesVideos2->addChild("edgt_portfolio_images_videos2",$edgt_portfolio_images_videos2);

		//Portfolio Additional Sidebar Items

		$edgtAdditionalSidebarItems = new EldritchEdgeMetaBox("portfolio-item", esc_html__('Additional Portfolio Sidebar Items' , 'eldritch'));
		$eldritch_Framework->edgtMetaBoxes->addMetaBox("portfolio_properties",$edgtAdditionalSidebarItems);

		$edgt_portfolio_properties = new EldritchEdgeOptionsFramework(esc_html__('Portfolio Properties','eldritch'),esc_html__('ThisIsDescription','eldritch'));
		$edgtAdditionalSidebarItems->addChild("edgt_portfolio_properties",$edgt_portfolio_properties);

	}
	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_portfolio_meta_box_map');
}