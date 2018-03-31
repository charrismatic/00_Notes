https://graphviz.gitlab.io/_pages/doc/info/lang.html

https://en.wikipedia.org/wiki/DOT_(graph_description_language)

DOT (graph description language)

DOT is a graph description language. DOT graphs are typically files with the file extension gv or dot. The extension gv is preferred to avoid confusion with the extension dot used by early (pre-2007) versions of Microsoft Word.[1]

Various programs can process DOT files. Some, such as dot, neato, twopi, circo, fdp, and sfdp, can read a DOT file and render it in graphical form. Others, such as gvpr, gc, acyclic, ccomps, sccmap, and tred, read DOT files and perform calculations on the represented graph. Finally, others, such as lefty, dotty, and grappa, provide an interactive interface. The GVedit tool combines a text editor with noninteractive image viewer.

Most programs are part of the Graphviz package or use it internally.


The DOT language defines a graph, but does not provide facilities for rendering the graph. There are several programs that can be used to render, view, and manipulate graphs in the DOT language:

Graphviz - a collection of libraries and utilities to manipulate and render graphs

JavaScript

Canviz - a JavaScript library for rendering DOT files[4]
Viz.js - a simple Graphviz JavaScript client[5]

Java

Gephi - an interactive visualization and exploration platform for all kinds of networks and complex systems, dynamic and hierarchical graphs
Grappa - a partial port of Graphviz to Java
ZGRViewer - a DOT viewer[6]

Other

Beluging - a Python- & Google Cloud Platform-based viewer of DOT and Beluga extensions
OmniGraffle - a digital illustration application for macOS that can import a subset of DOT, producing an editable document (but the result cannot be exported back to DOT)
Tulip - a software framework in C++ that can import DOT files for analysis[7]
VizierFX - an Apache Flex graph rendering library in ActionScript[8]



It is possible to specify layout details with DOT, although not all tools that implement the DOT language pay attention to the position attributes. Thus, depending on the tools used, users must rely on automated layout algorithms (potentially resulting in unexpected output) or tediously hand-positioned nodes.





---

## Language Reference

The following is an abstract grammar defining the DOT language. Terminals are shown in bold font and nonterminals in italics. Literal characters are given in single quotes. Parentheses ( and ) indicate grouping when needed. Square brackets [ and ] enclose optional items. Vertical bars | separate alternatives.

```
graph	:	[ strict ] (graph | digraph) [ ID ] '{' stmt_list '}'
stmt_list	:	[ stmt [ ';' ] stmt_list ]
stmt	:	node_stmt
|	edge_stmt
|	attr_stmt
|	ID '=' ID
|	subgraph
attr_stmt	:	(graph | node | edge) attr_list
attr_list	:	'[' [ a_list ] ']' [ attr_list ]
a_list	:	ID '=' ID [ (';' | ',') ] [ a_list ]
edge_stmt	:	(node_id | subgraph) edgeRHS [ attr_list ]
edgeRHS	:	edgeop (node_id | subgraph) [ edgeRHS ]
node_stmt	:	node_id [ attr_list ]
node_id	:	ID [ port ]
port	:	':' ID [ ':' compass_pt ]
|	':' compass_pt
subgraph	:	[ subgraph [ ID ] ] '{' stmt_list '}'
compass_pt	:	(n | ne | e | se | s | sw | w | nw | c | _)
```

The keywords node, edge, graph, digraph, subgraph, and strict are case-independent. Note also that the allowed compass point values are not keywords, so these strings can be used elsewhere as ordinary identifiers and, conversely, the parser will actually accept any identifier.

An ID is one of the following:

- Any string of alphabetic `([a-zA-Z\200-\377])` characters, underscores `('_')` or digits `([0-9])`, not beginning with a digit
- a numeral `[-]?(.[0-9]+ | [0-9]+(.[0-9]*)? )`;
- any double-quoted string `("...")` possibly containing escaped quotes `(\")`
- an HTML string `(<...>)`


