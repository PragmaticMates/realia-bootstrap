<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Thanks to not load this page directly.');

if ( post_password_required() ) : ?>
	<p><?php _e('Enter your password to view comments.'); ?></p>
	<?php return; endif; ?>

<aside id="comments">
	<?php if ( have_comments() ) : ?>
		<h2><?php comments_number(__('No comments'), __('1 Comment'), __('% Comments')); ?>
			<?php if ( comments_open() ) : ?>
				<a href="#postcomment" title="<?php _e("Leave a comment"); ?>">&raquo;</a>
			<?php endif; ?></h2>

		<div class="pages">
			<div class="left"><?php previous_comments_link() ?></div>
			<div class="right"><?php next_comments_link() ?></div>
		</div>

		<ol class="commentlist">
			<?php foreach ($comments as $comment) : ?>
				<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
					<div class="quote">
						<?php
						if(function_exists('get_avatar'))
							echo get_avatar(get_comment_author_email(), '35');
						?>
						<?php comment_text() ?></div>
					<?php if ($comment->comment_approved == '0') : ?>
						<em>Your comment is awaiting moderation.</em>
					<?php endif; ?>
				</li>
				<cite><?php comment_author_link() ?> on <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></a></cite>
			<?php endforeach; /* end for each comment */ ?>
		</ol>

		<div class="pages">
			<div class="left"><?php previous_comments_link() ?></div>
			<div class="right"><?php next_comments_link() ?></div>
		</div>
	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
			<p><?php _e('Start a conversation!'); ?></p>

		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments">Comments are closed.</p>

		<?php endif; ?>
	<?php endif; ?>
</aside>

<?php if ( comments_open() ) : ?>

	<div id="respons">

		<h2><?php comment_form_title( 'What is your opinion?' ); ?></h2>

		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be  <a href="<?php echo wp_login_url( get_permalink() ); ?>">connected</a> to post a comment.</p>
		<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form-horizontal" class="form-horizontal">

				<?php if ( is_user_logged_in() ) : ?>

					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out.">Log out &raquo;</a></p>

				<?php else : ?>


					<div class="form-group">
						<label for="name" class="col-lg-2 control-label"><?php _e('Name'); ?> </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="name" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-lg-2 control-label"><?php _e('E-Mail');?>  </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="email" id="email" vvalue="<?php echo esc_attr($comment_author); ?>"   tabindex="2" />
						</div>
					</div>

					<div class="form-group">
						<label for="url" class="col-lg-2 control-label"><?php _e('Website');?>  </label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" />
						</div>
					</div>


				<?php endif; ?>

				<div class="form-group">
					<label for="comment" class="col-lg-2 control-label"><?php _e('Comment');?>  </label>
					<div class="col-lg-10">
						<textarea name="comment" class="form-control" id="comment" cols="60" rows="10" tabindex="4"></textarea>
					</div>
				</div>


				<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

				<div class="form-group">
					<div class="col-lg-10">

						<button type="submit" class="btn btn-default" tabindex="5"><?php esc_attr_e('Submit Comment'); ?></button>
						<?php comment_id_fields(); ?>
					</div>
				</div>





				<?php do_action('comment_form', $post->ID); ?>

			</form>

		<?php endif; // If registration required and not logged in ?>
	</div>

<?php endif; // if you delete this the sky will fall on your head ?>
</aside>