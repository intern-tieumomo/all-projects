<?php
/**
 * News Vibrant Header Settings panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

add_action( 'customize_register', 'news_vibrant_header_settings_register' );

function news_vibrant_header_settings_register( $wp_customize ) {

	/**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'news_vibrant_header_settings_panel',
	    array(
	        'priority'       => 10,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Header Settings', 'news-vibrant' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
	
	/**
     * Top Header Section
     */
    $wp_customize->add_section(
        'news_vibrant_top_header_section',
        array(
            'title'     => __( 'Top Header Section', 'news-vibrant' ),
            'priority'  => 5,
            'panel'     => 'news_vibrant_header_settings_panel'
        )
    );

    /**
     * Switch option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_top_header_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_top_header_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Top Header Section', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for top header section.', 'news-vibrant' ),
                'section'   => 'news_vibrant_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Switch option for Current Date
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_top_date_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_top_date_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Current Date', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for current date at top header section.', 'news-vibrant' ),
                'section'   => 'news_vibrant_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                ),
                'active_callback' => 'news_vibrant_top_header_option_active_callback',
                'priority'  => 10,
            )
        )
    );

    /**
     * Switch option for Social Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_top_social_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_top_social_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Social Icons', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for social media icons at top header section.', 'news-vibrant' ),
                'section'   => 'news_vibrant_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                ),
                'active_callback' => 'news_vibrant_top_header_option_active_callback',
                'priority'  => 15,
            )
        )
    );

    /**
     * Switch option for featured section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_top_featured_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_top_featured_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Featured Posts Section', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for featured posts at top header section.', 'news-vibrant' ),
                'section'   => 'news_vibrant_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                ),
                'active_callback' => 'news_vibrant_top_header_option_active_callback',
                'priority'  => 20,
            )
        )
    );

    /**
     * Multiple checkboxes for featured posts section
     *
     * @since 1.0.0
     */
    $news_vibrant_categories_lists = news_vibrant_categories_lists();

    $wp_customize->add_setting(
        'news_vibrant_top_posts_cat_slugs',
        array(
            'default'           => '',
            'sanitize_callback' => 'news_vibrant_sanitize_mulitple_checkbox'
        )
    );

    $wp_customize->add_control( new News_Vibrant_Customize_Multiple_Checkboxes_Control(
        $wp_customize,
            'news_vibrant_top_posts_cat_slugs',
            array(
                'section' => 'news_vibrant_top_header_section',
                'label'   => __( 'Categories for Featured Posts', 'news-vibrant' ),
                'priority' => 25,
                'choices' => $news_vibrant_categories_lists,
                'active_callback' => 'news_vibrant_featured_posts_top_header_active_callback'
            )
        )
    );


/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Header Section
     */
    $wp_customize->add_section(
        'news_vibrant_header_option_section',
        array(
            'title'     => __( 'Header Option', 'news-vibrant' ),
            'priority'  => 10,
            'panel'     => 'news_vibrant_header_settings_panel'
        )
    );    

    /**
     * Switch option for Home Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_menu_sticky_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_menu_sticky_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Sticky Menu', 'news-vibrant' ),
                'description'   => esc_html__( 'Enable/Disable option for sticky menu.', 'news-vibrant' ),
                'section'   => 'news_vibrant_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Enable', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Disable', 'news-vibrant' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Switch option for Home Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_home_icon_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_home_icon_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Home Icon', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for home icon at primary menu.', 'news-vibrant' ),
                'section'   => 'news_vibrant_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                    ),
                'priority'  => 10,
            )
        )
    );

    /**
     * Switch option for Search Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_search_icon_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_search_icon_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Search Icon', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for search icon at primary menu.', 'news-vibrant' ),
                'section'   => 'news_vibrant_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                    ),
                'priority'  => 15,
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Ticker Section
     */
    $wp_customize->add_section(
        'news_vibrant_ticker_section',
        array(
            'title'     => __( 'Ticker Section', 'news-vibrant' ),
            'priority'  => 15,
            'panel'     => 'news_vibrant_header_settings_panel'
        )
    );

    /**
     * Switch option for Home Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_ticker_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_ticker_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Ticker Option', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for news ticker section.', 'news-vibrant' ),
                'section'   => 'news_vibrant_ticker_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Text field for ticker caption
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_ticker_caption',
        array(
            'default'    => __( 'Breaking News', 'news-vibrant' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'news_vibrant_ticker_caption',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Ticker Caption', 'news-vibrant' ),
            'section'   => 'news_vibrant_ticker_section',
            'priority'  => 10,
            'active_callback' => 'news_vibrant_ticker_option_active_callback'
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'news_vibrant_ticker_caption', 
            array(
                'selector' => '.ticker-caption',
                'render_callback' => 'news_vibrant_customize_partial_ticker_caption',
            )
    );
}