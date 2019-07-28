source: developer.wordpress.org/reference/functions/get_bloginfo/
---

```php
get_bloginfo( string $show = '', string $filter = 'raw' )
```

## `$show`

 - ‘name’                                  | Site title (set in Settings > General)
 - ‘description’                           | Site tagline (set in Settings > General)
 - ‘wpurl’                                 | The WordPress address (URL) (set in Settings > General)
 - ‘url’                                   | The Site address (URL) (set in Settings > General)
 - ‘admin_email’                           | Admin email (set in Settings > General)
 - ‘charset’                               | The "Encoding for pages and feeds" (set in Settings > Reading)
 - ‘version’                               | The current WordPress version
 - ‘html_type’                             | The content-type (default: "text/html"). Themes and plugins can override the default value using the ‘pre_option_html_type’ filter
 - ‘text_direction’                        | The text direction determined by the site’s language. is_rtl() should be used instead
 - ‘language’                              | Language code for the current site
 - ‘stylesheet_url’                        | URL to the stylesheet for the active theme. An active child theme will take precedence over this value
 - ‘stylesheet_directory’                  | Directory path for the active theme. An active child theme will take precedence over this value
 - ‘template_url’ / ‘template_directory’   | URL of the active theme’s directory. An active child theme will NOT take precedence over this value
 - ‘pingback_url’                          | The pingback XML-RPC file URL (xmlrpc.php)
 - ‘atom_url’                              | The Atom feed URL (/feed/atom)
 - ‘rdf_url’                               | The RDF/RSS 1.0 feed URL (/feed/rfd)
 - ‘rss_url’                               | The RSS 0.92 feed URL (/feed/rss)
 - ‘rss2_url’                              | The RSS 2.0 feed URL (/feed)
 - ‘comments_atom_url’                     | The comments Atom feed URL (/comments/feed)
 - ‘comments_rss2_url’                     | The comments RSS 2.0 feed URL (/comments/feed)


 (string) (Optional) Site info to retrieve. Default empty (site name).

 Default value: ''



## `$filter`

$filter
(string) (Optional) How to filter what is retrieved.

Default value: 'raw'

