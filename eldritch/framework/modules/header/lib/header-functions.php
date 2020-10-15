<?php
use Eldritch\Modules\Header\Lib;

if(!function_exists('eldritch_edge_set_header_object')) {
	function eldritch_edge_set_header_object() {

		$header_type = eldritch_edge_get_meta_field_intersect('header_type', eldritch_edge_get_page_id());

        if(eldritch_edge_bbpress_installed() && is_bbpress()) {
            // check if it is not set in meta field
            if(get_post_meta(eldritch_edge_get_page_id(), 'edgt_header_type_meta', true) == '') {
                $header_type = eldritch_edge_options()->getOptionValue('bbpress_header_type');
            }
        }

		$object = Lib\HeaderFactory::getInstance()->build($header_type);

		if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
			$header_connector = new Lib\HeaderConnector($object);
			$header_connector->connect($object->getConnectConfig());
		}
	}

	add_action('wp', 'eldritch_edge_set_header_object', 1);
}