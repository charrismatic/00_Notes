## Add EXTRA PAGE PAGE OVERVIEW COLUMNS



```
function custom_page_column_content( column_name, post_id ) {
 if ( $column_name == 'thumbnail' ) {
   post_thumbnail_id = get_post_thumbnail_id( post_id );
   if ( $post_thumbnail_id ) {
     post_thumbnail_img = wp_get_attachment_image_src( post_thumbnail_id, 'thumbnail' );
     echo '';
   }
 }

 if ( $column_name == 'category' ) {
   post_category_id = get_the_category( post_id );
   if ( $post_category_id ) {
     echo '<span>'.$post_category_id.'</span>';
   }
 }
}

 add_action( 'manage_pages_custom_column', 'custom_page_column_content', 10, 2 );
```
 https://codex.wordpress.org/Plugin_API/Action_Reference/manage_pages_custom_column