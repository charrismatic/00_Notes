## _Hook:_ self_admin_url

`apply_filters( 'self_admin_url', string $url, string $path, string $scheme )`

Filters the admin URL for the current site or network depending on context.

__$url__

    (string) The complete URL including scheme and path.

__$path__

    (string) Path relative to the URL. Blank string if no path is specified.

__$scheme__

    (string) The scheme to use.


---

## _Function:_ self_admin_url()

`self_admin_url( string $path = '', string $scheme = 'admin' )`

Retrieves the URL to the admin area for either the current site or the network depending on context.


Parameters

__$path__

    (string) (Optional) Path relative to the admin URL.

    Default value: ''

__$scheme__

    (string) (Optional) The scheme to use. Default is 'admin', which obeys force_ssl_admin() and is_ssl(). 'http' or 'https' can be passed to force those schemes.

    Default value: 'admin'

```
function self_admin_url( $path = '', $scheme = 'admin' ) {
    if ( is_network_admin() ) {
        $url = network_admin_url( $path, $scheme );
    } elseif ( is_user_admin() ) {
        $url = user_admin_url( $path, $scheme );
    } else {
        $url = admin_url( $path, $scheme );
    }

    /**
     * Filters the admin URL for the current site or network depending on context.
     *
     * @since 4.9.0
     *
     * @param string $url    The complete URL including scheme and path.
     * @param string $path   Path relative to the URL. Blank string if no path is specified.
     * @param string $scheme The scheme to use.
     */
    return apply_filters( 'self_admin_url', $url, $path, $scheme );
}
```

## _Function:_ get_theme_file_path()

`get_theme_file_path( string $file = '' )`

Retrieves the path of a file in the theme.


Searches in the stylesheet directory before the template directory so themes which inherit from a parent theme can just override one file.

__$file__

    (string) (Optional) File to search for in the stylesheet directory.

    Default value: ''


```
function get_theme_file_path( $file = '' ) {
    $file = ltrim( $file, '/' );

    if ( empty( $file ) ) {
        $path = get_stylesheet_directory();
    } elseif ( file_exists( get_stylesheet_directory() . '/' . $file ) ) {
        $path = get_stylesheet_directory() . '/' . $file;
    } else {
        $path = get_template_directory() . '/' . $file;
    }

    /**
     * Filters the path to a file in the theme.
     *
     * @since 4.7.0
     *
     * @param string $path The file path.
     * @param string $file The requested file to search for.
     */
    return apply_filters( 'theme_file_path', $path, $file );
}
```

apply_filters( 'theme_file_uri', string $url, string $file )

Filters the URL to a file in the theme.




get_theme_file_uri( string $file = '' )

Retrieves the URL of a file in the theme.

__$file__

    (string) (Optional) File to search for in the stylesheet directory.

    Default value: ''



wp_get_canonical_url( int|WP_Post $post = null )

Returns the canonical URL for a post.


__$post__

    (int|WP_Post) (Optional) Post ID or object. Default is global $post.

    Default value: null


apply_filters( 'get_canonical_url', string $canonical_url, WP_Post $post )

Filters the canonical URL for a post.

__$canonical_url__

    (string) The post's canonical URL.
__$post__

    (WP_Post) Post object.



apply_filters( 'content_url', string $url, string $path )

Filters the URL to the content directory.


$url

    (string) The complete URL to the content directory including scheme and path.
$path

    (string) Path relative to the URL to the content directory. Blank string if no path is specified.


https://developer.wordpress.org/reference/files/wp-includes/link-template.php/
https://developer.wordpress.org/reference/functions/self_admin_url/   
