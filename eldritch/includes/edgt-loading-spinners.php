<?php

if(!function_exists('eldritch_edge_loading_spinners')) {
	function eldritch_edge_loading_spinners($return = false) {
		global $eldritch_options;

		$spinner_html = '';

		if(isset($eldritch_options['smooth_pt_spinner_type'])) {

			switch($eldritch_options['smooth_pt_spinner_type']) {
				case "eldritch":
					$spinner_html = eldritch_edge_eldritch_loader();
					break;
				case "pulse":
					$spinner_html = eldritch_edge_loading_spinner_pulse();
					break;
				case "double_pulse":
					$spinner_html = eldritch_edge_loading_spinner_double_pulse();
					break;
				case "cube":
					$spinner_html = eldritch_edge_loading_spinner_cube();
					break;
				case "rotating_cubes":
					$spinner_html = eldritch_edge_loading_spinner_rotating_cubes();
					break;
				case "stripes":
					$spinner_html = eldritch_edge_loading_spinner_stripes();
					break;
				case "wave":
					$spinner_html = eldritch_edge_loading_spinner_wave();
					break;
				case "two_rotating_circles":
					$spinner_html = eldritch_edge_loading_spinner_two_rotating_circles();
					break;
				case "five_rotating_circles":
					$spinner_html = eldritch_edge_loading_spinner_five_rotating_circles();
					break;
				case "atom":
					$spinner_html = eldritch_edge_loading_spinner_atom();
					break;
				case "clock":
					$spinner_html = eldritch_edge_loading_spinner_clock();
					break;
				case "mitosis":
					$spinner_html = eldritch_edge_loading_spinner_mitosis();
					break;
				case "lines":
					$spinner_html = eldritch_edge_loading_spinner_lines();
					break;
				case "fussion":
					$spinner_html = eldritch_edge_loading_spinner_fussion();
					break;
				case "wave_circles":
					$spinner_html = eldritch_edge_loading_spinner_wave_circles();
					break;
				case "pulse_circles":
					$spinner_html = eldritch_edge_loading_spinner_pulse_circles();
					break;
                default:
                    $spinner_html = eldritch_edge_loading_spinner_pulse();
                    break;
			}
		}

		if($return === true) {
			return $spinner_html;
		}

		echo wp_kses($spinner_html, array(
			'div' => array(
				'class' => true,
				'style' => true,
				'id'    => true
			)
		));
	}
}


if(!function_exists('eldritch_edge_eldritch_loader')) {
	function eldritch_edge_eldritch_loader() {
		$html = '';
		$html .= '<div class="edgt-eldritch-loader">';
		$html .= '<div class="edgt-eldritch-loader-no-shine">';
		$html .= '<img src="'.EDGE_ASSETS_ROOT .'/img/loader-without-shadow.png" alt="'.esc_attr__( 'Loader image', 'eldritch' ).'" />';
		$html .= '</div>';
		$html .= '<div class="edgt-eldritch-loader-shine">';
		$html .= '<img src="'.EDGE_ASSETS_ROOT .'/img/loader-with-shadow.png" alt="'.esc_attr__( 'Loader image', 'eldritch' ).'" />';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_pulse')) {
	function eldritch_edge_loading_spinner_pulse() {
		$html = '';
		$html .= '<div class="pulse"></div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_double_pulse')) {
	function eldritch_edge_loading_spinner_double_pulse() {
		$html = '';
		$html .= '<div class="double_pulse">';
		$html .= '<div class="double-bounce1"></div>';
		$html .= '<div class="double-bounce2"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_cube')) {
	function eldritch_edge_loading_spinner_cube() {
		$html = '';
		$html .= '<div class="cube"></div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_rotating_cubes')) {
	function eldritch_edge_loading_spinner_rotating_cubes() {
		$html = '';
		$html .= '<div class="rotating_cubes">';
		$html .= '<div class="cube1"></div>';
		$html .= '<div class="cube2"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_stripes')) {
	function eldritch_edge_loading_spinner_stripes() {
		$html = '';
		$html .= '<div class="stripes">';
		$html .= '<div class="rect1"></div>';
		$html .= '<div class="rect2"></div>';
		$html .= '<div class="rect3"></div>';
		$html .= '<div class="rect4"></div>';
		$html .= '<div class="rect5"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_wave')) {
	function eldritch_edge_loading_spinner_wave() {
		$html = '';
		$html .= '<div class="wave">';
		$html .= '<div class="bounce1"></div>';
		$html .= '<div class="bounce2"></div>';
		$html .= '<div class="bounce3"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_two_rotating_circles')) {
	function eldritch_edge_loading_spinner_two_rotating_circles() {
		$html = '';
		$html .= '<div class="two_rotating_circles">';
		$html .= '<div class="dot1"></div>';
		$html .= '<div class="dot2"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_five_rotating_circles')) {
	function eldritch_edge_loading_spinner_five_rotating_circles() {
		$html = '';
		$html .= '<div class="five_rotating_circles">';
		$html .= '<div class="spinner-container container1">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container2">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container3">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_atom')) {
	function eldritch_edge_loading_spinner_atom() {
		$html = '';
		$html .= '<div class="atom">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_clock')) {
	function eldritch_edge_loading_spinner_clock() {
		$html = '';
		$html .= '<div class="clock">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_mitosis')) {
	function eldritch_edge_loading_spinner_mitosis() {
		$html = '';
		$html .= '<div class="mitosis">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_lines')) {
	function eldritch_edge_loading_spinner_lines() {
		$html = '';
		$html .= '<div class="lines">';
		$html .= '<div class="line1"></div>';
		$html .= '<div class="line2"></div>';
		$html .= '<div class="line3"></div>';
		$html .= '<div class="line4"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_fussion')) {
	function eldritch_edge_loading_spinner_fussion() {
		$html = '';
		$html .= '<div class="fussion">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_wave_circles')) {
	function eldritch_edge_loading_spinner_wave_circles() {
		$html = '';
		$html .= '<div class="wave_circles">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}
}

if(!function_exists('eldritch_edge_loading_spinner_pulse_circles')) {
	function eldritch_edge_loading_spinner_pulse_circles() {
		$html = '';
		$html .= '<div class="pulse_circles">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';

		return $html;
	}
}
