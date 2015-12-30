<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to alla_comment() which is
 * located in the alla/inc/custom.php file.
 *
 * @package WordPress
 * @subpackage alla
 * @since alla 1.0
 */
?>

	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'alla' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title" class="front_heading">
            <?php
            printf( _n( '1 comment', '%1$s comments', get_comments_number(), 'scaler' ),
                number_format_i18n( get_comments_number() ) );
            ?>
        </h2>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use alla_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define alla_comment() and that will be used instead.
				 * See alla_comment() in alla/inc/custom.php for more.
				 */
				wp_list_comments( array( 'callback' => 'alla_comment' ) );
			?>
		</ol>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'alla' ); ?></p>
	<?php endif; ?>

	<div class="comment-form">
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$new_fields =  array(
		'author' => '<div class="comment-form-author group"><label for="author">' . __( 'Name', 'alla' ) . '</label><input id="author" name="author" class="shaded-input" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		'email' => '<div class="comment-form-email group"><label for="email">' . __( 'Email', 'alla' ) . '</label><input id="email" name="email" class="shaded-input" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>'

	);
	$comment_field = '<div class="comment-form-comment group"><label for="comment">Message</label><textarea class="shaded-input" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';
	
	$comments_args = array(
		'fields' => $new_fields,
		'comment_notes_after' => '',
		'comment_field' => $comment_field,
		'comment_notes_before' => '',
		'title_reply' => __( 'Leave a comment', 'alla' ),
		'label_submit' => __( 'Send comment', 'alla' )
	);
	?>

	<?php comment_form($comments_args); ?>
	</div>

</div><!-- #comments -->
