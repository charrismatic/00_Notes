#External Tools
#Overview
#The goal of this plugin is to allow users to execute external commands from gedit interface. This allow the user to do two things: either to pipe some content into a command and to exploit its output (for example, sed), or to simply launch some predefined command (for example, make).

#Using External Tools
#To install the plugin, go to Edit -> Preferences -> Plugins -> External Tools.

#To configure the plugin, go to Tools -> Manage External Tools.... A dialog will appear and you can start adding tools.

#To run tools, go to Tools -> External Tools or use (if applicable) associated shortcut keys.

#External Tools dialog
#The name of the current tool can be edited directly using the list on the left side of the dialog.

#Here is a short description of the editable properties for a given tool:

#Edit: the actual commands to be ran.

#Shortcut Key: the key binding associated to the current tool.

#Save: saving or not (current document or all documents) before running the tool.

#Input: what content to give to the commands (as stdin).

#Output: what to do with the commands output.

#Applicability: what documents can be affected by that tool? Criteria are: saved or not, local or remote, language.

#You can add and remove custom tools, and customize system-provided tools. You can revert latter ones to the upstream version in one click.




GEDIT_CURRENT_DOCUMENT_DIR

GEDIT_CURRENT_DOCUMENT_NAME

GEDIT_CURRENT_DOCUMENT_PATH

GEDIT_CURRENT_DOCUMENT_SCHEME

GEDIT_CURRENT_DOCUMENT_TYPE

GEDIT_CURRENT_DOCUMENT_URI

GEDIT_CURRENT_DOCUMENT_LANGUAGE

GEDIT_CURRENT_LINE

GEDIT_CURRENT_LINE_NUMBER

GEDIT_CURRENT_WORD

GEDIT_CWD

GEDIT_DOCUMENTS_PATH

GEDIT_DOCUMENTS_URI

GEDIT_FILE_BROWSER_ROOT (new in gedit 3.9)

GEDIT_SELECTED_TEXT

#Storage and hand-editing of tools
#System tools path

#User tools path

#gedit 2

#$XDG_DATA_DIRS/gedit-2/plugins/tools

#~/.gnome2/gedit/tools

#gedit 3

#/usr/share/gedit/plugins/externaltools/tools

#~/.config/gedit/tools

#(Note: when upgrading to gedit 3, the user generated external tools may not be moved automatically.)

#Each tool consists on an executable script file (in Bash, Perl, Python, Ruby, etc.) containing a metadata section that resembles usual desktop files.

#The metadata section starts with a # [Gedit Tool] line, and each following line from the metadata section should start with # . Those lines contain key/value pairs, in the form of key=value. Current keys are:

#Name: the tool name, as displayed in the menu.

#Shortcut: the keyboard shortcut, in usual gtk format.

# Save-files: nothing, document or all.

#Input: the input (nothing, document, selection, selection-document, line or word)

#Output: the output (nothing, output-panel, new-document, append-document, replace-document, replace-selection or insert).

#Applicability: all, titled, local, remote, or untitled.

#The rest of the file is the script to be ran. Note that it is good practice to begin the file with a shebang (ex: #!/bin/perl) so that the system knows which interpretor it should use.

#You can also share your home-grown tools by copying the relevant file in your home directory.


#Tips and tricks
#You can use xargs (combined to the Selection input) to use the selected text as an argument for you command. Here is an exemple using that facility to show the manpage of the selected term:

#Label: Manpage

#Edit: xargs man

#Input: Current word

#Output: Output panel






https://wiki.gnome.org/Apps/Gedit/Plugins/Snippets

# Apps/Gedit/Plugins/Snippets - GNOME Wiki!

---------------------------
## Overview

The idea is to allow users to create little tags that expand to a snippet of text. When the tag is entered in the Gedit view and <tab> is pressed, it gets expanded to the snippet. The user can specify insertion points in the snippet so that when <tab> is pressed again, the cursor moves to the next insertion position. It's very basic and a bit TM alike (though it probably will need some extra features)

## Using snippets

Install the plugin. Menu: Tools -> Manage Snippets. A dialog will appear and you can start add snippets. Select a 'Language' (or Global for global snippets). Start adding snippets.

### Syntax

There are six different types of placeholders which can be used to specify 'action-areas' in the snippet.

