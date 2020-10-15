<?php

require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.kses.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.layout-part1.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.layout-part2.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.layout-part3.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.optionsapi.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.framework.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.functions.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.common.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/lib/edgt.icons/edgt.icons.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/admin/options/edgt-options-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/admin/meta-boxes/edgt-meta-boxes-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR."/modules/edgt-modules-loader.php";

global $eldritch_Framework;

if(!function_exists('eldritch_edge_admin_scripts_init')) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function eldritch_edge_admin_scripts_init() {
		/**
		 * @see EdgeSkinAbstract::registerScripts - hooked with 10
		 * @see EdgeSkinAbstract::registerStyles - hooked with 10
		 */
		do_action('eldritch_edge_admin_scripts_init');
	}

	add_action('admin_init', 'eldritch_edge_admin_scripts_init');
}

if(!function_exists('eldritch_edge_enqueue_admin_styles')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function eldritch_edge_enqueue_admin_styles() {
		wp_enqueue_style('wp-color-picker');

		/**
		 * @see EdgeSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action('eldritch_edge_enqueue_admin_styles');
	}
}

if(!function_exists('eldritch_edge_enqueue_admin_scripts')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function eldritch_edge_enqueue_admin_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('edgt-dependence');
		wp_enqueue_script('edgt-twitter-connect');
		wp_enqueue_script('edgt-dependence', get_template_directory_uri().'/framework/admin/assets/js/edgt-ui/edgt-dependence.js', array(), false, true);
		wp_enqueue_script('edgt-twitter-connect', get_template_directory_uri().'/framework/admin/assets/js/edgt-twitter-connect.js', array(), false, true);

		/**
		 * @see EdgeSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action('eldritch_edge_enqueue_admin_scripts');
	}
}

if(!function_exists('eldritch_edge_enqueue_meta_box_styles')) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function eldritch_edge_enqueue_meta_box_styles() {
		wp_enqueue_style('wp-color-picker');

		/**
		 * @see EdgeSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action('eldritch_edge_enqueue_meta_box_styles');
	}
}

if(!function_exists('eldritch_edge_enqueue_meta_box_scripts')) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function eldritch_edge_enqueue_meta_box_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('edgt-dependence');

		/**
		 * @see EdgeSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action('eldritch_edge_enqueue_meta_box_scripts');
	}
}

if(!function_exists('eldritch_edge_enqueue_nav_menu_script')) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function eldritch_edge_enqueue_nav_menu_script($hook) {
		if($hook == 'nav-menus.php') {
			wp_enqueue_script('edgt-nav-menu', get_template_directory_uri().'/framework/admin/assets/js/edgt-nav-menu.js');
			wp_enqueue_style('edgt-nav-menu', get_template_directory_uri().'/framework/admin/assets/css/edgt-nav-menu.css');
		}
	}

	add_action('admin_enqueue_scripts', 'eldritch_edge_enqueue_nav_menu_script');
}


if(!function_exists('eldritch_edge_enqueue_widgets_admin_script')) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 *
	 * @param $hook string current page hook to check
	 */
	function eldritch_edge_enqueue_widgets_admin_script($hook) {
		if($hook == 'widgets.php') {
			wp_enqueue_script('edgt-dependence');
		}
	}

	add_action('admin_enqueue_scripts', 'eldritch_edge_enqueue_widgets_admin_script');
}


if(!function_exists('eldritch_edge_enqueue_styles_slider_taxonomy')) {
	/**
	 * Enqueue styles when on slider taxonomy page in admin
	 */
	function eldritch_edge_enqueue_styles_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			eldritch_edge_enqueue_admin_styles();
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'eldritch_edge_enqueue_styles_slider_taxonomy');
}

