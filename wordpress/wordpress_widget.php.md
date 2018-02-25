### REGISTER NEW WIDGET AREA
```php
register_sidebar( array(
 'id'          => 'before-post',
 'name'        => 'Before Posts Widget',
 'description' => __( 'Custom Widget Desc', 'text_domain' ),
));
```

### CAN ALSO USE FUNCTION HOOKS TO REGISTER

```php
function wpsites_before_post_widget( $content ) {
  if ( is_singular( array( 'post', 'page' ))
  && is_active_sidebar( 'before-post' ) && is_main_query()) {
    dynamic_sidebar('before-post');
  } return $content;
} 
add_filter( 'the_content', 'wpsites_before_post_widget' );
```

### LOAD WIDGET AT TEMPLATE.PHP

```php
if ( is_active_sidebar( 'ind_sidebr_r1' )) {
  echo '<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">';
  dynamic_sidebar( 'ind_sidebr_r1' );
  echo '</div>';
}
```
### REGISTER  WIDGET AREA

https://generatewp.com/sidebar/

```php
function _widgets_init() {

    $args = array(
        'id'            => 'ind-components',
        'class'         => 'component-area',
        'name'          => __( ' Page Components', 'text_domain' ),
        'description'   => __( 'Custom Elements for the Components ', 'text_domain' ),
        'before_widget' => '<!-- BEGIN WIDGET --><div class="ind-component-container">',
        'after_widget'  => '</div> <!-- END WIDGET -->',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',  
    );
  register_sidebar( $args );
} 
add_action( 'widgets_init', '_widgets_init' );

```