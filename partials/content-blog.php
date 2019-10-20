<?php
/**
 * The template used for displaying page content in index.php
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

$blog_page_id = get_option( 'page_for_posts' );
$blog_page    = get_post( $blog_page_id );

set_query_var( 'blog_page_id', $blog_page_id );
set_query_var( 'blog_page', $blog_page );
?>

<div id="post-<?php echo esc_attr( $blog_page_id ); ?>" <?php post_class( 'hrc-page hrc-page-blog', $blog_page_id ); ?>>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<h1><?php esc_html_e( 'Blog &amp; Events', 'hrc' ); ?></h1>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php while ( have_posts() ) : ?>
				<?php
					the_post();
					get_template_part( 'partials/modules/post', 'item' );
					wp_reset_postdata();
				?>
			<?php endwhile; ?>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<nav class="hrc-pagination" aria-label="<?php esc_attr_e( 'Pagination', 'hrc' ); ?>">
					<?php wp_pagenavi(); ?>
				</nav>
			</div>
		</div>
	</div>
</div>