if(!function_exists('eldritch_edge_init_theme_options_array')) {
	/**
	 * Function that merges $eldritch_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function eldritch_edge_init_theme_options_array() {
		global $eldritch_options, $eldritch_Framework;

		$db_options = get_option('edgt_options_eldritch');

		//does edgt_options exists in db?
		if(is_array($db_options)) {
			//merge with default options
			$eldritch_options = array_merge($eldritch_Framework->edgtOptions->options, get_option('edgt_options_eldritch'));
		} else {
			//options don't exists in db, take default ones
			$eldritch_options = $eldritch_Framework->edgtOptions->options;
		}
	}

	add_action('eldritch_edge_after_options_map', 'eldritch_edge_init_theme_options_array', 0);
}

if(!function_exists('eldritch_edge_init_theme_options')) {
	/**
	 * Function that sets $eldritch_options variable if it does'nt exists
	 */
	function eldritch_edge_init_theme_options() {
		global $eldritch_options;
		global $eldritch_Framework;
		if(isset($eldritch_options['reset_to_defaults'])) {
			if($eldritch_options['reset_to_defaults'] == 'yes') {
				delete_option("edgt_options_eldritch");
			}
		}

		if(!get_option("edgt_options_eldritch")) {
			add_option("edgt_options_eldritch",
				$eldritch_Framework->edgtOptions->options
			);

			$eldritch_options = $eldritch_Framework->edgtOptions->options;
		}
	}
}

if(!function_exists('eldritch_edge_register_theme_settings')) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function eldritch_edge_register_theme_settings() {
		register_setting('eldritch_edge_theme_menu', 'edgt_options');
	}

	add_action('admin_init', 'eldritch_edge_register_theme_settings');
}

if(!function_exists('eldritch_edge_get_admin_tab')) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function eldritch_edge_get_admin_tab() {
		return isset($_GET['page']) ? eldritch_edge_strafter($_GET['page'], 'tab') : null;
	}
}

if(!function_exists('eldritch_edge_strafter')) {
	/**
	 * Function that returns string that comes after found string
	 *
	 * @param $string string where to search
	 * @param $substring string what to search for
	 *
	 * @return null|string string that comes after found string
	 */
	function eldritch_edge_strafter($string, $substring) {
		$pos = strpos($string, $substring);
		if($pos === false) {
			return null;
		}

		return (substr($string, $pos + strlen($substring)));
	}
}

if(!function_exists('eldritch_edge_save_options')) {
	/**
	 * Function that saves theme options to db.
	 */
	function eldritch_edge_save_options() {
		global $eldritch_options;

        if(current_user_can('administrator')) {

            $_REQUEST = stripslashes_deep($_REQUEST);

            check_ajax_referer( 'eldritch_edge_ajax_save_nonce', 'eldritch_edge_ajax_save_nonce' );

            unset($_REQUEST['action']);

            $eldritch_options = array_merge($eldritch_options, $_REQUEST);

            update_option('edgt_options_eldritch', $eldritch_options);

            do_action('eldritch_edge_after_theme_option_save');
            echo "Saved";

            die();
        }
	}

	add_action('wp_ajax_eldritch_edge_save_options', 'eldritch_edge_save_options');
}

if(!function_exists('eldritch_edge_meta_box_add')) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function eldritch_edge_meta_box_add() {
		global $eldritch_Framework;


		foreach($eldritch_Framework->edgtMetaBoxes->metaBoxes as $key => $box) {
			$hidden = false;
			if(!empty($box->hidden_property)) {
				foreach($box->hidden_values as $value) {
					if(eldritch_edge_option_get_value($box->hidden_property) == $value) {
						$hidden = true;
					}

				}
			}

			if(is_string($box->scope)) {
				$box->scope = array($box->scope);
			}

			if(is_array($box->scope) && count($box->scope)) {
				foreach($box->scope as $screen) {
					eldritch_edge_create_meta_box_handler( $box, $key, $screen );

					if($hidden) {
						add_filter('postbox_classes_'.$screen.'_edgt-meta-box-'.$key, 'eldritch_edge_meta_box_add_hidden_class');
					}
				}
			}

		}

		if ( eldritch_edge_is_plugin_installed( 'gutenberg-editor' ) || eldritch_edge_is_plugin_installed( 'gutenberg-plugin' ) ) {
			eldritch_edge_enqueue_meta_box_styles();
			eldritch_edge_enqueue_meta_box_scripts();
		} else {
			add_action('admin_enqueue_scripts', 'eldritch_edge_enqueue_meta_box_styles');
			add_action('admin_enqueue_scripts', 'eldritch_edge_enqueue_meta_box_scripts');
		}
	}
}

