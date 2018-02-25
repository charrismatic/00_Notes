## get post types

Returns the [registered post types](https://codex.wordpress.org/Function_Reference/register_post_type) as found in *$wp_post_types*.



get_post_types( $args, $output, $operator ) 

`$args`

*array*

optional

```
Some of these include:

public - Boolean. If true, only public post types will be returned.
publicly_queryable - Boolean
exclude_from_search - Boolean
show_ui - Boolean
capability_type
hierarchical
menu_position
menu_icon
permalink_epmask
rewrite
query_var
_builtin - Boolean. If true, will return WordPress default post types. Use false to return only custom post types.
$output
(string) (optional) The type of output to return, either 'names' or 'objects'.
Default: 'names'
$operator
(string) (optional) Operator (and/or) to use with multiple $args.
Default: 'and'
Return Values
array 
A list of post names or objects.

```