An ID is just a string; the lack of quote characters in the first two forms is just for simplicity. There is no semantic difference between abc_2 and "abc_2", or between 2.34 and "2.34". Obviously, to use a keyword as an ID, it must be quoted. Note that, in HTML strings, angle brackets must occur in matched pairs, and newlines and other formatting whitespace characters are allowed. In addition, the content must be legal XML, so that the special XML escape sequences for ", &, <, and > may be necessary in order to embed these characters in attribute values or raw text. As an ID, an HTML string can be any legal XML string. However, if used as a label attribute, it is interpreted specially and must follow the syntax for HTML-like labels.
Both quoted strings and HTML strings are scanned as a unit, so any embedded comments will be treated as part of the strings.

An edgeop is -> in directed graphs and -- in undirected graphs.

The language supports C++-style comments: `/* */` and `//`.

In addition, a line beginning with a `#` character is considered a line output from a C preprocessor (e.g., # 34 to indicate line 34 ) and discarded

Semicolons and commas aid readability but are not required.

Also, any amount of whitespace may be inserted between terminals.

As another aid for readability, dot allows double-quoted strings to span multiple physical lines using the standard C convention of a backslash immediately preceding a newline character2.

In addition, double-quoted strings can be concatenated using a '+' operator. As HTML strings can contain newline characters, which are used solely for formatting, the language does not allow escaped newlines or concatenation operators to be used within them.

Subgraphs and Clusters

Subgraphs play three roles in Graphviz. First, a subgraph can be used to represent graph structure, indicating that certain nodes and edges should be grouped together. This is the usual role for subgraphs and typically specifies semantic information about the graph components. It can also provide a convenient shorthand for edges. An edge statement allows a subgraph on both the left and right sides of the edge operator. When this occurs, an edge is created from every node on the left to every node on the right. For example, the specification

`A -> {B C}`

is equivalent to

```
  A -> B
  A -> C
```

In the second role, a subgraph can provide a context for setting attributes. For example, a subgraph could specify that blue is the default color for all nodes defined in it. In the context of graph drawing, a more interesting example is:

```
subgraph {
rank = same; A; B; C;
}
```

This (anonymous) subgraph specifies that the nodes A, B and C should all be placed on the same rank if drawn using dot.

The third role for subgraphs directly involves how the graph will be laid out by certain layout engines. If the name of the subgraph begins with cluster, Graphviz notes the subgraph as a special cluster subgraph. If supported, the layout engine will do the layout so that the nodes belonging to the cluster are drawn together, with the entire drawing of the cluster contained within a bounding rectangle. Note that, for good and bad, cluster subgraphs are not part of the DOT language, but solely a syntactic convention adhered to by certain of the layout engines.

Lexical and Semantic Notes

A graph must be specified as either a digraph or a graph. Semantically, this indicates whether or not there is a natural direction from one of the edge's nodes to the other. Lexically, a digraph must specify an edge using the edge operator -> while a undirected graph must use --. Operationally, the distinction is used to define different default rendering attributes. For example, edges in a digraph will be drawn, by default, with an arrowhead pointing to the head node. For ordinary graphs, edges are drawn without any arrowheads by default.

A graph may also be described as strict. This forbids the creation of multi-edges, i.e., there can be at most one edge with a given tail node and head node in the directed case. For undirected graphs, there can be at most one edge connected to the same two nodes. Subsequent edge statements using the same two nodes will identify the edge with the previously defined one and apply any attributes given in the edge statement. For example, the graph


```
strict graph {
  a -- b
  a -- b
  b -- a [color=blue]
}
```

will have a single edge connecting nodes a and b, whose color is blue.
If a default attribute is defined using a node, edge, or graph statement, or by an attribute assignment not attached to a node or edge, any object of the appropriate type defined afterwards will inherit this attribute value. This holds until the default attribute is set to a new value, from which point the new value is used. Objects defined before a default attribute is set will have an empty string value attached to the attribute once the default attribute definition is made.

Note, in particular, that a subgraph receives the attribute settings of its parent graph at the time of its definition. This can be useful; for example, one can assign a font to the root graph and all subgraphs will also use the font. For some attributes, however, this property is undesirable. If one attaches a label to the root graph, it is probably not the desired effect to have the label used by all subgraphs. Rather than listing the graph attribute at the top of the graph, and the resetting the attribute as needed in the subgraphs, one can simply defer the attribute definition in the graph until the appropriate subgraphs have been defined.

If an edge belongs to a cluster, its endpoints belong to that cluster. Thus, where you put an edge can effect a layout, as clusters are sometimes laid out recursively.

There are certain restrictions on subgraphs and clusters. First, at present, the names of a graph and it subgraphs share the same namespace. Thus, each subgraph must have a unique name. Second, although nodes can belong to any number of subgraphs, it is assumed clusters form a strict hierarchy when viewed as subsets of nodes and edges.

Character encodings

The DOT language assumes at least the ascii character set. Quoted strings, both ordinary and HTML-like, may contain non-ascii characters. In most cases, these strings are uninterpreted: they simply serve as unique identifiers or values passed through untouched. Labels, however, are meant to be displayed, which requires that the software be able to compute the size of the text and determine the appropriate glyphs. For this,
it needs to know what character encoding is used.

By default, DOT assumes the UTF-8 character encoding. It also accepts the Latin1 (ISO-8859-1) character set, assuming the input graph uses the charset attribute to specify this. For graphs using other character sets, there are usually programs, such as iconv, which will translate from one character set to another.

Another way to avoid non-ascii characters in labels is to use HTML entities for special characters. During label evaluation, these entities are translated into the underlying character. This table shows the supported entities, with their Unicode value, a typical glyph, and the HTML entity name. Thus, to include a lower-case Greek beta into a string, one can use the ascii sequence `&beta;`. In general, one should only use entities that are allowed in the output character set, and for which there is a glyph in the font


https://graphviz.gitlab.io/_pages/doc/info/lang.html

---

Wikipedia Page General Outline

 - [1 Syntax](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Syntax)
 - [1.1	Graph types](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Graph_types)
 - [1.1.1	Undirected graphs](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Undirected_graphs)
 - [1.1.2	Directed graphs](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Directed_graphs)
 - [1.2	Attributes](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Attributes)
 - [1.3	Comments](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Comments)
 - [2	A simple example](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#A_simple_example)
 - [3	Layout programs](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Layout_programs)
 - [4	Limitations](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Limitations)
 - [5	See also](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#See_also)
 - [6	Notes](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#Notes)
 - [7	External links](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#External_links)
 - [Graphviz](https://en.wikipedia.org/wiki/Graphviz)
 - [JavaScript](https://en.wikipedia.org/wiki/JavaScript)
 - [Gephi](https://en.wikipedia.org/wiki/Gephi)
 - [Java](https://en.wikipedia.org/wiki/Java_(programming_language))
 - [Python](https://en.wikipedia.org/wiki/Python_(programming_language))
 - [Google Cloud Platform](https://en.wikipedia.org/wiki/Google_Cloud_Platform)
 - [OmniGraffle](https://en.wikipedia.org/wiki/OmniGraffle)
 - [digital illustration](https://en.wikipedia.org/wiki/Digital_illustration)
 - [macOS](https://en.wikipedia.org/wiki/MacOS)
 - [software framework](https://en.wikipedia.org/wiki/Software_framework)
 - [C++](https://en.wikipedia.org/wiki/C%2B%2B)
 - [Apache Flex](https://en.wikipedia.org/wiki/Apache_Flex)
 - [ActionScript](https://en.wikipedia.org/wiki/ActionScript)
 - [lisp2dot](https://en.wikipedia.org/wiki/Lisp2dot)
 - [Lisp programming language](https://en.wikipedia.org/wiki/Lisp_programming_language)
 - [genetic programming](https://en.wikipedia.org/wiki/Genetic_programming)
 - [Images with Dot source code at commons](https://commons.wikimedia.org/wiki/Category:Images_with_Dot_source_code)
 - [DOT tutorial and specification](http://www.graphviz.org/documentation/)
 - [Drawing graphs with dot](http://www.graphviz.org/pdf/dotguide.pdf)
 - [Node, Edge and Graph Attributes](http://www.graphviz.org/doc/info/attrs.html)
 - [Node Shapes](http://www.graphviz.org/doc/info/shapes.html)
 - [Gallery of examples](http://www.graphviz.org/gallery/)
 - [Webapp generating DOT descriptions of Huffman trees](http://huffman.ooz.ie/)
 - [Online graph visualization in SVG](http://rise4fun.com/agl)
 - [Boost Graph Library](http://www.boost.org/libs/graph/doc/index.html)
 - [v](https://en.wikipedia.org/wiki/Template:Graph_representations)
 - [t](https://en.wikipedia.org/w/index.php?title=Template_talk:Graph_representations&action=edit&redlink=1)
 - [e](https://en.wikipedia.org/w/index.php?title=Template:Graph_representations&action=edit)
 - [Graph (abstract data type)](https://en.wikipedia.org/wiki/Graph_(abstract_data_type))
 - [Adjacency list](https://en.wikipedia.org/wiki/Adjacency_list)
 - [Adjacency matrix](https://en.wikipedia.org/wiki/Adjacency_matrix)
 - [Incidence matrix](https://en.wikipedia.org/wiki/Incidence_matrix)
 - [DGML](https://en.wikipedia.org/wiki/DGML)
 - [GraphML](https://en.wikipedia.org/wiki/GraphML)
 - [GXL](https://en.wikipedia.org/wiki/GXL)
 - [XGMML](https://en.wikipedia.org/wiki/XGMML)
 - [DOT]()
 - [Graph Modelling Language](https://en.wikipedia.org/wiki/Graph_Modelling_Language)
 - [LCF notation](https://en.wikipedia.org/wiki/LCF_notation)
 - [Newick format](https://en.wikipedia.org/wiki/Newick_format)
 - [Trivial Graph Format](https://en.wikipedia.org/wiki/Trivial_Graph_Format)
 - [Graph database](https://en.wikipedia.org/wiki/Graph_database)
 - [Graph drawing](https://en.wikipedia.org/wiki/Graph_drawing)
 - [Linked data](https://en.wikipedia.org/wiki/Linked_data)
 - [Mathematical software](https://en.wikipedia.org/wiki/Category:Mathematical_software)
 - [Graph description languages](https://en.wikipedia.org/wiki/Category:Graph_description_languages)
 - [Graph drawing](https://en.wikipedia.org/wiki/Category:Graph_drawing)
 - [Talk](https://en.wikipedia.org/wiki/Special:MyTalk)
 - [Contributions](https://en.wikipedia.org/wiki/Special:MyContributions)
 - [Create account](https://en.wikipedia.org/w/index.php?title=Special:CreateAccount&returnto=DOT+%28graph+description+language%29)
 - [Log in](https://en.wikipedia.org/w/index.php?title=Special:UserLogin&returnto=DOT+%28graph+description+language%29)
 - [Article](https://en.wikipedia.org/wiki/DOT_(graph_description_language))
 - [Talk](https://en.wikipedia.org/wiki/Talk:DOT_(graph_description_language))
 - [Read](https://en.wikipedia.org/wiki/DOT_(graph_description_language))
 - [Edit](https://en.wikipedia.org/w/index.php?title=DOT_(graph_description_language)&action=edit)
 - [View history](https://en.wikipedia.org/w/index.php?title=DOT_(graph_description_language)&action=history)
 - [Main page](https://en.wikipedia.org/wiki/Main_Page)
 - [Contents](https://en.wikipedia.org/wiki/Portal:Contents)
 - [Featured content](https://en.wikipedia.org/wiki/Portal:Featured_content)
 - [Current events](https://en.wikipedia.org/wiki/Portal:Current_events)
 - [Random article](https://en.wikipedia.org/wiki/Special:Random)
 - [Donate to Wikipedia](https://donate.wikimedia.org/wiki/Special:FundraiserRedirector?utm_source=donate&utm_medium=sidebar&utm_campaign=C13_en.wikipedia.org&uselang=en)
 - [Wikipedia store](https://shop.wikimedia.org/)
 - [Help](https://en.wikipedia.org/wiki/Help:Contents)
 - [About Wikipedia](https://en.wikipedia.org/wiki/Wikipedia:About)
 - [Community portal](https://en.wikipedia.org/wiki/Wikipedia:Community_portal)
 - [Recent changes](https://en.wikipedia.org/wiki/Special:RecentChanges)
 - [Contact page](https://en.wikipedia.org/wiki/Wikipedia:Contact_us)
 - [What links here](https://en.wikipedia.org/wiki/Special:WhatLinksHere/DOT_(graph_description_language))
 - [Related changes](https://en.wikipedia.org/wiki/Special:RecentChangesLinked/DOT_(graph_description_language))
 - [Upload file](https://en.wikipedia.org/wiki/Wikipedia:File_Upload_Wizard)
 - [Special pages](https://en.wikipedia.org/wiki/Special:SpecialPages)
 - [Permanent link](https://en.wikipedia.org/w/index.php?title=DOT_(graph_description_language)&oldid=823807891)
 - [Page information](https://en.wikipedia.org/w/index.php?title=DOT_(graph_description_language)&action=info)
 - [Wikidata item](https://www.wikidata.org/wiki/Special:EntityPage/Q900927)
 - [Cite this page](https://en.wikipedia.org/w/index.php?title=Special:CiteThisPage&page=DOT_%28graph_description_language%29&id=823807891)
 - [Create a book](https://en.wikipedia.org/w/index.php?title=Special:Book&bookcmd=book_creator&referer=DOT+%28graph+description+language%29)
 - [Download as PDF](https://en.wikipedia.org/w/index.php?title=Special:ElectronPdf&page=DOT+%28graph+description+language%29&action=show-download-screen)
 - [Printable version](https://en.wikipedia.org/w/index.php?title=DOT_(graph_description_language)&printable=yes)
 - [Wikimedia Commons](https://commons.wikimedia.org/wiki/Category:DOT_language)
 - [العربية](https://ar.wikipedia.org/wiki/%D8%AF%D9%88%D8%AA_(%D9%84%D8%BA%D8%A9_%D8%A7%D9%84%D9%88%D8%B5%D9%81_%D9%84%D9%84%D8%B1%D8%B3%D9%85_%D8%A8%D9%8A%D8%A7%D9%86%D9%8A))
 - [Deutsch](https://de.wikipedia.org/wiki/DOT_(GraphViz))
 - [Español](https://es.wikipedia.org/wiki/DOT)
 - [Français](https://fr.wikipedia.org/wiki/DOT_(langage))
 - [Magyar](https://hu.wikipedia.org/wiki/DOT_nyelv)
 - [日本語](https://ja.wikipedia.org/wiki/DOT%E8%A8%80%E8%AA%9E)
 - [Português](https://pt.wikipedia.org/wiki/DOT)
 - [Русский](https://ru.wikipedia.org/wiki/DOT_(%D1%8F%D0%B7%D1%8B%D0%BA))
 - [Українська](https://uk.wikipedia.org/wiki/%D0%9C%D0%BE%D0%B2%D0%B0_DOT)
 - [中文](https://zh.wikipedia.org/wiki/DOT%E8%AF%AD%E8%A8%80)
 - [Creative Commons Attribution-ShareAlike License](https://en.wikipedia.org/wiki/Wikipedia:Text_of_Creative_Commons_Attribution-ShareAlike_3.0_Unported_License)
 - [Terms of Use](https://wikimediafoundation.org/wiki/Terms_of_Use)
 - [Privacy Policy](https://wikimediafoundation.org/wiki/Privacy_policy)
 - [Wikimedia Foundation, Inc.](https://www.wikimediafoundation.org/)
 - [Privacy policy](https://wikimediafoundation.org/wiki/Privacy_policy)
 - [About Wikipedia](https://en.wikipedia.org/wiki/Wikipedia:About)
 - [Disclaimers](https://en.wikipedia.org/wiki/Wikipedia:General_disclaimer)
 - [Contact Wikipedia](https://en.wikipedia.org/wiki/Wikipedia:Contact_us)
 - [Developers](https://www.mediawiki.org/wiki/Special:MyLanguage/How_to_contribute)
 - [Cookie statement](https://wikimediafoundation.org/wiki/Cookie_statement)
 - [Mobile view](https://en.m.wikipedia.org/w/index.php?title=DOT_(graph_description_language)&mobileaction=toggle_view_mobile)
 - [Enable previews](https://en.wikipedia.org/wiki/DOT_(graph_description_language)#)
