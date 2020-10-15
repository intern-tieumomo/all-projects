<?php

/*
   Interface: iEldritchEdgeLayoutNode
   A interface that implements Layout Node methods
*/

interface iEldritchEdgeLayoutNode {
    public function hasChidren();

    public function getChild($key);

    public function addChild($key, $value);
}

/*
   Interface: iEldritchEdgeRender
   A interface that implements Render methods
*/

interface iEldritchEdgeRender {
    public function render($factory);
}

/*
   Class: EldritchEdgePanel
   A class that initializes Edge Panel
*/

class EldritchEdgePanel implements iEldritchEdgeLayoutNode, iEldritchEdgeRender {

    public $children;
    public $title;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($title_label = "", $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children        = array();
        $this->title           = $title_label;
        $this->name            = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value    = $hidden_value;
        $this->hidden_values   = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            if(eldritch_edge_option_get_value($this->hidden_property) == $this->hidden_value) {
                $hidden = true;
            } else {
                foreach($this->hidden_values as $value) {
                    if(eldritch_edge_option_get_value($this->hidden_property) == $value) {
                        $hidden = true;
                    }

                }
            }
        }
        ?>
        <div class="edgt-page-form-section-holder" id="edgt_<?php echo esc_attr($this->name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <h3 class="edgt-page-section-title"><?php echo esc_html($this->title); ?></h3>
            <?php
            foreach($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
    <?php
    }

    public function renderChild(iEldritchEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: EldritchEdgeContainer
   A class that initializes Edge Container
*/

class EldritchEdgeContainer implements iEldritchEdgeLayoutNode, iEldritchEdgeRender {

    public $children;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children        = array();
        $this->name            = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value    = $hidden_value;
        $this->hidden_values   = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            if(eldritch_edge_option_get_value($this->hidden_property) == $this->hidden_value) {
                $hidden = true;
            } else {
                foreach($this->hidden_values as $value) {
                    if(eldritch_edge_option_get_value($this->hidden_property) == $value) {
                        $hidden = true;
                    }

                }
            }
        }
        ?>
        <div class="edgt-page-form-container-holder" id="edgt_<?php echo esc_attr($this->name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <?php
            foreach($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
    <?php
    }

    public function renderChild(iEldritchEdgeRender $child, $factory) {
        $child->render($factory);
    }
}


/*
   Class: EldritchEdgeContainerNoStyle
   A class that initializes Edge Container without css classes
*/

class EldritchEdgeContainerNoStyle implements iEldritchEdgeLayoutNode, iEldritchEdgeRender {

    public $children;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children        = array();
        $this->name            = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value    = $hidden_value;
        $this->hidden_values   = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            if(eldritch_edge_option_get_value($this->hidden_property) == $this->hidden_value) {
                $hidden = true;
            } else {
                foreach($this->hidden_values as $value) {
                    if(eldritch_edge_option_get_value($this->hidden_property) == $value) {
                        $hidden = true;
                    }

                }
            }
        }
        ?>
        <div id="edgt_<?php echo esc_attr($this->name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <?php
            foreach($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
    <?php
    }

