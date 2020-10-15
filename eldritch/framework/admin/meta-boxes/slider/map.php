<?php

//Slider

if (!function_exists('eldritch_edge_slider_meta_box_map')) {
	function eldritch_edge_slider_meta_box_map() {

		global $eldritch_options_fontstyle;
		global $eldritch_options_fontweight;
		global $eldritch_options_texttransform;
		global $eldritch_IconCollections;

		$slider_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Background Type', 'eldritch'),
				'name'  => 'slides_type'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_background_type',
				'type'          => 'imagevideo',
				'default_value' => 'image',
				'label'         => esc_html__('Slide Background Type', 'eldritch'),
				'description'   => esc_html__('Do you want to upload an image or video?', 'eldritch'),
				'parent'        => $slider_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt-meta-box-edgt_slides_video_settings",
					"dependence_show_on_yes" => "#edgt-meta-box-edgt_slides_image_settings"
				)
			)
		);


		//Slide Image

		$slider_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope'           => array('slides'),
				'title'           => esc_html__('Slide Background Image', 'eldritch'),
				'name'            => 'edgt_slides_image_settings',
				'hidden_property' => 'edgt_slide_background_type',
				'hidden_values'   => array('video')
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_image',
				'type'        => 'image',
				'label'       => esc_html__('Slide Image', 'eldritch'),
				'description' => esc_html__('Choose background image', 'eldritch'),
				'parent'      => $slider_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_overlay_image',
				'type'        => 'image',
				'label'       => esc_html__('Overlay Image', 'eldritch'),
				'description' => esc_html__('Choose overlay image (pattern) for background image', 'eldritch'),
				'parent'      => $slider_meta_box
			)
		);


		//Slide Video

		$video_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope'           => array('slides'),
				'title'           => esc_html__('Slide Background Video', 'eldritch'),
				'name'            => 'edgt_slides_video_settings',
				'hidden_property' => 'edgt_slide_background_type',
				'hidden_values'   => array('image')
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_video_webm',
				'type'        => 'text',
				'label'       => esc_html__('Video - webm', 'eldritch'),
				'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'eldritch'),
				'parent'      => $video_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_video_mp4',
				'type'        => 'text',
				'label'       => esc_html__('Video - mp4', 'eldritch'),
				'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'eldritch'),
				'parent'      => $video_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_video_ogv',
				'type'        => 'text',
				'label'       => esc_html__('Video - ogv', 'eldritch'),
				'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'eldritch'),
				'parent'      => $video_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_video_image',
				'type'        => 'image',
				'label'       => esc_html__('Video Preview Image', 'eldritch'),
				'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'eldritch'),
				'parent'      => $video_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_video_overlay',
				'type'          => 'yesempty',
				'default_value' => '',
				'label'         => esc_html__('Video Overlay Image', 'eldritch'),
				'description'   => esc_html__('Do you want to have a overlay image on video?', 'eldritch'),
				'parent'        => $video_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_edgt_slide_video_overlay_container"
				)
			)
		);

		$slide_video_overlay_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_video_overlay_container',
			'parent'          => $video_meta_box,
			'hidden_property' => 'edgt_slide_video_overlay',
			'hidden_values'   => array('', 'no')
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_video_overlay_image',
				'type'        => 'image',
				'label'       => esc_html__('Overlay Image', 'eldritch'),
				'description' => esc_html__('Choose overlay image (pattern) for background video.', 'eldritch'),
				'parent'      => $slide_video_overlay_container
			)
		);


		//Slide General

		$general_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide General', 'eldritch'),
				'name'  => 'edgt_slides_general_settings'
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $general_meta_box,
				'name'   => 'edgt_text_content_title',
				'title'  => esc_html__('Slide Text Content', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_hide_title',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Hide Slide Title', 'eldritch'),
				'description'   => esc_html__('Do you want to hide slide title?', 'eldritch'),
				'parent'        => $general_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt_edgt_slide_hide_title_container, #edgt-meta-box-edgt_slides_title",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$slide_hide_title_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_hide_title_container',
			'parent'          => $general_meta_box,
			'hidden_property' => 'edgt_slide_hide_title',
			'hidden_value'    => 'yes'
		));

		$group_title_link = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Title Link', 'eldritch'),
			'name'        => 'group_title_link',
			'description' => esc_html__('Define styles for title', 'eldritch'),
			'parent'      => $slide_hide_title_container
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_title_link
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_link',
				'type'   => 'textsimple',
				'label'  => esc_html__('Link', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $row1,
				'type'          => 'selectsimple',
				'name'          => 'edgt_slide_title_target',
				'default_value' => '_self',
				'label'         => esc_html__('Target', 'eldritch'),
				'options'       => array(
					"_self"  => esc_html__("Self", 'eldritch'),
					"_blank" => esc_html__("Blank", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_subtitle',
				'type'        => 'text',
				'label'       => esc_html__('Subtitle Text', 'eldritch'),
				'description' => esc_html__('Enter text for subtitle', 'eldritch'),
				'parent'      => $general_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_text',
				'type'        => 'text',
				'label'       => esc_html__('Body Text', 'eldritch'),
				'description' => esc_html__('Enter slide body text', 'eldritch'),
				'parent'      => $general_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_button_label',
				'type'        => 'text',
				'label'       => esc_html__('Button 1 Text', 'eldritch'),
				'description' => esc_html__('Enter text to be displayed on button 1', 'eldritch'),
				'parent'      => $general_meta_box
			)
		);

		$group_button1 = eldritch_edge_add_admin_group(array(
			'title'  => esc_html__('Button 1 Link', 'eldritch'),
			'name'   => 'group_button1',
			'parent' => $general_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_button1
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_button_link',
				'type'          => 'textsimple',
				'label'         => esc_html__('Link', 'eldritch'),
				'default_value' => '',
				'parent'        => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $row1,
				'type'          => 'selectsimple',
				'name'          => 'edgt_slide_button_target',
				'default_value' => '_self',
				'label'         => esc_html__('Target', 'eldritch'),
				'options'       => array(
					"_self"  => esc_html__("Self", 'eldritch'),
					"_blank" => esc_html__("Blank", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_button_label2',
				'type'        => 'text',
				'label'       => esc_html__('Button 2 Text', 'eldritch'),
				'description' => esc_html__('Enter text to be displayed on button 2', 'eldritch'),
				'parent'      => $general_meta_box
			)
		);

		$group_button2 = eldritch_edge_add_admin_group(array(
			'title'  => esc_html__('Button 2 Link', 'eldritch'),
			'name'   => 'group_button2',
			'parent' => $general_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_button2
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_button_link2',
				'type'          => 'textsimple',
				'default_value' => '',
				'label'         => esc_html__('Link', 'eldritch'),
				'parent'        => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $row1,
				'type'          => 'selectsimple',
				'name'          => 'edgt_slide_button_target2',
				'default_value' => '_self',
				'label'         => esc_html__('Target', 'eldritch'),
				'options'       => array(
					"_self"  => esc_html__("Self", 'eldritch'),
					"_blank" => esc_html__("Blank", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_text_content_top_margin',
				'type'        => 'text',
				'label'       => esc_html__('Text Content Top Margin', 'eldritch'),
				'description' => esc_html__('Enter top margin for text content', 'eldritch'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_text_content_bottom_margin',
				'type'        => 'text',
				'label'       => esc_html__('Text Content Bottom Margin', 'eldritch'),
				'description' => esc_html__('Enter bottom margin for text content', 'eldritch'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $general_meta_box,
				'name'   => 'edgt_graphic_title',
				'title'  => esc_html__('Slide Graphic', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_thumbnail',
				'type'        => 'image',
				'label'       => esc_html__('Slide Graphic', 'eldritch'),
				'description' => esc_html__('Choose slide graphic', 'eldritch'),
				'parent'      => $general_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_thumbnail_link',
				'type'        => 'text',
				'label'       => esc_html__('Graphic Link', 'eldritch'),
				'description' => esc_html__('Enter URL to link slide graphic', 'eldritch'),
				'parent'      => $general_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_graphic_top_padding',
				'type'        => 'text',
				'label'       => esc_html__('Graphic Top Padding', 'eldritch'),
				'description' => esc_html__('Enter top padding for slide graphic', 'eldritch'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_graphic_bottom_padding',
				'type'        => 'text',
				'label'       => esc_html__('Graphic Bottom Padding', 'eldritch'),
				'description' => esc_html__('Enter bottom padding for slide graphic', 'eldritch'),
				'parent'      => $general_meta_box,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $general_meta_box,
				'name'   => 'edgt_general_styling_title',
				'title'  => esc_html__('General Styling', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $general_meta_box,
				'type'          => 'selectblank',
				'name'          => 'edgt_slide_header_style',
				'default_value' => '',
				'label'         => esc_html__('Header Style', 'eldritch'),
				'description'   => esc_html__('Header style will be applied when this slide is in focus', 'eldritch'),
				'options'       => array(
					"light" => esc_html__("Light", 'eldritch'),
					"dark"  => esc_html__("Dark", 'eldritch'),
				)
			)
		);

		//Slide Behaviour

		$behaviours_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Behaviours', 'eldritch'),
				'name'  => 'edgt_slides_behaviour_settings'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_scroll_to_section',
				'type'        => 'text',
				'label'       => esc_html__('Scroll to Section', 'eldritch'),
				'description' => esc_html__('An arrow will appear to take viewers to the next section of the page. Enter the section anchor here, for example, "#contact\"', 'eldritch'),
				'parent'      => $behaviours_meta_box
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_scroll_to_section_position',
				'type'        => 'select',
				'label'       => esc_html__('Scroll to Section Icon Position', 'eldritch'),
				'description' => esc_html__('Choose position for anchor icon - scroll to section', 'eldritch'),
				'parent'      => $behaviours_meta_box,
				'options'     => array(
					"in_content"       => esc_html__("In Text Content", 'eldritch'),
					"bottom_of_slider" => esc_html__("Bottom of the slide", 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $behaviours_meta_box,
				'name'   => 'edgt_image_animation_title',
				'title'  => esc_html__('Slide Image Animation', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_enable_image_animation',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Image Animation', 'eldritch'),
				'description'   => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'eldritch'),
				'parent'        => $behaviours_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgt_edgt_enable_image_animation_container"
				)
			)
		);

		$enable_image_animation_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_enable_image_animation_container',
			'parent'          => $behaviours_meta_box,
			'hidden_property' => 'edgt_enable_image_animation',
			'hidden_value'    => 'no'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $enable_image_animation_container,
				'type'          => 'select',
				'name'          => 'edgt_enable_image_animation_type',
				'default_value' => 'zoom_center',
				'label'         => esc_html__('Animation Type', 'eldritch'),
				'options'       => array(
					"zoom_center"       => esc_html__("Zoom In Center", 'eldritch'),
					"zoom_top_left"     => esc_html__("Zoom In to Top Left", 'eldritch'),
					"zoom_top_right"    => esc_html__("Zoom In to Top Right", 'eldritch'),
					"zoom_bottom_left"  => esc_html__("Zoom In to Bottom Left", 'eldritch'),
					"zoom_bottom_right" => esc_html__("Zoom In to Bottom Right", 'eldritch'),
				)
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $behaviours_meta_box,
				'name'   => 'edgt_content_animation_title',
				'title'  => esc_html__('Slide Content Entry Animations', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $behaviours_meta_box,
				'type'          => 'select',
				'name'          => 'edgt_slide_thumbnail_animation',
				'default_value' => 'flip',
				'label'         => esc_html__('Graphic Entry Animation', 'eldritch'),
				'description'   => esc_html__('Choose entry animation for graphic', 'eldritch'),
				'options'       => array(
					"flip"              => esc_html__("Flip", 'eldritch'),
					"fade"              => esc_html__("Fade In", 'eldritch'),
					"from_bottom"       => esc_html__("From Bottom", 'eldritch'),
					"from_top"          => esc_html__("From Top", 'eldritch'),
					"from_left"         => esc_html__("From Left", 'eldritch'),
					"from_right"        => esc_html__("From Right", 'eldritch'),
					"clip_anim_hor"     => esc_html__("Clip Animation Horizontal", 'eldritch'),
					"clip_anim_ver"     => esc_html__("Clip Animation Vertical", 'eldritch'),
					"clip_anim_puzzle"  => esc_html__("Clip Animation Puzzle", 'eldritch'),
					"without_animation" => esc_html__("No Animation", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $behaviours_meta_box,
				'type'          => 'select',
				'name'          => 'edgt_slide_content_animation',
				'default_value' => 'all_at_once',
				'label'         => esc_html__('Content Entry Animation', 'eldritch'),
				'description'   => esc_html__('Choose entry animation for whole slide content group (title, subtitle, text, button)', 'eldritch'),
				'options'       => array(
					"all_at_once"       => esc_html__("All At Once", 'eldritch'),
					"one_by_one"        => esc_html__("One By One", 'eldritch'),
					"without_animation" => esc_html__("No Animation", 'eldritch'),
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"all_at_once"       => "",
						"one_by_one"        => "",
						"without_animation" => "#edgt_edgt_slide_content_animation_container"
					),
					"show"       => array(
						"all_at_once"       => "#edgt_edgt_slide_content_animation_container",
						"one_by_one"        => "#edgt_edgt_slide_content_animation_container",
						"without_animation" => ""
					)
				)
			)
		);

		$slide_content_animation_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_content_animation_container',
			'parent'          => $behaviours_meta_box,
			'hidden_property' => 'edgt_slide_content_animation',
			'hidden_value'    => 'without_animation'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $slide_content_animation_container,
				'type'          => 'select',
				'name'          => 'edgt_slide_content_animation_direction',
				'default_value' => 'from_bottom',
				'label'         => esc_html__('Animation Direction', 'eldritch'),
				'options'       => array(
					"from_bottom" => esc_html__("From Bottom", 'eldritch'),
					"from_top"    => esc_html__("From Top", 'eldritch'),
					"from_left"   => esc_html__("From Left", 'eldritch'),
					"from_right"  => esc_html__("From Right", 'eldritch'),
					"fade"        => esc_html__("Fade In", 'eldritch'),
				)
			)
		);

		//Slide Title Styles

		$title_style_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope'           => array('slides'),
				'title'           => esc_html__('Slide Title Style', 'eldritch'),
				'name'            => 'edgt_slides_title',
				'hidden_property' => 'edgt_slide_hide_title',
				'hidden_values'   => array('yes')
			)
		);

		$title_text_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Title Text Style', 'eldritch'),
			'description' => esc_html__('Define styles for title text', 'eldritch'),
			'name'        => 'edgt_title_text_group',
			'parent'      => $title_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Font Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Font Size (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__('Line Height (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_letter_spacing',
				'type'   => 'textsimple',
				'label'  => esc_html__('Letter Spacing (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		$row2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $title_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_font_family',
				'type'   => 'fontsimple',
				'label'  => esc_html__('Font Family', 'eldritch'),
				'parent' => $row2
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_title_font_style',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Style', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_fontstyle
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_title_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_fontweight
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_title_text_transform',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Text Transform', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_texttransform
			)
		);

		$title_background_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Background', 'eldritch'),
			'description' => esc_html__('Define background for title', 'eldritch'),
			'name'        => esc_html__('edgt_title_background_group', 'eldritch'),
			'parent'      => $title_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_background_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_bg_color_transparency',
				'type'   => 'textsimple',
				'label'  => esc_html__('Background Color Transparency (values 0-1)', 'eldritch'),
				'parent' => $row1
			)
		);

		$title_margin_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Margin Bottom (px)', 'eldritch'),
			'description' => esc_html__('Enter value for title bottom margin (default value is 14)', 'eldritch'),
			'name'        => 'edgt_title_margin_group',
			'parent'      => $title_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_margin_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_margin_bottom',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);

		$title_padding_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Padding', 'eldritch'),
			'description' => esc_html__('Define padding for title', 'eldritch'),
			'name'        => 'edgt_title_padding_group',
			'parent'      => $title_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_padding_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_padding_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('Top Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_padding_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('Right Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_padding_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('Bottom Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_padding_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('Left Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		$slide_title_border = eldritch_edge_create_meta_box_field(array(
			'label'         => esc_html__('Border', 'eldritch'),
			'description'   => esc_html__('Do you want to have a title border?', 'eldritch'),
			'name'          => 'edgt_slide_title_border',
			'type'          => 'yesno',
			'default_value' => 'no',
			'parent'        => $title_style_meta_box,
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgt_edgt_title_border_container'
			)
		));

		$title_border_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_title_border_container',
			'parent'          => $title_style_meta_box,
			'hidden_property' => 'edgt_slide_title_border',
			'hidden_value'    => 'no'
		));

		$title_border_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Title Border', 'eldritch'),
			'description' => esc_html__('Define border for title', 'eldritch'),
			'name'        => 'edgt_title_border_group',
			'parent'      => $title_border_container
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $title_border_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_title_border_thickness',
				'type'   => 'textsimple',
				'label'  => esc_html__('Thickness (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_title_border_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__('Style', 'eldritch'),
				'parent'  => $row1,
				'options' => array(
					"solid"  => esc_html__("solid", 'eldritch'),
					"dashed" => esc_html__("dashed", 'eldritch'),
					"dotted" => esc_html__("dotted", 'eldritch'),
					"double" => esc_html__("double", 'eldritch'),
					"groove" => esc_html__("groove", 'eldritch'),
					"ridge"  => esc_html__("ridge", 'eldritch'),
					"inset"  => esc_html__("inset", 'eldritch'),
					"outset" => esc_html__("outset", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slider_title_border_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Color', 'eldritch'),
				'parent' => $row1
			)
		);

		//Slide Subtitle Styles

		$subtitle_style_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Subtitle Style', 'eldritch'),
				'name'  => 'edgt_slides_subtitle'
			)
		);

		$subtitle_text_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Subtitle Text Style', 'eldritch'),
			'description' => esc_html__('Define styles for subtitle text', 'eldritch'),
			'name'        => 'edgt_subtitle_text_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Font Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Font Size (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__('Line Height (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_letter_spacing',
				'type'   => 'textsimple',
				'label'  => esc_html__('Letter Spacing (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		$row2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $subtitle_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_font_family',
				'type'   => 'fontsimple',
				'label'  => esc_html__('Font Family', 'eldritch'),
				'parent' => $row2
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_subtitle_font_style',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Style', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_fontstyle
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_subtitle_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_fontweight
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_subtitle_text_transform',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Text Transform', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_texttransform
			)
		);

		$subtitle_background_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Background', 'eldritch'),
			'description' => esc_html__('Define background for subtitle', 'eldritch'),
			'name'        => 'edgt_subtitle_background_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_background_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_bg_color_transparency',
				'type'   => 'textsimple',
				'label'  => esc_html__('Background Color Transparency (values 0-1)', 'eldritch'),
				'parent' => $row1
			)
		);

		$subtitle_margin_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Margin Bottom (px)', 'eldritch'),
			'description' => esc_html__('Enter value for subtitle bottom margin (default value is 14)', 'eldritch'),
			'name'        => 'edgt_subtitle_margin_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_margin_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_margin_bottom',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);

		$subtitle_padding_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Padding', 'eldritch'),
			'description' => esc_html__('Define padding for subtitle', 'eldritch'),
			'name'        => 'edgt_subtitle_padding_group',
			'parent'      => $subtitle_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $subtitle_padding_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_padding_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('Top Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_padding_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('Right Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_padding_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('Bottom Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_subtitle_padding_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('Left Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		//Slide Text Styles

		$text_style_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Text Style', 'eldritch'),
				'name'  => 'edgt_slides_text'
			)
		);

		$text_common_text_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Text Color and Size', 'eldritch'),
			'description' => esc_html__('Define text color and size', 'eldritch'),
			'name'        => 'edgt_text_common_text_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_common_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Font Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Font Size (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__('Line Height (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		$text_without_separator_padding_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Padding', 'eldritch'),
			'description' => esc_html__('Define padding for text', 'eldritch'),
			'name'        => 'edgt_text_without_separator_padding_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_without_separator_padding_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_padding_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('Top Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_padding_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('Right Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_padding_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('Bottom Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_padding_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('Left Padding (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		$text_without_separator_text_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Text Style', 'eldritch'),
			'description' => esc_html__('Define styles for slide text', 'eldritch'),
			'name'        => 'edgt_text_without_separator_text_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_without_separator_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_letter_spacing',
				'type'   => 'textsimple',
				'label'  => esc_html__('Letter Spacing (px)', 'eldritch'),
				'parent' => $row1
			)
		);

		$row2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $text_without_separator_text_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_font_family',
				'type'   => 'fontsimple',
				'label'  => esc_html__('Font Family', 'eldritch'),
				'parent' => $row2
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_text_font_style',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Style', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_fontstyle
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_text_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_fontweight
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_text_text_transform',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Text Transform', 'eldritch'),
				'parent'  => $row2,
				'options' => $eldritch_options_texttransform
			)
		);

		$text_without_separator_background_group = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Background', 'eldritch'),
			'description' => esc_html__('Define background for text', 'eldritch'),
			'name'        => 'edgt_text_without_separator_background_group',
			'parent'      => $text_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $text_without_separator_background_group
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_bg_color_transparency',
				'type'   => 'textsimple',
				'label'  => esc_html__('Background Color Transparency (values 0-1)', 'eldritch'),
				'parent' => $row1
			)
		);

		//Slide Buttons Styles

		$buttons_style_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Buttons Style', 'eldritch'),
				'name'  => 'edgt_slides_buttons'
			)
		);

		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $buttons_style_meta_box,
				'name'   => 'edgt_button_1_styling_title',
				'title'  => esc_html__('Button 1', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_button_size',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Size', 'eldritch'),
				'description'   => esc_html__('Choose button size', 'eldritch'),
				'default_value' => '',
				'options'       => array(
					""                => esc_html__("Default", 'eldritch'),
					"small"           => esc_html__("Small", 'eldritch'),
					"medium"          => esc_html__("Medium", 'eldritch'),
					"large"           => esc_html__("Large", 'eldritch'),
					"huge"            => esc_html__("Extra Large", 'eldritch'),
					"huge-full-width" => esc_html__("Extra Large Full Width", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_button_type',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Type', 'eldritch'),
				'description'   => esc_html__('Choose button type', 'eldritch'),
				'default_value' => '',
				'options'       => array(
					""        => esc_html__("Default", 'eldritch'),
					"outline" => esc_html__("Outline", 'eldritch'),
					"solid"   => esc_html__("Solid", 'eldritch'),
				)
			)
		);

		$buttons_style_group_1 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Text Style', 'eldritch'),
			'description' => esc_html__('Define text style', 'eldritch'),
			'name'        => 'edgt_buttons_style_group_1',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_1
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__('Text Size(px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_button_font_weight',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'eldritch'),
				'parent'  => $row1,
				'options' => $eldritch_options_fontweight
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Hover Color', 'eldritch'),
				'parent' => $row1
			)
		);

		$buttons_style_group_2 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Background', 'eldritch'),
			'description' => esc_html__('Define background', 'eldritch'),
			'name'        => 'edgt_buttons_style_group_2',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_2
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_background_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Hover Color', 'eldritch'),
				'parent' => $row1
			)
		);


		$buttons_style_group_4 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Border', 'eldritch'),
			'description' => esc_html__('Define border style', 'eldritch'),
			'name'        => 'edgt_buttons_style_group_4',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_4
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_border_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_border_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Hover Color', 'eldritch'),
				'parent' => $row1
			)
		);

		$buttons_style_group_5 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Margin (px)', 'eldritch'),
			'description' => esc_html__('Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px', 'eldritch'),
			'name'        => 'edgt_buttons_style_group_5',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons_style_group_5
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_margin1',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);

		//init icon pack hide and show array. It will be populated dinamically from collections array
		$button1_icon_pack_hide_array = array();
		$button1_icon_pack_show_array = array();

		//do we have some collection added in collections array?
		if (is_array($eldritch_IconCollections->iconCollections) && count($eldritch_IconCollections->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$button1_icon_collections_params = $eldritch_IconCollections->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach ($eldritch_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
				$button1_icon_pack_hide_array[$dep_collection_key] = '';
				$button1_icon_pack_hide_array["no_icon"] = "";

				//button1_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
				$button1_icon_pack_hide_array["no_icon"] .= "#edgt_slider_button1_icon_size,";

				//we need to include only current collection in show string as it is the only one that needs to show
				$button1_icon_pack_show_array[$dep_collection_key] = '#edgt_slider_button1_icon_size, #edgt_button1_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($button1_icon_collections_params as $button1_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($button1_icon_collections_param !== $dep_collection_object->param) {
						$button1_icon_pack_hide_array[$dep_collection_key] .= '#edgt_button1_icon_' . $button1_icon_collections_param . '_container,';
					}

					$button1_icon_pack_hide_array["no_icon"] .= '#edgt_button1_icon_' . $button1_icon_collections_param . '_container,';
				}

				//remove remaining ',' character
				$button1_icon_pack_hide_array[$dep_collection_key] = rtrim($button1_icon_pack_hide_array[$dep_collection_key], ',');
				$button1_icon_pack_hide_array["no_icon"] = rtrim($button1_icon_pack_hide_array["no_icon"], ',');
			}

		}

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_button1_icon_pack',
				'type'          => 'select',
				'label'         => esc_html__('Button 1 Icon Pack', 'eldritch'),
				'description'   => esc_html__('Choose icon pack for the first button', 'eldritch'),
				'default_value' => 'no_icon',
				'parent'        => $buttons_style_meta_box,
				'options'       => $eldritch_IconCollections->getIconCollectionsEmpty("no_icon"),
				'args'          => array(
					"dependence" => true,
					"hide"       => $button1_icon_pack_hide_array,
					"show"       => $button1_icon_pack_show_array
				)
			)
		);


		if (is_array($eldritch_IconCollections->iconCollections) && count($eldritch_IconCollections->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach ($eldritch_IconCollections->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = $eldritch_IconCollections->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$button1_icon_hide_values = $icon_collections_keys;
				$button1_icon_hide_values[] = "no_icon";
				$button1_icon_container = eldritch_edge_add_admin_container(array(
					'name'            => "button1_icon_" . $collection_object->param . "_container",
					'parent'          => $buttons_style_meta_box,
					'hidden_property' => 'edgt_button1_icon_pack',
					'hidden_value'    => '',
					'hidden_values'   => $button1_icon_hide_values
				));

				eldritch_edge_create_meta_box_field(
					array(
						'name'    => "button1_icon_" . $collection_object->param,
						'type'    => 'select',
						'label'   => esc_html__('Button 1 Icon', 'eldritch'),
						'parent'  => $button1_icon_container,
						'options' => $icons_array
					)
				);
			}

		}


		eldritch_edge_add_admin_section_title(
			array(
				'parent' => $buttons_style_meta_box,
				'name'   => 'edgt_button_2_styling_title',
				'title'  => esc_html__('Button 2', 'eldritch'),
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_button_size2',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Size', 'eldritch'),
				'description'   => esc_html__('Choose button size', 'eldritch'),
				'default_value' => '',
				'options'       => array(
					""                => esc_html__("Default", 'eldritch'),
					"small"           => esc_html__("Small", 'eldritch'),
					"medium"          => esc_html__("Medium", 'eldritch'),
					"large"           => esc_html__("Large", 'eldritch'),
					"huge"            => esc_html__("Extra Large", 'eldritch'),
					"huge-full-width" => esc_html__("Extra Large Full Width", 'eldritch'),
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_button_type2',
				'type'          => 'selectblank',
				'parent'        => $buttons_style_meta_box,
				'label'         => esc_html__('Type', 'eldritch'),
				'description'   => esc_html__('Choose button type', 'eldritch'),
				'default_value' => '',
				'options'       => array(
					""        => esc_html__("Default", 'eldritch'),
					"outline" => esc_html__("Outline", 'eldritch'),
					"solid"   => esc_html__("Solid", 'eldritch'),
				)
			)
		);

		$buttons2_style_group_1 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Text Style', 'eldritch'),
			'description' => esc_html__('Define text style', 'eldritch'),
			'name'        => 'edgt_buttons2_style_group_1',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_1
		));
		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_font_size2',
				'type'   => 'textsimple',
				'label'  => esc_html__('Text Size(px)', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'    => 'edgt_slide_button_font_weight2',
				'type'    => 'selectblanksimple',
				'label'   => esc_html__('Font Weight', 'eldritch'),
				'parent'  => $row1,
				'options' => $eldritch_options_fontweight
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_text_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_text_hover_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Text Hover Color', 'eldritch'),
				'parent' => $row1
			)
		);

		$buttons2_style_group_2 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Background', 'eldritch'),
			'description' => esc_html__('Define background', 'eldritch'),
			'name'        => 'edgt_buttons2_style_group_2',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_2
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_background_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_background_hover_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Background Hover Color', 'eldritch'),
				'parent' => $row1
			)
		);

		$buttons2_style_group_4 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Border', 'eldritch'),
			'description' => esc_html__('Define border style', 'eldritch'),
			'name'        => 'edgt_buttons2_style_group_4',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_4
		));


		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_border_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Color', 'eldritch'),
				'parent' => $row1
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_border_hover_color2',
				'type'   => 'colorsimple',
				'label'  => esc_html__('Border Hover Color', 'eldritch'),
				'parent' => $row1
			)
		);

		$buttons2_style_group_5 = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Margin (px)', 'eldritch'),
			'description' => esc_html__('Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px', 'eldritch'),
			'name'        => 'edgt_buttons2_style_group_5',
			'parent'      => $buttons_style_meta_box
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $buttons2_style_group_5
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_button_margin2',
				'type'   => 'textsimple',
				'label'  => '',
				'parent' => $row1
			)
		);
		//init icon pack hide and show array. It will be populated dinamically from collections array
		$button2_icon_pack_hide_array = array();
		$button2_icon_pack_show_array = array();

		//do we have some collection added in collections array?
		if (is_array($eldritch_IconCollections->iconCollections) && count($eldritch_IconCollections->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$button2_icon_collections_params = $eldritch_IconCollections->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach ($eldritch_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
				$button2_icon_pack_hide_array[$dep_collection_key] = '';
				$button2_icon_pack_hide_array["no_icon"] = "";

				//button2_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
				$button2_icon_pack_hide_array["no_icon"] .= "#edgt_slider_button2_icon_size,";

				//we need to include only current collection in show string as it is the only one that needs to show
				$button2_icon_pack_show_array[$dep_collection_key] = '#edgt_slider_button2_icon_size, #edgt_button2_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($button2_icon_collections_params as $button2_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($button2_icon_collections_param !== $dep_collection_object->param) {
						$button2_icon_pack_hide_array[$dep_collection_key] .= '#edgt_button2_icon_' . $button2_icon_collections_param . '_container,';
					}

					$button2_icon_pack_hide_array["no_icon"] .= '#edgt_button2_icon_' . $button2_icon_collections_param . '_container,';
				}

				//remove remaining ',' character
				$button2_icon_pack_hide_array[$dep_collection_key] = rtrim($button2_icon_pack_hide_array[$dep_collection_key], ',');
				$button2_icon_pack_hide_array["no_icon"] = rtrim($button2_icon_pack_hide_array["no_icon"], ',');
			}

		}

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_button2_icon_pack',
				'type'          => 'select',
				'label'         => esc_html__('Button 2 Icon Pack', 'eldritch'),
				'description'   => esc_html__('Choose icon pack for the first button', 'eldritch'),
				'default_value' => 'no_icon',
				'parent'        => $buttons_style_meta_box,
				'options'       => $eldritch_IconCollections->getIconCollectionsEmpty("no_icon"),
				'args'          => array(
					"dependence" => true,
					"hide"       => $button2_icon_pack_hide_array,
					"show"       => $button2_icon_pack_show_array
				)
			)
		);

		if (is_array($eldritch_IconCollections->iconCollections) && count($eldritch_IconCollections->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach ($eldritch_IconCollections->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = $eldritch_IconCollections->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$button2_icon_hide_values = $icon_collections_keys;
				$button2_icon_hide_values[] = "no_icon";
				$button2_icon_container = eldritch_edge_add_admin_container(array(
					'name'            => "button2_icon_" . $collection_object->param . "_container",
					'parent'          => $buttons_style_meta_box,
					'hidden_property' => 'edgt_button2_icon_pack',
					'hidden_value'    => '',
					'hidden_values'   => $button2_icon_hide_values
				));

				eldritch_edge_create_meta_box_field(
					array(
						'name'    => "button2_icon_" . $collection_object->param,
						'type'    => 'select',
						'label'   => esc_html__('Button 2 Icon', 'eldritch'),
						'parent'  => $button2_icon_container,
						'options' => $icons_array
					)
				);
			}

		}


		//Slide Content Positioning

		$content_positioning_meta_box = eldritch_edge_create_meta_box(
			array(
				'scope' => array('slides'),
				'title' => esc_html__('Slide Content Positioning', 'eldritch'),
				'name'  => 'edgt_content_positioning_settings'
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $content_positioning_meta_box,
				'type'          => 'selectblank',
				'name'          => 'edgt_slide_content_alignment',
				'default_value' => '',
				'label'         => esc_html__('Text Alignment', 'eldritch'),
				'description'   => esc_html__('Choose an alignment for the slide text', 'eldritch'),
				'options'       => array(
					"left"   => esc_html__("Left", 'eldritch'),
					"center" => esc_html__("Center", 'eldritch'),
					"right"  => esc_html__("Right", 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $content_positioning_meta_box,
				'type'          => 'selectblank',
				'name'          => 'edgt_slide_separate_text_graphic',
				'default_value' => 'no',
				'label'         => esc_html__('Separate Graphic and Text Positioning', 'eldritch'),
				'description'   => esc_html__('Do you want to separately position graphic and text?', 'eldritch'),
				'options'       => array(
					"no"  => "No",
					"yes" => "Yes"
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""   => "#edgt_edgt_slide_graphic_positioning_container",
						"no" => "#edgt_edgt_slide_graphic_positioning_container, #edgt_edgt_content_vertical_positioning_group_container"
					),
					"show"       => array(
						"yes" => "#edgt_edgt_slide_graphic_positioning_container, #edgt_edgt_content_vertical_positioning_group_container"
					)
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_content_vertical_middle',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Vertically Align Content to Middle', 'eldritch'),
				'parent'        => $content_positioning_meta_box,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt_edgt_slide_content_vertical_middle_no_container",
					"dependence_show_on_yes" => "#edgt_edgt_slide_content_vertical_middle_yes_container"
				)
			)
		);

		$slide_content_vertical_middle_yes_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_content_vertical_middle_yes_container',
			'parent'          => $content_positioning_meta_box,
			'hidden_property' => 'edgt_slide_content_vertical_middle',
			'hidden_value'    => 'no'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $slide_content_vertical_middle_yes_container,
				'type'          => 'selectblank',
				'name'          => 'edgt_slide_content_vertical_middle_type',
				'default_value' => '',
				'label'         => esc_html__('Align Content Vertically Relative to the Height Measured From', 'eldritch'),
				'options'       => array(
					"bottom_of_header" => esc_html__("Bottom of Header", 'eldritch'),
					"window_top"       => esc_html__("Window Top", 'eldritch')
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_vertical_content_full_width',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Content Holder Full Width', 'eldritch'),
				'description'   => esc_html__('Do you want to set slide content holder to full width?', 'eldritch'),
				'parent'        => $slide_content_vertical_middle_yes_container
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_vertical_content_width',
				'type'        => 'text',
				'label'       => esc_html__('Content Width', 'eldritch'),
				'description' => esc_html__('Enter Width for Content Area', 'eldritch'),
				'parent'      => $slide_content_vertical_middle_yes_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$group_space_around_content = eldritch_edge_add_admin_group(array(
			'title'  => esc_html__('Space Around Content in Slide', 'eldritch'),
			'name'   => 'group_space_around_content',
			'parent' => $slide_content_vertical_middle_yes_container
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_space_around_content
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_vertical_content_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Left', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_vertical_content_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Right', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$slide_content_vertical_middle_no_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_content_vertical_middle_no_container',
			'parent'          => $content_positioning_meta_box,
			'hidden_property' => 'edgt_slide_content_vertical_middle',
			'hidden_value'    => 'yes'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'          => 'edgt_slide_content_full_width',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Content Holder Full Width', 'eldritch'),
				'description'   => esc_html__('Do you want to set slide content holder to full width?', 'eldritch'),
				'parent'        => $slide_content_vertical_middle_no_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgt_edgt_slide_content_width_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$slide_content_width_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_content_width_container',
			'parent'          => $slide_content_vertical_middle_no_container,
			'hidden_property' => 'edgt_slide_content_full_width',
			'hidden_value'    => 'yes'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'        => 'edgt_slide_content_width',
				'type'        => 'text',
				'label'       => esc_html__('Content Holder Width', 'eldritch'),
				'description' => esc_html__('Enter Width for Content Holder Area', 'eldritch'),
				'parent'      => $slide_content_width_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$group_space_around_content = eldritch_edge_add_admin_group(array(
			'title'  => esc_html__('Space Around Content in Slide', 'eldritch'),
			'name'   => 'group_space_around_content',
			'parent' => $slide_content_vertical_middle_no_container
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_space_around_content
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_content_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Top', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_content_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Left', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_content_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Bottom', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_content_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Right', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$row2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_space_around_content
		));

		$content_vertical_positioning_group_container = eldritch_edge_add_admin_container_no_style(array(
			'name'            => 'edgt_content_vertical_positioning_group_container',
			'parent'          => $row2,
			'hidden_property' => 'edgt_slide_separate_text_graphic',
			'hidden_value'    => 'no'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_text_width',
				'type'   => 'textsimple',
				'label'  => esc_html__('Text Holder Width', 'eldritch'),
				'parent' => $content_vertical_positioning_group_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$slide_graphic_positioning_container = eldritch_edge_add_admin_container(array(
			'name'            => 'edgt_slide_graphic_positioning_container',
			'parent'          => $slide_content_vertical_middle_no_container,
			'hidden_property' => 'edgt_slide_separate_text_graphic',
			'hidden_value'    => 'no'
		));

		eldritch_edge_create_meta_box_field(
			array(
				'parent'        => $slide_graphic_positioning_container,
				'type'          => 'selectblank',
				'name'          => 'edgt_slide_graphic_alignment',
				'default_value' => 'left',
				'label'         => esc_html__('Choose an alignment for the slide graphic', 'eldritch'),
				'options'       => array(
					"left"   => esc_html__("Left", 'eldritch'),
					"center" => esc_html__("Center", 'eldritch'),
					"right"  => esc_html__("Right", 'eldritch')
				)
			)
		);

		$group_graphic_positioning = eldritch_edge_add_admin_group(array(
			'title'       => esc_html__('Graphic Positioning', 'eldritch'),
			'description' => esc_html__('Positioning for slide graphic', 'eldritch'),
			'name'        => 'group_graphic_positioning',
			'parent'      => $slide_graphic_positioning_container
		));

		$row1 = eldritch_edge_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_graphic_positioning
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_graphic_top',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Top', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_graphic_left',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Left', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_graphic_bottom',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Bottom', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_graphic_right',
				'type'   => 'textsimple',
				'label'  => esc_html__('From Right', 'eldritch'),
				'parent' => $row1,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

		$row2 = eldritch_edge_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_graphic_positioning
		));

		eldritch_edge_create_meta_box_field(
			array(
				'name'   => 'edgt_slide_graphic_width',
				'type'   => 'textsimple',
				'label'  => esc_html__('Graphic Holder Width', 'eldritch'),
				'parent' => $row2,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);

	}

	add_action('eldritch_edge_meta_boxes_map', 'eldritch_edge_slider_meta_box_map');
}