<?php
/**
 * Editor Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'HRC_Editor' ) ) :

	/**
	 * Editor Class
	 *
	 * @class HRC_Editor
	 * @since 1.0.0
	 * @package hrc
	 */
	class HRC_Editor {

		/**
		 * Setup class
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			// ## Filters ##

			// Change allowed Gutenberg block types.
			add_filter( 'allowed_block_types', array( $this, 'change_allowed_block_types' ) );

			// Disable Gutenberg for specific post types.
			add_filter( 'gutenberg_can_edit_post_type', array( $this, 'disable_gutenberg' ), 10, 2 );
			add_filter( 'use_block_editor_for_post_type', array( $this, 'disable_gutenberg' ), 10, 2 );

			// Change TinyMCE editor.
			add_filter( 'tiny_mce_before_init', array( $this, 'change_tiny_mce' ) );
		}

		/**
		 * Change allowed Gutenberg block types
		 *
		 * @since  1.0.0
		 *
		 * @param  array $allowed_blocks Allowed Gutenberg block types.
		 */
		public function change_allowed_block_types( $allowed_blocks ) {
			global $typenow;

			// WordPress core blocks.
			$allowed_blocks = array(
				// WP Core (inline).
				'core/heading',
				'core/paragraph',
				'core/list',
				// ACF (inline).
				'acf/spacer',
				'acf/button',
				// ACF (block).
				'acf/image-and-text',
				'acf/text',
			);

			return $allowed_blocks;
		}

		/**
		 * Disable Gutenberg
		 *
		 * @since  1.0.0
		 *
		 * @param  boolean $can_edit Default value.
		 * @param  string  $post_type Current post type.
		 */
		public function disable_gutenberg( $can_edit, $post_type ) {
			if ( ! is_admin() ) {
				return $can_edit;
			}

			// Disable Gutenberg for posts ("Post" post type).
			if ( 'post' === $post_type ) {
				$can_edit = false;
			}

			return $can_edit;
		}

		/**
		 * Change TinyMCE editor
		 *
		 * @since  1.0.0
		 *
		 * @param  array $settings TinyMCE settings.
		 */
		public function change_tiny_mce( $settings ) {
			// Text block formats.
			$settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';

			// Top toolbar.
			$settings['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,dfw,wp_adv';

			// Bottom toolbar.
			$settings['toolbar2'] = 'strikethrough,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help';

			return $settings;
		}

	}

endif;

return new HRC_Editor();
