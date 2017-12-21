<?php
/**
 * Created by PhpStorm.
 * User: ayashichi
 * Date: 2017/12/21
 * Time: 12:26
 */

class Insert_Slider_Button {

	public static function load_insert_slider_button(){
		global $pagenow;
		if( 'post.php' === $pagenow || 'post-new.php' === $pagenow ){
			wp_enqueue_script( 'post-gallery', plugins_url() . '/post-slider/admin/js/admin-post-slider.js' );
		}
	}

}