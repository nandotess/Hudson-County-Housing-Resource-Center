<?php
/**
 * Single post template file
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

get_header();

while ( have_posts() ) {
	the_post();
	get_template_part( 'partials/content', 'single-post' );
}

get_footer();
