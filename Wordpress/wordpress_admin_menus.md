# ADMIN MENU AND SUBMENUS 

Custom option and settings_errors

Reference: https://developer.wordpress.org/plugins/settings/custom-settings-page

__NOTE:__ Never define functions inside callbacks  
These functions could be run multiple times; this would result in a fatal error  

__NOTE:__ You MUST register any options used by this function with `register_setting()`  
or they won't be saved and updated automatically.  

__NOTE:__ The callback function needs to output the appropriate html input  
and populated with current values,   
saving will be done behind the scenes  

__NOTE:__ If see “You do not have sufficient permissions to access this page.” 
Then youve hooked too early   
The correct hook is `admin_menu`  
For `$menu_slug` do not use `__FILE__` it creates an ugly URL,   
and is a minor security nuisance.  



### Add submenu page to the Settings main menu

```php
add_options_page( 
   string $page_title,
   string $menu_title,
   string $capability,
   string $menu_slug,
   callable $function = '' 
 );
```



## DEFAULT ADMIN ORDER 

2  -  Dashboard
4  -  Separator
5  -  Posts
10 -  Media
15 -  Links
20 -  Pages
25 -  Comments
59 -  Separator
60 -  Appearance
65 -  Plugins
70 -  Users
75 -  Tools
80 -  Settings
99 -  Separator

Within the rendering function `$callback`   

you may want to access parameters you used in `add_submenu_page()`,   
such as the `$page_title`  

Typically, these will work:
- `$parent_slug`: `get_admin_page_parent()`
- `$page_title`: `get_admin_page_title()`, or `global $title`
- `$menu_slug`: `global $plugin_page`


The function should normally be hooked in with one of the the admin_menu actions depending on the menu where the sub menu is to appear:

- `admin_menu` -    The normal, or site, administration menu
- `user_admin_menu`  -  The user administration menu
- `network_admin_menu`  -  The network administration menu


### ADD TOP LEVEL ADMIN MENU 


__$page_title__ (string) (Required) The text to be displayed in the title tags of the page when the menu is selected.
__$menu_title__ (string) (Required) The text to be used for the menu.
__$capability__ (string) (Required) The capability required for this menu to be displayed to the user.
__$menu_slug__ (string) (Required) The slug name to refer to this menu by. Should be unique for this menu page and only include lowercase alphanumeric, dashes, and underscores characters to be compatible with sanitize_key().
__$function__ (callable) (Optional) The function to be called to output the content for this page. Default value: ''
__$icon_url__ (string) (Optional) The URL to the icon to be used for this menu Accepts: 
  - base64-encoded SVG using a data URI, colored to match the color scheme. 'data:image/svg+xml;base64,'
  - name of a Dashicons helper class font icon
  - 'none' to leave div.wp-menu-image empty so an icon can be added via CSS
__$position__ (int) (Optional) The position in the menu order this one should appear. Default value: null




```php
function theme_settings_menu_setup() {
  $page_title = 'Theme Settings Top';
  $menu_title = 'Theme Settings';
  $capability = 'manage_options';
  $menu_slug  = 'theme_settings';
  $callback   = 'render_theme_settings_page';
  $icon       = 'dashicons-forms';
  $position   = 30;
  
  add_menu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $icon, $position);
}
add_action('admin_menu', 'theme_settings_menu_setup');
```

NOTE: If you only want to move existing admin menu items to different positions, you can use the admin_menu hook to unset menu items from their current positions in the global $menu and $submenu variables (which are arrays), and reset them elsewhere in the array.



### Slugs for $parent_slug (first parameter)

```
Dashboard          : index.php
Posts              : edit.php
Media              : upload.php
Pages              : edit.php?post_type=page
Comments           : edit-comments.php
Custom Post Types  : edit.php?post_type=your_post_type
Appearance         : themes.php
Plugins            : plugins.php
Users              : users.php
Tools              : tools.php
Settings           : options-general.php
Network Settings   : settings.php
```
### Add submenu page under a custom post type parent
```php
function books_register_ref_page() {
    add_submenu_page(
        'edit.php?post_type=book',
        __( 'Books Shortcode Reference', 'textdomain' ),
        __( 'Shortcode Reference', 'textdomain' ),
        'manage_options',
        'books-shortcode-ref',
        'books_ref_page_callback'
    );
}
```
### Display callback for the submenu page
```php
function books_ref_page_callback() {
    echo '<div class="wrap">';
    echo '<h1>'. _e( 'Books Shortcode Reference', 'textdomain' ) . '</h1>';
    echo '<p>' . _e( 'Helpful stuff here', 'textdomain' ) . '</p>';
    echo '</div>';
}
```


All settings pages have helper functions for `add_submenu_page()` 

Example: Tools Page

__add_management_page()__

- page_title - (string) Text displayed in title tags of page
- menu_title - (string) Menu title text
- capability - (string) Capability required access page (*User levels are deprecated, do not use)
- menu_slug  - (string) Menu Unique identifier Slug 
- callback   - (callback) (optional) function to render content 


```
$page_title = 'new_menu_page_title';
$menu_title = 'new_menu_title';
$capability = 'user_capability';
$menu_slug = 'new_menu_slug';   
$callback  = 'render_new_menu_page'; 

add_management_page ( $page_title, $menu_title, $capability, $menu_slug, $callback );
```







### APPEND SECTION TO EXISTING SETTINGS PAGE
__$id__        (string) (required) String for use in the 'id' attribute of tags
__$title__     (string) (required) Title of the section
__$callback__  (string) (required) Function that fills the section with the desired content
__$page__      (string) (required) Menu page to display section

Note: `$page` should match `$menu_slug` from Function Reference/add theme page   
if you are adding a section to an 'Appearance' page,  
or Function Reference/add options page if you are adding a section to a 'Settings' page  

```
function custom_settings_section() {
  add_settings_section(
    'eg_setting_section',
    'Example settings section in reading',
    'eg_setting_section_callback_function',
    'writing'
  );  
}
add_action( 'admin_init', 'custom_settings_section' );
```
```
function eg_setting_section_callback_function( $arg ) {
    // echo section intro text here
    echo '<p>id: ' . $arg['id'] . '</p>';             // id: eg_setting_section
    echo '<p>title: ' . $arg['title'] . '</p>';       // title: Example settings section in reading
    echo '<p>callback: ' . $arg['callback'] . '</p>'; // callback: eg_setting_section_callback_function
}
```