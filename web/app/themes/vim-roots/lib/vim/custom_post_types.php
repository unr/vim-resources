<?php
/**
 * Vim Custom Post Types
 *
 * Extending the custom post type plugin for ourselves, so we can
 * create our own functions.
 */

class Vim_Custom_Post_Type extends Super_Custom_Post_Type {

	public function __construct() {
		$args = func_get_args();
		call_user_func_array('parent::__construct', $args);

		// Add 'submitter', 'source' as default fields
		// to all custom post types
		$this->add_submitter();
		$this->add_source();
	}

	/*
	 * Adds a custom field to specify the original source for this item. The
	 * source would be a link to an existing web page for this resource.
	 *
	 * @returns void
	 */
	public function add_source() {

		if(is_admin()) {
			$fields = array(
				'source_title' => array(
					'type' => 'text',
					'label' => 'Source Title',
					'default' => ''
					),
				'source_url' => array(
					'type' => 'text',
					'label' => 'Source URL',
					'default' => ''
				)
			);

			$this->add_meta_box(
				array(
					'id' => 'source',
					'title' => __('Original Source', 'meta'),
					'context' => 'normal',
					'priority' => 'default',
					'fields' => $fields
				)
			);
		}
	}

	/*
	 * Adds a custom field to specify the original submitter for this item. The
	 * submitter would be a name and link to social profile. Like twitter/github
	 *
	 * @returns void
	 */
	public function add_submitter() {

		if(is_admin()) {
			$fields = array(
				'submitter_title' => array(
					'type' => 'text',
					'label' => 'Submitter Title',
					'default' => ''
					),
				'submitter_url' => array(
					'type' => 'text',
					'label' => 'Submitter URL',
					'default' => ''
				)
			);

			$this->add_meta_box(
				array(
					'id' => 'submitter',
					'title' => __('Original Submitter', 'meta'),
					'context' => 'normal',
					'priority' => 'default',
					'fields' => $fields
				)
			);
		}
	}
}

/**
 * Vim Custom Post Meta
 */
class Vim_Custom_Post_Meta extends Super_Custom_Post_Meta {
}

/**
 * Vim Custom Taxonomy
 */
class Vim_Custom_Taxonomy extends Super_Custom_Taxonomy {
}
