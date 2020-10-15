<div class="edgt-comment-holder clearfix" id="comments">
	<div class="edgt-comment-number">
		<div class="edgt-comment-number-inner">
			<h4 class="edgt-comment-number-title"><?php comments_number(esc_html__('No Comments', 'eldritch'), '1' . esc_html__(' Comment ', 'eldritch'), '% ' . esc_html__(' Comments ', 'eldritch')); ?></h4>
		</div>
	</div>
	<div class="edgt-comments">
		<?php if (post_password_required()) : ?>
		<p class="edgt-no-password"><?php esc_html_e('This post is password protected. Enter the password to view any comments.', 'eldritch'); ?></p>
	</div>
</div>
<?php
return;
endif;
?>
<?php if (have_comments()) : ?>

	<ul class="edgt-comment-list">
		<?php wp_list_comments(array('callback' => 'eldritch_edge_comment')); ?>
	</ul>


	<?php // End Comments ?>

<?php else : // this is displayed if there are no comments so far

	if (!comments_open()) :
		?>
		<!-- If comments are open, but there are no comments. -->


		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'eldritch'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($req ? " aria-required='true'" : '');
$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

$args = array(
	'id_form'              => 'commentform',
	'id_submit'            => 'submit_comment',
	'title_reply'          => esc_html__('Add Comment', 'eldritch'),
	'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h4>',
	'title_reply_to'       => esc_html__('Post a Reply to %s', 'eldritch'),
	'cancel_reply_link'    => esc_html__('Cancel Reply', 'eldritch'),
	'label_submit'         => esc_html__('Post Your Comment', 'eldritch'),
	'comment_field'        => '<textarea id="comment" placeholder="' . esc_attr__('Write comment', 'eldritch') . '" name="comment" cols="45" rows="7" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'fields'               => apply_filters('comment_form_default_fields', array(
		'author' => '<div class="edgt-comment-author">
							<div class="edgt-comment-author-input">
								<input id="author" name="author" placeholder="' . esc_attr__('Your full name', 'eldritch') . '" type="text" value="' . esc_attr($commenter['comment_author']) . '"' . $aria_req . ' />
							</div>
						</div>',
		'email'  => '<div class="edgt-comment-email">
						<div class="edgt-comment-email-input">
							<input id="email" name="email" type="text" placeholder="' . esc_attr__('Your email address', 'eldritch') . '" value="' . esc_attr($commenter['comment_author_email']) . '"' . $aria_req . ' />
						</div>
					</div>',
		'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $consent . ' />' .
			'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'eldritch' ) . '</label></p>'
	)));
?>
<?php if (get_comment_pages_count() > 1) {
	?>
	<div class="edgt-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<div class="edgt-comment-form">
	<?php comment_form($args); ?>
</div>
</div>