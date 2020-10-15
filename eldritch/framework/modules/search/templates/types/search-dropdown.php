<form action="<?php echo esc_url(home_url('/')); ?>" class="edgt-search-dropdown-holder" method="get">
	<div class="form-inner">
		<input type="text" placeholder="<?php esc_attr_e('Search...', 'eldritch'); ?>" name="s" class="edgt-search-field" autocomplete="off"/>
		<input value="<?php esc_attr_e('Search', 'eldritch'); ?>" type="submit" class="edgt-btn edgt-btn-solid edgt-btn-small">
	</div>
</form>