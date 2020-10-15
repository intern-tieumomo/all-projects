<?php do_action('eldritch_edge_before_sticky_header'); ?>

    <div class="edgt-sticky-header">
        <?php do_action('eldritch_edge_after_sticky_menu_html_open'); ?>
        <div class="edgt-sticky-holder">
            <?php if($sticky_header_in_grid) : ?>
            <div class="edgt-grid">
                <?php endif; ?>
                <div class=" edgt-vertical-align-containers">
					<div class="edgt-position-left">
						<div class="edgt-position-left-inner">
							<?php if (!$hide_logo) {
								eldritch_edge_get_logo('sticky');
							} ?>
						</div>
						<?php if ($menu_area_position === 'left') {
							eldritch_edge_get_sticky_menu('edgt-sticky-nav');
						}
						?>
					</div>
					<?php
					if ($menu_area_position === 'center') { ?>
						<div class="edgt-position-center">
							<div class="edgt-position-center-inner">
								<?php eldritch_edge_get_sticky_menu('edgt-sticky-nav'); ?>
							</div>
						</div>
					<?php } ?>
                    <div class="edgt-position-right">
                        <div class="edgt-position-right-inner">
							<?php
							if ($menu_area_position === 'right') {
								eldritch_edge_get_sticky_menu('edgt-sticky-nav');
							}
							?>
                            <?php if(get_post_meta(eldritch_edge_get_page_id(), 'edgt_custom_sidebar_header_standard_meta', true) !== ''){ ?>
                                <div class="edgt-sticky-right-widget">
                                    <div class="edgt-sticky-right-widget-inner">
                                        <?php dynamic_sidebar(get_post_meta(eldritch_edge_get_page_id(), 'edgt_custom_sidebar_header_standard_meta', true));?>
                                    </div>
                                </div>
                            <?php }else if(is_active_sidebar('edgt-sticky-right')){ ?>
                                <div class="edgt-sticky-right-widget-area">
                                    <?php dynamic_sidebar('edgt-sticky-right'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php do_action('eldritch_edge_after_sticky_header'); ?>