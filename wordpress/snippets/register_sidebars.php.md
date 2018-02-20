# Register Sidebars

```
function custom_sidebars() {

	$args = array(
		'id'            => 'sidebar_id',
		'class'         => 'sidebar_class',
		'name'          => __( 'sidebar_name', 'text_domain' ),
		'description'   => __( 'sidebar_description', 'text_domain' ),
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'sidebar_id2',
		'class'         => 'sidebar_class',
		'name'          => __( 'sidebar_name', 'text_domain' ),
		'description'   => __( 'sidebar_description2', 'text_domain' ),
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );
```
