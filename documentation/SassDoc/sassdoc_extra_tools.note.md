Introduction[§](#introduction)
------------------------------

If you have embarked upon the task of building your own theme, you’ll be pleased to know SassDoc comes with some [extra tools](https://github.com/SassDoc/sassdoc-extras) for theme builders. These filters add some features to SassDoc by post-processing the data.

Extras can be added by requiring `sassdoc-extras`, calling the extra function on it, and passing it the context object. For example, to use the [Markdown](#markdown) extra:

    var extras = require('sassdoc-extras');

    // Your theme function
    module.exports = function (dest, ctx) {  // ...  
      extras.markdown(ctx);
    };

To use multiple extras, you can “chain” them like this:

    extras(ctx, 'markdown', 'display', 'shortcutIcon');

Markdown (`markdown`)[§](#markdown-markdown)
--------------------------------------------

You may have noticed most descriptions from annotations are parsed as Markdown. This is thanks to the Markdown filter from [sassdoc-extras](https://github.com/SassDoc/sassdoc-extras) (using [Marked](https://github.com/chjj/marked)). This filter overrides the provided values.

For example, ``This is some `code`.`` becomes `This is some <code>code</code>`.

Display toggle (`display`)[§](#display-toggle-display)
------------------------------------------------------

The `display` filter allows you to display items based on their visibility (access level: `public` or `private`). This filter removes items that should not be displayed.

The `display` filter uses the `display.access` key from the context configuration to determine if an item should be displayed or not.

**Note:** it’s always best to define an access level.

    {
      display: {
        access: ['private', 'public'],  
      },
    }

Groups aliases (`groupName`)[§](#groups-aliases-groupname)
----------------------------------------------------------

The `groupName` filter allows you to define aliases for group slugs (see [reference](/configuration/#groups)). When using `@group` annotation in your SassDoc comments, you usually define a slug (a lowercase string without spaces). If you want your theme to display pretty titles, you can map those slugs to human-friendly names by setting a `groups` key in your context configuration.

    {
      groups: {
        undefined: 'Private',
        api: 'API',    
        hacks: 'Dirty Hacks & Fixes',  
      },
    }

**Note:** The `groupName` filter overrides the default `group` key for each item.

Example: Default `group` key:

    {  
      'group': ['hacks'],
    }

Example: After using `groupName` filter:

    {  
      'group': {
        'hacks': 'Dirty Hacks & Fixes'
      },
    }

Shortcut icon (`shortcutIcon`)[§](#shortcut-icon-shortcuticon)
--------------------------------------------------------------

The `shortcutIcon` filter takes the eponymous key from the configuration and converts it into an object with `type`, `url` and `path` keys.

Result of using a URL `http://absolute.path/to/icon.png` in `ctx.shortcutIcon`:

    {  
      type: 'external',  
      url: 'http://absolute.path/to/icon.png',
    }

Result of using a relative path `relative/path/to/icon.png` in `ctx.shortcutIcon`:

    {  
      type: 'internal',  
      url: 'icon.png',  
      path: '/complete/relative/path/to/icon.png',
    }


Sort (`sort`)[§](#sort-sort)
----------------------------

The `sort` filter sorts the items from a `sort` configuration value.

Supported criteria:

*   [`group`](/configuration/#groups)
*   `file`
*   [`line`](/annotations/#comment-range)
*   [`access`](/annotations/#access)

The sort order is determined by the last character: `>` (desc) _or_ `<` (asc).

    {  
      sort: [  
        'access',  
        'line>',  
        'group',  
        'file',  
      ],
    }

Description (`description`, `descriptionPath`)[§](#description-description-descriptionpath)
-------------------------------------------------------------------------------------------

This filter introduces the `description` and `descriptionPath` configuration keys.

The `description` key contains raw description text.
The `descriptionPath` contains the path to a file containing the description.

**Note:** using `descriptionPath` will override the `description` key.

    {  
      descriptionPath: '../README.md',
    }

The `descriptionPath` is relative to the configuration file, and has no required format.

**Note:** if the `markdown` filter is called **after** the `description` filter, it will parse the description value as Markdown.

Resolved variables (`resolveVariables`)[§](#resolved-variables-resolvevariables)
--------------------------------------------------------------------------------

The `resolveVariables` filter attempts to connect aliased variable to their original value. This might be useful for previewing certain types of values, e.g. colors. Variable aliases can be used in different contexts: variables, map properties, mixin and function parameters. While the original value is left untouched there’s a new `resolvedValue` key being added.


    /// Blue
    /// @type Color  
    $color-blue: #22b8dc;

    /// Main color
    /// @type Color
    $color-main: $color-blue;

    /// Map of colors.
    /// @prop {Color} main [$color-blue] - main color
    /// @type Map
    $colors: (  'main': $color-blue,);

    /// Example mixin.
    /// @param {Color}
    $color [$color-main] - configurable background color
    @mixin foobar($color: $color-main) { ... }

Example: default data for a variable item.

    {  
      "description": "<p>Blue</p>\n",
        "context": {    
          "type": "variable",    
          "name": "color-blue",    
          "value": "#22b8dc"  
        },
        "type": "Color"
    },{
      "description": "<p>Main color</p>\n",
         context": {    
          "type": "variable",    
          "name": "color-main",    
          "value": "$color-blue"  
        },
        "type": "Color"
      }

Example: result after using the `resolveVariables` filter.

    {  
      "description": "<p>Blue</p>\n",
      "context": {    
        "type": "variable",    
        "name": "color-blue",    
        "value": "#22b8dc"  
      },
      "type": "Color",
      "resolvedValue": "#22b8dc"
    },{
      "description": "<p>Main color</p>\n",  
      "context": {    
        "type": "variable",    
        "name": "color-main",    
        "value": "$color-blue"  
      },
      "type": "Color",  
      "resolvedValue": "#22b8dc"
    }



## THEME GENERATOR  

Features[§](#features)
----------------------

[Yeoman](http://yeoman.io) generator that scaffolds out a SassDoc theme.

*   Let you chose your preferred template engine.
*   Build the theme views and `index.js` based on prompts.
*   Default Sass starter structure.
*   Let you use a pre-defined Grunt or Gulp workflow.
*   Templates loaded with examples and comments.

Usage[§](#usage)
----------------

Install `generator-sassdoc-theme`:


    npm install -g generator-sassdoc-theme


Make a new theme directory, and `cd` into it:


    mkdir my-new-theme && cd $_


Run `yo sassdoc-theme`, optionally passing a theme name:

    yo sassdoc-theme [options] [<theme-name>]

Options[§](#options)
--------------------

*   `--init`: Force to prompt question and re-initialize `.yo-rc.json`.
*   `--skip-install`: Skips the automatic execution of `npm` after scaffolding has finished.
*   `--theme-engine=[engine]`: Template engine (defaults to `swig`). Supported engines: `jade`, `swig`, `nunjucks`, `handlebars`

Sub generators[§](#sub-generators)
----------------------------------

`generator-sassdoc-theme` is divided into sub-generators, hence you have to possibility to call them directly in cases where you would like a certain functionality without bootstraping a full theme generation.

Views: generates `index.js` and views templates. Example:

    yo sassdoc-theme:jade

Task runners: generates `Gruntfile.js` or `Gulpfile.js` and `package.json`. Example:

    yo sassdoc-theme:grunt

**Caution!** Running a sub-generator on an existing theme will override the corresponding files. Although Yeoman will prompt you for confirmation before doing so.
