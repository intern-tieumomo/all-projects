<?php
namespace Eldritch\Modules\Header\Types;

use Eldritch\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Centered layout and option
 *
 * Class HeaderCentered
 */
class HeaderCentered extends HeaderType {
	protected $heightOfTransparency;
	protected $heightOfCompleteTransparency;
	protected $headerHeight;
	protected $mobileHeaderHeight;

	/**
	 * Sets slug property which is the same as value of option in DB
	 */
	public function __construct() {
		$this->slug = 'header-centered';

		if (!is_admin()) {

            $id = $id = eldritch_edge_get_page_id();

            $logoAreaHeight = eldritch_edge_filter_px(eldritch_edge_get_meta_field_intersect('logo_area_height_header_centered', $id));
			$this->logoAreaHeight = $logoAreaHeight !== '' ? intval($logoAreaHeight) : 175;

            $menuAreaHeight = eldritch_edge_filter_px(eldritch_edge_get_meta_field_intersect('menu_area_height_header_centered', $id));
			$this->menuAreaHeight = $menuAreaHeight !== '' ? intval($menuAreaHeight) : 90;

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
		$logo_area_style = array();
		$logo_area_grid_style = array();
        $current_style = '';

		$disable_logo_border = eldritch_edge_get_meta_field_intersect('logo_area_border_header_centered', $id) == 'no';
		$disable_logo_grid_border = eldritch_edge_get_meta_field_intersect('logo_area_in_grid_border_header_centered', $id) == 'no';

		$disable_menu_grid_shadow = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_shadow_header_centered', $id) == 'no';

		$main_menu_selector = array($class_prefix . '.edgt-header-centered .edgt-menu-area');
		$main_menu_grid_selector = array($class_prefix . '.edgt-header-centered .edgt-page-header .edgt-menu-area .edgt-grid .edgt-vertical-align-containers');

		$logo_area_selector = array($class_prefix . '.edgt-header-centered .edgt-page-header .edgt-logo-area');
		$logo_area_grid_selector = array($class_prefix . '.edgt-header-centered .edgt-page-header .edgt-logo-area .edgt-grid .edgt-vertical-align-containers');

		/* logo area style - start */
		if (!$disable_logo_border) {
			$logo_border_color = get_post_meta($id, 'edgt_logo_area_border_color_header_centered_meta', true);

			if ($logo_border_color !== '') {
				$logo_area_style['border'] = '1px solid ' . $logo_border_color;
			}
		}

		$logo_area_background_color = get_post_meta($id, 'edgt_logo_area_background_color_header_centered_meta', true);
		$logo_area_background_transparency = get_post_meta($id, 'edgt_logo_area_background_transparency_header_centered_meta', true);

		if ($logo_area_background_transparency === '') {
			$logo_area_background_transparency = 1;
		}

		$logo_area_background_color_rgba = eldritch_edge_rgba_color($logo_area_background_color, $logo_area_background_transparency);

		if ($logo_area_background_color_rgba !== null) {
			$logo_area_style['background-color'] = $logo_area_background_color_rgba;
		}

        $logo_area_height = get_post_meta($id, 'edgt_logo_area_height_header_centered_meta', true);
        if ($logo_area_height !== '') {
            $logo_area_style['height'] = $logo_area_height;
        }

		/* logo area style - end */

		/* logo area in grid style - start */

		if (!$disable_logo_grid_border) {
			$logo_grid_border_color = get_post_meta($id, 'edgt_logo_area_in_grid_border_color_header_centered_meta', true);

			if ($logo_grid_border_color !== '') {
				$logo_area_grid_style['border-bottom'] = '1px solid ' . $logo_grid_border_color;
			}
		}

		$logo_area_grid_background_color = get_post_meta($id, 'edgt_logo_area_grid_background_color_header_centered_meta', true);
		$logo_area_grid_background_transparency = get_post_meta($id, 'edgt_logo_area_grid_background_transparency_header_centered_meta', true);

		if ($logo_area_grid_background_transparency === '') {
			$logo_area_grid_background_transparency = 1;
		}

		$logo_area_grid_background_color_rgba = eldritch_edge_rgba_color($logo_area_grid_background_color, $logo_area_grid_background_transparency);

		if ($logo_area_grid_background_color_rgba !== null) {
			$logo_area_grid_style['background-color'] = $logo_area_grid_background_color_rgba;
		}

        $logo_area_disable_background_image = get_post_meta($id, 'edgt_logo_area_disable_background_image_header_centered_meta', true);
		if($logo_area_disable_background_image !== 'yes') {
            $logo_area_background_image = eldritch_edge_get_meta_field_intersect('logo_area_background_image_header_centered', $id);

            if ($logo_area_background_image !== '') {
                $logo_area_grid_style['background-image'] = 'url(' . $logo_area_background_image . ')';
            }
        }


		$logo_area_logo_padding = get_post_meta($id, 'edgt_logo_wrapper_padding_header_centered_meta', true);
		if ($logo_area_logo_padding !== '') {
            $current_style .= eldritch_edge_dynamic_css('.edgt-header-centered .edgt-logo-area .edgt-logo-wrapper', array('padding' => $logo_area_logo_padding));
		}

		/* logo area in grid style - end */

        $current_style .= eldritch_edge_dynamic_css($logo_area_selector, $logo_area_style);
        $current_style .= eldritch_edge_dynamic_css($logo_area_grid_selector, $logo_area_grid_style);

		/* menu area style - start */

		$menu_area_background_color = get_post_meta($id, 'edgt_menu_area_background_color_header_centered_meta', true);
		$menu_area_background_transparency = get_post_meta($id, 'edgt_menu_area_background_transparency_header_centered_meta', true);

		if ($menu_area_background_transparency === '') {
			$menu_area_background_transparency = 1;
		}

		$menu_area_background_color_rgba = eldritch_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);

		if ($menu_area_background_color_rgba !== null) {
			$main_menu_style['background-color'] = $menu_area_background_color_rgba;
		}

        $menu_area_height = get_post_meta($id, 'edgt_menu_area_height_header_centered_meta', true);

        if ($menu_area_height !== '') {
            $max_height = intval(eldritch_edge_filter_px($menu_area_height) * 0.9).'px';
            $current_style .= eldritch_edge_dynamic_css('.edgt-header-centered .edgt-page-header .edgt-logo-area .edgt-logo-wrapper a', array('max-height' => $max_height));

            $main_menu_style['height'] = eldritch_edge_filter_px($menu_area_height).'px';

        }

        $menu_area_disable_background_image = get_post_meta($id, 'edgt_menu_area_disable_background_image_header_centered_meta', true);
        if($menu_area_disable_background_image !== 'yes') {
            $menu_area_background_image = eldritch_edge_get_meta_field_intersect('menu_area_background_image_header_centered', $id);

            if ($menu_area_background_image !== '') {
                $main_menu_style['background-image'] = 'url(' . $menu_area_background_image . ')';
            }
        }

        $menu_area_border = eldritch_edge_get_meta_field_intersect('menu_area_border_header_centered', $id);

        if ($menu_area_border == 'yes') {

            $menu_area_border_color = eldritch_edge_get_meta_field_intersect('menu_area_border_color_header_centered', $id);
            if ($menu_area_border_color !== '') {
                $main_menu_style['border-bottom'] = '1px solid '.$menu_area_border_color.'';
            }
        }

		/* menu area style - end */

		/* menu area in grid style - start */

		if (!$disable_menu_grid_shadow) {
			$main_menu_grid_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}

		$menu_area_grid_background_color = get_post_meta($id, 'edgt_menu_area_grid_background_color_header_centered_meta', true);
		$menu_area_grid_background_transparency = get_post_meta($id, 'edgt_menu_area_grid_background_transparency_header_centered_meta', true);

		if ($menu_area_grid_background_transparency === '') {
			$menu_area_grid_background_transparency = 1;
		}

		$menu_area_grid_background_color_rgba = eldritch_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);

