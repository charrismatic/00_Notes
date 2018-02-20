# Creating a Syntax Highlighter for Ace

Creating a new syntax highlighter for Ace is extremely simple. You'll need to define two pieces of code: a new mode, and a new set of highlighting rules.

## [**](https://ace.c9.io/#where-to-start)Where to Start

We recommend using the [Ace Mode Creator](https://ace.c9.io/tool/mode_creator.html) when defining your highlighter. This allows you to inspect your code's tokens, as well as providing a live preview of the syntax highlighter in action.

## [**](https://ace.c9.io/#defining-a-mode)Defining a Mode

Every language needs a mode. A mode contains the paths to a language's syntax highlighting rules, indentation rules, and code folding rules. Without defining a mode, Ace won't know anything about the finer aspects of your language.

Here is the starter template we'll use to create a new mode:

```
define(function(require, exports, module) {

"use strict";



var oop = require("../lib/oop");

// defines the parent mode

var TextMode = require("./text").Mode;

var Tokenizer = require("../tokenizer").Tokenizer;

var MatchingBraceOutdent = require("./matching_brace_outdent").MatchingBraceOutdent;



// defines the language specific highlighters and folding rules

var MyNewHighlightRules = require("./mynew_highlight_rules").MyNewHighlightRules;

var MyNewFoldMode = require("./folding/mynew").MyNewFoldMode;



var Mode = function() {

    // set everything up

    this.HighlightRules = MyNewHighlightRules;

    this.$outdent = new MatchingBraceOutdent();

    this.foldingRules = new MyNewFoldMode();

};

oop.inherits(Mode, TextMode);



(function() {

    // configure comment start/end characters

    this.lineCommentStart = "//";

    this.blockComment = {start: "/*", end: "*/"};

    

    // special logic for indent/outdent. 

    // By default ace keeps indentation of previous line

    this.getNextLineIndent = function(state, line, tab) {

        var indent = this.$getIndent(line);

        return indent;

    };



    this.checkOutdent = function(state, line, input) {

        return this.$outdent.checkOutdent(line, input);

    };



    this.autoOutdent = function(state, doc, row) {

        this.$outdent.autoOutdent(doc, row);

    };

    

    // create worker for live syntax checking

    this.createWorker = function(session) {

        var worker = new WorkerClient(["ace"], "ace/mode/mynew_worker", "NewWorker");

        worker.attachToDocument(session.getDocument());

        worker.on("errors", function(e) {

            session.setAnnotations(e.data);

        });

        return worker;

    };

    

}).call(Mode.prototype);



exports.Mode = Mode;

});

```

What's going on here? First, you're defining the path to `TextMode` (more on this later). Then you're pointing the mode to your definitions for the highlighting rules, as well as your rules for code folding. Finally, you're setting everything up to find those rules, and exporting the Mode so that it can be consumed. That's it!

Regarding `TextMode`, you'll notice that it's only being used once: `oop.inherits(Mode, TextMode);`. If your new language depends on the rules of another language, you can choose to inherit the same rules, while expanding on it with your language's own requirements. For example, PHP inherits from HTML, since it can be embedded directly inside *.html* pages. You can either inherit from `TextMode`, or any other existing mode, if it already relates to your language.

All Ace modes can be found in the *lib/ace/mode* folder.

## [**](https://ace.c9.io/#defining-syntax-highlighting-rules)Defining Syntax Highlighting Rules

The Ace highlighter can be considered to be a state machine. Regular expressions define the tokens for the current state, as well as the transitions into another state. Let's define *mynew_highlight_rules.js*, which our mode above uses.

All syntax highlighters start off looking something like this:

```
define(function(require, exports, module) {

"use strict";



var oop = require("../lib/oop");

var TextHighlightRules = require("./text_highlight_rules").TextHighlightRules;



var MyNewHighlightRules = function() {



    // regexp must not have capturing parentheses. Use (?:) instead.

    // regexps are ordered -> the first match is used

   this.$rules = {

        "start" : [

            {

                token: token, // String, Array, or Function: the CSS token to apply

                regex: regex, // String or RegExp: the regexp to match

                next:  next   // [Optional] String: next state to enter

            }

        ]

    };

};



oop.inherits(MyNewHighlightRules, TextHighlightRules);



exports.MyNewHighlightRules = MyNewHighlightRules;



});

```

The token state machine operates on whatever is defined in `this.$rules`. The highlighter always begins at the `start` state, and progresses down the list, looking for a matching `regex`. When one is found, the resulting text is wrapped within a `<span class="ace_<token>">` tag, where `<token>` is defined as the `token` property. Note that all tokens are preceded by the `ace_` prefix when they're rendered on the page.

Once again, we're inheriting from `TextHighlightRules` here. We could choose to make this any other language set we want, if our new language requires previously defined syntaxes. For more information on extending languages, see "[extending Highlighters](https://ace.c9.io/#extending-highlighters)" below.

### [**](https://ace.c9.io/#defining-tokens)Defining Tokens

The Ace highlighting system is heavily inspired by the [TextMate language grammar](http://manual.macromates.com/en/language_grammars). Most tokens will follow the conventions of TextMate when naming grammars. A thorough (albeit incomplete) list of tokens can be found [on the Ace Wiki](https://github.com/ajaxorg/ace/wiki/Creating-or-Extending-an-Edit-Mode#wiki-commonTokens).

For the complete list of tokens, see *tool/tmtheme.js*. It is possible to add new token names, but the scope of that knowledge is outside of this document.

Multiple tokens can be applied to the same text by adding dots in the token, *e.g.* `token: support.function` wraps the text in a `<span class="ace_support ace_function">` tag.

### [**](https://ace.c9.io/#defining-regular-expressions)Defining Regular Expressions

Regular expressions can either be a RegExp or String definition

If you're using a regular expression, remember to start and end the line with the `/` character, like this:

```
{

    token : "constant.language.escape",

    regex : /\$[\w\d]+/

}

```

A caveat of using stringed regular expressions is that any `\` character must be escaped. That means that even an innocuous regular expression like this:

```
regex: "function\s*\(\w+\)"

```

Must actually be written like this:

```
regex: "function\\s*\(\\w+\)"

```

#### [**](https://ace.c9.io/#groupings)Groupings

You can also include flat regexps--`(var)`--or have matching groups--`((a+)(b+))`. There is a strict requirement whereby matching groups **must** cover the entire matched string; thus, `(hel)lo` is invalid. If you want to create a non-matching group, simply start the group with the `?:` predicate; thus, `(hel)(?:lo)` is okay. You can, of course, create longer non-matching groups. For example:

```
{

    token : "constant.language.boolean",

    regex : /(?:true|false)\b/

},

```

For flat regular expression matches, `token` can be a String, or a Function that takes a single argument (the match) and returns a string token. For example, using a function might look like this:

```
var colors = lang.arrayToMap(

    ("aqua|black|blue|fuchsia|gray|green|lime|maroon|navy|olive|orange|" +

    "purple|red|silver|teal|white|yellow").split("|")

);



var fonts = lang.arrayToMap(

    ("arial|century|comic|courier|garamond|georgia|helvetica|impact|lucida|" +

    "symbol|system|tahoma|times|trebuchet|utopia|verdana|webdings|sans-serif|" +

    "serif|monospace").split("|")

);



...



{

    token: function(value) {

        if (colors.hasOwnProperty(value.toLowerCase())) {

            return "support.constant.color";

        }

        else if (fonts.hasOwnProperty(value.toLowerCase())) {

            return "support.constant.fonts";

        }

        else {

            return "text";

        }

    },

    regex: "\\-?[a-zA-Z_][a-zA-Z0-9_\\-]*"

}

```

If `token` is a function,it should take the same number of arguments as there are groups, and return an array of tokens.

For grouped regular expressions, `token` can be a String, in which case all matched groups are given that same token, like this:

```
{

    token: "identifier",

    regex: "(\\w+\\s*:)(\\w*)"

}

```

More commonly, though, `token` is an Array (of the same length as the number of groups), whereby matches are given the token of the same alignment as in the match. For a complicated regular expression, like defining a function, that might look something like this:

```
{

    token : ["storage.type", "text", "entity.name.function"],

    regex : "(function)(\\s+)([a-zA-Z_][a-zA-Z0-9_]*\\b)"

}

```

## [**](https://ace.c9.io/#defining-states)Defining States

The syntax highlighting state machine stays in the `start` state, until you define a `next` state for it to advance to. At that point, the tokenizer stays in that new `state`, until it advances to another state. Afterwards, you should return to the original `start` state.

Here's an example:

```
this.$rules = {

    "start" : [ {

        token : "text",

        regex : "<\\!\\[CDATA\\[",

        next : "cdata"

    } ],



    "cdata" : [ {

        token : "text",

        regex : "\\]\\]>",

        next : "start"

    }, {

        defaultToken : "text"

    } ]

};

```

In this extremely short sample, we're defining some highlighting rules for when Ace detects a `<![CDATA` tag. When one is encountered, the tokenizer moves from `start` into the `cdata` state. It remains there, applying the `text` token to any string it encounters. Finally, when it hits a closing `]>` symbol, it returns to the `start` state and continues to tokenize anything else.

## Using the TMLanguage Tool

There is a tool that will take an existing *tmlanguage* file and do its best to convert it into Javascript for Ace to consume. Here's what you need to get started:

1. In the Ace repository, navigate to the *tools* folder.
2. Run `npm install` to install required dependencies.
3. Run `node tmlanguage.js <path_to_tmlanguage_file>`; for example, `node <path_to_tmlanguage_file> /Users/Elrond/elven.tmLanguage`

Two files are created and placed in *lib/ace/mode*: one for the language mode, and one for the set of highlight rules. You will still need to add the code into *ace/ext/modelist.js*, and add a sample file for testing.

### [**](https://ace.c9.io/#a-note-on-accuracy)A Note on Accuracy

Your *.tmlanguage* file will then be converted to the best of the converter’s ability. It is an understatement to say that the tool is imperfect. Probably, language mode creation will never be able to be fully autogenerated. There's a list of non-determinable items; for example:

- The use of regular expression lookbehinds
  This is a concept that JavaScript simply does not have and needs to be faked
- Deciding which state to transition to
  While the tool does create new states correctly, it labels them with generic terms like `state_2`, `state_10`, *e.t.c.*
- Extending modes
  Many modes say something like `include source.c`, to mean, “add all the rules in C highlighting.” That syntax does not make sense to Ace or this tool (though of course you can [extending existing highlighters](https://ace.c9.io/extension-development-resources/guides/extending_highlighters.html)).
- Rule preference order
- Gathering keywords
  Most likely, you’ll need to take keywords from your language file and run them through `createKeywordMapper()`

However, the tool is an excellent way to get a quick start, if you already possess a *tmlanguage* file for you language.

## Extending Highlighters

Suppose you're working on a LuaPage, PHP embedded in HTML, or a Django template. You'll need to create a syntax highlighter that takes all the rules from the original language (Lua, PHP, or Python) and extends it with some additional identifiers (`<?lua`, `<?php`, `{%`, for example). Ace allows you to easily extend a highlighter using a few helper functions.

### [**](https://ace.c9.io/#getting-existing-rules)Getting Existing Rules

To get the existing syntax highlighting rules for a particular language, use the `getRules()` function. For example:

```
var HtmlHighlightRules = require("./html_highlight_rules").HtmlHighlightRules;



this.$rules = new HtmlHighlightRules().getRules();



/*

    this.$rules == Same this.$rules as HTML highlighting

*/

```

### [**](https://ace.c9.io/#extending-a-highlighter)Extending a Highlighter

The `addRules` method does one thing, and it does one thing well: it adds new rules to an existing rule set, and prefixes any state with a given tag. For example, let's say you've got two sets of rules, defined like this:

```
this.$rules = {

    "start": [ /* ... */ ]

};



var newRules = {

    "start": [ /* ... */ ]

}

```

If you want to incorporate `newRules` into `this.$rules`, you'd do something like this:

```
this.addRules(newRules, "new-");



/*

    this.$rules = {

        "start": [ ... ],

        "new-start": [ ... ]

    };

*/

```

### [**](https://ace.c9.io/#extending-two-highlighters)Extending Two Highlighters

The last function available to you combines both of these concepts, and it's called `embedRules`. It takes three parameters:

1. An existing rule set to embed with
2. A prefix to apply for each state in the existing rule set
3. A set of new states to add

Like `addRules`, `embedRules` adds on to the existing `this.$rules` object.

To explain this visually, let's take a look at the syntax highlighter for Lua pages, which combines all of these concepts:

```
var HtmlHighlightRules = require("./html_highlight_rules").HtmlHighlightRules;

var LuaHighlightRules = require("./lua_highlight_rules").LuaHighlightRules;



var LuaPageHighlightRules = function() {

    this.$rules = new HtmlHighlightRules().getRules();



    for (var i in this.$rules) {

        this.$rules[i].unshift({

            token: "keyword",

            regex: "<\\%\\=?",

            next: "lua-start"

        }, {

            token: "keyword",

            regex: "<\\?lua\\=?",

            next: "lua-start"

        });

    }

    this.embedRules(LuaHighlightRules, "lua-", [

        {

            token: "keyword",

            regex: "\\%>",

            next: "start"

        },

        {

            token: "keyword",

            regex: "\\?>",

            next: "start"

        }

    ]);

};

```

Here, `this.$rules` starts off as a set of HTML highlighting rules. To this set, we add two new checks for `<%=` and `<?lua=`. We also delegate that if one of these rules are matched, we should move onto the `lua-start` state. Next, `embedRules` takes the already existing set of `LuaHighlightRules` and applies the `lua-` prefix to each state there. Finally, it adds two new checks for `%>` and `?>`, allowing the state machine to return to `start`.

### Code Folding

Adding new folding rules to your mode can be a little tricky. First, insert the following lines of code into your mode definition:

```
var MyFoldMode = require("./folding/newrules").FoldMode;



...

var MyMode = function() {



    ...



    this.foldingRules = new MyFoldMode();

};

```

You'll be defining your code folding rules into the *lib/ace/mode/folding* folder. Here's a template that you can use to get started:

```
define(function(require, exports, module) {

"use strict";



var oop = require("../../lib/oop");

var Range = require("../../range").Range;

var BaseFoldMode = require("./fold_mode").FoldMode;



var FoldMode = exports.FoldMode = function() {};

oop.inherits(FoldMode, BaseFoldMode);



(function() {



    // regular expressions that identify starting and stopping points

    this.foldingStartMarker; 

    this.foldingStopMarker;



    this.getFoldWidgetRange = function(session, foldStyle, row) {

        var line = session.getLine(row);



        // test each line, and return a range of segments to collapse

    };



}).call(FoldMode.prototype);



});

```

Just like with `TextMode` for syntax highlighting, `BaseFoldMode` contains the starting point for code folding logic. `foldingStartMarker` defines your opening folding point, while `foldingStopMarker` defines the stopping point. For example, for a C-style folding system, these values might look like this:

```
this.foldingStartMarker = /(\{|\[)[^\}\]]*$|^\s*(\/\*)/;

this.foldingStopMarker = /^[^\[\{]*(\}|\])|^[\s\*]*(\*\/)/;

```

These regular expressions identify various symbols--`{`, `[`, `//`--to pay attention to. `getFoldWidgetRange` matches on these regular expressions, and when found, returns the range of relevant folding points. For more information on the `Range` object, see [the Ace API documentation](https://ace.c9.io/#nav=api&api=range).

Again, for a C-style folding mechanism, a range to return for the starting fold might look like this:

```
var line = session.getLine(row);

var match = line.match(this.foldingStartMarker);

if (match) {

    var i = match.index;



    if (match[1])

        return this.openingBracketBlock(session, match[1], row, i);



    var range = session.getCommentFoldRange(row, i + match[0].length);

    range.end.column -= 2;

    return range;

}

```

Let's say we stumble across the code block `hello_world() {`. Our range object here becomes:

```
{

  startRow: 0,

  endRow: 0,

  startColumn: 0,

  endColumn: 13

}

```

## Testing Your Highlighter

The best way to test your tokenizer is to see it live, right? To do that, you'll want to modify the [live Ace demo](https://ace.c9.io/build/kitchen-sink.html) to preview your changes. You can find this file in the root Ace directory with the name *kitchen-sink.html*.

1. add an entry to `supportedModes` in [`ace/ext/modelist.js`](https://github.com/ajaxorg/ace/blob/master/lib/ace/ext/modelist.js#L53)
2. add a sample file to `demo/kitchen-sink/docs/` with same name as the mode file

Once you set this up, you should be able to witness a live demonstration of your new highlighter.

### [**](https://ace.c9.io/#adding-automated-tests)Adding Automated Tests

Adding automated tests for a highlighter is trivial so you are not required to do it, but it can help during development.

In `lib/ace/mode/_test` create a file named ``

```
text_<modeName>.txt
```

with some example code. (You can skip this if the document you have added in 

```
demo/docs
```

 both looks good and covers various edge cases in your language syntax).

Run `node highlight_rules_test.js -gen` to preserve current output of your tokenizer in `tokens_<modeName>.json`

After this running `highlight_rules_test.js optionalLanguageName` will compare output of your tokenizer with the correct output you've created.

Any files ending with the *_test.js* suffix are automatically run by Ace's [Travis CI](https://travis-ci.org/#!/ajaxorg/ace) server.