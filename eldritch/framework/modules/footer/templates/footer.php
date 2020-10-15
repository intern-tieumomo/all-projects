<?php
/**
 * Footer template part
 */

eldritch_edge_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php if(!isset($_REQUEST["ajax_req"]) || $_REQUEST["ajax_req"] != 'yes') { ?>
	<footer <?php eldritch_edge_class_attribute($footer_classes); ?>>
		<div class="edgt-footer-inner clearfix">

			<?php

			if($display_footer_top) {
				eldritch_edge_get_footer_top();
			}
			if($display_footer_bottom) {
				eldritch_edge_get_footer_bottom();
			}
			?>

		</div>
	</footer>
<?php } ?>

</div> <!-- close div.edgt-wrapper-inner  -->
</div> <!-- close div.edgt-wrapper -->

<?php if(eldritch_edge_is_paspartu_on()){ ?>
</div> <!-- close div.edgt-wrapper-paspartu -->
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>