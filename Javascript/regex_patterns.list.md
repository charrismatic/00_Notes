&bsol;


### ADD SPACES TO  END OF LINE FOR INLINE COMMENTS PARSED BY MARKDOWN  

```javascript
/(\/\/\/+.*[^&bsol;s]{2})$/, "$1  "	
```

## REMOVE ALL LINES BETWEEN 'format:collapse-lines'  

```javascript
/[&bsol;n]{1,2}[&bsol;s]*[&bsol;n]{1}/g, '&bsol;n'
```

#### REMOVES EXTRA LINES BUT LEAVE A SINGLE LINE BETWEEN 'format:squeeze-lines'  

```javascript
/^[&bsol;s]{0,}[&bsol;n]{1,}[&bsol;s]{0,}[&bsol;n]{1,}/g, '&bsol;n&bsol;n'
```

## REMOVE ALL WHITESPACE TO LEFT OF SYNTAX 'format:trim-left'  

```javascript
/^[^\r&bsol;n\d&bsol;s][&bsol;s]*/g, ''
```

## COLLAPSE LINES + TRIM LEFT 'format:collapse-all'  

```javascript
/^[&bsol;s]*[^&bsol;s]/g, ''
```

## PUT BRACES INSIDE 'format:braces-out'  

```javascript
/[&bsol;s]{0,}[&bsol;n]{1,}[&bsol;s]{0,}[{][^&bsol;s]/g, ' {&bsol;n'
```

## PUT BRACES INSIDE 'format:braces-in'  

```javascript
/^([&bsol;s]*)([&bsol;s].*)[\{]|((?!.*[\}]).*)[\{]/g, '$1$2&bsol;n$1{'
```

## EXTRA LINE AFTER CLOSE 'format:open-after-close'  

```javascript
/(?![}][&bsol;s]*[}])[}][&bsol;s]*[&bsol;n]{1,}/g, '}&bsol;n&bsol;n'
```

## EVEN SPACES 'format:no-double-space'  

- spaces on left 

```javascript
/[&bsol;s]{2,}([\w])/g, ' $1'
```

- spaces on right 

```javascript
/([\w])[&bsol;s]{2,}/g, '$1 '
```

## CONVERT BLOCK COMMENTS TO INLINE SASSDOC

```javascript
/^ {0,}\/\*\*+|^ {0,}\*+\*\/|^ {0,}\*/g, '///'
```

## DELETE EMPTY LINES IN BLOCK COMMENTS 

```javascript
/^[&bsol;s]*[\*]{1}[&bsol;s]*[&bsol;n]{1}/g, ''
```

## SELECTED WHOLE PHP COMMENT BLOCK 

```javascript
/(\/\*([^*]|[\r&bsol;n]|(\*+([^*/]|[\r&bsol;n])))*\*+\/)|(\/\/.*)/g, ''
```

## GET OR SELECT ALL LINKS 'format:kill-all-anchor-links'  

```javascript
/<a[&bsol;s]+href[&bsol;s]{0,}[\=][\"][^\"]*\"/g, '<a href=""'
```

## KILL ALL INLINE STYLES 

```javascript
/style=\"[^\"]+\"/g, ''
```

## ADD LEADING ZEROS 'format:zeros-before-leading'  

```javascript
/[^\d]{1}\.(\d)+/g, ' 0.$1'
```


### COMMENTS 

```javascript
multiLine Comments:                     /*.*?*/, "/s"
singleLine Comments:                    ///.*$/g m
singleLine Perl Comments:               /#.*$/gm
```

### SINGLE DOUBLE QUOTATIONS

```javascript
doubleQuotedString:                   /"([^"n]|.)*"/g
singleQuotedString:                   /'([^'n]|.)*'/g,
multiLineDoubleQuotedString:          a('"([^\"]|\.)*"', "gs")
multiLineSingleQuotedString:          a("'([^\']|\.)*'", "gs")
xmlComments:                          a("(&lt;|<)!--f.*?--(&gt;|>)", "gs")
url:                                  /w+://[w-./?%&=:@;#]*/g
```

### PHP Script Tags: 

```javascript
left :                              /(&lt;|<)?(?:=|php)?/g,
right:                              /?(&gt;|>)/g,
eof  :                              !0
```

### aspScriptTags:  

```javascript
left:                               /(&lt;|<)%=?/g,
right:                              /%(&gt;|>)/g
```

### JAVASCRIPT TAGS

```javascript
left:                               /(&lt;|<)s*script.*?(&gt;|>)/gi,
right:                              /(&lt;|<)/s*scripts*(&gt;|>)/gi
spacesAtStartOfString:              /^s*/,
removeExtraSpacesAfterEndOfWords:   /b[s]{2,}/|[w][s]{2,}|[s]{2,}[w]|,
```

REMOVE EXTRA SPACES AFTER END OF WORDS

```javascript
-- b[s]{2,} -- [w][s]{2,}|[s]{2,}[w]|
 "^[^rndS][s]*", ''
 /^n*s*/, 'n'
 /t/g, '  '
 "/^.s*", ''
 /ss/g, ' '
 /nn/g, '&bsol;n'
(/t/g, '  ')
 /\r&bsol;n\r&bsol;n/g, '\r&bsol;n'
(/^[&bsol;n]+/g, '&bsol;n')
(/[\r|&bsol;n]{3,}/g, '&bsol;n&bsol;n')

(WIP) note: CAN'T PARSE INSIDE BLOCK 
/[/]{1}[*]{1,}[nrs*]{1,}[*]?[^/]*[nrs]{1,}[*]{1,}[/]{1}
vv-- CAN'T PARSE MULTIPLE / / / (URL)
/(/[*]{1,}[^/]{1,})/ *?([^/]{0,}[*]{1,}/)/
/(/[*]{1,}[^/]{1,})[/]?([^/]{0,}[*]{1,}/)/
/*([^*]|[rn]|(*+([^*/]|[rn])))**+/
//*([^*]|[rn]|(*+([^*/]|[rn])))**+/q
```

 EVERYTHING BETWEEN THE BRACES
```javascript
{([^{}]|[s])+}
```

