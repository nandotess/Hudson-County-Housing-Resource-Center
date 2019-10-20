<?php
/**
 * Disneyland
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme version
 */
$theme         = wp_get_theme( 'hrc' );
$theme_version = $theme['Version'];

/**
 * Content width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

/**
 * Where Dreams Come True
 */

global $hrc;

$hrc = (object) array(
	'version'    => $theme_version,
	'main'       => require 'includes/class-hrc.php',
	'editor'     => require 'includes/class-hrc-editor.php',
	'customizer' => require 'includes/customizer/class-hrc-customizer.php',
);

require 'includes/hrc-template-hooks.php';
require 'includes/hrc-template-functions.php';
require 'includes/hrc-template-functions-nav.php';
require 'includes/hrc-acf.php';
