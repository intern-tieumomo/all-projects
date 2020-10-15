<?php



class EldritchEdgeFieldFactory {

    public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {


        switch(strtolower($field_type)) {

            case 'text':
                $field = new EldritchEdgeFieldText();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'textsimple':
                $field = new EldritchEdgeFieldTextSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'textarea':
                $field = new EldritchEdgeFieldTextArea();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'textareasimple':
                $field = new EldritchEdgeFieldTextAreaSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'color':
                $field = new EldritchEdgeFieldColor();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'colorsimple':
                $field = new EldritchEdgeFieldColorSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'image':
                $field = new EldritchEdgeFieldImage();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'imagesimple':
                $field = new EldritchEdgeFieldImageSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'font':
                $field = new EldritchEdgeFieldFont();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'fontsimple':
                $field = new EldritchEdgeFieldFontSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'select':
                $field = new EldritchEdgeFieldSelect();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectblank':
                $field = new EldritchEdgeFieldSelectBlank();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectsimple':
                $field = new EldritchEdgeFieldSelectSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'selectblanksimple':
                $field = new EldritchEdgeFieldSelectBlankSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'yesno':
                $field = new EldritchEdgeFieldYesNo();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'yesnosimple':
                $field = new EldritchEdgeFieldYesNoSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'onoff':
                $field = new EldritchEdgeFieldOnOff();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'portfoliofollow':
                $field = new EldritchEdgeFieldPortfolioFollow();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'zeroone':
                $field = new EldritchEdgeFieldZeroOne();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'imagevideo':
                $field = new EldritchEdgeFieldImageVideo();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'yesempty':
                $field = new EldritchEdgeFieldYesEmpty();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagpost':
                $field = new EldritchEdgeFieldFlagPost();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagpage':
                $field = new EldritchEdgeFieldFlagPage();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagmedia':
                $field = new EldritchEdgeFieldFlagMedia();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagportfolio':
                $field = new EldritchEdgeFieldFlagPortfolio();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'flagproduct':
                $field = new EldritchEdgeFieldFlagProduct();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'range':
                $field = new EldritchEdgeFieldRange();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'rangesimple':
                $field = new EldritchEdgeFieldRangeSimple();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'radio':
                $field = new EldritchEdgeFieldRadio();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'checkbox':
                $field = new EldritchEdgeFieldCheckBox();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;

            case 'date':
                $field = new EldritchEdgeFieldDate();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            case 'radiogroup':
                $field = new EldritchEdgeFieldRadioGroup();
                $field->render($name, $label, $description, $options, $args, $hidden);
                break;
            default:
                break;

        }

    }

}

/*
   Class: EldritchEdgeMultipleImages
   A class that initializes Edge Multiple Images
*/

class EldritchEdgeMultipleImages implements iEldritchEdgeRender {
    private $name;
    private $label;
    private $description;


    function __construct($name, $label = "", $description = "") {
        global $eldritch_Framework;
        $this->name        = $name;
        $this->label       = $label;
        $this->description = $description;
        $eldritch_Framework->edgtMetaBoxes->addOption($this->name, "");
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="edgt-page-form-section">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($this->label); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="edgt-gallery-images-holder clearfix">
                                <?php
                                $image_gallery_val = get_post_meta($post->ID, $this->name, true);
                                if($image_gallery_val != '') {
                                    $image_gallery_array = explode(',', $image_gallery_val);
                                }

                                if(isset($image_gallery_array) && count($image_gallery_array) != 0):

                                    foreach($image_gallery_array as $gimg_id):

                                        $gimage_wp = wp_get_attachment_image_src($gimg_id, 'thumbnail', true);
                                        echo '<li class="edgt-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

                                    endforeach;

                                endif;
                                ?>
                            </ul>
                            <input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr($this->name) ?>" name="<?php echo esc_attr($this->name) ?>">

                            <div class="edgt-gallery-uploader">
                                <a class="edgt-gallery-upload-btn btn btn-sm btn-primary"
                                   href="javascript:void(0)"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                <a class="edgt-gallery-clear-btn btn btn-sm btn-default pull-right"
                                   href="javascript:void(0)"><?php esc_html_e('Remove All', 'eldritch'); ?></a>
							</div>
							<?php wp_nonce_field( 'edgtf_gallery_upload_get_images_' . esc_attr( $this->name ), 'edgtf_gallery_upload_get_images_' . esc_attr( $this->name ) ); ?>
						</div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }
}

