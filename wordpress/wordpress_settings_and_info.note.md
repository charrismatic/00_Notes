# SITE INFO

### _Function:_ get_bloginfo()

Retrieves information about the current site.

`get_bloginfo( string $show = '', string $filter = 'raw' )`


__$show__
- (string)
- (Optional)
- Default empty (site name).
-  Site info to retrieve.

__$filter__
- (string)
- (Optional)
-  Default value: 'raw'
-  How to filter what is retrieved.


Possible values for $show include:

-  _‘name’_`                 | Site title (set in Settings > General)`
-  _‘description’_`          | Site tagline (set in Settings > General)`
-  _‘wpurl’_`                | The WordPress address (URL) (set in Settings > General)`
-  _‘url’_`                  | The Site address (URL) (set in Settings > General)`
-  _‘admin_email’_`          | Admin email (set in Settings > General)`
-  _‘charset’_`              | The "Encoding for pages and feeds" (set in Settings > Reading)`
-  _‘version’_`              | The current WordPress version`
-  _‘html_type’_`            | The content-type (default: "text/html"). Themes and plugins can override the default value using the ‘pre_option_html_type’ filter`
-  _‘text_direction’_`       | The text direction determined by the site’s language. is_rtl() should be used instead`
-  _‘language’_`             | Language code for the current site`
-  _‘stylesheet_url’_`       | URL to the stylesheet for the active theme. An active child theme will take precedence over this value`
-  _‘stylesheet_directory’_` | Directory path for the active theme. An active child theme will take precedence over this value`
-  _‘template_url’_`         | URL of the active theme’s directory. An active child theme will NOT take precedence over this value `
-  _‘template_directory’_`   | URL of the active theme’s directory. An active child theme will NOT take precedence over this value`
-  _‘pingback_url’_`         | The pingback XML-RPC file URL (xmlrpc.php)`
-  _‘atom_url’_`             | The Atom feed URL (/feed/atom)`
-  _‘rdf_url’_`              | The RDF/RSS 1.0 feed URL (/feed/rfd)`
-  _‘rss_url’_`              | The RSS 0.92 feed URL (/feed/rss)`
-  _‘rss2_url’_`             | The RSS 2.0 feed URL (/feed)`
-  _‘comments_atom_url’_`    | The comments Atom feed URL (/comments/feed)`
-  _‘comments_rss2_url’_`    | The comments RSS 2.0 feed URL (/comments/feed)`


Some `$show` values are deprecated and will be removed in future versions

These options will trigger the `_deprecated_argument()` function

Deprecated arguments include:

_‘siteurl’_ – Use ‘url’ instead
_‘home’_ – Use ‘url’ instead

---
