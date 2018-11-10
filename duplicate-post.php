<?php
/*
Plugin Name: Duplicate Post
Plugin URI: https://www.littlebizzy.com/plugins/duplicate-post
Description: Easily duplicate (clone) any post, custom post, or page which are then saved in Draft mode, saving you tons of time and headache (no settings page).
Version: 1.1.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: duplicate-post-littlebizzy
Domain Path: /lang
Prefix: DPLCTP
*/

// Admin Notices module
require_once dirname(__FILE__).'/admin-notices.php';
DPLCTP_Admin_Notices::instance(__FILE__);

/**
 * Admin Notices Multisite check
 * Uncomment //return to disable this plugin on Multisite installs
 */
require_once dirname(__FILE__).'/admin-notices-ms.php';
if (false !== \LittleBizzy\DuplicatePost\Admin_Notices_MS::instance(__FILE__)) {
	//return;
}

/**
 * Define main plugin class
 */
class LB_Duplicate_Post {

	/**
	 * A reference to an instance of this class.
	 *
	 * @since 1.0.0
	 * @var   object
	 */
	private static $instance = null;

	/**
	 * Initalize plugin actions
	 *
	 * @return void
	 */
	public function init() {

		// This plugin is nothing to do on frontend.
		if ( ! is_admin() ) {
			return;
		}

		$this->lang();

		include $this->dir() . 'includes/class-lb-duplicate-post-handler.php';

		lb_duplicate_post_handler()->init();
	}

	/**
	 * Loads the translation files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function lang() {
		load_plugin_textdomain( 'duplicate-post-littlebizzy', false, basename( dirname( __FILE__ ) ) . '/lang' );
	}

	/**
	 * Returns plugin base file
	 *
	 * @return string
	 */
	public static function file() {
		return __FILE__;
	}

	/**
	 * Returns plugin base file
	 *
	 * @return string
	 */
	public function dir() {
		return trailingslashit( dirname( __FILE__ ) );
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}

/**
 * Returns instance of LB_Duplicate_Post class
 *
 * @return object
 */
function lb_duplicate_post() {
	return LB_Duplicate_Post::get_instance();
}

/**
 * Initalize plugin instance very on 'init' hook
 */
add_action( 'init', array( lb_duplicate_post(), 'init' ), 20 );
