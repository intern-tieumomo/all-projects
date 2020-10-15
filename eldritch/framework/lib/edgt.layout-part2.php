<?php

class EldritchEdgeFieldPortfolioFollow extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "portfolio_single_follow") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "portfolio_single_no_follow") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if(eldritch_edge_option_get_value($name) == "portfolio_single_follow") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldZeroOne extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "1") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "0") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if(eldritch_edge_option_get_value($name) == "1") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldImageVideo extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch switch-type">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "image") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Image', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "video") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Video', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if(eldritch_edge_option_get_value($name) == "image") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldYesEmpty extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "yes") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if(eldritch_edge_option_get_value($name) == "yes") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldFlagPage extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "page") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if(eldritch_edge_option_get_value($name) == "page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldFlagPost extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "post") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if(eldritch_edge_option_get_value($name) == "post") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldFlagMedia extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "attachment") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if(eldritch_edge_option_get_value($name) == "attachment") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldFlagPortfolio extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "portfolio_page") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if(eldritch_edge_option_get_value($name) == "portfolio_page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldFlagProduct extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "product") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if(eldritch_edge_option_get_value($name) == "product") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldRange extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $range_min      = 0;
        $range_max      = 1;
        $range_step     = 0.01;
        $range_decimals = 2;
        if(isset($args["range_min"])) {
            $range_min = $args["range_min"];
        }
        if(isset($args["range_max"])) {
            $range_max = $args["range_max"];
        }
        if(isset($args["range_step"])) {
            $range_step = $args["range_step"];
        }
        if(isset($args["range_decimals"])) {
            $range_decimals = $args["range_decimals"];
        }
        ?>

        <div class="edgt-page-form-section">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edgt-slider-range-wrapper">
                                <div class="form-inline">
                                    <input type="text"
                                           class="form-control edgt-form-element edgt-form-element-xsmall pull-left edgt-slider-range-value"
                                           name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>

                                    <div class="edgt-slider-range small"
                                         data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldRangeSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        ?>

        <div class="col-lg-3" id="edgt_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgt-slider-range-wrapper">
                <div class="form-inline">
                    <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
                    <input type="text"
                           class="form-control edgt-form-element edgt-form-element-xxsmall pull-left edgt-slider-range-value"
                           name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>

                    <div class="edgt-slider-range xsmall"
                         data-step="0.01" data-max="1" data-start="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"></div>
                </div>

            </div>
        </div>
    <?php

    }

}

class EldritchEdgeFieldRadio extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";
        if($default_value == $value) {
            $checked = "checked";
        }
        $html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type'    => true,
                'name'    => true,
                'value'   => true,
                'checked' => true
            ),
            'br'    => true
        ));

    }

}

class EldritchEdgeFieldRadioGroup extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show       = !empty($args["show"]) ? $args["show"] : array();
        $hide       = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images    = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels   = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios   = $use_images ? 'display: none' : '';
        $checked_value = eldritch_edge_option_get_value($name);
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>" <?php if($hidden) { ?> style="display: none"<?php } ?>>

            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(is_array($options) && count($options)) { ?>
                                <div class="edgt-radio-group-holder <?php if($use_images) {
                                    echo "with-images";
                                } ?>">
                                    <?php foreach($options as $key => $atts) {
                                        $selected = false;
                                        if($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if($dependence) {
                                            if(array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if(array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input
                                                <?php echo eldritch_edge_get_inline_attr($show_val, 'data-show'); ?>
                                                <?php echo eldritch_edge_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if($selected) {
                                                    echo "checked";
                                                } ?> <?php eldritch_edge_inline_style($hide_radios); ?>
                                                type="radio"
                                                name="<?php echo esc_attr($name); ?>"
                                                value="<?php echo esc_attr($key); ?>"
                                                <?php if($dependence) {
                                                    eldritch_edge_class_attribute("dependence");
                                                } ?>> <?php if(!empty($atts["label"]) && !$hide_labels) {
                                                echo esc_attr($atts["label"]);
                                            } ?>

                                            <?php if($use_images) { ?>
                                                <img title="<?php if(!empty($atts["label"])) {
                                                    echo esc_attr($atts["label"]);
                                                } ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php
    }

}

class EldritchEdgeFieldCheckBox extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";
        if($default_value == $value) {
            $checked = "checked";
        }
        $html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type'    => true,
                'name'    => true,
                'value'   => true,
                'checked' => true
            ),
            'br'    => true
        ));

    }

}

class EldritchEdgeFieldDate extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $col_width = 2;
        if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }
        ?>

        <div class="edgt-page-form-section" id="edgt_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <input type="text"
                                   id="portfolio_date"
                                   class="datepicker form-control edgt-input edgt-form-element"
                                   name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"
                                /></div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}
