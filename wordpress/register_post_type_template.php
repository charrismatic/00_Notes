<?php
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
//            CUSTOM POST TYPE
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
//  Try:  https://generatewp.com/post-type/
//  Description
//  register_post_type should only be invoked through the 'init' action. It will not work if called
//  before 'init', and aspects of the newly created or modified post type will work incorrectly if
//  called later.
//
//  Note: You can use this function in themes and plugins. However, if you use it in a theme,
//  your post type will disappear from the admin area if a user switches away from your theme.
//
//  Taxonomies
//  When registering a post type, always register your taxonomies using the taxonomies argument.
//  If you do not, the taxonomies and post type will not be recognized as connected when using
//  filters such as parse_query or pre_get_posts. This can lead to unexpected results and failures.
//
//  Even if you register a taxonomy while creating the post type, you must
//  still explicitly register and define the taxonomy using register_taxonomy().
//
//  Reserved Post Types
//  post // page // attachment // revision // nav_menu_item // custom_css // customize_changeset
//
//  In addition, the following post types should not be used
//  action // author // order // theme

// Register Custom Post Type
function industrial_register_post_type() {

  $labels = array(
    'add_new_item'          => __( 'Add New Page'          , 'text_domain' ),
    'add_new'               => __( 'Add New'               , 'text_domain' ),
    'all_items'             => __( 'All Pages'             , 'text_domain' ),
    'archives'              => __( 'Industrial Pages'      , 'text_domain' ),
    'attributes'            => __( 'Page Attributes'       , 'text_domain' ),
    'edit_item'             => __( 'Edit Page'             , 'text_domain' ),
    'featured_image'        => __( 'Featured Image'        , 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list'     , 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item'      , 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation' , 'text_domain' ),
    'items_list'            => __( 'Items list'            , 'text_domain' ),
    'menu_name'             => __( 'Industrial Pages'      , 'text_domain' ),
    'name_admin_bar'        => __( 'Industrial Page'       , 'text_domain' ),
    'name'                  => _x( 'Industrial Pages'      , 'Post Type General Name', 'text_domain' ),
    'new_item'              => __( 'New Item'              , 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash'    , 'text_domain' ),
    'not_found'             => __( 'Not found'             , 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Page:'          , 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image' , 'text_domain' ),
    'search_items'          => __( 'Search Item'           , 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image'    , 'text_domain' ),
    'singular_name'         => _x( 'Industrial Page'       , 'Post Type Singular Name', 'text_domain' ),
    'update_item'           => __( 'Update Item'           , 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item' , 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image' , 'text_domain' ),
    'view_item'             => __( 'View Item'             , 'text_domain' ),
    'view_items'            => __( 'View Items'            , 'text_domain' ),
  );
  $rewrite = array(
		'slug'                  => 'post_type',   // DEFAULT, OR CHOOSE YOUR OWN
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
  );
  $args = array(
    'can_export'            => true,
    'capability_type'       => 'page',
    'description'           => __( 'TruFlex Industrial Pages', 'text_domain' ),
    'exclude_from_search'   => false,
    'has_archive'           => true,
    'hierarchical'          => true,
    'label'                 => __( 'Industrial Page', 'text_domain' ),
    'labels'                => $labels,
    'menu_icon'             => 'dashicons-align-right',
    'menu_position'         => 5,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_in_admin_bar'     => true,
    'show_in_menu'          => true,
    'show_in_nav_menus'     => true,
    'show_in_rest'          => false,
    'show_ui'               => true,
    'supports'              => array( 'title', 'editor', 'revisions', 'page-attributes', ),
    'taxonomies'            => array( 'page' ),
  );
  
  $post_type_name = 'industrial'; // 20 CHAR MAX NO UPPERCASE
  register_post_type($post_type_name , $args );

}
add_action( 'init', 'industrial_register_post_type', 0 );// }

// To get permalinks to work when you activate theme or plugin you must flush cache
// For Plugins use register_activation_hook( __FILE__, 'my_rewrite_flush' );
// for themes add_action( 'after_switch_theme', 'my_rewrite_flush' );
function industrial_rewrites_flush() {
    industrial_register_post_type();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'industrial_rewrites_flush' );
