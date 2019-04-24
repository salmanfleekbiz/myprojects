<?php

/**
 * [clear_floats] shortcode function
 */
function easy_responsive_shortcodes_clear_floats_shortcode( $atts, $content = '' ) {

	extract( shortcode_atts( array(
		'class' => '',
	), $atts, 'clear_floats' ) );

	if ( $class ) {
		$class = ' ' . $class;
	}

	$output = sprintf( '<div class="wpcmsdev-clear-floats%s"></div>',
		$class
	);

	return apply_filters( 'easy_responsive_shortcodes_clear_floats', $output, $atts, $content );
}
