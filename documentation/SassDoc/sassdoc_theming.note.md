Introduction[§](#introduction)
------------------------------

SassDoc is fully themable. You can write your own theme for your projects, and publish it on [npm](https://www.npmjs.com/) so other people can use it too!

The easiest way for you to build a theme is to use the [Yeoman](http://yeoman.io/) generator. See [Theme Generator](/theme-generator/) to get started. You will be given the possibility to customize the theme to your needs based on prompts. It will output all the boilerplate files for you in a single command. Furthermore, the generated code is loaded with inline documentation so you don’t get lost.

**Tip!** You can also have a look at [sassdoc-theme-blank](https://github.com/SassDoc/sassdoc-theme-blank) which is a fully documented empty theme you can tweak.

Going manually[§](#going-manually)
----------------------------------

When you set the `--theme` option of the CLI interface, or the `config.theme` option to `foo`, SassDoc will search for a `sassdoc-theme-foo`, package, then `./foo`, and finally `foo`.

This means you can pass any path compatible with the `require` function as a theme. The only requirement is the theme file must expose a function implementing the following interface:

`    /** * @param {string} dest Directory to render theme in. * @param {object} ctx Variables to pass to the theme. * @return {promise} A Promises/A+ implementation. */module.exports = function (dest, ctx) {  /* ... */};`

You can find more informations on the Promises/A+ specification [here](http://promises-aplus.github.io/promises-spec/), but note the [`q` library](https://github.com/kriskowal/q) does a great job for this.

The [Themeleon](https://github.com/themeleon/themeleon) theming framework is compatible with this interface, and allows you to write themes without bothering with “low-level” considerations, like promises handling, raw `fs` calls, making sure the destination directory exists, etc.

**Note:** you can also add your own annotations by exporting an `annotations` array. See more on [Extending SassDoc](/extending-sassdoc/).

Theme Context[§](#theme-context)
--------------------------------

If you want to create your own theme, you’ll have to mess with the `ctx` object that will be passed to you. It contains the current project informations, the user’s configuration, and the parsed documentation data.

    {  
        // Raw data from configuration file passed to  
        // SassDoc's `--config` option (or API equivalent) are in top-level  
        // context.  
        package: {    
          // Raw data from the project's `package.json`, or a JSON file    
          // whose path was given in `view.package`, or an object directly    
          // defined in `view.package`.  
        },  
        theme: function (dest, ctx) {    
          // The theme function, probably a reference to **your** theme    
          // function if you're writing a theme. You can ignore it unless you    
          // want some kind of recursivity.  
        },  data: [    
          // Parsed documentation array described in Sassdoc Data Interface    
          // documentation page.  
        },}

Apart from these keys, users can put whatever they want in this object, via the SassDoc configuration file. You can use it to let the user configure your theme.

An example context object (without previous standard keys), assuming you use some [filters](/extra-tools/):

    {  display: {    access: ['public', 'private'],    alias: false,  },  groups: {    slug: 'Title',    helpers: 'Helpers',    hacks: 'Dirty Hacks & Fixes',    undefined: 'Ungrouped',  },}

Package[§](#package)
--------------------

[See official package.json reference](https://www.npmjs.org/doc/files/package.json.html).

**Note:** with the [Markdown filter](/extra-tools/#markdown), `package.description` will be parsed as Markdown.

Data[§](#data)
--------------

Refer to [Data Interface](/data-interface/).

Building the Theme[§](#building-the-theme)
------------------------------------------

We will use Themeleon to build a new theme with Swig template engine directly in in an existing project, and use it with SassDoc. Then, we will export this theme in it’s own npm package to make it available to the world!

**Note:** you are not required to use Swig. There's a lot of template engines available in Themeleon through [consolidate.js](https://github.com/tj/consolidate.js). Furthermore it's a breeze to write a Themeleon extension for your favorite template engine — or you can just use any node module in your render procedure without using a Themeleon helper.

First, you need to add the dependencies to your `package.json`:

    npm install --save themeleonnpm install --save swig

… or manually:

    {  "dependencies": {    "themeleon": "3.*",    "swig": "1.*"  }}

**Reminder:** don't forget to `npm install`!

Then, we create a `theme` directory _(you can call it as you want)_ in the root of your project. Assuming you already have a [configuration file](/customising-the-view/), and it’s at the same level as the `theme` directory, append this to it:

    theme: theme

You’re now telling SassDoc to search for a theme named `theme`. SassDoc will try to resolve it with the rules described in [Theme Configuration](/configuration/#theme).

When passing a directory to `require`, Node.js will search for an `index.js` file in it. Your theme module will therefore be in `theme/index.js`. If you call it differently, you’ll have to set the full file path in `theme`.

The module only have to expose a function implementing the interface described [above](#introduction). Themeleon will do this for you, and all you need to do is write a simple function describing the tasks to do to build the theme.

    var themeleon = require('themeleon')();

    // Create a theme
    // Tell the theme to use the `consolidate` extensionthemeleon.use('consolidate');
    // Themeleon needs to know the theme directory, hence

    `__dirname`module.exports = themeleon(\__dirname, function (t) {  

    // Copy `assets` in destination directory  t.copy('assets');  
    // Other name in destination directory  

    // t.copy('assets', 'foo');  
    // Compile a Swig view as `index.html` in destination directory  

    t.swig('views/index.html.swig', 'index.html');});

The next time you’ll render the documentation, your theme function will be called, copying the `assets` folder in the destination directory, and rendering your view in `index.html`.

The views are passed a couple of variables [documented here](/data-interface/).

**Tip:** to kick start your theme, be sure to check [SassDoc's blank theme](https://github.com/SassDoc/sassdoc-theme-blank), a theme with a basic directory structure, and loads of comments to help you understand how it works, and hack it to your own needs.

Packaging to the World[§](#packaging-to-the-world)
--------------------------------------------------

Now that your awesome theme is ready, you probably want to make it available to everybody as a `theme: your-theme` line in their configuration file.

To do this, create a `package.json` in your theme’s directory (the one containing the `index.js`). Give it a name (prefixed with `sassdoc-theme` in preference), a version, and be sure to require your dependencies:

    {
        "name": "sassdoc-theme-doge",  
        "version": "1.3.37",  
        "keywords": [    "sassdoc-theme"  ],  
        "dependencies": {
          "themeleon": "3.\*",
          "swig": "1.\*"  
        }
    }

It’s a good convention to use the `sassdoc-theme` keyword in you `package.json` which makes finding and listing SassDoc themes published on `npm` easier.

Then, run `npm publish` and you’re done!

**Note:** the last command will require you to setup an npm account. Run `npm adduser` if you haven't an account configured already.

Extra tools from SassDoc[§](#extra-tools-from-sassdoc)
------------------------------------------------------

SassDoc provides a couple of extra features to theme builders. Please refer to [relevant section](/extra-tools/)).

Extra tools from Swig[§](#extra-tools-from-swig)
------------------------------------------------

If you use Swig, you may want to include additional filters. An excellent collection of filters is included in `swig-extras`.

To add it to your theme, add `swig` and `swig-extras` as a dependency to your `package.json`. Then, in your `index.js`:

    var swig = new require('swig');var extras = require('swig-extras');

    // Moar filtersvar themeleon = require('themeleon')();
    // No change here
    // Use some additional

    filtersextras.useFilter(swig, 'nl2br');

    extras.useFilter(swig, 'split');
    extras.useFilter(swig, 'trim');
    extras.useFilter(swig, 'groupby');

    // Even add your own

    filtersswig.setFilter( 'push', function (arr, val) {

      return arr.push(val);
    });
    themeleon.use('consolidate');
    module.exports = themeleon(\__dirname, function (t) {  /\* ... \*/});



## DATA INTERFACE  


Introduction[§](#introduction)
------------------------------

SassDoc is doing quite a lot of things under the hood. In most cases, you won’t have to know anything about it but if you are willing to write your own theme, you might need to understand what’s going on. Especially, you’ll need to know what is being returned to the view so that you can actually write your templates.

**Clarification:** in the following examples, we are using C-style comments but it works exactly the same for inline comments as well. Please refer to the [Annotations](/annotations/) page for the syntax.

**Note:** you can run SassDoc in parse mode with the `--parse` CLI flag to output the data as JSON instead of generating a documentation directory.

Terminology[§](#terminology)
----------------------------

SassDoc uses the word “item” to describe either a variable, a function, a mixin or a placeholder. Technically speaking, an “item” is an object composed of:

*   a description defined at the top of the related documentation block comment, before any annotation;
*   a context, which is a sub-object containing the item’s name, its type (function, variable, mixin, placeholder), the lines at which it has been found in the file, and the its inner code (inside the declaration braces / variable content);
*   annotations: both those declared in the related documentation block comment, and those omitted with a default value.

    {  
      description: '',  
      context: {  
        name: '',  
        type: '',  
        code: '',  
        line: {
          start: 0,  
          end: 0,
        },  
      },  
      access: ['public'],  
      group: ['undefined'],  
    }

Sorting[§](#sorting)
--------------------

SassDoc will collect all these item in an array and sort them by group, alphabetic file path, and position in file.

`    [  { /* Item */ },  { /* Item */ },]`

@access[§](#access)
-------------------

Will just return the string after the annotation as the access level.

    /// @access private

An item will look like this:

`    {  /* ... */  access: 'private',  /* ... */}`

@alias[§](#alias)
-----------------

Will list the alias in the `alias` key and add the alias item to the `aliased` key in the referenced item.

`    /// @alias other-item  
    @mixin alias-for-other-item() { /* ... */ }`

Item `alias-for-other-item`:

`    {  /* ... */  alias: 'other-item',  /* ... */}`

Item `other-item` will look like this:

`    {  /* ... */  aliased: [{    /* ... */    alias: ['alias-for-other-item'],    /* ... */  }]  /* ... */}`

@author[§](#author)
-------------------

    /// @author Fabrice Weinberg

An item will look like this:

`    {  /* ... */  author: ['Fabrice Weinberg'],  /* ... */}`

@content[§](#content)
---------------------

    /// @content The `@content` directive allows user ...

An item will look like this:

`    {  /* ... */  content: 'The `@content` dirctive allows user ...',  /* ... */}`

@deprecated[§](#deprecated)
---------------------------

    /// @deprecated No longer in use

An item will look like this:

`    {  /* ... */  deprecated: 'No longer in use',  /* ... */}`

@example[§](#example)
---------------------

    /// @example scss - basic usage///   clamp(42, $min: 13, $max: 37)///   // 37

An item will look like this:

`    {  /* ... */  example: [{    'type': 'scss',    'description': 'basic usage',    'code': 'clamp(42, $min: 13, $max: 37)\n // 37',  }],  /* ... */}`

@group[§](#group)
-----------------

    /// @group Groupname

An item will look like this:

`    {  /* ... */  group: ['Groupname'],  /* ... */}`

@ignore[§](#ignore)
-------------------

This line will be just ignored.

    /// @ignore Ignore the line

An item will look like this:

`    {  /* ... */  ignore: [],  /* ... */}`

@link (synonym: @source)[§](#link-synonym-source)
-------------------------------------------------

    /// @link http://example.com Caption

An item will look like this:

`    {  /* ... */  link: [{    'url': 'http://example.com',    'caption': 'Caption',  }],  /* ... */}`

@output (synonym: @outputs)[§](#output-synonym-outputs)
-------------------------------------------------------

    /// @output Description of output styles

An item will look like this:

`    {  /* ... */  output: 'Description of output styles',  /* ... */}`

@parameter (synonyms: @param, @arg, @argument)[§](#parameter-synonyms-param-arg-argument)
-----------------------------------------------------------------------------------------

    /// @param {type} $name [default value] - description

An item will look like this:

`    {  /* ... */  parameter: [{    'type': 'type',    'name': 'name',    'default': 'default value',    'description': 'description',  }],  /* ... */}`

@property (synonym: @prop)[§](#property-synonym-prop)
-----------------------------------------------------

    /// @prop {Function} base.default [default] - description

`    {  /* ... */  property: [{     'type': 'Function',     'path': 'base.default',     'default': 'default',     'description': 'description',   }],  /* ... */}`

@require (synonym: @requires)[§](#require-synonym-requires)
-----------------------------------------------------------

The required item will automatically have a key named `usedBy` containing the whole referencing item.

    /// @require {type} item - description <link>

An item will look like this:

`    {  /* ... */  require: [{    'type': 'type',    'name': 'item',    'url': '<link>',    'description': 'description',    'item': { /* The whole required item */ },  }],  /* ... */}`

The referenced item will have a `usedBy` key that looks like:

`    {  /* ... */  usedBy: [{ /* The whole referencing item */ }],  /* ... */}`

@return (synonym: @returns)[§](#return-synonym-returns)
-------------------------------------------------------

    /// @return {type} description

An item will look like this:

`    {  /* ... */  'return': {    type: 'type',    description: 'description',  },  /* ... */}`

@since[§](#since)
-----------------

Describes the version at which the documented item has been implemented or updated.

    /// @since version description

An item will look like this:

`    {  /* ... */  since: [{    version: 'version',    description: 'description',  }],  /* ... */}`

@throw (synonym: @throws, @exception)[§](#throw-synonym-throws-exception)
-------------------------------------------------------------------------

    /// @throw Error related message

An item will look like this:

`    {  /* ... */  'throw': ['Error related message'],  /* ... */}`

@todo[§](#todo)
---------------

    /// @todo Task to be done

An item will look like this:

`    {  /* ... */  todo: ['Task to be done'],  /* ... */}`

@type[§](#type)
---------------

    /// @type bool | string

An item will look like this:

`    {  /* ... */  type: 'bool | string',  /* ... */}`



---

## EXTENDING THEMES

Introduction[§](#introduction)
------------------------------

SassDoc allows you to define custom annotations. This can only be done from a [custom theme](/using-your-own-theme/) since there is no way for SassDoc to guess what to do or how those annotations should be displayed.

Here’s a simple example to add a few simple annotations to SassDoc within your theme. First, you’ll have the usual theme function. Refer to [Using Your Own Theme](/using-your-own-theme/) for more informations about this.

    module.exports = function () {  // Usual theme function};

Then, you will export an annotations array to extend SassDoc.

    module.exports.annotations = [];

Schema[§](#schema)
------------------

Each annotation is a function that returns an object with a `name` property, a `parse` method, and optionally `resolve`, `default` and `autofill` methods and well as an `alias` array and a `multiple` boolean.

|   Key  Type  Description   

|   `name`  string  Name of the annotation.   
|   `parse`  function  Takes the annotation content as parameter and returns the parsed data (can be of any type — it will be available in the theme as `item.<annotationName>`, as an array if `multiple` is `true`).   
|   `resolve`  function  Called after the raw data is generated, where the whole SassDoc data is being passed (indexed by type and name). You can then modify this object reference as you want to complete your data structure while having access to the whole data.   
|   `default`  function  Returns a default value when — if ever — the annotation is not present.   
|   `autofill`  function  Takes a parsed annotation object. You can modify this object reference as you want while having access to the whole parsed content of the current annotation.   
|   `multiple`  boolean   Indicates if this annotation is allowed multiple times per item (default is `true`).   
|   `alias`  array  Array of aliases for the annotation.   

Examples[§](#examples)
----------------------

We can add an `@awesome` annotation (meaning the annotated item is awesome) (also aliased as `@wow`). This annotation is just meant to be applied as-is, without any argument. You can then add a condition on `item.awesome` in your templates!

    module.exports.annotations.push(function () {  return {    name: 'awesome',    parse: function () { return true; },    default: function (comment) { return false; },    autofill: function (comment) {},    multiple: false,    alias: ['wow']  };});

Then, a `@friend` annotation to mark an item as “friend”, for example:

    /// @friend {function} foo/// @friend {variable} bar

In your templates, `item.friend` will be an array of references to the “friends” items.

    module.exports.annotations.push(function () {
      return {
        name: 'friend',
        parse: function (text) {
          var match = /^\{(.\*)\}\s*(.\*)$/.exec(text.trim());
          return {
            type: match[1],
            name: match[2],
          };
        },
        resolve: function (data) {
          Object.keys(data).forEach(function (type) {
            Object.keys(data[type]).forEach(function (name) {

              var item = data[type][name];

              if (!item.friend) {
                return;
              }

              item.friend.map(function (friend) {  
                return data[friend.type][friend.name];  
              } );
            } );
          } );
       } };
    } );

For more examples, you can look at [the core annotations](https://github.com/SassDoc/sassdoc/tree/master/src/annotation/annotations) which are very insightful.
