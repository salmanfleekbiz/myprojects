<?php

/**
 * [button] shortcode function
 */
function easy_responsive_shortcodes_button_shortcode( $atts, $content = '' ) {
	$additional_atts    = '';
	$additional_classes = '';

	extract( shortcode_atts( array(
		'class'  => '',
		'color'  => '',
		'rel'    => '',
		'target' => '',
		'title'  => '',
		'url'    => '',
	), $atts, 'button' ) );

	if ( ! $url || ! $content ) {
		return;
	}

	if ( $class ) {
		$additional_classes .= ' ' . $class;
	}

	if ( $color ) {
		$additional_classes .= ' color-' . $color;
	}

	if ( $rel ) {
		$additional_atts .= sprintf( ' rel="%s"',
			esc_attr( $rel )
		);
	}

	if ( $target ) {
		$additional_atts .= sprintf( ' target="%s"',
			esc_attr( $target )
		);
	}

	if ( $title ) {
		$additional_atts .= sprintf( ' title="%s"',
			esc_attr( $title )
		);
	}

	if ( ! current_theme_supports( 'wpcmsdev-easy-responsive-shortcodes' ) ) {
		$content = sprintf( '<span>%s</span>', $content );
	}

	$output = sprintf( '<a class="wpcmsdev-button%s" href="%s"%s>%s</a>',
		$additional_classes,
		esc_attr( $url ),
		$additional_atts,
		do_shortcode( $content )
	);

	return apply_filters( 'easy_responsive_shortcodes_button_shortcode', $output, $atts, $content );
}
