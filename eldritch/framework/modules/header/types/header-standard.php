<?php
namespace Eldritch\Modules\Header\Types;

use Eldritch\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Standard layout and option
 *
 * Class HeaderStandard
 */
class HeaderStandard extends HeaderType {
	protected $heightOfTransparency;
	protected $heightOfCompleteTransparency;
	protected $headerHeight;
	protected $mobileHeaderHeight;

	/**
	 * Sets slug property which is the same as value of option in DB
	 */
	public function __construct() {
		$this->slug = 'header-standard';

		if (!is_admin()) {
			$id = $id = eldritch_edge_get_page_id();
			$menuAreaHeight = eldritch_edge_filter_px(eldritch_edge_get_meta_field_intersect('menu_area_height_header_standard', $id));
			$this->menuAreaHeight = $menuAreaHeight !== '' ? $menuAreaHeight : 90;

			$mobileHeaderHeight = eldritch_edge_filter_px(eldritch_edge_options()->getOptionValue('mobile_header_height'));
			$this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? $mobileHeaderHeight : 90;

			add_action('wp', array($this, 'setHeaderHeightProps'));

			add_filter('eldritch_edge_js_global_variables', array($this, 'getGlobalJSVariables'));
			add_filter('eldritch_edge_per_page_js_vars', array($this, 'getPerPageJSVariables'));
			add_filter('eldritch_edge_add_page_custom_style', array($this, 'headerPerPageStyles'));
		}
	}

	public function headerPerPageStyles($style) {
		$id = eldritch_edge_get_page_id();
		$class_prefix = eldritch_edge_get_unique_page_class();
		$main_menu_style = array();
		$main_menu_grid_style = array();
		$disable_grid_shadow = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_shadow_header_standard', $id) == 'no';
        $current_style = '';

		$main_menu_selector = array($class_prefix . '.edgt-header-standard .edgt-menu-area');
		$main_menu_grid_selector = array($class_prefix . '.edgt-header-standard .edgt-page-header .edgt-menu-area .edgt-grid .edgt-vertical-align-containers');

		/* header style - start */

		$menu_area_background_color = get_post_meta($id, 'edgt_menu_area_background_color_header_standard_meta', true);
		$menu_area_background_transparency = get_post_meta($id, 'edgt_menu_area_background_transparency_header_standard_meta', true);

		if ($menu_area_background_transparency === '') {
			$menu_area_background_transparency = 1;
		}

		$menu_area_background_color_rgba = eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);

		if ($menu_area_background_color_rgba !== null) {
			$main_menu_style['background-color'] = $menu_area_background_color_rgba;
		}

        $menu_area_height = get_post_meta($id, 'edgt_menu_area_height_header_standard_meta', true);

        if ($menu_area_height !== '') {
            $max_height = intval(eldritch_edge_filter_px($menu_area_height) * 0.9).'px';
            $current_style .= eldritch_edge_dynamic_css('.edgt-header-standard .edgt-page-header .edgt-logo-wrapper a', array('max-height' => $max_height));

            $main_menu_style['height'] = eldritch_edge_filter_px($menu_area_height).'px';
        }

        $menu_area_disable_background_image = get_post_meta($id, 'edgt_menu_area_disable_background_image_header_standard_meta', true);
        if($menu_area_disable_background_image !== 'yes') {
            $menu_area_background_image = eldritch_edge_get_meta_field_intersect('menu_area_background_image_header_standard', $id);

            if ($menu_area_background_image !== '') {
                $main_menu_style['background-image'] = 'url(' . $menu_area_background_image . ')';
            }
        }

        $menu_area_border = eldritch_edge_get_meta_field_intersect('menu_area_border_header_standard', $id);

        if ($menu_area_border == 'yes') {

            $menu_area_border_color = eldritch_edge_get_meta_field_intersect('menu_area_border_color_header_standard', $id);
            if ($menu_area_border_color !== '') {
                $main_menu_style['border-bottom'] = '1px solid '.$menu_area_border_color.'';
            }
        }

		/* header style - end */

		/* header in grid style - start */

		if (!$disable_grid_shadow) {
			$main_menu_grid_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}

		$menu_area_grid_background_color = get_post_meta($id, 'edgt_menu_area_grid_background_color_header_standard_meta', true);
		$menu_area_grid_background_transparency = get_post_meta($id, 'edgt_menu_area_grid_background_transparency_header_standard_meta', true);

		if ($menu_area_grid_background_transparency === '') {
			$menu_area_grid_background_transparency = 1;
		}

