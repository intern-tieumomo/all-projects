<div class="edgt-fullscreen-menu-holder-outer">
    <div class="edgt-fullscreen-menu-holder" <?php eldritch_edge_inline_style(array($fullscreen_background_image)); ?>>
        <div class="edgt-fullscreen-menu-holder-inner">
            <?php if($fullscreen_menu_in_grid) : ?>
            <div class="edgt-container-inner">
                <?php endif;

                if($have_logo){
                    eldritch_edge_get_fullscreeen_logo();
                }

                //Sidearea above menu
                if(is_active_sidebar('fullscreen_menu_above')) : ?>
                    <div class="edgt-fullscreen-above-menu-widget-holder">
                        <?php dynamic_sidebar('fullscreen_menu_above'); ?>
                    </div>
                <?php endif;

                //Navigation
                eldritch_edge_get_full_screen_menu_navigation();

                //Sidearea under menu
                if(is_active_sidebar('fullscreen_menu_below')) : ?>
                    <div class="edgt-fullscreen-below-menu-widget-holder">
                        <?php dynamic_sidebar('fullscreen_menu_below'); ?>
                    </div>
                <?php endif;

                if($fullscreen_menu_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>