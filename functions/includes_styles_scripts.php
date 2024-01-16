<?php

// styles and scripts including
function load_theme_styles () {
	wp_enqueue_style( 'style' );

	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/main_global.css', [], time(), 'all' );

	//	wp_enqueue_script( 'jquery' );
	$js_directory_uri = get_template_directory_uri() . '/js/';

	wp_enqueue_script( 'main', $js_directory_uri . 'main.js', [ 'jquery' ], null, true );
	wp_enqueue_script( 'font-loader', $js_directory_uri . 'font-loader.js', [ 'jquery' ], null, false );
	wp_enqueue_script( 'all', $js_directory_uri . 'all.js', [ 'jquery' ], null, true );

	wp_localize_script( 'jquery', 'myajax', [
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'myajax-nonce' ),
		] );
}

add_action( 'wp_enqueue_scripts', 'load_theme_styles', 100 );

add_filter('script_loader_tag', function ($tag, $handle) {

	if (!is_admin()) {
		return str_replace(' src', ' defer="defer" src', $tag);
	}

	return $tag;
}, 10, 2);
