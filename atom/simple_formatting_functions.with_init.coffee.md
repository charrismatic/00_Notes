
# INSERT DATESTAMP

```javascript
atom.commands.add 'atom-workspace', 'documentation:insert-timestamp-date-time', ->
  editor = atom.workspace.getActivePaneItem()
  editor.insertText(new Date().toLocaleString())
```

# OPEN CURRENT FILE DIRECTORY IN FILE MANAGER

```javascript
atom.commands.add 'atom-workspace', 'shortcuts:open-here', ->
  atom.commands.
  dispatch(atom.views.getView(atom.workspace),
  "tree-view:show-current-file-in-file-manager")
```

## FORMATTING COMMANDS

# BUILT IN FUNCTION - CONVERT TAB TO SPACES

```javascript
atom.commands.add 'atom-workspace', 'format:tabs-to-spaces', ->
  atom.commands.dispatch(atom.views.getView(atom.workspace),
  'whitespace:convert-all-tabs-to-spaces')
```

# REMOVE ALL LINES BETWEEN

```javascript
atom.commands.add 'atom-workspace', 'format:collapse-lines', ->
  atom.commands.dispatch(atom.views.getView(atom.workspace),
  'whitespace:convert-all-tabs-to-spaces')
  atom.commands.dispatch(atom.views.getView(atom.workspace),
  'line-ending-selector:convert-to-LF')
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/[\n]{1,2}[\s]*[\n]{1}/g, '\n')
```

# REMOVES EXTRA LINES BUT LEAVE A SINGLE LINE BETWEEN

```javascript
atom.commands.add 'atom-workspace', 'format:squeeze-lines', ->
  atom.commands.dispatch(atom.views.getView(atom.workspace),
  'whitespace:convert-all-tabs-to-spaces')
  atom.commands.dispatch(atom.views.getView(atom.workspace),
  'line-ending-selector:convert-to-LF')
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace( /^[\s]{0,}[\n]{1,}[\s]{0,}[\n]{1,}/g, '\n\n')

```

# REMOVE ALL WHITESPACE TO LEFT OF SYNTAX

```javascript
atom.commands.add 'atom-workspace', 'format:trim-left', ->
  atom.commands.dispatch(atom.views.getView(atom.workspace),
  'whitespace:convert-all-tabs-to-spaces')
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace( /^[^\r\n\d\S][\s]*/g, '')
```

# COLLAPSE LINES + TRIM LEFT

```javascript
atom.commands.add 'atom-workspace', 'format:collapse-all', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/^[\s]*[^\S]/g, '')
```

# COLLAPSE LINES + TRIM LEFT

```javascript
atom.commands.add 'atom-workspace', 'format:indent-all', ->
  thisView = atom.views.getView(atom.workspace)
  atom.commands.dispatch(thisView, "whitespace:convert-all-tabs-to-spaces")
  atom.commands.dispatch(thisView, "line-ending-selector:convert-to-LF")
  editor = atom.workspace.getActiveTextEditor()
  position = editor.getCursorBufferPosition()
  editor.selectAll()
  editor.autoIndentSelectedRows()
  editor.setCursorBufferPosition(position)
```

# TAB TO SPACES -CONVERT LINE END - COLLAPSE SPACE - TRIM LEFT - AUTO INDENT

```javascript
atom.commands.add 'atom-workspace', 'format:reformat', ->
  thisView = atom.views.getView(atom.workspace)
  atom.commands.dispatch(thisView, 'whitespace:convert-all-tabs-to-spaces')
  atom.commands.dispatch(thisView, 'line-ending-selector:convert-to-LF')
  editor = atom.workspace.getActiveTextEditor()
  buffer = editor.getBuffer()
  buffer.replace( /^[\s]*[^\S]/g, '')
  position = editor.getCursorBufferPosition()
  editor.selectAll()
  editor.autoIndentSelectedRows()
  editor.setCursorBufferPosition(position)
```

# PUT BRACES INSIDE

```javascript
atom.commands.add 'atom-workspace', 'format:braces-out', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/[\s]{0,}[\n]{1,}[\s]{0,}[{][^\S]/g, ' {\n')
```

# PUT BRACES INSIDE

```javascript
atom.commands.add 'atom-workspace', 'format:braces-in', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/^([\s]*)([\S].*)[\{]|((?!.*[\}]).*)[\{]/g, '$1$2\n$1{')

```

# EXTRA LINE AFTER CLOSE
```javascript
atom.commands.add 'atom-workspace', 'format:open-after-close', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/(?![}][\s]*[}])[}][\s]*[\n]{1,}/g, '}\n\n')

```

# EVEN SPACES

```javascript
atom.commands.add 'atom-workspace', 'format:no-double-space', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/[\s]{2,}([\w])/g, ' $1')  # spaces on left
  buffer.replace(/([\w])[\s]{2,}/g, '$1 ')  # spaces on right
```

# DELETE EMPTY LINES IN BLOCK COMMENTS

```javascript
atom.commands.add 'atom-workspace', 'format:useless-php-comment-line', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  buffer.replace(/^[\s]*[\*]{1}[\s]*[\n]{1}/g, '')  # USELESS COMMENT LINES
```

# SELECTED WHOLE PHP COMMENT BLOCK -- AND DELETED FOR NOW

```javascript
atom.commands.add 'atom-workspace', 'format:no-comment-block-style', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  comment = buffer.replace(/(\/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+\/)|(\/\/.*)/g, '')
```

# GET OR SELECT ALL LINKS

```javascript
atom.commands.add 'atom-workspace', 'format:kill-all-anchor-links', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  comment = buffer.replace( /\<a[\s]+href[\s]{0,}[\=][\"][^\"]*\"/g, '<a href=""')
```

# KILL ALL INLINE STYLES

```javascript
atom.commands.add 'atom-workspace', 'format:kill-inline-styles', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  comment = buffer.replace(/style=\"[^\"]+\"/g, '')
```

# ADD LEADING ZEROS

```javascript
atom.commands.add 'atom-workspace', 'format:zeros-before-leading', ->
  buffer = atom.workspace.getActiveTextEditor().getBuffer()
  comment = buffer.replace(/[^\d]{1}\.(\d)+/g, ' 0.$1')
```
