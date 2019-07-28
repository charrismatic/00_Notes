

https://developer.wordpress.org/themes/basics/including-css-javascript/#default-scripts-included-and-registered-by-wordpress

# Including CSS & JavaScript | Theme Developer Handbook | WordPress Developer Resources

---------------------------
Browse: [Home](https://developer.wordpress.org "WordPress Developer Resources") / [Theme Handbook](https://developer.wordpress.org/themes/) / [Theme Basics](https://developer.wordpress.org/themes/basics/ "Theme Basics") / Including CSS & JavaScript

# Including CSS & JavaScript

.toc-jump { text-align: right; font-size: 12px; } .page .toc-heading { margin-top: -50px; padding-top: 50px !important; }

## Topics

-   [Enqueuing Scripts and Styles](#enqueuing-scripts-and-styles)
    -   [Stylesheets](#stylesheets)
    -   [Scripts](#scripts)
    -   [The Comment Reply Script](#the-comment-reply-script)
    -   [Combining Enqueue Functions](#combining-enqueue-functions)
-   [Default Scripts Included and Registered by WordPress](#default-scripts-included-and-registered-by-wordpress)

When you’re creating your theme, you may want to create additional stylesheets or JavaScript files. However, remember that a WordPress website will not just have your theme active, it will also be using many different plugins. So that everything works harmoniously, it’s important that theme and plugins load scripts and stylesheets using the standard WordPress method. This will ensure the site remains efficient and that there are no incompatibility issues.

Adding scripts and styles to WordPress is a fairly simple process.   Essentially, you will create a function that will enqueue all of your scripts and styles. When enqueuing a script or stylesheet, WordPress creates a handle and path to find your file and any dependencies it may have (like jQuery) and then you will use a hook that will insert your scripts and stylesheets.

## Enqueuing Scripts and Styles [#Enqueuing Scripts and Styles](#enqueuing-scripts-and-styles)

The proper way to add scripts and styles to your theme is to enqueue them in the `functions.php` files. The `style.css` file is required in all themes, but it may be necessary to add other files to extend the functionality of your theme.

Tip: WordPress includes a number of JavaScript files as part of the software package, including commonly used libraries such as jQuery. Before adding your own JavaScript, [check to see if you can make use of an included library](https://developer.wordpress.org/themes/basics/including-css-javascript/#default-scripts-included-and-registered-by-wordpress).

The basics are:

1.  Enqueue the script or style using `wp_enqueue_script()` or `wp_enqueue_style()`

### Stylesheets [#Stylesheets](#stylesheets)

Your CSS stylesheets are used to customize the presentation of your theme. A stylesheet is also the file where information about your theme is stored. For this reason, the `style.css` file is __required in every theme.__

Rather then loading the stylesheet in your `header.php` file, you should load it in using `wp_enqueue_style`. In order to load your main stylesheet, you can enqueue it in `functions.php`

To enqueue `style.css`

| 
1

 | 

`wp_enqueue_style(` `'style'``, get_stylesheet_uri() );`



 |

This will look for a stylesheet named “style” and load it.

The basic function for enqueuing a style is:

| 
1

 | 

`wp_enqueue_style(` `$handle``,` `$src``,` `$deps``,` `$ver``,` `$media` `);`



 |

You can include these parameters:

-   __$handle__ is simply the name of the stylesheet.
-   __$src__ is where it is located. The rest of the parameters are optional.
-   __$deps__ refers to whether or not this stylesheet is dependent on another stylesheet. If this is set, this stylesheet will not be loaded unless its dependent stylesheet is loaded first.
-   __$ver__ sets the version number.
-   __$media__ can specify which type of media to load this stylesheet in, such as ‘all’, ‘screen’, ‘print’ or ‘handheld.’

So if you wanted to load a stylesheet named “slider.css” in a folder named “CSS” in you theme’s root directory, you would use:

| 
1

 | 

`wp_enqueue_style(` `'slider'``, get_template_directory_uri() .` `'/css/slider.css'``,false,``'1.1'``,``'all'``);`



 |

[Top ↑](#top)

### Scripts [#Scripts](#scripts)

Any additional JavaScript files required by a theme should be loaded using `wp_enqueue_script`. This ensures proper loading and caching, and allows the use conditional tags to target specific pages. These are __optional__.

`wp_enqueue_script` uses a similar syntax to `wp_enqueue_style`.

Enqueue your script:

| 
1

 | 

`wp_enqueue_script(` `$handle``,` `$src``,` `$deps``,` `$ver``,` `$in_footer``);`



 |

-   __$handle__ is the name for the script.
-   __$src__ defines where the script is located.
-   __$deps__ is an array that can handle any script that your new script depends on, such as jQuery.
-   __$ver__ lets you list a version number.
-   __$in_footer__ is a boolean parameter (true/false) that allows you to place your scripts in the footer of your HTML document rather then in the header, so that it does not delay the loading of the DOM tree.

Your enqueue function may look like this:

| 
1

 | 

`wp_enqueue_script(` `'script'``, get_template_directory_uri() .` `'/js/script.js'``,` `array` `(` `'jquery'` `), 1.1, true);`



 |

[Top ↑](#top)

### The Comment Reply Script [#The Comment Reply Script](#the-comment-reply-script)

WordPress comments have quite a bit of functionality in them right out of the box, including threaded comments and enhanced comment forms. In order for comments to work properly, they require some JavaScript. However, since there are certain options that need to be defined within this JavaScript, the comment-reply script should be added to every theme that uses comments.

The proper way to include comment reply is to use conditional tags to check if certain conditions exist, so that the script isn’t being loaded unnecessarily. For instance, you can only load scripts on single post pages using `is_singular`, and check to make sure that “Enable threaded comments” is selected by the user. So you can set up a function like:

| 
1

2

3

 | 

`if` `( is_singular() && comments_open() && get_option(` `'thread_comments'` `) ) {`

`wp_enqueue_script(` `'comment-reply'` `);`

`}`



 |

If comments are enabled by the user, and we are on a post page, then the comment reply script will be loaded. Otherwise, it will not.

[Top ↑](#top)

### Combining Enqueue Functions [#Combining Enqueue Functions](#combining-enqueue-functions)

It is best to combine all enqueued scripts and styles into a single function, and then call them using the `wp_enqueue_scripts` action. This function and action should be located somewhere below the initial setup (performed above).

| 
1

2

3

4

5

6

7

8

9

10

11

12

 | 

`function` `add_theme_scripts() {`

`wp_enqueue_style(` `'style'``, get_stylesheet_uri() );`

`wp_enqueue_style(` `'slider'``, get_template_directory_uri() .` `'/css/slider.css'``,` `array``(),` `'1.1'``,` `'all'``);`

`wp_enqueue_script(` `'script'``, get_template_directory_uri() .` `'/js/script.js'``,` `array` `(` `'jquery'` `), 1.1, true);`

`if` `( is_singular() && comments_open() && get_option(` `'thread_comments'` `) ) {`

`wp_enqueue_script(` `'comment-reply'` `);`

`}`

`}`

`add_action(` `'wp_enqueue_scripts'``,` `'add_theme_scripts'` `);`



 |

[Top ↑](#top)

## Default Scripts Included and Registered by WordPress [#Default Scripts Included and Registered by WordPress](#default-scripts-included-and-registered-by-wordpress)

By default, WordPress includes many popular scripts commonly used by web developers, as well as the scripts used by WordPress itself. Some of them are listed in the table below:

| __Script Name__                                              | __Handle__                                  | __Needed Dependency *__ |
| ------------------------------------------------------------ | ------------------------------------------- | ----------------------- |
| [Image Cropper](http://www.defusion.org.uk/ "http://www.defusion.org.uk/") | Image cropper (not used in core, see jcrop) |                         |
| [Jcrop](http://deepliquid.com/content/Jcrop.html "http://deepliquid.com/content/Jcrop.html") | jcrop                                       |                         |
| [SWFObject](http://code.google.com/p/swfobject/ "http://code.google.com/p/swfobject/") | swfobject                                   |                         |
| [SWFUpload](http://swfupload.org/ "http://swfupload.org/")   | swfupload                                   |                         |
| [SWFUpload Degrade](http://swfupload.org/ "http://swfupload.org/") | swfupload-degrade                           |                         |
| [SWFUpload Queue](http://swfupload.org/ "http://swfupload.org/") | swfupload-queue                             |                         |
| [SWFUpload Handlers](http://swfupload.org/ "http://swfupload.org/") | swfupload-handlers                          |                         |
| [jQuery](http://jquery.com/ "http://jquery.com/")            | jquery                                      | json2 (for AJAX calls)  |
| [jQuery Form](http://plugins.jquery.com/project/form/ "http://plugins.jquery.com/project/form/") | jquery-form                                 | jquery                  |
| [jQuery Color](http://plugins.jquery.com/project/color/ "http://plugins.jquery.com/project/color/") | jquery-color                                | jquery                  |
| [jQuery Masonry](http://masonry.desandro.com/ "http://masonry.desandro.com/") | jquery-masonry                              | jquery                  |
| [jQuery UI Core](http://jqueryui.com/ "http://jqueryui.com/") | jquery-ui-core                              | jquery                  |
| jQuery UI Widget                                             | jquery-ui-widget                            | jquery                  |
| jQuery UI Mouse                                              | jquery-ui-mouse                             | jquery                  |
| [jQuery UI Accordion](http://jqueryui.com/demos/accordion/ "http://jqueryui.com/demos/accordion/") | jquery-ui-accordion                         | jquery                  |
| [jQuery UI Autocomplete](http://jqueryui.com/demos/autocomplete/ "http://jqueryui.com/demos/autocomplete/") | jquery-ui-autocomplete                      | jquery                  |
| [jQuery UI Slider](http://jqueryui.com/demos/slider/ "http://jqueryui.com/demos/slider/") | jquery-ui-slider                            | jquery                  |
| [jQuery UI Progressbar](http://jqueryui.com/demos/progressbar/ "http://jqueryui.com/demos/progressbar/") | jquery-ui-progressbar                       | jquery                  |
| [jQuery UI Tabs](http://jqueryui.com/demos/tabs/ "http://jqueryui.com/demos/tabs/") | jquery-ui-tabs                              | jquery                  |
| [jQuery UI Sortable](http://jqueryui.com/demos/sortable/ "http://jqueryui.com/demos/sortable/") | jquery-ui-sortable                          | jquery                  |
| [jQuery UI Draggable](http://jqueryui.com/demos/draggable/ "http://jqueryui.com/demos/draggable/") | jquery-ui-draggable                         | jquery                  |
| [jQuery UI Droppable](http://jqueryui.com/demos/droppable/ "http://jqueryui.com/demos/droppable/") | jquery-ui-droppable                         | jquery                  |
| [jQuery UI Selectable](http://jqueryui.com/demos/selectable/ "http://jqueryui.com/demos/selectable/") | jquery-ui-selectable                        | jquery                  |
| [jQuery UI Position](http://jqueryui.com/demos/position/ "http://jqueryui.com/demos/position/") | jquery-ui-position                          | jquery                  |
| [jQuery UI Datepicker](http://jqueryui.com/demos/datepicker/ "http://jqueryui.com/demos/datepicker/") | jquery-ui-datepicker                        | jquery                  |
| [jQuery UI Tooltips](http://jqueryui.com/demos/tooltip/ "http://jqueryui.com/demos/tooltip/") | jquery-ui-tooltip                           | jquery                  |
| [jQuery UI Resizable](http://jqueryui.com/demos/resizable/ "http://jqueryui.com/demos/resizable/") | jquery-ui-resizable                         | jquery                  |
| [jQuery UI Dialog](http://jqueryui.com/demos/dialog/ "http://jqueryui.com/demos/dialog/") | jquery-ui-dialog                            | jquery                  |
| [jQuery UI Button](http://jqueryui.com/demos/button/ "http://jqueryui.com/demos/button/") | jquery-ui-button                            | jquery                  |
| [jQuery UI Effects](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-core                         | jquery                  |
| [jQuery UI Effects – Blind](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-blind                        | jquery-effects-core     |
| [jQuery UI Effects – Bounce](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-bounce                       | jquery-effects-core     |
| [jQuery UI Effects – Clip](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-clip                         | jquery-effects-core     |
| [jQuery UI Effects – Drop](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-drop                         | jquery-effects-core     |
| [jQuery UI Effects – Explode](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-explode                      | jquery-effects-core     |
| [jQuery UI Effects – Fade](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-fade                         | jquery-effects-core     |
| [jQuery UI Effects – Fold](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-fold                         | jquery-effects-core     |
| [jQuery UI Effects – Highlight](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-highlight                    | jquery-effects-core     |
| [jQuery UI Effects – Pulsate](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-pulsate                      | jquery-effects-core     |
| [jQuery UI Effects – Scale](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-scale                        | jquery-effects-core     |
| [jQuery UI Effects – Shake](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-shake                        | jquery-effects-core     |
| [jQuery UI Effects – Slide](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-slide                        | jquery-effects-core     |
| [jQuery UI Effects – Transfer](http://jqueryui.com/effect/ "http://jqueryui.com/effect/") | jquery-effects-transfer                     | jquery-effects-core     |
| [MediaElement.js (WP 3.6+)](http://mediaelementjs.com/ "http://mediaelementjs.com/") | wp-mediaelement                             | jquery                  |
| [jQuery Schedule](http://trainofthoughts.org/blog/2007/02/15/jquery-plugin-scheduler/ "http://trainofthoughts.org/blog/2007/02/15/jquery-plugin-scheduler/") | schedule                                    | jquery                  |
| [jQuery Suggest](https://web.archive.org/web/20111017233444/http://plugins.jquery.com/project/suggest "https://web.archive.org/web/20111017233444/http://plugins.jquery.com/project/suggest") | suggest                                     | jquery                  |
| [ThickBox](https://codex.wordpress.org/ThickBox "https://codex.wordpress.org/ThickBox") | thickbox                                    |                         |
| [jQuery HoverIntent](http://cherne.net/brian/resources/jquery.hoverIntent.html "http://cherne.net/brian/resources/jquery.hoverIntent.html") | hoverIntent                                 | jquery                  |
| [jQuery Hotkeys](http://plugins.jquery.com/project/hotkeys "http://plugins.jquery.com/project/hotkeys") | jquery-hotkeys                              | jquery                  |
| [Simple AJAX Code-Kit](http://code.google.com/p/tw-sack/ "http://code.google.com/p/tw-sack/") | sack                                        |                         |
| [QuickTags](http://www.alexking.org/ "http://www.alexking.org") | quicktags                                   |                         |
| [Iris (Colour picker)](https://github.com/automattic/Iris "https://github.com/automattic/Iris") | iris                                        | jquery                  |
| [Farbtastic (deprecated)](http://acko.net/dev/farbtastic "http://acko.net/dev/farbtastic") | farbtastic                                  | jquery                  |
| [ColorPicker (deprecated)](http://mattkruse.com/ "http://mattkruse.com") | colorpicker                                 | jquery                  |
| [Tiny MCE](http://tinymce.moxiecode.com/ "http://tinymce.moxiecode.com/") | tiny_mce                                    |                         |
| Autosave                                                     | autosave                                    |                         |
| WordPress AJAX Response                                      | wp-ajax-response                            |                         |
| List Manipulation                                            | wp-lists                                    |                         |
| WP Common                                                    | common                                      |                         |
| WP Editor                                                    | editorremov                                 |                         |
| WP Editor Functions                                          | editor-functions                            |                         |
| AJAX Cat                                                     | ajaxcat                                     |                         |
| Admin Categories                                             | admin-categories                            |                         |
| Admin Tags                                                   | admin-tags                                  |                         |
| Admin custom fields                                          | admin-custom-fields                         |                         |
| Password Strength Meter                                      | password-strength-meter                     |                         |
| Admin Comments                                               | admin-comments                              |                         |
| Admin Users                                                  | admin-users                                 |                         |
| Admin Forms                                                  | admin-forms                                 |                         |
| XFN                                                          | xfn                                         |                         |
| Upload                                                       | upload                                      |                         |
| PostBox                                                      | postbox                                     |                         |
| Slug                                                         | slug                                        |                         |
| Post                                                         | post                                        |                         |
| Page                                                         | page                                        |                         |
| Link                                                         | link                                        |                         |
| Comment                                                      | comment                                     |                         |
| Threaded Comments                                            | comment-reply                               |                         |
| Admin Gallery                                                | admin-gallery                               |                         |
| Media Upload                                                 | media-upload                                |                         |
| Admin widgets                                                | admin-widgets                               |                         |
| Word Count                                                   | word-count                                  |                         |
| Theme Preview                                                | theme-preview                               |                         |
| [JSON for JS](https://github.com/douglascrockford/JSON-js "https://github.com/douglascrockford/JSON-js") | json2                                       |                         |
| [Plupload Core](http://www.plupload.com/ "http://www.plupload.com/") | plupload                                    |                         |
| [Plupload All Runtimes](http://www.plupload.com/example_all_runtimes.php "http://www.plupload.com/example_all_runtimes.php") | plupload-all                                |                         |
| [Plupload HTML4](http://www.plupload.com/example_all_runtimes.php "http://www.plupload.com/example_all_runtimes.php") | plupload-html4                              |                         |
| [Plupload HTML5](http://www.plupload.com/example_all_runtimes.php "http://www.plupload.com/example_all_runtimes.php") | plupload-html5                              |                         |
| [Plupload Flash](http://www.plupload.com/example_all_runtimes.php "http://www.plupload.com/example_all_runtimes.php") | plupload-flash                              |                         |
| [Plupload Silverlight](http://www.plupload.com/example_all_runtimes.php "http://www.plupload.com/example_all_runtimes.php") | plupload-silverlight                        |                         |
| [Underscore js](http://underscorejs.org/ "http://underscorejs.org/") | underscore                                  |                         |
| [Backbone js](http://backbonejs.org/ "http://backbonejs.org/") | backbone                                    |                         |

| __Removed from Core__                                        |
| ------------------------------------------------------------ |
| __Script Name__                                              |
| [Scriptaculous Root](http://script.aculo.us/ "http://script.aculo.us") |
| [Scriptaculous Builder](http://script.aculo.us/ "http://script.aculo.us") |
| [Scriptaculous Drag & Drop](http://script.aculo.us/ "http://script.aculo.us") |
| [Scriptaculous Effects](http://script.aculo.us/ "http://script.aculo.us") |
| [Scriptaculous Slider](http://script.aculo.us/ "http://script.aculo.us") |
| [Scriptaculous](http://script.aculo.us/ "http://script.aculo.us/") Sound |
| [Scriptaculous Controls](http://script.aculo.us/ "http://script.aculo.us") |
| [Scriptaculous](http://script.aculo.us/ "http://script.aculo.us") |
| [Prototype Framework](http://www.prototypejs.org/ "http://www.prototypejs.org/") |

__The list is far from complete.__ You can find a full list of included files in [wp-includes/script-loader.php](https://core.trac.wordpress.org/browser/trunk/src/wp-includes/script-loader.php).

# Handbook navigation

[← Linking Theme Files & Directories](https://developer.wordpress.org/themes/basics/linking-theme-files-directories/)[Conditional Tags →](https://developer.wordpress.org/themes/basics/conditional-tags/)