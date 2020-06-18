<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Wpls_Admin {

	function __construct() {

		// Admin init process
		add_action( 'admin_init', array( $this, 'wpls_admin_init_process') );

		// Action to add metabox
		add_action( 'add_meta_boxes', array( $this, 'wpls_post_sett_metabox'), 10, 2 );

		// Action to save metabox value
		add_action( 'save_post_'.WPLS_POST_TYPE, array( $this, 'wpls_save_meta_box_data') );
		
		// Action to add admin menu
		add_action( 'admin_menu', array( $this, 'wpls_register_menu'), 12 );
		
		// Action to add custom column to Logo listing
		add_filter("manage_wplss_logo_showcase_cat_custom_column", array( $this, 'wplss_logoshowcase_cat_columns'), 10, 3);
		
		// Action to add custom column data to Logo listing
		add_filter("manage_edit-wplss_logo_showcase_cat_columns", array( $this, 'wplss_logoshowcase_cat_manage_columns') ); 
	}

	/**
	 * Post Settings Metabox
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 2.5
	 */
	function wpls_post_sett_metabox( $post_type, $post ) {
		add_meta_box( 'wpls-post-metabox', __('WP Logo Showcase Responsive Slider - Settings', 'wp-logo-showcase-responsive-slider-slider'), array($this, 'wpls_post_sett_box_callback'), WPLS_POST_TYPE, 'normal', 'high' );
	}

	/**
	 * Function to handle 'Add Link URL' metabox HTML
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 2.5
	 */
	function wpls_post_sett_box_callback( $post ) {
		include_once( WPLS_DIR .'/includes/admin/metabox/wpls-post-setting-metabox.php');
	}

	/**
	 * Function to save metabox values
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 2.5
	 */
	function wpls_save_meta_box_data( $post_id ){

		global $post_type;

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )  	// Check Revision
		|| ( $post_type !=  WPLS_POST_TYPE ) )              				// Check if current post type is supported.
		{
			return $post_id;
		}

		$prefix = WPLS_META_PREFIX; // Taking metabox prefix

		$logo_link 	= isset($_POST[$prefix.'logo_link']) 	? wpls_clean_url( $_POST[$prefix.'logo_link'] ) : '';

		// Updating Post Meta
		update_post_meta( $post_id, 'wplss_slide_link', $logo_link );
	}
	
	/**
	 * Function to add menu
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wpls_register_menu() {

		// Register plugin premium page
		add_submenu_page( 'edit.php?post_type='.WPLS_POST_TYPE, __('Upgrade to PRO - Logo Showcase Responsive Slider', 'wp-logo-showcase-responsive-slider-slider'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'wp-logo-showcase-responsive-slider-slider').'</span>', 'manage_options', 'wpls-premium', array($this, 'wpls_premium_page') );
		
		// Register plugin hire us page
		add_submenu_page( 'edit.php?post_type='.WPLS_POST_TYPE, __('Hire Us', 'wp-logo-showcase-responsive-slider-slider'), '<span style="color:#2ECC71">'.__('Hire Us', 'wp-logo-showcase-responsive-slider-slider').'</span>', 'manage_options', 'wpls-hireus', array($this, 'wpls_hireus_page') );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wpls_premium_page() {
		include_once( WPLS_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Hire Us Page Html
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 2.1
	 */
	function wpls_hireus_page() {		
		include_once( WPLS_DIR . '/includes/admin/settings/hire-us.php' );
	}
	
	/**
	 * Function to notification transient
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wpls_admin_init_process() {
		// If plugin notice is dismissed
	    if( isset($_GET['message']) && $_GET['message'] == 'wpls-plugin-notice' ) {
	    	set_transient( 'wpls_install_notice', true, 604800 );
	    }
	}

	/**
	 * Add custom column to Logo listing page
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wplss_logoshowcase_cat_columns($ouput, $column_name, $tax_id) {
		if( $column_name == 'wpls_logo_shortcode' ) {
			$ouput .= '[logoshowcase cat_id="' . $tax_id. '"]';
		}		
	    return $ouput;
	}

	/**
	 * Add custom column data to Logo listing page
	 * 
	 * @package WP Logo Showcase Responsive Slider
	 * @since 1.0.0
	 */
	function wplss_logoshowcase_cat_manage_columns($columns) {
	   $new_columns['wpls_logo_shortcode'] = __( 'Category Shortcode', 'wp-logo-showcase-responsive-slider-slider' );
		$columns = wpls_logo_add_array( $columns, $new_columns, 2 );
		return $columns;
	}
}

$wpls_Admin = new Wpls_Admin();