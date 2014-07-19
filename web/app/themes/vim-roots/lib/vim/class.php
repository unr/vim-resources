<?php
/**
 * Class.php
 *
 * Our main theme class, this will be used almost as a controller to facilitiate
 * which theme features are active when.
 */
class Vim extends VimUtils {

	public static function init() {
		// Setup our theme basics
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

}
