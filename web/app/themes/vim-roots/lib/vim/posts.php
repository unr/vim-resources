<?php
/**
 * Posts.php
 *
 * Sets up custom post types for our theme.
 */
class VimPosts {

	static $default_taxonomies = array('category', 'post_tag');

	public static function init() {
		self::do_create_custom_post_types();
		self::do_the_post_hook();
	}

	/**
	 * Wrapper function for creating all our custom post types
	 */
	public static function do_create_custom_post_types() {
		self::create_snippets_post_type();
		self::create_dotfiles_post_type();
		self::create_plugins_post_type();
	}

	/**
	 * Wrapper function for doing post hooks
	 */
	public static function do_the_post_hook() {
		add_filter('the_post', array(__CLASS__, 'add_custom_fields_to_post'), 10);
		add_filter('the_post', array(__CLASS__, 'add_submitter_to_post'), 20);
		add_filter('the_post', array(__CLASS__, 'add_source_to_post'), 20);
		add_filter('the_post', array(__CLASS__, 'add_category_to_post'), 20);
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

	/**
	 * Simple function that provides access to post fields
	 *
	 * var_dump($post->fields);
	 */
	public static function add_custom_fields_to_post($post) {
		if( is_admin() )
			return false;

		$post->fields = get_post_meta($post->ID);
	}

	/**
	 * Takes the custom fields for source, and converts them to a link for use
	 * in views.
	 *
	 * echo $post->source;
	 */
	public static function add_source_to_post($post) {
		$both_empty = (empty($post->fields['source_title'][0]) && empty($post->fields['source_url'][0]));
		if( is_admin() || $both_empty )
			return false;

		$string = $post->fields['source_title'][0];

		if (!empty($post->fields['source_url'][0])) {
			$string = "<a href='{$post->fields['source_url'][0]}'>{$string}</a>";
		}

		$post->source = $string;
	}

	/**
	 * Takes the custom fields for submitter, and converts them to a link for use
	 * in views.
	 *
	 * echo $post->submitter;
	 */
	public static function add_submitter_to_post($post) {
		$both_empty = (empty($post->fields['submitter_title'][0]) && empty($post->fields['submitter_url'][0]));
		if( is_admin() || $both_empty )
			return false;

		$string = $post->fields['submitter_title'][0];

		if (!empty($post->fields['submitter_url'][0])) {
			$string = "<a href='{$post->fields['submitter_url'][0]}'>{$string}</a>";
		}

		$post->submitter = $string;
	}

	/**
	 * Gets the posts category, gets the appropriate icon from our VimUtils
	 * class and adds it to the post object.
	 *
	 * echo $post->category['icon'];
	 */
	public static function add_category_to_post($post) {
		if( is_admin() )
			return false;

		$categories = get_the_category($post->ID);

		// For now, I only want the 'top' category
		$category = reset($categories);

		$category->icon = Vim::get_icon($category->slug);
		$category->url = get_category_link($category->term_id);

		$post->category = $category;
	}
}
