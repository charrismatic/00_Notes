# Converting HTML to Markdown in Javascript

Something useful for creating summary data and reports from data scrapers and document generators


Libraries

### domchristie/turndown

https://github.com/domchristie/turndown

An HTML to Markdown converter written in JavaScript http://domchristie.github.io/turndown

# Turndown

[![Build Status](https://travis-ci.org/domchristie/turndown.svg?branch=master)](https://travis-ci.org/domchristie/turndown)

Convert HTML into Markdown with JavaScript.

### to-markdown has been renamed to Turndown. See the [migration guide](https://github.com/domchristie/to-markdown/wiki/Migrating-from-to-markdown-to-Turndown) for details.

## Installation

npm:

```
npm install turndown
```

Browser:

```html
<script src="https://unpkg.com/turndown/dist/turndown.js"></script>
```

For usage with RequireJS, UMD versions are located in `lib/turndown.umd.js` (for Node.js) and `lib/turndown.browser.umd.js` for browser usage. These files are generated when the npm package is published. To generate them manually, clone this repo and run `npm run build`.

## Usage

```js
// For Node.js
var TurndownService = require('turndown')

var turndownService = new TurndownService()
var markdown = turndownService.turndown('<h1>Hello world!</h1>')
```








---


# HTML2MD: A JavaScript HTML-to-Markdown converter

http://beneaththeink.github.io/html2md/

https://github.com/BeneathTheInk/html2md/blob/master/lib/html2md.js

HTML2MD attempts to convert HTML into Markdown by reducing an HTML document into simple, Markdown-compatible parts. This library is compatible with both browsers and Node.js.

HTML2MD does its best job to convert any HTML given to it and it is by no means perfect. Heavily formatted documents, for example, will likely fail to convert properly. A few assumptions are made about the HTML which outline it’s limitations:

* Inline elements do not contain block elements.
* Standard HTML block elements are used to define and separate content.
Install
Download the latest version from our release page and use via a script tag. The variable html2md will be attached to window.

```
<script type="text/javascript" src="html2md.js"></script>
```
If using Browserify or Node.js, you can install via NPM and use via require("html2md").

```
$ npm install html2md
```

Basic Usage
Using HTML2MD is really easy; it’s just a function!

```
var markdown = html2md("<h1>Hello World</h1>");
console.log(markdown); // -> # Hello World
```
