# ADMIN FILTERS, HOOKS, AND ACTIONS


apply_filters( 'admin_body_class', string $classes )

Filters the CSS classes for the body tag in the admin.


This filter differs from the ‘post_class’ and ‘body_class’ filters in two important ways:

    $classes is a space-separated string of class names instead of an array.
    Not all core admin classes are filterable, notably: wp-admin, wp-core-ui, and no-js cannot be removed.


    $classes

        (string) Space-separated list of CSS classes.




## ADMIN HOOKS

```
`admin_enqueue_scripts`                       - Enqueue scripts for all admin pages.
                                              - $hook_suffix
`admin_head`                                  - Fires in head section for all admin pages.
`admin_head                                   - Fires in head section for a specific admin page.
                                              - -`{$hook_suffix}"-
`admin_print_styles`-                        
`admin_print_scripts`-                       
`admin_print_scripts`{$hook_suffix}"-        
`admin_print_styles`{$hook_suffix}"-          - Fires when styles are printed for a specific admin page based on $hook_suffix.
`admin_print_footer_scripts`-                 - Prints any scripts and data queued for the footer.
`admin_print_footer_scripts`{$hook_suffix}"-  - Prints scripts and data queued for the footer.
`admin_footer`                                - Print scripts or data after the default footer scripts.
                                              - {$GLOBALS[‘hook_suffix’]}
                                              - $hook_suffix string
                                              - $page_hook
                                            	- Used to call the registered callback for a plugin screen.
`in_admin_header`-                            - Fires at the beginning of the content section in an admin page.
`admin_init`-                                 - Fires as an admin screen or script is being initialized.
                                              - Note, this does not just run on user-facing admin screens. It runs on admin-ajax.php and admin-post.php as well.
                                              - This is roughly analogous to the more general ‘init’ hook, which fires earlier.
`admin_post`-                                 - Fires on an authenticated admin post request where no action was supplied.

```


The dynamic portion of the hook name, $GLOBALS['hook_suffix']

refers to the global hook suffix of the current page.

__$hook_suffix__  
- (string)
- The current admin page.


Fires when scripts are printed for a specific admin page based on $hook_suffix.

Use `admin_enqueue_scripts` for Admin pages

Use `login_enqueue_scripts` for the login page


## ADMIN ACTIONS


### _Action:_ after-{$taxonomy}-table

Fires after the taxonomy list table.

`do_action( "after-{$taxonomy}-table", string $taxonomy )`


### _Action:_ after_plugin_row

Fires after each row in the Plugins list table.

`do_action( 'after_plugin_row', string $plugin_file, array $plugin_data, string $status )`


__$plugin_file__
- (string)
- Path to the plugin file, relative to the plugins directory.

__$plugin_data__
- (array)
- An array of plugin data.

__$status__
- (string)
- Status of the plugin.
- Defaults are 'All', 'Active', 'Inactive', 'Recently Activated', 'Upgrade', 'Must-Use', 'Drop-ins', 'Search'.







## ADMIN FILTERS

### _Filter:_ admin_url

Filters the admin area URL

```
apply_filters( 'admin_url', string $url, string $path, int|null $blog_id );
```

__$url__
- (string)
- The complete admin area URL including scheme and path.

__$path__
- (string)
- Path relative to the admin area URL. Blank string if no path is specified.

__$blog_id__
- (int|null)
- Site ID, or null for the current site.
