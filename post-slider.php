<?php

/*
Plugin Name: Post Slider
Plugin URI: http://munyagu.com/post-slider/
Description: Insert simple slider to post.
Requires at least: 4.5
Tested up to: 4.9
Requires PHP: 5.2.17
Version: 0.1
Author: munyagu
Author URI: http://munyagu.com/
License: GPL2
*/

include 'admin/classes/class-insert-slider-button.php';
include 'classes/class-post-slide-short-code.php';

add_action('admin_enqueue_scripts', array( 'Insert_Slider_Button', 'load_insert_slider_button') );




