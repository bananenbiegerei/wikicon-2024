<?php
//FIX TITLE missing

// Get link and text
$link = get_field('content')['link'] ? get_field('content')['link'] : ['title' => 'Missing Link!', 'url' => '#'];
$text = '';
$title = '';
$image = false;
$theme = [];
$format = [];
$post_type = false;

// See if there's a post with this URL
if ($local_post_id = url_to_postid($link['url'])) {
	$local_post = get_post($local_post_id);
	$text = $local_post->post_excerpt;
	$title = $local_post->post_title;
	$image = get_post_thumbnail_id($local_post_id);
	$post_type = get_post_type($local_post_id);
	// Get themes and formats
	foreach (wp_get_post_terms($local_post_id, ['format', 'theme']) as $term) {
		if ($term->taxonomy == 'format') {
			$format[] = $term->name;
		}
		if ($term->taxonomy == 'theme') {
			$theme[] = $term->name;
		}
	}
}

// Override if alt. versions are provided
if (get_field('content')['alt_details']) {
	$alt_theme = array_map(
		function ($a) {
			return $a->name;
		},
		get_field('content')['theme'] ? get_field('content')['theme'] : [],
	);
	$alt_format = array_map(
		function ($a) {
			return $a->name;
		},
		get_field('content')['format'] ? get_field('content')['format'] : [],
	);
	$theme = $alt_theme ? $alt_theme : $theme;
	$format = $alt_format ? $alt_format : $format;
	$title = get_field('content')['title'] ? get_field('content')['title'] : $title;
	$text = get_field('content')['text'] ? get_field('content')['text'] : $text;
	$image = get_field('content')['image'] ? get_field('content')['image'] : $image;
}

// Configure layout classes
$layout = get_field('style')['layout'];
$layout_classes = [];
if ($layout == 'v') {
	$layout_classes['container'] = 'flex-col';
	$layout_classes['image'] = '';
	$layout_classes['content'] = '';
} else {
	$layout_classes['container'] = 'flex-row';
	$layout_classes['image'] = 'basis-1/2';
	$layout_classes['content'] = 'basis-1/2 self-center';
	if ($layout == 'h2') {
		$layout_classes['image'] = 'basis-1/3';
		$layout_classes['content'] = 'basis-2/3';
	}
}
?>

<div id="<?= $block['id'] ?>" class="bb-card-block rounded-3xl mb-10" style="background-color: <?= get_field('style')['bg_color'] ?>;">
	<a href="<?= $link['url'] ?>" class="flex gap-6 <?= $layout_classes['container'] ?>">

  	<?php if ($post_type == 'projects'): ?>
			<div class="<?= $layout_classes['image'] ?>">
				<div class="_aspect-w-16 _aspect-h-9 flex w-full justify-center items-center">
					<?php echo wp_get_attachment_image($image, [400, 0], false, ['class' => 'object-contain rounded-xl p-5 w-full h-32 bg-gray-100']); ?>
				</div>
			</div>
		<?php else: ?>
			<div class="<?= $layout_classes['image'] ?>">
				<div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-2xl overflow-hidden">
					<?php echo wp_get_attachment_image($image, [400, 0], false, ['class' => 'object-cover w-full h-full']); ?>
				</div>

			</div>
		<?php endif; ?>

		<div class="<?= $layout_classes['content'] ?> space-y-2">

			<?php if ($theme || $format): ?>
				<div class="uppercase text-base text-primary font-bold text-sm font-alt">
					<?= join(', ', $theme) ?>
					<?= $theme && $format ? ' | ' : '' ?>
					<?= join(', ', $format) ?>
				</div>
			<?php endif; ?>

			<h2 class="text-2xl font-alt">
				<?= strip_tags($title) ?>
			</h2>

			<?php if ($layout != 'h2'): ?>
				<div class="text-xl font-alt font-normal text-inherit">
					<?= strip_tags($text) ?>
				</div>
			<?php endif; ?>

		</div>

	</a>
</div>
