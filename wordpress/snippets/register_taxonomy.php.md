# Register Custom Taxonomy


__register_taxonomy()__

https://developer.wordpress.org/reference/functions/register_taxonomy/

`register_taxonomy( string $taxonomy, array|string $object_type, array|string $args = array() )`

Creates or modifies a taxonomy object.

___Note: Do not use before the ‘init’ hook___

A simple function for creating or modifying a taxonomy object based on the parameters given.

If modifying an existing taxonomy object, note that the $object_type value from the original registration will be overwritten.


__$taxonomy__
- (string)
- (Required)
- Taxonomy key
- Must not exceed 32 characters

__$object_type__
- (array|string)
- (Required)
- Object type or array of object types with which the taxonomy should be associated

__$args__
- (array|string)
- (Optional)
- Array or query string of arguments for registering a taxonomy

  '_labels_'
  (array)
  - An array of labels for this taxonomy.
  - By default, Tag labels are used for non-hierarchical taxonomies, and Category labels are used for hierarchical taxonomies.
  - See accepted values in get_taxonomy_labels().

```
'name'                       -  General name for the taxonomy
                             -  -  Usually plural
                             -  -  The same as and overridden by $tax->label
                             -  -  Default 'Tags'/'Categories'
'singular_name'              -  Name for one object of this taxonomy
                             -  -  Default: 'Tag'/'Category'
'search_items'               -  Default: 'Search Tags'/'Search Categories'
'popular_items'              -  This label is only used for non-hierarchical taxonomies
                             -  -  Default: 'Popular Tags'
'all_items'                  -  Default: 'All Tags'/'All Categories'
'parent_item'                -  This label is only used for hierarchical taxonomies
                             -  -  Default: 'Parent Category'
'parent_item_colon'          -  The same as parent_item,
                             -  but with colon : in the end
'edit_item'                  -  Default: 'Edit Tag'/'Edit Category'
'view_item'                  -  Default: 'View Tag'/'View Category'
'update_item'                -  Default: 'Update Tag'/'Update Category'
'add_new_item'               -  Default: 'Add New Tag'/'Add New Category'
'new_item_name'              -  Default: 'New Tag Name'/'New Category Name'
'separate_items_with_commas' -  This label is only used for non-hierarchical taxonomies
                             -  -  Default: 'Separate tags with commas'
                             -  -  Used in the meta box
'add_or_remove_items'        -  This label is only used for non-hierarchical taxonomies
                             -  -  Default: 'Add or remove tags
                             -  -  Used in the meta box when JavaScript is disabled
'choose_from_most_used'      -  This label is only used on non-hierarchical taxonomies
                             -  -  Default: 'Choose from the most used tags
                             -  -  Used in the meta box
'not_found'                  -  Default: 'No tags found'/'No categories found
                             -  -  Used in the meta box and taxonomy list table
'no_terms'                   -  Default: 'No tags'/'No categories
                             -  -  used in the posts and media list tables
'items_list_navigation'      -  Label for the table pagination hidden heading
'items_list'                 -  Label for the table hidden heading
'most_used'                  -  Title for the Most Used tab
                             -  Default 'Most Used'
'back_to_items'              -  Label displayed after a term has been updated

```

  '_description_'
  - (string)
  - A short descriptive summary of what the taxonomy is for.

  '_public_'
  - (bool)
  - Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users. The default settings of $publicly_queryable, $show_ui, and $show_in_nav_menus are inherited from $public.

  '_publicly_queryable_'
  - (bool)
  - Whether the taxonomy is publicly queryable. If not set, the default is inherited from $public

  '_hierarchical_'
  - (bool)
  - Whether the taxonomy is hierarchical. Default false.

  '_show_ui_'
  - (bool)
  - Whether to generate and allow a UI for managing terms in this taxonomy in the admin. If not set, the default is inherited from $public (default true).

  '_show_in_menu_'
  - (bool)
  - Whether to show the taxonomy in the admin menu.
  - If true, the taxonomy is shown as a submenu of the object type menu.
  - If false, no menu is shown. $show_ui must be true.
  - If not set, default is inherited from $show_ui (default true).

  '_show_in_nav_menus_'
  - (bool)
  - Makes this taxonomy available for selection in navigation menus.
  - If not set, the default is inherited from $public (default true).

  '_show_in_rest_'
  - (bool)
  - Whether to include the taxonomy in the REST API.

  '_rest_base_'
  - (string)
  - To change the base url of REST API route. Default is $taxonomy.

  '_rest_controller_class_'
  - (string)
  - REST API Controller class name. Default is 'WP_REST_Terms_Controller'.

  '_show_tagcloud_'
  - (bool)
  - Whether to list the taxonomy in the Tag Cloud Widget controls.
  - If not set, the default is inherited from $show_ui (default true).

  '_show_in_quick_edit_'
  - (bool)
  - Whether to show the taxonomy in the quick/bulk edit panel.
  - It not set, the default is inherited from $show_ui (default true).

  '_show_admin_column_'
  - (bool)
  - Whether to display a column for the taxonomy on its post type listing screens.
  - Default false.

  '_meta_box_cb_'
  - (bool|callable)
  - Provide a callback function for the meta box display
  - If not set, post_categories_meta_box() is used for hierarchical taxonomies
  - post_tags_meta_box() is used for non-hierarchical
  - If false, no meta box is shown

  '_capabilities_'
  - (array)
  - Array of capabilities for this taxonomy.

```
      '_manage_terms_'  | (string) Default 'manage_categories'.
      '_edit_terms_'    | (string) Default 'manage_categories'.
      '_delete_terms_'  | (string) Default 'manage_categories'.
      '_assign_terms_'  | (string) Default 'edit_posts'.
```

  '_rewrite_'
  - (bool| array)
  - Triggers the handling of rewrites for this taxonomy.
  -  Default true, using $taxonomy as slug.
  -  To prevent rewrite, set to false.
  -  To specify rewrite rules, an array can be passed with any of these keys:

```
      '_slug_'          | (string) Customize the permastruct slug. Default $taxonomy key.
      '_with_front_'    |   (bool) Should the permastruct be prepended with WP_Rewrite::$front. Default true.
      '_hierarchical_'  |   (bool) Either hierarchical rewrite tag or not. Default false.
      '_ep_mask_'       |    (int) Assign an endpoint mask. Default EP_NONE.
```

  '_query_var_'
  - (string)
  - Sets the query var key for this taxonomy
  - Default $taxonomy key
  - If false, a taxonomy cannot be loaded at ?{query_var}={term_slug}
  - If a string, the query ?{query_var}={term_slug} will be valid

  '_update_count_callback_'
  - (callable)
  - Works much like a hook, in that it will be called when the count is updated.
  - Default \_update_post_term_count() for taxonomies attached to post types,
  - which confirms that the objects are published before counting them
  - Default \_update_generic_term_count() for taxonomies attached to other object types, such as users


  '_builtin_'
  - (bool)
  - This taxonomy is a "built-in" taxonomy.
  - INTERNAL USE ONLY!
  - Default false.

---


EXAMPLE TAXONOMY

```php

function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'tax_1',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_categories',
		'edit_terms'                 => 'manage_categories',
		'delete_terms'               => 'manage_categories',
		'assign_terms'               => 'edit_posts',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'tax_1',
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'taxonomy', array( 'post' ), $args );
  
}
add_action( 'init', 'custom_taxonomy', 0 );

```
