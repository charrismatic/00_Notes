---
hostname: github.com
href: https://github.com/remarkjs/remark
title: remarkjs/remark: Markdown processor powered by plugins
---

# remarkjs/remark

_Markdown processor powered by plugins based on `unifiedjs` (and `vfile`, `syntax-tree`) <@https://remark.js.org>_


  1,638 commits
  3 branches
  113 releases
  61 contributors
  MIT License
  Watch 37
  Stars 1,317
  Fork 85
  Issues 11
  Languages: JavaScript 100.0%


**remark** is an ecosystem of [plugins](https://github.com/remarkjs/remark/tree/master/doc/plugins.md) for processing markdown. It’s not another markdown to HTML compiler.

It can generate and reformat markdown too. Powered by [plugins](https://github.com/remarkjs/remark/tree/master/doc/plugins.md) to do all kinds of things: [check markdown code style](https://github.com/remarkjs/remark-lint), [transform safely to React](https://github.com/mapbox/remark-react), [add a table of contents](https://github.com/remarkjs/remark-toc), or [compile to man pages](https://github.com/remarkjs/remark-man).

It’s built on [unified](https://github.com/unifiedjs/unified), make sure to read it and its [website](https://unifiedjs.github.io) too.

*   [`remark`](https://github.com/remarkjs/remark/tree/master/packages/remark) - Programmatic interface
*   [`remark-cli`](https://github.com/remarkjs/remark/tree/master/packages/remark-cli) - Command-line interface







TODO:  

Check out these plugins

[gulp-remark](https://github.com/remarkjs/gulp-remark)
**gulp-remark**



---


https://github.com/ben-eb/remark-bookmarks

[ben-eb](https://github.com/ben-eb)**remark-bookmarks** - A link manager for Markdown files.

---

# remark-cli

Command-line interface for [**remark**](https://github.com/remarkjs/remark).

- Loads [`remark-` plugins](https://github.com/remarkjs/remark/blob/master/doc/plugins.md)
- Searches for [markdown extensions](https://github.com/sindresorhus/markdown-extensions)
- Ignores paths found in [`.remarkignore` files](https://github.com/unifiedjs/unified-engine/blob/master/doc/ignore.md)
- Loads configuration from [`.remarkrc`, `.remarkrc.js` files](https://github.com/unifiedjs/unified-engine/blob/master/doc/configure.md)
- Uses configuration from [`remarkConfig` fields in `package.json` files](https://github.com/unifiedjs/unified-engine/blob/master/doc/configure.md)

## Installation

[npm](https://docs.npmjs.com/cli/install):

```
npm install remark-cli
```

## Usage

```
# Add a table of contents to `readme.md`
$ remark readme.md --use toc --output

# Lint markdown files in the current directory
# according to the markdown style guide.
$ remark . --use preset-lint-markdown-style-guide
```

## CLI

See [**unified-args**](https://github.com/unifiedjs/unified-args#cli), which provides the interface, for more information on all available options.

```
Usage: remark [options] [path | glob ...]

  CLI to process markdown with remark using plugins

Options:

  -h  --help                output usage information
  -v  --version             output version number
  -o  --output [path]       specify output location
  -r  --rc-path <path>      specify configuration file
  -i  --ignore-path <path>  specify ignore file
  -s  --setting <settings>  specify settings
  -e  --ext <extensions>    specify extensions
  -u  --use <plugins>       use plugins
  -w  --watch               watch for changes and reprocess
  -q  --quiet               output only warnings and errors
  -S  --silent              output only errors
  -f  --frail               exit with 1 on warnings
  -t  --tree                specify input and output as syntax tree
      --report <reporter>   specify reporter
      --file-path <path>    specify path to process as
      --tree-in             specify input as syntax tree
      --tree-out            output syntax tree
      --inspect             output formatted syntax tree
      --[no-]stdout         specify writing to stdout (on by default)
      --[no-]color          specify color in report (on by default)
      --[no-]config         search for configuration files (on by default)
      --[no-]ignore         search for ignore files (on by default)

Examples:

  # Process `input.md`
  $ remark input.md -o output.md

  # Pipe
  $ remark < input.md > output.md

  # Rewrite all applicable files
  $ remark . -o

```

##

---

## Unified.js - Unified Text processing

https://unifiedjs.github.io/

https://github.com/unifiedjs

unified is an interface for processing text with syntax trees and transforming between them.

The unified library itself is a small module. It’s a rather small API. Plugins do everything else: minify HTML, lint markdown, check indefinite articles (“a”, “an”), and more.

Three syntaxes are connected to unified, each coming with a syntax tree definition, and a parser and stringifier: mdast with remark for markdown, nlcst with retext for prose, and hast with rehype for HTML.

unified defers part of its logic to vfile, which is a virtual file format representing documents being processed, and unist, a schema for syntax trees.


| `remark` for markdown | `rehype` for HTML  | `retext` for natural language |

### syntax tree

unist discloses documents as syntax trees. Syntax trees come in two flavours: Concrete (CST) and Abstract (AST). The first has all information needed to restore the original document completely, the latter does not. But, ASTs can recreate an exact syntactic representation. For example, CSTs house info on style such as tabs or spaces, but ASTs do not. This makes ASTs often easier to work with.

For example, say we have the following HTML element:

    <a href="https://github.com/unifiedjs/unified" class="highlight">
      Fork on GitHub
    </a>

Yields (in hast, an abstract syntax tree):

    tree.json
    {
      "type": "element",
      "tagName": "a",
      "properties": {
        "href": "https://github.com/unifiedjs/unified",
        "className": ["highlight"]
      },
      "children": [
        {"type": "text", "value": "\n  Fork on GitHub\n"}
      ]
    }


These trees also come with positional information (not shown above), so every node knows where it originates from.

Read more about unist in it’s readme.

#### Built with unified

- __*write-music*__
  write-music visualises sentence length with unified. Varying sentence length can make reading more enjoyable.

- __*awesome-lint*__  
  awesome-lint uses unified to make it easier to create and maintain Awesome lists.

- *__how-to-markdown__*  
  how-to-markdown, a core NodeSchool workshopper, uses unified to teach markdown

- __*documentation.js*__
  documentation.js uses unified to generate formatted docs

- *__readability__*  
  readability measures ease of reading of text. It uses several formulas. Green means text should be readable for your target audience.



#### Virtual File


`vfile` stores metadata about documents being processed (often, but not always, from the file system). Mainly, it houses a path to files, and their contents. Additionally, it tracks messages associated with files and where they occurred. This powers code linting, shown below with remark-cli, remark-validate-links, and remark-preset-lint-consistent.

https://unifiedjs.github.io/



----


[Plugins](#plugins)
===================

**remark** is an ecosystem of [plugins](#list-of-plugins).

See [tools built with remark](https://github.com/remarkjs/remark/blob/master/doc/products.md).

[Table of Contents](#table-of-contents)
---------------------------------------

*   [List of Plugins](#list-of-plugins)
*   [List of Presets](#list-of-presets)
*   [List of Utilities](#list-of-utilities)
*   [Using plugins](#using-plugins)
*   [Creating plugins](#creating-plugins)

[List of Plugins](#list-of-plugins)
-----------------------------------
*   [`remark-abbr`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-abbr) - Custom syntax to handle abbreviations, custom mdast inline node type `abbr`. Rehype compatible (`<abbr title="bar">foo</abbr>`)
*   [`remark-align`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-align) - Custom syntax to handle text/block alignment, custom mdast block node type `CenterAligned`, `RightAligned`. Rehype compatible (wraps in `div`s with alignment as configurable CSS class)
*   [`remark-autolink-headings`](https://github.com/ben-eb/remark-autolink-headings) - Automatically add GitHub style links to headings
*   [`remark-bookmarks`](https://github.com/ben-eb/remark-bookmarks) - Link manager for Markdown files
*   [`remark-bracketed-spans`](https://github.com/sethvincent/remark-bracketed-spans) - Add an id, classes, and data attributes to `<span>` tags in markdown
*   [`remark-breaks`](https://github.com/remarkjs/remark-breaks) - Breaks support, without needing spaces
*   [`remark-collapse`](https://github.com/Rokt33r/remark-collapse) - Make a section collapsible
*   [`remark-comment-blocks`](https://github.com/ben-eb/remark-comment-blocks) - Wrap Markdown with a comment block
*   [`remark-comment-config`](https://github.com/remarkjs/remark-comment-config) - Configure remark with comments
*   [`remark-comments`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-comments) - Configurable custom syntax to ignore parts of the Markdown input
*   [`remark-contributors`](https://github.com/hughsk/remark-contributors) - Inject a given table of contributors
*   [`remark-custom-blocks`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-custom-blocks) - Configurable custom syntax to parse custom blocks, creating new mdast node types. Rehype compatible
*   [`remark-defsplit`](https://github.com/eush77/remark-defsplit) - Extract inline link and image destinations as separate definitions
*   [`remark-disable-tokenizers`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-disable-tokenizers) - Disable any or all remark’s `blockTokenizers` and `inlineTokenizers`
*   [`remark-embed-images`](https://github.com/dherges/remark-embed-images) - Embed images with data: URIs, inlining base64-encoded sources
*   [`remark-emoji`](https://github.com/rhysd/remark-emoji) - Transform unicode emoji to Gemoji shortcodes
*   [`remark-emoji-to-gemoji`](https://github.com/jackycute/remark-emoji-to-gemoji) - Transform Gemoji shortcodes to unicode emoji
*   [`remark-external-links`](https://github.com/xuopled/remark-external-links) - Automatically adds the target and rel attributes to external links
*   [`remark-first-heading`](https://github.com/laat/remark-first-heading) - Replacing the first heading in a document
*   [`remark-fix-guillemets`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-fix-guillemets) - For weird typographic reasons, this fixes `<<a>>` being parsed as `<` \+ html tag `<a>` \+ `>` and instead replaces this with text `<<a>>`
*   [`remark-frontmatter`](https://github.com/remarkjs/remark-frontmatter) - Frontmatter (yaml, toml, and more) support
*   [`remark-gemoji`](https://github.com/remarkjs/remark-gemoji) - Gemoji short-code support in remark
*   [`remark-gemoji-to-emoji`](https://github.com/jackycute/remark-gemoji-to-emoji) - Transform Gemoji shortcodes to Unicode emoji
*   [`remark-generic-extensions`](https://github.com/medfreeman/remark-generic-extensions) - Commonmark generic directive extension
*   [`remark-github`](https://github.com/remarkjs/remark-github) - Auto-link references like in GitHub issues, PRs, and comments
*   [`remark-gitlab-artifact`](https://github.com/temando/remark-gitlab-artifact) - Download artifacts from GitLab projects to live alongside your Markdown
*   [`remark-grid-tables`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-grid-tables) - Custom Markdown syntax to describe tables. Rehype compatible
*   [`remark-graphviz`](https://github.com/temando/remark-graphviz) - Replace `dot` graphs with rendered SVGs
*   [`remark-heading-gap`](https://github.com/ben-eb/remark-heading-gap) - Adjust the gap between headings
*   [`remark-highlight.js`](https://github.com/ben-eb/remark-highlight.js) - Highlight code blocks in Markdown files with [highlight.js](https://github.com/isagalaev/highlight.js)
*   [`remark-html`](https://github.com/remarkjs/remark-html) - Compile Markdown to HTML documents
*   [`remark-html-emoji-image`](https://github.com/jackycute/remark-html-emoji-image) - Transform unicode emoji to HTML images
*   [`remark-html-katex`](https://github.com/rokt33r/remark-math/blob/master/packages/remark-html-katex/readme.md) - Transform math inline and block nodes to styled HTML equations with [KaTeX](https://github.com/Khan/KaTeX)
*   [`remark-iframes`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-iframes) - Custom syntax with fully configurable iframe providers, following a whitelist approach. Rehype compatible
*   [`remark-inline-links`](https://github.com/remarkjs/remark-inline-links) - Transform references and definitions to normal links and images
*   [`remark-inline-math`](https://github.com/bizen241/remark-inline-math) - Inline math support
*   [`remark-kbd`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-kbd) - Custom syntax, parses `||foo||` into a new mdast inline node type `kbd`. Rehype compatible (`<kbd>foo</kbd>`)
*   [`remark-license`](https://github.com/remarkjs/remark-license) - Add a license section
*   [`remark-lint`](https://github.com/remarkjs/remark-lint) - Markdown code style linter
*   [`remark-man`](https://github.com/remarkjs/remark-man) - Compile Markdown to Man pages (roff)
*   [`remark-math`](https://github.com/rokt33r/remark-math) - Math inline and block support
*   [`remark-mermaid`](https://github.com/temando/remark-mermaid) - Replace [mermaid](https://mermaidjs.github.io/) graphs with rendered SVGs
*   [`remark-message-control`](https://github.com/remarkjs/remark-message-control) - Enable, disable, and ignore messages
*   [`remark-metadata`](https://github.com/temando/remark-metadata) - Add metadata about the processed file as front matter
*   [`remark-midas`](https://github.com/ben-eb/remark-midas) - Highlight CSS in Markdown files with [midas](https://github.com/ben-eb/midas)
*   [`remark-normalize-headings`](https://github.com/eush77/remark-normalize-headings) - Ensure at most one top-level heading is in the document
*   [`remark-openapi`](https://github.com/temando/remark-openapi) - Convert links to local or remote OpenAPI definition to tables with summaries of all paths
*   [`remark-parse-yaml`](https://github.com/landakram/remark-parse-yaml) - Parse YAML blocks into structured data
*   [`remark-ping`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-ping) - Custom syntax, parses `@user`, `@**first last**`, configurable existence check. Rehype compatible
*   [`remark-react`](https://github.com/mapbox/remark-react) - Compile Markdown to [React](https://github.com/facebook/react)
*   [`remark-react-codemirror`](https://github.com/craftzdog/remark-react-codemirror) - Syntax highlighting for [remark-react](https://github.com/mapbox/remark-react) through [CodeMirror](https://codemirror.net)
*   [`remark-react-lowlight`](https://github.com/bebraw/remark-react-lowlight) - Syntax highlighting for [remark-react](https://github.com/mapbox/remark-react) through [lowlight](https://github.com/wooorm/lowlight)
*   [`remark-reference-links`](https://github.com/remarkjs/remark-reference-links) - Transform links and images to references and definitions
*   [`remark-rehype`](https://github.com/remarkjs/remark-rehype) - [rehype](https://github.com/rehypejs/rehype) support
*   [`remark-retext`](https://github.com/remarkjs/remark-retext) - [retext](https://github.com/retextjs/retext) support
*   [`remark-rewrite-headers`](https://github.com/strugee/remark-rewrite-headers) - Change heading levels
*   [`remark-shortcodes`](https://github.com/djm/remark-shortcodes) - Parses custom Wordpress/Hugo-like shortcodes inside your Markdown
*   [`remark-slug`](https://github.com/remarkjs/remark-slug) - Add slugs to headings
*   [`remark-strip-badges`](https://github.com/remarkjs/remark-strip-badges) - Remove badges (such as `shields.io`)
*   [`remark-strip-html`](https://github.com/craftzdog/remark-strip-html) - Remove html formatting
*   [`remark-squeeze-paragraphs`](https://github.com/eush77/remark-squeeze-paragraphs) - Remove empty paragraphs
*   [`remark-sub-super`](https://github.com/zestedesavoir/zmarkdown/tree/master/packages/remark-sub-super) - Custom syntax to parse subscript and superscript. Rehype compatible (using `<sub>` and `<sup>`)
*   [`remark-swagger`](https://github.com/yoshuawuyts/remark-swagger) - Insert a swagger specification
*   [`remark-textr`](https://github.com/denysdovhan/remark-textr) - [`Textr`](https://github.com/shuvalov-anton/textr), a modular typographic framework
*   [`remark-title`](https://github.com/RichardLitt/remark-title) - Check and inject the title of a markdown as the first element.
*   [`remark-toc`](https://github.com/remarkjs/remark-toc) - Generate a Table of Contents (TOC) for Markdown files
*   [`remark-unlink`](https://github.com/eush77/remark-unlink) - Remove all links, references and definitions
*   [`remark-usage`](https://github.com/remarkjs/remark-usage) - Add a usage example to your readme
*   [`remark-validate-links`](https://github.com/remarkjs/remark-validate-links) - Validate links point to existing headings and files
*   [`remark-vdom`](https://github.com/remarkjs/remark-vdom) - Compile Markdown to [VDOM](https://github.com/Matt-Esch/virtual-dom/)
*   [`remark-wiki-link`](https://github.com/landakram/remark-wiki-link) - Parse and render wiki links
*   [`remark-yaml-annotations`](https://github.com/sfrdmn/remark-yaml-annotations) - Extend Markdown with YAML-based annotation syntax
*   [`remark-yaml-config`](https://github.com/remarkjs/remark-yaml-config) - Configure remark with YAML

[List of Presets](#list-of-presets)
-----------------------------------
See [npm search](https://www.npmjs.com/search?q=remark-preset) for available and often inspirational presets.

[List of Utilities](#list-of-utilities)
---------------------------------------
See [**MDAST**](https://github.com/syntax-tree/mdast#list-of-utilities) for a list of utilities for working with the syntax tree. See [`unist`](https://github.com/syntax-tree/unist#unist-utilities) for other utilities which work with **MDAST** nodes, too.
And finally, see [**vfile**](https://github.com/vfile/vfile#utilities) for a list of utilities working with virtual files.

[Products](#products)
=====================

List of tools using [**remark**](https://github.com/remarkjs/remark) internally.

See [plugins](https://github.com/remarkjs/remark/blob/master/doc/plugins.md) for a list of plugins and utilities.

[List of products using remark](#list-of-products-using-remark)
---------------------------------------------------------------

### [Integrations](#integrations)

*   [`linter-remark`](https://github.com/wooorm/linter-remark) - [Atom](https://github.com/atom/atom) linter
*   [`gulp-remark`](https://github.com/denysdovhan/gulp-remark) - [Gulp](https://github.com/gulpjs/gulp) plugin
*   [`grunt-remark`](https://github.com/ChristianMurphy/grunt-remark) - [Grunt](https://github.com/gruntjs/grunt) plugin
*   [`metalsmith-remark`](https://github.com/ben-eb/metalsmith-remark) - [Metalsmith](https://github.com/metalsmith/metalsmith) plugin
*   [`eslint-plugin-markdown`](https://github.com/eslint/eslint-plugin-markdown) - [ESLint](https://github.com/eslint/eslint) plugin
*   [`linter-markdown`](https://github.com/AtomLinter/linter-markdown) - Lint markdown files within [Atom](https://github.com/atom/atom)
*   [`atom-beautify`](https://github.com/Glavin001/atom-beautify) -  Beautify markdown in [Atom](https://github.com/atom/atom)

### [CLIs](#clis)

*   [`alex`](https://github.com/wooorm/alex) - Catch insensitive, inconsiderate writing
*   [`documentation`](https://github.com/documentationjs/documentation) - Beautiful, flexible, powerful js docs
*   [`github-man`](https://github.com/eush77/github-man) - Open readme from GitHub repository as a man page
*   [`how-to-markdown`](https://github.com/workshopper/how-to-markdown) - Learn you how to start using Markdown
*   [`man-n`](https://github.com/man-n/man-n) - Browse npm with man(1)
*   [`npm-man`](https://github.com/eush77/npm-man) - Open any package readme from npm as a man page

### [Apps](#apps)

*   [`Shiba`](https://github.com/rhysd/Shiba) - Rich markdown live preview app with linter
*   [`vmd`](https://github.com/yoshuawuyts/vmd) - preview markdown files

### [Static site generators](#static-site-generators)

*   [`phenomic`](https://github.com/phenomic/phenomic) -  Modern website generator
*   [`gatsby`](https://github.com/gatsbyjs/gatsby) -  Blazing fast React.js static site generator
*   [`flybook`](https://github.com/rhiokim/flybook) - Simple utility to generate static website

### [Other](#other)

*   [`free-programming-books-lint`](https://github.com/vhf/free-programming-books-lint) - Markdown linter for [`free-programming-books`](https://github.com/EbookFoundation/free-programming-books)
*   [`retext-mapbox-standard`](https://github.com/mapbox/retext-mapbox-standard) - Enforce Mapbox rules about language
*   [`rorybot`](https://github.com/Shopify/rorybot) - Catch writing that doesn’t follow Shopify style guide rules
*   [`awesome-lint`](https://github.com/sindresorhus/awesome-lint) - Linter for Awesome lists
*   [`react-styleguidist`](https://github.com/styleguidist/react-styleguidist) - Isolated React component development environment
*   [`vue-styleguidist`](https://github.com/vue-styleguidist/vue-styleguidist) - Vue Components with a living style guide
*   [`reactdown`](https://github.com/andreypopp/reactdown) - Markdown based live document format