    public function renderChild(iEldritchEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: EldritchEdgeGroup
   A class that initializes Edge Group
*/

class EldritchEdgeGroup implements iEldritchEdgeLayoutNode, iEldritchEdgeRender {

    public $children;
    public $title;
    public $description;

    function __construct($title_label = "", $description = "") {
        $this->children    = array();
        $this->title       = $title_label;
        $this->description = $description;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        ?>

        <div class="edgt-page-form-section">


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($this->title); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <?php
                    foreach($this->children as $child) {
                        $this->renderChild($child, $factory);
                    }
                    ?>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php
    }

    public function renderChild(iEldritchEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: EldritchEdgeNotice
   A class that initializes Edge Notice
*/

class EldritchEdgeNotice implements iEldritchEdgeRender {

    public $children;
    public $title;
    public $description;
    public $notice;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($title_label = "", $description = "", $notice = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children        = array();
        $this->title           = $title_label;
        $this->description     = $description;
        $this->notice          = $notice;
        $this->hidden_property = $hidden_property;
        $this->hidden_value    = $hidden_value;
        $this->hidden_values   = $hidden_values;
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            if(eldritch_edge_option_get_value($this->hidden_property) == $this->hidden_value) {
                $hidden = true;
            } else {
                foreach($this->hidden_values as $value) {
                    if(eldritch_edge_option_get_value($this->hidden_property) == $value) {
                        $hidden = true;
                    }

                }
            }
        }
        ?>

        <div class="edgt-page-form-section"<?php if($hidden) { ?> style="display: none"<?php } ?>>


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($this->title); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->

            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="alert alert-warning">
                        <?php echo esc_html($this->notice); ?>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php
    }
}

/*
   Class: EldritchEdgeRow
   A class that initializes Edge Row
*/

class EldritchEdgeRow implements iEldritchEdgeLayoutNode, iEldritchEdgeRender {

    public $children;
    public $next;

    function __construct($next = false) {
        $this->children = array();
        $this->next     = $next;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        ?>
        <div class="row<?php if($this->next) {
            echo " next-row";
        } ?>">
            <?php
            foreach($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
    <?php
    }

    public function renderChild(iEldritchEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: EldritchEdgeTitle
   A class that initializes Edge Title
*/

class EldritchEdgeTitle implements iEldritchEdgeRender {
    private $name;
    private $title;
    public $hidden_property;
    public $hidden_values = array();

    function __construct($name = "", $title_label = "", $hidden_property = "", $hidden_value = "") {
        $this->title           = $title_label;
        $this->name            = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value    = $hidden_value;
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            if(eldritch_edge_option_get_value($this->hidden_property) == $this->hidden_value) {
                $hidden = true;
            }
        }
        ?>
        <h5 class="edgt-page-section-subtitle" id="edgt_<?php echo esc_attr($this->name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
    <?php
    }
}

/*
   Class: EldritchEdgeField
   A class that initializes Edge Field
*/

class EldritchEdgeField implements iEldritchEdgeRender {
    private $type;
    private $name;
    private $default_value;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    public $hidden_property;
    public $hidden_values = array();


    function __construct($type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array()) {
        global $eldritch_Framework;
        $this->type            = $type;
        $this->name            = $name;
        $this->default_value   = $default_value;
        $this->label           = $label;
        $this->description     = $description;
        $this->options         = $options;
        $this->args            = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values   = $hidden_values;
        $eldritch_Framework->edgtOptions->addOption($this->name, $this->default_value, $type);
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            foreach($this->hidden_values as $value) {
                if(eldritch_edge_option_get_value($this->hidden_property) == $value) {
                    $hidden = true;
                }

            }
        }
        $factory->render($this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden);
    }
}

/*
   Class: EldritchEdgeMetaField
   A class that initializes Edge Meta Field
*/

class EldritchEdgeMetaField implements iEldritchEdgeRender {
    private $type;
    private $name;
    private $default_value;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    public $hidden_property;
    public $hidden_values = array();


    function __construct($type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array()) {
        global $eldritch_Framework;
        $this->type            = $type;
        $this->name            = $name;
        $this->default_value   = $default_value;
        $this->label           = $label;
        $this->description     = $description;
        $this->options         = $options;
        $this->args            = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values   = $hidden_values;
        $eldritch_Framework->edgtMetaBoxes->addOption($this->name, $this->default_value);
    }

    public function render($factory) {
        $hidden = false;
        if(!empty($this->hidden_property)) {
            foreach($this->hidden_values as $value) {
                if(eldritch_edge_option_get_value($this->hidden_property) == $value) {
                    $hidden = true;
                }

            }
        }
        $factory->render($this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden);
    }
}

abstract class EldritchEdgeFieldType {

    abstract public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false);

}

class EldritchEdgeFieldText extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $col_width = 12;
        if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

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
                            <?php if($suffix) : ?>
                            <div class="input-group">
                                <?php endif; ?>
                                <input type="text"
                                       class="form-control edgt-input edgt-form-element"
                                       name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars(eldritch_edge_option_get_value($name))); ?>"
                                       />
                                <?php if($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                                <?php if($suffix) : ?>
                            </div>
                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldTextSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

        ?>


        <div class="col-lg-3" id="edgt_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
            <?php if($suffix) : ?>
            <div class="input-group">
                <?php endif; ?>
                <input type="text"
                       class="form-control edgt-input edgt-form-element"
                       name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars(eldritch_edge_option_get_value($name))); ?>"
                       />
                <?php if($suffix) : ?>
                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                <?php endif; ?>
                <?php if($suffix) : ?>
            </div>
        <?php endif; ?>
        </div>
    <?php

    }

}

