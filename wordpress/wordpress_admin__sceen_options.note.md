https://developer.wordpress.org/reference/classes/wp_screen/

Core class used to implement an admin screen API.

Methods #Methods



    \__construct — Constructor
    add_help_tab — Add a help tab to the contextual help for the screen.
    add_old_compat_help — Sets the old string-based contextual help for the screen for backward compatibility.
    add_option — Adds an option for the screen.
    get — Fetches a screen object.
    get_columns — Gets the number of layout columns the user has selected.
    get_help_sidebar — Gets the content from a contextual help sidebar.
    get_help_tab — Gets the arguments for a help tab.
    get_help_tabs — Gets the help tabs registered for the screen.
    get_option — Gets the arguments for an option for the screen.
    get_options — Get the options registered for the screen.
    get_screen_reader_content — Get the accessible hidden headings and text used in the screen.
    get_screen_reader_text — Get a screen reader text string.
    in_admin — Indicates whether the screen is in a particular admin
    remove_help_tab — Removes a help tab from the contextual help for the screen.
    remove_help_tabs — Removes all help tabs from the contextual help for the screen.
    remove_option — Remove an option from the screen.
    remove_options — Remove all options from the screen.
    remove_screen_reader_content — Remove all the accessible hidden headings and text for the screen.
    render_list_table_columns_preferences — Render the list table columns preferences.
    render_meta_boxes_preferences — Render the meta boxes preferences.
    render_per_page_options — Render the items per page option
    render_screen_layout — Render the option for number of columns on the page
    render_screen_meta — Render the screen's help section.
    render_screen_options — Render the screen options tab.
    render_screen_reader_content — Render screen reader text.
    render_view_mode — Render the list table view mode preferences.
    set_current_screen — Makes the screen object the current screen.
    set_help_sidebar — Add a sidebar to the contextual help for the screen.
    set_parentage — Set the parent information for the screen.
    set_screen_reader_content — Add accessible hidden headings and text for the screen.
    show_screen_options



---


WP_Screen::show_screen_options()



apply_filters( 'screen_settings', string $screen_settings, WP_Screen $this )

Filters the screen settings text displayed in the Screen Options tab.



WP_Screen::get_options()

Get the options registered for the screen.




WP_Screen::get_help_sidebar()

Gets the content from a contextual help sidebar.




WP_Screen::add_option( string $option, mixed $args = array() )

Adds an option for the screen.

Call this in template files after admin.php is loaded and before admin-header.php is loaded to add screen options.


$option

    (string) (Required) Option ID
$args

    (mixed) (Optional) Option-dependent arguments.

    Default value: array()





apply_filters( "current_theme_supports-{$feature}", bool , array $args, string $feature )

Filters whether the current theme supports a specific feature.

The dynamic portion of the hook name, $feature, refers to the specific theme feature. Possible values include ‘post-formats’, ‘post-thumbnails’, ‘custom-background’, ‘custom-header’, ‘menus’, ‘automatic-feed-links’, ‘html5’, ‘starter-content’, and ‘customize-selective-refresh-widgets’.
Parameters #Parameters

    (bool) true Whether the current theme supports the given feature. Default true.
$args

    (array) Array of arguments for the feature.
$feature

    (string) The theme feature.
