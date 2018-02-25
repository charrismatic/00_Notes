

### Enable shortcodes in text widgets

TODO: ADD THIS IN FUNCTIONS.PHP OR IN PLUGIN
`add_filter('widget_text','do_shortcode');`

# 






// // AUTOMATICALLY SELECCT PARENT TOPICS IN HIERARCHICAL TAXONOMY
// function super_category_toggler() {
//
//   $taxonomies = apply_filters('super_category_toggler',array());
//   for($x=0; $x<count($taxonomies); $x++) {
//     $taxonomies[$x] = '#'.$taxonomies[$x].'div .selectit input';
//   }
//
//   $selector = implode(',',$taxonomies);
//
//   if($selector == '') $selector = '.selectit input';
//   echo '<script>
//
//   </script>';
// }
// add_action('admin_footer-post.php', 'super_category_toggler');
// add_action('admin_footer-post-new.php', 'super_category_toggler');




// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
//        OUTPUT TABLEPRESS TABLE TO JSON
// -+-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-+-*
// $table = TablePress::$controller->model_table->load( $the_table_id );
// echo "<script> var table_data = " .json_encode( $table['data']). "</script>";
// add_filter( 'tablepress_table_output', 'tablepress_table_to_json_output', 10, 3 );
// function tablepress_table_to_json_output( $output, $table, $render_options ) {
//   $output = "<script> var table_data = " . json_encode( $table['data'] ). "</script>";
//   var_dump($table);
//   return $output;
// }