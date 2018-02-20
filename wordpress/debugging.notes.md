# HOW TO PRINT THE QUERY OF WP_QUERY THAT WAS JUST EXECUTED;

```
$recent_query->request;

$args = array(
    'post_type'      => 'page',
    'post__in'       => array(get_the_ID()),
    'posts_per_page' => -1,
);

$pageloop = new WP_Query($args);
echo $pageloop->request;

while ($pageloop->have_posts()) : 
	$pageloop->the_post(); 
	// continue
```

## How to alter wp_query() before it executes?

- The posts are returned in the Main Loop as an alternate to query_posts()
- The advantage of using this filter is that it alters the SQL query before it is executed, reducing the number of database calls.

```
function alter_the_query( $request ) {
    // The query isn't run if we don't pass any query vars
    $dummy_query = new WP_Query();  
    $dummy_query->parse_query( $request );
    
    // this is the actual manipulation; do whatever you need here
    if ( $dummy_query->is_home() )
        $request['category_name'] = 'news';
    
    return $request;
}
add_filter( 'request', 'alter_the_query' );
```



*Reference:*

[ WP Codex | Plugin API / Filter Reference / request ]( https://codex.wordpress.org/Plugin_API/Filter_Reference/request )