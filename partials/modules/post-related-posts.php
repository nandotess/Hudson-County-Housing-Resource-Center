<?php
/**
 * Post: Related posts
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

<section class="hrc-comp hrc-comp-post-related-posts">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<h2><?php esc_html_e( 'Up next', 'hrc' ); ?></h2>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php while ( $related_query->have_posts() ) : ?>
				<?php
					$related_query->the_post();
					get_template_part( 'partials/modules/post', 'item' );
					wp_reset_postdata();
				?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
