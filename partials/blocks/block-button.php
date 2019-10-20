<?php
/**
 * Block Name: Button
 *
 * This is the template that displays the Button block.
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

// Block content.

$button_url   = get_field( 'button_url' ) ?: '#';
$button_label = get_field( 'button_label' ) ?: 'Button';

// Block class.

$block_class_name = 'button';

if ( ! empty( $block['className'] ) ) {
	$block_class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
	$block_class_name .= ' is-admin';
}
?>

<a id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class_name ); ?>" href="<?php echo esc_attr( $button_url ); ?>"><?php echo esc_html( $button_label ); ?></a>
