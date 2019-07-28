## SITE SETTINGS

HIDDEN OPTIONS PAGE :   `~/wp-admin/options.php`

### register_setting()

*Register a setting and its data.*

`register_setting( string $option_group, string $option_name, array $args = array() )`

**$option_group**

    (string) (Required) 
    A settings group name. Should correspond to a whitelisted option key name. 
    Default whitelisted option key names include "general," "discussion," and "reading," among others.
**$option_name**

    (string) (Required) The name of an option to sanitize and save.
**$args**

    (array) (Optional) Data used to describe the setting when registered.

    'type'               (string) The type of data associated with this setting. 
    				     Valid values are 'string', 'boolean', 'integer', and 'number'.
    'description'        (string) A description of the data attached to this setting.
    'sanitize_callback'  (callable) A callback function that sanitizes the option's value.
    'show_in_rest'       (bool) Whether data associated with this setting should 
    					     be included in the REST API.
    'default'            (mixed) Default value when calling get_option().
    
    Default value: array()




### unregister_setting()

Unregister a setting.

`unregister_setting( string $option_group, string $option_name, callable $deprecated = '' )`

$option_group

    (string) (Required) The settings group name used during registration.
$option_name

    (string) (Required) The name of the option to unregister.
$deprecated

    (callable) (Optional) Deprecated.

    Default value: ''




### get_registered_settings()

Retrieves an array of registered settings.

```php
function get_registered_settings() {
    global $wp_registered_settings;

    if ( ! is_array( $wp_registered_settings ) ) {
        return array();
    }

    return $wp_registered_settings;
}
```

used by:

  wp-includes/rest-api/endpoints/class-wp-rest-settings-controller.php:WP_REST_Settings_Controller::get_registered_options()
  wp-includes/option.php: filter_default_option()





### register_initial_settings()

Register default settings available in WordPress.

The settings registered here are primarily useful for the REST API, so this does not encompass all settings available in WordPress.




**update_site_option_{$option}**

`do_action( "update_site_option_{$option}", string $option, mixed $value, mixed $old_value, int $network_id )`

Fires after the value of a specific network option has been successfully updated.


$option

    (string) Name of the network option.
$value

    (mixed) Current value of the network option.
$old_value

    (mixed) Old value of the network option.
$network_id

    (int) ID of the network.



## SITE_OPTIONS


### get_site_option()

get_site_option( string $option, mixed $default = false, bool $deprecated = true )

Retrieve an option value for the current network based on name of option.


$option

    (string) (Required) Name of option to retrieve. Expected to not be SQL-escaped.
$default

    (mixed) (Optional) value to return if option doesn't exist.

    Default value: false
$deprecated

    (bool) (Optional) Whether to use cache. Multisite only. Always set to true.

    Default value: true

```
function get_site_option( $option, $default = false, $deprecated = true ) {
    return get_network_option( null, $option, $default );
}
```



### add_site_option()

Add a new option for the current network.


Existing options will not be updated. Note that prior to 3.3 this wasn’t the case.


add_site_option( string $option, mixed $value )


$option

    (string) (Required) Name of option to add. Expected to not be SQL-escaped.
$value

    (mixed) (Required) Option value, can be anything. Expected to not be SQL-escaped.

```
function add_site_option( $option, $value ) {
    return add_network_option( null, $option, $value );
}
```

### add_site_option

do_action( 'add_site_option', string $option, mixed $value, int $network_id )

Fires after a network option has been successfully added.



### update_site_option

do_action( 'update_site_option', string $option, mixed $value, mixed $old_value, int $network_id )

Fires after the value of a network option has been successfully updated.


$option

    (string) Name of the network option.
$value

    (mixed) Current value of the network option.
$old_value

    (mixed) Old value of the network option.
$network_id

    (int) ID of the network.


### pre_update_site_option_{$option}

`apply_filters( "pre_update_site_option_{$option}", mixed $value, mixed $old_value, string $option, int $network_id )`

Filters a specific network option before its value is updated.



### hook delete_site_option
`do_action( 'delete_site_option', string $option,  int $network_id )`

Fires after a network option has been deleted.

$option

    (string) Name of the network option.
$network_id

    (int) ID of the network.


### delete_site_option_{$option}

`do_action( "delete_site_option_{$option}", string $option, int $network_id )`

Fires after a specific network option has been deleted.


### pre_delete_site_option_{$option}

`do_action( "pre_delete_site_option_{$option}", string $option, int $network_id )`

Fires immediately before a specific network option is deleted.



### pre_site_option_{$option}


`apply_filters( "pre_site_option_{$option}", mixed $pre_option, string $option, int $network_id )`

Filters an existing network option before it is retrieved.

The dynamic portion of the hook name, $option, refers to the option name.

Passing a truthy value to the filter will effectively short-circuit retrieval, returning the passed value instead.


$pre_option

    (mixed) The default value to return if the option does not exist.
$option

    (string) Option name.
$network_id

    (int) ID of the network.


### hook add_option

`do_action( 'add_option', string $option, mixed $value )`

Fires before an option is added.


### wp_load_core_site_options()

wp_load_core_site_options( int $network_id = null )

Loads and caches certain often requested site options if is_multisite() and a persistent cache is not being used.



### wp_load_alloptions()

Loads and caches all autoloaded options, if available or all options.



### add_option()

*Add a new option.*

add_option( string $option, mixed $value = '', string $deprecated = '', string|bool $autoload = 'yes' )`


You do not need to serialize values. If the value needs to be serialized, then it will be serialized before it is inserted into the database. Remember, resources can not be serialized or added as an option.

You can create options without values and then update the values later. Existing options will not be updated and checks are performed to ensure that you aren’t adding a protected WordPress option. Care should be taken to not name options the same as the ones which are protected.


$option

    (string) (Required) Name of option to add. Expected to not be SQL-escaped.
$value

    (mixed) (Optional) Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.

    Default value: ''
$deprecated

    (string) (Optional) Description. Not used anymore.

    Default value: ''
$autoload

    (string|bool) (Optional) Whether to load the option when WordPress starts up. Default is enabled. Accepts 'no' to disable for legacy reasons.

    Default value: 'yes'


### update_option()

update_option( string $option, mixed $value, string|bool $autoload = null )



*Update* the value of an option that was already added*



### Hook option_{$option}

`apply_filters( "option_{$option}", mixed $value, string $option )`

Filters the value of an existing option.



### form_option()

`form_option( string $option )`

*Print option value after sanitizing for forms.*


__$option__
- (string)
- (Required)
- Option name.

```
function form_option( $option ) {
    echo esc_attr( get_option( $option ) );
}
```



**register_setting_args**

Filters the registration arguments when registering a setting.

`apply_filters( 'register_setting_args', array $args, array $defaults, string $option_group, string $option_name )`



**$args**
    (array) Array of setting registration arguments.

**$defaults**

    (array) Array of default arguments.
**$option_group**

    (string) Setting group.
**$option_name**

    (string) Setting name.



*Filters all options after retrieving them.*

`apply_filters( 'alloptions', array $alloptions )`


**$alloptions**

    (array) Array with all options.
