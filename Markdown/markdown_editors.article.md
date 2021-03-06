## Best all around fully featured editor

### Typora.io

|              |                             |
| ------------ | --------------------------- |
|  Url         |  https://typora.io          |
|  Github      |  https://github.com/typora  |
|  Engine      |  Native / Other             |
|  Supports    |  Linux, Mac, Windows        |
|  Free        |  Yes                        |
|  Open-Source |  No                         |

  __Features__

- Live inline preview
- File tree view sidebar, folder management 
- Source code view
- Document outline and table to contents view
- Document outline sidebar
- Directly edit files in the file system
- Formatting Tools, Shortcut keys, Markdown table support and design tools
- Custom themes with CSS (Dark Theme Included) 
- Syntax highlighting
- Live inline UML charts and diagrams ( mermaid.js )
- Use Pandoc to render pdf, docx, png, html, tex
- Supports inline html, yaml frontmatter headers, latex, image rendering, math notation

__INSTALL__

    # optional, but recommended
    sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys BA300B7755AFCFAE
    # add Typora's repository
    sudo add-apt-repository 'deb http://typora.io linux/'
    sudo apt-get update
    # install typora
    sudo apt-get install typora

---

## Render Markdown from the Command Line

### mdless: Better Markdown in Terminal

`mdless` is a utility that provides a formatted and highlighted view of Markdown files in Terminal.

- url: http://brettterpstra.com/projects/mdless
- tags: #markdown #terminal ruby-on-rails
- engine: ruby

__INSTALL__

    gem install mdless

__USAGE__

```
mdless [options] path or cat [path] | mdless
```

__OPTIONS__

    -s, --section=TITLE              Output only a headline-based section of 
                                     the input
    -w, --width=COLUMNS              Column width to format for (default 80)
    -p, --[no-]pager                 Formatted output to pager (default on)
    -P                               Disable pager (same as --no-pager)
    -c, --[no-]color                 Colorize output (default on)
    -l, --list                       List headers in document and exit
    -i, --images=TYPE                Include [local|remote (both)] images in 
                                     output (requires imgcat and iTerm2, 
                                     default NONE)
    -I, --all-images                 Include local and remote images in output 
    -h, --help                       Display this screen
    -v, --version                    Display version number 

---

Cloud Based Notebbooks

Laverna.cc

Laverna: Keep your notes private  

Laverna is a JavaScript note taking application with Markdown editor and encryption support. Consider it like open source alternative to Evernote.

- https://laverna.cc
- https://github.com/Laverna/laverna
- Demo: https://laverna.cc/app OR http://laverna.github.io/static-laverna

Tags: #peer-to-peer, #note-taking, #markdown, #socket-io, #websocket, #webrtc

Open source 

Linux, Mac, Windows, Self-Hosted 

Pros: 

- Live markdown editing
- Distraction free mode
- Code highlighting
- Encrypted mode 
- Local or self-hosted means no registration
- Clean interface and design
- Import / export notes
- Sync notes with dropbox or remote storage

Cons: 

- Doesn't work directly with existing files on your computer 

So it's not as much of a Markdown editor as it is a secure notebook that uses markdown for editing 

FEATURES

- Markdown editor based on Pagedown
- Manage your notes, even when you're offline
- Secure client-side encryption
- Synchronizes with cloud storage services (currently only with Dropbox and RemoteStorage)
- Three editing modes: distraction free, preview, and normal mode
- WYSIWYG control buttons
- MathJax support
- Syntax highlighting
- No registration required
- Web based
- Keybindings

Use immediately in your browser 

The application stores all your notes in your browser databases such as indexedDB or localStorage, which is good for security reasons, because only you have access to them.

The bonus of this project is the special attention to privacy and the ability to self host your files. 

---



Boostnote.io

The note-taking app for programmers that focusing on markdown, snippet and customizability

Edit your code and wikis from anywhere.

- https://boostnote.io/
- https://github.com/BoostIO/Boostnote

Android, iOS, Linux, Mac, Windows

Big team, lots of contributors and very active on social media and communication channels

Note-taking app for programmers.

Apps available for Mac, Windows, Linux, Android and iOS.

Built with Electron, React + Redux, Webpack and CSSModules.

ABOUT

- Free Forever
- Open Source,
- 6000+ Stars on Github
- 2600+ Commits
- 80+ Contributors

FEATURES

- Keyboard Shortcuts 
- Keymaps in Editor mode 
- Syntax Highlighting 
- Light theme and Dark theme 
- Codeblock theme 
- Editor theme 
- Cloud Syncing and Backup 
- Sync Data Across Desktop and Mobile apps 
- Team Collaboration 
- Diagram support for plantuml, flowchart or Sequence 
- TeX support 
- Vim mode 
- Emacs mode 
- PDF export 
- md txt import 
- Jump by a header in a note 
- Evernote 
- Data format 
- Tests 
- localStorage 
- Built files 
- How Boostnote is deployed 



