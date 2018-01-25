

// Enable shortcodes in text widgets
// ADD THIS IN FUNCTIONS.PHP OR IN PLUGIN
add_filter('widget_text','do_shortcode');



# ADD A MENU PAGE
https://developer.wordpress.org/reference/functions/add_menu_page/

add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )

function add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null ) {
    global $menu, $admin_page_hooks, $_registered_pages, $_parent_pages;
 
    $menu_slug = plugin_basename( $menu_slug );
 
    $admin_page_hooks[$menu_slug] = sanitize_title( $menu_title );
 
    $hookname = get_plugin_page_hookname( $menu_slug, '' );
 
    if ( !empty( $function ) && !empty( $hookname ) && current_user_can( $capability ) )
        add_action( $hookname, $function );
 
    if ( empty($icon_url) ) {
        $icon_url = 'dashicons-admin-generic';
        $icon_class = 'menu-icon-generic ';
    } else {
        $icon_url = set_url_scheme( $icon_url );
        $icon_class = '';
    }
 
    $new_menu = array( $menu_title, $capability, $menu_slug, $page_title, 'menu-top ' . $icon_class . $hookname, $hookname, $icon_url );
 
    if ( null === $position ) {
        $menu[] = $new_menu;
    } elseif ( isset( $menu[ "$position" ] ) ) {
        $position = $position + substr( base_convert( md5( $menu_slug . $menu_title ), 16, 10 ) , -5 ) * 0.00001;
        $menu[ "$position" ] = $new_menu;
    } else {
        $menu[ $position ] = $new_menu;
    }
 
    $_registered_pages[$hookname] = true;
 
    // No parent as top level
    $_parent_pages[$menu_slug] = false;
 
    return $hookname;
}



Example allowing an editor to save data:
// Register settings using the Settings API
function wpdocs_register_my_setting() {
    register_setting( 'my-options-group', 'my-option-name', 'intval' );
}
add_action( 'admin_init', 'wpdocs_register_my_setting' );
 
// Modify capability
function wpdocs_my_page_capability( $capability ) {
    return 'edit_others_posts';
}
add_filter( 'option_page_capability_my-options-group', 'wpdocs_my_page_capability' );
