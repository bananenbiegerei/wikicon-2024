<?php
$theme = get_field('theme');
$color = get_field('color_for_theme', $theme->ID);
$related = get_field('related');
$thumbnail_url = get_the_post_thumbnail_url($theme, 'medium');
$theme_url = get_the_permalink($theme);
?>

<div class="bb-theme-block mb-20">
	<div class="rounded-3xl p-10 grid grid-cols-12 " style="background-color: <?= $color ?>;">
		<!-- Image -->
			<div class="col-span-4">
				<div class="aspect-w-4 aspect-h-3 relative -translate-x-10 -translate-y-10 rounded-tl-3xl rounded-br-3xl overflow-hidden">
					<?php
					  echo '<img class="w-full h-full object-cover" src="' . $thumbnail_url . '" />';
					?>
				</div>
			</div>
			<div class="col-span-8 flex flex-col">
				<div>
					<!-- Theme or format -->
					<div class="uppercase text-primary font-bold text-base font-alt">
						<?= __('Theme', BB_TEXT_DOMAIN) ?>
					</div>
					<!-- Title -->
					<h2 class="text-2xl lg:text-3xl"><?= esc_html($theme->post_title) ?></h2>
				</div>

				<!-- Text -->
				<div class="text-xl font-normal flex-grow pr-5 pb-5 text-3xl text-inherit">
					<p><?= $theme->post_excerpt ?></p>
				</div>

				<!-- Button and extra info -->
				<div class="flex-1 flex items-end pb-10">
					<a href="<?php echo $theme_url; ?>" class="btn btn-hollow">
						<?= bb_icon('arrow-right',''); ?>
						<?= __('Zum Thema', BB_TEXT_DOMAIN) ?>						
					</a>
				</div>

			</div>
			<div class="col-span-12">
				<!-- Related -->
				<?php if ($related): ?>
					<div class="lg:grid lg:grid-cols-3">
					<?php foreach ($related as $related): ?>
						<?php setup_postdata($related); ?>
						<div class="pr-10">
							<?php if ($terms = get_the_terms($related->ID, 'theme')): ?>
						  	<?php $term_names = []; ?>
						  	<?php /* prettier-ignore */ foreach ($terms as $term) { $term_names[] = $term->name; } ?>
						  	<div class="uppercase text-primary font-bold text-base font-alt"><?php echo implode(', ', $term_names); ?></div>
				 			<?php endif; ?>
							<a href="<?php the_permalink(); ?>">
								<h3 class="text-base lg:text-xl"><?php echo get_the_title($related->ID); ?></h3>
							</a>
						</div>
					<?php endforeach; ?>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
	</div>
</div>