/*
   Class: EldritchEdgeImagesVideos
   A class that initializes Edge Images Videos
*/

class EldritchEdgeImagesVideos implements iEldritchEdgeRender {
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label       = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>
        <div class="edgt_hidden_portfolio_images" style="display: none">
            <div class="edgt-page-form-section">


                <div class="edgt-field-desc">
                    <h4><?php echo esc_html($this->label); ?></h4>

                    <p><?php echo esc_html($this->description); ?></p>
                </div>
                <!-- close div.edgt-field-desc -->

                <div class="edgt-section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <em class="edgt-field-description"><?php esc_html_e('Order Number', 'eldritch'); ?></em>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       id="portfolioimgordernumber_x"
                                       name="portfolioimgordernumber_x"
                                       /></div>
                            <div class="col-lg-10">
                                <em class="edgt-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'eldritch' ); ?></em>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       id="portfoliotitle_x"
                                       name="portfoliotitle_x"
                                       /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="edgt-field-description"><?php esc_html_e( 'Image', 'eldritch' ); ?></em>

                                <div class="edgt-media-uploader">
                                    <div style="display: none"
                                         class="edgt-media-image-holder">
                                        <img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>"
                                             class="edgt-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                         class="edgt-media-meta-fields">
                                        <input type="hidden" class="edgt-media-upload-url"
                                               name="portfolioimg_x"
                                               id="portfolioimg_x"/>
                                        <input type="hidden"
                                               class="edgt-media-upload-height"
                                               name="edgt_options_theme[media-upload][height]"
                                               value=""/>
                                        <input type="hidden"
                                               class="edgt-media-upload-width"
                                               name="edgt_options_theme[media-upload][width]"
                                               value=""/>
                                    </div>
                                    <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                                       href="javascript:void(0)"
                                       data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                                       data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                       class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-3">
                                <em class="edgt-field-description"><?php esc_html_e( 'Video type', 'eldritch' ); ?></em>
                                <select class="form-control edgt-form-element edgt-portfoliovideotype"
                                        name="portfoliovideotype_x" id="portfoliovideotype_x">
                                    <option value=""></option>
                                    <option value="youtube"><?php esc_html_e( 'Youtube', 'eldritch' ); ?></option>
                                    <option value="vimeo"><?php esc_html_e( 'Vimeo', 'eldritch' ); ?></option>
                                    <option value="self"><?php esc_html_e( 'Self hosted', 'eldritch' ); ?></option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <em class="edgt-field-description"><?php esc_html_e( 'Video ID', 'eldritch' ); ?></em>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       id="portfoliovideoid_x"
                                       name="portfoliovideoid_x"
                                       /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="edgt-field-description"><?php esc_html_e( 'Video image', 'eldritch' ); ?></em>

                                <div class="edgt-media-uploader">
                                    <div style="display: none"
                                         class="edgt-media-image-holder">
                                        <img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>"
                                             class="edgt-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                         class="edgt-media-meta-fields">
                                        <input type="hidden" class="edgt-media-upload-url"
                                               name="portfoliovideoimage_x"
                                               id="portfoliovideoimage_x"/>
                                        <input type="hidden"
                                               class="edgt-media-upload-height"
                                               name="edgt_options_theme[media-upload][height]"
                                               value=""/>
                                        <input type="hidden"
                                               class="edgt-media-upload-width"
                                               name="edgt_options_theme[media-upload][width]"
                                               value=""/>
                                    </div>
                                    <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                                       href="javascript:void(0)"
                                       data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                                       data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                       class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-4">
                                <em class="edgt-field-description"><?php esc_html_e( 'Video webm', 'eldritch' ); ?></em>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       id="portfoliovideowebm_x"
                                       name="portfoliovideowebm_x"
                                       /></div>
                            <div class="col-lg-4">
                                <em class="edgt-field-description"><?php esc_html_e( 'Video mp4', 'eldritch' ); ?></em>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       id="portfoliovideomp4_x"
                                       name="portfoliovideomp4_x"
                                       /></div>
                            <div class="col-lg-4">
                                <em class="edgt-field-description"><?php esc_html_e( 'Video ogv', 'eldritch' ); ?></em>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       id="portfoliovideoogv_x"
                                       name="portfoliovideoogv_x"
                                       /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <a class="edgt_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'eldritch' ); ?></a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- close div.edgt-section-content -->

