<?php
/**
 * @package WordPress
 * @subpackage astrology
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
  	<?php echo '<p class="nocomments">' . __('This post is password protected. Enter the password to view comments.', 'astrology') . '</p>'; ?>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 class="space" id="comments"><?php printf( _n( '1 comment', '%1$s comments', get_comments_number(), 'astrology' ),
			number_format_i18n( get_comments_number() ), '<span class="normal">&quot;'.get_the_title().'&quot;</span>' );?></h3>

	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
    <?php echo '<p class="nocomments">' . __('No Comments Yet.', 'astrology') . '</p>'; ?>
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
    <?php echo '<p class="nocomments">' . __('Comments are closed.', 'astrology') . '</p>'; ?>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h3><?php comment_form_title( _e('Leave a comment','astrology')); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php _e('You must be', 'astrology'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in', 'astrology'); ?></a> <?php _e('to post a comment.', 'astrology'); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php _e('Logged in as', 'astrology'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'astrology'); ?>"><?php _e('Log out &raquo;', 'astrology'); ?></a></p>

<?php else : ?>

<p class="field"><label for="author"><?php _e('Name*', 'astrology'); ?></label><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p class="field"><label for="email"><?php _e('E-mail*', 'astrology'); ?></label><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p class="field"><label for="url"><?php _e('Website', 'astrology'); ?> </label><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><label for="comment"><?php _e('Comment', 'astrology'); ?></label><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Send', 'astrology'); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>