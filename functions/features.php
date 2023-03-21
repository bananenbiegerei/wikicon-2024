<?php

// PHP function to debug a PHP variable to the JS console
function clog($var)
{
	$json = json_encode($var);
	echo "<script>console.log($json)</script>";
}

// Test if this is a production server
function is_production_server()
{
	return !file_exists(ABSPATH . '#NOT_PROD#');
}

// Add an option to defer loading of scripts (required for AlpineJS)
// Usage: `wp_enqueue_script('site-js:defer'...`
add_filter(
	'script_loader_tag',
	function ($tag, $handle, $src) {
		if (strstr($handle, ':defer')) {
			$tag = str_replace('<script ', '<script defer ', $tag);
			$tag = str_replace(':defer', '', $tag);
		}
		return $tag;
	},
	10,
	3,
);

// Enable ACF options page
if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

// Disable admin bar in site view
show_admin_bar(false);

// Add support for thumbnails and excerpts
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails', ['post', 'page', 'projects', 'team', 'theme-releases']);
	add_post_type_support('projects', 'excerpt');
	add_post_type_support('page', 'excerpt');
});

// Set custom excerpt length
add_filter(
	'excerpt_length',
	function ($length) {
		return 20;
	},
	999,
);
