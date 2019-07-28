# ADD AN ACTION

https://developer.wordpress.org/reference/functions/add_action/

__add_action()__

Hooks a function on to a specific action.

`add_action( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )`


Actions are the hooks that the WordPress core launches at specific points during execution,
or when specific events occur.  Plugins can specify that one or more of its
PHP functions are executed at these points, using the Action API.


__$tag__
- (string)
- (Required)
- The name of the action to which the $function_to_add is hooked.

__$function_to_add__
- (callable)
- (Required)
- The name of the function you wish to be called.

__$priority__
- (int)
- (Optional)
- Default: 10
- Used to specify the order in which the functions associated with a particular action are executed.
- Lower numbers correspond with earlier execution,
- and functions with the same priority are executed in the order in which they were added to the action.

__$accepted_args__
- (int)
- (Optional)
- Default: 1
- The number of arguments the function accepts.


Example:

```php
function custom_action_hook_function( $target, $args ) {
	function custom_action_hook_function($target, $args) {
	    echo "custom_action_hook_function ";
	    echo $target;
	}
}
add_action( 'init', 'custom_action_hook_function', 1, 2 );
```


## REFERENCES

- (Generatewp.com - Hooks Example)[https://generatewp.com/hooks/]
- (Wordpress Developer - Add Action )[https://developer.wordpress.org/reference/functions/add_action/]
