<?php
// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.',photographythemes); ?></p>
	<?php
		return;
	}
	?>
<!-- You can start editing here. -->
<div id="comments">
	<h4><?php comments_number(__('No Response',photographythemes), __('1 Response',photographythemes), __('% Responses',photographythemes) );?> to &#8220;<?php the_title(); ?>&#8221;</h4>
<!-- <a href="#respond" class="res">Leave a Reply</a> -->
	<div class="clear"></div>
    
	<?php if ( have_comments() ) : ?>
    <ol class="commentlist">
		<?php wp_list_comments('avatar_size=58&type=comment&callback=custom_comment&type=comment'); ?>
	</ol> 
        
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	<div class="fix"></div>
</div>
	<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments"><?php _e('Comments are closed.',photographythemes); ?></p>
	<?php endif; ?>
<?php endif; ?>
</div> <!-- end #comments_wrap -->
<?php if ('open' == $post->comment_status) : ?>

<div class="clear"></div> 
<div id="respond">
	<h4>Leave a Comment</h4>
	<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link('cancel'); ?></small>
</div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be',photographythemes); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in',photographythemes); ?></a> <?php _e('to post a comment.',photographythemes); ?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<label><?php _e('Logged in as',photographythemes); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account"><?php _e('Logout &raquo;',photographythemes); ?></a></label>
<?php else : ?>
<label for="author"><?php _e('Name',photographythemes); ?></label>
<input type="text" class="input" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />

<label for="email"><?php _e('Email',photographythemes); ?></label>
<input type="text" class="input" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />

<label for="email"><?php _e('Website:',photographythemes); ?></label>
<input type="text" name="url" class="input" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

<?php endif; ?>
<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
<label for="comment"><?php _e('Comment',photographythemes); ?></label>
<textarea name="comment" id="comment" tabindex="4" rows="" cols="" class="textarea"></textarea>
<div class="clear"></div>
<input name="submit" type="submit" class="button" id="submit" tabindex="5" value="Submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If logged in ?>
<div class="fix"></div>
</div> <!-- end #respond -->
<?php endif; // if you delete this the sky will fall on your head ?>