For code snippets the app is able to highlight code syntax in more than 100 languages, including Javascript, Python, HTML and CSS and you can store multiple code snippets within the same snippet."

The app features a unique snippet note type for an enhanced code sharing / note taking experience.



Social:

- Repository
- Twitter
- Reddit
- Boostnote Store
- Bountysource 
- Medium 

Articles:

・Cloud Syncing & Backups

・How to sync your data across multiple devices

・Boostnote | Boost your happiness, productivity and creativity.

・Boostnote v0.8.18 Release

・Boostnote Color Themes

・How to set syntax highlight in Snippet note

・Convert data from Evernote to Boostnote.

・Boostnote Tips: How to set Vim keymap to Boostnote.

Its a totally awesome project, very much worth trying out. 

- Supports multiple storage location in the file system, multiple folders, tags, and note meta data.
- Export to .md, pdf, html, or print view
- import from .txt or .md
- Starred notes
- Split view mode or seemless editing (single window mode) 
- Tags, stars, multi folder storage, multiple not types
- Export to txt, md, html 
- ​

The only drawback is that file names are hashed and content is stored as coffeescript .cson so if you're looking for something to work on individual markdown files or open notes later directly in the file system this is not the right choice, but all the files are still plain text and stored directly in your home folder or folder of your choosing. As as a notebook app this one is completely awesome. 

Evernote API integration

https://github.com/BoostIO/ever2boost

https://rubygems.org/gems/ever2boost

Some pretty interesting possibilities here for importing / exporting notes from Evernote .enex to something local and more workable for developer notes.

Ever2boost has 2 commands for conversion convert and import

    ever2boost <command> | <option>

IMPORT FROM

Import all of notes from cloud storage at Evernote.

import command has 1 option d which specify output directory.

    $ ever2boost help import
    Usage:
      ever2boost import
    
    Options:
      d, [--directory=DIRCTORY_PATH]  # make Boostnote storage in the directory default: ~/evernote_storage
    
    import from evernote

convert
convert

Convert notes from .enex file which is exported file from Evernote.

You can get how to export from official document.

convert has 1 option d which specify output directory.

    $ ever2boost help convert
    Usage:
      ever2boost convert
    
    Options:
      d, [--directory=DIRCTORY_PATH]  # make Boostnote storage in the directory default: ~/evernote_storage
    
    convert from .enex

Requirements
Requirements

Ruby: 2.0.0 or above

bundler: Corresponding to Ruby

if you don't have bundler:

    $ gem install bundler

** word of caution:** There are some notes on the readme discussing notes breaking or disappearing. It seems more of a problem with the storage link and note files getting deleted but in case this is an actual problem, I would avoid trying to import/convert your entire evernote account or importing that single copy of your thesis notes until your are familiar with how the application works. 



- "Save often and always to have a backup plan."



Links: 

- Diagram support
- TeX support
- Vim mode
- Emacs mode
- PDF export
- md txt import
- Jump by a header in a note

- Cloud Syncing and Backup
- Sync Data Across Desktop and Mobile apps
- Team Collaboration

---

BEST BASIC EDITOR

ReText: Simple but powerful editor for Markdown and reStructuredText

https://github.com/retext-project/retext

Built with Python

Supports: Linux, Mac

Tags: markdown, markdown-editor, python

Features:

- Custom Stylesheet support
- Themes 
- Web view mode
- Tabs for multi-file editing 

ReText is a simple but powerful editor for Markdown and reStructuredText markup languages. ReText is written in Python language and works on Linux and other POSIX-compatible platforms.  The latest stable version of ReText can be downloaded from PyPI. 

I used this editor for a quite a while and sometimes still go back to it when other editors are not available. It feels much more like a system program than some of the newer programs which have more of a web app feel. Tabbed file editing is a great feature. 

Great for basic editing / viewing markdown files.

__INSTALL__

pip install ReText 

Or clone the repo on Github and install manually

ReText requires the following packages to run:

- python — version 3.2 or higher
- pyqt5
- python-markups — version 2.0 or higher

We also recommend having these packages installed:

- python-markdown — for Markdown language support
- python-docutils — for reStructuredText language support
- python-enchant — for spell checking support

---

Honorable Mentions

Remarkable

A FULLY FEATURED MARKDOWN EDITOR

http://www.github.com/jamiemcg/Remarkable

http://www.remarkableapp.github.io

Linux, Windows

Markdown Editor written in python

- Export to PDF or HTML
- Split preview 
- Custom CSS
- Syntax Highlighting
- Customizable 

A relatively young project with decent capabilities but missing some key features that led me to require a second markdown editor for certain tasks. This could be a decent lightweight markdown editor for single file editing.



Proton

The open-source markdown editor built with Electron

https://steventhanna.github.io/proton/

https://github.com/steventhanna/proton

Tags: proton, electron, text-editor, markdown, markdown-editor, markdown-parser

Supports: Linux, Mac, Windows

A simple split screen markdown editor / viewer 

Decent for quick viewing and editing, if you can justify the overhead of running an electron app.  
