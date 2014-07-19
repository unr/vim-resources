<?php
/**
 * Utils.php
 *
 * Class for housing utility functions, and constants/static variables. The main
 * Vim class will extend this, allowing you to use functions via Vim::function();
 */
class VimUtils {

	/**
	 * A static array for font-awesome icon lookups. Internal slugs (for things
	 * like categories and tags) can be related to a font awesome icon here.
	 *
	 * Typically will fall back on the code icon if one isn't found.
	 */
	static $icon_lookup = array(
		'default' => 'fa-code',

		// Categories
		'beginner-friendly' => 'fa-user',

		// Post Types
		'snippet' => 'fa-scissors'
	);

	/**
	 * Wrapper function for retrieving an icon from $icon_lookup by slug.
	 */
	public static function get_icon($slug) {
		$icon = self::$icon_lookup[$slug];
		if (!$icon) { return $icon_lookup['default']; }
		return $icon;
	}

	/**
	 * Checks to see if a template exists and includes it if necessary
	 *
	 * @param $name string of optional file name
	 *
	 * @param $slug string of file name
	 */
	public static function get_template($slug, $name = '') {
		$templates = array();
		$name = (string) $name;
		if ( '' !== $name )
			$templates[] = "templates/{$slug}-{$name}.php";

		$templates[] = "templates/{$slug}.php";
		return locate_template($templates, false, false);
	}
}
