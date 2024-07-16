<?php
function register_menus() {
	register_nav_menus(
		[
			'header-menu' => __( 'Header', 'dr-reuter' ),
			'footer-menu' => __( 'Footer', 'dr-reuter' )
		]
	);
}

add_action( 'init', 'register_menus' );

class Custom_Walker_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( $depth == 0 ) {
			$output .= "<div class='first-level d-xl-none d-flex flex-column'>";
		}
	}

	function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( $depth == 0 ) {
			$output .= "</div>";
		}
	}

	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$item_url            = esc_url( $item->url );
		$item_title          = esc_html( $item->title );
		$item_classes        = implode( " ", $item->classes );
		$item_has_children   = $args->walker->has_children;
		$caretDownSvgColored = '<svg class="ms-1 main-svg" xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6" fill="none"><path d="M4.243 5.82812L0 1.58612L1.415 0.172119L4.243 3.00012L7.071 0.172119L8.486 1.58612L4.243 5.82812Z" fill="#52525B"/></svg>';

		if ( $depth == 0 ) {
			$output .= "<li class='{$item_classes}'>";
			$output .= "<a href='{$item_url}'>";
			$output .= $item_title;

			if ( $item_has_children ) {
				$output .= $caretDownSvgColored;
			}
		}
		if ( $depth == 1 ) {
			$output .= "<a href='{$item_url}' class='first-level accent-color'>- ";
			$output .= $item_title;
		}
	}

	function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( $depth == 0 ) {
			$output .= "</a>";
			$output .= '</li>';
		}
		if ( $depth == 1 ) {
			$output .= "</a>";
		}
	}
}
