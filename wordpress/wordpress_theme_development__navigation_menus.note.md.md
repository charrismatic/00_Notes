-+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*

# REGISTER MENUS AND LOCATIONS
-+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*

https://developer.wordpress.org/reference/functions/wp_nav_menu/
https://generatewp.com/nav-menus/

```
$args = array (
 'menu'            =>  'nav_menu'       // Desired menu. Accepts a menu ID, slug, name, or object
 'menu_class'      =>  'nav_menu'       // CSS class to use for the ul element which forms the menu. Default 'menu'.
  menu_id          =>  'the_menu'       // The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented
 'container'       =>  'div'            // Whether to wrap the ul, and what to wrap it with. Default 'div',
 'container_class' =>  'menu_container' // Class that is applied to the container. Default 'menu-{menu slug}-container'
 'container_id'    =>  'container_id'   // The ID that is applied to the container
 'fallback_cb'     =>  'wp_page_menu'   // If menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback
 'before'          =>  'Menu'           // Text before the link markup
 'after'           =>  'Text'           // Text after the link markup
 'link_before'     =>  'index.html'     // Text before the link text
 'link_after'      =>  'index.html'     // Text after the link text
 'echo'            =>  true             // Whether to echo the menu or return it. Default true
 'depth'           =>  0                // How many levels of the hierarchy are to be included. 0 means all. Default 0
 'walker'          =>  array()          // Instance of a custom walker class
 'theme_location'  =>  'top'            // Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user
 'items_wrap'      =>  '<ul>'           // How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders
 'item_spacing'    =>   'preserve'      // Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'
)
wp_nav_menu( array $args = array() );

```

function register_theme_navigation_menus () {
  // Set up nav menus for each of the two areas registered in the theme.
  $starter_nav_menus = array (
    'nav_menus' => array(
      // Assign a menu to the "top" location.
      'top' => array(
        'name' => __( 'Top Menu', 'charristmatic' ),
        'items' => array(
          'link_home',
          'page_about',
          'page_blog',
          'page_contact',
        ),
      ),
      // Assign a menu to the "social" location.
      'social' => array(
        'name' => __( 'Social Links Menu', 'charristmatic' ),
        'items' => array(
          'link_yelp',
          'link_facebook',
          'link_twitter',
          'link_instagram',
        ),
      ),
    )
  );

  $locations = array(
    'top'    => __( 'Top Menu', 'twentyseventeen' ),
    'social' => __( 'Social Links Menu', 'twentyseventeen' ),
    'charrismatic_sidebar_menu' => __( 'Sidebar Menu', 'text_domain' ),
    'charrismatic_footer_menu' => __( 'Footer Menu', 'text_domain' ),
  );
  register_nav_menus( $locations );

}
add_action( 'init', 'register_theme_navigation_menus' );
// add_action( 'after_setup_theme', 'theme_navigation_menus' );
```