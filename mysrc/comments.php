<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) {
	echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
	return;
}

if ( have_comments() ) :
?>
	<div id="commenttitle"><?php comments_number('No Responses', 'One Response', '% Responses');?></div>
	
	<ol class="commentlist">
	<?php 
		wp_list_comments('avatar_size=32'); 
	?>
	</ol>
<?php
	if (get_option('page_comments')) :
		$comment_pages = paginate_comments_links('echo=0');
		if($comment_pages):
			echo '<div class="commentnavi"><span class="commentpages">'.$comment_pages.'</span></div>';
		endif;
	endif;

else : // this is displayed if there are no comments so far
	if ('open' == $post->comment_status) : 
			//If comments are open, but there are no comments.
		else : // comments are closed
			echo '<p class="nocomments">Comments are closed.</p>';
	endif; 
endif;

if ('open' == $post-> comment_status) : 
?>
<div id="respond">
	<strong><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></strong>
	<span class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small></span>
<?php 
	if ( get_option('comment_registration') && !$user_ID ) : 
		echo '<p>You must be <a href="'.wp_login_url(get_permalink()).'"> logged in</a> to post a comment.</p>';
	else : 
?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php
		if ( $user_ID ) :
			echo '<p>Logged in as <a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>. <a href="'.wp_logout_url(get_permalink()).'" title="Log out of this account">Log out &raquo;</a></p>';
		else : 
?>		
			<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><small>Name&nbsp;<?php if ($req) echo "(required)"; ?></small></label></p>
			<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email"><small>E-Mail (will not be published <?php if ($req) echo ", required)"; ?></small></label></p>
			<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url"><small>Website (optional)</small></label></p>
<?php endif; ?>

		<p><small><strong>XHTML:</strong> You can use these tags:&nbsp;<?php echo allowed_tags(); ?></small></p>

		<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
		<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /></p>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
		</form>
<?php 
	endif; // If registration required and not logged in 
	echo "</div>";
endif; // if you delete this the sky will fall on your head 
?>