if(!function_exists('eldritch_edge_meta_box_save')) {
	/**
	 * Function that saves meta box to postmeta table
	 *
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function eldritch_edge_meta_box_save($post_id, $post) {
		global $eldritch_Framework;

		$nonces_array = array();
		$meta_boxes   = eldritch_edge_framework()->edgtMetaBoxes->getMetaBoxesByScope($post->post_type);

		if(is_array($meta_boxes) && count($meta_boxes)) {
			foreach($meta_boxes as $meta_box) {
				$nonces_array[] = 'edgt_themename_meta_box_'.$meta_box->name.'_save';
			}
		}

		if(is_array($nonces_array) && count($nonces_array)) {
			foreach($nonces_array as $nonce) {
				if(!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
					return;
				}
			}
		}

		$postTypes = array("page", "post", "portfolio-item", "testimonials", "slides", "carousels", "masonry_gallery", "product", "forum", "topic", "reply", "match-item");

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if(!isset($_POST['_wpnonce'])) {
			return;
		}

		if(!current_user_can('edit_post', $post_id)) {
			return;
		}

		if(!in_array($post->post_type, $postTypes)) {
			return;
		}

		foreach($eldritch_Framework->edgtMetaBoxes->options as $key => $box) {

			if(isset($_POST[$key]) && trim($_POST[$key] !== '')) {

				$value = $_POST[$key];

				update_post_meta($post_id, $key, $value);
			} else {
				delete_post_meta($post_id, $key);
			}
		}

		$portfolios = false;
		if(isset($_POST['optionLabel'])) {
			foreach($_POST['optionLabel'] as $key => $value) {
				$portfolios_val[$key] = array(
					'optionLabel'            => $value,
					'optionValue'            => $_POST['optionValue'][$key],
					'optionUrl'              => $_POST['optionUrl'][$key],
					'optionlabelordernumber' => $_POST['optionlabelordernumber'][$key]
				);
				$portfolios           = true;

			}
		}

		if($portfolios) {
			update_post_meta($post_id, 'edgt_portfolios', $portfolios_val);
		} else {
			delete_post_meta($post_id, 'edgt_portfolios');
		}

		$portfolio_images = false;
		if(isset($_POST['portfolioimg'])) {
			foreach($_POST['portfolioimg'] as $key => $value) {
				$portfolio_images_val[$key] = array(
					'portfolioimg'            => $_POST['portfolioimg'][$key],
					'portfoliotitle'          => $_POST['portfoliotitle'][$key],
					'portfolioimgordernumber' => $_POST['portfolioimgordernumber'][$key],
					'portfoliovideotype'      => $_POST['portfoliovideotype'][$key],
					'portfoliovideoid'        => $_POST['portfoliovideoid'][$key],
					'portfoliovideoimage'     => $_POST['portfoliovideoimage'][$key],
					'portfoliovideowebm'      => $_POST['portfoliovideowebm'][$key],
					'portfoliovideomp4'       => $_POST['portfoliovideomp4'][$key],
					'portfoliovideoogv'       => $_POST['portfoliovideoogv'][$key],
					'portfolioimgtype'        => $_POST['portfolioimgtype'][$key]
				);
				$portfolio_images           = true;
			}
		}


		if($portfolio_images) {
			update_post_meta($post_id, 'edgt_portfolio_images', $portfolio_images_val);
		} else {
			delete_post_meta($post_id, 'edgt_portfolio_images');
		}
	}

	add_action('save_post', 'eldritch_edge_meta_box_save', 1, 2);
}

if(!function_exists('eldritch_edge_render_meta_box')) {
	/**
	 * Function that renders meta box
	 *
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function eldritch_edge_render_meta_box($post, $metabox) { ?>

		<div class="edgt-meta-box edgt-page">
			<div class="edgt-meta-box-holder">

				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field('edgt_themename_meta_box_'.$metabox['args']['box']->name.'_save', 'edgt_themename_meta_box_'.$metabox['args']['box']->name.'_save'); ?>

			</div>
		</div>

		<?php
	}
}

if(!function_exists('eldritch_edge_meta_box_add_hidden_class')) {
	/**
	 * Function that adds class that will initially hide meta box
	 *
	 * @param array $classes array of classes
	 *
	 * @return array modified array of classes
	 */
	function eldritch_edge_meta_box_add_hidden_class($classes = array()) {
		if(!in_array('edgt-meta-box-hidden', $classes)) {
			$classes[] = 'edgt-meta-box-hidden';
		}

		return $classes;
	}

}

