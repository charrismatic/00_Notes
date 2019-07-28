
---

## Check Website Links (commandline tool)
Language=Any
Requires=Linkchecker (commandline tool), Zenity
Menu Name=Check Links...
Description=Check for broken Links of a Website



```
#!/bin/sh
exec linkchecker `zenity --entry --title="Links prüfen" --width="500" --height="150" --text="Enter the URL to validate:\n " --entry-text "http://www." ` &
```




---

## Check Website Links (GUI)
Language=Any
Requires=gURLchecker, Zenity
Menu Name=Check for broken Links of a Website
Description=Validate Links of a Website



```
#!/bin/sh
exec gurlchecker `zenity --entry --title="Links prüfen" --width="500" --height="150" --text="Enter the URL to validate:\n " --entry-text "http://www." ` &
```




---

## Code Snippets
Language=Any
Requires=pySnippet
Menu Name=Code Snippets
Description=Insert Code Snippets



```
#!/bin/sh
python /usr/bin/pysnippet.py &
```




---

## Comparing Files
Language=Any
Requires=Meld, Zenity
Menu Name=Compare With...
Description=Compare current document with another document



```
#!/bin/sh
TITLE="Compare With..."
TEXT="Compare $GEDIT_CURRENT_DOCUMENT_NAME with:"
BROWSE=" browse..."
FILE=
while [ -z "$FILE" ]; do
        FILE=`zenity --list --title="$TITLE" --text="$TEXT" --width=640 --height=320 --column=Documents $GEDIT_DOCUMENTS_PATH "$BROWSE"`
        if [ "$FILE" == "$BROWSE" ]; then
                FILE=`zenity --file-selection --title="$TITLE" --filename="$GEDIT_CURRENT_DOCUMENT_DIR/"`
        elif [ -z "$FILE" ]; then
                exit 
        fi
done
meld "$GEDIT_CURRENT_DOCUMENT_DIR/$GEDIT_CURRENT_DOCUMENT_NAME" "$FILE" &
```




---

## Directory listing
Language=Any
Requires=Shell
Menu Name=List current Directory
Description=List the directory of the current document



```
ls -l -h $GEDIT_CURRENT_DOCUMENT_DIR
```




---

## Environmet Variables listing
Language=Any
Requires=Shell Menu Name=List Environmet Variables Description=List the Environmet Variables of the system



```
env
```




---

## Execute Buffer
Language=Any
Requires=python, ruby, whatever interpreter you're using
Menu Name=Execute Buffer [Python]
Description=Runs the interpreter on the current document (no save required) or the selection, if you have one. Great for testing out little things.



```
#!/bin/sh
python /dev/stdin
```




---

## Java compile and run
Language=Java
Requires=Java
Menu Name=Java compile and run
Description=Compile the current Java code and execute it



```
#!/bin/sh
cd $GEDIT_CURRENT_DOCUMENT_DIR
if javac $GEDIT_CURRENT_DOCUMENT_NAME;
then
java ${GEDIT_CURRENT_DOCUMENT_NAME%\.java}
else
echo "Failed to compile"
fi
```




---

## C compile and run
Language=C
Requires=gcc, xterm
Menu Name=C compile and run
Description=Compile the current C code and execute it



```
#!/bin/bash
gcc $GEDIT_CURRENT_DOCUMENT_NAME -o ${GEDIT_CURRENT_DOCUMENT_NAME%.*}
DESU=`echo ${GEDIT_CURRENT_DOCUMENT_NAME}|cut -d "." -f 1`
xterm -hold -e ./$DESU --working-directory=$GEDIT_CURRENT_DOCUMENT_DIR
```




---

## Lorem Ipsum Text
Language=Any
Requires=Lorem Ipsum Generator
Menu Name=Lorem Ipsum text...
Description=Create dummy text



```
#!/bin/sh
lorem-ipsum-generator & 
```




---

## Octave
Language=Octave
Requires=GNU Octave
Menu Name=Octave
Description=Execute the current Octave code



```
#!/bin/sh
octave --silent --norc $GEDIT_CURRENT_DOCUMENT_NAME
```




---

## PHP Code Formating
Language=PHP
Requires=PHP, PHP Pear
Menu Name=Reformat PHP code
Description=Reformat the PHP code of the current document



```
php_beautifier -s4 -l "ArrayNested() IndentStyles(style=bsd) NewLines(before=if:switch:while:for:foreach:function:T_CLASS:return:break,after=T_COMMENT)"
```




---

## Rake
Language=Ruby on Rails (RoR)
Requires=Ruby on Rails, Ruby, Zenity
Menu Name=Rake Tasks
Description=Run Rake with selected Tasks



