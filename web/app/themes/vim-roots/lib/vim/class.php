<?php
/**
 * Class.php
 *
 * Our main theme class, this will be used almost as a controller to facilitiate
 * which theme features are active when.
 */
class Vim extends VimUtils {

	public static function init() {
		self::setup_posts();
		self::setup_shortcodes();
		// self::setup_theme();
	}

	/**
	 * Setup Theme will include the setup.php class,
	 * and init() will add in features required by the theme.
	 */
	public static function setup_theme() {
		require_once locate_template('/lib/vim/setup.php');
		VimSetup::init();
	}

	/**
	 * Setup Shortcodes for use in posts.
	 */
	public static function setup_shortcodes() {
		require_once locate_template('/lib/vim/shortcodes.php');
		VimShortcodes::init();
	}

	/**
	 * Setup Custom Post Types
	 */
	public static function setup_posts() {
		if (class_exists('Super_Custom_Post_Type')) {
			require_once locate_template('/lib/vim/custom_post_types.php');
			require_once locate_template('/lib/vim/posts.php');
			VimPosts::init();
		} else {
			return false;
		}
	}

}
