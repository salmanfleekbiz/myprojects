<?php

/**
 * [icon] shortcode function
 */
function easy_responsive_shortcodes_icon_shortcode( $atts, $content = '' ) {
	$additional_classes = '';
	$output             = '';

	extract( shortcode_atts( array(
		'class' => '',
		'color' => '',
		'id'    => 'yellow',
	), $atts, 'icon' ) );

	if ( ! $id ) {
		return;
	}

	if ( $class ) {
		$additional_classes .= ' ' . $class;
	}

	if ( $color ) {
		$additional_classes .= ' color-' . $color;
	}

	$output .= sprintf( '<i class="wpcmsdev-icon fa fa-%s%s"></i>',
		$id,
		$additional_classes
	);

	return apply_filters( 'easy_responsive_shortcodes_icon_shortcode', $output, $atts, $content );
}
