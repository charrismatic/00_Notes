<?php
/**
* Theme 
* CUSTOM FUNCTIONS FOR LANDING PAGES
* @author MATT HARRIS @SFP.NET
* @date 4/26/2017
*********************************************/
//              READ THE DOCS
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
// @link developer.wordpress.org/themes/
// @link codex.wordpress.org/Widgetizing_Themes
// @link codex.wordpress.org/Function_Reference/register_sidebar
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
//             THEME CONFIG
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
// THIS FILE LOADED AT ./the_theme/functions.php
//
// + SET-GET COMMON/GLOBAL VARIABLES
// + CLASSES, PROCEDURES, HOOKS, PATHS
// public_html/wp-settings.php
// public_html//wp-load.php
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*

// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
//         1. CUSTOM WIGET AREA
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
// REGISTER NEW WIDGET AREA
// register_sidebar( array(
//  'id'          => 'before-post',
//  'name'        => 'Before Posts Widget',
//  'description' => __( 'Custom Widget Desc', 'text_domain' ),
// ));
//
// CAN ALSO USE FUNCTION HOOKS TO REGISTER
// function wpsites_before_post_widget( $content ) {
//   if ( is_singular( array( 'post', 'page' ))
//   && is_active_sidebar( 'before-post' ) && is_main_query()) {
//     dynamic_sidebar('before-post');
//   } return $content;
// } add_filter( 'the_content', 'wpsites_before_post_widget' );
//
// LOAD WIDGET AT TEMPLATE.PHP
// if ( is_active_sidebar( 'ind_sidebr_r1' )) {
//   echo '<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">';
//   dynamic_sidebar( 'ind_sidebr_r1' );
//   echo '</div>';
// }


// REGISTER  WIDGET AREA
// @link https://generatewp.com/sidebar/
function _widgets_init() {
  $args = array(
    'id'            => 'ind-components',
    'class'         => 'component-area',
    'name'          => __( ' Page Components', 'text_domain' ),
    'description'   => __( 'Custom Elements for the Components ', 'text_domain' ),
    'before_widget' => '<!-- BEGIN  COMPONENTS --> <div class="ind-component-container">',
    'after_widget'  => '</div> <!-- END  COMPONENTS -->',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  );
  register_sidebar( $args );
} add_action( 'widgets_init', '_widgets_init' );

error_log(' Theme custom functions loaded');
