<?php

if(!defined('ABSPATH')) exit;

/**
 * Interface iEldritchEdgeIconCollection
 */
interface iEldritchEdgeIconCollection {
    /**
     * @param string $title_label title of icon collection
     * @param string $param param that will be used in shortcodes
     */
    public function __construct($title_label = "", $param = "");

    /**
     * Method that returns $icons property
     * @return mixed
     */
    public function getIconsArray();

    /**
     * Generates HTML for provided icon and parameters
     * @param $icon string
     * @param array $params
     * @return mixed
     */
    public function render($icon, $params = array());

    /**
     * Checks if icon collection has social icons
     * @return mixed
     */
    public function hasSocialIcons();


}