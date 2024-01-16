<?php

function add_custom_menu_class($classes, $item) {
	$classes[] = 'header_menu_item';
	return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_menu_class', 10, 2);

function add_custom_menu_link_class($atts, $item, $args) {
	// Replace 'your-custom-link-class' with the desired class name
	$atts['class'] = 'header_menu_link';
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_custom_menu_link_class', 10, 3);

function menulang_setup () {
	load_theme_textdomain( 'themename', get_template_directory() . '/languages' );
	register_nav_menus( [ 'header_menu' => __( 'Header Menu', 'themename' ) ] );
}

add_action( 'after_setup_theme', 'menulang_setup' );