1.  __Simple placeholders__: ${n\[:default-value\]}.
    
    -   Here 'n' specifies the tabstop of this placeholder, with n: 1 → ∞. The ':default-value' is optional and indicates a default value to be inserted at the placeholders position. The default value van also be a list by encapsulating it in \[\] and separating values by a comma. By default, the first non-empty value will be used, and from 2.30 on, a popup will be shown listing the different alternatives when you tab into the placeholder. Example:
        
        ```
        <div class="${1:text}">
        ```
        
2.  __Mirror placeholders__: $n.
    
    -   Here 'n' specifies the placeholder to mirror, with n: 1 → ∞. Placeholders are automatically mirrors when 'n' is already defined before. Mirror placeholders are updated instantly while you type, which is cool. Example:
        
        ```
        <div class="${1:text}">This div has class: ${1}</div>
        ```
        
3.  __Shell placeholders__: $(\[n:\]cmd) (__Available in v2.16__)
    
    -   Here 'n' specifies the reference of this placeholder, with n: 1 → ∞. The reference is optional and when specified can be used in other placeholders to use the contents returned by the shell command. 'cmd' can contain any number of ${n} which will be replaced with the contents of the corresponding placeholders and will be executed in a subshell. Everything written to stdout will be inserted. Example:
        
        ```
        $(1:echo $GEDIT\_SELECTED\_TEXT | head -n 2)
        ```
        
4.  __Python placeholders__: $<\[n1\[, n2, ...\]:\]cmd> (__Available in v2.16__)
    
    -   Python placeholders are like shell placeholders, but they are somewhat different. Here n1, n2 etc specify the additional dependencies of this placeholder (additional to the placeholder dependencies specified in the command). These dependencies are useful when you have multiple python placeholders in one snippet. An example follows below. `cmd' can contain any number of ${n} which will be replaced with the contents of the corresponding placeholders and will be evaluated by the python interpreter. The return value of the placeholder will be inserted. Additionally all the python placeholders in the same snippet share the same namespace. So functions defined in one placeholder can be used on another. Also when you declare variables with 'global <var>' you can use that var in other placeholders. Example snippet:
        
        ```
        Word separated with underscores: ${1:A_WORD}
        Camelcase: $< global split
        split = $1.lower().split('_')
        camelcase = ''
        for s in split:
            camelcase += s.capitalize()
        return camelcase >
        First word: $<\[1\]: return split\[0\].capitalize()>
        ```
        
5.  __Regular expression placeholder__: ${\[n:\]input/regular expression/substitution\[/modifiers\]}
    
    -   n (optional): the reference tabstop of this placeholder. It's not a real tabstop because you can't tab to it, but you can use it in other placeholders to mirror the result of the substitution
    -   input (mandatory): a reference to another placeholder (a number) or an environmental variable ($GEDIT\_SELECTED\_TEXT). This is the input for the match
    -   regular expression (mandatory): a regular expression to match the input. This uses the python re module and thus its syntax
    -   substitution (mandatory): the substitution string, this can contain backreferences to groups in the regular expression with \\n where n is the number of the group or 0 for the whole match. You can also use group names (see python docs) in the regular expression, you can backreference to those with
        
        \\<name> (you can also backreference with \\<n> where n is a number of a group). Further more, you can have modifiers in a backreference with the following syntax \\<n|name,modifiers>. Currently supported modifiers are:
        
        -   u: upper case first character
        -   U: upper case whole group
        -   l: lower case first character
        -   L: lower case whole group
        -   t: title case whole group
        
        You can specify multiple modifiers (very modifier is processed in turn). This means that you can use the modifier Lu to first make the matched group lowercase and then make the first character upper case. One more neat thing you can do with substitutions is conditional substitution. The syntax is as follows: (?n|name,truepart,falsepart). This means that truepart will be used when the group n (or name) is non-empty and falsepart otherwise. These can be nested (?1,(?2,yes2,no2),no1) and used wherever in the substitution. The truepart and falsepart can itself contain any backreference.
    -   modifiers (optional): python regex modifiers can be specified: I, L, M, S, U and X (example: IMX). For information on the meaning of these modifiers see the python documentation
6.  __End placeholder__: $0
    
    -   This placeholder specifies the end of the snippet. Its the last placeholder position to jump to (when no $0 is specified, the last placeholder position will be at the end of the snippet). When this placeholder is entered, the snippet placeholders are removed and you are left with normal text.

Additional there is environmental variable substitution ($PATH, $HOME), you can use them freely throughout the snippet. There are currently three gedit environmental variables you can use:

-   $GEDIT\_SELECTED\_TEXT - *The currently selected text*
    
-   $GEDIT\_CURRENT\_WORD - *The word where the cursor currently is*
    
-   $GEDIT_FILENAME - *The full filename of the document, empty string when the document isnt saved yet*
    
-   $GEDIT_BASENAME - *The basename of the filename of the document, empty string when the document isnt saved yet*
    

From gedit 2.28 on, these have been renamed to behave more consistently over different plugins in gedit:

-   $GEDIT\_SELECTED\_TEXT - *The currently selected text*
    
-   $GEDIT\_CURRENT\_WORD - *The word where the cursor currently is*
    
-   $GEDIT\_CURRENT\_LINE - *The line where the cursor currently is*
    
-   $GEDIT\_CURRENT\_LINE_NUMBER - *The line number where the cursor currently is*
    
-   $GEDIT\_CURRENT\_DOCUMENT_URI - *The current document uri*
    
-   $GEDIT\_CURRENT\_DOCUMENT_NAME - *The current document name (the document basename)*
    
-   $GEDIT\_CURRENT\_DOCUMENT_SCHEME - *The current document uri scheme (file/ftp/ssh)*
    
-   $GEDIT\_CURRENT\_DOCUMENT_PATH - *The current document path (for local files)*
    
-   $GEDIT\_CURRENT\_DOCUMENT_DIR - *The current document directory*
    
-   $GEDIT\_CURRENT\_DOCUMENT_TYPE - *The current document content type*
    
-   $GEDIT\_CURRENT\_DOCUMENTS_URI - *List of uris of all open documents*
    
-   $GEDIT\_CURRENT\_DOCUMENTS_PATH - *List of paths of all open documents*
    

There is one additional somewhat *special* environmental variable, $GEDIT\_CURRENT\_WORD. When you use this and apply the snippet the current word (defined by pango) at the cursor position will be stored in $GEDIT\_CURRENT\_WORD, the word itself will be removed! This is useful for snippets like the following generic begin/end section latex snippet:

```
\# Accelerator: <Ctrl>+B
\\begin{$GEDIT\_CURRENT\_WORD}
  $0
