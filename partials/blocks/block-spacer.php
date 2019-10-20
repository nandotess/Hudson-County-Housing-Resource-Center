<?php
/**
 * Block Name: Spacer
 *
 * This is the template that displays the Spacer block.
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 *
 * @param    array $block The block settings and attributes.
 * @param    string $content The block inner HTML (empty).
 * @param    bool $is_preview True during AJAX preview.
 * @param    (int|string) $post_id The post ID this block is saved to.
 */

// Block ID.

$block_id = $block['id'];

// Block class.

$block_class_name = 'hrc-spacer';

if ( ! empty( $block['className'] ) ) {
	$block_class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
	$block_class_name .= ' is-admin';
}
?>

<hr id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class_name ); ?>">
