<?php
/**
 * Utils.php
 *
 * Class for housing utility functions, and constants/static variables. The main
 * Vim class will extend this, allowing you to use functions via Vim::function();
 */
class VimUtils {

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