            </div>
        </div>

        <?php
        $no               = 1;
        $portfolio_images = get_post_meta($post->ID, 'edgt_portfolio_images', true);
        if( is_array($portfolio_images) && count($portfolio_images) > 1) {
            usort($portfolio_images, "eldritch_edge_compare_portfolio_videos");
        }
        while(isset($portfolio_images[$no - 1])) {
            $portfolio_image = $portfolio_images[$no - 1];
            ?>
            <div class="edgt_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">

                <div class="edgt-page-form-section">


                    <div class="edgt-field-desc">
                        <h4><?php echo esc_html($this->label); ?></h4>

                        <p><?php echo esc_html($this->description); ?></p>
                    </div>
                    <!-- close div.edgt-field-desc -->

                    <div class="edgt-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                    <input type="text"
                                           class="form-control edgt-input edgt-form-element"
                                           id="portfolioimgordernumber_<?php echo esc_attr($no); ?>"
                                           name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>"
                                           /></div>
                                <div class="col-lg-10">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'eldritch' ); ?></em>
                                    <input type="text"
                                           class="form-control edgt-input edgt-form-element"
                                           id="portfoliotitle_<?php echo esc_attr($no); ?>"
                                           name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>"
                                           /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Image', 'eldritch' ); ?></em>

                                    <div class="edgt-media-uploader">
                                        <div<?php if(stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                            class="edgt-media-image-holder">
                                            <img src="<?php if(stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(eldritch_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>" class="edgt-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                             class="edgt-media-meta-fields">
                                            <input type="hidden" class="edgt-media-upload-url"
                                                   name="portfolioimg[]"
                                                   id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                   value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                            <input type="hidden"
                                                   class="edgt-media-upload-height"
                                                   name="edgt_options_theme[media-upload][height]"
                                                   value=""/>
                                            <input type="hidden"
                                                   class="edgt-media-upload-width"
                                                   name="edgt_options_theme[media-upload][width]"
                                                   value=""/>
                                        </div>
                                        <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                                           href="javascript:void(0)"
                                           data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                                           data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                           class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Video type', 'eldritch' ); ?></em>
                                    <select class="form-control edgt-form-element edgt-portfoliovideotype"
                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                        <option value=""></option>
                                        <option <?php if($portfolio_image['portfoliovideotype'] == "youtube") {
                                            echo "selected='selected'";
                                        } ?> value="youtube"><?php esc_html_e('Youtube', 'eldritch'); ?>
                                        </option>
                                        <option <?php if($portfolio_image['portfoliovideotype'] == "vimeo") {
                                            echo "selected='selected'";
                                        } ?> value="vimeo"><?php esc_html_e('Vimeo', 'eldritch'); ?>
                                        </option>
                                        <option <?php if($portfolio_image['portfoliovideotype'] == "self") {
                                            echo "selected='selected'";
                                        } ?> value="self"><?php esc_html_e('Self hosted', 'eldritch'); ?>
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Video ID', 'eldritch' ); ?></em>
                                    <input type="text"
                                           class="form-control edgt-input edgt-form-element"
                                           id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                           /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Video image', 'eldritch' ); ?></em>

                                    <div class="edgt-media-uploader">
                                        <div<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                            class="edgt-media-image-holder">
                                            <img src="<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(eldritch_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>" class="edgt-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                             class="edgt-media-meta-fields">
                                            <input type="hidden" class="edgt-media-upload-url"
                                                   name="portfoliovideoimage[]"
                                                   id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                   value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                            <input type="hidden"
                                                   class="edgt-media-upload-height"
                                                   name="edgt_options_theme[media-upload][height]"
                                                   value=""/>
                                            <input type="hidden"
                                                   class="edgt-media-upload-width"
                                                   name="edgt_options_theme[media-upload][width]"
                                                   value=""/>
                                        </div>
                                        <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                                           href="javascript:void(0)"
                                           data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                                           data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                           class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-4">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Video webm', 'eldritch' ); ?></em>
                                    <input type="text"
                                           class="form-control edgt-input edgt-form-element"
                                           id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                           /></div>
                                <div class="col-lg-4">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Video mp4', 'eldritch' ); ?></em>
                                    <input type="text"
                                           class="form-control edgt-input edgt-form-element"
                                           id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                           /></div>
                                <div class="col-lg-4">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Video ogv', 'eldritch' ); ?></em>
                                    <input type="text"
                                           class="form-control edgt-input edgt-form-element"
                                           id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                           /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <a class="edgt_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'eldritch' ); ?></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- close div.edgt-section-content -->

                </div>
            </div>
            <?php
            $no++;
        }
        ?>
        <br/>
        <a class="edgt_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e( 'Add portfolio image/video', 'eldritch' ); ?></a>
    <?php

    }
}


