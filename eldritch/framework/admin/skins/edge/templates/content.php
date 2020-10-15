<div class="edgt-tabs-content">
    <div class="tab-content">

        <div class="tab-pane fade in active">
            <div class="edgt-tab-content">
                <h2 class="edgt-page-title"><?php echo esc_html($page->title); ?></h2>


                <form method="post" class="edgt_ajax_form">
                    <?php wp_nonce_field("eldritch_edge_ajax_save_nonce","eldritch_edge_ajax_save_nonce") ?>
                    <div class="edgt-page-form">

                        <?php $page->render(); ?>
                    </div>
                </form>

            </div><!-- close edgt-tab-content -->
        </div>

    </div>
</div> <!-- close div.edgt-tabs-content -->