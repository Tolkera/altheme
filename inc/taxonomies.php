<?php
add_action( 'init', 'tolkera_custom_post_types_and_taxonomies' );

function tolkera_custom_post_types_and_taxonomies() {
	$args =  array(
		'public' => true,
		'menu_position' => 30,
		'has_archive' => true,
		'supports' => array( 'title', 'custom-fields' ),
		'labels' => array(
			'name' => __( 'Slide', 'tolkera' ),
			'singular_name' => __( 'Slide', 'tolkera' ),
			'add_new' => __( 'Add new', 'tolkera' ),
			'add_new_item' => __( 'Add new item', 'tolkera' ),
			'edit' => __( 'Edit', 'tolkera' ),
			'edit_item' => __( 'Edit item', 'tolkera' ),
			'new_item' => __( 'New item', 'tolkera' ),
			'view' => __( 'View', 'tolkera' ),
			'view_item' => __( 'View slide', 'tolkera' ),
			'search_items' => __( 'Search slides', 'tolkera' ),
			'not_found' => __( 'Nothing found', 'tolkera' ),
			'not_found_in_trash' => __( 'Not found', 'tolkera' )
		)
	);

	register_post_type( 'slides', $args );

	$args =  array(
		'public' => true,
		'menu_position' => 30,
		'has_archive' => true,
		'supports' => array( 'title', 'custom-fields', 'editor', 'excerpt'),
		'labels' => array(
			'name' => __( 'Candidate', 'tolkera' ),
			'singular_name' => __( 'Candidate', 'tolkera' ),
			'add_new' => __( 'Add new', 'tolkera' ),
			'add_new_item' => __( 'Add new Candidate', 'tolkera' ),
			'edit' => __( 'Edit', 'tolkera' ),
			'edit_item' => __( 'Edit Candidate', 'tolkera' ),
			'new_item' => __( 'New Candidate', 'tolkera' ),
			'view' => __( 'View', 'tolkera' ),
			'view_item' => __( 'View Candidate', 'tolkera' ),
			'search_items' => __( 'Search Candidates', 'tolkera' ),
			'not_found' => __( 'Nothing found', 'tolkera' ),
			'not_found_in_trash' => __( 'Not found', 'tolkera' )
		)
	);

	register_post_type( 'candidates', $args );
}