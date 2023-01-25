<?php

// Site scripts and style
add_action(
	'wp_enqueue_scripts',
	function () {
		// Site javascript, loaded with defer
		wp_enqueue_script('site:defer', get_template_directory_uri() . '/js/site.js', ['jquery'], '', false);

		// Allow easy editing of post with `CTLR-E`
		if (current_user_can('edit_post')) {
			$post_edit_url = get_edit_post_link(get_the_ID(), '&');
			$script = <<<EOF
					var postEditURL = "$post_edit_url";
					document.addEventListener('keydown', function (event) {
					event = event || window.event;
					if(event.keyCode == 69 && event.ctrlKey) {
						window.open(postEditURL, '_blank');
						}
					});
			EOF;
			wp_add_inline_script('site:defer', $script);
		}

		// Site style
		wp_enqueue_style('style', get_template_directory_uri() . '/css/site.css', [], '', 'all');
	},
	999,
);

// Editor style
add_action(
	'admin_enqueue_scripts',
	function () {
		// Editor style
		wp_enqueue_style('style', get_template_directory_uri() . '/css/editor.css', [], '', 'all');
	},
	999,
);
