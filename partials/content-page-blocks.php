<?php
/**
 * The template used for displaying page blocks in index.php
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'hrc-page hrc-page-blocks' ); ?>>
	<?php the_content(); ?>
</div>
