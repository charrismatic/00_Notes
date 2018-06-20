### Add spaces to  end of line for inline comments parsed by markdown

```javascript  
/(\/\/\/+.*[^\s]{2})$/, "$1  "	
```

### Remove all lines between (collapse lines)  

```javascript
/[\n]{1,2}[\s]*[\n]{1}/g, "\n"
/\n/g, "\n"
```

### Removes extra lines but leave a single line between (squeeze-lines)  

```javascript
/^[\s]{0,}[\n]{1,}[\s]{0,}[\n]{1,}/g, "\n\n"
```

### Remove all whitespace to left of syntax  (trim-left)

```javascript
/^[^\r\n\d\s][\s]*/g, ''
```

### Collapse lines + trim left 

```javascript
/^[\s]*[^\s]/g, ''
```

### Put braces inside (format:braces-out)

```javascript
/[\s]{0,}[\n]{1,}[\s]{0,}[{][^\s]/g, ' {\n'
```

### Put braces inside (format:braces-in)

```javascript
/^([\s]*)([\s].*)[\{]|((?!.*[\}]).*)[\{]/g, '$1$2\n$1{'
```

### Extra line after close (format:open-after-close)

```javascript
/(?![}][\s]*[}])[}][\s]*[\n]{1,}/g, '}\n\n'
```

### Even spaces (format:no-double-space )

- spaces on left 

```javascript
/[\s]{2,}([\w])/g, ' $1'
```

- spaces on right 

```javascript
/([\w])[\s]{2,}/g, '$1 '
```

### Convert block comments to inline sassdoc

```javascript
/^ {0,}\/\*\*+|^ {0,}\*+\*\/|^ {0,}\*/g, '///'
```

### Delete empty lines in block comments 

```javascript
/^[\s]*[\*]{1}[\s]*[\n]{1}/g, ''
```

### Selected whole php comment block 

```javascript
/(\/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+\/)|(\/\/.*)/g, ''
```

### Select all links (format:kill-all-anchor-links)

```javascript
/<a[\s]+href[\s]{0,}[\=][\"][^\"]*\"/g, '<a href=""'
```

### Kill all inline styles 

```javascript
/style=\"[^\"]+\"/g, ''
```

### Add leading zeros (format:zeros-before-leading)

```javascript
/[^\d]{1}\.(\d)+/g, ' 0.$1'
```

### Break lines longer than x characters'  

```javascript
/([a-zA-Z0-9\,\.\`\'\"\(\)\[\]\/\\\*\<\>\#\=\:\+\_\-\? ]{100,120})/g, '$1\n'
```

### Comments 

```javascript
multiLine Comments:   /*.*?*/, "/s"
singleLine Comments:  ///.*$/g m
```

### Single double quotations

```javascript
doubleQuotedString:          /"([^"n]|.)*"/g
singleQuotedString:          /'([^'n]|.)*'/g,
multiLineDoubleQuotedString: a('"([^\"]|\.)*"', "gs")
multiLineSingleQuotedString: a("'([^\']|\.)*'", "gs")
xmlComments:                 a("(&lt;|<)!--f.*?--(&gt;|>)", "gs")
url:                         /w+://[w-./?%&=:@;#]*/g
```

### PHP script tags: 

```javascript
left :    /(&lt;|<)?(?:=|php)?/g,
right:    /?(&gt;|>)/g,
eof  :    !0
```

### Aspscripttags:  

```javascript
left:   /(&lt;|<)%=?/g,
right:  /%(&gt;|>)/g
```

### Javascript tags

```javascript
left:                               /(&lt;|<)s*script.*?(&gt;|>)/gi,
right:                              /(&lt;|<)/s*scripts*(&gt;|>)/gi
spacesAtStartOfString:              /^s*/,
removeExtraSpacesAfterEndOfWords:   /b[s]{2,}/|[w][s]{2,}|[s]{2,}[w]|,
```

### Remove extra spaces after end of words

```javascript
/\b[\s]{2,} 
[\w][\s]{2,}|[\s]{2,}[\w]|
/"^[^rndS][s]*", ''
/^n*s*/, 'n'
/\t/g, '  '
/"/^.s*", ''
/\s\s/g, ' '
/\n\n/g, '\n'
/(\t/g, '  ')
/\r\n\r\n/g, '\r\n'
/(/^[\n]+/g, '\n')
/(/[\r|\n]{3,}/g, '\n\n')
```

### Capture everything between the braces

```javascript
{([^{}]|[s])+}
```