class EldritchEdgeFieldTextArea extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
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
							<textarea class="form-control edgt-form-element"
                                      name="<?php echo esc_attr($name); ?>"
                                      rows="5"><?php echo esc_html(htmlspecialchars(eldritch_edge_option_get_value($name))); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldTextAreaSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        ?>

        <div class="col-lg-3">
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control edgt-form-element"
                      name="<?php echo esc_attr($name); ?>"
                      rows="5"><?php echo esc_html(eldritch_edge_option_get_value($name)); ?></textarea>
        </div>
    <?php

    }

}

class EldritchEdgeFieldColor extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
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
                            <input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>" class="my-color-field"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldColorSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        ?>

        <div class="col-lg-3" id="edgt_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
            <input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>" class="my-color-field"/>
        </div>
    <?php

    }

}

class EldritchEdgeFieldImage extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
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
                            <div class="edgt-media-uploader">
                                <div<?php if(!eldritch_edge_option_has_value($name)) { ?> style="display: none"<?php } ?>
                                    class="edgt-media-image-holder">
                                    <img src="<?php if(eldritch_edge_option_has_value($name)) {
                                        echo esc_url(eldritch_edge_get_attachment_thumb_url(eldritch_edge_option_get_value($name)));
                                    } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>"
                                         class="edgt-media-image img-thumbnail"/>
                                </div>
                                <div style="display: none"
                                     class="edgt-media-meta-fields">
                                    <input type="hidden" class="edgt-media-upload-url"
                                           name="<?php echo esc_attr($name); ?>"
                                           value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
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
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldImageSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        ?>


        <div class="col-lg-3" id="edgt_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>

            <div class="edgt-media-uploader">
                <div<?php if(!eldritch_edge_option_has_value($name)) { ?> style="display: none"<?php } ?>
                    class="edgt-media-image-holder">
                    <img src="<?php if(eldritch_edge_option_has_value($name)) {
                        echo esc_url(eldritch_edge_get_attachment_thumb_url(eldritch_edge_option_get_value($name)));
                    } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'eldritch' ); ?>"
                         class="edgt-media-image img-thumbnail"/>
                </div>
                <div style="display: none"
                     class="edgt-media-meta-fields">
                    <input type="hidden" class="edgt-media-upload-url"
                           name="<?php echo esc_attr($name); ?>"
                           value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
                </div>
                <a class="edgt-media-upload-btn btn btn-sm btn-primary"
                   href="javascript:void(0)"
                   data-frame-title="<?php esc_attr_e('Select Image', 'eldritch'); ?>"
                   data-frame-button-text="<?php esc_attr_e('Select Image', 'eldritch'); ?>"><?php esc_html_e('Upload', 'eldritch'); ?></a>
                <a style="display: none;" href="javascript: void(0)"
                   class="edgt-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'eldritch'); ?></a>
            </div>
        </div>
    <?php

    }

}

class EldritchEdgeFieldFont extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        global $eldritch_fonts_array;
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
                        <div class="col-lg-3">
                            <select class="form-control edgt-form-element"
                                    name="<?php echo esc_attr($name); ?>">
                                <option value="-1"><?php esc_html_e('Default', 'eldritch'); ?></option>
                                <?php foreach($eldritch_fonts_array as $fontArray) { ?>
                                    <option <?php if(eldritch_edge_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldFontSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        global $eldritch_fonts_array;
        ?>


        <div class="col-lg-3">
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgt-form-element"
                    name="<?php echo esc_attr($name); ?>">
                <option value="-1"><?php esc_html_e('Default', 'eldritch'); ?></option>
                <?php foreach($eldritch_fonts_array as $fontArray) { ?>
                    <option <?php if(eldritch_edge_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) {
                        echo "selected='selected'";
                    } ?> value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                <?php } ?>
            </select>
        </div>
    <?php

    }

}

