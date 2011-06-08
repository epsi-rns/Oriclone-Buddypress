<?php
/*
Plugin Name: Widget Buddy Pages
Plugin URI: http://iluni.org
Description: A very simple widget that show our buddypress menu
Version: 1.0
Author: E.R. Nurwijayadi
Author URI: http://iluni.org
*/

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'widget_buddypages' );

/* Function that registers our widget. */
function widget_buddypages() {
	register_widget( 'BuddyPages' );
}

/**
 * BP12Menu Class
 */
class BuddyPages extends WP_Widget {
    /** constructor */
    function BuddyPages() {
        parent::WP_Widget(false, $name = 'Buddy Pages');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
 
 		echo $before_widget; 
 		if ( $title )	
 			echo $before_title . __($title, 'oc') . $after_title; 
    	include('tmpl/default.php');
    	echo $after_widget; 
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) 
    {				
        $title = esc_attr($instance['title']);
    	include('tmpl/form.php');
    }

} // class BuddyPages
