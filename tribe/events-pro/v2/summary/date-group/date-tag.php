<?php
/**
 * View: Summary View - Single Event Date Tag
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/v2/summary/date-group/date-tag.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.7.0
 *
 * @var \Tribe\Utils\Date_I18n_Immutable $group_date   The date for the date group.
 * @var WP_Post                          $event        The event post object with properties added by the `tribe_get_event` function.
 * @var \DateTimeInterface               $request_date The request date object. This will be "today" if the user did not input any
 *                                                     date, or the user input date.
 * @var bool                             $is_past      Whether the current display mode is "past" or not.
 *
 * @see tribe_get_event() For the format of the event object.
 */

use Tribe__Date_Utils as Dates;

/*
 * If the request date is after the event start date, show the request date to avoid users from seeing dates "in the
 * past" in relation to the date they requested (or today's date).
 */
$display_date = empty( $is_past ) && ! empty( $request_date )
	? max( $group_date, $request_date )
	: $group_date;

$event_week_day  = $display_date->format_i18n( 'l' );
$event_day_num   = $display_date->format_i18n( 'd. F' );
$event_date_attr = $display_date->format( Dates::DBDATEFORMAT );
?>
<div class="!mb-2 text-xl">
	<time class="" datetime="<?php echo esc_attr( $event_date_attr ); ?>">
        <span class="">
                <?php echo esc_html( $event_week_day ); ?>
        </span>      
        <span class="">
            <?php echo esc_html( $event_day_num ); ?> 
        </span>
		
	</time>
</div>
