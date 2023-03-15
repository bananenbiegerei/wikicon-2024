<?php get_header(); ?>
<?php while (have_posts()):
	the_post(); ?>
	<?php if ( has_post_thumbnail() ) : ?>
	  <div class="bg-gray">
		  <div class="container grid grid-cols-12 py-5">
			  <div class="col-span-12 lg:col-span-8 lg:col-start-3">
				  <?php get_template_part("template-parts/breadcrumb"); ?>
					<h1 class="text-base uppercase text-primary font-bold"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
					  <div class="font-alt text-2xl lg:text-3xl font-normal">
						<?php echo get_the_excerpt(); ?>
					  </div>
					<?php endif; ?>
			  </div>
		  </div>
	  </div>
	  <div class="relative">
		  <div class="absolute top-0 left-0 bg-gray rounded-b-3xl h-20 w-full">
			  
		  </div>
		  <div class="relative flex justify-center container grid grid-cols-12">
				<div class="col-span-12 lg:col-span-8 lg:col-start-3">
					<div class="aspect-w-16 aspect-h-9">
						<?php the_post_thumbnail('large', array('class' => 'rounded-3xl w-full h-full object-cover')); ?>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
	  <div class="bg-gray rounded-b-3xl pb-8">
		  <div class="container grid grid-cols-12">
			  <div class="col-span-12 lg:col-span-8 lg:col-start-3">
				  <?php get_template_part("template-parts/breadcrumb"); ?>
					<h1 class="text-5xl"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
					  <div class="font-alt text-xl font-normal">
						<?php echo get_the_excerpt(); ?>
					  </div>
					<?php endif; ?>
			  </div>
		  </div>
	  </div>
	<?php endif; ?>
	
	<div class="content pt-10">
		<?php the_content(); ?>
	</div>
<?php
endwhile; ?>
<?php get_footer(); ?>
