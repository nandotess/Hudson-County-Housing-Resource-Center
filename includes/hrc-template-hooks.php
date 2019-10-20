<?php
/**
 * Hooks
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Head
 *
 * @see  hrc_head_favicon()
 * @see  hrc_head_gtm()
 */
add_action( 'hrc_head', 'hrc_head_favicon', 10 );
add_action( 'hrc_head', 'hrc_head_gtm', 20 );

/**
 * Body init
 *
 * @see  hrc_body_init_gtm()
 * @see  hrc_body_init_offcanvas()
 */
add_action( 'hrc_body_init', 'hrc_body_init_gtm', 10 );
add_action( 'hrc_body_init', 'hrc_body_init_offcanvas', 20 );

/**
 * Header
 *
 * @see  hrc_header_skip()
 * @see  hrc_header_all()
 */
add_action( 'hrc_header', 'hrc_header_skip', 10 );
add_action( 'hrc_header', 'hrc_header_all', 20 );

/**
 * After content
 *
 * @see  hrc_after_content_post_related()
 */
add_action( 'hrc_after_content', 'hrc_after_content_post_related', 10 );

/**
 * Footer
 *
 * @see  hrc_footer_all()
 */
add_action( 'hrc_footer', 'hrc_footer_all', 10 );

/**
 * Body end
 *
 * @see  hrc_body_end_XXX()
 */
/* add_action( 'hrc_body_end', 'hrc_body_end_XXX', 10 ); */
