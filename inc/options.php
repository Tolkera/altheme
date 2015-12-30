<?php

// Hide the settings & documentation pages.
add_filter( 'ot_show_pages', '__return_false' );
// Enable theme Mode
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );

// Include OptionTree.
include_once( get_stylesheet_directory().'/options-tree/ot-loader.php' );

/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Populate theme options.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {

    // Get a copy of the saved settings array.
    $saved_settings = get_option( 'option_tree_settings', array() );

    $custom_settings = array(
        'contextual_help' => array(
            'content'       => array(
                array(
                    'id'        => 'general_help',
                    'title'     => 'General',
                    'content'   => '<p>Options should be provided to all languages. To do this simply switch to another language in admin area</p>'
                )
            ),
            'sidebar'       => ''
        ),
        'sections'        => array(
            array(
                'title'       => __( 'Home', 'alla' ),
                'id'          => 'homepage'
            ),
            array(
                'title'       => __( 'Candidates', 'alla' ),
                'id'          => 'candidates'
            ),
            array(
                'title'       => __( 'Vacancies', 'alla' ),
                'id'          => 'vacancies'
            ),

            array(
                'title'       => __( 'Main settings', 'alla' ),
                'id'          => 'misc'
            ),
            array(
                'title'       => __( 'Footer', 'alla' ),
                'id'          => 'footer'
            ),
        ),
        'settings'        => array(


            array(
                'label'       => 'Home Candidates',
                'id'          => 'homepage-candidates',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Vacancies Page Intro Text',
                'id'          => 'vacancies_intro',
                'type'        => 'textarea',
                'section'     => 'vacancies'
            ),
            array(
                'label'       => 'Candidates Page Intro Text',
                'id'          => 'candidates_intro',
                'type'        => 'textarea',
                'section'     => 'candidates'
            ),

            array(
                'label'       => 'Home Candidates',
                'id'          => 'homepage-candidates-list',
                'type'        => 'list-item',
                'section'     => 'homepage',
                'settings'    => array(
                    array(
                        'label'       => 'Candidates',
                        'id'          => 'homepage-candidates-select',
                        'type'        => 'custom-post-type-select',
                        'post_type'   => 'candidates',
                    ),
                )
            ),
            array(
                'label'       => 'Home vacancies',
                'id'          => 'homepage-vacancies',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Home vacancies',
                'id'          => 'homepage-vacancies-list',
                'type'        => 'list-item',
                'section'     => 'homepage',
                'settings'    => array(
                    array(
                        'label'       => 'Vacancies',
                        'id'          => 'homepage-vacancies-select',
                        'type'        => 'custom-post-type-select',
                        'post_type'   => 'vacancies',
                    ),
                )
            ),

            array(
                'label'       => 'Home Numbers',
                'id'          => 'home-numbers-tab',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),



            array(
                'label'       => 'Social links',
                'id'          => 'social-links',
                'type'        => 'tab',
                'section'     => 'misc'
            ),

            array(
                'label'       => 'LinkedIn link',
                'id'          => 'linkedin-url',
                'type'        => 'text',
                'section'     => 'misc'
            ),

            array(
                'label'       => 'Facebook link',
                'id'          => 'facebook-url',
                'type'        => 'text',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Flickr link',
                'id'          => 'flickr-url',
                'type'        => 'text',
                'section'     => 'misc'
            ),

            array(
                'label'       => 'Email',
                'id'          => 'email',
                'type'        => 'text',
                'section'     => 'misc'
            ),

            array(
                'label'       => 'Footer text',
                'id'          => 'footer-text',
                'type'        => 'text',
                'section'     => 'footer'
            )
        )
    );

    // Populate options through
    $custom_settings = apply_filters('populate_options', $custom_settings);

    /* settings are not the same update the DB */
    if ( $saved_settings !== $custom_settings ) {
        update_option( 'option_tree_settings', $custom_settings );
        // redirect to current page
        wp_redirect(current_url());
    }

}

/**
 * Add images ids to all sliders
 *
 * @since sportgym 1.0
 */
add_action('ot_after_theme_options_save', 'save_image_ids_in_lists');
function save_image_ids_in_lists() {
    $options = get_option( 'option_tree' );
    // find front_slides key
    foreach ($options as $slider_key => $list) :
        if (is_array($list))
            foreach ($list as $list_item_key => $list_item)
                if (is_array($list_item))
                    foreach ($list_item as $key => $value)
                        if (strpos($key, 'image')!==false AND 'image_id'!=$key)
                            $options[$slider_key][$list_item_key][$key.'_id'] = get_image_id_by_url($value);
    endforeach;
    update_option( 'option_tree', $options );
}

/*
 * Remove default list fields
 */
add_filter( 'ot_list_item_settings', 'remove_default_slider_filelds', 12);

function remove_default_slider_filelds() {
    return array();
}