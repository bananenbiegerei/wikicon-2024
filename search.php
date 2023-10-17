<?php

// Limit the amount of blog posts in results
// Pagination from multiple sources is hard. Let's avoid it.
$max_blog_posts = 100;

// Redirect to main site search page if needed
if (is_multisite() && get_current_blog_id() !== 1) {
  wp_redirect(bb_search_url(). '?s=' . get_search_query());
}

// Post types for which the date will be shown
$show_date_for = ['post', 'press-releases'];

// Add search results to a big array
function get_search_result_array()
{
  global $show_date_for, $post_types, $count;
  $post_type = get_post_type();
  $post_type_label = get_post_type_object($post_type)->label;
  $post_types[$post_type] = $post_type_label;
  $count[$post_type] = ($count[$post_type] ?? 0) + 1;
  return [
  'blog_id' => get_current_blog_id(),
  'post_id' => get_the_ID(),
  'title' => get_the_title(),
  'post_type' => $post_type,
  'post_type_label' => get_post_type_object($post_type)->labels->singular_name,
  'excerpt' => wp_trim_words(get_the_excerpt(), 99, '...'),
  'permalink' => get_permalink(),
  'date' => in_array(get_post_type(), $show_date_for) ? get_the_date() : null,
  'timestamp' => get_post_timestamp(),
  'has_thumbnail' => has_post_thumbnail(),
  'thumbnail' => wp_get_attachment_image(get_post_thumbnail_id(), [400, 0], false, ['class' => 'h-full w-full object-cover'])
  ];
}

// Search results data
$post_types = [];
$count = [];
$results = [];

// Search current site
while ($wp_query->have_posts()) {
  $wp_query->the_post();
  $results[] = get_search_result_array();
}

// Search in other site
if (is_multisite()) {
  switch_to_blog(bb_get_id_of_blog());
  $blog_search = new WP_Query([ 's' => get_query_var('s'), 'posts_per_page' => $max_blog_posts]);
  while ($blog_search->have_posts()) {
    $blog_search->the_post();
    $results[] = get_search_result_array();
  }
  restore_current_blog();
}

// Sort results by timestamp desc.
usort($results, function ($a, $b) {
  return $b['timestamp'] <=> $a['timestamp'];
});

// Sort post types
asort($post_types);
?>
<?php get_header(); ?>
<div class="grid grid-cols-12 container">
  <div class="col-span-12 mb-10 lg:mb-20">

  <?php if (have_posts()) : ?>
  <h1 class="mt-6 mb-10"><?php printf(__('Suchergebnisse für: %s', BB_TEXT_DOMAIN), get_search_query()); ?></h1>

  <div x-data="{selectedFilter: ''}">

    <div class="btn-group container mb-5 lg:mb-10">
    <button x-on:click="selectedFilter=''" class="btn btn-sm" :class="{'!bg-gray-200': selectedFilter}" type="button"> Alle (<?= count($results)?>) </button>
    <?php foreach ($post_types as $term => $label): ?>
    <button x-on:click="selectedFilter='<?= $term ?>'" class="btn btn-sm" :class="{'!bg-gray-200': selectedFilter != '<?= $term ?>'}" type="button">
      <?= $label ?> (<?= $count[$term]?>)
    </button>
    <?php endforeach; ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 container">

    <?php foreach($results as $result): ?>
    <div class="bb-card-block text-hover-effect image-hover-effect bg-gray rounded-xl overflow-hidden mb-10 lg:mb-5 z-10 hover:z-20 relative" x-show="!selectedFilter || '<?= $result['post_type'] ?>' == selectedFilter">

      <div class="px-2 rounded-full bg-white text-xs border border-gray-400 absolute top-4 right-4 z-10" x-show="!selectedFilter">
      <?= $result['post_type_label'] ?>
      </div>

      <a href="<?= $result['permalink'] ?>" class="flex gap-5 flex-col">
      <?php if ($result['has_thumbnail']): ?>
      <div class="">
        <div class="aspect-w-16 aspect-h-9 bg-gray-100 overflow-hidden">
        <?= $result['thumbnail'] ?>
        </div>
      </div>
      <?php endif; ?>
      <div class=" space-y-2 px-10 py-10">
        <h2 class="text-2xl font-alt"><?= $result['title'] ?></h2>
        <?php if ($result['date']): ?>
        <div class="text-sm"><?= $result['date'] ?></div>
        <?php endif; ?>
        <div class="text-xl font-alt font-normal text-inherit"><?= $result['excerpt'] ?></div>
      </div>
      </a>
    </div>
    <?php endforeach; ?>

    </div>
  </div>
  <?php else : ?>
  <div class="container py-20 flex justify-center items-center">
    <div class="translate-y-5 max-w-4xl">
    <h1><?php _e('Nichts gefunden', BB_TEXT_DOMAIN); ?></h1>
    <p class="mb-5">
      <?php _e('Es tut uns leid, aber nichts passte zu Ihren Suchbegriffen. Bitte versuchen Sie es noch einmal mit anderen Suchbegriffen.', BB_TEXT_DOMAIN); ?></p>
    <div class="flex gap-5 items-center h-full">
      <form class="flex gap-5" action="<?= bb_search_url() ?>" method="get">
      <input class="!mb-0" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
      <input type="submit" alt="Search" value="Suchen" class="btn btn-sm" />
      </form>
    </div>
    </div>
  </div>
  <?php endif; ?>
  </div>


</div>

<?php get_footer(); ?>