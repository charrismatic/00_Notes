# SassDoc - Style Documentation Engine




## COMMENTS STYLE

Support for C-style comments has been dropped

The standard comment length is 3 in order to be interpreted ///

To convert from block to inline styles:

GNU sed

```shell
find . -name '*.s[ac]ss' -exec sed -i 's,^/\*\*,///,;s,^  *\*\*/,////,;s,^  *\*/,///,;s,^  *\*,///,' {} +
```

```Javascript
buffer.replace(/^ {0,}\/\*\*+|^ {0,}\*+\*\/|^ {0,}\*/ , '///');
```

## POSTER COMMENTS

You can define annotations at a file-level rather than on specific items.

Useful when you have a whole file sharing some annotations (@group, @author etc).

In order to be parsed as a poster, it has to be prefixed by 4 slashes, `////`

on the __first and last lines__, then any number of slashes in between


EXAMPLES

```css
////
/// This is a poster comment.
/// It will apply annotations to all items from file.
/// @group API
/// @author Hugo Giraudel
////
```

## ANNOTATIONS

Default value of some annotations are inside square brackets

This affects @param and @prop.

```css
/// @param {String} $foo [bar] - Baz.
@function baz($foo) {}
```


CLI

Destination is now optional and configurable with an option instead of an argument

After:

```shell
sassdoc scss/ --dest doc/
```


When you don’t give a destination, SassDoc will put the documentation in a sassdoc folder in the current directory.

SassDoc will wipe the whole destination folder upon each run, so be sure you don’t have anything important in it.




NODE

```javascript
var sassdoc = require('sassdoc');

sassdoc('scss/').then(function () {
  console.log('All done!');
});
```





### Convert Your SassDoc to Markdown

It can be handy, and it is not just true for SassDoc but in general for any HTML file.

With the help of Pandoc – which is a universal document converter – you can easily convert your index.html to markdown file with the following command:

```shell
pandoc -s index.html -o doc.md --to=markdown_github
```



### Build You Own Theme or Use a Good Predefined One

To install another theme, you need to download it and point to the path in the SassDoc config like the following:

```shell
npm install sassdoc-theme-flippant --save-dev
```

```javascript
var sassdocOptions = {
    dest: './sassdoc',
    theme: './node_modules/sassdoc-theme-flippant'
};
```

### Preview Your Color Values

When you declare your color variables it can handy if you also show that value in some way.

```
/// Blue
/// <br><img src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="5" height="50"><rect fill="#415FD9" x="0" y="0" width="100%" height="100%"/></svg>'>
$blue: #2196F3;
```


### Build Tool Integration

```javascript
var gulp = require('gulp'),
    sassdoc = require('sassdoc');

var sassdocOptions = {
    dest: './sassdoc',
    theme: './node_modules/sassdoc-theme-flippant'
};

gulp.task('sassdoc', function () {
    return gulp.src('./sass/**/*.scss')
        .pipe(sassdoc(sassdocOptions))
        .resume();
});
```