class EldritchEdgeFieldSelect extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $show = array();
        if(isset($args["show"])) {
            $show = $args["show"];
        }
        $hide = array();
        if(isset($args["hide"])) {
            $hide = $args["hide"];
        }
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
                        <div class="col-lg-3">
                            <select class="form-control edgt-form-element<?php if($dependence) {
                                echo " dependence";
                            } ?>"
                                <?php foreach($show as $key => $value) { ?>
                                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                <?php foreach($hide as $key => $value) { ?>
                                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                    name="<?php echo esc_attr($name); ?>">
                                <?php foreach($options as $key => $value) {
                                    if($key == "-1") {
                                        $key = "";
                                    } ?>
                                    <option <?php if(eldritch_edge_option_get_value($name) == $key) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldSelectBlank extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $show = array();
        if(isset($args["show"])) {
            $show = $args["show"];
        }
        $hide = array();
        if(isset($args["hide"])) {
            $hide = $args["hide"];
        }
        ?>

        <div class="edgt-page-form-section"<?php if($hidden) { ?> style="display: none"<?php } ?>>


            <div class="edgt-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgt-field-desc -->


            <div class="edgt-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-control edgt-form-element<?php if($dependence) {
                                echo " dependence";
                            } ?>"
                                <?php foreach($show as $key => $value) { ?>
                                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                <?php foreach($hide as $key => $value) { ?>
                                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                    name="<?php echo esc_attr($name); ?>">
                                <option <?php if(eldritch_edge_option_get_value($name) == "") {
                                    echo "selected='selected'";
                                } ?> value=""></option>
                                <?php foreach($options as $key => $value) {
                                    if($key == "-1") {
                                        $key = "";
                                    } ?>
                                    <option <?php if(eldritch_edge_option_get_value($name) == $key) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgt-section-content -->

        </div>
    <?php

    }

}

class EldritchEdgeFieldSelectSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $show = array();
        if(isset($args["show"])) {
            $show = $args["show"];
        }
        $hide = array();
        if(isset($args["hide"])) {
            $hide = $args["hide"];
        }
        ?>


        <div class="col-lg-3">
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgt-form-element<?php if($dependence) {
                echo " dependence";
            } ?>"
                <?php foreach($show as $key => $value) { ?>
                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key => $value) { ?>
                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if(eldritch_edge_option_get_value($name) == "") {
                    echo "selected='selected'";
                } ?> value=""></option>
                <?php foreach($options as $key => $value) {
                    if($key == "-1") {
                        $key = "";
                    } ?>
                    <option <?php if(eldritch_edge_option_get_value($name) == $key) {
                        echo "selected='selected'";
                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
        </div>
    <?php

    }

}

class EldritchEdgeFieldSelectBlankSimple extends EldritchEdgeFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $eldritch_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $show = array();
        if(isset($args["show"])) {
            $show = $args["show"];
        }
        $hide = array();
        if(isset($args["hide"])) {
            $hide = $args["hide"];
        }
        ?>


        <div class="col-lg-3">
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgt-form-element<?php if($dependence) {
                echo " dependence";
            } ?>"
                <?php foreach($show as $key => $value) { ?>
                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key => $value) { ?>
                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if(eldritch_edge_option_get_value($name) == "") {
                    echo "selected='selected'";
                } ?> value=""></option>
                <?php foreach($options as $key => $value) {
                    if($key == "-1") {
                        $key = "";
                    } ?>
                    <option <?php if(eldritch_edge_option_get_value($name) == $key) {
                        echo "selected='selected'";
                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
        </div>
    <?php

    }

}

class EldritchEdgeFieldYesNo extends EldritchEdgeFieldType {

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
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "no") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if(eldritch_edge_option_get_value($name) == "yes") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
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

class EldritchEdgeFieldYesNoSimple extends EldritchEdgeFieldType {

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

        <div class="col-lg-3">
            <em class="edgt-field-description"><?php echo esc_html($label); ?></em>

            <p class="field switch">
                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "yes") {
                           echo " selected";
                       } ?><?php if($dependence) {
                           echo " dependence";
                       } ?>"><span><?php esc_html_e('Yes', 'eldritch') ?></span></label>
                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "no") {
                           echo " selected";
                       } ?><?php if($dependence) {
                           echo " dependence";
                       } ?>"><span><?php esc_html_e('No', 'eldritch') ?></span></label>
                <input type="checkbox" id="checkbox" class="checkbox"
                       name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if(eldritch_edge_option_get_value($name) == "yes") {
                    echo " selected";
                } ?>/>
                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
            </p>
        </div>
    <?php

    }
}

class EldritchEdgeFieldOnOff extends EldritchEdgeFieldType {

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
                                       class="cb-enable<?php if(eldritch_edge_option_get_value($name) == "on") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('On', 'eldritch') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(eldritch_edge_option_get_value($name) == "off") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Off', 'eldritch') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if(eldritch_edge_option_get_value($name) == "on") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(eldritch_edge_option_get_value($name)); ?>"/>
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