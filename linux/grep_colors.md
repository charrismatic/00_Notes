#  Finally,  certain  named  classes  of  characters are predefined within bracket expressions, as follows.
#        Their names are self explanatory, and they are [:alnum:], [:alpha:],  [:cntrl:],  [:digit:],  [:graph:],
#        [:lower:],  [:print:],  [:punct:], [:space:], [:upper:], and [:xdigit:].  For example, [[:alnum:]] means
#        the character class of numbers and letters in the current locale.  In the C locale and  ASCII  character
#        set encoding, this is the same as [0-9A-Za-z].
#  The Backslash Character and Special Expressions
#        The symbols \< and \> respectively match the empty string at the beginning  and  end  of  a  word.   The
#        symbol  \b matches the empty string at the edge of a word, and \B matches the empty string provided it's
#        not at the edge of a word.  The symbol \w is a  synonym  for  [_[:alnum:]]  and  \W  is  a  synonym  for
#        [^_[:alnum:]].
# 
#    Repetition
#        A regular expression may be followed by one of several repetition operators:
#        ?      The preceding item is optional and matched at most once.
#        *      The preceding item will be matched zero or more times.
#        +      The preceding item will be matched one or more times.
#        {n}    The preceding item is matched exactly n times.
#        {n,}   The preceding item is matched n or more times.
#        {,m}   The preceding item is matched at most m times.  This is a GNU extension.
# GREP_OPTIONS
#             This variable specifies default options to be placed in front of any explicit options.   As  this
#              causes  problems  when writing portable scripts, this feature will be removed in a future release
#              of grep, and grep warns if it is used.  Please use an alias or script instead.
#       GREP_COLOR
#              This variable specifies the color used to highlight matched (non-empty) text.  It  is  deprecated
#              in  favor  of  GREP_COLORS,  but still supported.  The mt, ms, and mc capabilities of GREP_COLORS
#              have priority over it.  It can only specify the color used to highlight  the  matching  non-empty
#              text  in  any  matching  line 
#       (a  selected line when the -v command-line option is omitted, or a
#              context line when -v is specified).  The default is 01;31, which means a bold red foreground text
#              on the terminal's default background.

        GREP_COLORS
               Specifies  the  colors  and  other attributes used to highlight various parts of the output.  Its
               value    is    a    colon-separated     list     of     capabilities     that     defaults     to
               ms=01;31:mc=01;31:sl=:cx=:fn=35:ln=32:bn=32:se=36 with the rv and ne boolean capabilities omitted
               (i.e., false).  Supported capabilities are as follows.
 
               sl=    SGR substring for whole selected lines (i.e., matching  lines  when  the  -v  command-line
                      option is omitted, or non-matching lines when -v is specified).  If however the boolean rv
                      capability and the -v command-line option  are  both  specified,  it  applies  to  context
                      matching lines instead.  The default is empty (i.e., the terminal's default color pair).
 
               cx=    SGR  substring  for whole context lines (i.e., non-matching lines when the -v command-line
                      option is omitted, or matching lines when -v is specified).  If  however  the  boolean  rv
                      capability  and the -v command-line option are both specified, it applies to selected non-
                      matching lines instead.  The default is empty (i.e., the terminal's default color pair).
 
               rv     Boolean value that reverses (swaps) the meanings of the sl= and cx= capabilities when  the
                      -v  command-line  option  is  specified.   The  default  is false (i.e., the capability is
                      omitted).
 
               mt=01;31
                      SGR substring for matching non-empty text in any matching line (i.e., a selected line when
                      the  -v  command-line option is omitted, or a context line when -v is specified).  Setting
                      this is equivalent to setting both ms= and mc= at once to the same value.  The default  is
                      a bold red text foreground over the current line background.
 
               ms=01;31
                      SGR substring for matching non-empty text in a selected line.  (This is only used when the
                      -v command-line option is omitted.)  The effect of the  sl=  (or  cx=  if  rv)  capability
                      remains  active  when  this  kicks in.  The default is a bold red text foreground over the
                      current line background.
 
               mc=01;31
                      SGR substring for matching non-empty text in a context line.  (This is only used when  the
                      -v  command-line  option  is  specified.)  The effect of the cx= (or sl= if rv) capability
                      remains active when this kicks in.  The default is a bold red  text  foreground  over  the
                      current line background.
 
               fn=35  SGR  substring  for  file names prefixing any content line.  The default is a magenta text
                      foreground over the terminal's default background.
 
               ln=32  SGR substring for line numbers prefixing any content line.  The default is  a  green  text
                      foreground over the terminal's default background.
 
               bn=32  SGR  substring  for  byte offsets prefixing any content line.  The default is a green text
                      foreground over the terminal's default background.
 
               se=36  SGR substring for separators that are inserted between selected line fields  (:),  between
                      context  line  fields,  (-),  and between groups of adjacent lines when nonzero context is
                      specified (--).  The default is  a  cyan  text  foreground  over  the  terminal's  default
                      background.
 
               ne     Boolean  value that prevents clearing to the end of line using Erase in Line (EL) to Right
                      (\33[K) each time a colorized item ends.  This is needed on terminals on which EL  is  not
                      supported.   It  is  otherwise  useful  on  terminals for which the back_color_erase (bce)
                      boolean terminfo capability does not apply, when the chosen highlight colors do not affect
                      the  background,  or when EL is too slow or causes too much flicker.  The default is false
                      (i.e., the capability is omitted).
 
               Note that boolean capabilities have no =...  part.  They are omitted (i.e., false) by default and
               become true when specified.
 
               See  the Select Graphic Rendition (SGR) section in the documentation of the text terminal that is
               used for permitted values and their meaning as character attributes.  These substring values  are
               integers  in  decimal representation and can be concatenated with semicolons.  grep takes care of
               assembling the result into a complete SGR sequence  (\33[...m).   Common  values  to  concatenate
               include 1 for bold, 4 for underline, 5 for blink, 7 for inverse, 39 for default foreground color,
               30 to 37 for foreground colors, 90 to 97 for 16-color mode foreground colors, 38;5;0 to  38;5;255
               for 88-color and 256-color modes foreground colors, 49 for default background color, 40 to 47 for
               background colors, 100 to 107 for 16-color mode background colors, and  48;5;0  to  48;5;255  for
               88-color and 256-color modes background colors.
 


 SEE ALSO
    Regular Manual Pages
        awk(1),  cmp(1),  diff(1),  find(1),  gzip(1),  perl(1),  sed(1),  sort(1), xargs(1), zgrep(1), read(2),
        pcre(3), pcresyntax(3), pcrepattern(3), terminfo(5), glob(7), regex(7).
 
    POSIX Programmer's Manual Page
        grep(1p).
 
    Full Documentation
        A complete manual  ⟨http://www.gnu.org/software/grep/manual/⟩  is  available.   If  the  info  and  grep
        programs are properly installed at your site, the command
 
               info grep

