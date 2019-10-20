<?php
/**
 * Navigation functions
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  hrc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'hrc_nav_primary' ) ) {
	/**
	 * Primary menu
	 *
	 * @since  1.0.0
	 *
	 * @param  string $extra_class HTML class to be added to the menu wrapper.
	 */
	function hrc_nav_primary( $extra_class = '' ) {
		$transient_key = 'hrc_nav_primary__' . str_replace( ' ', '_', esc_attr( $extra_class ) );
		$html          = get_transient( $transient_key );

		if ( empty( $html ) ) {
			$html      = '';
			$locations = get_nav_menu_locations();
			$menu      = wp_get_nav_menu_object( $locations['primary'] );

			if ( empty( $menu ) ) {
				return;
			}

			$items = wp_get_nav_menu_items( $menu->term_id );

			if ( 0 === count( $items ) ) {
				return;
			}

			$html .= '<ul class="menu hrc-nav-main-list ' . esc_attr( $extra_class ) . '">' . PHP_EOL;

			foreach ( $items as $key => $value ) {
				$html .= '<li class="hrc-nav-main-item">' . PHP_EOL;
				$html .= '<a class="hrc-nav-main-link ' . implode( ' ', $value->classes ) . '" href="' . esc_url( $value->url ) . '" target="' . esc_attr( $value->target ) . '" title="' . esc_attr( ! empty( $value->attr_title ) ? $value->attr_title : $value->title ) . '">' . esc_html( $value->title ) . '</a>' . PHP_EOL;
				$html .= '</li>' . PHP_EOL;
			}

			$html .= '</ul>' . PHP_EOL;
			set_transient( $transient_key, $html, MINUTE_IN_SECONDS );
		}

		if ( ! empty( $html ) ) {
			echo wp_kses_post( $html );
		}
	}
}

if ( ! function_exists( 'hrc_nav_primary_buttons' ) ) {
	/**
	 * Primary menu (buttons)
	 *
	 * @since  1.0.0
	 *
	 * @param  string $extra_class HTML class to be added to the menu wrapper.
	 */
	function hrc_nav_primary_buttons( $extra_class = '' ) {
		$transient_key = 'hrc_nav_primary_buttons__' . str_replace( ' ', '_', esc_attr( $extra_class ) );
		$html          = get_transient( $transient_key );

		if ( empty( $html ) ) {
			$html      = '';
			$locations = get_nav_menu_locations();
			$menu      = wp_get_nav_menu_object( $locations['primary_buttons'] );

			if ( empty( $menu ) ) {
				return;
			}

			$items = wp_get_nav_menu_items( $menu->term_id );

			if ( 0 === count( $items ) ) {
				return;
			}

			$html .= '<div class="hrc-header-buttons ' . esc_attr( $extra_class ) . '">' . PHP_EOL;

			foreach ( $items as $key => $value ) {
				$html .= '<a class="hrc-header-button button secondary ' . esc_attr( implode( ' ', $value->classes ) ) . '" href="' . esc_url( $value->url ) . '" target="' . esc_attr( $value->target ) . '" title="' . esc_attr( ! empty( $value->attr_title ) ? $value->attr_title : $value->title ) . '">' . html_entity_decode( $value->title ) . '</a>' . PHP_EOL;
			}

			$html .= '</div>' . PHP_EOL;
			set_transient( $transient_key, $html, MINUTE_IN_SECONDS );
		}

		if ( ! empty( $html ) ) {
			echo wp_kses_post( $html );
		}
	}
}

if ( ! function_exists( 'hrc_nav_footer' ) ) {
	/**
	 * Footer menu
	 *
	 * @since  1.0.0
	 *
	 * @param  string $extra_class HTML class to be added to the menu wrapper.
	 */
	function hrc_nav_footer( $extra_class = '' ) {
		$transient_key = 'hrc_nav_footer__' . str_replace( ' ', '_', esc_attr( $extra_class ) );
		$html          = get_transient( $transient_key );

		if ( empty( $html ) ) {
			$html      = '';
			$locations = get_nav_menu_locations();
			$menu      = wp_get_nav_menu_object( $locations['footer'] );

			if ( empty( $menu ) ) {
				return;
			}

			$items = wp_get_nav_menu_items( $menu->term_id );

			if ( 0 === count( $items ) ) {
				return;
			}

			$html .= '<ul class="menu hrc-nav-footer-list ' . esc_attr( $extra_class ) . '">' . PHP_EOL;

			foreach ( $items as $key => $value ) {
				$html .= '<li class="hrc-nav-footer-item">' . PHP_EOL;
				$html .= '<a class="hrc-nav-footer-link ' . implode( ' ', $value->classes ) . '" href="' . esc_url( $value->url ) . '" target="' . esc_attr( $value->target ) . '" title="' . esc_attr( ! empty( $value->attr_title ) ? $value->attr_title : $value->title ) . '">' . esc_html( $value->title ) . '</a>' . PHP_EOL;
				$html .= '</li>' . PHP_EOL;
			}

			$html .= '</ul>' . PHP_EOL;
			set_transient( $transient_key, $html, MINUTE_IN_SECONDS );
		}

		if ( ! empty( $html ) ) {
			echo wp_kses_post( $html );
		}
	}
}
