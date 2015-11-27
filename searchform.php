<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage tolkera
 */
?>
<div>
	<form method="get" action="<?php echo esc_url( home_url('/') ); ?>">
		<input type="text" name="s" id="site-search" placeholder="<?php _e( 'Search tolkera', 'tolkera' ); ?>" />
		<button type="submit">Search</button>
	</form>
</div>