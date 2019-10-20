<?php
/**
 * Index template file
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

global $post;

get_header();

while ( have_posts() ) {
	the_post();

	$has_blocks = ( is_front_page() || 'donate' === $post->post_name );

	if ( $has_blocks ) {
		get_template_part( 'partials/content', 'page-blocks' );
	} else {
		get_template_part( 'partials/content', 'page' );
	}
}

get_footer();
