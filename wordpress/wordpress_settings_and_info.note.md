# SITE INFO

### get_bloginfo()

*Retrieves information about the current site.*

`get_bloginfo( string $show = '', string $filter = 'raw' )`


__$show__
- (string) (Optional)
- Default empty (site name)
-  Site info to retrieve

__$filter__
- (string) (Optional)
-  Default value: 'raw'
-  How to filter what is retrieved.




**Possible values for $show include:**

-  __name__`                  Site title (Settings > General)`
-  __description__`           Site tagline (Settings > General)`
-  __wpurl__`                 WordPress address (URL) (Settings > General)`
-  __url__`                   Site address (URL) (Settings > General)`
-  __admin_email__`           Admin email (Settings > General)`
-  __charset__`               Encoding for pages and feeds (Settings > Reading)`
-  __version__`               Current WordPress version`
-  __html_type__`             Content-type (default: "text/html")`
`                              Themes and plugins can override default with filter `pre_option_html_type``
-  __text_direction__`        Text direction determined by the site’s language. `is_rtl()` should be used instead`
-  __language__`              Language code for current site`
-  __stylesheet_url__`        URL to stylesheet of active theme (or child theme)`
-  __stylesheet_directory__`  Directory path for the active theme (or child theme)`
-  __template_url__`          URL of the active themes directory (child theme will NOT override)`
-  __template_directory__`    URL of the active themes directory (child theme will NOT override)`
-  __pingback_url__`          Pingback XML-RPC file URL (xmlrpc.php)`
-  __atom_url__`              Atom feed URL (/feed/atom)`
-  __rdf_url__`               RDF/RSS 1.0 feed URL (/feed/rfd)`
-  __rss_url__`               RSS 0.92 feed URL (/feed/rss)`
-  __rss2_url__`              RSS 2.0 feed URL (/feed)`
-  __comments_atom_url__`     Comments Atom feed URL (/comments/feed)`
-  __comments_rss2_url__`     Comments RSS 2.0 feed URL (/comments/feed)`



Some `$show` values are deprecated and will be removed in future versions

These options will trigger the `_deprecated_argument()` function

Deprecated arguments include:

_‘siteurl’_ – Use ‘url’ instead
_‘home’_ – Use ‘url’ instead

---
