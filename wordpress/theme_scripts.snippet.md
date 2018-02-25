# WORDPRESS THEME SCRIPTS


## ENQUEUE SCRIPT


### WP_ENQUEUE_SCRIPT() 

*Registers the script if $src provided (does NOT overwrite), and enqueues it*

```php
wp_enqueue_script(
    string $handle,
    string $src 			= '',
    array $deps 			= array(),
    string|bool|null $ver 	= false,
    bool $in_footer 		= false
)
```

__$handle__
- (string) (Required)
- Name of the script. Should be unique.

__$src (Optional)__
- (string) 
- Default value: ""
- Full URL of the script, or path of the script relative to the WordPress root directory.  

__$deps  (Optional)__
- (array)
- An array of registered script handles this script depends on.
- Default value: array()

__$ver (Optional)__
- (string|bool|null) 
- Default value: false
- String specifying version
- Added to the URL as a query string for cache busting purposes.
- If false, current WordPress version number is automatically added.
- If null, no version is added

__$in_footer (Optional)__
- (bool)  
- Default 'false'
- Enqueue script before `</body>` instead of `<head>`




__Proper way to enqueue scripts and styles__

```php
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
```




## Register Script Action

```php
function custom_scripts() {

	wp_register_script( 'SCRIPT1', 'http://SCRIPT1.com', array( 'SCRIPT0' ), '1', false );
	wp_enqueue_script( 'SCRIPT1' );

	wp_register_script( 'SCRIPT0', 'http://SCRIPT0.com', false, '2.0', false );

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );
```


## REFERENCES
- https://developer.wordpress.org/reference/functions/wp_deregister_script/
- https://developer.wordpress.org/reference/functions/wp_enqueue_script/
