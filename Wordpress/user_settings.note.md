
### get_user_setting()

`get_user_setting( string $name, string $default = false )`

Retrieve user interface setting value based on setting name.

**$name**

    (string) (Required) 
    The name of the setting.
__$default *(Optional)*__

    (string) 
    default value to return when $name is not set.


````php
function get_user_setting( $name, $default = false ) {
	$all_user_settings = get_all_user_settings();
	return isset( $all_user_settings[$name] ) ? $all_user_settings[$name] : $default;
}
````



### set_user_setting()

`set_user_setting( string $name, string $value )`

Add or update user interface setting.

Both `$name` and `$value` can contain only ASCII letters, numbers and underscores.

This function has to be used before any output has started as it calls `setcookie()`


**$name**

    (string) (Required) The name of the setting.
**$value**

    (string) (Required) The value for the setting.


```php
function set_user_setting( name, value ) {
  if ( headers_sent() ) {
      return false;
  }

  $all_user_settings = get_all_user_settings();
  $all_user_settings[$name] = $value;

  return wp_set_all_user_settings( $all_user_settings );
}
```




## get_all_user_settings()

Retrieve all user interface settings.


```php  
function get_all_user_settings() {
    global $_updated_user_settings;

    if ( ! $user_id = get_current_user_id() ) {
        return array();
    }

    if ( isset( $_updated_user_settings ) && is_array( $_updated_user_settings ) ) {
        return $_updated_user_settings;
    }

    $user_settings = array();

    if ( isset( $_COOKIE['wp-settings-' . $user_id] ) ) {
        $cookie = preg_replace( '/[^A-Za-z0-9=&_-]/', '', $_COOKIE['wp-settings-' . $user_id] );

        if ( strpos( $cookie, '=' ) ) { // '=' cannot be 1st char
            parse_str( $cookie, $user_settings );
        }
    } else {
        $option = get_user_option( 'user-settings', $user_id );

        if ( $option && is_string( $option ) ) {
            parse_str( $option, $user_settings );
        }
    }

    $_updated_user_settings = $user_settings;
    return $user_settings;
}
```



### wp_user_settings()

Saves and restores user interface settings stored in a cookie.

Checks if the current user-settings cookie is updated and stores it. When no cookie exists (different browser used), adds the last saved cookie restoring the settings.


### update_user_option()

Update user option with global blog capability.

update_user_option( int $user_id, string $option_name, mixed $newvalue, bool $global = false )


User options are just like user metadata except that they have support for global blog options. If the ‘global’ parameter is false, which it is by default it will prepend the WordPress table prefix to the option name.

Deletes the user option if $newvalue is empty.



$user_id

    (int) (Required) User ID.
$option_name

    (string) (Required) User option name.
$newvalue

    (mixed) (Required) User option value.
$global

    (bool) (Optional) Whether option name is global or blog specific. Default false (blog specific).

    Default value: false



function update_user_option( $user_id, $option_name, $newvalue, $global = false ) {
    global $wpdb;

    if ( !$global )
        $option_name = $wpdb->get_blog_prefix() . $option_name;
    
    return update_user_meta( $user_id, $option_name, $newvalue );
}
