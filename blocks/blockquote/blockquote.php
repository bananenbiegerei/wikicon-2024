<?php

$color = get_field('text_color_color_dark');
$color = $color == 'default' ? '' : $color;
if ($color) {
	$color = "text-{$color}";
}
?>
<div class="bb-blockquote-block relative flex gap-5">
  <div class="flex-none <?= $color ?>">
    <?= bb_icon('quote', 'icon-xxl') ?>
  </div>
  <div class="flex-1">
    <blockquote class="text-xl lg:text-3xl leading-tight font-normal mb-5  text-inherit <?= $color ?>">
      <?= get_field('text') ?>
    </blockquote>
    <?php if (get_field('source')): ?>
      <cite class="font-normal text-gray-400 block"><?= get_field('source') ?></cite>
    <?php endif; ?>
  </div>
</div>

