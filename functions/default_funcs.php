<?php

//debug function for var_dump()
function debug($bug)
{
	echo '<pre style="padding: 15px; background: #000; display:block; width: 100%; color: #fff;">';
	var_dump($bug);
	echo '</pre>';
}

add_filter('the_generator', '__return_empty_string');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
add_filter('tiny_mce_plugins', 'disable_wp_emojis_in_tinymce');

add_filter('show_admin_bar', '__return_false');

add_filter('pll_get_post_types', 'unset_cpt_pll', 10, 2);
function unset_cpt_pll($post_types, $is_settings)
{
	$post_types['acf-field-group'] = 'acf-field-group';
	$post_types['acf'] = 'acf';
	return $post_types;
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
add_theme_support('post-thumbnails');
add_filter('jpeg_quality', function () {
	return 100;
});

function disable_wp_emojis_in_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

if ('disable_gutenberg') {
	add_filter('use_block_editor_for_post_type', '__return_false', 100);
	remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');

	add_action('admin_init', function () {
		remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
		add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
	});
}

// svg upload
// add to wp-config string - define( 'ALLOW_UNFILTERED_UPLOADS', true );
add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

// thumbnails sizes
add_theme_support('post-thumbnails');

add_image_size('logo-thumb', 100, 59);

// phone format for links
function phone_format($phone)
{
	$result = preg_replace("/\D+/", "", $phone);
	return $result;

	//    call function <?php phone_format($phone)
}