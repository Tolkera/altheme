<?php
/**
 * Different Template functions here
 */ 

/* =Theme Filters
-------------------------------------------------------------- */

add_filter( 'the_title', 'the_title_trim' );
function the_title_trim( $title ) {
    // Might as well make use of this function to escape attributes
    $title = attribute_escape( $title );
    // What to find in the title
    $findthese = array(
        '#Protected:#', // # is just the delimeter
        '#Private:#'
    );
    // What to replace it with
    $replacewith = array(
        '', // What to replace protected with
        '' // What to replace private with
    );
    // Items replace by array key
    $title = preg_replace( $findthese, $replacewith, $title );
    return $title;
}


/**
 * Sets the post excerpt length to 40 words.
 * Use global $excerpt_length to change excerpt length
 *
 * @param int number of words
 * @return int filtered number of words
 */
if ( !is_admin() )
	add_filter( 'excerpt_length', 'theme_excerpt_length' );
	
function theme_excerpt_length( $length ) {
	global $excerpt_length;
	$length = !empty($excerpt_length) ? absint($excerpt_length) : 37;
	// Unset global var
	if (!empty($excerpt_length))
		unset($GLOBALS['excerpt_length']);

	return $length;
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and theme_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
if ( !is_admin() )
	add_filter( 'excerpt_more', 'theme_auto_excerpt_more' );

function theme_auto_excerpt_more( $more ) {
	return '';
}


/* =Theme Functions
-------------------------------------------------------------- */

/**
 * Set global var for excerpt lenght
 *
 * @param int $length of excerpt
 */
function set_excerpt_length($length) {
	$GLOBALS['excerpt_length'] = absint($length);
}

/**
 * Get the image ID from its src
 *
 * @param string $image_src
 */
function get_attachment_id_from_src ( $image_src ) {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;
}

if ( ! function_exists( 'tolkera_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own tolkera_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since tolkera 1.0
 */
function tolkera_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'tolkera' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'tolkera' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment group">
			<div class="media">
				<?php
					$avatar_size = 50;
					if ( '0' != $comment->comment_parent )
						$avatar_size = 50;

					echo get_avatar( $comment, $avatar_size );
				?>
			</div>

			<div class="comment-content media_content">
				<footer class="comment-meta">
					<div class="comment-author vcard">
					<?php
						/* translators: 1: comment author, 2: date */
						printf( __( '%1$s %2$s', 'tolkera' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a class="comment-permalink" title="' . __( 'Permalink to this comment', 'tolkera' ) . '" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date */
								sprintf( __( '%1$s', 'tolkera' ), get_comment_date() )
							)
						);
					?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tolkera' ); ?></em>
					<?php endif; ?>
                    <span class="reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tolkera' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
					<?php edit_comment_link( __( 'Edit this comment', 'tolkera' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-author .vcard -->
				</footer>
				<div class="comment-text">
					<?php comment_text(); ?>
				</div>
			</div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for tolkera_comment()