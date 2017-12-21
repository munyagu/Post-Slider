<?php
/**
 * Created by PhpStorm.
 * User: ayashichi
 * Date: 2017/12/21
 * Time: 16:00
 */

add_shortcode( 'post_slider', array( 'Post_Slide_Short_Code', 'do_shortcode' ) );
add_action( 'wp_enqueue_scripts', array( 'Post_Slide_Short_Code', 'enqueue_scripts' ));

class Post_Slide_Short_Code {

	/**
	 * @param $atts
	 */
	public static function do_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'ids' => ''
		), $atts ) );

		/**
		 * @var $ids string media ids
		 */

		$id_arr = explode( ',', $ids );



		$images = get_posts( array(
			'include'        => $id_arr,
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'post__in'
		) );

		echo '<div class="post-slider">';
		foreach ( $images as $image ) {
			$src = wp_get_attachment_link( $image->ID, 'full', false, false, false );
			echo '<div>' . $src . '</div>';

			//echo wp_get_attachment_image($id, 'full', false);
		}

		echo '</div>';


	}

	public static function enqueue_scripts() {
		wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', null, '1.8.1' );
		wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );

		wp_enqueue_style( 'slick-theme', plugins_url() . '/post-slider/css/slick-theme-post-slider.css', array( 'slick' ), '1.8.1' );
		wp_enqueue_script( 'post-slider', plugins_url() . '/post-slider/js/post-slider.js', array( 'jquery', 'slick' ), '1.8.1', true );
	}

}