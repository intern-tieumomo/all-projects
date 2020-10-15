<?php
if(!defined('ABSPATH')) {
	die('-1');
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $height
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Empty_space
 */
$height = $el_class = $css = '';
$atts   = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
$regexr = preg_match($pattern, $height, $matches);
$value  = isset($matches[1]) ? (float) $matches[1] : (float) WPBMap::getParam('vc_empty_space', 'height');
$unit   = isset($matches[2]) ? $matches[2] : 'px';
$height = $value.$unit;

$inline_css = ((float) $height >= 0.0) ? ' style="height: '.esc_attr($height).'"' : '';

$class     = 'vc_empty_space '.$this->getExtraClass($el_class).vc_shortcode_custom_css_class($css, ' ');
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts);

$sizes = array(
	'large_laptop',
	'laptop',
	'tablet_portrait',
	'tablet_landscape',
	'phone_portrait',
	'phone_landscape'
);

$data_attr = array();

foreach($sizes as $size) {
	if(!empty($$size)) {
		$data_attr['data-'.$size] = eldritch_edge_filter_px($$size);
	}
}

$data_attr['data-original-height'] = eldritch_edge_filter_px($height);

?>
<div <?php echo eldritch_edge_get_inline_attrs($data_attr); ?> class="<?php echo esc_attr(trim($css_class)); ?>" <?php echo eldritch_edge_get_module_part($inline_css); ?> >
	<span class="vc_empty_space_inner"></span></div>
