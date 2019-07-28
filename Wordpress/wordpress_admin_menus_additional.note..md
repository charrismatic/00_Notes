/**

 *  Custom option and settings_errors
    *
 *  Reference: https://developer.wordpress.org/plugins/settings/custom-settings-page/
    *
 *  NOTE: Never define functions inside callbacks.
 *  These functions could be run multiple times; this would result in a fatal error.
 *  NOTE: You MUST register any options used by this function with register_setting()
 *  or they won't be saved and updated automatically.
 *  NOTE: The callback function needs to output the appropriate html input and
 *  fill it with the old value, the saving will be done behind the scenes.
 *  NOTE:
 *  If see “You do not have sufficient permissions to access this page.”
 *  then you’ve hooked too early.
 *  you should admin_menu
 *  For $menu_slug do no use __FILE__ it makes an ugly URL, and is a minor security nuisance
    *
     *
 *  NOTE: If you only want to move existing admin menu items to different positions,
 *  you can use the admin_menu hook to unset menu items from their current positions in the
 *  global $menu and $submenu variables (which are arrays), and reset them elsewhere in the array.
    *
 *  // Menu Structure
 *  2  -  Dashboard
 *  4  -  Separator
 *  5  -  Posts
 *  10 -  Media
 *  15 -  Links
 *  20 -  Pages
 *  25 -  Comments
 *  59 -  Separator
 *  60 -  Appearance
 *  65 -  Plugins
 *  70 -  Users
 *  75 -  Tools
 *  80 -  Settings
 *  99 -  Separator
    *
 *  // Slugs for $parent_slug (first parameter)
 *  Dashboard: ‘index.php’
 *  Posts: ‘edit.php’
 *  Media: ‘upload.php’
 *  Pages: ‘edit.php?post_type=page’
 *  Comments: ‘edit-comments.php’
 *  Custom Post Types: ‘edit.php?post_type=your_post_type’
 *  Appearance: ‘themes.php’
 *  Plugins: ‘plugins.php’
 *  Users: ‘users.php’
 *  Tools: ‘tools.php’
 *  Settings: ‘options-general.php’
 *  Network Settings: ‘settings.php’
    *
 *  // Add top level menu page
 *  function theme_settings_menu_setup() {
 *  $page_title = 'Theme Settings Top';
 *  $menu_title = 'Theme Settings';
 *  $capability = 'manage_options';
 *  $menu_slug  = 'theme_settings';
 *  $callback   = 'render_theme_settings_page';
 *  $icon       = 'dashicons-forms';
 *  $position   = 30;
    *
 *  add_menu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $icon, $position);
 *  }
 *  add_action('admin_menu', 'theme_settings_menu_setup');
    *
 *  // Add submenu page to the Settings main menu.
 *  add_options_page (
 *  string $page_title,
 *  string $menu_title,
 *  string $capability,
 *  string $menu_slug,
 *  callable $function = ''
 *  )
    *
 *  add_submenu_page (
 *  string $parent_slug,
 *  string $page_title,
 *  string $menu_title,
 *  string $capability,
 *  string $menu_slug,
 *  callable $function = ''
 *  )
    *
     *
 *  add_settings_field ( $id, $title, $callback, $page, $section, $args )
 *  add_settings_field (
 *  $id,         String for use in the 'id' attribute of tags.
 *  $title,      Title of the field.
 *  $callback,   Function that fills the field with the desired inputs as part of the larger form.
 *  Passed a single argument, the $args array.
 *  Name and id of the input should match the $id given to this function.
 *  $page,       The menu page on which to display this field.
 *  Should match $menu_slug from add_theme_page()
 *  or from do_settings_sections()
 *  $section,    (optional) The section of the settings page in which to show the box
 *  (default or a section you added with add_settings_section()
 *  look at the page in the source to see what the existing ones are.)
 *  $args,       (optional) Additional arguments that are passed to the $callback function
 *  );
    *
     *
 *  register_setting(
 *  $option_group,
 *  $option_name,
 *  $args = array (
 *  'type'               Data Type associated with setting, accepts [ 'string', 'boolean', 'integer', 'number']
 *  'description'        A description of the data attached to this setting
 *  'sanitize_callback' (callable) A callback function that sanitizes the option's value
 *  'show_in_rest'      (bool) Associated data should be included in REST API
 *  'default'           (mixed) Default value when calling get_option()
 *  ),
 *  )
    */

