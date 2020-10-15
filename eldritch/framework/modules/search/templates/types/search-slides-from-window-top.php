<?php ?>
<form action="<?php echo esc_url(home_url('/')); ?>" class="edgt-search-slide-window-top" method="get">
	<?php if($search_in_grid) { ?>
	<div class="edgt-container">
		<div class="edgt-container-inner clearfix">
			<?php } ?>
			<div class="form-inner">
				<i class="fa fa-search"></i>
				<input type="text" placeholder="<?php esc_attr_e('Search', 'eldritch'); ?>" name="s" class="edgt-search-field" autocomplete="off"/>
				<input type="submit" value="<?php esc_attr_e('Search', 'eldritch'); ?>"/>

				<div class="edgt-search-close">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<?php if($search_in_grid) { ?>
		</div>
	</div>
<?php } ?>
</form>