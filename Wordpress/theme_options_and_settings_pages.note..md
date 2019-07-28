function render_theme_settings_main_page() {
  echo '<div>';
  echo '<h2>My custom plugin</h2>';
  echo 'Options relating to the Custom Plugin';
  echo '<form action="options.php" method="post">';
  settings_fields('plugin_options');
  do_settings_sections('plugin');
  echo '<input name="Submit" type="submit" value="';
  echo esc_attr_e('Save Changes');
  echo '" />';
  echo '</form></div>';
}





// validate our options
function plugin_options_validate($input) {

  $options = get_option('plugin_options');
  $options['text_string'] = trim($input['text_string']);

  if ( !preg_match('/^[a-z0-9]{32}$/i', $options['text_string'])) {
    $options['text_string'] = '';
  }
  return $options;
}




// Add the admin settings and such
function plugin_admin_init(){
  register_setting(     'plugin_options',     'plugin_options'    , 'plugin_options_validate' );
  add_settings_section( 'plugin_main',        'Main Settings'     , 'plugin_section_text'     , 'plugin');
  add_settings_field(   'plugin_text_string', 'Plugin Text Input' , 'plugin_setting_string'   , 'plugin'  , 'plugin_main');
}
add_action('admin_init', 'plugin_admin_init');