<form method="get" id="searchform-<?php echo rand();?>" class="edgt-search-form searchform clearfix" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="clearfix">
		<input type="text" value="" placeholder="<?php esc_attr_e('Search', 'eldritch'); ?>" name="s" id="s-<?php echo rand();?>"/>
		<input type="submit" id="searchsubmit-<?php echo rand();?>" value="&#x55;"/>
	</div>
</form>