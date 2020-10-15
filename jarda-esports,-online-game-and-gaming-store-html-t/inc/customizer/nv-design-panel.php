<?php
/**
 * News Vibrant Design Settings panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

add_action( 'customize_register', 'news_vibrant_design_settings_register' );

function news_vibrant_design_settings_register( $wp_customize ) {

	// Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'News_Vibrant_Customize_Control_Radio_Image' );

	/**
     * Add Design Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'news_vibrant_design_settings_panel',
	    array(
	        'priority'       => 25,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Design Settings', 'news-vibrant' ),
	    )
    );

/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Archive Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'news_vibrant_archive_settings_section',
        array(
            'title'     => esc_html__( 'Archive Settings', 'news-vibrant' ),
            'panel'     => 'news_vibrant_design_settings_panel',
            'priority'  => 5,
        )
    );      

    /**
     * Image Radio field for archive sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_archive_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Control_Radio_Image(
        $wp_customize,
        'news_vibrant_archive_sidebar',
            array(
                'label'    => esc_html__( 'Archive Sidebars', 'news-vibrant' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'news-vibrant' ),
                'section'  => 'news_vibrant_archive_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        ),
                        'no_sidebar_center' => array(
                            'label' => esc_html__( 'No Sidebar Center', 'news-vibrant' ),
                            'url'   => '%s/assets/images/no-sidebar-center.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Image Radio field for archive layout
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_archive_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Control_Radio_Image(
        $wp_customize,
        'news_vibrant_archive_layout',
            array(
                'label'    => esc_html__( 'Archive Layouts', 'news-vibrant' ),
                'description' => esc_html__( 'Choose layout from available layouts', 'news-vibrant' ),
                'section'  => 'news_vibrant_archive_settings_section',
                'choices'  => array(
                        'classic' => array(
                            'label' => esc_html__( 'Classic', 'news-vibrant' ),
                            'url'   => '%s/assets/images/archive-layout1.png'
                        ),
                        'grid' => array(
                            'label' => esc_html__( 'Grid', 'news-vibrant' ),
                            'url'   => '%s/assets/images/archive-layout2.png'
                        )
                ),
                'priority' => 10
            )
        )
    );

    /**
     * Text field for archive read more
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_archive_read_more_text',
        array(
            'default'      => __( 'Continue Reading', 'news-vibrant' ),
            'transport'    => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'news_vibrant_archive_read_more_text',
        array(
            'type'      	=> 'text',
            'label'        	=> esc_html__( 'Read More Text', 'news-vibrant' ),
            'description'  	=> __( 'Enter read more button text for archive page.', 'news-vibrant' ),
            'section'   	=> 'news_vibrant_archive_settings_section',
            'priority'  	=> 15
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'news_vibrant_archive_read_more_text', 
            array(
                'selector' => '.nv-archive-more > a',
                'render_callback' => 'news_vibrant_customize_partial_archive_more',
            )
    );

/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Page Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'news_vibrant_page_settings_section',
        array(
            'title'     => esc_html__( 'Page Settings', 'news-vibrant' ),
            'panel'     => 'news_vibrant_design_settings_panel',
            'priority'  => 10,
        )
    );      

    /**
     * Image Radio for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_default_page_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Control_Radio_Image(
        $wp_customize,
        'news_vibrant_default_page_sidebar',
            array(
                'label'    => esc_html__( 'Page Sidebars', 'news-vibrant' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'news-vibrant' ),
                'section'  => 'news_vibrant_page_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        ),
                        'no_sidebar_center' => array(
                            'label' => esc_html__( 'No Sidebar Center', 'news-vibrant' ),
                            'url'   => '%s/assets/images/no-sidebar-center.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Post Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'news_vibrant_post_settings_section',
        array(
            'title'     => esc_html__( 'Post Settings', 'news-vibrant' ),
            'panel'     => 'news_vibrant_design_settings_panel',
            'priority'  => 15,
        )
    );      

    /**
     * Image Radio for post sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_default_post_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Control_Radio_Image(
        $wp_customize,
        'news_vibrant_default_post_sidebar',
            array(
                'label'    => esc_html__( 'Post Sidebars', 'news-vibrant' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'news-vibrant' ),
                'section'  => 'news_vibrant_post_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'news-vibrant' ),
                            'url'   => '%s/assets/images/no-sidebar.png'
                        ),
                        'no_sidebar_center' => array(
                            'label' => esc_html__( 'No Sidebar Center', 'news-vibrant' ),
                            'url'   => '%s/assets/images/no-sidebar-center.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Switch option for Related posts
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_related_posts_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_vibrant_sanitize_switch_option',
            )
    );
    $wp_customize->add_control( new News_Vibrant_Customize_Switch_Control(
        $wp_customize,
            'news_vibrant_related_posts_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Related Post Option', 'news-vibrant' ),
                'description'   => esc_html__( 'Show/Hide option for related posts section at single post page.', 'news-vibrant' ),
                'section'   => 'news_vibrant_post_settings_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-vibrant' ),
                    'hide'  => esc_html__( 'Hide', 'news-vibrant' )
                    ),
                'priority'  => 10,
            )
        )
    );

    /**
     * Text field for related post section title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_vibrant_related_posts_title',
        array(
            'default'    => __( 'Related Posts', 'news-vibrant' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'news_vibrant_related_posts_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Related Post Section Title', 'news-vibrant' ),
            'section'   => 'news_vibrant_post_settings_section',
            'priority'  => 15
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'news_vibrant_related_posts_title', 
            array(
                'selector' => 'h2.nv-related-title',
                'render_callback' => 'news_vibrant_customize_partial_related_title',
            )
    );
}