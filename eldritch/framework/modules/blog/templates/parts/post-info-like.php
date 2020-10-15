<?php if( eldritch_edge_core_installed() ) { ?>
    <div class="edgt-blog-like edgt-post-info-item">
        <?php if(function_exists('eldritch_edge_get_like')) {
            eldritch_edge_get_like();
        } ?>
    </div>
<?php } ?>