
 WP META
 Creates the wp_meta action hook, allowing functions to insert content to the sidebar.

 By default, wp meta() is called immediately after wp_loginout() by sidebar.php and the Meta widget,
 allowing functions to add new list items to the widget

 IMPORTANT:
 As the get_sidebar( $name );
 function has the do_action( 'get_sidebar', $name );
 on top before it loads the sidebar file, this hook should be used
 to load stuff before the sidebar and wp_meta();
 should be called at the end of the sidebar template to allow adding callbacks after the sidebar.
 Add a favourite link to the Meta widget:

```
function my_meta_link() {
  echo '<li><a href="http://www.example.com">My Favourite Link</a></li>';
}
add_action('wp_meta', 'my_meta_link');
```
