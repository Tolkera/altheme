<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage alla
 */
?>
<div>
	<form method="get" action="<?php echo esc_url( home_url('/') ); ?>">
		<input type="text" name="s" id="site-search" placeholder="<?php _e( 'Search alla', 'alla' ); ?>" />
		<button type="submit">Search</button>
	</form>
</div>