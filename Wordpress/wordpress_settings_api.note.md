
__register_setting__
- option_group
- option_name
- sanitize_callback

__add_settings_section__
- id
- title
- callback
- page


__do_settings_sections__
- page

__add_settings_field__
- id
- title
- callback
- page
- section
- args

__settings_fields__
- option_group

__do_settings_fields__
- page
- section


```php
 add_settings_section(
  'themename__setting_section_main1',       // ID
  'Example Theme Settings',                 // Title
  array( $this, 'print_section_info' ),     // Callback
  'theme_settings'                          // Page
)

add_settings_field(
  'id_number',                               // ID
  'ID Number',                               // Title
  array( $this, 'id_number_callback' ),      // Callback
  'theme_settings',                          // Page
  'themename__setting_section_main1'         // Section
)

add_settings_field(
    'title',                                 // ID
    'Title',                                 // Title
    array( $this, 'title_callback' ),        // Callback
    'theme_settings',                        // Page  
    'themename__setting_section_main1'       // Section
)
```