<?php

function easy_responsive_shortcodes_tinymce_init() {

	if ( ! current_user_can( 'edit_pages' ) && ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'easy_responsive_shortcodes_add_mce_plugin' );
		add_filter( 'mce_buttons',          'easy_responsive_shortcodes_register_mce_button' );
	}

}
add_action( 'admin_head', 'easy_responsive_shortcodes_tinymce_init' );


function easy_responsive_shortcodes_add_mce_plugin( $plugins ) {

	$plugins['easy_responsive_shortcodes_button'] = EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'js/tinymce-button.js';

	return $plugins;
}


function easy_responsive_shortcodes_register_mce_button( $buttons ) {

	$buttons[] = 'easy_responsive_shortcodes_button';

	return $buttons;
}


function easy_responsive_shortcodes_enqueue_tinymce_css() {
	global $pagenow;

	if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) {
		wp_enqueue_style( 'easy_responsive_shortcodes_tinymce', EASY_RESPONSIVE_SHORTCODES_PLUGIN_DIR_URL . 'css/tinymce-button.css', array(), EASY_RESPONSIVE_SHORTCODES_VERSION );
	}
}
add_action( 'admin_enqueue_scripts', 'easy_responsive_shortcodes_enqueue_tinymce_css' );
