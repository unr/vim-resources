<?php
/**
 * Shortcodes
 *
 * Class for handling the creation of shortcodes.
 */
class VimShortcodes {

	public static function init() {
		self::remove_paragraphs_from_shortcodes();

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

		/**
		 * Add CTA Shortcode
		 */
		add_shortcode( 'cta', array(__CLASS__, 'shortcode_cta'), 99 );

		/**
		 * Fix Existing Video Embeds
		 *
		 * This one filters an existing WP shortcode, instead of adds one
		 */
		add_filter('embed_oembed_html', array(__CLASS__, 'shortcode_video_fix'), 99, 4);
	}

	/**
	 * Prevents wp_autop from messing up my [code] shortcode with paragraph
	 * tags.
	 */
	public static function remove_paragraphs_from_shortcodes() {
		remove_filter( 'the_content', 'wpautop' );
		add_filter( 'the_content', 'wpautop' , 99);
		add_filter( 'the_content', 'shortcode_unautop',100 );
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
		$type = !empty($atts['type']) ? $atts['type'] : 'vim';
		return "<pre><code class='{$type}'>{$content}</code></pre>";
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

	/**
	 * Shortcode Embed Video Fix
	 *
	 * When embeding using standard wordpress [embed][/embed], add in a .flex-video
	 * div to make the embed responsive.
	 *
	 * This was meant to fix existing migrated videos, as well as new videos.
	 */
	public static function shortcode_video_fix($html, $url, $attr, $post_id) {
		$template = "<div class='flex-video'>%s</div>";
		return sprintf($template, $html);
	}

	/**
	 * CTA shortcode
	 */
	public static function shortcode_cta( $atts, $content ='' ) {
		$template = "<a href='%s' target='_blank' class='button button--cta'><strong>Check Out</strong> <span>%s</span></a>";
		return sprintf($template, $atts['url'], $content);
	}
}
