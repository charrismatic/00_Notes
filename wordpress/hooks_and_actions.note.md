
## THEME HOOKS

do_action( 'wp_enqueue_scripts' )
do_action( 'login_enqueue_scripts' )


### after_setup_theme Hook

Fires after the theme is loaded.


`do_action( 'after_setup_theme' )`

This Hook is called when each page is loaded after theme is initialised. This is used for the basic theme setup, registration of the theme features and init hooks. The basic use of this hook can be seen on the default themes that comes with WordPress Installation.

https://developer.wordpress.org/reference/hooks/after_setup_theme/


```
```

__do_activate_header()__
`do_action( 'activate_wp_head' )` - Fires before the Site Activation page is loaded. Fires on the ‘wp_head’ action.
`do_action( 'activate_header' )` - Fires before the Site Activation page is loaded.
`do_action( 'wp_head' )` - Prints scripts or data in the head tag on the front end.


```
function do_activate_header() {
    /**
     * Fires before the Site Activation page is loaded.
     *
     * Fires on the {@see 'wp_head'} action.
     *
     * @since 3.0.0
     */
    do_action( 'activate_wp_head' );
}
```


__wpmu_activate_stylesheet()__

Loads styles specific to this page.

```
function wpmu_activate_stylesheet() {
    ?>
    <style type="text/css">
        form { margin-top: 2em; }
        #submit, #key { width: 90%; font-size: 24px; }
        #language { margin-top: .5em; }
        .error { background: #f66; }
        span.h3 { padding: 0 8px; font-size: 1.3em; font-weight: bold; }
    </style>
    <?php
}
```

https://developer.wordpress.org/reference/functions/wpmu_activate_stylesheet/






## REFERENCES
- https://developer.wordpress.org/reference/functions/wp_deregister_script/
- https://developer.wordpress.org/reference/functions/wp_enqueue_script/
