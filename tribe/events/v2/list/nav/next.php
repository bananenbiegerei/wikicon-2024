<?php
/**
 * View: List View Nav Next Button
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/nav/next.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @var string $link The URL to the next page.
 *
 * @version 5.3.0
 *
 */

/* translators: %s: Event (plural or singular). */
$label = sprintf( __( 'Next %1$s', 'the-events-calendar' ), tribe_get_event_label_plural() );

/* translators: %s: Event (plural or singular). */
$events_mobile_friendly_label = sprintf( __( 'Next %1$s', 'the-events-calendar' ), '<span class="tribe-events-c-nav__next-label-plural tribe-common-a11y-visual-hide">' . tribe_get_event_label_plural() . '</span>' );
?>
<li>
	<a
		href="<?php echo esc_url( $link ); ?>"
		rel="next"
		class="flex"
		data-js="tribe-events-view-link"
		aria-label="<?php echo esc_attr( $label ); ?>"
		title="<?php echo esc_attr( $label ); ?>"
	>
		<span class="">
			<?php echo wp_kses( $events_mobile_friendly_label, [ 'span' => [ 'class' => [] ] ] ); ?>
		</span>
		<?php $this->template( 'components/icons/caret-right', [ 'classes' => [ 'tribe-events-c-nav__next-icon-svg' ] ] ); ?>
	</a>
</li>
