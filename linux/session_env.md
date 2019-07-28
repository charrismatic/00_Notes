## GREP_COLORS
#
#     The colors and other attributes  used  to  highlight  output with a colon-separated  list  of  capabilities  
#
#         ms=01;31:mc=01;31:sl=:cx=:fn=35:ln=32:bn=32:se=36  \*default
#
#     with the rv and ne boolean capabilities omitted (i.e., false).  
# -----------------------------------------------------------------------------
### Supported capabilities
# -----------------------------------------------------------------------------
#    __sl=__     - *whole  selected  lines* SGR string
#                 (i.e., matching lines when the -v command-line option is omitted, or non-matching lines when -v is specified).  
#                 If however the boolean rv capability and the -v command-line option are both specified, it applies to context matching lines instead.  
#                 The default is empty (i.e., the terminal's default color pair).
# -----------------------------------------------------------------------------
#    __cx=__     - *whole  context  lines* SGR string 
#                 (i.e., non-matching lines when the -v command-line option is omitted, or matching lines when -v is specified).  
#                 If however the boolean rv capability and the -v command-line option are both specified, it applies to selected non-matching lines instead.  The default is empty  (i.e.,  the  terminal's
#                 default color pair).
# -----------------------------------------------------------------------------
#    __rv__     Boolean value that reverses (swaps) the meanings of the sl= and cx= capabilities when the -v command-line option is specified. 
#                 The default is false (i.e., the capability is omitted).
# -----------------------------------------------------------------------------
#    __mt=01;31__ - *matching non-empty* SGR string text in any matching line
#                (i.e., a selected line when the -v command-line option is omitted, or a context line when -v is specified).
#                Setting this is equivalent to setting both ms= and mc= at once to the same value.  
#                The default is a bold red text foreground over the current line background.
# -----------------------------------------------------------------------------
#    __ms=01;31__ - *matching  non-empty text in a selected line* SGR string 
#                 This is only used when the -v command-line option is omitted.
#                 The effect of the sl= (or cx= if rv) capability remains active when this kicks in.  
#                 The default is a bold red text foreground over the current line background.
# -----------------------------------------------------------------------------
#     __mc=01;31__- *matching non-empty* SGR string text in a context line.  (This is only used when the -v command-line option is specified.) 
#         The effect of the  cx=  (or  sl=  if  rv) capability remains active when this kicks in.  
#         The default is a bold red text foreground over the current line background.
# -----------------------------------------------------------------------------
#     __fn=35__   - *file names prefixing* SGR string any content line. 
#        The default is a magenta text foreground over the terminal's default background.
# -----------------------------------------------------------------------------
#     __ln=32__   - *line numbers prefixing* SGR string any content line.  
#         The default is a green text foreground over the terminal's default background.
# -----------------------------------------------------------------------------
#     __bn=32__   - *byte offsets prefixing* SGR string any content line.
#         The default is a green text foreground over the terminal's default background.
# -----------------------------------------------------------------------------
#    __se=36__    - *separators  that  are inserted between selected line* SGR string 
#             default cyan text foreground
#             (:)  fields, 
#             (-)  between context line fields, 
#            (--)  between groups of adjacent lines when nonzero context is specified.  
# -----------------------------------------------------------------------------
#    __ne__  Boolean value that prevents clearing to the end of line using Erase in Line (EL) to Right (\33[K) each time a colorized item ends. 
#         This is needed on terminals  on  which EL  is  not  supported.
#         It is  otherwise useful on terminals for which the back_color_erase (bce) boolean terminfo capability does not apply, when the chosen highlight
#         colors do not affect the background, or when EL is too slow or causes too much flicker.  The default is false (i.e., the capability is omitted).
# -----------------------------------------------------------------------------
#     Note that boolean capabilities have no =...  part.  
#     They are omitted (=false) by default and become (=true) when specified.
# -----------------------------------------------------------------------------
#     See the 'Select Graphic Rendition (SGR)' section in the documentation for values and their  character attributes.  
#         are  integers  in  decimal  representation  and  can  be  concatenated with semicolons. 
#         grep takes care of assembling the result into a complete SGR sequence (\33[...m).  
# -----------------------------------------------------------------------------
#    __Common values to concatenate include__
#      - 1 for bold,
#      - 4 for underline, 
#      - 5 for blink, 
#      - 7 for inverse,
#      - 39 for default foreground color, 
#      - 30 to 37 for foreground colors, 
#      - 90 to 97 for 16-color mode foreground colors, 
#      - 38;5;0 to 38;5;255   -   88-color and 256-color modes foreground colors,
#      - 49          - default background color, 
#      - 40 to 47    -  background colors,
#      - 100 to 107  - 16-color mode background colors,
#      - 48;5;0 to 48;5;255 - 88-color and 256-color modes background colors.
# -----------------------------------------------------------------------------


## BASH ENV VARIABLES
# --color
# --extended-regexp 
# --ignore-case
# --basic-regexp
# --perl-regexp
# --regexp=PATTERN
# --invert-match
# --word-regexp
# --line-regexp
# --count
# --files-without-match
# --files-with-matches
# --max-count=NUM
# --only-matching
# --byte-offset
# --with-filename
# --no-filename
# --label=LABEL
# --line-number
# --initial-tab
# --null  
# --after-context=NUM
# --before-context=NUM
# --context=NUM
# --group-separator
# --no-group-separator
# --binary-files=text
# --binary-files=without-match
# --devices=ACTION
# --directories=ACTION
# --exclude=GLOB
# --exclude-from=FILE
# --exclude-dir=DIR
# --include=GLOB
# --line-buffered
# --recursive
# --dereference-recursive
# --binary
# --null-data
# export GREP_OPTIONS="--color --extended-regexp --ignore-case"
#GREP_COLOR=ms=01;31:mc=01;31:sl=:cx=:fn=35:ln=32:bn=32:se=36


