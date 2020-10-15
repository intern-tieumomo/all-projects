<?php

//if accessed directly exit
if(!defined('ABSPATH')) exit;

class EdgeSkin extends EldritchEdgeSkinAbstract {
    /**
     * Skin constructor. Hooks to eldritch_edge_admin_scripts_init and eldritch_edge_enqueue_admin_styles
     */
    public function __construct() {
        $this->skinName = 'edge';

        //hook to
        add_action('eldritch_edge_admin_scripts_init', array($this, 'registerStyles'));
        add_action('eldritch_edge_admin_scripts_init', array($this, 'registerScripts'));

        add_action('eldritch_edge_enqueue_admin_styles', array($this, 'enqueueStyles'));
        add_action('eldritch_edge_enqueue_admin_scripts', array($this, 'enqueueScripts'));

        add_action('eldritch_edge_enqueue_meta_box_styles', array($this, 'enqueueStyles'));
        add_action('eldritch_edge_enqueue_meta_box_scripts', array($this, 'enqueueScripts'));

		add_action( 'admin_enqueue_scripts', array( $this, 'setShortcodeJSParams' ), 5 ); // 5 is set to be same permission as Gutenberg plugin have

		$this->setIcons();
		$this->setMenuItemPosition();
    }

    /**
     * Method that registers skin scripts
     */
    public function registerScripts() {
        $this->scripts['bootstrap.min'] = 'assets/js/bootstrap.min.js';
        $this->scripts['jquery.nouislider.min'] = 'assets/js/edgt-ui/jquery.nouislider.min.js';
        $this->scripts['edgt-ui-admin'] = 'assets/js/edgt-ui/edgt-ui.js';
        $this->scripts['edgt-bootstrap-select'] = 'assets/js/edgt-ui/edgt-bootstrap-select.min.js';
        $this->scripts['select2'] = 'assets/js/edgt-ui/select2.min.js';

        foreach ($this->scripts as $scriptHandle => $scriptPath) {
            eldritch_edge_register_skin_script($scriptHandle, $scriptPath);
        }
    }

    /**
     * Method that registers skin styles
     */
    public function registerStyles() {
        $this->styles['edgt-bootstrap'] = 'assets/css/edgt-bootstrap.css';
        $this->styles['edgt-page-admin'] = 'assets/css/edgt-page.css';
        $this->styles['edgt-options-admin'] = 'assets/css/edgt-options.css';
        $this->styles['edgt-meta-boxes-admin'] = 'assets/css/edgt-meta-boxes.css';
        $this->styles['edgt-ui-admin'] = 'assets/css/edgt-ui/edgt-ui.css';
        $this->styles['edgt-forms-admin'] = 'assets/css/edgt-forms.css';
        $this->styles['edgt-import'] = 'assets/css/edgt-import.css';
        $this->styles['font-awesome-admin'] = 'assets/css/font-awesome/css/font-awesome.min.css';
        $this->styles['select2'] = 'assets/css/select2.min.css';

        foreach ($this->styles as $styleHandle => $stylePath) {
            eldritch_edge_register_skin_style($styleHandle, $stylePath);
        }

    }

	/**
	 * Method that set menu icons
	 */

	public function setIcons() {
		$this->icons = array(
			'slider' => 'dashicons-images-alt2',
            'slider-lite' => 'dashicons-images-alt2',
			'carousel' => 'dashicons-image-flip-horizontal',
			'testimonial' => 'dashicons-format-quote',
			'portfolio' => 'dashicons-screenoptions',
			'match' => 'dashicons-networking',
			'options' => $this->getSkinURI().'/assets/img/admin-logo-icon.png'
		);
	}

	/**
	 * Method that set menu item position
	 */

	public function setMenuItemPosition() {
		$this->itemPosition = array(
			'slider' => 20,
            'slider-lite' => 20,
			'carousel' => 20,
			'testimonial' => 20,
			'portfolio' => 5,
			'options' => 61
		);
	}

    /**
     * Method that renders options page
     *
     * @see SelectSkin::getHeader()
     * @see SelectSkin::getPageNav()
     * @see SelectSkin::getPageContent()
     */
    public function renderOptions() {
        global $eldritch_Framework;
        $tab    = eldritch_edge_get_admin_tab();
        $active_page = $eldritch_Framework->edgtOptions->getAdminPageFromSlug($tab);
        if ($active_page == null) return;
        ?>
        <div class="edgt-options-page edgt-page">
            <?php $this->getHeader($active_page); ?>
            <div class="edgt-page-content-wrapper">
                <div class="edgt-page-content">
                    <div class="edgt-page-navigation edgt-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav($tab); ?>
                        <?php $this->getPageContent($active_page); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    /**
     * Method that renders header of options page.
     * @param bool $show_save_btn whether to show save button. Should be hidden on import page
     *
     * @see EdgeSkinAbstract::loadTemplatePart()
     */
    public function getHeader($activePage = '', $show_save_btn = true) {
        $this->loadTemplatePart('header', array('active_page' => $activePage, 'show_save_btn' => $show_save_btn));
    }

    /**
     * Method that loads page navigation
     * @param string $tab current tab
     * @param bool $is_import_page if is import page highlighted that tab
     *
     * @see EdgeSkinAbstract::loadTemplatePart()
     */
    public function getPageNav($tab, $is_import_page = false) {
        $this->loadTemplatePart('navigation', array(
            'tab' => $tab,
            'is_import_page' => $is_import_page
        ));
    }

    /**
     * Method that loads current page content
     *
*@param EldritchEdgeAdminPage $page current page to load
     *
     * @see EdgeSkinAbstract::loadTemplatePart()
     */
    public function getPageContent($page) {
        $this->loadTemplatePart('content', array('page' => $page));
    }

    /**
     * Method that loads content for import page
     */
    public function getImportContent() {
        $this->loadTemplatePart('content-import');
    }

    /**
     * Method that loads anchors and save button template part
     *
*@param EldritchEdgeAdminPage $page current page to load
     *
     * @see EdgeSkinAbstract::loadTemplatePart()
     */
    public function getAnchors($page) {
        $this->loadTemplatePart('anchors', array('page' => $page));

    }

    /**
     * Method that renders import page
     *
     * @see SelectSkin::getHeader()
     * * @see SelectSkin::getPageNav()
     * * @see SelectSkin::getImportContent()
     */
    public function renderImport() { ?>
        <div class="edgt-options-page edgt-page">
            <?php $this->getHeader(false); ?>
            <div class="edgt-page-content-wrapper">
                <div class="edgt-page-content">
                    <div class="edgt-page-navigation edgt-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav('tabimport', true); ?>
                        <?php $this->getImportContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
?>