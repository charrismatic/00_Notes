
QUOTING
       Quoting is used to remove the special meaning of certain characters or words to the shell.  Quoting can be used to disable special treatment for special characters,  to  prevent  reserved  words  from
       being recognized as such, and to prevent parameter expansion.

       Each of the metacharacters listed above under DEFINITIONS has special meaning to the shell and must be quoted if it is to represent itself.

       When the command history expansion facilities are being used (see HISTORY EXPANSION below), the history expansion character, usually !, must be quoted to prevent history expansion.

       There are three quoting mechanisms: the escape character, single quotes, and double quotes.

       A  non-quoted  backslash  (\) is the escape character.  It preserves the literal value of the next character that follows, with the exception of <newline>.  If a \<newline> pair appears, and the back‐
       slash is not itself quoted, the \<newline> is treated as a line continuation (that is, it is removed from the input stream and effectively ignored).

       Enclosing characters in single quotes preserves the literal value of each character within the quotes.  A single quote may not occur between single quotes, even when preceded by a backslash.

       Enclosing characters in double quotes preserves the literal value of all characters within the quotes, with the exception of $, `, \, and, when history expansion is enabled, !.  When the shell  is  in
       posix mode, the ! has no special meaning within double quotes, even when history expansion is enabled.  The characters $ and ` retain their special meaning within double quotes.  The backslash retains
       its special meaning only when followed by one of the following characters: $, `, ", \, or <newline>.  A double quote may be quoted within double quotes by preceding it with a backslash.   If  enabled,
       history expansion will be performed unless an !  appearing in double quotes is escaped using a backslash.  The backslash preceding the !  is not removed.

       The special parameters * and @ have special meaning when in double quotes (see PARAMETERS below).

       Words of the form $'string' are treated specially.  The word expands to string, with backslash-escaped characters replaced as specified by the ANSI C standard.  Backslash escape sequences, if present,
       are decoded as follows:
              \a     alert (bell)
              \b     backspace
              \e
              \E     an escape character
              \f     form referenced
              \n     new line
              \r     carriage return
              \t     horizontal tab
              \v     vertical tab
              \\     backslash
              \'     single quote
              \"     double quote
              \?     question mark
              \nnn   the eight-bit character whose value is the octal value nnn (one to three digits)
              \xHH   the eight-bit character whose value is the hexadecimal value HH (one or two hex digits)
              \uHHHH the Unicode (ISO/IEC 10646) character whose value is the hexadecimal value HHHH (one to four hex digits)
              \UHHHHHHHH
                     the Unicode (ISO/IEC 10646) character whose value is the hexadecimal value HHHHHHHH (one to eight hex digits)
              \cx    a control-x character

       The expanded result is single-quoted, as if the dollar sign had not been present.

       A double-quoted string preceded by a dollar sign ($"string") will cause the string to be translated according to the current locale.  If the current locale is C or POSIX, the dollar sign  is  ignored.
       If the string is translated and replaced, the replacement is double-quoted.
