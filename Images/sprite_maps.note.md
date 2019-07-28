# Sprites  


Tools and libraries

Open Iconic v1.1.1

https://www.npmjs.com/package/open-iconic
https://github.com/iconic/open-iconic
Open Iconic is the open source sibling of Iconic. It is a hyper-legible collection of 223 icons with a tiny footprint—ready to use with Bootstrap and Foundation. View the collection


--


Glue

https://glue.readthedocs.io/en/latest/#
glue.readthedocs
Glue is a simple command line tool to generate sprites:

$ glue source output
Automatic Sprite (Image + Metadata) creation including:
css (less, scss)
cocos2d
json (array, hash)
CAAT
Automatic multi-dpi retina sprite creation.
Support for multi-sprite projects.
Create sprites from multiple folders (recursively).
Multiple algorithms available.
Automatic crop of unnecessary transparent borders around source images.
Configurable paddings and margin per image, sprite or project.
Watch option to keep glue running watching for file changes.
Project-, Sprite- and Image-level configuration via static config files.
Customizable output using jinja templates.
CSS: Optional .less/.scss output format.
CSS: Configurable cache busting for sprite images.
CSS: Customizable class names.


spritesmith


https://www.npmjs.com/package/spritesmith
https://github.com/Ensighten/spritesmith

Convert images into spritesheets and coordinate maps.

spritesmith is also available as:

grunt plugin
gulp plugin
CLI utility
A folder of icons processed by spritesmith:

generates a spritesheet:

and a coordinate map:

{
  "/home/todd/github/spritesmith/docs/fork.png": {
    "x": 0,
    "y": 0,
    "width": 32,
    "height": 32
  },
  "/home/todd/github/spritesmith/docs/github.png": {
    "x": 32,
    "y": 0,
    "width": 32,
    "height": 32
  },
  // ...
}


related:
gulp.spritesmith
Convert a set of images into a spritesheet and CSS variables via gulp

This is the official port of grunt-spritesmith, the grunt equivalent of a wrapper around spritesmith.


---


svg-sprite-loader

Webpack loader for creating SVG sprites.
Why it's cool
Minimum initial configuration. Most of the options are configured automatically.
Runtime for browser. Sprites are rendered and injected in pages automatically, you just refer to images via <svg><use xlink:href="#id"></use></svg>.
Isomorphic runtime for node/browser. Can render sprites on server or in browser manually.
Customizable. Write/extend runtime module to implement custom sprite behaviour. Write/extend runtime generator to produce your own runtime, e.g. React component configured with imported symbol.
External sprite file is generated for images imported from css/scss/sass/less/styl/html (SVG stacking technique).


https://www.npmjs.com/package/svg-sprite-loader

https://github.com/kisenka/svg-sprite-loader




----


postcss-sprites
https://www.npmjs.com/package/postcss-sprites

PostCSS plugin that generates spritesheets from your stylesheets.

    /* Input */
    .comment { background: url(images/sprite/ico-comment.png) no-repeat 0 0; }
    .bubble { background: url(images/sprite/ico-bubble.png) no-repeat 0 0; }

    /* ---------------- */

    /* Output */
    .comment { background-image: url(images/sprite.png); background-position: 0 0; }
    .bubble { background-image: url(images/sprite.png); background-position: 0 -50px; }
    Usage
    var fs = require('fs');
    var postcss = require('postcss');
    var sprites = require('postcss-sprites');

    var css = fs.readFileSync('./css/style.css', 'utf8');
    var opts = {
        stylesheetPath: './dist',
        spritePath: './dist/images/'
    };

    postcss([sprites(opts)])
        .process(css, {
            from: './css/style.css',
            to: './dist/style.css'
        })
        .then(function(result) {
            fs.writeFileSync('./dist/style.css', result.css);
        });

See PostCSS docs for examples for your environment.
