<?php
/**
 * Different Template functions here
 */ 

/* =Theme Filters
-------------------------------------------------------------- */

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