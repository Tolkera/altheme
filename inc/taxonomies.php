<?php
add_action( 'init', 'alla_custom_post_types_and_taxonomies' );

function alla_custom_post_types_and_taxonomies() {
	$args =  array(
		'public' => true,
		'menu_position' => 30,
		'has_archive' => true,
		'supports' => array( 'title', 'custom-fields' ),
		'labels' => array(
			'name' => __( 'Slide', 'alla' ),
			'singular_name' => __( 'Slide', 'alla' ),
			'add_new' => __( 'Add new', 'alla' ),
			'add_new_item' => __( 'Add new item', 'alla' ),
			'edit' => __( 'Edit', 'alla' ),
			'edit_item' => __( 'Edit item', 'alla' ),
			'new_item' => __( 'New item', 'alla' ),
			'view' => __( 'View', 'alla' ),
			'view_item' => __( 'View slide', 'alla' ),
			'search_items' => __( 'Search slides', 'alla' ),
			'not_found' => __( 'Nothing found', 'alla' ),
			'not_found_in_trash' => __( 'Not found', 'alla' )
		)
	);

	register_post_type( 'slides', $args );

	$args =  array(
		'public' => true,
		'rewrite' => array(
			'with_front' => false,
		),
		'menu_position' => 30,
		'has_archive' => true,
		'supports' => array( 'title', 'custom-fields', 'editor', 'excerpt'),
		'labels' => array(
			'name' => __( 'Candidates', 'alla' ),
			'singular_name' => __( 'Candidate', 'alla' ),
			'add_new' => __( 'Add new', 'alla' ),
			'add_new_item' => __( 'Add new Candidate', 'alla' ),
			'edit' => __( 'Edit', 'alla' ),
			'edit_item' => __( 'Edit Candidate', 'alla' ),
			'new_item' => __( 'New Candidate', 'alla' ),
			'view' => __( 'View', 'alla' ),
			'view_item' => __( 'View Candidate', 'alla' ),
			'search_items' => __( 'Search Candidates', 'alla' ),
			'not_found' => __( 'Nothing found', 'alla' ),
			'not_found_in_trash' => __( 'Not found', 'alla' )
		)
	);

	register_post_type( 'candidates', $args );

	$args =  array(
		'public' => true,
		'menu_position' => 30,
		'has_archive' => true,
		'rewrite' => array(
			'with_front' => false,
		),
		'supports' => array( 'title', 'custom-fields', 'editor', 'excerpt'),
		'labels' => array(
			'name' => __( 'Vacancies', 'alla' ),
			'singular_name' => __( 'Vacancy', 'alla' ),
			'add_new' => __( 'Add new', 'alla' ),
			'add_new_item' => __( 'Add new Vacancy', 'alla' ),
			'edit' => __( 'Edit', 'alla' ),
			'edit_item' => __( 'Edit Vacancy', 'alla' ),
			'new_item' => __( 'New Vacancy', 'alla' ),
			'view' => __( 'View', 'alla' ),
			'view_item' => __( 'View Candidate', 'alla' ),
			'search_items' => __( 'Search Vacancies', 'alla' ),
			'not_found' => __( 'Nothing found', 'alla' ),
			'not_found_in_trash' => __( 'Not found', 'alla' )
		)
	);

	register_post_type( 'vacancies', $args );
}