<?php
include_once get_template_directory() . '/theme-includes.php';

//remove auto update od theme - start
$theme = 'eldritch';
add_filter('site_transient_update_themes', function ($value) use ($theme) {
	unset($value->response[$theme]);
	return $value;
}, 10, 1);
//remove auto update od theme - end

if (!function_exists('eldritch_edge_styles')) {
	/**
	 * Function that includes theme's core styles
	 */
	function eldritch_edge_styles() {
		wp_register_style('eldritch-edge-blog', EDGE_ASSETS_ROOT . '/css/blog.min.css');

		//include theme's core styles
		wp_enqueue_style('eldritch-edge-default-style', EDGE_ROOT . '/style.css');
		wp_enqueue_style('eldritch-edge-modules-plugins', EDGE_ASSETS_ROOT . '/css/plugins.min.css');

		if (eldritch_edge_load_blog_assets() || is_singular('portfolio-item')) {
			wp_enqueue_style('wp-mediaelement');
		}

		//is woocommerce installed?
		if (eldritch_edge_is_woocommerce_installed()) {
			if (eldritch_edge_load_woo_assets()) {

				//include theme's woocommerce styles
				wp_enqueue_style('edgt-woocommerce', EDGE_ASSETS_ROOT . '/css/woocommerce.min.css');
			}
		}

        //Include all necessary assets for BBPress
        if(eldritch_edge_bbpress_installed()) {
            wp_enqueue_style('eldritch-edge-bb-press', EDGE_ASSETS_ROOT . '/css/bbpress.min.css');
        }

		wp_enqueue_style('eldritch-edge-modules', EDGE_ASSETS_ROOT . '/css/modules.min.css');

		eldritch_edge_icon_collections()->enqueueStyles();

		if (eldritch_edge_load_blog_assets()) {
			wp_enqueue_style('eldritch-edge-blog');
		}

		//define files afer which style dynamic needs to be included. It should be included last so it can override other files
		$style_dynamic_deps_array = array();
		if (eldritch_edge_load_woo_assets()) {
			$style_dynamic_deps_array[] = 'edgt-woocommerce';
		}

		//is responsive option turned on?
		if (eldritch_edge_is_responsive_on()) {
			wp_enqueue_style('eldritch-edge-modules-responsive', EDGE_ASSETS_ROOT . '/css/modules-responsive.min.css');
			wp_enqueue_style('eldritch-edge-blog-responsive', EDGE_ASSETS_ROOT . '/css/blog-responsive.min.css');

			//is woocommerce installed?
			if (eldritch_edge_is_woocommerce_installed()) {
				if (eldritch_edge_load_woo_assets()) {

					//include theme's woocommerce responsive styles
					wp_enqueue_style('edgt-woocommerce-responsive', EDGE_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
					$style_dynamic_deps_array[] = 'edgt-woocommerce-responsive';
				}
			}

            //Include all necessary assets for BBPress
            if(eldritch_edge_bbpress_installed()) {
                wp_enqueue_style('eldritch-edge-bb-press-reponsive', EDGE_ASSETS_ROOT . '/css/bbpress-responsive.min.css');
            }

			//include proper styles
			if (file_exists(EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && eldritch_edge_is_css_folder_writable() && !is_multisite()) {
				wp_enqueue_style('eldritch-edge-style-dynamic-responsive', EDGE_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
			}
		}

		if (file_exists(EDGE_ROOT_DIR . '/assets/css/style_dynamic.css') && eldritch_edge_is_css_folder_writable() && !is_multisite()) {
			wp_enqueue_style('eldritch-edge-style-dynamic', EDGE_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(EDGE_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
		}


		//include Visual Composer styles
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style('js_composer_front');
		}
	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_styles');
}

if (!function_exists('eldritch_edge_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function eldritch_edge_google_fonts_styles() {
        $font_simple_field_array = eldritch_edge_options()->getOptionsByType('fontsimple');
        if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = eldritch_edge_options()->getOptionsByType('font');
        if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);
        $font_weight_str = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';

        //define available font options array
        $fonts_array = array();
        foreach ($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = eldritch_edge_options()->getOptionValue($font_option);
            if (eldritch_edge_is_font_option_valid($font_option_value) && !eldritch_edge_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value . ':' . $font_weight_str;
                if (!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        $fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts should be separated with %7C because of HTML validation
        $default_font_string = 'Marcellus:' . $font_weight_str . '|Open Sans:' . $font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array('family' => urlencode($fonts_full_list), 'subset' => urlencode('latin,latin-ext'),);

            $eldritch_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('eldritch-edge-google-fonts', esc_url_raw($eldritch_fonts), array(), '1.0.0');

        } else {
            //include default google font that theme is using
            $default_fonts_args = array('family' => urlencode($default_font_string), 'subset' => urlencode('latin,latin-ext'),);
            $eldritch_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('eldritch-edge-google-fonts', esc_url_raw($eldritch_fonts), array(), '1.0.0');
        }

    }

	add_action('wp_enqueue_scripts', 'eldritch_edge_google_fonts_styles');
}

if (!function_exists('eldritch_edge_scripts')) {
	/**
	 * Function that includes all necessary scripts
	 */
	function eldritch_edge_scripts() {
		global $wp_scripts;

		//init theme core scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('wp-mediaelement');

		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script('appear', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array('jquery'), false, true);
		wp_enqueue_script('modernizr', EDGE_ASSETS_ROOT . '/js/modules/plugins/modernizr.custom.85257.js', array('jquery'), false, true);
		wp_enqueue_script('hoverIntent', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-plugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array('jquery'), false, true);
		wp_enqueue_script('countdown', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.countdown.min.js', array('jquery'), false, true);
		wp_enqueue_script('owl-carousel', EDGE_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array('jquery'), false, true);
		wp_enqueue_script('parallax', EDGE_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array('jquery'), false, true);
		wp_enqueue_script('select-2', EDGE_ASSETS_ROOT . '/js/modules/plugins/select2.min.js', array('jquery'), false, true);
		wp_enqueue_script('easypiechart', EDGE_ASSETS_ROOT . '/js/modules/plugins/easypiechart.js', array('jquery'), false, true);
		wp_enqueue_script('waypoints', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array('jquery'), false, true);
		wp_enqueue_script('Chart', EDGE_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array('jquery'), false, true);
		wp_enqueue_script('counter', EDGE_ASSETS_ROOT . '/js/modules/plugins/counter.js', array('jquery'), false, true);
		wp_enqueue_script('absoluteCounter', EDGE_ASSETS_ROOT . '/js/modules/plugins/absoluteCounter.js', array('jquery'), false, true);
		wp_enqueue_script('fluidvids', EDGE_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array('jquery'), false, true);
		wp_enqueue_script('prettyPhoto', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array('jquery'), false, true);
		wp_enqueue_script('nicescroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('ScrollToPlugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array('jquery'), false, true);
		wp_enqueue_script('TweenLite', EDGE_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array('jquery'), false, true);
		wp_enqueue_script('TweenMax', EDGE_ASSETS_ROOT . '/js/modules/plugins/TweenMax.min.js', array('jquery'), false, true);
		wp_enqueue_script('TimelineLite', EDGE_ASSETS_ROOT . '/js/modules/plugins/TimelineLite.min.js', array('jquery'), false, true);
		wp_enqueue_script('CSSPlugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/CSSPlugin.min.js', array('jquery'), false, true);
		wp_enqueue_script('EasePack', EDGE_ASSETS_ROOT . '/js/modules/plugins/EasePack.min.js', array('jquery'), false, true);
		wp_enqueue_script('mixitup', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.mixitup.min.js', array('jquery'), false, true);
		wp_enqueue_script('multiscroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.multiscroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('waitforimages', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array('jquery'), false, true);
		wp_enqueue_script('infinitescroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.infinitescroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-easing-1.3', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array('jquery'), false, true);
		wp_enqueue_script('skrollr', EDGE_ASSETS_ROOT . '/js/modules/plugins/skrollr.js', array('jquery'), false, true);
		wp_enqueue_script('slick', EDGE_ASSETS_ROOT . '/js/modules/plugins/slick.min.js', array('jquery'), false, true);
		wp_enqueue_script('bootstrapCarousel', EDGE_ASSETS_ROOT . '/js/modules/plugins/bootstrapCarousel.js', array('jquery'), false, true);
		wp_enqueue_script('touchSwipe', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.touchSwipe.min.js', array('jquery'), false, true);
		wp_enqueue_script('flexslider-min', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.flexslider-min.js', array('jquery'), false, true);

		wp_enqueue_script('isotope', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.isotope.min.js', array('jquery'), false, true);
		wp_enqueue_script('packery-mode', EDGE_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array('isotope'), false, true);

		if (eldritch_edge_is_smoth_scroll_enabled()) {
			wp_enqueue_script("eldritch-edge-smooth-page-scroll", EDGE_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
		}

		//include google map api script
		if (eldritch_edge_options()->getOptionValue('google_maps_api_key') != '') {
			$google_maps_api_key = eldritch_edge_options()->getOptionValue('google_maps_api_key');
			wp_enqueue_script('eldritch-edge-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
		}

		wp_enqueue_script('eldritch-edge-modules', EDGE_ASSETS_ROOT . '/js/modules.js', array('jquery'), false, true);

		if (eldritch_edge_load_blog_assets()) {
			wp_enqueue_script('eldritch-edge-blog', EDGE_ASSETS_ROOT . '/js/blog.js', array('jquery'), false, true);
		}

		//include comment reply script
		$wp_scripts->add_data('comment-reply', 'group', 1);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script("comment-reply");
		}

		//include Visual Composer script
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_script('wpb_composer_front_js');
		}
	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_scripts');
}

if (!function_exists('eldritch_edge_get_objects_without_ajax')) {
	/**
	 * Function that returns urls of objects that have ajax disabled.
	 * Works for posts, pages and portfolio pages.
	 * @return array array of urls of posts that have ajax disabled
	 *
	 * @version 0.1
	 */
	function eldritch_edge_get_objects_without_ajax() {
		$posts_without_ajax = array();

		$posts_args = array(
			'post_type'   => array('post', 'portfolio-item', 'page'),
			'post_status' => 'publish',
			'meta_key'    => 'edgt_page_transition_type',
			'meta_value'  => 'no-animation'
		);

		$posts_query = new WP_Query($posts_args);

		if ($posts_query->have_posts()) {
			while ($posts_query->have_posts()) {
				$posts_query->the_post();
				$posts_without_ajax[] = get_permalink(get_the_ID());
			}
		}

		wp_reset_postdata();

		return $posts_without_ajax;
	}
}


//defined content width variable
if (!isset($content_width)) {
	$content_width = 1060;
}

if (!function_exists('eldritch_edge_theme_setup')) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function eldritch_edge_theme_setup() {
		//add support for feed links
		add_theme_support('automatic-feed-links');

		//add support for post formats
		add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

		//add theme support for post thumbnails
		add_theme_support('post-thumbnails');

		//add theme support for title tag
        add_theme_support('title-tag');


		//define thumbnail sizes
		add_image_size('eldritch_edge_square', 650, 650, true);
		add_image_size('eldritch_edge_landscape', 800, 600, true);
		add_image_size('eldritch_edge_portrait', 600, 800, true);
		add_image_size('eldritch_edge_large_width', 1300, 650, true);
		add_image_size('eldritch_edge_large_height', 650, 1300, true);
		add_image_size('eldritch_edge_large_width_height', 1300, 1300, true);

		load_theme_textdomain('eldritch', get_template_directory() . '/languages');
	}

	add_action('after_setup_theme', 'eldritch_edge_theme_setup');
}

if ( ! function_exists( 'eldritch_edge_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function eldritch_edge_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'eldritch-style-modules-admin-styles', EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/edgt-modules-admin.css' );
		wp_enqueue_style( 'eldritch-style-handle-editor-customizer-styles', EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}

	// add google font
	add_action( 'enqueue_block_editor_assets', 'eldritch_edge_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'eldritch_edge_enqueue_editor_customizer_styles' );
}

if (!function_exists('eldritch_edge_rgba_color')) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function eldritch_edge_rgba_color($color, $transparency) {
		if ($color !== '' && $transparency !== '') {
			$rgba_color = '';

			$rgb_color_array = eldritch_edge_hex2rgb($color);
			$rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}

if (!function_exists('eldritch_edge_header_meta')) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function eldritch_edge_header_meta() { ?>
		<meta charset="<?php bloginfo('charset'); ?>"/>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php }

	add_action('eldritch_edge_header_meta', 'eldritch_edge_header_meta');
}

if (!function_exists('eldritch_edge_user_scalable_meta')) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to eldritch_edge_header_meta action
	 */
	function eldritch_edge_user_scalable_meta() {
		//is responsiveness option is chosen?
		if (eldritch_edge_is_responsive_on()) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}

	add_action('eldritch_edge_header_meta', 'eldritch_edge_user_scalable_meta');
}

if (!function_exists('eldritch_edge_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see eldritch_edge_is_woocommerce_installed()
	 * @see eldritch_edge_is_woocommerce_shop()
	 */
	function eldritch_edge_get_page_id() {
		if (eldritch_edge_is_woocommerce_installed() && eldritch_edge_is_woocommerce_shop()) {
			return eldritch_edge_get_woo_shop_page_id();
		}

		if (is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if (!function_exists('eldritch_edge_is_default_wp_template')) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function eldritch_edge_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
	}
}

if (!function_exists('eldritch_edge_get_page_template_name')) {
	/**
	 * Returns current template file name without extension
	 * @return string name of current template file
	 */
	function eldritch_edge_get_page_template_name() {
		$file_name = '';

		if (!eldritch_edge_is_default_wp_template()) {
			$file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

			if ($file_name_without_ext !== '') {
				$file_name = $file_name_without_ext;
			}
		}

		return $file_name;
	}
}

if (!function_exists('eldritch_edge_has_shortcode')) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function eldritch_edge_has_shortcode($shortcode, $content = '') {
		$has_shortcode = false;

		if ($shortcode) {
			//if content variable isn't past
			if ($content == '') {
				//take content from current post
				$page_id = eldritch_edge_get_page_id();
				if (!empty($page_id)) {
					$current_post = get_post($page_id);

					if (is_object($current_post) && property_exists($current_post, 'post_content')) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if (stripos($content, '[' . $shortcode) !== false) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if (!function_exists('eldritch_edge_get_dynamic_sidebar')) {
	/**
	 * Return Custom Widget Area content
	 *
	 * @return string
	 */
	function eldritch_edge_get_dynamic_sidebar($index = 1) {
		ob_start();
		dynamic_sidebar($index);
		$sidebar_contents = ob_get_clean();

		return $sidebar_contents;
	}
}

if (!function_exists('eldritch_edge_get_sidebar')) {
	/**
	 * Return Sidebar
	 *
	 * @return string
	 */
	function eldritch_edge_get_sidebar() {

		$id = eldritch_edge_get_page_id();

		$sidebar = "sidebar";

		if (get_post_meta($id, 'edgt_custom_sidebar_meta', true) != '') {
			$sidebar = get_post_meta($id, 'edgt_custom_sidebar_meta', true);
		} else {
			if (is_single() && eldritch_edge_options()->getOptionValue('blog_single_custom_sidebar') != '') {
				$sidebar = esc_attr(eldritch_edge_options()->getOptionValue('blog_single_custom_sidebar'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && eldritch_edge_options()->getOptionValue('blog_custom_sidebar') != '') {
				$sidebar = esc_attr(eldritch_edge_options()->getOptionValue('blog_custom_sidebar'));
			} elseif (is_page() && eldritch_edge_options()->getOptionValue('page_custom_sidebar') != '') {
				$sidebar = esc_attr(eldritch_edge_options()->getOptionValue('page_custom_sidebar'));
			}
		}

		return apply_filters('eldritch_edge_sidebar', $sidebar);
	}
}


if (!function_exists('eldritch_edge_sidebar_columns_class')) {

	/**
	 * Return classes for columns holder when sidebar is active
	 *
	 * @return array
	 */

	function eldritch_edge_sidebar_columns_class() {

		$sidebar_class = array();
		$sidebar_layout = eldritch_edge_sidebar_layout();

		switch ($sidebar_layout):
			case 'sidebar-33-right':
				$sidebar_class[] = 'edgt-two-columns-66-33';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'edgt-two-columns-75-25';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'edgt-two-columns-33-66';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'edgt-two-columns-25-75';
				break;

		endswitch;

		$sidebar_class[] = 'clearfix';

		return eldritch_edge_class_attribute($sidebar_class);

	}
}

if (!function_exists('eldritch_edge_get_content_sidebar_class')) {
	/**
	 * @return string
	 */
	function eldritch_edge_get_content_sidebar_class() {
		$sidebar_layout = eldritch_edge_sidebar_layout();
		$content_class = array('edgt-page-content-holder');

		switch ($sidebar_layout) {
			case 'sidebar-33-right':
				$content_class[] = 'edgt-grid-col-8';
				break;
			case 'sidebar-25-right':
				$content_class[] = 'edgt-grid-col-9';
				break;
			case 'sidebar-33-left':
				$content_class[] = 'edgt-grid-col-8';
				$content_class[] = 'edgt-grid-col-push-4';
				break;
			case 'sidebar-25-left':
				$content_class[] = 'edgt-grid-col-9';
				$content_class[] = 'edgt-grid-col-push-3';
				break;
			default:
				$content_class[] = 'edgt-grid-col-12';
				break;
		}

		return eldritch_edge_get_class_attribute($content_class);
	}
}

if (!function_exists('eldritch_edge_get_sidebar_holder_class')) {
	/**
	 * @return string
	 */
	function eldritch_edge_get_sidebar_holder_class() {
		$sidebar_layout = eldritch_edge_sidebar_layout();

		$sidebar_class = array('edgt-sidebar-holder');

		switch ($sidebar_layout) {
			case 'sidebar-33-right':
				$sidebar_class[] = 'edgt-grid-col-4';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'edgt-grid-col-3';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'edgt-grid-col-4';
				$sidebar_class[] = 'edgt-grid-col-pull-8';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'edgt-grid-col-3';
				$sidebar_class[] = 'edgt-grid-col-pull-9';
				break;
		}

		return eldritch_edge_get_class_attribute($sidebar_class);
	}
}

if (!function_exists('eldritch_edge_sidebar_layout')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */

	function eldritch_edge_sidebar_layout() {

		$sidebar_layout = '';
		$page_id = eldritch_edge_get_page_id();

		$page_sidebar_meta = get_post_meta($page_id, 'edgt_sidebar_meta', true);

		if (($page_sidebar_meta !== '') && $page_id !== -1) {
			$sidebar_layout = $page_sidebar_meta !== 'no-sidebar' ? $page_sidebar_meta : '';
		} else {
			if (is_single() && eldritch_edge_options()->getOptionValue('blog_single_sidebar_layout')) {
				$sidebar_layout = esc_attr(eldritch_edge_options()->getOptionValue('blog_single_sidebar_layout'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && eldritch_edge_options()->getOptionValue('archive_sidebar_layout')) {
				$sidebar_layout = esc_attr(eldritch_edge_options()->getOptionValue('archive_sidebar_layout'));
			} elseif (is_page() && eldritch_edge_options()->getOptionValue('page_sidebar_layout')) {
				$sidebar_layout = esc_attr(eldritch_edge_options()->getOptionValue('page_sidebar_layout'));
			} elseif (! empty( $sidebar_layout ) && ! is_active_sidebar( eldritch_edge_get_sidebar() ) ) {
				$sidebar_layout = '';
			}
		}

		return apply_filters('eldritch_edge_sidebar_layout', $sidebar_layout);
	}
}

if (!function_exists('eldritch_edge_sidebar_boxed_widgets')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */

	function eldritch_edge_sidebar_boxed_widgets() {

		$boxed_widgets = '';
		$page_id = eldritch_edge_get_page_id();

		$boxed_widgets_meta = get_post_meta($page_id, 'edgt_boxed_widgets_meta', true);

		if (($boxed_widgets_meta !== '') && $page_id !== -1) {
			$boxed_widgets = $boxed_widgets_meta !== '' ? $boxed_widgets_meta : '';
		} else {
			if (is_single() && eldritch_edge_options()->getOptionValue('blog_single_boxed_widgets')) {
				$boxed_widgets = esc_attr(eldritch_edge_options()->getOptionValue('blog_single_boxed_widgets'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && eldritch_edge_options()->getOptionValue('archive_boxed_widgets')) {
				$boxed_widgets = esc_attr(eldritch_edge_options()->getOptionValue('archive_boxed_widgets'));
			} elseif (is_page() && eldritch_edge_options()->getOptionValue('page_boxed_widgets')) {
				$boxed_widgets = esc_attr(eldritch_edge_options()->getOptionValue('page_boxed_widgets'));
			}
		}
		return apply_filters('eldritch_edge_boxed_widgets', $boxed_widgets);
	}
}

if (!function_exists('eldritch_edge_page_custom_style')) {

	/**
	 * Function that print custom page style
	 */

	function eldritch_edge_page_custom_style() {
        $style = '';
        $style = apply_filters('eldritch_edge_add_page_custom_style', $style);

        if ($style !== '') {
            wp_add_inline_style('eldritch-edge-modules', $style);
        }
	}

    add_action('wp_enqueue_scripts', 'eldritch_edge_page_custom_style');
}

if (!function_exists('eldritch_edge_page_skin_class')) {
    /**
     * Function that return page skin color
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added skin class
     */
    function eldritch_edge_page_skin_class($classes) {

        $id = eldritch_edge_get_page_id();

        if (get_post_meta($id, "edgt_page_skin_meta", true) != '') {

            $page_skin = get_post_meta($id, "edgt_page_skin_meta", true);

            if($page_skin != '') {
                $classes[] = $page_skin;
            }

        }

        return $classes;
    }

    add_filter('body_class', 'eldritch_edge_page_skin_class');
}


if (!function_exists('eldritch_edge_container_style')) {

	/**
	 * Function that return container style
	 */

	function eldritch_edge_container_style($style) {
		$id = eldritch_edge_get_page_id();
		$class_prefix = eldritch_edge_get_unique_page_class();

        $current_style = '';

		$container_selector = array(
			$class_prefix . ' .edgt-content .edgt-content-inner > .edgt-container',
			$class_prefix . ' .edgt-content .edgt-content-inner > .edgt-full-width',
			$class_prefix . ' .edgt-content',
		);

		$container_class = array();
		$page_backgorund_color = get_post_meta($id, "edgt_page_background_color_meta", true);

		if ($page_backgorund_color) {
			$container_class['background-color'] = $page_backgorund_color;
		}

        $page_backgorund_image = get_post_meta($id, "edgt_page_background_image_meta", true);

        if ($page_backgorund_image) {
            $container_class['background-image'] = 'url('.$page_backgorund_image.')';
        }

        $current_style .= eldritch_edge_dynamic_css($container_selector, $container_class);
        $style = $current_style . $style;

		return $style;
	}

	add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_container_style');
}

if (!function_exists('eldritch_edge_comments_style')) {

	/**
	 * Function that return container style
	 */

	function eldritch_edge_comments_style($style) {
		$id = eldritch_edge_get_page_id();
		$class_prefix = eldritch_edge_get_unique_page_class();

        $current_style = '';

		$container_selector = array(
			$class_prefix . ' .edgt-comment-holder .edgt-comment'
		);

		$container_class = array();
		$comments_backgorund_color = get_post_meta($id, 'edgt_comments_background_color_meta', true);

		if ($comments_backgorund_color) {
			$container_class['background-color'] = $comments_backgorund_color;
		}

        $current_style .= eldritch_edge_dynamic_css($container_selector, $container_class);
        $style = $current_style . $style;

		return $style;
	}

	add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_comments_style');
}

if (!function_exists('eldritch_edge_boxed_style')) {

	/**
	 * Function that return container style
	 */

	function eldritch_edge_boxed_style($style) {

		$id = eldritch_edge_get_page_id();

		$class_prefix = eldritch_edge_get_unique_page_class();

        $current_style = '';

		$container_selector = array(
			$class_prefix . '.edgt-boxed .edgt-wrapper'
		);

		$container_style = array();

		if (get_post_meta($id, "edgt_boxed_meta", true) == 'yes') {
			$page_backgorund_color = get_post_meta($id, "edgt_page_background_color_in_box_meta", true);
			$page_backgorund_image = get_post_meta($id, "edgt_boxed_background_image_meta", true);
			$page_backgorund_image_pattern = get_post_meta($id, "edgt_boxed_pattern_background_image_meta", true);
			$page_backgorund_attachment = get_post_meta($id, "edgt_boxed_background_image_attachment_meta", true);

			if (eldritch_edge_get_meta_field_intersect('header_footer_in_box') == 'no') {
				$container_selector = array(
					$class_prefix . '.edgt-boxed-content .edgt-wrapper'
				);
			}

			if ($page_backgorund_color) {
				$container_style['background-color'] = $page_backgorund_color;
			}

			if ($page_backgorund_image_pattern) {
				$container_style['background-image'] = 'url(' . $page_backgorund_image_pattern . ')';
				$container_style['background-position'] = '0px 0px';
				$container_style['background-repeat'] = 'repeat';
			}

			if ($page_backgorund_image) {
				$container_style['background-image'] = 'url(' . $page_backgorund_image . ')';
				$container_style['background-position'] = 'center 0px';
				$container_style['background-repeat'] = 'no-repeat';
			}

			if ($page_backgorund_attachment && $page_backgorund_image != '') {
				$container_style['background-attachment'] = $page_backgorund_attachment;
				if ($page_backgorund_attachment == 'fixed') {
					$container_style['background-size'] = 'cover';
				} else {
					$container_style['background-size'] = 'contain';
				}
			}

			if (!empty($container_style)) {

                $current_style .= eldritch_edge_dynamic_css($container_selector, $container_style);
			}

            $style = $current_style . $style;
		}

		return $style;

	}

	add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_boxed_style');
}

if (!function_exists('eldritch_edge_get_unique_page_class')) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * @return string
	 */
	function eldritch_edge_get_unique_page_class() {
		$id = eldritch_edge_get_page_id();
		$page_class = '';

		if (is_single()) {
			$page_class = '.postid-' . get_queried_object_id();
		} elseif ($id === eldritch_edge_get_woo_shop_page_id()) {
			$page_class = '.archive';
		} elseif (is_home()) {
			$page_class .= '.home';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if (!function_exists('eldritch_edge_page_padding')) {

	/**
	 * Function that return container style
	 */

	function eldritch_edge_page_padding($style) {

		$id = eldritch_edge_get_page_id();
		$class_prefix = eldritch_edge_get_unique_page_class();

        $current_style = '';

		$page_selector = array(
			$class_prefix . ' .edgt-content .edgt-content-inner > .edgt-container > .edgt-container-inner',
			$class_prefix . ' .edgt-content .edgt-content-inner > .edgt-full-width > .edgt-full-width-inner'
		);

		$page_css = array();

		$page_padding = get_post_meta($id, 'edgt_page_padding_meta', true);


		if ($page_padding !== '') {
			$page_css['padding'] = $page_padding;
		}

        $current_style .= eldritch_edge_dynamic_css($page_selector, $page_css);

        $style = $current_style . $style;

		return $style;

	}

	add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_page_padding');
}

if (!function_exists('eldritch_edge_per_page_paspartu_styles')) {

	function eldritch_edge_per_page_paspartu_styles($style) {
		$id = eldritch_edge_get_page_id();
		$class_prefix = eldritch_edge_get_unique_page_class();

        $current_style = '';

		$paspartu_enabled = eldritch_edge_get_meta_field_intersect('enable_paspartu', $id) == 'yes';


		if ($paspartu_enabled) {

			$paspartu_style = array();

			$paspartu_selectors = array(
				'body' . $class_prefix . '.edgt-paspartu-enabled .edgt-wrapper-paspartu'
			);

			$paspartu_color = get_post_meta($id, "edgt_paspartu_color_meta", true);
			$paspartu_size = get_post_meta($id, "edgt_paspartu_size_meta", true);

			if ($paspartu_color !== '') {
				$paspartu_style['background-color'] = $paspartu_color;
			}

			if ($paspartu_size !== '') {
				$paspartu_style['padding'] = eldritch_edge_filter_px($paspartu_size) . 'px';
			}

			if (!empty($paspartu_style)) {

                $current_style .= eldritch_edge_dynamic_css($paspartu_selectors, $paspartu_style);
			}

		}

        $style = $current_style . $style;

		return $style;

	}

	add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_per_page_paspartu_styles');
}

if (!function_exists('eldritch_edge_print_custom_css')) {
	/**
	 * Prints out custom css from theme options
	 */
	function eldritch_edge_print_custom_css() {
		$custom_css = eldritch_edge_options()->getOptionValue('custom_css');

		if ($custom_css !== '') {
			wp_add_inline_style('eldritch-edge-modules', $custom_css);
		}
	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_print_custom_css');
}

if (!function_exists('eldritch_edge_print_custom_js')) {
	/**
	 * Prints out custom css from theme options
	 */
	function eldritch_edge_print_custom_js() {
		$custom_js = eldritch_edge_options()->getOptionValue('custom_js');

		if ($custom_js !== '') {
			wp_add_inline_script('eldritch-edge-modules', $custom_js);
		}
	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_print_custom_js');
}


if (!function_exists('eldritch_edge_get_global_variables')) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function eldritch_edge_get_global_variables() {

		$global_variables = array();
		$element_appear_amount = -150;

		$global_variables['edgtAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
		$global_variables['edgtElementAppearAmount'] = eldritch_edge_options()->getOptionValue('element_appear_amount') !== '' ? eldritch_edge_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
		$global_variables['edgtFinishedMessage'] = esc_html__('No more posts', 'eldritch');
		$global_variables['edgtMessage'] = esc_html__('Loading new posts...', 'eldritch');
		$global_variables['edgtPtfLoadMoreMessage'] = esc_html__('Loading...', 'eldritch');
		$global_variables['edgtAddingToCart'] = esc_html__('Adding to Cart...', 'eldritch');

		$global_variables = apply_filters('eldritch_edge_js_global_variables', $global_variables);

		wp_localize_script('eldritch-edge-modules', 'edgtGlobalVars', array(
			'vars' => $global_variables
		));

	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_get_global_variables');
}

if (!function_exists('eldritch_edge_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function eldritch_edge_per_page_js_variables() {
		$per_page_js_vars = apply_filters('eldritch_edge_per_page_js_vars', array());

		wp_localize_script('eldritch-edge-modules', 'edgtPerPageVars', array(
			'vars' => $per_page_js_vars
		));
	}

	add_action('wp_enqueue_scripts', 'eldritch_edge_per_page_js_variables');
}

if (!function_exists('eldritch_edge_content_elem_style_attr')) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function eldritch_edge_content_elem_style_attr() {
		$styles = apply_filters('eldritch_edge_content_elem_style_attr', array());

		eldritch_edge_inline_style($styles);
	}
}

if (!function_exists('eldritch_edge_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function eldritch_edge_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if(!function_exists('eldritch_edge_bbpress_installed')) {
    /**
     * Function that checks if BBPress is installed
     * @return bool
     */
    function eldritch_edge_bbpress_installed() {
        //is BBpress installed?
        if(class_exists('bbPress')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('eldritch_edge_visual_composer_installed')) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function eldritch_edge_visual_composer_installed() {
//is Visual Composer installed?
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('eldritch_edge_contact_form_7_installed')) {
	/**
	 * Function that checks if contact form 7 installed
	 * @return bool
	 */
	function eldritch_edge_contact_form_7_installed() {
//is Contact Form 7 installed?
		if (defined('WPCF7_VERSION')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('eldritch_edge_is_wpml_installed')) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function eldritch_edge_is_wpml_installed() {
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if ( ! function_exists( 'eldritch_edge_is_plugin_installed' ) ) {
	/**
	 * Function that checks if forward plugin installed
	 *
	 * @param $plugin string
	 *
	 * @return bool
	 */
	function eldritch_edge_is_plugin_installed( $plugin ) {
		switch ( $plugin ) {
			case 'core':
				return defined( 'EDGE_CORE_VERSION' );
				break;
			case 'woocommerce':
				return function_exists( 'is_woocommerce' );
				break;
			case 'visual-composer':
				return class_exists( 'WPBakeryVisualComposerAbstract' );
				break;
			case 'revolution-slider':
				return class_exists( 'RevSliderFront' );
				break;
			case 'contact-form-7':
				return defined( 'WPCF7_VERSION' );
				break;
			case 'wpml':
				return defined( 'ICL_SITEPRESS_VERSION' );
				break;
			case 'gutenberg-editor':
				return class_exists( 'WP_Block_Type' );
				break;
			case 'gutenberg-plugin':
				return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
				break;
			default:
				return false;
				break;
		}
	}
}

if (!function_exists('eldritch_edge_get_first_main_color')) {
	/**
	 * Returns first main color from options if set, else returns default first main color
	 *
	 * @return bool|string|void
	 */
	function eldritch_edge_get_first_main_color() {
		return eldritch_edge_options()->getOptionValue('first_color') ? eldritch_edge_options()->getOptionValue('first_color') : '#a8a8a8';
	}
}

if (!function_exists('eldritch_edge_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function eldritch_edge_max_image_width_srcset() {
		return 1920;
	}

	add_filter('max_srcset_image_width', 'eldritch_edge_max_image_width_srcset');
}

if (!function_exists('eldritch_edge_generate_first_main_color_per_page')) {
	/**
	 * Function that checks first main color in page options and generate css if color is set
	 */
	function eldritch_edge_generate_first_main_color_per_page($style) {
		$id = eldritch_edge_get_page_id();
		$first_color = eldritch_edge_get_meta_field_intersect('first_color', $id);

        $current_style = '';

		if ($first_color !== '') {

			extract(eldritch_edge_generate_first_color_selectors());

            $current_style .= eldritch_edge_dynamic_css($color_selector, array('color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($color_selector_new, array('color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($color_selector_new2, array('color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($color_important_selector, array('color' => $first_color . ' !important'));
            $current_style .= eldritch_edge_dynamic_css('::selection', array('background' => $first_color));
            $current_style .= eldritch_edge_dynamic_css('::-moz-selection', array('background' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($background_color_selector, array('background-color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($background_color_important_selector, array('background-color' => $first_color . ' !important'));
            $current_style .= eldritch_edge_dynamic_css($border_color_selector, array('border-color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($border_color_important_selector, array('border-color' => $first_color . ' !important'));
            $current_style .= eldritch_edge_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($border_top_color_selector, array('border-top-color' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($stroke_color_selector, array('stroke' => $first_color));
            $current_style .= eldritch_edge_dynamic_css($shadow_selector, array(
                'box-shadow' => '0 0 0 1px '.$first_color,
                '-moz-box-shadow' => '0 0 0 1px '.$first_color,
                '-webkit-box-shadow' => '0 0 0 1px '.$first_color
            ));
		}

        $style = $current_style . $style;

		return $style;
	}

	add_filter('eldritch_edge_add_page_custom_style', 'eldritch_edge_generate_first_main_color_per_page');
}

if (!function_exists('eldritch_edge_generate_first_color_selectors')) {
	/**
	 * Function generate arrays of selectors for first color option
	 */
	function eldritch_edge_generate_first_color_selectors() {

		$return_array = array();
		//generate color selector array
		$return_array['color_selector'] = array(
            '.edgt-dropcaps',
            '.edgt-portfolio-list-holder-outer.edgt-ptf-gallery article .edgt-ptf-item-excerpt-holder',
            '.edgt-portfolio-list-holder-outer.edgt-ptf-gallery.edgt-hover-type-three .edgt-ptf-category-holder',
            '.edgt-portfolio-filter-holder .edgt-portfolio-filter-holder-inner ul li.active',
            '.edgt-portfolio-filter-holder .edgt-portfolio-filter-holder-inner ul li.current',
            '.edgt-portfolio-filter-holder .edgt-portfolio-filter-holder-inner ul li:hover',
            '.edgt-portfolio-filter-holder.light .edgt-portfolio-filter-holder-inner ul li.active',
            '.edgt-portfolio-filter-holder.light .edgt-portfolio-filter-holder-inner ul li.current',
            '.edgt-portfolio-filter-holder.light .edgt-portfolio-filter-holder-inner ul li:hover',
            '.edgt-social-share-holder.edgt-list li a:hover',
            '.edgt-comparision-pricing-tables-holder .edgt-cpt-features-holder .edgt-cpt-features-title-holder.edgt-cpt-table-head-holder .edgt-cpt-features-title strong',
            '.edgt-item-showcase-holder .edgt-is-icon:hover .edgt-icon-element',
            '.edgt-page-footer .edgt-latest-posts-widget .edgt-blog-list-holder.edgt-image-in-box .edgt-blog-list-item .edgt-item-title a:hover',
            '.edgt-page-footer .edgt-latest-posts-widget .edgt-blog-list-holder.edgt-minimal .edgt-blog-list-item .edgt-item-title a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry article .edgt-post-info-category a:hover',
            '.edgt-blog-list-holder.edgt-masonry article .edgt-post-info-category a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry article .edgt-post-info a:hover',
            '.edgt-blog-list-holder.edgt-masonry article .edgt-post-info a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry article.format-link .edgt-post-title a:hover',
            '.edgt-blog-list-holder.edgt-masonry article.format-link .edgt-post-title a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry article.format-quote .edgt-post-info-category a:hover',
            '.edgt-blog-list-holder.edgt-masonry article.format-quote .edgt-post-info-category a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry article.format-quote .edgt-post-title * a:hover',
            '.edgt-blog-list-holder.edgt-masonry article.format-quote .edgt-post-title * a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry article.format-quote .edgt-post-info a:hover',
            '.edgt-blog-list-holder.edgt-masonry article.format-quote .edgt-post-info a:hover',
            '.edgt-blog-holder.edgt-blog-type-masonry-gallery article.format-quote:hover .edgt-masonry-gallery-quote',
            '.edgt-blog-holder.edgt-blog-type-masonry-gallery article.format-link:hover .edgt-masonry-gallery-link-title',
            '.edgt-blog-holder.edgt-blog-type-standard article .edgt-post-info-category a:hover',
            '.edgt-blog-holder.edgt-blog-type-standard article .edgt-post-info a:hover',
            '.edgt-blog-holder.edgt-blog-type-standard article.format-link:hover .edgt-post-title',
            '.edgt-blog-holder.edgt-blog-type-standard article.format-quote:hover .edgt-post-title',
            '.edgt-blog-holder article.sticky .edgt-post-title a',
            '.edgt-blog-holder article .edgt-single-links-pages a:hover',
            '.edgt-filter-blog-holder li.edgt-active',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-standard .edgt-post-info .edgt-post-info-category a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-standard .edgt-tags a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-standard .edgt-tags-share-holder .edgt-share-icons-single a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-standard .format-link .edgt-post-link .edgt-post-title a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-standard .format-quote .edgt-post-quote .edgt-post-title a:hover',
            'body.single-post .edgt-container>.edgt-post-image-title .edgt-post-info .edgt-author a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-image-title .edgt-tags a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-image-title .edgt-tags-share-holder .edgt-share-icons-single a:hover',
            '.edgt-footer-inner #lang_sel>ul>li>ul li a:hover span',
            '.edgt-side-menu #lang_sel>ul>li>ul li a:hover span',
            '.edgt-footer-inner #lang_sel a:hover',
            '.edgt-side-menu #lang_sel a:hover',
            '.edgt-fullscreen-menu-holder #lang_sel>ul>li>ul a:hover',
            '.edgt-top-bar #lang_sel .lang_sel_sel:hover',
            '.edgt-top-bar #lang_sel ul ul a:hover',
            '.edgt-top-bar #lang_sel_list ul li a:hover',
            '.edgt-main-menu .menu-item-language .submenu-languages a:hover',
            '.edgt-menu-area .edgt-position-right #lang_sel .lang_sel_sel:hover',
            '.edgt-sticky-header .edgt-position-right #lang_sel .lang_sel_sel:hover',
            '.edgt-menu-area .edgt-position-right #lang_sel ul ul li a:hover',
            '.edgt-sticky-header .edgt-position-right #lang_sel ul ul li a:hover',
            '.edgt-menu-area .edgt-position-right #lang_sel_list ul li a:hover',
            '.edgt-sticky-header .edgt-position-right #lang_sel_list ul li a:hover',
		);

		$return_array['color_selector_new2'] = array(
            '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
            '.edgt-woocommerce-page .woocommerce-error .button.wc-forward:hover',
            '.edgt-woocommerce-page .woocommerce-info .button.wc-forward:hover',
            '.edgt-woocommerce-page .woocommerce-message .button.wc-forward:hover',
            '.woocommerce-page .edgt-content .edgt-quantity-buttons .edgt-quantity-minus:hover',
            '.woocommerce-page .edgt-content .edgt-quantity-buttons .edgt-quantity-plus:hover',
            'div.woocommerce .edgt-quantity-buttons .edgt-quantity-minus:hover',
            'div.woocommerce .edgt-quantity-buttons .edgt-quantity-plus:hover',
            'ul.products>.product .edgt-pl-outer .edgt-product-list-category a:hover',
            '.edgt-woocommerce-page table.cart tr.cart_item td.product-subtotal',
            '.edgt-woocommerce-page .cart-collaterals table tr.order-total .amount',
            '.edgt-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
            '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
            '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
            '.widget.woocommerce.widget_layered_nav_filters a:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .widget.woocommerce.widget_layered_nav a:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .widget.woocommerce.widget_product_categories a:hover',
            '.widget.woocommerce.widget_layered_nav a:hover body.edgt-page-content-skin-light',
            '.widget.woocommerce.widget_product_categories a:hover body.edgt-page-content-skin-light',
            '.widget.woocommerce.widget_products ul li a:hover .product-title',
            '.widget.woocommerce.widget_recent_reviews ul li a:hover .product-title',
            '.widget.woocommerce.widget_recently_viewed_products ul li a:hover .product-title',
            '.widget.woocommerce.widget_top_rated_products ul li a:hover .product-title',
            '.widget.woocommerce.widget_products ul li .amount',
            '.widget.woocommerce.widget_recent_reviews ul li .amount',
            '.widget.woocommerce.widget_recently_viewed_products ul li .amount',
            '.widget.woocommerce.widget_top_rated_products ul li .amount',
            '.widget.woocommerce.widget_recent_reviews a:hover',
            '.widget.woocommerce.widget_product_search .woocommerce-product-search:after:hover',
            '.edgt-shopping-cart-dropdown .edgt-item-info-holder .remove:hover',
            '.edgt-shopping-cart-dropdown .edgt-cart-bottom .edgt-view-cart:hover',
            '.edgt-shopping-cart-dropdown .edgt-cart-bottom .edgt-checkout:hover',
            '#bbpress-forums div.bbp-breadcrumb .bbp-breadcrumb-home:hover',
            '#bbpress-forums .bbp-body>ul>li a:hover',
            '#bbpress-forums .forum-titles>li a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums .bbp-body>ul>li a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums .forum-titles>li a:hover',
            '#bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness>a:hover',
            '#bbpress-forums li.bbp-body ul.forum li.bbp-topic-freshness>a:hover',
            '#bbpress-forums li.bbp-body ul.topic li.bbp-forum-freshness>a:hover',
            '#bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness>a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness>a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums li.bbp-body ul.forum li.bbp-topic-freshness>a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums li.bbp-body ul.topic li.bbp-forum-freshness>a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness>a:hover',
            '#bbpress-forums .bbp-topic-started-by .bbp-author-name:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums .bbp-topic-started-by .bbp-author-name:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums #favorite-toggle a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums #subscription-toggle a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums .bbp-topic-tags a:hover',
            '#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a',
            '#bbpress-forums #bbp-single-user-details #bbp-user-navigation li a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums .bbp-admin-links a:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums a.bbp-reply-permalink:hover',
            '#bbpress-forums .bbp-topics ul.sticky:after',
            'body.bbpress.edgt-bbpress-dark-skin a:hover',
            '.edgt-sidebar .widget.widget_display_forums ul li a:hover',
            '.edgt-sidebar .widget.widget_display_replies ul li a:hover',
            '.edgt-sidebar .widget.widget_display_topics ul li a:hover',
            '.edgt-sidebar .widget.widget_display_views ul li a:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .widget.widget_display_forums ul li a:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .widget.widget_display_replies ul li a:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .widget.widget_display_topics ul li a:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .widget.widget_display_views ul li a:hover',
            '.edgt-sidebar .widget_display_search #bbp-search-form.edgt-search-menu-holder .edgt-form-holder:before:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .widget_display_search #bbp-search-form.edgt-search-menu-holder .edgt-form-holder:before:hover',
            '.edgt-sidebar .widget_display_stats ul li a:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .widget_display_stats ul li a:hover',
            '.edgt-sidebar .bbp_widget_login button:hover',
            '.edgt-bbpress-dark-skin .edgt-sidebar .bbp_widget_login button:hover'
        );

        $return_array['color_selector_new'] = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover',
            'a:hover',
            'p a:hover',
            'body.edgt-page-content-skin-light a:hover',
            'body.edgt-page-content-skin-light p a:hover',
            '.edgt-like.liked',
            '.wpb_widgetised_column .widget ul li a:hover',
            'aside.edgt-sidebar .widget ul li a:hover',
            '.wpb_widgetised_column .widget.widget_search .edgt-search-form input[type=submit]:hover',
            'aside.edgt-sidebar .widget.widget_search .edgt-search-form input[type=submit]:hover',
            '.wpb_widgetised_column .widget.widget_nav_menu ul.menu li a.edgt-custom-menu-active',
            'aside.edgt-sidebar .widget.widget_nav_menu ul.menu li a.edgt-custom-menu-active',
            '.wpb_widgetised_column .widget.widget_nav_menu ul.menu li a:hover',
            'aside.edgt-sidebar .widget.widget_nav_menu ul.menu li a:hover',
            '.wpb_widgetised_column .widget.widget_nav_menu ul.menu li.current-menu-item>a',
            'aside.edgt-sidebar .widget.widget_nav_menu ul.menu li.current-menu-item>a',
            '.wpb_widgetised_column .widget.widget_product_tag_cloud .tagcloud a',
            '.wpb_widgetised_column .widget.widget_tag_cloud .tagcloud a',
            'aside.edgt-sidebar .widget.widget_product_tag_cloud .tagcloud a',
            'aside.edgt-sidebar .widget.widget_tag_cloud .tagcloud a',
            '.wpb_widgetised_column .widget.widget_edgt_twitter_widget .edgt-twitter-widget-holder.edgt-light .edgt-tweet-holder a:hover',
            '.wpb_widgetised_column .widget.widget_edgt_twitter_widget .edgt-twitter-widget-holder.edgt-light .edgt-tweet-time a:hover',
            'aside.edgt-sidebar .widget.widget_edgt_twitter_widget .edgt-twitter-widget-holder.edgt-light .edgt-tweet-holder a:hover',
            'aside.edgt-sidebar .widget.widget_edgt_twitter_widget .edgt-twitter-widget-holder.edgt-light .edgt-tweet-time a:hover',
            '.wpb_widgetised_column .widget.widget_edgt_twitter_widget .edgt-tweet-time a:hover',
            'aside.edgt-sidebar .widget.widget_edgt_twitter_widget .edgt-tweet-time a:hover',
            '.wpb_widgetised_column .widget.widget_edgt_twitter_widget .edgt-tweet-text a:hover',
            'aside.edgt-sidebar .widget.widget_edgt_twitter_widget .edgt-tweet-text a:hover',
            '.edgt-main-menu ul .edgt-menu-featured-icon',
            '.edgt-main-menu>ul>li.current-menu-item>a',
            '.edgt-main-menu>ul>li.edgt-active-item>a',
            '.edgt-drop-down .second .inner ul li ul li:hover>a',
            '.edgt-drop-down .second .inner ul li.current-menu-item>a',
            '.edgt-drop-down .second .inner ul li.current-menu-parent>a',
            '.edgt-drop-down .second .inner ul li.sub ul li:hover>a',
            '.edgt-drop-down .second .inner>ul>li:hover>a',
            '.edgt-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
            '.edgt-drop-down .wide .second ul li .flexslider ul li a:hover',
            '.edgt-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
            '.edgt-header-vertical .edgt-vertical-dropdown-float .second .inner ul li.edgt-active-item>a',
            '.edgt-header-vertical .edgt-vertical-dropdown-float .second .inner ul li:hover>a',
            '.edgt-header-vertical .edgt-vertical-menu .edgt-menu-featured-icon',
            '.edgt-mobile-header .edgt-mobile-nav a:hover',
            '.edgt-mobile-header .edgt-mobile-nav h4:hover',
            '.edgt-mobile-header .edgt-mobile-menu-opener a:hover',
            '.edgt-page-header .edgt-sticky-header .edgt-search-opener:hover',
            '.edgt-page-header .edgt-sticky-header .edgt-side-menu-button-opener:hover',
            'footer .edgt-footer-bottom-holder .widget .searchform input[type=submit]:hover',
            'footer .edgt-footer-top-holder .widget .searchform input[type=submit]:hover',
            'footer .edgt-footer-bottom-holder .widget.widget_edgt_twitter_widget .edgt-tweet-time a:hover',
            'footer .edgt-footer-top-holder .widget.widget_edgt_twitter_widget .edgt-tweet-time a:hover',
            'footer .edgt-footer-bottom-holder .widget.widget_edgt_twitter_widget .edgt-tweet-text a:hover',
            'footer .edgt-footer-top-holder .widget.widget_edgt_twitter_widget .edgt-tweet-text a:hover',
            '.edgt-side-menu a:not(.qbutton):hover',
            '.edgt-side-menu .widget .searchform input[type=submit]:hover',
            '.edgt-fullscreen-menu-opener:hover .edgt-fsm-first-line',
            '.edgt-fullscreen-menu-opener:hover .edgt-fsm-second-line',
            '.edgt-fullscreen-menu-opener:hover .edgt-fsm-third-line',
            'nav.edgt-fullscreen-menu ul>li:hover>a',
            '.edgt-search-cover .edgt-search-close a:hover',
            '.edgt-portfolio-single-holder .edgt-portfolio-fields .edgt-portfolio-info-item p a:hover',
            '.edgt-portfolio-single-nav .edgt-single-nav-content-holder .edgt-single-nav-label-holder:hover',
            '.edgt-match-single-nav .edgt-single-nav-content-holder .edgt-single-nav-label-holder:hover',
            '.edgt-counter-holder .edgt-counter',
            '.edgt-countdown .countdown-amount',
            '.edgt-countdown .countdown-period',
            '.edgt-message .edgt-message-inner a.edgt-close i:hover',
            '.edgt-ordered-list ol>li:before',
            '.edgt-unordered-list ul>li:before',
            '.edgt-icon-list-item .edgt-icon-list-icon-holder-inner .font_elegant',
            '.edgt-icon-list-item .edgt-icon-list-icon-holder-inner i',
            '.edgt-blog-slider-holder.simple .edgt-blog-slider-item .edgt-avatar-date-author .edgt-date-author .edgt-author a:hover',
            '.edgt-testimonials .edgt-testimonial-quote span',
            '.edgt-pie-chart-with-icon-holder .edgt-percentage-with-icon i',
            '.edgt-pie-chart-with-icon-holder .edgt-percentage-with-icon span',
            '.edgt-accordion-holder.edgt-boxed .edgt-title-holder .edgt-accordion-mark',
            '.edgt-accordion-holder.edgt-boxed .edgt-title-holder.ui-state-hover',
            '.edgt-light-skin.edgt-accordion-holder.edgt-boxed .edgt-title-holder.ui-state-active',
            '.edgt-light-skin.edgt-accordion-holder:not(.edgt-boxed) .edgt-title-holder.ui-state-active',
            '.edgt-light-skin.edgt-accordion-holder.edgt-boxed .edgt-title-holder.ui-state-active .edgt-accordion-mark',
            '.edgt-light-skin.edgt-accordion-holder:not(.edgt-boxed) .edgt-title-holder.ui-state-active .edgt-accordion-mark',
            '.edgt-light-skin.edgt-accordion-holder.edgt-boxed .edgt-title-holder.ui-state-hover',
            '.edgt-light-skin.edgt-accordion-holder:not(.edgt-boxed) .edgt-title-holder.ui-state-hover',
            '.edgt-blog-list-holder.edgt-simple .edgt-blog-list-item .edgt-avatar-date-author .edgt-date-author .edgt-author a:hover',
            '.edgt-title-description .edgt-image-gallery-title'
        );

		//generate color important selector array
		$return_array['color_important_selector'] = array(
		);

		//generate background color selectors array
		$return_array['background_color_selector'] = array(

            'body.edgt-paspartu-enabled .edgt-wrapper-paspartu',
            '.edgt-smooth-transition-loader',
            '.edgt-st-loader .pulse',
            '.edgt-st-loader .double_pulse .double-bounce1',
            '.edgt-st-loader .double_pulse .double-bounce2',
            '.edgt-st-loader .cube',
            '.edgt-st-loader .rotating_cubes .cube1',
            '.edgt-st-loader .rotating_cubes .cube2',
            '.edgt-st-loader .stripes>div',
            '.edgt-st-loader .wave>div',
            '.edgt-st-loader .two_rotating_circles .dot1',
            '.edgt-st-loader .two_rotating_circles .dot2',
            '.edgt-st-loader .five_rotating_circles .container1>div',
            '.edgt-st-loader .five_rotating_circles .container2>div',
            '.edgt-st-loader .five_rotating_circles .container3>div',
            '.edgt-st-loader .atom .ball-1:before',
            '.edgt-st-loader .atom .ball-2:before',
            '.edgt-st-loader .atom .ball-3:before',
            '.edgt-st-loader .atom .ball-4:before',
            '.edgt-st-loader .clock .ball:before',
            '.edgt-st-loader .mitosis .ball',
            '.edgt-st-loader .lines .line1',
            '.edgt-st-loader .lines .line2',
            '.edgt-st-loader .lines .line3',
            '.edgt-st-loader .lines .line4',
            '.edgt-st-loader .fussion .ball',
            '.edgt-st-loader .fussion .ball-1',
            '.edgt-st-loader .fussion .ball-2',
            '.edgt-st-loader .fussion .ball-3',
            '.edgt-st-loader .fussion .ball-4',
            '.edgt-st-loader .wave_circles .ball',
            '.edgt-st-loader .pulse_circles .ball',
            '.edgt-comment-holder .edgt-comment-reply-holder a:after',
            'body.edgt-page-content-skin-light .comment-respond .form-submit>input[type=submit]:hover',
            '.wpb_widgetised_column .widget.widget_product_tag_cloud .tagcloud a:hover',
            '.wpb_widgetised_column .widget.widget_tag_cloud .tagcloud a:hover',
            'aside.edgt-sidebar .widget.widget_product_tag_cloud .tagcloud a:hover',
            'aside.edgt-sidebar .widget.widget_tag_cloud .tagcloud a:hover',
            '#ui-datepicker-div .ui-datepicker-today',
            '.edgt-header-vertical .edgt-vertical-dropdown-float .second .inner ul li a .item_text:after',
            'nav.edgt-fullscreen-menu ul>li:hover>a .edgt-strikethrough',
            '.edgt-team .edgt-phone-number-holder',
            '.edgt-progress-bar .edgt-progress-content-outer .edgt-progress-content',
            '.edgt-blog-slider-holder.masonry article.format-link .edgt-post-text',
            '.edgt-blog-slider-holder.masonry article.format-quote .edgt-post-text',
            '.edgt-testimonials .edgt-testimonial-content .edgt-quote-image',
            '.edgt-pie-chart-doughnut-holder .edgt-pie-legend ul li .edgt-pie-color-holder',
            '.edgt-pie-chart-pie-holder .edgt-pie-legend ul li .edgt-pie-color-holder',
            '.edgt-tabs.edgt-horizontal .edgt-tabs-nav li.ui-tabs-active:after',
            '.edgt-accordion-holder.edgt-boxed .edgt-title-holder.ui-state-active',
            '.edgt-btn.edgt-btn-solid',
            '.edgt-btn.edgt-btn-underline .edgt-btn-underline-line',
            'blockquote .edgt-blockquote-text',
            '.edgt-video-button-play .edgt-video-button-wrapper',
            '.edgt-dropcaps.edgt-circle',
            '.edgt-dropcaps.edgt-square',
            '.edgt-video-banner-holder .edgt-vb-overlay-tc .edgt-vb-play-icon',
            '.edgt-comparision-pricing-tables-holder .edgt-comparision-table-holder .edgt-featured-comparision-package',
            '.edgt-pl-holder .edgt-pl-item .edgt-on-sale',
            '#multiscroll-nav ul li .active span',
            '.widget_edgt_call_to_action_button .edgt-call-to-action-button',
            '.edgt-sidebar-holder aside.edgt-sidebar .widget_edgt_info_widget',
            '.edgt-blog-holder.edgt-blog-type-masonry article.format-link .edgt-post-text',
            '.edgt-blog-list-holder.edgt-masonry article.format-link .edgt-post-text',
            '.edgt-blog-holder.edgt-blog-type-masonry article.format-quote .edgt-post-text',
            '.edgt-blog-list-holder.edgt-masonry article.format-quote .edgt-post-text',
            '.edgt-blog-holder.edgt-blog-type-masonry-gallery article.format-quote',
            '.edgt-blog-holder.edgt-blog-type-masonry-gallery article.format-link',
            '.edgt-blog-holder.edgt-blog-type-standard article.format-link',
            '.edgt-blog-holder.edgt-blog-type-standard article.format-quote',
            '.mejs-controls .mejs-time-rail .mejs-time-current:after',
            '.edgt-menu-area .edgt-position-right #lang_sel ul ul li a:before',
            '.edgt-sticky-header .edgt-position-right #lang_sel ul ul li a:before',
            '.slick-slider .slick-dots li.slick-active button:before',
            '.woocommerce .edgt-on-sale',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .edgt-on-sale',
            'body.edgt-page-content-skin-light .edgt-on-sale',
            '.edgt-woo-single-page .woocommerce-tabs ul.tabs>li.active a:after',
            '.edgt-woo-single-page .woocommerce-tabs ul.tabs>li:hover a:after',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin.edgt-woo-single-page .woocommerce-tabs #reviews .comment-respond input[type=submit]:hover',
            'ul.products>.product .edgt-pl-outer .edgt-pl-inner .edgt-pl-cart .edgt-pl-cart-inner a:hover',
            'ul.products>.product .edgt-pl-outer .edgt-pl-inner .edgt-pl-cart a.added_to_cart',
            '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
            '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
            '.edgt-shopping-cart-holder .edgt-header-cart .edgt-cart-number',
            '.edgt-shopping-cart-dropdown',
            '#bbpress-forums button:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums div.wp-editor-container .button-secondary:hover',
            '.edgt-bbpress-dark-skin #bbpress-forums div.wp-editor-container .button:hover'
        );

		//generate background color selectors array
		$return_array['background_color_important_selector'] = array(
            '.edgt-btn.edgt-btn-hover-solid:not(.edgt-btn-custom-hover-bg):not(.edgt-btn-with-animation):hover'
        );

		//generate border color selectors array
		$return_array['border_color_selector'] = array(

            '.edgt-st-loader .pulse_circles .ball',
            'body.edgt-page-content-skin-light .edgt-comment-holder',
            'body.edgt-page-content-skin-light .comment-respond .form-submit>input[type=submit]:hover',
            '.wpcf7-form-control.wpcf7-date:focus',
            '.wpcf7-form-control.wpcf7-number:focus',
            '.wpcf7-form-control.wpcf7-quiz:focus',
            '.wpcf7-form-control.wpcf7-select:focus',
            '.wpcf7-form-control.wpcf7-text:focus',
            '.wpcf7-form-control.wpcf7-textarea:focus',
            '.post-password-form input[type=password]:focus',
            '#respond input[type=text]:focus',
            '#respond textarea:focus',
            'body.edgt-page-content-skin-light #respond input[type=text]:focus',
            'body.edgt-page-content-skin-light #respond textarea:focus',
            '.wpb_widgetised_column .widget.widget_product_tag_cloud .tagcloud a',
            '.wpb_widgetised_column .widget.widget_tag_cloud .tagcloud a',
            'aside.edgt-sidebar .widget.widget_product_tag_cloud .tagcloud a',
            'aside.edgt-sidebar .widget.widget_tag_cloud .tagcloud a',
            '.edgt-confirmation-form .wpcf7-form-control.wpcf7-date:focus',
            '.edgt-confirmation-form .wpcf7-form-control.wpcf7-email:focus',
            '.edgt-confirmation-form .wpcf7-form-control.wpcf7-text:focus',
            '.edgt-confirmation-form .wpcf7-form-control.wpcf7-textarea:focus',
            '.edgt-light-skin.edgt-accordion-holder.edgt-boxed .edgt-title-holder.ui-state-active',
            '.edgt-light-skin.edgt-accordion-holder:not(.edgt-boxed) .edgt-title-holder.ui-state-active',
            '.edgt-btn.edgt-btn-solid',
            '.woocommerce-page .edgt-content input[type=email]:focus',
            '.woocommerce-page .edgt-content input[type=password]:focus',
            '.woocommerce-page .edgt-content input[type=tel]:focus',
            '.woocommerce-page .edgt-content input[type=text]:focus',
            '.woocommerce-page .edgt-content textarea:focus',
            'div.woocommerce input[type=email]:focus',
            'div.woocommerce input[type=password]:focus',
            'div.woocommerce input[type=tel]:focus',
            'div.woocommerce input[type=text]:focus',
            'div.woocommerce textarea:focus',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=email]:focus',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=email]:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=password]:focus',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=password]:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=tel]:focus',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=tel]:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=text]:focus',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin input[type=text]:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin textarea:focus',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin textarea:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin.edgt-woo-single-page .woocommerce-tabs #reviews .comment-respond input[type=submit]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content input[type=email]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content input[type=email]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content input[type=tel]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content input[type=tel]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content input[type=text]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content input[type=text]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content textarea:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .edgt-content textarea:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .w .edgt-content input[type=password]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin .w .edgt-content input[type=password]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=email]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=email]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=password]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=password]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=tel]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=tel]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=text]:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce input[type=text]:hover',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce textarea:focus',
            '.edgt-woocommerce-page.woocommerce-checkout.edgt-woocommerce-dark-skin div.woocommerce textarea:hover',
            '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
            'ul.products>.product .edgt-pl-outer .edgt-pl-inner .edgt-pl-cart a.added_to_cart',
            'ul.products>.product .edgt-pl-outer .edgt-pl-inner .edgt-pl-cart .edgt-pl-cart-inner a:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .wpb_widgetised_column .widget.widget_product_tag_cloud .tagcloud a:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .wpb_widgetised_column .widget.widget_tag_cloud .tagcloud a:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin aside.edgt-sidebar .widget.widget_product_tag_cloud .tagcloud a:hover',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin aside.edgt-sidebar .widget.widget_tag_cloud .tagcloud a:hover',
            '#bbpress-forums fieldset.bbp-form input[type=text]:focus',
            '#bbpress-forums fieldset.bbp-form select:focus',
            '#bbpress-forums fieldset.bbp-form textarea:focus',
            '.edgt-bbpress-dark-skin #bbpress-forums fieldset.bbp-form input[type=text]:focus',
            '.edgt-bbpress-dark-skin #bbpress-forums fieldset.bbp-form select:focus',
            '.edgt-bbpress-dark-skin #bbpress-forums fieldset.bbp-form textarea:focus',
            '.edgt-bbpress-dark-skin #bbpress-forums #bbp-user-wrapper h2.entry-title',
            '#bbpress-forums #bbp-your-profile fieldset input:focus',
            '#bbpress-forums #bbp-your-profile fieldset textarea:focus',
            '.edgt-bbpress-dark-skin #bbpress-forums #bbp-your-profile fieldset input:focus',
            '.edgt-bbpress-dark-skin #bbpress-forums #bbp-your-profile fieldset textarea:focus',
            '#bbpress-forums button:hover',
            '.edgt-sidebar .bbp_widget_login input[type=password]:focus',
            '.edgt-sidebar .bbp_widget_login input[type=text]:focus',
            '.edgt-bbpress-dark-skin .edgt-sidebar .bbp_widget_login input[type=password]:focus',
            '.edgt-bbpress-dark-skin .edgt-sidebar .bbp_widget_login input[type=text]:focus',
            '.bbpress .wpb_widgetised_column .widget>.edgt-sidearea-title',
            '.bbpress .wpb_widgetised_column .widget>.edgt-widget-title',
            '.bbpress aside.edgt-sidebar .widget>.edgt-sidearea-title',
            '.bbpress aside.edgt-sidebar .widget>.edgt-widget-title',

        );

		$return_array['border_color_important_selector'] = array(
            '.edgt-btn.edgt-btn-hover-solid:not(.edgt-btn-custom-border-hover):hover'
		);

		$return_array['stroke_color_selector'] = array(
            '.edgt-preloader svg circle'
		);

        $return_array['shadow_selector'] = array(
            '.slick-slider .slick-dots li.slick-active button',
            '.slick-slider .slick-dots li button'
        );

		$return_array['border_top_color_selector'] = array(
			'.edgt-progress-bar .edgt-progress-number-wrapper.edgt-floating .edgt-down-arrow',
            '.edgt-tabs.edgt-horizontal.edgt-light-skin .edgt-tab-container',
            '.edgt-comparision-pricing-tables-holder .edgt-comparision-table-holder'
		);

		$return_array['border_bottom_color_selector'] = array(
			'body.edgt-page-content-skin-light .wpb_widgetised_column .widget .edgt-sidearea-title',
            'body.edgt-page-content-skin-light .wpb_widgetised_column .widget .edgt-widget-title',
            'body.edgt-page-content-skin-light aside.edgt-sidebar .widget .edgt-sidearea-title',
            'body.edgt-page-content-skin-light aside.edgt-sidebar .widget .edgt-widget-title',
            '.edgt-page-content-skin-light .single-match-item .edgt-match-info-item .edgt-match-item-title',
            '.single-match-item.edgt-page-content-skin-light .edgt-match-info-item .edgt-match-item-title',
            '.edgt-card-slider-holder .edgt-card-slide .edgt-card-content .edgt-separator',
            '.edgt-mini-text-slider .edgt-separator',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-standard .edgt-tags a:hover',
            '.edgt-blog-holder.edgt-blog-single.edgt-blog-image-title .edgt-tags a:hover',
            '.edgt-menu-area .edgt-position-right #lang_sel_list ul li a:hover',
            '.edgt-sticky-header .edgt-position-right #lang_sel_list ul li a:hover',
            'ul.products>.product .edgt-pl-outer .edgt-pl-inner .edgt-pl-image',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .wpb_widgetised_column .widget>.edgt-sidearea-title',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin .wpb_widgetised_column .widget>.edgt-widget-title',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin aside.edgt-sidebar .widget>.edgt-sidearea-title',
            '.edgt-woocommerce-page.edgt-woocommerce-dark-skin aside.edgt-sidebar .widget>.edgt-widget-title',
            '.edgt-shopping-cart-dropdown .edgt-cart-bottom .edgt-subtotal-holder',
            '.edgt-bbpress-dark-skin #bbpress-forums div.bbp-breadcrumb'

		);


		return $return_array;

	}

}

if (!function_exists('eldritch_edge_attachment_image_additional_fields')) {
	/**
	 *
	 * @param $form_fields array, fields to include in attachment form
	 * @param $post object, attachment record in database
	 *
	 * @return mixed
	 */
	function eldritch_edge_attachment_image_additional_fields($form_fields, $post) {


		// ADDING IMAGE LINK FILED - START //

		$form_fields['attachment - image - link'] = array(
			'label'       => 'Image Link',
			'input'       => 'text',
			'application' => 'image',
			'exclusions'  => array('audio', 'video'),
			'value'       => get_post_meta($post->ID, 'attachment_image_link', true)
		);

		// ADDING IMAGE LINK FILED - END //

		// ADDING IMAGE TARGET FILED - START //

		$options_image_target = array(
			'_selft' => esc_html__('Same Window', 'eldritch'),
			'_blank' => esc_html__('New Window', 'eldritch'),
		);

		$html_image_target = '';
		$selected_image_target = get_post_meta($post->ID, 'attachment_image_target', true);

		$html_image_target .= ' < select name = "attachments[' . $post->ID . '][attachment-image-target]" class="attachment-image-target" data - setting = "attachment-image-target" > ';
		// Browse and add the options
		foreach ($options_image_target as $key => $value) {
			if ($key == $selected_image_target) {
				$html_image_target .= '<option value = "' . $key . '" selected > ' . $value . '</option > ';
			} else {
				$html_image_target .= '<option value = "' . $key . '" > ' . $value . '</option > ';
			}
		}

		$html_image_target .= '</select > ';

		$form_fields['attachment - image - target'] = array(
			'label'       => 'Image Target',
			'input'       => 'html',
			'html'        => $html_image_target,
			'application' => 'image',
			'exclusions'  => array('audio', 'video'),
			'value'       => get_post_meta($post->ID, 'attachment_image_target', true)
		);

		// ADDING IMAGE TARGET FILED - END //

		return $form_fields;
	}

	add_filter('attachment_fields_to_edit', 'eldritch_edge_attachment_image_additional_fields', 10, 2);

}

if (!function_exists('eldritch_edge_attachment_image_additional_fields_save')) {
	/**
	 * Save values of Attachment Image sizes in media uploader
	 *
	 * @param $post array, the post data for database
	 * @param $attachment array, attachment fields from $_POST form
	 *
	 * @return mixed
	 */
	function eldritch_edge_attachment_image_additional_fields_save($post, $attachment) {

		if (isset($attachment['attachment - image - link'])) {
			update_post_meta($post['ID'], 'attachment_image_link', $attachment['attachment - image - link']);
		}

		if (isset($attachment['attachment - image - target'])) {
			update_post_meta($post['ID'], 'attachment_image_target', $attachment['attachment - image - target']);
		}


		return $post;

	}

	add_filter('attachment_fields_to_save', 'eldritch_edge_attachment_image_additional_fields_save', 10, 2);
}
if ( ! function_exists( 'eldritch_edge_is_gutenberg_installed' ) ) {
	/**
	 * Function that checks if Gutenberg plugin installed
	 * @return bool
	 */
	function eldritch_edge_is_gutenberg_installed() {
		return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
	}
}

if ( ! function_exists( 'eldritch_edge_get_module_part' ) ) {
	function eldritch_edge_get_module_part( $module ) {
		return $module;
	}
}
