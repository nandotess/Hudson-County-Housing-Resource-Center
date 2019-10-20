<?php
/**
 * ACF
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'hrc_acf_init' ) ) {
	/**
	 * Register Gutenberg blocks
	 *
	 * @since  1.0.0
	 */
	function hrc_acf_init() {
		// Test if ACF plugin is active.
		if ( function_exists( 'acf_register_block' ) ) {
			// Register "Spacer" block.
			acf_register_block(
				array(
					'name'            => 'spacer',
					'title'           => esc_html__( 'Spacer (inline)', 'hrc' ),
					'description'     => esc_html__( 'HRC Spacer Gutenberg Block', 'hrc' ),
					'render_template' => 'partials/blocks/block-spacer.php',
					'category'        => 'common',
					'icon'            => 'minus',
					'supports'        => array(
						'align' => false,
					),
				)
			);

			// Register "Button" block.
			acf_register_block(
				array(
					'name'            => 'button',
					'title'           => esc_html__( 'Button (inline)', 'hrc' ),
					'description'     => esc_html__( 'HRC Button Gutenberg Block', 'hrc' ),
					'render_template' => 'partials/blocks/block-button.php',
					'category'        => 'common',
					'icon'            => 'editor-removeformatting',
					'supports'        => array(
						'align' => false,
					),
				)
			);

			// Register "Image and Text" block.
			acf_register_block(
				array(
					'name'            => 'image-and-text',
					'title'           => esc_html__( 'Image and Text (block)', 'hrc' ),
					'description'     => esc_html__( 'HRC Image and Text Gutenberg Block', 'hrc' ),
					'render_template' => 'partials/blocks/block-image-and-text.php',
					'category'        => 'common',
					'icon'            => 'format-image',
					'supports'        => array(
						'align' => false,
					),
				)
			);

			// Register "Text" block.
			acf_register_block(
				array(
					'name'            => 'text',
					'title'           => esc_html__( 'Text (block)', 'hrc' ),
					'description'     => esc_html__( 'HRC Text Gutenberg Block', 'hrc' ),
					'render_template' => 'partials/blocks/block-text.php',
					'category'        => 'common',
					'icon'            => 'format-aside',
					'supports'        => array(
						'align' => false,
					),
				)
			);
		}
	}
}

add_action( 'acf/init', 'hrc_acf_init' );

if ( ! function_exists( 'hrc_acf_admin_styles' ) ) {
	/**
	 * Enqueue Gutenberg blocks admin styles
	 *
	 * @since  1.0.0
	 */
	function hrc_acf_admin_styles() {
		global $hrc;

		wp_enqueue_style( 'hrc-acf-editor-styles', get_theme_file_uri( '/assets/css/editor.css' ), array(), $hrc->version, 'screen' );
	}
}

add_action( 'enqueue_block_editor_assets', 'hrc_acf_admin_styles', 10 );
