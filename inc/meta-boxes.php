<?php
/**
 * Initialize the custom Meta Boxes.
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {

	/**
	 * Create a custom meta boxes array that we pass to
	 * the OptionTree Meta Box API Class.
	 */
    $meta_boxes = array();

	$prefix = 'slide_';
	$meta_boxes[] = array(
		'id'          => $prefix . 'meta-box',
		'title'       => 'Extra fields',
		'desc'        => '',
		'pages'       => array( 'slides' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => 'Background',
				'id'          => 'slide_bg',
				'type'        => 'upload'
			),
			array(
				'label'       => 'Title',
				'id'          => 'slide_title',
				'type'        => 'text'
			),
			array(
				'label'       => 'Description',
				'id'          => 'slide_description',
				'type'        => 'textarea'
			),
			array(
				'label'       => 'Slide CTA text',
				'id'          => 'slide_cta_text',
				'type'        => 'text'
			),
			array(
				'label'       => 'Slide CTA link',
				'id'          => 'slide_cta_link',
				'type'        => 'text',
				'desc'		=> 'Enter the url starting with http://'
			)
		)
	);

	$prefix = 'candidate_';
	$meta_boxes[] = array(
		'id'          => $prefix . 'meta-box',
		'title'       => 'Extra fields',
		'desc'        => '',
		'pages'       => array( 'candidates' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => 'Position',
				'id'          => 'candidate_position',
				'type'        => 'text'
			),
			array(
				'label'       => 'Location',
				'id'          => 'candidate_location',
				'type'        => 'text'
			)
		)
	);

	$prefix = 'vacancy_';
	$meta_boxes[] = array(
		'id'          => $prefix . 'meta-box',
		'title'       => 'Extra fields',
		'desc'        => '',
		'pages'       => array( 'vacancies' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => 'Location',
				'id'          => 'vacancy_location',
				'type'        => 'text'
			)
		)
	);

	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	if ( function_exists( 'ot_register_meta_box' ) ) {
		foreach( $meta_boxes as $meta_box ) {
			ot_register_meta_box( $meta_box );
		}
	}
}