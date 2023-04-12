<?php

$bgcolor = get_field('style_bg_color_color_light');
$bgcolor = $bgcolor == 'default' ? '' : $bgcolor;
if ($bgcolor) {
	$bgcolor = "bg-{$bgcolor}";
}

$color = get_field('style_text_color_color_dark');
$color = $color == 'default' ? '' : $color;
if ($color) {
	$color = "text-{$color}";
}

$id = str_replace(' ', '_', esc_attr(get_field('anchor_title')));
?>


<div id="<?= $id ?>" data-anchor-title="<?= esc_attr(get_field('anchor_title')) ?>" class="bb-headline-block">
	<<?= get_field('level') ?> class="<?= get_field('style')['headline_size'] ?? '' ?> mb-2 <?= $color ?>">
		<span class="<?= $bgcolor ?>">
			<?= get_field('headline') ?>
		</span>
	</<?= get_field('level') ?>>
</div>
