---
hostname: github.com
href: https://github.com/ben-eb/remark-bookmarks
title: ben-eb/remark-bookmarks: A link manager for Markdown files.
---

# ben-eb/remark-bookmarks

> A link manager for Markdown files.

[Install](#install)
-------------------

With [npm](https://npmjs.com/package/remark-bookmarks) do:

    npm install remark-bookmarks --save-dev

[Usage](#usage)
---------------

This module allows you to manage a collection of links across Markdown files; it's useful for use cases where you need to reference the same source several times across multiple sections of your documentation.

Given the following markdown:

`remark-bookmarks is on \[npm\]!`

We can call remark-bookmarks to provide the missing reference:

```javascript
const remark = require('remark');
const remarkBookmarks = require('remark-bookmarks');
const bookmarks = {
    github: 'https://github.com/ben-eb/remark-bookmarks',
    npm: 'https://npmjs.com/package/remark-bookmarks',
};
const processor = remark().use(remarkBookmarks, {bookmarks});
const output = processor.processSync('remark-bookmarks is on \[npm\]!');
```

The output of this transform is below. Note that only the npm link is inserted into this document, to avoid unnecessary references.

`remark-bookmarks is on \[npm\]!`

`\[npm\]: https://npmjs.com/package/remark-bookmarks`



[API](#api)
-----------

### [](#remarkuseremarkbookmarks-options)remark().use(remarkBookmarks\[, options\])

#### [](#options)options

##### [](#bookmarks)bookmarks

Type: `Object`  
Default: `{}`

Pass the links in that you would like to share across Markdown documents. Note that the references are case insensitive.

##### [](#overwrite)overwrite

Type: `Boolean`  
Default: `false`

By default, the existing references in the file will take precedence over anything defined globally. You can pass `true` to this option to ensure that references are used consistently.

[](#tips)Tips
-------------

By default, this module will append all of the references to the bottom of the Markdown file, which might be problematic if you are using modules that change whole sections of Markdown. One such example is [remark-license](https://github.com/wooorm/remark-license).

To resolve this, we recommend that you use [remark-inline-links](https://github.com/wooorm/remark-inline-links), which will transform the references into inline links.