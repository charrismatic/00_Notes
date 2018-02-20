# Register Navigation Menus

```php
function custom_navigation_menus() {

	$locations = array(
		'menu1_name' => __( 'menu1_description', 'text_domain' ),
		'menu2_name' => __( 'menu2_description', 'text_domain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );
```