```
#!/bin/sh
rake `rake --tasks --silent  | cut -d" " -f2 | zenity --list --title="Select rake task" --column="Task"` &
```




---

## Rename Files
Language=Any
Requires=PyRenamer
Menu Name=Rename files...
Description=Rename a sequence of files in the current directory



```
#!/bin/sh
pyrenamer --root $GEDIT_CURRENT_DOCUMENT_DIR &
```




---

## Ruby Execute
Language=Ruby
Requires=Ruby, Zenity
Menu Name=Ruby Execute
Description=Execute current document with Ruby



```
#!/bin/sh
ruby
```




---

## Search/ Replace in Files
Language=Any
Requires=Regexxer
Menu Name=Search/ Replace in files...
Description=Search or Replace in files at the directory of the current document



```
#!/bin/sh
regexxer --hidden --ignore-case --line-number --pattern=$GEDIT_CURRENT_DOCUMENT_NAME   $GEDIT_CURRENT_DOCUMENT_DIR &
```




---

## Validate/ Optimize CSS
Language=Cascading Stylesheets CSS
Requires=CSStidy, Zenity
Menu Name=Validate/ Optimize CSS...
Description=Validate or optimize the current cascading stylesheet



```
#!/bin/sh
zenity --question --title="Validate/ Optimize CSS" --text="Should the stylesheet file optimized too?"
case "$?" in
        0)
                exec csstidy "$GEDIT_CURRENT_DOCUMENT_NAME"  --compress_colors=true --lowercase_s=true --optimise_shorthands=true --compress_font-weight=true --merge_selectors=true --template=high --discard_invalid_properties=false "$GEDIT_CURRENT_DOCUMENT_NAME";;
        1)
                exec csstidy "$GEDIT_CURRENT_DOCUMENT_NAME"  --compress_colors=true --lowercase_s=true --optimise_shorthands=true --compress_font-weight=true --merge_selectors=true --template=high --discard_invalid_properties=false "/tmp/$GEDIT_CURRENT_DOCUMENT_NAME";;
        esac
```




---

## Validate/ Reformat XHTML Code
Language=XHTML
Requires=Tidy, Zenity
Menu Name=Validate/ Reformat XHTML code
Description=Validate or reformates the current XHTML document



```
#!/bin/sh
zenity --question --title="Validate/ Reformat XHTML" --text="Should the XHTML file be reformated too?"
case "$?" in
        0)
                exec tidy -utf8 -i -w 80 -c -q -asxhtml "$GEDIT_CURRENT_DOCUMENT_NAME";;
        1)
                exec tidy -e -utf8 -q  "$GEDIT_CURRENT_DOCUMENT_NAME";;
        esac
```




---

## Validate/ Reformat XML Code
Language=XML, SVG, X3D
Requires=XMLlint, Zenity
Menu Name=Validate/ Reformat XML code
Description=Validate or reformates the current XML document



```
#!/bin/sh
zenity --question --title="Prüfen auf valides XML" --text="Soll das XML-Dokument auch formatiert werden?"
case "$?" in
        0)
                xmllint --postvalid --format --dtdattr $GEDIT_CURRENT_DOCUMENT_DIR/$GEDIT_CURRENT_DOCUMENT_NAME;;
        1)
                xmllint --postvalid --dtdattr --noout  $GEDIT_CURRENT_DOCUMENT_DIR/$GEDIT_CURRENT_DOCUMENT_NAME;;
        esac
```




---

## Validate PHP Code
Language=PHP
Requires=PHP
Menu Name=Validate PHP code
Description=Validate the PHP code of the current document



```
php -l
```




---

## Validate Python Code
Language=Python
Requires=Python
Menu Name=Validate Python code
Description=Validate the Python code of the current document



```
python -d
```




---

## Compile and View LilyPond Scores
Language=LilyPond
Requires=GNU LilyPond, Evince
Menu Name=LilyPond Compile and View
Description=Compile and View the current LilyPond document. Must have extension '.ly'.



```
#!/bin/bash
# Store the file name in a variable
FILE_NAME=$GEDIT_CURRENT_DOCUMENT_NAME
# Check if file extension is .ly
if [ `echo $FILE_NAME | cut -d "." -f 2` = "ly" ]
then
#Make LilyPond file
lilypond $FILE_NAME
DOC_NAME=`echo $FILE_NAME | cut -d "." -f 1`
evince $DOC_NAME'.pdf' &
fi
exit 0
```




---

