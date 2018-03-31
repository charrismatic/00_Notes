# UML


Unified Modeling Language UML

https://en.wikipedia.org/wiki/Unified_Modeling_Language


## PlantUML

\*Feels outdated

PlantUML is used to draw UML diagrams, using a simple and human readable text description.
Be careful, because it does not prevent you from drawing inconsistent diagrams (such as having two classes inheriting from each other, for example).
So it's more a drawing tool than a modeling tool.


PlantUML is a component that allows to quickly write

 - [Sequence diagram](http://plantuml.com/sequence-diagram)
 - [Usecase diagram](http://plantuml.com/use-case-diagram)
 - [Class diagram](http://plantuml.com/class-diagram)
 - [Activity diagram](http://plantuml.com/activity-diagram-beta)
 - [the legacy syntax)](http://plantuml.com/activity-diagram-legacy)
 - [Component diagram](http://plantuml.com/component-diagram)
 - [State diagram](http://plantuml.com/state-diagram)
 - [Object diagram](http://plantuml.com/object-diagram)
 - [Deployment diagram](http://plantuml.com/deployment-diagram)
 - [Timing diagram](http://plantuml.com/timing-diagram)

 The following non-UML diagrams are also supported:


 - [Wireframe graphical interface](http://plantuml.com/salt)
 - [Archimate diagram](http://plantuml.com/archimate-diagram)
 - [Specification and Description Language (SDL)](http://plantuml.com/activity-diagram-beta#sdl)
 - [Ditaa diagram](http://plantuml.com/ditaa)
 - [Gantt diagram](http://plantuml.com/gantt-diagram)
 - [Mathematic with AsciiMath or JLaTeXMath notation](http://plantuml.com/asc

   Images can be generated in PNG, in SVG or in LaTeX format. It is also possible to generate ASCII art diagrams (only for sequence diagrams).




### Local installation

Once you've got the idea, you may install locally PlantUML. (http://plantuml.com/faq-install)

You must have Java installed on your machine, and optionally Graphviz software (http://plantuml.com/graphviz-dot) which are used for all diagrams but sequence diagrams and activity beta diagrams.

Then you can then download the jar file plantuml.jar (http://sourceforge.net/projects/plantuml/files/plantuml.jar/download), and save it on your local disk.

An easy way of testing your installation is to launch the GUI by double-clicking on the JAR file.

You can also include PlantUML into your own scripts or documentation tools:

Make a file containing PlantUML commands, either with an editor or when running other software which calls PlantUML.

`sequenceDiagram.txt:`

```
@startuml
Alice -> Bob: test
@enduml
```

Run (or have the software call) PlantUML with this file as input. The output is an image, which either appears in the other software, or is written to an image file on disk.

```
java -jar plantuml.jar sequenceDiagram.txt
```






















Structure diagrams and their applications

Structuring diagrams show a view of a system that shows the structure of the objects, including their classifiers, relationships, attributes and operations:

### Diagrams

UML 2 has many types of diagrams, which are divided into two categories.[4] Some types represent structural information, and the rest represent general types of behavior, including a few that represent different aspects of interactions. These diagrams can be categorized hierarchically as shown in the following class diagram

Behavior diagrams
Behavior diagrams emphasize what must happen in the system being modeled. Since behavior diagrams illustrate the behavior of a system, they are used extensively to describe the functionality of software systems. As an example, the activity diagram describes the business and operational step-by-step activities of the components in a system.

Interaction diagrams
Interaction diagrams, a subset of behavior diagrams, emphasize the flow of control and data among the things in the system being modeled. For example, the sequence diagram shows how objects communicate with each other regarding a sequence of messages.


Structure diagrams
Structure diagrams emphasize the things that must be present in the system being modeled. Since structure diagrams represent the structure, they are used extensively in documenting the software architecture of software systems. For example, the component diagram describes how a software system is split up into components and shows the dependencies among these components.





Use Cases

### Class diagram
- Component diagram
- Composite structure diagram
- Deployment diagram
- Object diagram
- Package diagram
- Profile diagram
- Behaviour diagrams and their applications
- Behaviour diagrams are used to illustrate the behavior of a system, they are used extensively to describe the functionality of software systems. Some Behaviour diagrams are:

### Activity diagram
- State machine diagram
- Use Case Diagram[note 4]
- Interaction diagrams and their applications
- Interaction diagrams are subset of behaviour diagrams and emphasize the flow of control and data among the things in the system being modelled:

###Communication diagram [note 5]
- Interaction overview diagram
- Sequence diagram [note 6]
- Timing diagram [note 7]

### Relationship Diagrams
### Meta modeling
### System Architecture

### Applications Design

Web app use case model
Web app implementation model
Web app deployment model
Web app security model
Web app site map


# Embedded systems
- UML is not a single language, but a set of notations, syntax and semantics to allow the creation of families of languages for particular applications.
- Extension mechanisms in UML like profiles, stereotypes, tags, and constraints can be used for particular applications.
- Use-case modelling to describe system environments, user scenarios, and test cases.
- UML has support for object-oriented system specification, design and modelling.
- Growing interest in UML from the embedded systems and realtime community.
- Support for state-machine semantics which can be used for modelling and synthesis.
- UML supports object-based structural decomposition and refinement.





### Examples  

Sequence Diagram

The sequence -> is used to draw a message between two participants. Participants do not have to be explicitly declared.
To have a dotted arrow, you use -->

It is also possible to use <- and <--. That does not change the drawing, but may improve readability. Note that this is only true for sequence diagrams, rules are different for the other diagrams.

```
@startuml
Alice -> Bob: Authentication Request
Bob --> Alice: Authentication Response

Alice -> Bob: Another authentication Request
Alice <-- Bob: another authentication Response
@enduml
```

Incoming and outgoing messages
You can use incoming or outgoing arrows if you want to focus on a part of the diagram.
Use square brackets to denote the left "[" or the right "]" side of the diagram.

```
@startuml
[-> A: DoWork

activate A

A -> A: Internal call
activate A

A ->] : << createRequest >>

A<--] : RequestCreated
deactivate A
[<- A: Done
deactivate A
@enduml
```

Creole and HTML
It is also possible to use creole formatting:

```
@startuml
participant Alice
participant "The **Famous** Bob" as Bob

Alice -> Bob : hello --there--
... Some ~~long delay~~ ...
Bob -> Alice : ok
note left
  This is **bold**
  This is //italics//
  This is ""monospaced""
  This is --stroked--
  This is __underlined__
  This is ~~waved~~
end note

Alice -> Bob : A //well formatted// message
note right of Alice
 This is <back:cadetblue><size:18>displayed</size></back>
 __left of__ Alice.
end note
note left of Bob
 <u:red>This</u> is <color #118888>displayed</color>
 **<color purple>left of</color> <s:red>Alice</strike> Bob**.
end note
note over Alice, Bob
 <w:#FF33FF>This is hosted</w> by <img sourceforge.jpg>
end note
@enduml
```


Math Notation

You can use AsciiMath or JLaTeXMath notation within PlantUML:

```
@startuml
:<math>int_0^1f(x)dx</math>;
:<math>x^2+y_1+z_12^34</math>;
note right
Try also
<math>d/dxf(x)=lim_(h->0)(f(x+h)-f(x))/h</math>
<latex>P(y|\mathbf{x}) \mbox{ or } f(\mathbf{x})+\epsilon</latex>
end note
@enduml
```

To draw those formulas, PlantUML uses two OpenSource projects:
AsciiMath that converts AsciiMath notation to LaTeX expression.
JLatexMath that displays mathematical formulas written in LaTeX. JLaTeXMath is the best Java library to display LaTeX code.
ASCIIMathTeXImg.js is small enough to be integrated into PlantUML standard distribution.

Since JLatexMath is bigger, you have to download it separately, then unzip the 4 jar files (batik-all-1.7.jar, jlatexmath-minimal-1.0.3.jar, jlm_cyrillic.jar and jlm_greek.jar) in the same folder as PlantUML.jar.


Definition of objects
You define instance of objects using the object keywords.

```
@startuml
object firstObject
object "My Second Object" as o2
@enduml



Adding fields
To declare fields, you can use the symbol ":" followed by the field's name.
@startuml

object user

user : name = "Dummy"
user : id = 123

@enduml
adding data and fields to UML object diagram
It is also possible to ground between brackets {} all fields.
@startuml

object user {
  name = "Dummy"
  id = 123
}

@enduml
```


## Use Cases


### Generate Diagrams in LaTeX with the Tikz package

Starting from version 7997, PlantUML allows to generate diagrams into LaTeX, thanks to Tikz package.

Note that this is still beta, and many things won't probably work. Since we do not want to spend time on features not used, we will wait for users to report bugs here.

You just have to use the flag -tlatex with the command line, or format="latex" with the ANT task.


### Embedded Diagrams in Code Documentation

Doxygen

http://www.stack.nl/~dimitri/doxygen/

You can use Doxygen and PlantUML together to integrate UML diagrams into generated documentation :

as well in Javadocs

__C Source example (Using alias)__

Here is an example how the comment is used for plantuml and doxygen in C source file:

```
\/\*\!
\* @brief This function sends compute requests to
\* ZipComp-Task and waits for response:
\*
\* @startuml{ZipCmd_ZipComp_Communication.png}
\*
\* ZipCmd -> ZipComp: First Compute Request
\* ZipCmd <-- ZipComp: First Compute Response
\*
\* ZipCmd -> ZipComp: Second Compute Request
\* ZipCmd <-- ZipComp: Second Compute Response
\*
\* @enduml
\*
\* @return some value on success.
\*\/
unsigned int ZipCmd_ZipComp_Communication(unsigned short command, unsigned
char \*buffer);
```

\@image is used in doxygen to include an image in documentation. The image file name must be the same is used after \@startuml command (here: ZipCmd_ZipComp_Communication.png).


### Create documents and presentations with embedded diagrams

Docutils allows to conveniently write and generate documents in various output formats (http://docutils.sourceforge.net/sandbox/uml-plantUml/usage):

Replace/patch your docutils distribution with the files in src/ (http://docutils.sourceforge.net/sandbox/uml-plantUml/src)
See usage examples in usage/ including how to setup defaults PlantUML (http://docutils.sourceforge.net/sandbox/uml-plantUml/usage)


### Run a server side UML generator service

PHP API Client Code

To use PlantUML image generation, a text diagram description have to be :

1. Encoded in UTF-8
2. Compressed using Deflate algorithm
3. Reencoded in ASCII using a transformation close to base64

This is exactly what the following encodep() function is doing.

http://plantuml.com/code-php
example code:

```php
function encodep($text) {
	 $data = utf8_encode($text);
	 $compressed = gzdeflate($data, 9);
	 return encode64($compressed);
}

function encode6bit($b) {
	 if ($b < 10) {
	      return chr(48 + $b);
	 }
	 $b -= 10;
	 if ($b < 26) {
	      return chr(65 + $b);
	 }
	 $b -= 26;
	 if ($b < 26) {
	      return chr(97 + $b);
	 }
	 $b -= 26;
	 if ($b == 0) {
	      return '-';
	 }
	 if ($b == 1) {
	      return '_';
	 }
	 return '?';
}

function append3bytes($b1, $b2, $b3) {
	 $c1 = $b1 >> 2;
	 $c2 = (($b1 & 0x3) << 4) | ($b2 >> 4);
	 $c3 = (($b2 & 0xF) << 2) | ($b3 >> 6);
	 $c4 = $b3 & 0x3F;
	 $r = "";
	 $r .= encode6bit($c1 & 0x3F);
	 $r .= encode6bit($c2 & 0x3F);
	 $r .= encode6bit($c3 & 0x3F);
	 $r .= encode6bit($c4 & 0x3F);
	 return $r;
}

function encode64($c) {
	 $str = "";
	 $len = strlen($c);
	 for ($i = 0; $i < $len; $i+=3) {
	        if ($i+2==$len) {
	              $str .= append3bytes(ord(substr($c, $i, 1)), ord(substr($c, $i+1, 1)), 0);
	        } else if ($i+1==$len) {
	              $str .= append3bytes(ord(substr($c, $i, 1)), 0, 0);
	        } else {
	              $str .= append3bytes(ord(substr($c, $i, 1)), ord(substr($c, $i+1, 1)),
	                  ord(substr($c, $i+2, 1)));
	        }
	 }
	 return $str;
}
```


### Advanced usage
- [ascii_art](http://plantuml.com/ascii-art)
- [command_line](http://plantuml.com/command-line)
- [ditaa](http://plantuml.com/ditaa)
- [dot](http://plantuml.com/dot)
- [eps](http://plantuml.com/eps)
- [gui](http://plantuml.com/gui)
- [handwritten](http://plantuml.com/handwritten)
- [jcckit](http://plantuml.com/jcckit)
- [link](http://plantuml.com/link)
- [oregon-trail](http://plantuml.com/oregon-trail)
- [pdf](http://plantuml.com/pdf)
- [sources](http://plantuml.com/sources)
- [statistics](http://plantuml.com/statistics-report)
- [steve](http://plantuml.com/steve)
- [smetana02](http://plantuml.com/smetana02)
- [sudoku](http://plantuml.com/sudoku)
- [svg](http://plantuml.com/svg)
- [unicode](http://plantuml.com/unicode)
- [vizjs](http://plantuml.com/vizjs)
- [xearth](http://plantuml.com/xearth)
- [xmi](http://plantuml.com/xmi)

Plugins

 - [ant task](http://plantuml.com/ant-task)
 - [api](http://plantuml.com/api)
 - [ckeditordemo](http://plantuml.com/ckeditordemo)
 - [code groovy](http://plantuml.com/code-groovy)
 - [code javascript asynchronous](http://plantuml.com/code-javascript-asynchronous)
 - [code javascript synchronous](http://plantuml.com/code-javascript-synchronous)
 - [code php](http://plantuml.com/code-php)
 - [demo javascript asynchronous](http://plantuml.com/demo-javascript-asynchronous)
 - [demo javascript synchronous](http://plantuml.com/demo-javascript-synchronous)
 - [doclet](http://plantuml.com/doclet)
 - [docutils](http://plantuml.com/docutils)
 - [doxygen](http://plantuml.com/doxygen)
 - [eclipse](http://plantuml.com/eclipse)
 - [emacs](http://plantuml.com/emacs)
 - [ftp](http://plantuml.com/ftp)
 - [javadoc](http://plantuml.com/javadoc)
 - [jquery](http://plantuml.com/jquery)
 - [latex](http://plantuml.com/latex)
 - [pmwiki](http://plantuml.com/pmwiki)
 - [server](http://plantuml.com/server)
 - [tinymce](http://plantuml.com/tinymce)
 - [word](http://plantuml.com/word)



---

Integrations with using PlantUML

Wikis and Forums
- [Integrate it with WordPress](https://wordpress.org/plugins/plantuml-renderer)
- [Integrate it with Discourse Forum](https://github.com/discourse/discourse-plantuml)
- [Integrate it with NodeBB Forum](https://www.npmjs.com/package/nodebb-plugin-plantuml)
- [Integrate it with MediaWiki](https://github.com/pjkersten/PlantUML)
- [Integrate it with Redmine](https://github.com/luckval/wiki_external_filter)
- [Integrate it with Confluence](https://studio.plugins.atlassian.com/wiki/display/PUML/Confluence+PlantUML+Plugin)
- [Integrate it with Confluence Cloud](https://marketplace.atlassian.com/plugins/com.mxgraph.confluence.plugins.plantuml/cloud/overview)
- [Integrate it with Trac](http://trac-hacks.org/wiki/PlantUmlMacro)
- [Integrate it with DokuWiki](http://www.dokuwiki.org/plugin:plantuml)
- [Weatherwax issue solved](http://forum.plantuml.net/1257/any-reason-the-new-release-would-stop-working-in-dokuwiki&show=1288#a1288)
- [Integrate it with XWiki](http://extensions.xwiki.org/xwiki/bin/view/Extension/PlantUML+Macro)
- [Integrate it with PmWiki](http://plantuml.com/pmwiki)
- [Integrate it with TiddlyWiki](https://github.com/anibalch/tiddlywiki-plantuml)
- [Integrate it with Ikiwiki](https://github.com/robtaylor/ikiwiki-uml)
- [Integrate it with Jekyll](https://rubygems.org/gems/jekyll-plantuml)
- [Integrate it with Publet](https://github.com/eikek/publet-plantuml)
- [Integrate it with Zim](https://github.com/rolfkleef/zim-plantuml)
- [Integrate it with Fitnesse](https://github.com/sbellus/fitnesse-plantuml-plugin)
- [Integrate it with Slack](https://github.com/taichi/umlbot)

Text Editors and IDE

- [Integrate it with TinyMCE Editor](http://plantuml.com/tinymce)
- [Integrate it with CKeditor](http://plantuml.com/ckeditordemo)
- [Use the Eclipse Plugin](http://plantuml.com/eclipse)
- [Use a NetBeans Plugin](http://plugins.netbeans.org/plugin/49069/plantuml)
- [Use it with NetBeans](http://randomthoughtsonjavaprogramming.blogspot.com/2012/02/plantuml-and-netbeans.html)
- [Use it with Intellij idea](http://plugins.intellij.net/plugin/?idea&id=7017)
- [Run it directly from Word](http://plantuml.com/word)
- [Use Gizmo to render PlantUML diagrams within Word](https://code.google.com/p/plantuml-word-add-in-vsto/)
- [Run it directly from Open Office](http://sourceforge.net/projects/plantuml/files/plantuml.odt/download)
- [Run it from Emacs](http://plantuml.com/emacs)
- [Run it from Sublime Text Editor](https://github.com/jvantuyl/sublime_diagram_plugin)
- [Run it from VIM](http://www.vim.org/scripts/script.php?script_id=3538)
- [F5 key](http://zbz5.net/sequence-diagrams-vim-and-plantuml)
- [Vim PlantUML Syntax](https://github.com/aklt/plantuml-syntax)
- [PaperColor Theme](https://github.com/NLKNguyen/papercolor-theme)
- [Use it with LaTeX](http://plantuml.com/latex)
- [Use it with mbeddr](http://mbeddr.wordpress.com/2013/02/14/visualizations-reloaded/)
- [Use it with GEdit](http://ruudbeukema.nl/gedit-plantuml-plugin)
- [Use it with Brackets](https://github.com/KyleKorndoerfer/BracketsUML)
- [Use it with Atom](https://atom.io/packages/plantuml)
- [PlantUML language package for Atom](https://atom.io/packages/language-plantuml)
- [UDL for Notepad++ to support the PlantUML language syntax](https://github.com/brim4brim/PlantUML_Notepad-_UDL)
- [Visual Studio Code plugin](https://marketplace.visualstudio.com/items?itemName=okazuki.okazukiplantuml)
- [Another Visual Studio Code plugin](https://marketplace.visualstudio.com/items?itemName=jebbs.plantuml)
- [PlantUML syntax highlighter](https://marketplace.visualstudio.com/items?itemName=Yog.yog-plantuml-highlight)
- [Generates UML class diagrams from MATLAB m-code](http://fr.mathworks.com/matlabcentral/fileexchange/59722-m2uml/content/html/m2uml_v11_hyperlinks_tooltips_publish.html)


Programming Languages
- [Use it with Markdown](https://github.com/mikitex70/plantuml-markdown)
- [Use it from HTML code with JQuery](http://plantuml.com/jquery)
- [Call it from Javascript](http://plantuml.com/demo-javascript-asynchronous)
- [Call it from Javascript](http://plantuml.com/demo-javascript-synchronous)
- [JOII-based classes diagram generator](https://github.com/haroldiedema/joii-diagram)
- [Call it from PHP](http://plantuml.com/demophp.php)
- [Call it from Java](http://plantuml.com/api)
- [Call it from Python](https://github.com/SamuelMarks/python-plantuml)
- [Another python remote client interface](http://pythonhosted.org/plantuml/)
- [Integration with IPython](http://nbviewer.ipython.org/gist/sberke/bb90ff09193a8888d7f7)
- [Python tools for PlantUML](https://github.com/deadbok/py-puml-tools)
- [Call it from Groovy](http://plantuml.com/code-groovy)
- [Use builder pattern with Groovy PlantUML builder](https://bitbucket.org/novakmi/plantumlbuilder)
- [Use command line](http://plantuml.com/command-line)
- [Write an ANT task](http://plantuml.com/ant-task)
- [Use the Maven2 plugin](http://mvnrepository.com/artifact/com.github.jeluard/maven-plantuml-plugin)
- [Use it with Gradle](https://github.com/janvolck/gradle-plantuml-plugin)
- [Use it on Salesforce.com with Apex](https://github.com/rsoesemann/plantuml4force)
- [A Leiningen plugin for generating UML diagrams using PlantUML](https://github.com/vbauer/lein-plantuml)
- [Emacs Lisp DSL for PlantUML](https://github.com/tj64/puml)
- [Generate PHP classes from your PlantUML diagram](https://github.com/mk-conn/plant2code)


Documentation Generators

- [Use it with LyX.](http://rajendersaini.wordpress.com/2014/01/22/how-to-configure-lyx-to-include-plant-uml-diagrams/)
- [Reverse Engineering with PlantUML Dependency](http://plantuml-depend.sourceforge.net/)
- [Use it with Almost Plain Text (APT) files](http://maven.apache.org/doxia/references/apt-format.html)
- [Generate diagrams with Javadoc](http://plantuml.com/javadoc)
- [Generate diagrams with Javadoc and PlantUML Taglet](https://mnlipp.github.io/jdrupes-taglets/plantuml-taglet/javadoc/overview-summary.html)
- [Use it with Doxygen](http://plantuml.com/doxygen)
- [Integrate it with docutils](http://plantuml.com/docutils)
- [Use it with AsciiDoc](http://code.google.com/p/asciidoc-plantuml/wiki/Usage)
- [Use it with Asciidoctor](http://asciidoctor.org/news/2014/02/18/plain-text-diagrams-in-asciidoctor/)
- [Generate UML description from Java sources using a doclet](https://github.com/talsma-ict/umldoclet)
- [Use it with Pegdown](https://github.com/Abnaxos/pegdown-doclet)
- [Use enhanced Doclet](https://github.com/gboersma/uml-java-doclet)
- [Generate UML from C# sources](http://nplant.org/)
- [Generate UML from Scaladoc](https://github.com/pnerg/sbt-scaladoc-settings-plugin)
- [Integrate it with Sphinx](http://pypi.python.org/pypi/sphinxcontrib-plantuml)
- [Generate PlantUML diagrams from SqlALchemy models](http://pypi.python.org/pypi/sadisplay)
- [Generate PlantUML diagram for Lua with LDoc](https://github.com/tysenmoore-xse/LDoc)
- [Generate PlantUML diagrams from grails project sources](https://github.com/david-w-millar/grails-plantuml-plugin)
- [Create PlantUML class diagrams from your PHP source.](https://github.com/davidfuhr/php-plantumlwriter)
- [Integrate PlantUML with ROBODoc.](https://github.com/woudshoo/cl-robodoc)
- [Integrate PlantUML with Pandoc.](https://github.com/jgm/pandocfilters)
- [Integrate PlantUML with Sbt, the interactive build tool.](https://github.com/Banno/sbt-plantuml-plugin)
- [Gulp plugin for automated generation of diagrams.](https://www.npmjs.com/package/gulp-puml)
- [Node.Js module for processing PlantUML](https://www.npmjs.com/package/esf-puml)
- [Another Node.js module and CLI](https://www.npmjs.com/package/node-plantuml)
- [Plugin for TypeDoc for TypeScript programs](https://www.npmjs.com/package/typedoc-plantuml)
- [Maven plugin to inspect at compile time relations on Java classes and to render PlantUML class diagram](https://github.com/juanmf/Java2PlantUML)
- [Create and update UML diagrams inside of Google Docs](https://sites.google.com/site/plantumlgizmo/home)
- [Use the online servlet](http://www.plantuml.com/plantuml)
- [(Explanation here)](http://plantuml.com/server)
- [Codeuml - design UML diagrams as fast as you can code](http://www.codeuml.com/)
- [PlantText UML Editor](http://www.planttext.com/)
- [Seeduml](http://seeduml.com/)
- [EtherPlant on Etherpad](http://andresmrm.github.io/EtherPlant/src/etherplant.html)
- [Emacs/vim online Editor](http://sujoyu.github.io/plantuml-previewer/)
- [TexWriting online Editor](http://www.texwriting.com/uml/new)

Other
- [Use the Docker repository](https://hub.docker.com/r/plantuml/plantuml-server)
- [PlantUML with GitLab.org / GitLab Community Edition](https://gitlab.com/gitlab-org/gitlab-ce/blob/master/doc/administration/integration/plantuml.md)
- [PlantUML with Github Gist and Gitlab Support](https://github.com/linux-china/plantuml-gist)
- [A GitBucket plugin renders PlantUML sources](https://github.com/nus/gitbucket-plantuml-plugin)
- [Auto generating UML diagrams from SAP/ABAP code](http://scn.sap.com/community/abap/blog/2013/08/21/auto-generating-uml-diagrams-from-abap-code)
- [Puse editor](http://eldemcan.github.io/Puse/)
- [PlantUML Chrome extension](https://chrome.google.com/webstore/detail/plantuml-viewer/legbfeljfbjgfifnkmpoajgpgejojooj)
- [Cloud version with Renderist on herokuapp.com](http://renderist.herokuapp.com/)
- [PlantUML QEditor written in Qt4](https://sourceforge.net/projects/plantumlqeditor)
- [Sketchlet : a software designer's sketchbook](http://www.youtube.com/watch?v=f9MvEiCgM3Q)
- [Double-click on the .jar to run it](http://plantuml.com/gui)
- [PlantUML Editor: A fast and simple UML editor using WPF Dotnet](http://code.google.com/p/plantumleditor/)
- [Install your own server](http://plantuml.com/server)
- [Use it with textcube](https://github.com/mete0r/textcube-plantuml)
- [Gravizo.com](http://www.gravizo.com/)


ref: http://plantuml.com/running