		$menu_area_grid_background_color_rgba = eldritch_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);

		if ($menu_area_grid_background_color_rgba !== null) {
			$main_menu_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}

		/* header in grid style - end */

        $current_style .= eldritch_edge_dynamic_css($main_menu_selector, $main_menu_style);
        $current_style .= eldritch_edge_dynamic_css($main_menu_grid_selector, $main_menu_grid_style);

        $style = $current_style . $style;

        /* for horizontally portfolio */

        /*

        $header_style = array();
        if(eldritch_edge_has_protfolio_scrolling_shortcode() || eldritch_edge_has_gallery_scrolling_shortcode()){
            $header_style['margin-bottom'] = $this->calculateHeaderHeight() . 'px !important';
        }
        $current_style = eldritch_edge_dynamic_css(array($class_prefix.'.edgtf-header-standard .edgtf-page-header'), $header_style);
        $style = $current_style . $style;

        */

        return $style;
	}

	/**
	 * Loads template file for this header type
	 *
	 * @param array $parameters associative array of variables that needs to passed to template
	 */
	public function loadTemplate($parameters = array()) {
		$id = eldritch_edge_get_page_id();

		$menu_area_position = eldritch_edge_get_meta_field_intersect('menu_area_position_header_standard', $id);

		$parameters['menu_area_in_grid'] = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_header_standard', $id) == 'yes' ? true : false;
		$parameters['menu_area_position'] = !empty($menu_area_position) ? $menu_area_position : 'left';

		$parameters = apply_filters('eldritch_edge_header_standard_parameters', $parameters);

		eldritch_edge_get_module_template_part('templates/types/' . $this->slug, $this->moduleName, '', $parameters);
	}

	/**
	 * Sets header height properties after WP object is set up
	 */
	public function setHeaderHeightProps() {
		$this->heightOfTransparency = $this->calculateHeightOfTransparency();
		$this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
		$this->headerHeight = $this->calculateHeaderHeight();
		$this->mobileHeaderHeight = $this->calculateMobileHeaderHeight();
	}

	/**
	 * Returns total height of transparent parts of header
	 *
	 * @return int
	 */
	public function calculateHeightOfTransparency() {
		$id = eldritch_edge_get_page_id();
		$transparencyHeight = 0;

		if (get_post_meta($id, 'edgt_menu_area_background_color_header_standard_meta', true) !== '') {
			$menuAreaTransparent = get_post_meta($id, 'edgt_menu_area_background_color_header_standard_meta', true) !== '' &&
				get_post_meta($id, 'edgt_menu_area_background_transparency_header_standard_meta', true) !== '1';
		} elseif (eldritch_edge_options()->getOptionValue('menu_area_background_color_header_standard') == '') {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') !== '1';
		} else {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_background_color_header_standard') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '1';
		}

		$contentBehindHeader = get_post_meta($id, 'edgt_page_content_behind_header_meta', true) === 'yes';

		if ($contentBehindHeader) {
			$menuAreaTransparent = true;
		}

		if ($menuAreaTransparent) {
			$transparencyHeight = $this->menuAreaHeight;

			if (eldritch_edge_is_top_bar_enabled() && eldritch_edge_is_top_bar_transparent()) {
				$transparencyHeight += eldritch_edge_get_top_bar_height();
			}
		}

		return $transparencyHeight;
	}

	/**
	 * Returns height of completely transparent header parts
	 *
	 * @return int
	 */
	public function calculateHeightOfCompleteTransparency() {
		$id = eldritch_edge_get_page_id();
		$transparencyHeight = 0;

		if (get_post_meta($id, 'edgt_menu_area_background_color_header_standard_meta', true) !== '') {
			$menuAreaTransparent = get_post_meta($id, 'edgt_menu_area_background_color_header_standard_meta', true) !== '' &&
				get_post_meta($id, 'edgt_menu_area_background_transparency_header_standard_meta', true) === '0';
		} elseif (eldritch_edge_options()->getOptionValue('menu_area_background_color_header_standard') == '') {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') === '0';
		} else {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_background_color_header_standard') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_background_transparency_header_standard') === '0';
		}

		if ($menuAreaTransparent) {
			$transparencyHeight = $this->menuAreaHeight;
		}

		return $transparencyHeight;
	}


	/**
	 * Returns total height of header
	 *
	 * @return int|string
	 */
	public function calculateHeaderHeight() {
		$headerHeight = $this->menuAreaHeight;
		if (eldritch_edge_is_top_bar_enabled()) {
			$headerHeight += eldritch_edge_get_top_bar_height();
		}

		return $headerHeight;
	}

	/**
	 * Returns total height of mobile header
	 *
	 * @return int|string
	 */
	public function calculateMobileHeaderHeight() {
		$mobileHeaderHeight = $this->mobileHeaderHeight;

		return $mobileHeaderHeight;
	}

	/**
	 * Returns global js variables of header
	 *
	 * @param $globalVariables
	 *
	 * @return int|string
	 */
	public function getGlobalJSVariables($globalVariables) {
		$globalVariables['edgtLogoAreaHeight'] = 0;
		$globalVariables['edgtMenuAreaHeight'] = $this->headerHeight;
		$globalVariables['edgtMobileHeaderHeight'] = $this->mobileHeaderHeight;

		return $globalVariables;
	}

	/**
	 * Returns per page js variables of header
	 *
	 * @param $perPageVars
	 *
	 * @return int|string
	 */
	public function getPerPageJSVariables($perPageVars) {
		//calculate transparency height only if header has no sticky behaviour
		if (!in_array(eldritch_edge_get_meta_field_intersect('header_behaviour'), array(
			'sticky-header-on-scroll-up',
			'sticky-header-on-scroll-down-up'
		))
		) {
			$perPageVars['edgtHeaderTransparencyHeight'] = $this->headerHeight - (eldritch_edge_get_top_bar_height() + $this->heightOfCompleteTransparency);
		} else {
			$perPageVars['edgtHeaderTransparencyHeight'] = 0;
		}

		return $perPageVars;
	}
}