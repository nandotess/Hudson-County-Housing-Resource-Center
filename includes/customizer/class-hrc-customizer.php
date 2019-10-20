<?php
/**
 * Customizer Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'HRC_Customizer' ) ) :

	/**
	 * Customizer Class
	 */
	class HRC_Customizer {

		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customize_register' ) );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer along with several other settings
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since  1.0.0
		 */
		public function customize_register( $wp_customize ) {
			/**
			 * Title and Description
			 */
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}

	}

endif;

return new HRC_Customizer();
