<?php
/**
 * Posts.php
 *
 * Sets up custom post types for our theme.
 */
class VimPosts {

	static $default_taxonomies = array('category', 'post_tag');

	public static function init() {
		self::create_snippets_post_type();
		self::create_dotfiles_post_type();
		self::create_plugins_post_type();
	}

	/**
	 * Create Snippets Post Type
	 *
	 * Enables the custom post type 'snippet'. Snippets are meant to
	 * showcase a small batch of code for a .vimrc to enable/disable
	 * a specific feature.
	 */
	public static function create_snippets_post_type() {
		$snippets = new Vim_Custom_Post_Type(
			'snippet',
			'Snippet',
			'Snippets',
			array(
				'taxonomies' => self::$default_taxonomies
			)
		);
		$snippets->set_icon('code');
	}

	/**
	 * Create Dotfiles Post Type
	 *
	 * Enables the custom post type 'dotfile'. Dotfiles are meant to be
	 * complete solutions to getting started with vim. This doesn't necessarily
	 * mean the dotfiles ONLY set up vim - they will most likely be complete
	 * solutions.
	 */
	public static function create_dotfiles_post_type() {
		$dotfiles = new Vim_Custom_Post_Type(
			'dotfile',
			'Dotfile',
			'Dotfiles',
			array(
				'taxonomies' => self::$default_taxonomies
			)
		);
		$dotfiles->set_icon('keyboard');
	}

	/**
	 * Create Plugins Post Type
	 *
	 * Enables the custom post type 'plugin'. Plugins will simply link out
	 * to an existing vim plugin.
	 *
	 * Should include a reference to snippet on how to use it, as well as
	 * how to install it.
	 */
	public static function create_plugins_post_type() {
		$plugins = new Vim_Custom_Post_Type(
			'plugin',
			'Vim Plugin',
			'Vim Plugins',
			array(
				'taxonomies' => self::$default_taxonomies
			)
		);
		$plugins->set_icon('link');
	}
}
