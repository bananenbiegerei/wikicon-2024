<div class="bb-image-block aspect-w-16 aspect-h-9 bg-gray-200 rounded-3xl">
	<figure class="w-full w-full">
		<?php the_post_thumbnail('large', ['class' => 'rounded-3xl object-cover w-full h-full']); ?>
		<?php if (bbWikimediaCommonsMedia::has_post_thumbnail_caption()): ?>
			<figcaption class="invisible flex absolute left-0 bottom-0 right-0 text-white bg-black w-auto h-auto z-20 p-2 text-sm flex items-start gap-4 break-all rounded-b-2xl">
				<?= bb_icon('info', 'flex-shrink-0') ?> <div class="self-center"><?php the_post_thumbnail_caption(); ?></div>
			</figcaption>
		<?php endif; ?>
	</figure>
</div>
