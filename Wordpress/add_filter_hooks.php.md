# ADD FILTER

__add_filter()__

`add_filter( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )`

Hook a function or method to a specific filter action.

WordPress offers filter hooks to allow plugins to modify various types of internal data at runtime.

A plugin can modify data by binding a callback to a filter hook. When the filter is later applied,
each bound callback is run in order of priority, and given the opportunity to modify a value by returning a new value.

The following example shows how a callback function is bound to a filter hook.

Note that $input is passed to the callback, modified, then returned

```
function custom_filter_hook_function( $input, $output ) {
	return $input . $output
}
add_filter( 'custom_filter_hook', 'custom_filter_hook_function', 10, 2 );
```


__$tag__
- (string)
- (Required)
- The name of the filter to hook the $function_to_add callback to.

__$function_to_add__
- (callable)
- (Required)
- The callback to be run when the filter is applied.

__$priority__
- (int)
- (Optional)
- Default: 10
- Used to specify the order in which the functions associated with a particular action are executed.
- Lower numbers correspond with earlier execution
- Functions with the same priority are executed in the order in which they were added to the action.

__$accepted_args__
- (int)
- (Optional)
- Default: 1
- The number of arguments the function accepts


### More Information

Bound callbacks can accept from none to the total number of arguments passed as parameters
in the corresponding `apply_filters()` call.

In other words, if an `apply_filters()` call passes four total arguments,
callbacks bound to it can accept none (the same as 1) of the arguments or up to four.

The important part is that the `$accepted_args` value must
reflect the number of arguments the bound callback actually opted to accept.

If no arguments were accepted by the callback that is considered to be the
same as accepting 1 argument.

_Note:_ The function will return true whether or not the callback is valid for optimization purposes.


For example:

---

__Filter call__

```
$value = apply_filters( 'hook', $value, $arg2, $arg3 );
```

__Accepting zero/one arguments__
```
function example_callback() {
    ...
    return 'some value';
}
add_filter( 'hook', 'example_callback' ); // Where $priority is default 10, $accepted_args is default 1.
```

__Accepting two arguments (three possible)__
```

function example_callback( $value, $arg2 ) {
    ...
    return $maybe_modified_value;
}
add_filter( 'hook', 'example_callback', 10, 2 ); // Where $priority is 10, $accepted_args is 2.
```

## REFERENCES

- (Generatewp.com - Hooks Example)[https://generatewp.com/hooks/]
- (Wordpress Developer - Add Filter )[https://developer.wordpress.org/reference/functions/add_filter/]