/*
   Class: EldritchEdgeImagesVideos
   A class that initializes Edge Images Videos
*/

class EldritchEdgeImagesVideosFramework implements iEldritchEdgeRender {
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label       = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <!--Image hidden start-->
        <div class="edgt-hidden-portfolio-images" style="display: none">
            <div class="edgt-portfolio-toggle-holder">
                <div class="edgt-portfolio-toggle edgt-toggle-desc">
                    <span class="number">1</span><span class="edgt-toggle-inner"><?php esc_html_e( 'Image - ', 'eldritch' ); ?><em><?php esc_html_e( '(Order Number, Image Title)', 'eldritch' ); ?></em></span>
                </div>
                <div class="edgt-portfolio-toggle edgt-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgt-portfolio-toggle-content">
                <div class="edgt-page-form-section">
                    <div class="edgt-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="edgt-media-uploader">
                                        <em class="edgt-field-description"><?php esc_html_e( 'Image ', 'eldritch' ); ?></em>

                                        <div style="display: none" class="edgt-media-image-holder">
                                            <img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>" class="edgt-media-image img-thumbnail">
                                        </div>
                                        <div class="edgt-media-meta-fields">
                                            <input type="hidden" class="edgt-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
                                            <input type="hidden" class="edgt-media-upload-height" name="edgt_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="edgt-media-upload-width" name="edgt_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="edgt-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'eldritch' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'eldritch' ); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                    <input type="text" class="form-control edgt-input edgt-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
                                </div>
                                <div class="col-lg-8">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'eldritch' ); ?></em>
                                    <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
                                </div>
                            </div>
                            <input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                            <input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
                            <input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
                            <input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
                            <input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
                            <input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

                        </div>
                        <!-- close div.container-fluid -->
                    </div>
                    <!-- close div.edgt-section-content -->
                </div>
            </div>
        </div>
        <!--Image hidden End-->

        <!--Video Hidden Start-->
        <div class="edgt-hidden-portfolio-videos" style="display: none">
            <div class="edgt-portfolio-toggle-holder">
                <div class="edgt-portfolio-toggle edgt-toggle-desc">
                    <span class="number">2</span><span class="edgt-toggle-inner"><?php esc_html_e( 'Video - ', 'eldritch' ); ?><em><?php esc_html_e( '(Order Number, Video Title)', 'eldritch' ); ?></em></span>
                </div>
                <div class="edgt-portfolio-toggle edgt-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgt-portfolio-toggle-content">
                <div class="edgt-page-form-section">
                    <div class="edgt-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="edgt-media-uploader">
                                        <em class="edgt-field-description"><?php esc_html_e( 'Cover Video Image ', 'eldritch' ); ?></em>

                                        <div style="display: none" class="edgt-media-image-holder">
                                            <img src="" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>" class="edgt-media-image img-thumbnail">
                                        </div>
                                        <div style="display: none" class="edgt-media-meta-fields">
                                            <input type="hidden" class="edgt-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                                            <input type="hidden" class="edgt-media-upload-height" name="edgt_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="edgt-media-upload-width" name="edgt_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="edgt-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'eldritch' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'eldritch' ); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
                                        </div>
                                        <div class="col-lg-10">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected)', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Video type', 'eldritch' ); ?></em>
                                            <select class="form-control edgt-form-element edgt-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
                                                <option value=""></option>
                                                <option value="youtube"><?php esc_html_e( 'Youtube', 'eldritch' ); ?></option>
                                                <option value="vimeo"><?php esc_html_e( 'Vimeo', 'eldritch' ); ?></option>
                                                <option value="self"><?php esc_html_e( 'Self hosted', 'eldritch' ); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 edgt-video-id-holder">
                                            <em class="edgt-field-description" id="videoId"><?php esc_html_e( 'Video ID', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" >
                                        </div>
                                    </div>

                                    <div class="row next-row edgt-video-self-hosted-path-holder">
                                        <div class="col-lg-4">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Video webm', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" >
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Video mp4', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" >
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Video ogv', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
                        </div>
                        <!-- close div.container-fluid -->
                    </div>
                    <!-- close div.edgt-section-content -->
                </div>
            </div>
        </div>
        <!--Video Hidden End-->


        <?php
        $no               = 1;
        $portfolio_images = get_post_meta($post->ID, 'edgt_portfolio_images', true);
        if(is_array($portfolio_images) && count($portfolio_images) > 1) {
            usort($portfolio_images, "eldritch_edge_compare_portfolio_videos");
        }
        while(isset($portfolio_images[$no - 1])) {
            $portfolio_image = $portfolio_images[$no - 1];
            if(isset($portfolio_image['portfolioimgtype'])) {
                $portfolio_img_type = $portfolio_image['portfolioimgtype'];
            } else {
                if(stripslashes($portfolio_image['portfolioimg']) == true) {
                    $portfolio_img_type = "image";
                } else {
                    $portfolio_img_type = "video";
                }
            }
            if($portfolio_img_type == "image") {
                ?>

                <div class="edgt-portfolio-images edgt-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="edgt-portfolio-toggle-holder">
                        <div class="edgt-portfolio-toggle edgt-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="edgt-toggle-inner"><?php esc_html_e( 'Image - ', 'eldritch' ); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
                        </div>
                        <div class="edgt-portfolio-toggle edgt-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="edgt-portfolio-toggle-content" style="display: none">
                        <div class="edgt-page-form-section">
                            <div class="edgt-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="edgt-media-uploader">
                                                <em class="edgt-field-description"><?php esc_html_e( 'Image ', 'eldritch' ); ?></em>

                                                <div<?php if(stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                                    class="edgt-media-image-holder">
                                                    <img src="<?php if(stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(eldritch_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>" class="edgt-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="edgt-media-meta-fields">
                                                    <input type="hidden" class="edgt-media-upload-url"
                                                           name="portfolioimg[]"
                                                           id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                           value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                                    <input type="hidden"
                                                           class="edgt-media-upload-height"
                                                           name="edgt_options_theme[media-upload][height]"
                                                           value=""/>
                                                    <input type="hidden"
                                                           class="edgt-media-upload-width"
                                                           name="edgt_options_theme[media-upload][width]"
                                                           value=""/>
                                                </div>
                                                <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                                                   href="javascript:void(0)"
                                                   data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                                                   data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                   class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
                                        </div>
                                        <div class="col-lg-8">
                                            <em class="edgt-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'eldritch' ); ?></em>
                                            <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
                                    <input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
                                    <input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
                                    <input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
                                    <input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
                                    <input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
                                </div>
                                <!-- close div.container-fluid -->
                            </div>
                            <!-- close div.edgt-section-content -->
                        </div>
                    </div>
                </div>

            <?php
            } else {
                ?>
                <div class="edgt-portfolio-videos edgt-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="edgt-portfolio-toggle-holder">
                        <div class="edgt-portfolio-toggle edgt-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="edgt-toggle-inner"><?php esc_html_e( 'Video - ', 'eldritch' ); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
                        </div>
                        <div class="edgt-portfolio-toggle edgt-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="edgt-portfolio-toggle-content" style="display: none">
                        <div class="edgt-page-form-section">
                            <div class="edgt-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="edgt-media-uploader">
                                                <em class="edgt-field-description"><?php esc_html_e( 'Cover Video Image ', 'eldritch' ); ?></em>

                                                <div<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                                    class="edgt-media-image-holder">
                                                    <img src="<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(eldritch_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>" class="edgt-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="edgt-media-meta-fields">
                                                    <input type="hidden" class="edgt-media-upload-url"
                                                           name="portfoliovideoimage[]"
                                                           id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                           value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                                    <input type="hidden"
                                                           class="edgt-media-upload-height"
                                                           name="edgt_options_theme[media-upload][height]"
                                                           value=""/>
                                                    <input type="hidden"
                                                           class="edgt-media-upload-width"
                                                           name="edgt_options_theme[media-upload][width]"
                                                           value=""/>
                                                </div>
                                                <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                                                   href="javascript:void(0)"
                                                   data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                                                   data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                   class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                                    <input type="text" class="form-control edgt-input edgt-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
                                                </div>
                                                <div class="col-lg-10">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected) ', 'eldritch' ); ?></em>
                                                    <input type="text" class="form-control edgt-input edgt-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
                                                </div>
                                            </div>
                                            <div class="row next-row">
                                                <div class="col-lg-2">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Video Type', 'eldritch' ); ?></em>
                                                    <select class="form-control edgt-form-element edgt-portfoliovideotype"
                                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                                        <option value=""></option>
                                                        <option <?php if($portfolio_image['portfoliovideotype'] == "youtube") {
                                                            echo "selected='selected'";
                                                        } ?> value="youtube"><?php esc_html_e('Youtube', 'eldritch'); ?>
                                                        </option>
                                                        <option <?php if($portfolio_image['portfoliovideotype'] == "vimeo") {
                                                            echo "selected='selected'";
                                                        } ?> value="vimeo"><?php esc_html_e('Vimeo', 'eldritch'); ?>
                                                        </option>
                                                        <option <?php if($portfolio_image['portfoliovideotype'] == "self") {
                                                            echo "selected='selected'";
                                                        } ?> value="self"><?php esc_html_e('Self hosted', 'eldritch'); ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 edgt-video-id-holder">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Video ID', 'eldritch' ); ?></em>
                                                    <input type="text"
                                                           class="form-control edgt-input edgt-form-element"
                                                           id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                                           />
                                                </div>
                                            </div>

                                            <div class="row next-row edgt-video-self-hosted-path-holder">
                                                <div class="col-lg-4">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Video webm', 'eldritch' ); ?></em>
                                                    <input type="text"
                                                           class="form-control edgt-input edgt-form-element"
                                                           id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                                           /></div>
                                                <div class="col-lg-4">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Video mp4', 'eldritch' ); ?></em>
                                                    <input type="text"
                                                           class="form-control edgt-input edgt-form-element"
                                                           id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                                           /></div>
                                                <div class="col-lg-4">
                                                    <em class="edgt-field-description"><?php esc_html_e( 'Video ogv', 'eldritch' ); ?></em>
                                                    <input type="text"
                                                           class="form-control edgt-input edgt-form-element"
                                                           id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                                           /></div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
                                </div>
                                <!-- close div.container-fluid -->
                            </div>
                            <!-- close div.edgt-section-content -->
                        </div>
                    </div>
                </div>
            <?php
            }
            $no++;
        }
        ?>

        <div class="edgt-portfolio-add">
            <a class="edgt-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e( ' Add Image', 'eldritch' ); ?></a>
            <a class="edgt-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e( ' Add Video', 'eldritch' ); ?></a>

            <a class="edgt-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'eldritch' ); ?></a>
        </div>
    <?php

    }
}

