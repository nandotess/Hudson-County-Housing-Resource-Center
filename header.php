<?php
/**
 * Header
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<?php wp_head(); ?>

		<?php
			/**
			 * Functions hooked into hrc_head action
			 *
			 * @hooked hrc_head_favicon - 10
			 * @hooked hrc_head_gtm - 20
			 */
			do_action( 'hrc_head' );
		?>
	</head>

	<body <?php body_class(); ?>>
		<?php
			/**
			 * Functions hooked into hrc_body_init action
			 *
			 * @hooked hrc_body_init_gtm - 10
			 * @hooked hrc_body_init_offcanvas - 20
			 */
			do_action( 'hrc_body_init' );
		?>

		<div class="hrc-off-canvas-content off-canvas-content">
			<header id="header" class="hrc-header">
				<?php
					/**
					 * Functions hooked into hrc_header action
					 *
					 * @hooked hrc_header_skip - 10
					 * @hooked hrc_header_all - 20
					 */
					do_action( 'hrc_header' );
				?>
			</header>

			<div id="body" class="hrc-body" role="main">
				<?php
					$hrc_post_id = get_the_id();

					/**
					 * Functions hooked in to hrc_before_content add_action
					 */
					do_action( 'hrc_before_content', $hrc_post_id );
				?>
