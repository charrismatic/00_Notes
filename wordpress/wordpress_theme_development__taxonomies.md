# Taxonomy

### get_taxonomies

*Retrieves a list of registered taxonomy names or objects.*

`get_taxonomies( array $args = array(), string $output = 'names',string $operator = 'and' )`

$args

(array) (Optional) 

***$output***

(string) (Optional) 

The type of output to return in the array. Accepts either taxonomy 'names' or 'objects'.

Default value: 'names'

***$operator***

(string) (Optional) 

The logical operation to perform. Accepts 'and' or 'or'. 'or' means only one element from the array needs to match; 'and' means all elements must match.

Default value: 'and'



EXAMPLES: 

__Display a list all registered taxonomies__

```php
$taxonomies = get_taxonomies();
if ( ! empty( $taxonomies ) ) : 
    echo '<ul>';
        foreach ( $taxonomies as $taxonomy ) {
            echo '<li>' . $taxonomy . '</li>';
        }
	echo '</ul>';
endif;
```



**List only public and custom taxonomies **

*will not list include WordPress built-in taxonomies (e.g., categories and tags):*

```php
$args = array(
  'public'   => true,
  '_builtin' => false 
); 
$output = 'names';  // or objects
$operator = 'and';  // 'and' or 'or'
$taxonomies = get_taxonomies( $args, $output, $operator ); 
if ( $taxonomies ) {
    echo '<ul>';
    foreach ( $taxonomies  as $taxonomy ) {
        echo '<li>' . $taxonomy . '</li>';
    }
    echo '</ul>'; 
}
```

