<?php

if ( ! function_exists('eldritch_edge_like') ) {
	/**
	 * Returns EldritchEdgeLike instance
	 *
	 * @return EldritchEdgeLike
	 */
	function eldritch_edge_like() {
		return EldritchEdgeLike::get_instance();
	}

}

function eldritch_edge_get_like() {

	echo wp_kses(eldritch_edge_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	));
}

if ( ! function_exists('eldritch_edge_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function eldritch_edge_like_latest_posts() {
		return eldritch_edge_like()->add_like();
	}

}

if ( ! function_exists('eldritch_edge_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function eldritch_edge_like_portfolio_list($portfolio_project_id) {
		return eldritch_edge_like()->add_like_portfolio_list($portfolio_project_id);
	}

}