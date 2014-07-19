<?php
/**
 * Shortcodes
 *
 * Class for handling the creation of shortcodes.
 */
class VimShortcodes {

	public static function init() {
		/**
		 * Add Keyboard Shortcode
		 */
		add_shortcode( 'k', array(__CLASS__, 'shortcode_keyboard') );

		/**
		 * Add Code Shortcode
		 */
		add_shortcode( 'code', array(__CLASS__, 'shortcode_code') );

		/**
		 * Add jsFiddle Shortcode
		 */
		add_shortcode( 'fiddle', array(__CLASS__, 'shortcode_fiddle') );

		/**
		 * Add Gist Shortcode
		 */
		add_shortcode( 'gist', array(__CLASS__, 'shortcode_gist') );
	}

	/**
	 * Keyboard Shortcode
	 *
	 * Styles content like a keystroke.
	 *
	 * example: [k]cmd+q[/k]
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @returns string html markup
	 */
	public static function shortcode_keyboard( $atts, $content = '') {
		return "<kbd>{$content}</kbd>";
	}

	/**
	 * Code Shortcode
	 *
	 * Styles content for displaying code.
	 *
	 * example: [code]do { // stuff };[/code]
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @returns string html markup
	 */
	public static function shortcode_code( $atts, $content = '') {
		return "<pre class='{$atts['type']}'><code>{$content}</code></pre>";
	}

	/**
	 * Fiddle Shortcode
	 *
	 * Takes a passed url to a fiddle, and returns the embed in view.
	 *
	 * example: [fiddle]http://fiddle.com/asdfasdf[/fiddle]
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @returns string html markup
	 */
	public static function shortcode_fiddle( $atts, $content = '') {
		return "<p><iframe width='100%' height='300' src='{$content}/css,html,result' allowfullscreen='allowfullscreen' frameborder='0'></iframe></p>";
	}

	/**
	 * Gist Shortcode
	 *
	 * Takes a passed url to a Gist, and returns the embed in view.
	 *
	 * example: [gist]http://gist.com/asdfasdf[/gist]
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @params $atts an array of passed parameters from the shortcode entered
	 * in tinymce.
	 *
	 * @returns string html markup
	 */
	public static function shortcode_gist( $atts, $content = '') {
		return "<script src='{$content}.js'></script>";
	}
}
