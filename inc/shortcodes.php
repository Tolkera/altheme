<?php
/**
 * List of all available shortcodes
 *
 * @package WordPress
 * @subpackage alla
 */

/**
 * Show the portfolio [portfolio]
 */
add_shortcode( 'portfolio', 'portfolio_func' );
function portfolio_func() {
	ob_start();
	get_theme_part( 'front', 'portfolio' );
	return ob_get_clean();
}

add_shortcode( 'contact', 'contact_func' );
function contact_func() {
	ob_start();
	get_theme_part( 'section', 'contact-block' );
	return ob_get_clean();
}

add_shortcode( 'order', 'order_func' );
function order_func() {
	ob_start();
	get_theme_part( 'section', 'contact-block' );
	return ob_get_clean();
}