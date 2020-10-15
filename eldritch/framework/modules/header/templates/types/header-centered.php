<?php do_action('eldritch_edge_before_page_header'); ?>

<header class="edgt-page-header">
    <div class="edgt-logo-area">
        <?php if($logo_area_in_grid) : ?>
        <div class="edgt-grid">
        <?php endif; ?>
			<?php do_action( 'eldritch_edge_after_header_logo_area_html_open' )?>
            <div class="edgt-vertical-align-containers">
                <div class="edgt-position-center">
                    <div class="edgt-position-center-inner">
                        <?php if(!$hide_logo) {
                            eldritch_edge_get_logo('centered');
                        } ?>
                    </div>
                </div>
            </div>
        <?php if($logo_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        <div class="edgt-fixed-wrapper">
    <?php endif; ?>
    <div class="edgt-menu-area">
        <?php if($menu_area_in_grid) : ?>
            <div class="edgt-grid">
        <?php endif; ?>
			<?php do_action( 'eldritch_edge_after_header_menu_area_html_open' )?>
            <div class="edgt-vertical-align-containers">
                <div class="edgt-position-center">
                    <div class="edgt-position-center-inner">
                        <?php eldritch_edge_get_main_menu(); ?>
                    </div>
                </div>

            </div>
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        eldritch_edge_get_sticky_header('centered');
    } ?>
</header>

<?php do_action('eldritch_edge_after_page_header'); ?>

