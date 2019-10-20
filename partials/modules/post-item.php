<?php
/**
 * Post item module
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

global $post;

// Content.

$image = get_theme_file_uri( '/assets/img/post-placeholder.png' );

if ( has_post_thumbnail() ) {
	$image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
}

// Categories.

$categories = get_the_category();
$category   = $categories[0] ?: null; // Get only the first one.
?>

<div class="cell small-12 large-6">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'hrc-comp hrc-comp-post' ); ?>>
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 medium-shrink">
				<img class="hrc-comp-post-image" src="<?php echo esc_url( $image ); ?>">
			</div>

			<div class="cell small-12 medium-auto">
				<p class="hrc-comp-post-category h4"><?php echo esc_html( $category->name ); ?></p>
				<p class="hrc-comp-post-title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				<p class="hrc-comp-post-text"><?php echo esc_html( $post->post_excerpt ); ?></p>
			</div>
		</div>
	</div>
</div>
