<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.2.8
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wpls_Script {

	function __construct() {

		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'wpls_admin_style_script') );

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wpls_logoshowcase_style_css' ));
	
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wpls_logoshowcase_script') );

	}

	/**
	 * Enqueue admin styles
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 2.5
	 */
	function wpls_admin_style_script( $hook ) {

		global $typenow, $wp_version;

		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts

		// Taking pages array
		$pages_arr = array( WPLS_POST_TYPE );

		if( in_array($typenow, $pages_arr) ) {
			wp_register_style( 'wpls-admin-style', WPLS_URL.'assets/css/logo-showcase-admin.css', array(), WPLS_VERSION );
			wp_enqueue_style( 'wpls-admin-style' );
		}
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wpls_logoshowcase_style_css() {
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', WPLS_URL.'assets/css/slick.css', array(), WPLS_VERSION );
			wp_enqueue_style( 'wpos-slick-style' );
		}

		wp_register_style( 'logo_showcase_style', WPLS_URL.'assets/css/logo-showcase.css', array(), WPLS_VERSION );
		wp_enqueue_style( 'logo_showcase_style');

	}

	/**
	 * Function to add style at front side
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wpls_logoshowcase_script(){
		
		// Registring slick slider js
		if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
			wp_register_script( 'wpos-slick-jquery', WPLS_URL.'assets/js/slick.min.js', array('jquery'), WPLS_VERSION, true );
		}

		wp_register_script( 'wpls-public-js', WPLS_URL.'assets/js/wpls-public.js', array('jquery'), WPLS_VERSION, true );		
		wp_localize_script( 'wpls-public-js', 'Wpls', array(
															'is_mobile' 		=>	(wp_is_mobile()) ? 1 : 0,
															'is_rtl' 			=>	(is_rtl()) ? 1 : 0,
		));	
	}
}

$wpls_script = new Wpls_Script();