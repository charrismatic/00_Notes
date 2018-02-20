### ADD ACTION

__add_action()__ -  Hooks a function on to a specific action

`add_action( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )`

```php
function custom_action_hook_function( $target, $args ) {
	function custom_action_hook_function($target, $args) {
	    echo "custom_action_hook_function ";
	    echo $target;
	}
}
add_action( 'init', 'custom_action_hook_function', 1, 2 );
```

---

### ADD FILTER

__add_filter()__ - Hook a function or method to a specific filter action

`add_filter( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )`

```php
function custom_filter_hook_function( $input, $output ) {
	return $input . $output
}
add_filter( 'custom_filter_hook', 'custom_filter_hook_function', 10, 2 );
```

---

## EXAMPLE SNIPPETS


### Document <title> separator

```php
function custom_document_title_separator( $sep ) {

	// Change separator for singular blog post
	if( is_singular( 'post' ) ) {
		$sep = '|';
	}

	return $sep;

}
add_filter( 'document_title_separator', 'custom_document_title_separator', 10, 1 );
```

_https://generatewp.com/hooks/?clone=1wyw45e_



### Conditional login redirect

```php
function conditional_login_redirect( $redirect_to, $requested_redirect_to, $user ) {

	if ( isset( $user->roles ) && is_array( $user->roles ) ) {

		if ( in_array( 'subscriber', $user->roles ) ) {

			// subscriber role redirected to homepage
			return home_url();

		} else {

			// other roles redirected to the original destination URL
			return $redirect_to;

		}

	}

	return $redirect_to;

}
add_filter( 'login_redirect', 'conditional_login_redirect', 10, 3 );
```

_https://generatewp.com/hooks/?clone=2vyge2o_


### Remove admin menus

```php
function hide_admin_menus( $context ) {

	// Hide from users with low privilege
	if ( ! current_user_can( 'manage_options' ) ) {

		// Core Menus
		remove_menu_page( 'index.php' );               //Dashboard
		remove_menu_page( 'edit.php' );                //Posts
		remove_menu_page( 'upload.php' );              //Media
		remove_menu_page( 'edit.php?post_type=page' ); //Pages
		remove_menu_page( 'edit-comments.php' );       //Comments
		remove_menu_page( 'themes.php' );              //Appearance
		remove_menu_page( 'plugins.php' );             //Plugins
		remove_menu_page( 'users.php' );               //Users
		remove_menu_page( 'tools.php' );               //Tools
		remove_menu_page( 'options-general.php' );     //Settings

		// Plugins
		remove_menu_page( 'jetpack' );                 //Jetpack

	}

}
add_action( 'admin_menu', 'hide_admin_menus', 10, 1 );
```

_https://generatewp.com/hooks/?clone=wnd6xyb_



### Set custom excerpt length
```php
function custom_excerpt_length( $number ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );
```

_https://generatewp.com/hooks/?clone=68ynv2a_


---

## References:

- (Generatewp.com - Hooks Example)[https://generatewp.com/hooks/]
- (Wordpress Developer - Add Filter)[https://developer.wordpress.org/reference/functions/add_filter/]
- (Wordpress Developer - Add Action )[https://developer.wordpress.org/reference/functions/add_action/]
