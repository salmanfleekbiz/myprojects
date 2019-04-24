<?php
/**
 * Plugin Name: Easy Responsive Shortcodes
 * Plugin URI:  http://wpcmsdev.com/plugins/easy-responsive-shortcodes/
 * Description: Provides a set of easy-to-use shortcodes for creating columns, buttons, tabs, and much more.
 * Author:      wpCMSdev
 * Author URI:  http://wpcmsdev.com
 * Version:     1.0.1
 * Text Domain: easy-responsive-shortcodes
 * Domain Path: /languages
 *
 *
 * Copyright (C) 2014 wpCMSdev
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */


/**
 * Define plugin constants
 */

// Define the heading level for the shortcodes that use headings.
define( 'EASY_RESPONSIVE_SHORTCODES_HEADING_LEVEL', 3 );

// Plugin directory path and URL.
define( 'EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH', dirname( __FILE__ ) );
define( 'EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL',  plugin_dir_url( __FILE__ ) );

// Plugin version. WordPress, please provide a way to get this automatically on the frontend!!!
define( 'EASY_RESPONSIVE_SHORTCODES_VERSION', '1.0' );


/**
 * Load includes
 */
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/tinymce-init.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/accordion.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/alert.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/box.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/button.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/call-to-action.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/clear-floats.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/columns.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/highlight.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/icon.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/tabs.php' );
require( EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_PATH . '/includes/shortcode-functions/toggle.php' );


/**
 * Registers the plugin actions, filters, and shortcodes.
 */
function easy_responsive_shortcodes_init() {

	// Enqueue scripts and styles.
	add_action( 'wp_enqueue_scripts', 'easy_responsive_shortcodes_enqueue_scripts' );

	// Process shortcodes in the_content early, to avoid having wpautop() mess up the formatting.
	add_filter( 'the_content', 'easy_responsive_shortcodes_process_shortcodes', 7 );

	// Process shortcodes in text widgets
	add_filter( 'widget_text', 'do_shortcode' );

	// Register shortcodes.
	foreach( easy_responsive_shortcodes_get_shortcodes() as $shortcode_name => $shortcode_function ) {
		add_shortcode( $shortcode_name, $shortcode_function );
	}

	// Disable the CSS class prefix if used in a theme that declares support for the plugin.
	if ( current_theme_supports( 'wpcmsdev-easy-responsive-shortcodes' ) ) {
		define( 'EASY_RESPONSIVE_SHORTCODES_CLASS_PREFIX', null );
	}
}
add_action( 'init', 'easy_responsive_shortcodes_init' );


/**
 * Enqueues the plugin's scripts and styles
 */
function easy_responsive_shortcodes_enqueue_scripts() {

	wp_register_script( 'wpcmsdev-accordion', EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'js/accordion.js', array( 'jquery' ), true );
	wp_register_script( 'wpcmsdev-tabs',      EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'js/tabs.js',      array( 'jquery' ), true );
	wp_register_script( 'wpcmsdev-toggle',    EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'js/toggle.js',    array( 'jquery' ), true );

	// Enqueue bundled CSS only if the current theme does not declare support for the plugin.
	if ( ! current_theme_supports( 'wpcmsdev-easy-responsive-shortcodes' ) ) {
		wp_enqueue_style( 'easy-responsive-shortcodes', EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'css/easy-responsive-shortcodes.css', array(), EASY_RESPONSIVE_SHORTCODES_VERSION );
	}

	// Enqueue bundled Font Awesome if the current theme does not declare support for the font.
	if ( ! current_theme_supports( 'font-awesome-icons' ) ) {
		wp_enqueue_style( 'font-awesome', EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'css/font-awesome.css', array(), '4.2.0' );
	}
}


/**
 * Filter for the_content which processes the plugin's shortcodes
 *
 * Uses the technique advocated by WordPress core developer Alex Mills here:
 * http://www.viper007bond.com/2009/11/22/wordpress-code-earlier-shortcodes/
 * This is needed because the wpautop() function adds unwanted <p> and <br> tags around the shortcode output.
 * This filter runs before wpautop(), and so does not have that problem.
 *
 * @param  string $content The post content.
 * @return string          The filtered post content.
 */
function easy_responsive_shortcodes_process_shortcodes( $content ) {
	global $shortcode_tags;

	// Backup all existing shortcode tags.
	$original_shortcode_tags = $shortcode_tags;

	// Remove all existing shortcodes.
	remove_all_shortcodes();

	// Add back the plugin shortcodes. They'll be the only ones active.
	foreach( easy_responsive_shortcodes_get_shortcodes() as $shortcode_name => $shortcode_function ) {
		add_shortcode( $shortcode_name, $shortcode_function );
	}

	// Process the plugin shortcodes.
	$content = do_shortcode( $content );

	// Restore the original shortcodes.
	$shortcode_tags = $original_shortcode_tags;

	return $content;
}


/**
 * Returns a list of all of the shortcodes available in the plugin, with their associated function names
 *
 * @return array All available plugin shortcodes.
 */
function easy_responsive_shortcodes_get_shortcodes() {

	$shortcodes = array(
		'accordion'      => 'easy_responsive_shortcodes_accordion_shortcode',
		'accordion_item' => 'easy_responsive_shortcodes_accordion_item_shortcode',
		'alert'          => 'easy_responsive_shortcodes_alert_shortcode',
		'box'            => 'easy_responsive_shortcodes_box_shortcode',
		'button'         => 'easy_responsive_shortcodes_button_shortcode',
		'call_to_action' => 'easy_responsive_shortcodes_call_to_action_shortcode',
		'clear_floats'   => 'easy_responsive_shortcodes_clear_floats_shortcode',
		'columns'        => 'easy_responsive_shortcodes_columns_shortcode',
		'column'         => 'easy_responsive_shortcodes_column_shortcode',
		'highlight'      => 'easy_responsive_shortcodes_highlight_shortcode',
		'icon'           => 'easy_responsive_shortcodes_icon_shortcode',
		'tabs'           => 'easy_responsive_shortcodes_tabs_shortcode',
		'tab'            => 'easy_responsive_shortcodes_tab_shortcode',
		'toggle'         => 'easy_responsive_shortcodes_toggle_shortcode',
	);

	return apply_filters( 'easy_responsive_shortcodes_get_shortcodes', $shortcodes );
}
