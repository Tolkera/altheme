<?php
/**
 * This template file contains custom widgets
 */


/**
 * Recent_Comments widget class
 *
 * @since 2.8.0
 */
class Dizzain_Recent_Comments extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_comments widget-background', 'description' => __( 'The most recent comments' ) );
        parent::__construct('recent-comments', __('Dizzain Recent Comments'), $widget_ops);
        $this->alt_option_name = 'widget_recent_comments';

        if ( is_active_widget(false, false, $this->id_base) )
            add_action( 'wp_head', array($this, 'recent_comments_style') );

        add_action( 'comment_post', array($this, 'flush_widget_cache') );
        add_action( 'transition_comment_status', array($this, 'flush_widget_cache') );
    }

    function recent_comments_style() {
        if ( ! current_theme_supports( 'widgets' ) // Temp hack #14876
            || ! apply_filters( 'show_recent_comments_widget_style', true, $this->id_base ) )
            return;
        ?>
    <?php
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_comments', 'widget');
    }

    function widget( $args, $instance ) {
        global $comments, $comment;

        $cache = wp_cache_get('widget_recent_comments', 'widget');

        if ( ! is_array( $cache ) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        extract($args, EXTR_SKIP);
        $output = '';
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Comments' ) : $instance['title'], $instance, $this->id_base );

        if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
            $number = 5;

        $comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish', 'type' => 'comment' ) ) );
        $output .= $before_widget;
        if ( $title )
            $output .= $before_title . $title . $after_title;

        $output .= '<ul id="recentcomments">';
        if ( $comments ) {
            // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
            $post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
            _prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

            foreach ( (array) $comments as $comment) {
                $avatar_size = 32;
                $output .=  '<li class="recentcomments group"><span class="comment_avatar media">' . get_avatar( $comment->comment_author_email, $avatar_size ) . '</span><span class="comment-content media_content">' . /* translators: comments widget: 1: comment author, 2: post link */ sprintf(_x('<span class="comment_author_widget">%1$s</span>: %2$s', 'widgets'), get_comment_author_link(), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . wp_trim_words( $comment->comment_content, 15 ) . '</a>') . '</span></li>';
            }
        }
        $output .= '</ul>';
        $output .= $after_widget;

        echo $output;
        $cache[$args['widget_id']] = $output;
        wp_cache_set('widget_recent_comments', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint( $new_instance['number'] );
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_comments']) )
            delete_option('widget_recent_comments');

        return $instance;
    }

    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <?php
    }
}

/*
 * Newsletter widget
 * @since 0.1
 */
class Newsletter_Widget extends WP_Widget {

    function Newsletter_Widget() {
        $widget_ops = array( 'classname' => 'newsletter-widget', 'description' => 'Newsletter widget' );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'newsletter-widget' );
        $this->WP_Widget( 'newsletter-widget', 'Newsletter widget', $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        get_theme_part( 'widgets', 'newsletter-widget' );
    }
}

/*
 * Featured from directory
 * @since 0.1
 */
class From_Directory_Widget extends WP_Widget {

    function From_Directory_Widget() {
        $widget_ops = array( 'classname' => 'from-directory-widget', 'description' => 'Featured from directory' );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'from-directory-widget' );
        $this->WP_Widget( 'from-directory-widget', 'Featured from directory', $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        get_theme_part( 'widgets', 'from-directory-widget' );
    }
}

/*
 * Town category widget
 * @since 0.1
 */
class Town_Category_Widget extends WP_Widget {

    function Town_Category_Widget() {
        $widget_ops = array( 'classname' => 'town-category-widget', 'description' => 'The category for this widget is selected in the theme options.' );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'town-category-widget' );
        $this->WP_Widget( 'town-category-widget', 'Town category widget', $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        get_theme_part( 'widgets', 'town-category-widget' );
    }
}

/*
 * Art category widget
 * @since 0.1
 */
class Art_Category_Widget extends WP_Widget {

    function Art_Category_Widget() {
        $widget_ops = array( 'classname' => 'art-category-widget', 'description' => 'The category for this widget is selected in the theme options.' );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'art-category-widget' );
        $this->WP_Widget( 'art-category-widget', 'Art category widget', $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        get_theme_part( 'widgets', 'art-category-widget' );
    }
}