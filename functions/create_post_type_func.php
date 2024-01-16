<?php

add_action( 'init', 'register_post_type_callback' );

function register_post_type_callback() {
	$labels = [
		'name'               => __( 'Team', 'themename' ),
		'singular_name'      => __( 'Team', 'themename' ),
		'add_new'            => __( 'Add Member', 'themename' ),
		'add_new_item'       => __( 'Add New Member', 'themename' ),
		'edit_item'          => __( 'Edit Member', 'themename' ),
		'new_item'           => __( 'New Member', 'themename' ),
		'all_items'          => __( 'All Member', 'themename' ),
		'view_item'          => __( 'View Member', 'themename' ),
		'search_items'       => __( 'Search Member', 'themename' ),
		'not_found'          => __( 'Members not found', 'themename' ),
		'not_found_in_trash' => __( 'Members not found in trash', 'themename' ),
		'menu_name'          => __( 'Team', 'themename' ), // ссылка в меню в админке
	];
	$args   = [
		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'exclude_from_search'   => false,
		'has_archive'   => true,
		'with_front'    => true,
		'menu_position' => 21,
		'rewrite' => array(
			'slug'         => 'team',
			'with_front'   => false,
			'hierarchical' => true,
		),
		'supports'      => [ 'title', 'editor', 'thumbnail' ],
	];
	register_post_type( 'team', $args );

	$labels = [
		'name'               => __( 'Testimonials', 'themename' ),
		'singular_name'      => __( 'Testimonial', 'themename' ),
		'add_new'            => __( 'Add Testimonial', 'themename' ),
		'add_new_item'       => __( 'Add New Testimonial', 'themename' ),
		'edit_item'          => __( 'Edit Testimonial', 'themename' ),
		'new_item'           => __( 'New Testimonial', 'themename' ),
		'all_items'          => __( 'All Testimonials', 'themename' ),
		'view_item'          => __( 'View Testimonial', 'themename' ),
		'search_items'       => __( 'Search Testimonial', 'themename' ),
		'not_found'          => __( 'Testimonial not found', 'themename' ),
		'not_found_in_trash' => __( 'Testimonial not found in trash', 'themename' ),
		'menu_name'          => __( 'Testimonials', 'themename' ), // ссылка в меню в админке
	];
	$args   = [
		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'exclude_from_search'   => false,
		'has_archive'   => true,
		'with_front'    => true,
		'menu_position' => 22,
		'rewrite' => array(
			'slug'         => 'testimonial',
			'with_front'   => false,
			'hierarchical' => true,
		),
		'supports'      => [ 'title', 'editor', 'thumbnail' ],
	];
	register_post_type( 'testimonials', $args );
}
