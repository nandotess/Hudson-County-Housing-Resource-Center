<?php
/**
 * Block Name: Text
 *
 * This is the template that displays the Text block.
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

// Block content.

$block_title = get_field( 'title' ) ?: 'Title';

$column_1_title = get_field( 'column_1_title' ) ?: 'Title';
$column_1_text  = get_field( 'column_1_text' ) ?: 'Text';

$column_2_title = get_field( 'column_2_title' ) ?: 'Title';
$column_2_text  = get_field( 'column_2_text' ) ?: 'Text';

$column_3_title = get_field( 'column_3_title' ) ?: 'Title';
$column_3_text  = get_field( 'column_3_text' ) ?: 'Text';

// Block ID.

$block_id = $block['id'];

// Block class.

$block_class_name = 'hrc-comp hrc-comp-text';

if ( ! empty( $block['className'] ) ) {
	$block_class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
	$block_class_name .= ' is-admin';
}
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class_name ); ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<h1 class="hrc-comp-text-title"><?php echo wp_kses_post( $block_title ); ?></h1>
			</div>

			<div class="cell small-12 tablet-4">
				<h2 class="hrc-comp-text-subtitle"><?php echo wp_kses_post( $column_1_title ); ?></h2>
				<div class="hrc-comp-text-text"><?php echo wp_kses_post( $column_1_text ); ?></div>
			</div>

			<div class="cell small-12 tablet-4">
				<h2 class="hrc-comp-text-subtitle"><?php echo wp_kses_post( $column_2_title ); ?></h2>
				<div class="hrc-comp-text-text"><?php echo wp_kses_post( $column_2_text ); ?></div>
			</div>

			<div class="cell small-12 tablet-4">
				<h2 class="hrc-comp-text-subtitle"><?php echo wp_kses_post( $column_3_title ); ?></h2>
				<div class="hrc-comp-text-text"><?php echo wp_kses_post( $column_3_text ); ?></div>
			</div>
		</div>
	</div>
</section>
