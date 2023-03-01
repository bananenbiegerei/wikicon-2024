<?php

// Polyfills
require_once get_template_directory() . '/functions/polyfills.php';

// Load localization functions
// Usage: `__('my example text', BB_TEXT_DOMAIN)`
// String translations can be edited with [Poedit](https://poedit.net)
require_once get_template_directory() . '/functions/localization.php';

// Special features of theme
require_once get_template_directory() . '/functions/features.php';

// Load ACF blocks
require_once get_template_directory() . '/functions/acf-blocks.php';

// Wrap blocks with containers for page layout
require_once get_template_directory() . '/functions/containers.php';

// Load styles & scripts
require_once get_template_directory() . '/functions/enqueue-scripts.php';

// Define menu locations
require_once get_template_directory() . '/functions/menu.php';

// Icon dispenser
require_once get_template_directory() . '/functions/icons.php';

// Custom posts and taxonomies
require_once get_template_directory() . '/functions/custom-posts.php';
require_once get_template_directory() . '/functions/custom-taxonomies.php';

// Excerpts
require_once get_template_directory() . '/functions/excerpts.php';

// Define some image sizes
// @Ingo: is this still needed? IS: not sure yet
// require_once get_template_directory() . '/functions/image-sizes.php';

// Experimental
require_once get_template_directory() . '/functions/block-converter.php';