// function theme_settings_menu_setup() {

// call register settings function
// add_action( 'admin_init', 'register_my_cool_plugin_settings' );
// add_action( 'admin_menu', 'register_my_cool_plugin_settings' );
// }

// add_action('admin_menu', 'theme_settings_menu_setup');
// call register settings function
// add_action('admin_menu', 'theme_settings_menu_setup');




// REGISTER SETTING
// ---
// register_setting( $option_group, $option_name, $sanitize_callback );
// ---
// $option_group (string) (Required) A settings group name. Should correspond to a whitelisted option key name. Default whitelisted option key names include "general," "discussion," and "reading," among others.
// $option_name (string) (Required) The name of an option to sanitize and save.
// $args (array) (Optional) Data used to describe the setting when registered.
//---
// 'type' (string) The type of data associated with this setting. Valid values are 'string', 'boolean', 'integer', and 'number'.
// 'description' (string) A description of the data attached to this setting.
// 'sanitize_callback' (callable) A callback function that sanitizes the options value.
// 'show_in_rest' (bool) Whether data associated with this setting should be included in the REST API.
// 'default' (mixed) Default value when calling get_option().


// ADD SETTINGS SECTION
// ---
// add_settings_section( $id, $title, $callback, $page );
// ---
// add_settings_section( $id, $title, $callback, $page );
// $id (string) (required) String for use in the 'id' attribute of tags. Default: None
// $title (string) (required) Title of the section. Default: None
// $callback (string) (required) Function that fills the section with the desired content. The function should echo its output. Default: None
// $page (string) (required) The menu page on which to display this section. Should match $menu_slug from Function Reference/add theme page if you are adding a section to an 'Appearance' page, or Function Reference/add options page if you are adding a section to a 'Settings' page.
// ---
//
// ADD SETTINGS FIELD
// ---
// add_settings_field( $id, $title, $callback, $page, $section, $args );
// ---
// This function assumes you already know the settings $page and the page $section that the field should be shown on.
// You MUST register any options used by this function with register_setting() or they won't be saved and updated automatically.
// The callback function needs to output the appropriate html input and fill it with the old value, the saving will be done behind the scenes.
// The html input field's name attribute must match $option_name in register_setting(), and value can be filled using get_option().
// ---
// ---
// ID        - ID of the field
// Title     - Title of the field.
// Callback  - Function used to display the setting. This is very important as it is used to display the input field you want.
// Page      - Page which is going to display the field should be the same as the menu slug on the section.
// Section   - Section Id which the field will be added to.
// $args     - Additional arguments which are passed to the callback function
//
//
//
// settings_fields( $option_group )
// Output nonce, action, and option_page fields for a settings page.
//
// do_settings_sections ( $page )
//
// $page slug name of the page whose settings sections you want to output//
// Prints out all settings sections added to a particular settings page
// Part of the Settings API. Use this in a settings page callback function to output all the sections and fields
// that were added to that $page with add_settings_section() and add_settings_field()

// settings_fields( $option_group )
// Output nonce, action, and option_page fields for a settings page.

// do_settings_fields ( $page, $section )
// ---
//    (string) $page Slug title of the admin page who's settings fields you want to show.
//    (string) $section Slug title of the settings section who's fields you want to show.
// Print out the settings fields for a particular settings section
// Part of the Settings API. Use this in a settings page to output a specific section.
// Should normally be called by do_settings_sections() rather than directly.

// register_setting( $option_group, $option_name, $sanitize_callback );
// add_settings_section( $id, $title, $callback, $page );
// do_settings_sections ( $page )
// add_settings_field( $id, $title, $callback, $page, $section, $args );
// settings_fields( $option_group )
// do_settings_fields ( $page, $section )