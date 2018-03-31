# Graphviz - Graph Visualization Software

graphviz.gitlab.io


## Readme
This package facilitates the creation and rendering of graph descriptions in the DOT language of the Graphviz graph drawing software (master repo) from Python.

Create a graph object, assemble the graph by adding nodes and edges, and retrieve its DOT source code string. Save the source code to a file and render it with the Graphviz installation of your system.

Use the view option/method to directly inspect the resulting (PDF, PNG, SVG, etc.) file with its default application. Graphs can also be rendered and displayed within Jupyter notebooks (formerly known as IPython notebooks, example) as well as the Jupyter Qt Console.





Links

GitHub: https://github.com/xflr6/graphviz
PyPI: https://pypi.python.org/pypi/graphviz
Documentation: https://graphviz.readthedocs.io
Changelog: https://graphviz.readthedocs.io/en/latest/changelog.html
Issue Tracker: https://github.com/xflr6/graphviz/issues
Download: https://pypi.python.org/pypi/graphviz#downloads


Installation
This package runs under Python 2.7, and 3.4+, use pip to install:

```
pip install graphviz
```
To render the generated DOT source code, you also need to install Graphviz (https://www.graphviz.org/download/).

Make sure that the directory containing the `dot` executable is on your systems’ path.

### Quickstart

Create a graph object:

```
>>> from graphviz import Digraph
>>> dot = Digraph(comment='The Round Table')
>>> dot  
<graphviz.dot.Digraph object at 0x...>
```


Add nodes and edges:
```
>>> dot.node('A', 'King Arthur')
>>> dot.node('B', 'Sir Bedevere the Wise')
>>> dot.node('L', 'Sir Lancelot the Brave')
>>> dot.edges(['AB', 'AL'])
>>> dot.edge('B', 'L', constraint='false')
```

Check the generated source code:
```
>>> print(dot.source)  
// The Round Table
digraph {
    A [label="King Arthur"]
    B [label="Sir Bedevere the Wise"]
    L [label="Sir Lancelot the Brave"]
    A -> B
    A -> L
    B -> L [constraint=false]
}
```
Save and render the source code, optionally view the result:
```

>>> dot.render('test-output/round-table.gv', view=True)  
'test-output/round-table.gv.pdf'
```

See also
pygraphviz – full-blown interface wrapping the Graphviz C library with SWIG
graphviz-python – official Python bindings (documentation)
pydot – stable pure-Python approach, requires pyparsing


## Example

`cluster.py`

```
# cluster.py - http://www.graphviz.org/content/cluster

from graphviz import Digraph

g = Digraph('G', filename='cluster.gv')

# NOTE: the subgraph name needs to begin with 'cluster' (all lowercase)
#       so that Graphviz recognizes it as a special cluster subgraph

with g.subgraph(name='cluster_0') as c:
    c.attr(style='filled')
    c.attr(color='lightgrey')
    c.node_attr.update(style='filled', color='white')
    c.edges([('a0', 'a1'), ('a1', 'a2'), ('a2', 'a3')])
    c.attr(label='process #1')

with g.subgraph(name='cluster_1') as c:
    c.node_attr.update(style='filled')
    c.edges([('b0', 'b1'), ('b1', 'b2'), ('b2', 'b3')])
    c.attr(label='process #2')
    c.attr(color='blue')

g.edge('start', 'a0')
g.edge('start', 'b0')
g.edge('a1', 'b3')
g.edge('b2', 'a3')
g.edge('a3', 'a0')
g.edge('a3', 'end')
g.edge('b3', 'end')

g.node('start', shape='Mdiamond')
g.node('end', shape='Msquare')

g.view()

```


structs.py

```
# structs.py - http://www.graphviz.org/doc/info/shapes.html#html

from graphviz import Digraph

s = Digraph('structs', node_attr={'shape': 'plaintext'})

s.node('struct1', '''<
<TABLE BORDER="0" CELLBORDER="1" CELLSPACING="0">
  <TR>
    <TD>left</TD>
    <TD PORT="f1">middle</TD>
    <TD PORT="f2">right</TD>
  </TR>
</TABLE>>''')
s.node('struct2', '''<
<TABLE BORDER="0" CELLBORDER="1" CELLSPACING="0">
  <TR>
    <TD PORT="f0">one</TD>
    <TD>two</TD>
  </TR>
</TABLE>>''')
s.node('struct3', '''<
<TABLE BORDER="0" CELLBORDER="1" CELLSPACING="0" CELLPADDING="4">
  <TR>
    <TD ROWSPAN="3">hello<BR/>world</TD>
    <TD COLSPAN="3">b</TD>
    <TD ROWSPAN="3">g</TD>
    <TD ROWSPAN="3">h</TD>
  </TR>
  <TR>
    <TD>c</TD>
    <TD PORT="here">d</TD>
    <TD>e</TD>
  </TR>
  <TR>
    <TD COLSPAN="3">f</TD>
  </TR>
</TABLE>>''')

s.edges([('struct1:f1', 'struct2:f0'), ('struct1:f2', 'struct3:here')])

s.view()
```




---

__Writing scripts to create Graphviz diagrams__

Now that you understand the basics of the Graphviz DOT language, you can start creating scripts to dynamically create a DOT file. This allows you to dynamically create diagrams that are always accurate and up-to-date.

The first example in Listing 5 is a bash shell script that connects to a Hardware Management Console (HMC) and gathers information about the managed servers and logical partitions (LPARs) and creates a DOT output with this information.

Listing 5. hmc_to_dot.sh

```
#!/bin/bash

HMC="$1"

serverlist=`ssh -q -o "BatchMode yes" $HMC lssyscfg -r sys -F "name" | sort`

echo "graph hmc_graph{"

for server in $serverlist; do
    echo " \"$HMC\" -- \"$server\" "
    lparlist=`ssh -q -o "BatchMode yes" $HMC lssyscfg -m $server -r lpar -F "name" | sort`
    for lpar in $lparlist; do
             echo "    \"$server\" -- \"$lpar\" "
    done
done

echo "}"
```


The script is run by providing an HMC server name as an argument to the script. The script sets the first parameter passed as the $HMC variable. The $serverlist variable is set by connecting to the HMC and getting a list of all the managed servers under that HMC’s control. These managed servers are looped through, and for each one, the script prints a line of "HMC" -- "server" which instructs Graphviz to draw a line between each HMC and its managed servers. Also, for each managed server, the script connects to the HMC again and gets a list of LPARs on that managed system, then loop through them printing a line of "server" -- "LPAR".This instructs Graphviz to draw a line between each managed server and its LPARs.

This script requires that you have Secure Shell (SSH) key authentication setup between the server on which you are running the script and your HMC.


---
http://bijanebrahimi.github.io/blog/graphviz-in-markdown.html
Graphviz in markdown
Or How I use dot graph in Gitlab's Markdown formatted files

https://github.com/TLmaK0/gravizo

There is a good tutorial on How to include graphviz graphs in github. Basically it introduced me to an online web service which takes graphviz scripts as part of a url query string and renders it into an image type. It is a very good idea for many reasons. One, the graph is still plain text and searchable inside source files, Second, editing an already drawn graph inside a wiki page is now very easy and the dot files are pretty easy to write.



Problem?
So, what's the problem? As I said, It was a good idea (even our Project Manager liked it since we're about to move our project's knowledge base into a local Gitlab's server, way better than using asciiflow.com). The Only problem was that It was an unnecessary dependency to use an remote web-service and I thought why not I build our own local version of it? So, I did.

