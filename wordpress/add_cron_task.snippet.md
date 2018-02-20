WordPress Cron Jobs using wp_schedule_event() function


```php
// Custom Cron Recurrences
function custom_cron_job_recurrence( $schedules ) {
	$schedules['weekly'] = array(
		'display' => __( 'Once Weekly', 'textdomain' ),
		'interval' => 604800,
	);
	return $schedules;
}
add_filter( 'cron_schedules', 'custom_cron_job_recurrence' );

// Schedule Cron Job Event
function custom_cron_job() {
	if ( ! wp_next_scheduled( '' ) ) {
		wp_schedule_event( , 'weekly', '' );
	}
}
add_action( 'wp', 'custom_cron_job' );
```


## REFERENCES

- https://developer.wordpress.org/reference/functions/wp_cron/
- https://developer.wordpress.org/reference/functions/wp_get_schedules/