class EldritchEdgeTwitterFramework implements iEldritchEdgeRender {
    public function render($factory) {
        $twitterApi = EdgeTwitterApi::getInstance();
        $message    = '';

        if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if(!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if(!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'eldritch');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'eldritch') : esc_html__('Connect with Twitter', 'eldritch');
        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="edgt-page-form-section" id="edgt_enable_social_share">

            <div class="edgt-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'eldritch'); ?></h4>

                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'eldritch'); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="edgt-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php }
}

class EldritchEdgeInstagramFramework implements iEldritchEdgeRender {
    public function render($factory) {
        $instagram_api = EdgeInstagramApi::getInstance();
        $message       = '';

        //if code wasn't saved to database
        if(!get_option('edgt_instagram_code')) {
            //check if code parameter is set in URL. That means that user has connected with Instagram
            if(!empty($_GET['code'])) {
                //update code option so we can use it later
                $instagram_api->storeCode();
                $instagram_api->getAccessToken();
                $message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'eldritch');

            } else {
                $instagram_api->storeCodeRequestURI();
            }
        }

        $buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'eldritch') : esc_html__('Connect with Instagram', 'eldritch');

        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="edgt-page-form-section" id="edgt_enable_social_share">

            <div class="edgt-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'eldritch'); ?></h4>

                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'eldritch'); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php }
}

