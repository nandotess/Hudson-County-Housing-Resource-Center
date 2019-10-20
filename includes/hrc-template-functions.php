<?php
/**
 * Root functions
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
 */

if ( ! function_exists( 'hrc_head_favicon' ) ) {
	/**
	 * Favicon
	 *
	 * @since  1.0.0
	 */
	function hrc_head_favicon() {
		get_template_part( 'partials/modules/head', 'favicon' );
	}
}

if ( ! function_exists( 'hrc_head_gtm' ) ) {
	/**
	 * Gootle Tag Manager tag (head)
	 *
	 * @since  1.0.0
	 */
	function hrc_head_gtm() {
		get_template_part( 'partials/modules/head', 'gtm' );
	}
}

/**
 * Body init
 */

if ( ! function_exists( 'hrc_body_init_gtm' ) ) {
	/**
	 * Gootle Tag Manager tag (body)
	 *
	 * @since  1.0.0
	 */
	function hrc_body_init_gtm() {
		get_template_part( 'partials/modules/body-init', 'gtm' );
	}
}

if ( ! function_exists( 'hrc_body_init_offcanvas' ) ) {
	/**
	 * Off-canvas menu
	 *
	 * @since  1.0.0
	 */
	function hrc_body_init_offcanvas() {
		get_template_part( 'partials/modules/body-init', 'offcanvas' );
	}
}

/**
 * Header
 */

if ( ! function_exists( 'hrc_header_skip' ) ) {
	/**
	 * Skip to main content
	 *
	 * @since  1.0.0
	 */
	function hrc_header_skip() {
		get_template_part( 'partials/modules/header', 'skip' );
	}
}

if ( ! function_exists( 'hrc_header_all' ) ) {
	/**
	 * All header elements
	 *
	 * @since  1.0.0
	 */
	function hrc_header_all() {
		get_template_part( 'partials/modules/header', 'all' );
	}
}

/**
 * Footer
 */

if ( ! function_exists( 'hrc_footer_all' ) ) {
	/**
	 * All footer elements
	 *
	 * @since  1.0.0
	 */
	function hrc_footer_all() {
		set_query_var( 'year', date( 'Y' ) );
		get_template_part( 'partials/modules/footer', 'all' );
	}
}

/**
 * After content
 */

if ( ! function_exists( 'hrc_after_content_post_related' ) ) {
	/**
	 * Post: Related posts
	 *
	 * @since  1.0.0
	 *
	 * @param  (int|string) $post_id The post ID.
	 */
	function hrc_after_content_post_related( $post_id ) {
		// Only display this module on a post detail page.
		if ( is_single( $post_id ) && 'post' === get_post_type( $post_id ) ) {
			$categories = get_the_category();
			$category   = $categories[0] ?: null; // Get only the first one.

			if ( ! empty( $category ) ) {
				$related_query = get_transient( 'related_posts_' . $post_id );

				if ( ! is_object( $related_query ) || ! is_a( $related_query, 'WP_Query' ) ) {
					$args = array(
						'fields'                 => 'ids',
						'post__not_in'           => array( $post_id ),
						'cat'                    => $category->term_id,
						'posts_per_page'         => 2,
						'orderby'                => 'post_date',
						'order'                  => 'DESC',
						// Increase query performance.
						'no_found_rows'          => true,
						'ignore_sticky_posts'    => 1,
						'update_post_meta_cache' => false,
						'update_post_term_cache' => false,
					);

					$related_query = new \WP_Query( $args );

					if ( $related_query->post_count > 1 ) {
						$post_ids = $related_query->posts;

						$args = array(
							'post__in'               => $post_ids,
							'posts_per_page'         => count( $post_ids ),
							'orderby'                => 'post__in',
							'order'                  => 'ASC',
							// Increase query performance.
							'no_found_rows'          => true,
							'ignore_sticky_posts'    => 1,
							'update_post_meta_cache' => false,
							'update_post_term_cache' => false,
						);

						$related_query = new \WP_Query( $args );
					}

					set_transient( 'related_posts_' . $post_id, $related_query, MINUTE_IN_SECONDS );
				}

				if ( is_object( $related_query ) && is_a( $related_query, 'WP_Query' ) ) {
					if ( $related_query->have_posts() ) {
						set_query_var( 'category', $category );
						set_query_var( 'related_query', $related_query );

						get_template_part( 'partials/modules/post', 'related-posts' );
					}
				}
			}
		}
	}
}
