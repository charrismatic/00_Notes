
### add_meta_boxes_{$post_type}

Fires after all built-in meta boxes have been added, contextually for the given post type.

The dynamic portion of the hook, $post_type, refers to the post type of the post.

`do_action( "add_meta_boxes_{$post_type}", WP_Post $post )`

__$post__
- (WP_Post)
-  Post object.


Example

```
/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_display_callback', 'post' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

/**
 * Meta box display callback.
 * @param WP_Post $post Current post object.
 */
function wpdocs_my_display_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
}

/**
 * Save meta box content.
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'wpdocs_save_meta_box' );
```

https://developer.wordpress.org/reference/hooks/add_meta_boxes_post_type/
