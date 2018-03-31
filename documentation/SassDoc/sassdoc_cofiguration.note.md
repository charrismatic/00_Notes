[Introduction](#introduction)
------------------------------

Aside from regular [configuration](/configuration/) from SassDoc itself, it is likely that the theme you use provides some kind of default configuration that you can overload.

This is done exactly like the regular configuration, within the same configuration file. Please refer to the [configuration documentation](/configuration/) to learn how to specify a configuration file.

[Options](#options)
--------------------

[SassDoc’s default theme](https://github.com/SassDoc/sassdoc-theme-default) has a couple of options to give you some extra power over the view.

|   Option  Type  Default   

|   `display.access`  Array  `["public", "private"]`   
|   `display.alias`  Boolean  `false`   
|   `display.watermark`  Boolean  `true`   
|   `basePath`  String  —   
|   `shortcutIcon`  String  —   
|   `googleAnalytics`  String  —   
|   `trackingCode`  String  —   
|   `sort`  Array  —   
|   `description`  String  —   
|   `descriptionPath`  String  —   
|   `privatePrefix`  Regex  `^[_-]`   

Visibility display[§](#visibility-display)
------------------------------------------

The `display.access` option lists access levels that are being displayed, default is all (both `public` and `private`). If you don’t want to display `private` items, you can remove it from the array, like so:

    display:  access:    - public

Alias display[§](#alias-display)
--------------------------------

The `display.alias` option defines whether or not aliases should be displayed. Default value is `false`, meaning that aliases items are not displayed in the docs. They are documented and exist in the raw data, but are simply not displayed.

If you want to display aliases as well, change the value to `true`.

    display:  alias: true

Watermark display[§](#watermark-display)
----------------------------------------

The default theme from SassDoc displays a discret _© Made with love by [SassDoc](https://github.com/SassDoc) team._ in the footer, in order to promote the tool and share the love. You can turn off this watermak if you like, but we would really appreciate you to leave it if you use this theme.

    display:  watermark: false

Along the same lines, if you build your own theme, adding a little mention to SassDoc somewhere on the page would be very nice of you!

Base path[§](#base-path)
------------------------

The `basePath` option is used to provide a _View source_ link to each item in case the code is hosted on a public repository. By setting the option to the base path of your repository, and thanks to SassDoc’s parser keeping track of the file name, the path and the lines number, we are able to build links such as:

    https://github.com/sassdoc/sassdoc-theme-default/tree/master/scss/utils/_functions.scss#L13-L37


**Caution!** as you can see from the previous example, GitHub adds `/tree/master` or `/blob/<branch_name>` between the base path and the file path. To prevent your links from being broken, set your base path to: `https://github.com/USERNAME/REPOSITORY/tree/master` (or `/blob/<branch_name>`).

Shortcut icon[§](#shortcut-icon)
--------------------------------

The `shortcutIcon` option can be used to provide a favicon to your documentation. It accepts a path, either relative or absolute.

    shortcutIcon: assets/images/favicon.png

Google Analytics[§](#google-analytics)
--------------------------------------

If you are using Google Analytics to track users behaviour on your site, you can set your Google Analytics tracking key as a value for the `googleAnalytics` key.

    googleAnalytics: UA-XXXXX-YY

Tracking code[§](#tracking-code)
--------------------------------

In case you don’t use Google Analytics, or use a custom tracking code snippet, you can set it as a value to the `trackingCode` option. It will be directly injected in the DOM as HTML, so be sure to include `<script>` and `</script>` tags if you need them.

    trackingCode: |  <img src="http://piwik.example.org/piwik.php?idsite={$IDSITE}amp;rec=1" style="border:0" alt="" />

**Note:** in YAML, you can leave a single pipe on the first line to indicate that the everything until the next key is a literal string.

**Beware!** This is a possible door to JavaScript code injection. Be careful.

Sort[§](#sort)
--------------

You can customize the order of your items with this option.

Supported criteria are:

*   [`group`](/configuration/#groups)
*   `file`
*   [`line`](/annotations/#comment-range)
*   [`access`](/annotations/#access)

The `sort` context key is an array of strings, representing a sort criteria plus an optional sort order. The sort order is determined if the last character is either `>` or `<` (respectively desc and asc).

    sort:  - access  - line>  - group  - file

This will sort the data by access (public first, then private, `access>` would have inverted the order), then by descending line (last items in the file first), then by alphetical group (case insensitive), then by file.

Description[§](#description)
----------------------------

You can define a complete description of your project (unlike `package.description` which is a short overview). It is parsed as Markdown.

    description: |  This is the description of the project!  * It is parsed as markdown.  * It is displayed in your documentation page.

Description path[§](#description-path)
--------------------------------------

If you prefer to externalize the description in a file, you can use the `descriptionPath` option, which will populate (or overwrite) the `description` option. It is relative to the configuration file, and parsed as Markdown.

    descriptionPath: ../README.md

Example[§](#example)
--------------------

Here’s a JSON example:

    {
      "basePath": "https://github.com/SassDoc/sassdoc",
      "shortcutIcon": "assets/images/favicon.png",
      "display": {
        "access": ["public", "private"],    
        "alias": false,    
        "watermark": true  
      },  
      "package": "./package.json",
      "theme": "default",
      "groups": {
        "undefined": "General"  
      },  
      "googleAnalytics": "UA-XXXXX-YY",
      "tracking": "<img src=\"http://piwik.example.org/piwik.php?idsite={$IDSITE}amp;rec=1\" style=\"border:0\" alt=\"\" />"
    }

And the same configuration in YAML:

    basePath: https://github.com/SassDoc/sassdoc
    shortcutIcon: assets/images/favicon.png
    display:
      access: - public  - private    
      alias: false   
      watermark: true
    package: ./package.json
    theme: default
    groups:
      undefined: General
    googleAnalytics: UA-XXXXX-YY
    tracking: |  <img src="http://piwik.example.org/piwik.php?idsite={$IDSITE}amp;rec=1" style="border:0" alt="" />




Private Prefix[§](#private-prefix)
----------------------------------

It is common practice to prefix so called _private_ items by an underscore (`_`) in languages that do not provide a way to have actual private members in order to indicate they are internal tools not meant to be used as part of the public API.

Adding to this, Sass treats hyphens and underscores exactly the same in identifiers, so `_foo` and `-foo` are equivalent when it comes to a functions, mixins and variables name (not for placeholders though, which behave more like CSS classes where `_` and `-` are not the same).

When applied to SassDoc, it means that SassDoc will automatically assume that an item is private (i.e. `@access private`) if it starts with an hyphen or an underscore. You can configure this with the `privatePrefix` option.

When set to `false`, it intimates SassDoc not to assume anything. On the other hand, if a regular expression is given (default is `^[_-]`), SassDoc will assume the item is private if its name matches.

    privatePrefix: ^[_-]
