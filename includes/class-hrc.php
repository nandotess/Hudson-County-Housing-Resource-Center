<?php
/**
 * Main Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'HRC' ) ) :

	/**
	 * Main Class
	 *
	 * @class HRC
	 * @since 1.0.0
	 * @package hrc
	 */
	class HRC {

		/**
		 * Setup class
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			// ## Actions ##

			// Sets up theme defaults and registers support for various WordPress features.
			add_action( 'after_setup_theme', array( $this, 'setup' ) );

			// Enqueue styles and scripts.
			add_action( 'wp_enqueue_scripts', array( $this, 'styles_and_scripts' ) );

			// ## Filters ##

			// Change the allowed mime types.
			add_filter( 'upload_mimes', array( $this, 'change_upload_mimes' ) );

			// Change the JPEG quality on media upload.
			add_filter( 'jpeg_quality', array( $this, 'change_jpeg_quality' ) );

			// Change the excerpt length to 20 words.
			add_filter( 'excerpt_length', array( $this, 'change_excerpt_length' ), 999 );

			// Change the excerpt "read more" string.
			add_filter( 'excerpt_more', array( $this, 'change_excerpt_more' ) );

			// Change HTML Pagenavi for transform like Foundation.
			add_filter( 'wp_pagenavi', array( $this, 'change_wp_pagenavi' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features
		 *
		 * @since  1.0.0
		 */
		public function setup() {
			// ## Theme support ##
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'disable-custom-colors' );
			add_theme_support( 'disable-custom-font-sizes' );

			// ## Image sizes ##
			add_image_size( 'xxlarge', 1440, 1440 );
			add_image_size( 'xxxlarge', 2500, 2500 );

			// ## Menus ##
			register_nav_menus(
				array(
					'primary'         => esc_html__( 'Primary', 'hrc' ),
					'primary_buttons' => esc_html__( 'Primary (buttons)', 'hrc' ),
					'footer'          => esc_html__( 'Footer', 'hrc' ),
				)
			);
		}

		/**
		 * Enqueue styles and scripts
		 *
		 * @since  1.0.0
		 */
		public function styles_and_scripts() {
			global $hrc;

			// Styles.
			wp_enqueue_style( 'hrc-style', get_theme_file_uri( '/assets/css/main.css' ), array(), $hrc->version, 'screen' );
			wp_enqueue_style( 'hrc-print-style', get_theme_file_uri( '/assets/css/print.css' ), array(), $hrc->version, 'print' );

			// Scripts.
			wp_enqueue_script( 'hrc-script', get_theme_file_uri( '/assets/js/main.js' ), array(), $hrc->version, true );

			// Remove unnecessary WP imports (it's already imported on assets/js/main.js).
			if ( ! is_admin() ) {
				wp_deregister_script( 'jquery' );
			}
		}

		/**
		 * Change the allowed mime types
		 *
		 * @since  1.0.0
		 *
		 * @param  array $change_upload_mimes Array of allowerd mime types.
		 */
		public function change_upload_mimes( $change_upload_mimes ) {
			$change_upload_mimes['svg'] = 'image/svg+xml';
			return $change_upload_mimes;
		}

		/**
		 * Change the JPEG quality on media upload
		 *
		 * @since  1.0.0
		 *
		 * @param  (int|string) $quality Quality of the JPEG.
		 */
		public function change_jpeg_quality( $quality ) {
			$quality = 100;
			return $quality;
		}

		/**
		 * Change the except length to 20 words
		 *
		 * @since  1.0.0
		 *
		 * @param  string $length Except length.
		 */
		public function change_excerpt_length( $length ) {
			$length = 20;
			return $length;
		}

		/**
		 * Change the excerpt "read more" string
		 *
		 * @since  1.0.0
		 *
		 * @param  string $more Excerpt "read more" string.
		 */
		public function change_excerpt_more( $more ) {
			$more = '...';
			return $more;
		}

		/**
		 * Change HTML Pagenavi for transform like Foundation
		 *
		 * @since  1.0.0
		 *
		 * @param  string $html Pagenavi HTML.
		 */
		public function change_wp_pagenavi( $html ) {
			$html = str_replace( '<a', '<li><a', $html );
			$html = str_replace( '</a>', '</a></li>', $html );
			$html = str_replace( '<span', '<li><span', $html );
			$html = str_replace( '</span>', '</span></li>', $html );

			$html = str_replace( '<li><a class="previouspostslink" rel="prev"', '<li class="pagination-previous"><a', $html );
			$html = str_replace( '<li><a class="nextpostslink" rel="next"', '<li class="pagination-next"><a', $html );

			$html = preg_replace( '/<li><span aria-current=\'page\' class=\'current\'>([0-9]+)<\/span><\/li>/i', '<li class="current">${1}</li>', $html );

			$html = str_replace( '<div class=\'wp-pagenavi\'', '<ul class="pagination"', $html );
			$html = str_replace( '</div>', '</ul>', $html );

			return $html;
		}

	}

endif;

return new HRC();