/*
   Class: EldritchEdgeImagesVideos
   A class that initializes Edge Images Videos
*/

class EldritchEdgeOptionsFramework implements iEldritchEdgeRender {
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label       = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="edgt-portfolio-additional-item-holder" style="display: none">
            <div class="edgt-portfolio-toggle-holder">
                <div class="edgt-portfolio-toggle edgt-toggle-desc">
                    <span class="number">1</span><span class="edgt-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item ', 'eldritch' ); ?><em><?php esc_html_e( '(Order Number, Item Title)', 'eldritch' ); ?></em></span>
                </div>
                <div class="edgt-portfolio-toggle edgt-portfolio-control">
                    <span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgt-portfolio-toggle-content">
                <div class="edgt-page-form-section">
                    <div class="edgt-section-content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-2">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                    <input type="text" class="form-control edgt-input edgt-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" >
                                </div>
                                <div class="col-lg-10">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Item Title ', 'eldritch' ); ?></em>
                                    <input type="text" class="form-control edgt-input edgt-form-element" id="optionLabel_x" name="optionLabel_x" >
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Item Text', 'eldritch' ); ?></em>
                                    <textarea class="form-control edgt-input edgt-form-element" id="optionValue_x" name="optionValue_x" ></textarea>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgt-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'eldritch' ); ?></em>
                                    <input type="text" class="form-control edgt-input edgt-form-element" id="optionUrl_x" name="optionUrl_x" >
                                </div>
                            </div>
                        </div>
                        <!-- close div.edgt-section-content -->
                    </div>
                    <!-- close div.container-fluid -->
                </div>
            </div>
        </div>
        <?php
        $no         = 1;
        $portfolios = get_post_meta($post->ID, 'edgt_portfolios', true);
        if(is_array($portfolios) && count($portfolios) > 1) {
            usort($portfolios, "eldritch_edge_compare_portfolio_options");
        }
        while(isset($portfolios[$no - 1])) {
            $portfolio = $portfolios[$no - 1];
            ?>
            <div class="edgt-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
                <div class="edgt-portfolio-toggle-holder">
                    <div class="edgt-portfolio-toggle edgt-toggle-desc">
                        <span class="number"><?php echo esc_html($no); ?></span><span class="edgt-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item - ', 'eldritch' ); ?><em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
                    </div>
                    <div class="edgt-portfolio-toggle edgt-portfolio-control">
                        <span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
                        <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="edgt-portfolio-toggle-content" style="display: none">
                    <div class="edgt-page-form-section">
                        <div class="edgt-section-content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-2">
                                        <em class="edgt-field-description"><?php esc_html_e( 'Order Number', 'eldritch' ); ?></em>
                                        <input type="text" class="form-control edgt-input edgt-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" >
                                    </div>
                                    <div class="col-lg-10">
                                        <em class="edgt-field-description"><?php esc_html_e( 'Item Title ', 'eldritch' ); ?></em>
                                        <input type="text" class="form-control edgt-input edgt-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="edgt-field-description"><?php esc_html_e( 'Item Text', 'eldritch' ); ?></em>
                                        <textarea class="form-control edgt-input edgt-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" ><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="edgt-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'eldritch' ); ?></em>
                                        <input type="text" class="form-control edgt-input edgt-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" >
                                    </div>
                                </div>
                            </div>
                            <!-- close div.edgt-section-content -->
                        </div>
                        <!-- close div.container-fluid -->
                    </div>
                </div>
            </div>
            <?php
            $no++;
        }
        ?>

        <div class="edgt-portfolio-add">
            <a class="edgt-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( ' Add New Item', 'eldritch' ); ?></a>


            <a class="edgt-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'eldritch' ); ?></a>
        </div>


    <?php

    }
}