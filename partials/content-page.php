<?php
/**
 * The template used for displaying page content in index.php
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'hrc-page' ); ?>>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
