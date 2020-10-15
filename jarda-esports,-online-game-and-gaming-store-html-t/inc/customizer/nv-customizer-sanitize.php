<?php
/**
 * File to sanitize customizer field
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

/**
 * Sanitize checkbox value
 *
 * @since 1.0.1
 */
function news_vibrant_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * Sanitize repeater value
 *
 * @since 1.0.0
 */
function news_vibrant_sanitize_repeater( $input ){
    $input_decoded = json_decode( $input, true );
        
    if( !empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxes => $box ){
            foreach ( $box as $key => $value ){
                $input_decoded[$boxes][$key] = wp_kses_post( $value );
            }
        }
        return json_encode( $input_decoded );
    }
    
    return $input;
}

/**
 * Sanitize site layout
 *
 * @since 1.0.0
 */
function news_vibrant_sanitize_site_layout( $input ) {
    $valid_keys = array(
        'fullwidth_layout' => __( 'Fullwidth Layout', 'news-vibrant' ),
        'boxed_layout'     => __( 'Boxed Layout', 'news-vibrant' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * switch option (show/hide)
 *
 * @since 1.0.0
 */
function news_vibrant_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => __( 'Show', 'news-vibrant' ),
            'hide'  => __( 'Hide', 'news-vibrant' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * sanitize function for multiple checkboxes
 *
 * @since 1.0.0
 */
function news_vibrant_sanitize_mulitple_checkbox( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site title for the selective refresh partial.
 *
 * @since News Vibrant 1.0.0
 * @see news_vibrant_customize_register()
 *
 * @return void
 */
function news_vibrant_customize_partial_blogname(){
    bloginfo( 'name' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since News Vibrant 1.0.0
 * @see news_vibrant_customize_register()
 *
 * @return void
 */
function news_vibrant_customize_partial_blogdescription(){
    bloginfo( 'description' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since News Vibrant 1.0.0
 * @see news_vibrant_footer_settings_register()
 *
 * @return void
 */
function news_vibrant_customize_partial_copyright(){
    return get_theme_mod( 'news_vibrant_copyright_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since News Vibrant 1.0.0
 * @see news_vibrant_design_settings_register()
 *
 * @return void
 */
function news_vibrant_customize_partial_related_title(){
    return get_theme_mod( 'news_vibrant_related_posts_title' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since News Vibrant 1.0.0
 * @see news_vibrant_design_settings_register()
 *
 * @return void
 */
function news_vibrant_customize_partial_archive_more(){
    return get_theme_mod( 'news_vibrant_archive_read_more_text' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since News Vibrant 1.0.0
 * @see news_vibrant_header_settings_register()
 *
 * @return void
 */
function news_vibrant_customize_partial_ticker_caption(){
    return get_theme_mod( 'news_vibrant_ticker_caption' );
}

/*------------------------------------------------ Callback Functions -----------------------------------------------------------------------*/
if( ! function_exists( 'news_vibrant_top_header_option_active_callback' ) ):
    /**
	 * Check if top header option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function news_vibrant_top_header_option_active_callback( $control ){
        if( 'show' === $control->manager->get_setting( 'news_vibrant_top_header_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }
endif;

if( ! function_exists( 'news_vibrant_featured_posts_top_header_active_callback' ) ):
    /**
     * Active callback function for featured post section at top header
     *
     * @since 1.0.0
     */
    function news_vibrant_featured_posts_top_header_active_callback( $control ) {
        if ( 'show' === $control->manager->get_setting( 'news_vibrant_top_header_option' )->value() && $control->manager->get_setting( 'news_vibrant_top_featured_option' )->value() == 'show' ) {
            return true;
        } else {
            return false;
        }
    }
endif;

if( ! function_exists( 'news_vibrant_ticker_option_active_callback' ) ):
    /**
     * Active callback function for ticker section at top header
     *
     * @since 1.0.0
     */
    function news_vibrant_ticker_option_active_callback( $control ) {
        if ( 'show' === $control->manager->get_setting( 'news_vibrant_ticker_option' )->value() ) {
            return true;
        } else {
            return false;
        }
    }
endif;

if( ! function_exists( 'news_vibrant_footer_widget_option_active_callback' ) ):
    /**
     * Active callback function footer widget at top header
     *
     * @since 1.0.0
     */
    function news_vibrant_footer_widget_option_active_callback( $control ) {
        if ( 'show' === $control->manager->get_setting( 'news_vibrant_footer_widget_option' )->value() ) {
            return true;
        } else {
            return false;
        }
    }
endif;