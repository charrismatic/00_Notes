markdown-inline-graphviz 1.0

https://pypi.python.org/pypi/markdown-inline-graphviz/1.0


Render inline graphs with Markdown and Graphviz

A Python Markdown extension that replaces inline Graphviz definitions with inline SVGs or PNGs!

Why render the graphs inline? No configuration! Works with any Python-Markdown-based static site generator, such as MkDocs, Pelican, and Nikola out of the box without configuring an output directory.


Installation

`$ pip install markdown-inline-graphviz`

Usage

Activate the inline_graphviz extension. For example, with Mkdocs, you add a stanza to mkdocs.yml:

markdown_extensions:
`    - inline_graphviz`
To use it in your Markdown doc:

```
{% dot attack_plan.svg
    digraph G {
        rankdir=LR
        Earth [peripheries=2]
        Mars
        Earth -> Mars
    }
%}
```

Supported graphviz commands: dot, neato, fdp, sfdp, twopi, circo.

---


https://github.com/lethain/python-markdown-graphviz

### Python-Markdown-Graphviz

The goal of this library is to support embedding graphviz graphs inside
Markdown documents.

Requires:

   * Python (tested on 2.5, 2.6, not sure about 2.4 off hand)
   * Graphviz
       * ubuntu: ``apt-get install graphviz``
       * others: download at [graphviz.org](graphviz.org)
   * Python-Markdown
       * ``easy_install Markdown``

Read the ``examples/example.py`` for a simple example.

Some overview is available [in this blog post][blog].


[blog]: http://lethain.com/entry/2010/jan/16/a-python-markdown-extension-for-embedding-graphviz/ "A Python Markdown Extension for Embedding Graphviz"


The syntax for writing documents is straightforward: enclose the Graphviz graphs in a tag whose type corresponds with the Graphviz executable to render the snippet (dot, neato, lefty, dotty).


```
hi
* there
<dot>
digraph a {
   b -> c -> d
}
</dot>
## And a title
<neato>
digraph a {
   b -> c -> d
}
</neato>
This is some text
```

A simple example of usage is (requiring that mdx_graphviz.py be in the Python path):

```
import markdown
txt = "* this is some\n<dot>\ndigraph a {\n a -> b;\n}\n</dot>\nhi\n"
md = markdown.Markdown(extensions=['graphviz'])
print md.convert(txt)
```
https://lethain.com/a-python-markdown-extension-for-embedding-graphviz/



---

Graphs can be much more advanced. See the manual for all possibilities.

Just put your dot code between ~~~ dot-view and ~~~, each on a seperate line, to convert it to SVG.

The advantage of SVG is that it gives very smooth graphics, even when you zoom in, print the page or view it on a high-resolution display like a Retina display.

The disadvantage of SVG is that it is not supported by Internet Explorer 8 and older. Beautify just shows a message “SVG is not supported by your browser”. You’re free to improve the code, let it write a PNG-file and use that for IE8- users.

Update: Dot also supports VML, so now Beautify can output VML graphs for Internet Explorer 8 and older. Problem is, it does not work in standards mode (See KB932175). Facepalm.

Dot is the only non-PHP tool, it is a program that has to be installed. If you have a package manager, use that to install the graphviz package. Otherwise download the installer from the Graphviz website.



---




https://bitstorm.org/weblog/2012-8/Beautify_Markdown_SmartyPants_GeSHi_and_Dot_combined.html


### Beautify: Markdown, SmartyPants, GeSHi and Dot combined

Years ago, I wrote my own CMS, because nothing available would fit my needs. For text input, I initially used FCKeditor, a WYSIWYG-editor. It turned out to be very cumbersome to show source code in the articles I wrote. So last year I switched to Markdown, a very readable, plain text format that converts to HTML. I also added GeSHi, for highlighting source code. Loving typography, I also added SmartyPants for converting ugly quotes in curly quotes and three dots in ellipsis. Recently I added Dot from Graphviz to turn the Dot graph description language into a SVG-graphic.


git clone https://github.com/edwinm/Beautify.git

Beautify is a simple PHP-function which combines these four powerful tools. It takes text as input, applies the tools and returns the resulting text. It is released as open source.

Below I explain more about each tool.

Markdown
Markdown is similar to the input text used in Wiki’s. It is used in a lot of projects, GitHub being a well known one. For example, you can put “#” in front of a line to make it a header or a `*` to make it a list item. The advantage is that, in contrast to HTML, the source file is very readable

I use the improved PHP-Markdown-Extra because it handles HTML better.

---

### SmartyPants

SmartyPants is, just like Markdown, a project by Daring Fireball. It improves the typography of a text. It turnes ugly straight quotes into curly quotes. Did you know straight quotes were introduced with the appearance of the typewriter and keys for every punctuation character was just too expensive? With SmartyPants we can correct this. SmartyPants also turnes multiple dashes into en- and em-dashes and three dots (…) into an ellipsis.

SmartyPants homepage
GeSHi
With GeSHi, you can apply syntax highlighting to about 200 programming languages. It has several nice options, like line numbers and custom colour themes.

Just put your source code between ~~~ <language-name> and ~~~, each on a seperate line, to apply the highlighter.

GeSHi homepage
Dot
Dot is part of the Graphviz graph visualization software. It is an easy to learn language to describe graphs. This language can be converted into several output formats, like PNG, PDF and SVG. We convert it to SVG for inclusion in the output text.

Here is an example:


```
digraph G {
    input -> split;
    split -> text;
    split -> code;
    text -> smartypants;
    smartypants -> markdown;
    code -> dotview;
    code -> other;
    markdown -> merge;
    dotview -> merge;
    other -> merge;
    merge -> result;
}
```

Graphs can be much more advanced. See the manual for all possibilities.

Just put your dot code between ~~~ dot-view and ~~~, each on a seperate line, to convert it to SVG.

The advantage of SVG is that it gives very smooth graphics, even when you zoom in, print the page or view it on a high-resolution display like a Retina display.

The disadvantage of SVG is that it is not supported by Internet Explorer 8 and older. Beautify just shows a message “SVG is not supported by your browser”. You’re free to improve the code, let it write a PNG-file and use that for IE8- users.

Update: Dot also supports VML, so now Beautify can output VML graphs for Internet Explorer 8 and older. Problem is, it does not work in standards mode (See KB932175). Facepalm.

Dot is the only non-PHP tool, it is a program that has to be installed. If you have a package manager, use that to install the graphviz package. Otherwise download the installer from the Graphviz website.

---


### Beautify
Beautify makes these tools available into one simple function and is available for forking on GitHub as open source.

I also put Markdown, SmartyPants and GeSHi in the same directory for easy start-up, but your are encouraged to download the latest versions from their respective locations.

Use Git to get the files:

git clone https://github.com/edwinm/Beautify.git



https://github.com/edwinm/Beautify
