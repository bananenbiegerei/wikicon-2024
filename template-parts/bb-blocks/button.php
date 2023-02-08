<?php
/**
 * Block template file: /www/htdocs/w01caf8f/wmde.agnostic.agency/wp-content/themes/wmde/template-parts/bb-blocks/button.php
 *
 * Button Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'button-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-button';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php if ( have_rows( 'display' ) ) : ?>
    <?php while ( have_rows( 'display' ) ) : the_row(); ?>
        <?php $style = get_sub_field( 'style' ); ?>
        <?php $size = get_sub_field( 'size' ); ?>
        <?php $position = get_sub_field( 'position' ); ?>
    <?php endwhile; ?>
<?php endif; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> flex <?php echo $position; ?>">
    <?php $link = get_field( 'link' ); ?>
    <?php if ( $link ) : ?>
        <a class="btn <?php echo $size; ?> <?php echo $style; ?>" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
    <?php endif; ?>
</div>