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
                'title'       => __( 'Главная', 'sportgym' ),
                'id'          => 'homepage'
            ),
            array(
                'title'       => __( 'Общие настройки', 'sportgym' ),
                'id'          => 'misc'
            ),
        ),
        'settings'        => array(
            array(
                'label'       => 'Candidates',
                'id'          => 'homepage-candidates',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Candidates',
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
                'label'       => 'Слайдер',
                'id'          => 'homepage-slider',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Страницы и изображения',
                'id'          => 'secondary-menu',
                'type'        => 'list-item',
                'settings'    => array(
                    array(
                        'label'       => 'Изображение',
                        'id'          => 'image',
                        'type'        => 'upload'
                    ),
                    array(
                        'label'       => 'Страница',
                        'id'          => 'page',
                        'type'        => 'page-select'
                    ),
                ),
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Новости',
                'id'          => 'news',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Заголовок блока новостей',
                'id'          => 'news-title',
                'type'        => 'text',
                'std'         => 'Наши новости',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Количество новостей в слайдере',
                'id'          => 'news-number',
                'type'        => 'numeric-slider',
                'min_max_step'=> '0,20,1',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Количество новостей в одном слайде',
                'id'          => 'news-number-in-slide',
                'type'        => 'numeric-slider',
                'min_max_step'=> '1,3,1',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Текст ссылки на полную новость',
                'id'          => 'news-read-more-phrase',
                'type'        => 'text',
                'std'         => 'Далее',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Фото',
                'id'          => 'photo',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Заголовок блока фото',
                'id'          => 'photo-title',
                'type'        => 'text',
                'std'         => 'Фото',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Количество фото в слайдере',
                'id'          => 'photos-number',
                'type'        => 'numeric-slider',
                'min_max_step'=> '0,20,1',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Количество фото в одном слайде',
                'id'          => 'photos-number-in-slide',
                'type'        => 'numeric-slider',
                'min_max_step'=> '1,3,1',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Видео',
                'id'          => 'video',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Заголовок блока видео',
                'id'          => 'video-title',
                'type'        => 'text',
                'std'         => 'Видео',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Показывать последнее добавленное?',
                'id'          => 'latest-video-toggle',
                'type'        => 'on-off',
                'desc'        => 'Переключите для выбора определённой страницы с видео',
                'section'     => 'homepage',
                'std'         => 'on'
            ),
            array(
                'label'       => 'Страница видео',
                'id'          => 'video-to-show',
                'type'        => 'custom-post-type-select',
                'post_type'   => 'foto-video',
                'desc'        => 'Если для выбранной страницы видео добавлено не было, то будет показана последняя добавленная страница с видео',
                'section'     => 'homepage',
                'condition'   => 'latest-video-toggle:is(off)'
            ),
            array(
                'label'       => 'Отзывы',
                'id'          => 'testimonials',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Заголовок блока отзывов',
                'id'          => 'testimonials-title',
                'type'        => 'text',
                'std'         => 'Отзывы',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Количество отзывов в слайдере',
                'id'          => 'testimonials-number',
                'type'        => 'numeric-slider',
                'min_max_step'=> '0,20,1',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Количество отзывов в одном слайде',
                'id'          => 'testimonials-number-in-slide',
                'type'        => 'numeric-slider',
                'min_max_step'=> '1,3,1',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Текст ссылки на полный отзыв',
                'id'          => 'testimonials-read-more-phrase',
                'type'        => 'text',
                'std'         => 'Далее',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Текст',
                'id'          => 'copy',
                'type'        => 'tab',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Текст на главной странице',
                'id'          => 'homepage-copy',
                'type'        => 'textarea',
                'section'     => 'homepage'
            ),
            array(
                'label'       => 'Шапка',
                'id'          => 'misc',
                'type'        => 'tab',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Логотип',
                'id'          => 'header-logo',
                'type'        => 'upload',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Название сайта',
                'id'          => 'logo-title',
                'std'         => 'Европейский Центр Гимнастики',
                'type'        => 'text',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Подпись в логотипе',
                'id'          => 'header-logo-caption',
                'std'         => 'Спорт в удовольствие!',
                'type'        => 'text',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Текст кнопки "заказать обратный звонок"',
                'id'          => 'call-back-text',
                'type'        => 'text',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Текст кнопки "задать вопрос"',
                'id'          => 'ask-something',
                'type'        => 'text',
                'section'     => 'misc'
            ),
            array(
                'label'       => __( 'Социальные сети', 'sportgym' ),
                'id'          => 'social-networks',
                'type'        => 'list-item',
                'settings'    => array(
                    array(
                        'label'       => 'Ссылка на соц сеть',
                        'id'          => 'social-network-url',
                        'desc'        => 'Должна начинаться с <code>http://</code> или <code>https://</code>',
                        'type'        => 'text',
                    ),
                    array(
                        'label'       => 'Картинка',
                        'id'          => 'social-network-image',
                        'type'        => 'upload',
                    ),
                ),
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Подвал',
                'id'          => 'footer',
                'type'        => 'tab',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Логотип',
                'id'          => 'footer-logo',
                'type'        => 'upload',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Текст контактной информации',
                'id'          => 'footer-phones-text',
                'type'        => 'text',
                'std'         => 'Контактная информация:',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Текст о защите прав',
                'id'          => 'footer-copyright-text',
                'type'        => 'text',
                'std'         => 'All rights reserved. Copyright',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Общие',
                'id'          => 'common',
                'type'        => 'tab',
                'section'     => 'misc'
            ),
            array(
                'label'       => 'Телефоны',
                'id'          => 'phones',
                'type'        => 'list-item',
                'section'     => 'misc'
            ),
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