https://developers.google.com/web/tools/chrome-devtools/console/expressions

# Evaluate Expressions  |  Tools for Web Developers  |  Google Developers

---------------------------
.wf-byline {display: inline-flex; margin: 16px 32px 16px 0;} .wf-byline .attempt-left {margin: 0 16px 0 0;} .wf-byline img {border-radius: 100%; min-width: 64px; height: 64px;} .wf-byline .wf-byline-desc {font-size: smaller; word-break: break-word;} .wf-byline .wf-byline-social {font-size: smaller;}


Meggin is a Tech Writer

.wf-byline {display: inline-flex; margin: 16px 32px 16px 0;} .wf-byline .attempt-left {margin: 0 16px 0 0;} .wf-byline img {border-radius: 100%; min-width: 64px; height: 64px;} .wf-byline .wf-byline-desc {font-size: smaller; word-break: break-word;} .wf-byline .wf-byline-social {font-size: smaller;}


**By** [Joseph Medley](https://developers.google.com/web/resources/contributors/josephmedley)

Technical Writer

Explore the state of any item on your page from the DevTools console using one of its evaluation capabilities.

The DevTools console allows you to learn the state of items in your page in an ad-hoc manner. Evaluate any expression you can type using a combination of your knowledge of JavaScript and several features that support it.

### TL;DR

*   Evaluate an expression just by typing it.
*   Select elements using one of the shortcuts.
*   Inspect DOM elements and JavaScript heap objects using `inspect()`.
*   Access recently selected elements and objects using $0 - 4.

## [](#top_of_page)Navigate expressions

The console evaluates any JavaScript expression you provide when pressing Enter. As you type an expression, property name suggestions appear; the console also provides auto-completion and tab-completion.

If there are multiple matches, ↑ and ↓ cycles through them. Pressing → selects the current suggestion. If there's a single suggestion, Tab selects it.

![Simple expressions in the console.](https://developers.google.com/web/tools/chrome-devtools/console/images/evaluate-expressions.png)

## []()Select elements

Use the following shortcuts to select elements:

| Shortcut & Description |
| ---------------------- |
| $()                    |
| $$()                   |
| $x()                   |

Examples of target selection:

```
`$('code')  // Returns the first code element in the document.  
$$('figure')  // Returns an array of all figure elements in the document.  
$x('html/body/p')  // Returns an array of all paragraphs in the document body.
```

## []()Inspect DOM elements and JavaScript heap objects

The `inspect()` function takes a DOM element or JavaScript reference as a parameter. If you provide a DOM element, the DevTools goes to the Elements panel and displays that element. If you provide a JavaScript reference, then it goes to the Profile panel.

When this code executes in your console on this page, it grabs this figure and displays it on the Elements panel. This takes advantage of the `$_` property to get the output of the last evaluated expression.

```
`$('[data-target="inspecting-dom-elements-example"]')  
inspect($_)
```

## []()Access recently selected elements and objects

The console stores the last five used elements and objects in variables for easy access. Use $0 - 4, to access these elements from within the console. Remember computers begin counting from 0; this means the latest item is $0 and the oldest item is $4.
turndown_init.js:1 