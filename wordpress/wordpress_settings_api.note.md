
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



// register_setting (
// 'charrismatic_theme_settings',            // Option group
// 'charrismatic_theme_settings_demo1',      // Option name
// array( $this, 'sanitize' )                // Sanitize

// add_settings_section(
// 'charrismatic__setting_section_main1',   // ID
// 'M@ttHarr.is Theme Settings',             // Title
// array( $this, 'print_section_info' ),     // Callback
// 'theme_settings'                   // Page

// add_settings_field(
// 'id_number',                               // ID
// 'ID Number',                               // Title
// array( $this, 'id_number_callback' ),      // Callback
// 'theme_settings',                   // Page
// 'charrismatic__setting_section_main1'     // Section

// add_settings_field(
// 'title',                                    // ID
// 'Title',                                    // Title
// array( $this, 'title_callback' ),           // Callback
// 'theme_settings',                    // Pagesettings_fields
// 'charrismatic__setting_section_main1'      // Section


// page_url =  theme_settings