		if ($menu_area_grid_background_color_rgba !== null) {
			$main_menu_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}

		/* menu area in grid style - end */

        $current_style .= eldritch_edge_dynamic_css($main_menu_selector, $main_menu_style);
        $current_style .= eldritch_edge_dynamic_css($main_menu_grid_selector, $main_menu_grid_style);

        $style = $current_style . $style;

        return $style;
	}

	/**
	 * Loads template file for this header type
	 *
	 * @param array $parameters associative array of variables that needs to passed to template
	 */
	public function loadTemplate($parameters = array()) {
		$id = eldritch_edge_get_page_id();

		$parameters['logo_area_in_grid'] = eldritch_edge_get_meta_field_intersect('logo_area_in_grid_header_centered', $id) == 'yes' ? true : false;
		$parameters['menu_area_in_grid'] = eldritch_edge_get_meta_field_intersect('menu_area_in_grid_header_centered', $id) == 'yes' ? true : false;

		$parameters = apply_filters('eldritch_edge_header_centered_parameters', $parameters);

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

		if (get_post_meta($id, 'edgt_logo_area_background_color_header_centered_meta', true) !== '') {
			$logoAreaTransparent = get_post_meta($id, 'edgt_logo_area_background_color_header_centered_meta', true) !== '' &&
				get_post_meta($id, 'edgt_logo_area_background_transparency_header_centered_meta', true) !== '1';
		} elseif (eldritch_edge_options()->getOptionValue('logo_area_background_color_header_centered') == '') {
			$logoAreaTransparent = eldritch_edge_options()->getOptionValue('logo_area_grid_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('logo_area_grid_background_transparency_header_centered') !== '1';
		} else {
			$logoAreaTransparent = eldritch_edge_options()->getOptionValue('logo_area_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('logo_area_background_transparency_header_centered') !== '1';
		}

		if (get_post_meta($id, 'edgt_menu_area_background_color_header_centered_meta', true) !== '') {
			$menuAreaTransparent = get_post_meta($id, 'edgt_menu_area_background_color_header_centered_meta', true) !== '' &&
				get_post_meta($id, 'edgt_menu_area_background_transparency_header_centered_meta', true) !== '1';
		} elseif (eldritch_edge_options()->getOptionValue('menu_area_background_color_header_centered') == '') {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_grid_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_grid_background_transparency_header_centered') !== '1';
		} else {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_background_transparency_header_centered') !== '1';
		}

		$contentBehindHeader = get_post_meta($id, 'edgt_page_content_behind_header_meta', true) === 'yes';

		if ($contentBehindHeader) {
			$menuAreaTransparent = true;
			$logoAreaTransparent = true;
		}

		if ($logoAreaTransparent || $menuAreaTransparent) {

			if ($logoAreaTransparent) {
				$transparencyHeight = $this->logoAreaHeight + $this->menuAreaHeight;

				if (eldritch_edge_is_top_bar_enabled() && eldritch_edge_is_top_bar_transparent()) {
					$transparencyHeight += eldritch_edge_get_top_bar_height();
				}
			}

			if (!$logoAreaTransparent && $menuAreaTransparent) {
				$transparencyHeight = $this->menuAreaHeight;
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

		if (get_post_meta($id, 'edgt_logo_area_background_color_header_centered_meta', true) !== '') {
			$logoAreaTransparent = get_post_meta($id, 'edgt_logo_area_background_color_header_centered_meta', true) !== '' &&
				get_post_meta($id, 'edgt_logo_area_background_transparency_header_centered_meta', true) === '0';
		} elseif (eldritch_edge_options()->getOptionValue('logo_area_background_color_header_centered') == '') {
			$logoAreaTransparent = eldritch_edge_options()->getOptionValue('logo_area_grid_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('logo_area_grid_background_transparency_header_centered') === '0';
		} else {
			$logoAreaTransparent = eldritch_edge_options()->getOptionValue('logo_area_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('logo_area_background_transparency_header_centered') === '0';
		}


		if (get_post_meta($id, 'edgt_menu_area_background_color_header_centered_meta', true) !== '') {
			$menuAreaTransparent = get_post_meta($id, 'edgt_menu_area_background_color_header_centered_meta', true) !== '' &&
				get_post_meta($id, 'edgt_menu_area_background_transparency_header_centered_meta', true) === '0';
		} elseif (eldritch_edge_options()->getOptionValue('menu_area_background_color_header_centered') == '') {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_grid_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_grid_background_transparency_header_centered') === '0';
		} else {
			$menuAreaTransparent = eldritch_edge_options()->getOptionValue('menu_area_background_color_header_centered') !== '' &&
				eldritch_edge_options()->getOptionValue('menu_area_background_transparency_header_centered') === '0';
		}


		if ($logoAreaTransparent || $menuAreaTransparent) {
			if ($logoAreaTransparent) {
				$transparencyHeight = $this->logoAreaHeight + $this->menuAreaHeight;

				if (eldritch_edge_is_top_bar_enabled() && eldritch_edge_is_top_bar_completely_transparent()) {
					$transparencyHeight += eldritch_edge_get_top_bar_height();
				}
			}

			if (!$logoAreaTransparent && $menuAreaTransparent) {
				$transparencyHeight = $this->menuAreaHeight;
			}
		}

		return $transparencyHeight;
	}


	/**
	 * Returns total height of header
	 *
	 * @return int|string
	 */
	public function calculateHeaderHeight() {
		$headerHeight = $this->logoAreaHeight + $this->menuAreaHeight;
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
		$globalVariables['edgtLogoAreaHeight'] = $this->logoAreaHeight;
		$globalVariables['edgtMenuAreaHeight'] = $this->menuAreaHeight;
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