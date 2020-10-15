<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see eldritch_edge_header_meta() - hooked with 10
     * @see edgt_user_scalable - hooked with 10
     */

    do_action('eldritch_edge_header_meta');
    wp_head();
    ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php

eldritch_edge_get_side_area();

if (eldritch_edge_options()->getOptionValue('smooth_page_transitions') == "yes") { ?>

    <div class="edgt-smooth-transition-loader edgt-mimic-ajax">
        <div class="edgt-st-loader">
            <div class="edgt-st-loader1">
                <?php echo eldritch_edge_loading_spinners(true); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (eldritch_edge_is_paspartu_on()){ ?>
<div class="edgt-wrapper-paspartu">
    <?php } ?>
    <div class="edgt-wrapper">
        <div class="edgt-wrapper-inner">
            <?php eldritch_edge_get_header(); ?>

            <?php if (eldritch_edge_options()->getOptionValue('show_back_button') == "yes") { 

            $url = EDGE_ASSETS_ROOT . '/img/arrow_white.png'; ?>

                <a id='edgt-back-to-top' href='#'>
                    <span class="edgt-icon-stack">
                        <img src="<?php echo esc_url($url); ?>" alt="<?php esc_attr_e('Back to Top', 'eldritch'); ?>" />
                    </span>
                </a>
            <?php } ?>
            <?php eldritch_edge_get_full_screen_menu(); ?>

            <div class="edgt-content" <?php eldritch_edge_content_elem_style_attr(); ?>>
                <div class="edgt-content-inner">