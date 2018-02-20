# Working with Ace

*In all of these examples Ace has been invoked as shown in the embedding guide.*

## Setting Themes

Themes are loaded on demand; all you have to do is pass the string name:

```javascript
editor.setTheme("ace/theme/twilight");

```

\> [See all themes](https://github.com/ajaxorg/ace/tree/master/lib/ace/theme)

## Setting the Programming Language Mode

By default, the editor supports plain text mode. All other language modes are available as separate modules, loaded on demand like this:

```javascript
editor.session.setMode("ace/mode/javascript");

```

## Common Operations

Set and get content:

```javascript
editor.setValue("the new text here"); // or session.setValue

editor.getValue(); // or session.getValue

```

Get selected text:

```javascript
editor.session.getTextRange(editor.getSelectionRange());

```

Insert at cursor:

```javascript
editor.insert("Something cool");

```

Get the current cursor line and column:

```javascript
editor.selection.getCursor();

```

Go to a line:

```javascript
editor.gotoLine(lineNumber);

```

Get total number of lines:

```javascript
editor.session.getLength();

```

Set the default tab size:

```javascript
editor.getSession().setTabSize(4);

```

Use soft tabs:

```javascript
editor.getSession().setUseSoftTabs(true);

```

Set the font size:

```javascript
document.getElementById('editor').style.fontSize='12px';

```

Toggle word wrapping:

```javascript
editor.getSession().setUseWrapMode(true);

```

Set line highlighting:

```javascript
editor.setHighlightActiveLine(false);

```

Set the print margin visibility:

```javascript
editor.setShowPrintMargin(false);

```

Set the editor to read-only:

```javascript
editor.setReadOnly(true);  // false to make it editable

```

### Triggering Resizes

Ace only resizes itself on window events. If you resize the editor div in another manner, and need Ace to resize, use the following:

```javascript
editor.resize()

```

### Searching

```javascript
editor.find('needle',{

    backwards: false,

    wrap: false,

    caseSensitive: false,

    wholeWord: false,

    regExp: false

});

editor.findNext();

editor.findPrevious();

```

The following options are available to you for your search parameters:

- `needle`: The string or regular expression you're looking for
- `backwards`: Whether to search backwards from where cursor currently is. Defaults to `false`.
- `wrap`: Whether to wrap the search back to the beginning when it hits the end. Defaults to `false`.
- `caseSensitive`: Whether the search ought to be case-sensitive. Defaults to `false`.
- `wholeWord`: Whether the search matches only on whole words. Defaults to `false`.
- `range`: The [Range](https://ace.c9.io/ajaxorg/ace/wiki/Range) to search within. Set this to `null` for the whole document
- `regExp`: Whether the search is a regular expression or not. Defaults to `false`.
- `start`: The starting [Range](https://ace.c9.io/ajaxorg/ace/wiki/Range) or cursor position to begin the search
- `skipCurrent`: Whether or not to include the current line in the search. Default to `false`.

Here's how you can perform a replace:

```javascript
editor.find('foo');

editor.replace('bar');

```

And here's a replace all:

```javascript
editor.replaceAll('bar');

```

(`editor.replaceAll` uses the needle set earlier by `editor.find('needle', ...`)

### Listening to Events

To listen for an `onchange`:

```javascript
editor.getSession().on('change', function(e) {

    // e.type, etc

});

```

To listen for an `selection` change:

```javascript
editor.getSession().selection.on('changeSelection', function(e) {

});

```

To listen for a `cursor` change:

```javascript
editor.getSession().selection.on('changeCursor', function(e) {

});

```

### Adding New Commands and Keybindings

To assign key bindings to a custom function:

```javascript
editor.commands.addCommand({

    name: 'myCommand',

    bindKey: {win: 'Ctrl-M',  mac: 'Command-M'},

    exec: function(editor) {

        //...

    },

    readOnly: true // false if this command should not apply in readOnly mode

});
```