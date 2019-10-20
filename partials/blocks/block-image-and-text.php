<?php
/**
 * Block Name: Image and Text
 *
 * This is the template that displays the Image and Text block.
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

$style       = get_field( 'style' ) ?: 'image-bg';
$text_color  = get_field( 'text_color' ) ?: 'darker';
$block_order = get_field( 'order' ) ?: 'left-right';
$block_title = get_field( 'title' ) ?: 'Title';
$text        = get_field( 'text' ) ?: 'Text';
$image       = get_field( 'image' ) ?: get_theme_file_uri( '/assets/img/post-placeholder.png' );

$button_url   = get_field( 'button_url' );
$button_label = get_field( 'button_label' );

// Block ID.

$block_id = $block['id'];

// Block content.

if ( is_numeric( $image ) ) {
	$image = wp_get_attachment_image_src( $image, 'large' );
	list( $image_src, $image_width, $image_height ) = $image;
} else {
	$image_src    = $image;
	$image_width  = 0;
	$image_height = 0;
}

$image_html_attr = $is_preview ? "style=\"background-image:url('{$image_src}')\""
								: "data-interchange=\"['{$image_src}', small]\"";

// Block class.

$block_class_name = 'hrc-comp hrc-comp-image-and-text';

if ( ! empty( $block['className'] ) ) {
	$block_class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
	$block_class_name .= ' is-admin';
}

// Row class.

$row_class_name = 'grid-x hrc-comp-image-and-text-row';
$row_class_name .= ' ' . $style;
$row_class_name .= ' ' . $block_order;
$row_class_name .= ' ' . $text_color;

// Left and right column classes.

$left_column_class_name  = 'cell small-12 tablet-6 hrc-comp-image-and-text-image';
$right_column_class_name = 'cell small-12 tablet-6';

if ( 'right-left' === $block_order ) {
	$left_column_class_name  .= ' tablet-order-1';
	$right_column_class_name .= ' tablet-order-2';
} else {
	$left_column_class_name  .= ' tablet-order-2';
	$right_column_class_name .= ' tablet-order-1';
}

// Button class.

$button_class_name = 'hrc-comp-image-and-text-button';

if ( 'image-bg' === $style ) {
	$button_class_name .= ' button';
}
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class_name ); ?>">
	<div class="grid-container hrc-grid-container-wide-no-padding">
		<div class="<?php echo esc_attr( $row_class_name ); ?>" <?php echo $image_html_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<div class="cell">
				<div class="grid-container">
					<div class="grid-x grid-padding-x align-middle">
						<div class="<?php echo esc_attr( $left_column_class_name ); ?>">
							<img class="hrc-comp-image-and-text-image-img <?php echo esc_attr( $style ); ?>" src="<?php echo esc_attr( $image_src ); ?>" alt="<?php echo esc_attr( $block_title ); ?>">
						</div>

						<div class="<?php echo esc_attr( $right_column_class_name ); ?>">
							<div class="hrc-comp-image-and-text-content">
								<h1 class="hrc-comp-image-and-text-title <?php echo esc_attr( $text_color ); ?>"><?php echo wp_kses_post( $block_title ); ?></h1>

								<?php if ( 'image-bg' === $style ) : ?>
									<h2 class="hrc-comp-image-and-text-text <?php echo esc_attr( $text_color ); ?>"><?php echo wp_kses_post( $text ); ?></h2>
								<?php else : ?>
									<p class="hrc-comp-image-and-text-text <?php echo esc_attr( $text_color ); ?>"><?php echo wp_kses_post( $text ); ?></p>
								<?php endif; ?>

								<?php if ( ! empty( $button_url ) && ! empty( $button_label ) ) : ?>
									<a class="<?php echo esc_attr( $button_class_name ); ?>" href="<?php echo esc_attr( $button_url ); ?>"><?php echo esc_html( $button_label ); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