## Grepall
Language=Any
Requires=Grepall
Menu Name=Grepall
Description=Searches for references to the selected text in documents within the current directory with the same extension as the current document. Outputs file name and page number of each reference in the bottom pane.



```
#!/bin/bash
search=`xargs -0 echo`
$HOME/bin/grepall -e `echo $GEDIT_CURRENT_DOCUMENT_NAME | cut -d. -f2` "$search"
```




---

## Format XML on an unsaved document
Language=XML
Requires=XMLlint
Menu Name=Format XML code in a saved or unsaved document
Description:


```
#!/bin/sh
xmllint --format -
```




---

## File Properties
Language=Any
Requires=Shell
Menu Name=File Properties
Description=Path, size (bytes), date and time for a file. Output like:

/home/pb/junk/f.txt
613 bytes
2010-12-13 15:33:21



```
#!/bin/bash
FILE=$GEDIT_CURRENT_DOCUMENT_NAME
if [ $FILE ]; then  # have a file been opened yet?
    echo `pwd`/$FILE  # poor mans realpath(1) (rarely installed)
    echo `ls -l --full-time $FILE | cut -d " " -f 5` bytes
    time=`ls -l --full-time $FILE | cut -d " " -f 6,7`
    echo $time | sed 's/\(.*\)\..*/\1/'  # cut off fraction of second
fi
```




---

## Beautify HTML
Language=HTML
Requires=BeautifulSoup
Menu Name=Beautify HTML
Description=Turns nasty HTML into a nicer form. Will attempt to solve all kind of problems, like incorrectly nested tags



```
import sys
from BeautifulSoup import BeautifulSoup

text = sys.stdin.read().decode('utf-8')
soup = BeautifulSoup(text) 
print soup.prettify()
```




---

## Add First Google Result as Markdown Link
Language=Any
Requires=FirstGooser (modified from Gooser, installation instructions there)
Menu Name=Google for Link
Description=Takes highlighted text and converts to a Markdown-formatted link to the first result in Google (a la the Blogsmith bundle for textmate



```
#!/bin/sh
searchvar=$(cat /dev/stdin)
echo -n "[$searchvar](" 
 /home/chase/bin/firstgooser.pl -s "$searchvar" 
echo -n  ")"
```




---

## Source Code Automatic Formatter
Language=C, C++, C#, and Java
Requires=Artistic Style (astyle) (You will find it in your deposits)
Menu Name=Astyle
Description=Artistic Style is a source code indenter, formatter, and beautifier for the C, C++, C# and Java programming languages. Use it with Gedit !
Attention=Replace [options] by the options that will please you on the following page=http://astyle.sourceforge.net/astyle.html ;



```
astyle [options] $GEDIT_CURRENT_DOCUMENT_NAME
```


Exemple=My options for C programs

---

## Grep on project
Language=Any
Requires=Zenity
Recommends=Git, RVM
Menu Name=Grep on project
Description=Executes grep of given string (selection by default) inside document dir. If it's inside a Git project, then it searches inside base repo dir. It Also looks for RVM, and if it is found, then it also searches inside the active gemset dir. Last version here.


```
read SELECTION

# allow to refine expression
EXPRESSION=$(zenity --entry --text='Expression to grep' --entry-text="$SELECTION")

# add document dir
GREP_PATHS=$GEDIT_CURRENT_DOCUMENT_DIR

# try to replace with git project dir
PROJ_DIR=$(git rev-parse --show-toplevel 2> /dev/null)
if [ ! '' = "$PROJ_DIR" ]; then
GREP_PATHS="$PROJ_DIR"
fi

# try to load gemset and add gemset dir
source $HOME/.rvm/scripts/rvm &> /dev/null
cd $GEDIT_CURRENT_DOCUMENT_DIR &> /dev/null
GEMSET_DIR=$(gem env gemdir)
if [ ! '' = "$GEMSET_DIR" ]; then
GREP_PATHS="$GREP_PATHS $GEMSET_DIR"
fi

# some annoying output (to be customized...)
EXCLUDES="--exclude-dir=.git --exclude=Makefile --exclude=*~"

# clean output for gedit to be able to open file:line references
SED_CLEAN="sed 's/\(.*:[0-9]\+:\)\(.*\)/\1 \2/'"

GREP_COMMAND="grep -RnwI $EXCLUDES '$EXPRESSION' $GREP_PATHS | $SED_CLEAN "

bash -l -c "$GREP_COMMAND"

echo
echo "--- Searched for '$EXPRESSION' inside:"
echo $GREP_PATHS
```


Applicability=all
Output=output-panel
Input=selection