if(!function_exists('eldritch_edge_remove_default_custom_fields')) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function eldritch_edge_remove_default_custom_fields() {
		foreach(array('normal', 'advanced', 'side') as $context) {
			foreach(array("page", "post", "portfolio_page", "testimonials", "slides", "carousels") as $postType) {
				remove_meta_box('postcustom', $postType, $context);
			}
		}
	}

	add_action('do_meta_boxes', 'eldritch_edge_remove_default_custom_fields');
}


if(!function_exists('eldritch_edge_get_custom_sidebars')) {
	/**
	 * Function that returns all custom made sidebars.
	 *
	 * @uses get_option()
	 * @return array array of custom made sidebars where key and value are sidebar name
	 */
	function eldritch_edge_get_custom_sidebars() {
		$custom_sidebars = get_option('edgt_sidebars');
		$formatted_array = array();

		if(is_array($custom_sidebars) && count($custom_sidebars)) {
			foreach($custom_sidebars as $custom_sidebar) {
				$formatted_array[sanitize_title($custom_sidebar)] = $custom_sidebar;
			}
		}

		return $formatted_array;
	}
}

if(!function_exists('eldritch_edge_generate_icon_pack_options')) {
	/**
	 * Generates options HTML for each icon in given icon pack
	 */
	function eldritch_edge_generate_icon_pack_options() {
		check_ajax_referer( 'update-nav_menu', 'update_nav_menu_nonce' );

		global $eldritch_IconCollections;

		$html               = '';
		$icon_pack          = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
		$collections_object = $eldritch_IconCollections->getIconCollection($icon_pack);

		if($collections_object) {
			$icons = $collections_object->getIconsArray();
			if(is_array($icons) && count($icons)) {
				foreach($icons as $key => $icon) {
					$html .= '<option value="'.esc_attr($key).'">'.esc_html($key).'</option>';
				}
			}
		}

		echo eldritch_edge_get_module_part($html);
	}

	add_action('wp_ajax_update_admin_nav_icon_options', 'eldritch_edge_generate_icon_pack_options');
}

if(!function_exists('eldritch_edge_admin_notice')) {
	/**
	 * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
	 *
	 * @param $id string id of notice. It will be used to store notice dismis
	 * @param $message string message to show to the user
	 * @param $class string HTML class of notice
	 * @param bool $is_dismisable whether notice is dismisable or not
	 */
	function eldritch_edge_admin_notice($id, $message, $class, $is_dismisable = true) {
		$is_dismised = get_user_meta(get_current_user_id(), 'dismis_'.$id);

		//if notice isn't dismissed
		if(!$is_dismised && is_admin()) {
			echo '<div style="display: block;" class="'.esc_attr($class).' is-dismissible notice">';
			echo '<p>';

			echo wp_kses_post($message);

			if($is_dismisable) {
				echo '<strong style="display: block; margin-top: 7px;"><a href="'.esc_url(add_query_arg('edgt_dismis_notice', $id)).'">'.esc_html__('Dismiss this notice', 'eldritch').'</a></strong>';
			}

			echo '</p>';

			echo '</div>';
		}

	}
}

if(!function_exists('eldritch_edge_save_dismisable_notice')) {
	/**
	 * Updates user meta with dismisable notice. Hooks to admin_init action
	 * in order to check this on every page request in admin
	 */
	function eldritch_edge_save_dismisable_notice() {
		if(is_admin() && !empty($_GET['edgt_dismis_notice'])) {
			$notice_id       = sanitize_key($_GET['edgt_dismis_notice']);
			$current_user_id = get_current_user_id();

			update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
		}
	}

	add_action('admin_init', 'eldritch_edge_save_dismisable_notice');
}

if(!function_exists('eldritch_edge_hook_twitter_request_ajax')) {
	/**
	 * Wrapper function for obtaining twitter request token.
	 *
	 * @see EdgeTwitterApi::obtainRequestToken()
	 */
	function eldritch_edge_hook_twitter_request_ajax() {
		check_ajax_referer( 'edgtf_twitter_connect_nonce', 'twitter_connect_nonce' );
		
		EdgeTwitterApi::getInstance()->obtainRequestToken();
	}

	add_action('wp_ajax_edgt_twitter_obtain_request_token', 'eldritch_edge_hook_twitter_request_ajax');
}
?>