\\end{$GEDIT\_CURRENT\_WORD}
```

Here you can type: document<Ctrl+B> which will expand to a begin/end document section.

You can use $n for simple placeholder substitution throughout the snippet instead of using the more verbose ${n}.

## Current features

-   Tab triggers as well as keyboard accelerators
-   Completion popup showing available snippets (activate with <Ctrl><Space>). When you have text selected, it will show all snippets you can apply to the selected text. Otherwise it will find the tab trigger you're currently on (working backwards from the cursor) and provide a list with every snippet having a tab triggers starting with that prefix.
    
-   Completion popup for multiple defined tabtriggers and accelerators. When you press tab after a tabtrigger that is bound to multiple snippets, the completion popup will show displaying the different snippets to choose from. An example of this behavior are the HTML doctype snippets.
-   Apply .leave() on cursor movements
-   Manage multiple buffers
-   Implement system-wide snippets (multiple system wide file in $PREFIX, multiple files in userdir, only userdir is editable, userdir can override system wide).

## Possible features

-   Make sure that every aspect is also accessible from GUI (expression builder like)
-   Write user documentation
-   If a trigger ist written, highlight it, that the user knows, that she spellt it right.
-   Having variables giving the line number and character number where the tag is to be inserted would be great.

## Problems to be fixed

-   Possible problems with dragging tabs to other gedit windows
-   There are problems when a snippet is inserted without "editing" the placeholders of the previously inserted snippet
    -   \[[JesseVanDenKieboom](/JesseVanDenKieboom)\] I'm not sure what you mean by this, maybe you can explain it to me on IRC.
        
        -   I'm possibly seeing this too -- TAB selects the whole second snippet text instead of advancing. -- Joachim
-   Makes gedit 3.2.1 crash when trying to drag and drop text. (Ubuntu 11.10, Unity) -- [MokuraiCherlin](/MokuraiCherlin)
    

## Non distributed snippets

[gobject.xml](/Apps/Gedit/Plugins/Snippets?action=AttachFile&do=view&target=gobject.xml)

Apps/Gedit/Plugins/Snippets (last edited 2013-08-08 17:01:51 by [WilliamJonMcCann](/WilliamJonMcCann "WilliamJonMcCann @ localhost.localdomain[127.0.0.1]"))


