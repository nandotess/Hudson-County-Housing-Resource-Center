<?php
/**
 * The template used for displaying page content in single-post.php
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

global $post;

$image = get_theme_file_uri( '/assets/img/post-placeholder.png' );

if ( has_post_thumbnail() ) {
	$image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'hrc-page hrc-page-post hrc-page-no-blocks' ); ?>>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<article>
					<h1 class="hrc-post-title"><?php the_title(); ?></h1>

					<div class="hrc-post-content">
						<?php if ( has_post_thumbnail() ) : ?>
							<img class="hrc-post-image" src="<?php echo esc_url( $image ); ?>">
						<?php endif; ?>

						<?php the_content(); ?>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>
