<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form action="<?php bbp_search_url(); ?>" class="edgt-search-menu-holder bbp-search-form" method="get">
    <div class="edgt-form-holder">
        <input type="hidden" name="action" value="bbp-search-request" />
        <input type="text" class="edgt-search-field" autocomplete="off" placeholder="<?php esc_attr_e('Search...', 'eldritch'); ?>" name="bbp_search" tabindex="<?php bbp_tab_index(); ?>"  value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" />
        <input tabindex="<?php bbp_tab_index(); ?>" class="button" type="submit" value=""/>
    </div>

</form>