Requirments
Since we already had an omnibus version of gitlab running on a debian server, I tried to write a simple php-script serving on the already running bundle version of nginx in gitlab omnibus package. The following is the work around. If you have a similiar but not quiet the same situation, you may consider changing the following steps as fits your needs so I try to explain as much as needed.



Gitlab's Nginx, a proxy to local Apache
Since I knew php way better than ruby (still I'm not a php developer anymore), I deided to write my graphviz web-service in php language, so I installed apache (running on port 8090) and php and no to forget, the graphviz command tools:

```
$ apt-get install apache2 libapache2-mod-php5 graphviz
$ editor /etc/apache2/ports.conf
Listen 8090
$ editor /etc/apache2/sites-enabled/000-default.conf
<VirtualHost *:8090>
  ServerAdmin webmaster@localhost
  DocumentRoot /var/www/webtools.company_domain.net
  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

```

and set the gitlab's nginx to work as a proxy to my apache web-server:


```
$ editor /var/opt/gitlab/nginx/conf/webtools.company_domain.net
server {
  listen *:80;
  server_name webtools.company_domain.net;
  access_log /var/log/webtools.company_domain.net.access.log;
  error_log /var/log/webtools.company_domain.net.error.log;
  location / {
    proxy_pass http://127.0.0.1:8090;
  }
}

Now we shoould reconfigure gitlab to create the new nginx configuration file from our changes in /etc/gitlab/gitlab.rb:

```
$ nano /etc/gitlab/gitlab.rb
nginx['custom_nginx_config'] = "include /var/opt/gitlab/nginx/conf/webtools.company_domain.net;"

```

Now the only missing pieces is the actual php script. Since it's a prototype version of our graphviz web service, we only render svg formats:



```
$ gitlab-ctl reconfigure
$ gitlab-ctl restart nginx

```
Now, the following markdown script should nicely render as a svg image in our rendered markdown wiki pages:




```
$ nano /var/www/webtools.company_domain.net/graphviz/index.php
<?php
  $dot_content = rawurldecode($_SERVER['QUERY_STRING']);
  $dot_file = tempnam("/tmp", "dot_");
  file_put_contents($dot_file, $dot_content);
  header('Content-type: image/svg+xml');
  system("dot -Tsvg ".$dot_file);
  unlink($dot_file);
?>

```


Hope it helps other people as well :-)
```
![Alt Text](http://webtools.company_domain.net/graphviz/?
digraph G {
    aize ="4,4";
    main [shape=box];
    main -> parse [weight=8];
    parse -> execute;
    main -> init [style=dotted];
    main -> cleanup;
    execute -> { make_string; printf};
    init -> make_string;
    edge [color=red];
    main -> printf [style=bold,label="100 times"];
    make_string [label="make a string"];
    node [shape=box,style=filled,color=".7 .3 1.0"];
    execute -> compare;
  })

```


---



### INSTALL

https://graphviz.gitlab.io/download/


#### Build from source
Source Code
Source code packages for the latest stable and development versions of Graphviz are available, along with instructions for anonymous access to the sources using Git.

__Dependencies__
Consider these versions as the minimum suitable for Graphviz, but please always use the latest available version of these packages. If there is any problem with building Graphviz against a latest version, please generate a bug report as we would very much like to know about it.

```
cairo-1.1.10.tar.gz                        [optional (required for libpangocairo), recommended]             -  http://cairographics.org/
expat-2.0.0.tar.gz                         [optional (required for HTML-like labels), recommended]          -  http://expat.sourceforge.net/
freetype-2.1.10.tar.gz                     [optional (required for libpangocairo and for gd), recommended]  -  http://www.freetype.org/
gd-2.0.34.tar.gz                           [optional, deprecated but needed for GIF output]                 -  http://www.boutell.com/gd/
fontconfig-2.3.95.tar.gz                   [optional (required for libpangocairo and for gd), recommended]  -  http://www.fontconfig.org/wiki/
urw-fonts.tar.gz                           [optional, required if fontconfig is unable to find any fonts]   -  ftp://ftp.gimp.org/pub/gimp/fonts
glib-2.11.1.tar.gz                         [optional (required for libpangocairo), recommended]             -  http://www.gtk.org/
libpng-1.2.10.tar.gz                       [optional (required for cairo, optional for gd), recommended]    -  http://www.libpng.org/pub/png/
pango-1.12.4.tar.gz                        [optional, recommended]  provides libpangocairo                  -  http://www.pango.org/
zlib-1.2.3.tar.gz                          [optional (required for libpng), recommended]                    -  http://www.zlib.net/
GTS                                        [optional (required for sfdp, prism, smyrna), recommended]       -  http://gts.sourceforge.net/
GTK+                                       [optional (required for smyrna)]                                 -  http://www.gtk.org/
GtkGLExt                                   [optional (required for smyrna)]                                 -  http://projects.gnome.org/gtkglext/
Glade                                      [optional (required for smyrna)]                                 -  http://glade.gnome.org/
Glut                                       [optional (required for smyrna)]                                 -  http://www.opengl.org/resources/libraries/glut/
```

__Tools__
autoconf-2.59.tar.gz                      [if building from git]     -  http://ftp.gnu.org/gnu/autoconf/
automake-1.9.6.tar.gz                     [if building from git]     -  http://ftp.gnu.org/gnu/automake/
bison-2.3.tar.gz                          [if building from git]     -  http://ftp.gnu.org/gnu/bison/
flex-2.5.4a.tar.gz                        [if building from git]     -  http://ftp.gnu.org/non-gnu/flex/
gcc-4.1.1.tar.bz2                                                    -  http://ftp.gnu.org/gnu/gcc/
gcc-g++-4.1.1.tar.bz2                                                -  http://ftp.gnu.org/gnu/gcc/
ghostscript-8.54-gpl.tar.gz                                          -  http://pages.cs.wisc.edu/~ghost/
libtool-1.5.22.tar.gz                     [if building from git]     -  http://ftp.gnu.org/gnu/libtool/
pkg-config-0.20.tar.gz                                               -  http://www.freedesktop.org/wiki/Software/pkg-config/
swig-1.3.29.tar.gz                                                   -  http://www.swig.org/




Install from release


Executable Packages
Packages marked with an asterisk(*) are provided by outside parties. We list them for convenience, but disclaim responsibility for the contents of these packages.

Linux
Stable and development rpms for Redhat Enterprise, or Centos systems
Stable and development rpms for Fedora systems
Stable and development debs for Ubuntu systems
Debian package*
Ubuntu Precise, Raring packages*
Fedora* On a working Fedora system, use yum list "graphviz*" to see all available Graphviz packages.
Windows
Development Windows install packages
Stable 2.38 Windows install packages
Cygwin Ports* provides a port of Graphviz to Cygwin.
WinGraphviz* Win32/COM object (dot/neato library for Visual Basic and ASP).
Mostly correct notes for building Graphviz on Windows can be found here.

Mac
MacPorts* provides both stable and development versions of Graphviz and the Mac GUI Graphviz.app. These can be obtained via the ports “graphviz”, “graphviz-devel”, “graphviz-gui” and “graphviz-gui-devel”.
Homebrew* has a Graphviz port.

Other Unix
FreeBSD*


### Theory and Publication

Graphviz Papers

 - [Graphviz and Dynagraph - Static and Dynamic Graph Drawing Tools](https://graphviz.gitlab.io/_pages/Documentation/EGKNW03.pdf)
 - [cite](http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.96.3776)
 - [An open graph visualization system and its applications to software engineering](https://graphviz.gitlab.io/_pages/Documentation/GN99.pdf)
 - [cite](http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.106.5621)
 - [Graph Drawing by Stress Majorization](https://graphviz.gitlab.io/_pages/Documentation/GKN04.pdf)
 - [cite](http://www.springerlink.com/content/jrn52j7cx8grcy6v)
 - [Topological Fisheye Views for Visualizing Large Graphs](https://graphviz.gitlab.io/_pages/Documentation/GKN04a.pdf)
 - [A method for drawing directed graphs](https://graphviz.gitlab.io/_pages/Documentation/TSE93.pdf)
 - [cite](http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.3.8982)
 - [Efficient and high quality force-directed graph drawing](http://yifanhu.net/PUB/graph_draw.pdf)
 - [Improved Circular Layouts](https://graphviz.gitlab.io/_pages/Documentation/GK06.pdf)
 - [cite](http://www.springerlink.com/content/e0t5172328185qh0)
 - [Efficient and High Quality Force-Directed Graph Drawing](https://graphviz.gitlab.io/_pages/Documentation/Hu05.pdf)
 - [cite](http://www.mathematica-journal.com/issue/v10i1/graph_draw.html)
 - [Implementing a General-Purpose Edge Router](https://graphviz.gitlab.io/_pages/Documentation/DGKN97.pdf)
 - [cite](http://www.springerlink.com/content/bh38049246662058)
 - [Improved Force-Directed Layouts](https://graphviz.gitlab.io/_pages/Documentation/GN98.pdf)
 - [cite](http://www.springerlink.com/content/9lpu2h2qkgjlc9r5)
 - [GMap: Visualizing graphs and clusters as maps](https://graphviz.gitlab.io/_pages/Documentation/GHK09.pdf)
 - [cite](http://citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.154.8753)
 - [Efficient Node Overlap Removal Using a Proximity Stress Model](https://graphviz.gitlab.io/_pages/Documentation/GH10.pdf)
 - [cite](http://www.springerlink.com/content/v631x1202456450u)
 - [On-line Hierarchical Graph Drawing](https://graphviz.gitlab.io/_pages/Documentation/NW01.pdf)

 Graph Drawing


 - [Wikipedia entry.](http://en.wikipedia.org/wiki/Graph_drawing)
 - [short article on Graphviz](http://en.wikipedia.org/wiki/Graphviz)
 - [graphdrawing.org](http://www.graphdrawing.org/index.html)
 - [Graph Drawing](http://dmoztools.net/Science/Math/Combinatorics/Software/Graph_Drawing/)
 - [Survey (Franz Brandenburg talk notes in Powerpoint)](http://www.csse.monash.edu.au/~gfarr/research/GraphDrawing02-Mel.ppt)
 - [Marks et al note on history of graph drawing](http://www.merl.com/papers/TR2001-49/)
 - [David Eppstein's Geometry in Action](http://www.ics.uci.edu/~eppstein/gina/gdraw.html)
 - [Graph Drawing: Algorithms for the Visualization of Graphs](http://www.amazon.com/exec/obidos/tg/detail/-/0133016153/qid=1089229182/sr=8-1/ref=sr_8_xs_ap_i1_xgl14/103-2475216-1750235?v=glance&s=books&n=507846)
 - [Graph Drawing Software (Mathematics and Visualization)](http://www.amazon.com/exec/obidos/tg/detail/-/3540008810/qid=1089229286/sr=1-3/ref=sr_1_3/103-2475216-1750235?v=glance&s=books)
 - [Drawing Graphs: Methods and Models](http://www.amazon.com/exec/obidos/tg/detail/-/3540420622/qid=1089229286/sr=1-8/ref=sr_1_8/103-2475216-1750235?v=glance&s=books)
 - [Handbook of Graph Drawing and Visualization](http://www.amazon.com/Handbook-Visualization-Discrete-Mathematics-Applications/dp/1584884126%3FSubscriptionId%3DAKIAILSHYYTFIVPWUY6Q%26tag%3Dduckduckgo-d-20%26linkCode%3Dxm2%26camp%3D2025%26creative%3D165953%26creativeASIN%3D1584884126)
 - [(On-line version)](http://cs.brown.edu/~rt/gdhandbook/)


 - IEEE Infovis Symposia [current](http://vis.computer.org/) [past](http://www.infovis.org/)
 - [Information Visualization Journal](http://www.palgrave-journals.com/ivs/)
 - [FlowingData ](http://flowingdata.com/)
 - [Infothestics](http://infosthetics.com/)
 - [York U. Gallery of Visualization](http://www.datavis.ca/gallery/index.php)
 - [Statistics and Statistical Graphics Resources](http://www.math.yorku.ca/SCS/StatResource.html)
 - [Stanford University course bilbiography
](http://graphics.stanford.edu/courses/cs348c-96-fall/resources.html)
 - [Stanford University Data Journalism](http://datajournalism.stanford.edu/)
 - [Xerox PARC projects](http://www2.parc.com/istl/projects/uir/projects/ii.html)
 - [Software Visualization at Georgia Tech](http://www.gvu.gatech.edu/)





 ### References

 Using Graphviz to generate automated system diagrams

https://www.ibm.com/developerworks/aix/library/au-aix-graphviz/

 Graphviz Documentation https://graphviz.readthedocs.io/en/stable/

 WebGraphviz Online rendering tool  
 http://www.webgraphviz.com/


 https://emden.github.io/
 The master GIT Repository for graphviz can be found at:


 https://gitlab.com/graphviz/graphviz/

 The Graphviz documents are currently hosted at https://emden.github.io/


 Graph Visualization ( https://graphviz.org/about/ )

https://graphviz.gitlab.io/documentation/
