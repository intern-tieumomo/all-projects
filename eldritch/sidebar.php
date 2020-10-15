<?php
$edgt_sidebar = eldritch_edge_get_sidebar();
?>
<div class="edgt-column-inner">
	<aside class="edgt-sidebar">
		<?php
		if(is_active_sidebar($edgt_sidebar)) {
			dynamic_sidebar($edgt_sidebar);
		}
		?>
	</aside>
</div>
