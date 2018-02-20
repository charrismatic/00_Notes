
### SECURITY FUNCTIONS

### _Filter:_ allow_password_reset

Filter whether to allow a password to be reset.

`apply_filters( 'allow_password_reset', bool , int $user_data->ID )`

__arg1__
- (bool)
- Default true
- Whether to allow the password to be reset.

__$user_data->ID__
- (int)
- The ID of the user attempting to reset a password.


### _Filter:_ allowed_http_origin

Change the allowed HTTP origin result

`apply_filters( 'allowed_http_origin', string $origin, string $origin_arg )`


__$origin__
- (string)
- Origin URL if allowed, empty string if not.

__$origin_arg__
- (string)
- Original origin string passed into is_allowed_http_origin function.



### _Function_ is_allowed_http_origin()

Determines if the HTTP origin is an authorized one

`is_allowed_http_origin( null|string $origin = null )`

__$origin__
- (null|string)
- (Optional)
- Default value: null
- Origin URL. If not provided, the value of get_http_origin() is used.



### _Filter_ allowed_themes

Filters the array of themes allowed on the network.

`apply_filters( 'allowed_themes', array $allowed_themes )`

__$allowed_themes__
- (array)
- An array of theme stylesheet names.
