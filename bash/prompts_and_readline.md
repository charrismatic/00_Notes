PROMPTING
       When executing interactively, bash displays the primary prompt PS1 when it is ready to read a command, and the secondary prompt PS2 when it needs more input to complete a command.  Bash  displays  PS0
       after it reads a command but before executing it.  Bash allows these prompt strings to be customized by inserting a number of backslash-escaped special characters that are decoded as follows:
              \a     an ASCII bell character (07)
              \d     the date in "Weekday Month Date" format (e.g., "Tue May 26")
              \D{format}
                     the format is passed to strftime(3) and the result is inserted into the prompt string; an empty format results in a locale-specific time representation.  The braces are required
              \e     an ASCII escape character (033)
              \h     the hostname up to the first `.'
              \H     the hostname
              \j     the number of jobs currently managed by the shell
              \l     the basename of the shell's terminal device name
              \n     newline
              \r     carriage return
              \s     the name of the shell, the basename of $0 (the portion following the final slash)
              \t     the current time in 24-hour HH:MM:SS format
              \T     the current time in 12-hour HH:MM:SS format
              \@     the current time in 12-hour am/pm format
              \A     the current time in 24-hour HH:MM format
              \u     the username of the current user
              \v     the version of bash (e.g., 2.00)
              \V     the release of bash, version + patch level (e.g., 2.00.0)
              \w     the current working directory, with $HOME abbreviated with a tilde (uses the value of the PROMPT_DIRTRIM variable)
              \W     the basename of the current working directory, with $HOME abbreviated with a tilde
              \!     the history number of this command
              \#     the command number of this command
              \$     if the effective UID is 0, a #, otherwise a $
              \nnn   the character corresponding to the octal number nnn
              \\     a backslash
              \[     begin a sequence of non-printing characters, which could be used to embed a terminal control sequence into the prompt
              \]     end a sequence of non-printing characters

       The  command  number  and  the history number are usually different: the history number of a command is its position in the history list, which may include commands restored from the history file (see
       HISTORY below), while the command number is the position in the sequence of commands executed during the current shell session.  After the string is decoded, it is expanded  via  parameter  expansion,
       command substitution, arithmetic expansion, and quote removal, subject to the value of the promptvars shell option (see the description of the shopt command under SHELL BUILTIN COMMANDS below).

READLINE
       This  is  the library that handles reading input when using an interactive shell, unless the --noediting option is given at shell invocation.  Line editing is also used when using the -e option to the
       read builtin.  By default, the line editing commands are similar to those of Emacs.  A vi-style line editing interface is also available.  Line editing can be enabled at any time using the -o emacs or
       -o vi options to the set builtin (see SHELL BUILTIN COMMANDS below).  To turn off line editing after the shell is running, use the +o emacs or +o vi options to the set builtin.

   Readline Notation
       In  this section, the Emacs-style notation is used to denote keystrokes.  Control keys are denoted by C-key, e.g., C-n means Control-N.  Similarly, meta keys are denoted by M-key, so M-x means Meta-X.
       (On keyboards without a meta key, M-x means ESC x, i.e., press the Escape key then the x key.  This makes ESC the meta prefix.  The combination M-C-x means ESC-Control-x, or press the Escape key  then
       hold the Control key while pressing the x key.)

       Readline  commands may be given numeric arguments, which normally act as a repeat count.  Sometimes, however, it is the sign of the argument that is significant.  Passing a negative argument to a com‐
       mand that acts in the forward direction (e.g., kill-line) causes that command to act in a backward direction.  Commands whose behavior with arguments deviates from this are noted below.

       When a command is described as killing text, the text deleted is saved for possible future retrieval (yanking).  The killed text is saved in a kill ring.  Consecutive kills cause the text to be  accu‐
       mulated into one unit, which can be yanked all at once.  Commands which do not kill text separate the chunks of text on the kill ring.

   Readline Initialization
       Readline is customized by putting commands in an initialization file (the inputrc file).  The name of this file is taken from the value of the INPUTRC variable.  If that variable is unset, the default
       is ~/.inputrc.  When a program which uses the readline library starts up, the initialization file is read, and the key bindings and variables are set.  There are only a few basic constructs allowed in
       the  readline  initialization  file.   Blank  lines are ignored.  Lines beginning with a # are comments.  Lines beginning with a $ indicate conditional constructs.  Other lines denote key bindings and
       variable settings.

       The default key-bindings may be changed with an inputrc file.  Other programs that use this library may add their own commands and bindings.

       For example, placing

              M-Control-u: universal-argument
       or
              C-Meta-u: universal-argument
       into the inputrc would make M-C-u execute the readline command universal-argument.

       The following symbolic character names are recognized: RUBOUT, DEL, ESC, LFD, NEWLINE, RET, RETURN, SPC, SPACE, and TAB.

       In addition to command names, readline allows keys to be bound to a string that is inserted when the key is pressed (a macro).




    Readline Key Bindings
        The syntax for controlling key bindings in the inputrc file is simple.  All that is required is the name of the command or the text of a macro and a key sequence to which it should be bound.  The name
        may be specified in one of two ways: as a symbolic key name, possibly with Meta- or Control- prefixes, or as a key sequence.

        When using the form keyname:function-name or macro, keyname is the name of a key spelled out in English.  For example:

               Control-u: universal-argument
               Meta-Rubout: backward-kill-word
               Control-o: "> output"

        In  the  above example, C-u is bound to the function universal-argument, M-DEL is bound to the function backward-kill-word, and C-o is bound to run the macro expressed on the right hand side (that is,
        to insert the text ``> output'' into the line).

        In the second form, "keyseq":function-name or macro, keyseq differs from keyname above in that strings denoting an entire key sequence may be specified by placing the sequence  within  double  quotes.
        Some GNU Emacs style key escapes can be used, as in the following example, but the symbolic character names are not recognized.

               "\C-u": universal-argument
               "\C-x\C-r": re-read-init-file
               "\e[11~": "Function Key 1"

        In this example, C-u is again bound to the function universal-argument.  C-x C-r is bound to the function re-read-init-file, and ESC [ 1 1 ~ is bound to insert the text ``Function Key 1''.

        The full set of GNU Emacs style escape sequences is
               \C-    control prefix
               \M-    meta prefix
               \e     an escape character
               \\     backslash
               \"     literal "
               \'     literal '

        In addition to the GNU Emacs style escape sequences, a second set of backslash escapes is available:
               \a     alert (bell)
               \b     backspace
               \d     delete
               \f     form feed
               \n     newline
               \r     carriage return
               \t     horizontal tab
               \v     vertical tab
               \nnn   the eight-bit character whose value is the octal value nnn (one to three digits)
               \xHH   the eight-bit character whose value is the hexadecimal value HH (one or two hex digits)

        When  entering  the  text  of  a  macro, single or double quotes must be used to indicate a macro definition.  Unquoted text is assumed to be a function name.  In the macro body, the backslash escapes
        described above are expanded.  Backslash will quote any other character in the macro text, including " and '.

        Bash allows the current readline key bindings to be displayed or modified with the bind builtin command.  The editing mode may be switched during interactive use by using the  -o  option  to  the  set
        builtin command (see SHELL BUILTIN COMMANDS below).


Readline Variables
       Readline has variables that can be used to further customize its behavior.  A variable may be set in the inputrc file with a statement of the form

              set variable-name value

       Except  where  noted,  readline  variables  can take the values On or Off (without regard to case).  Unrecognized variable names are ignored.  When a variable value is read, empty or null values, "on"
       (case-insensitive), and "1" are equivalent to On.  All other values are equivalent to Off.  The variables and their default values are:

       bell-style (audible)
              Controls what happens when readline wants to ring the terminal bell.  If set to none, readline never rings the bell.  If set to visible, readline uses a visible bell if one  is  available.   If
              set to audible, readline attempts to ring the terminal's bell.
       bind-tty-special-chars (On)
              If set to On, readline attempts to bind the control characters treated specially by the kernel's terminal driver to their readline equivalents.
       blink-matching-paren (Off)
              If set to On, readline attempts to briefly move the cursor to an opening parenthesis when a closing parenthesis is inserted.
       colored-completion-prefix (Off)
              If  set  to  On, when listing completions, readline displays the common prefix of the set of possible completions using a different color.  The color definitions are taken from the value of the
              LS_COLORS environment variable.
       colored-stats (Off)
              If set to On, readline displays possible completions using different colors to indicate their file type.  The color definitions are taken from the value of the LS_COLORS environment variable.
       comment-begin (``#'')
              The string that is inserted when the readline insert-comment command is executed.  This command is bound to M-# in emacs mode and to # in vi command mode.
       completion-display-width (-1)
              The number of screen columns used to display possible matches when performing completion.  The value is ignored if it is less than 0 or greater than the terminal screen width.   A  value  of  0
              will cause matches to be displayed one per line.  The default value is -1.
       completion-ignore-case (Off)
              If set to On, readline performs filename matching and completion in a case-insensitive fashion.
       completion-map-case (Off)
              If set to On, and completion-ignore-case is enabled, readline treats hyphens (-) and underscores (_) as equivalent when performing case-insensitive filename matching and completion.
       completion-prefix-display-length (0)
              The  length in characters of the common prefix of a list of possible completions that is displayed without modification.  When set to a value greater than zero, common prefixes longer than this
              value are replaced with an ellipsis when displaying possible completions.
       completion-query-items (100)
              This determines when the user is queried about viewing the number of possible completions generated by the possible-completions command.  It may be set to any  integer  value  greater  than  or
              equal  to zero.  If the number of possible completions is greater than or equal to the value of this variable, the user is asked whether or not he wishes to view them; otherwise they are simply
              listed on the terminal.
       convert-meta (On)
              If set to On, readline will convert characters with the eighth bit set to an ASCII key sequence by stripping the eighth bit and prefixing an escape character (in effect,  using  escape  as  the
              meta prefix).  The default is On, but readline will set it to Off if the locale contains eight-bit characters.
       disable-completion (Off)
              If set to On, readline will inhibit word completion.  Completion characters will be inserted into the line as if they had been mapped to self-insert.
       echo-control-characters (On)
              When set to On, on operating systems that indicate they support it, readline echoes a character corresponding to a signal generated from the keyboard.
       editing-mode (emacs)
              Controls whether readline begins with a set of key bindings similar to Emacs or vi.  editing-mode can be set to either emacs or vi.
       enable-bracketed-paste (Off)
              When set to On, readline will configure the terminal in a way that will enable it to insert each paste into the editing buffer as a single string of characters, instead of treating each charac‐
              ter as if it had been read from the keyboard.  This can prevent pasted characters from being interpreted as editing commands.
       enable-keypad (Off)
              When set to On, readline will try to enable the application keypad when it is called.  Some systems need this to enable the arrow keys.
       enable-meta-key (On)
              When set to On, readline will try to enable any meta modifier key the terminal claims to support when it is called.  On many terminals, the meta key is used to send eight-bit characters.
       expand-tilde (Off)
              If set to On, tilde expansion is performed when readline attempts word completion.
       history-preserve-point (Off)
              If set to On, the history code attempts to place point at the same location on each history line retrieved with previous-history or next-history.
       history-size (unset)
              Set the maximum number of history entries saved in the history list.  If set to zero, any existing history entries are deleted and no new entries are saved.  If set to a value less  than  zero,
              the number of history entries is not limited.  By default, the number of history entries is set to the value of the HISTSIZE shell variable.  If an attempt is made to set history-size to a non-
              numeric value, the maximum number of history entries will be set to 500.
       horizontal-scroll-mode (Off)
              When set to On, makes readline use a single line for display, scrolling the input horizontally on a single screen line when it becomes longer than the screen width rather than wrapping to a new
              line.
       input-meta (Off)
              If  set  to  On,  readline will enable eight-bit input (that is, it will not strip the eighth bit from the characters it reads), regardless of what the terminal claims it can support.  The name
              meta-flag is a synonym for this variable.  The default is Off, but readline will set it to On if the locale contains eight-bit characters.
       isearch-terminators (``C-[C-J'')
              The string of characters that should terminate an incremental search without subsequently executing the character as a command.  If this variable has not been given a value, the characters  ESC
              and C-J will terminate an incremental search.
       keymap (emacs)
              Set the current readline keymap.  The set of valid keymap names is emacs, emacs-standard, emacs-meta, emacs-ctlx, vi, vi-command, and vi-insert.  vi is equivalent to vi-command; emacs is equiv‐
              alent to emacs-standard.  The default value is emacs; the value of editing-mode also affects the default keymap.
       emacs-mode-string (@)
              This string is displayed immediately before the last line of the primary prompt when emacs editing mode is active.  The value is expanded like a key binding, so the standard set  of  meta-  and
              control  prefixes  and  backslash  escape sequences is available.  Use the \1 and \2 escapes to begin and end sequences of non-printing characters, which can be used to embed a terminal control
              sequence into the mode string.
       keyseq-timeout (500)
              Specifies the duration readline will wait for a character when reading an ambiguous key sequence (one that can form a complete key sequence using the input read so far, or can  take  additional
              input  to  complete  a  longer key sequence).  If no input is received within the timeout, readline will use the shorter but complete key sequence.  The value is specified in milliseconds, so a
              value of 1000 means that readline will wait one second for additional input.  If this variable is set to a value less than or equal to zero, or to a non-numeric value, readline will wait  until
              another key is pressed to decide which key sequence to complete.
       mark-directories (On)
              If set to On, completed directory names have a slash appended.
       mark-modified-lines (Off)
              If set to On, history lines that have been modified are displayed with a preceding asterisk (*).
       mark-symlinked-directories (Off)
              If set to On, completed names which are symbolic links to directories have a slash appended (subject to the value of mark-directories).
       match-hidden-files (On)
              This  variable,  when set to On, causes readline to match files whose names begin with a `.' (hidden files) when performing filename completion.  If set to Off, the leading `.' must be supplied
              by the user in the filename to be completed.
       menu-complete-display-prefix (Off)
              If set to On, menu completion displays the common prefix of the list of possible completions (which may be empty) before cycling through the list.
       output-meta (Off)
              If set to On, readline will display characters with the eighth bit set directly rather than as a meta-prefixed escape sequence.  The default is Off, but readline will set it to On if the locale
              contains eight-bit characters.
       page-completions (On)
              If set to On, readline uses an internal more-like pager to display a screenful of possible completions at a time.
       print-completions-horizontally (Off)
              If set to On, readline will display completions with matches sorted horizontally in alphabetical order, rather than down the screen.
       revert-all-at-newline (Off)
              If  set  to On, readline will undo all changes to history lines before returning when accept-line is executed.  By default, history lines may be modified and retain individual undo lists across
              calls to readline.
       show-all-if-ambiguous (Off)
              This alters the default behavior of the completion functions.  If set to On, words which have more than one possible completion cause the matches to be listed immediately instead of ringing the
              bell.
       show-all-if-unmodified (Off)
              This  alters the default behavior of the completion functions in a fashion similar to show-all-if-ambiguous.  If set to On, words which have more than one possible completion without any possi‐
              ble partial completion (the possible completions don't share a common prefix) cause the matches to be listed immediately instead of ringing the bell.
       show-mode-in-prompt (Off)
              If set to On, add a character to the beginning of the prompt indicating the editing mode: emacs (@), vi command (:) or vi insertion (+).
       skip-completed-text (Off)
              If set to On, this alters the default completion behavior when inserting a single match into the line.  It's only active when performing completion in the middle of a word.  If  enabled,  read‐
              line does not insert characters from the completion that match characters after point in the word being completed, so portions of the word following the cursor are not duplicated.
       vi-cmd-mode-string ((cmd))
              This  string  is  displayed immediately before the last line of the primary prompt when vi editing mode is active and in command mode.  The value is expanded like a key binding, so the standard
              set of meta- and control prefixes and backslash escape sequences is available.  Use the \1 and \2 escapes to begin and end sequences of non-printing characters, which can be  used  to  embed  a
              terminal control sequence into the mode string.
       vi-ins-mode-string ((ins))
              This  string is displayed immediately before the last line of the primary prompt when vi editing mode is active and in insertion mode.  The value is expanded like a key binding, so the standard
              set of meta- and control prefixes and backslash escape sequences is available.  Use the \1 and \2 escapes to begin and end sequences of non-printing characters, which can be  used  to  embed  a
              terminal control sequence into the mode string.
       visible-stats (Off)
              If set to On, a character denoting a file's type as reported by stat(2) is appended to the filename when listing possible completions.




              Readline Conditional Constructs
                  Readline  implements  a facility similar in spirit to the conditional compilation features of the C preprocessor which allows key bindings and variable settings to be performed as the result of tests.
                  There are four parser directives used.

                  $if    The $if construct allows bindings to be made based on the editing mode, the terminal being used, or the application using readline.  The text of the test extends to the  end  of  the  line;  no
                         characters are required to isolate it.

                         mode   The  mode=  form of the $if directive is used to test whether readline is in emacs or vi mode.  This may be used in conjunction with the set keymap command, for instance, to set bindings
                                in the emacs-standard and emacs-ctlx keymaps only if readline is starting out in emacs mode.

                         term   The term= form may be used to include terminal-specific key bindings, perhaps to bind the key sequences output by the terminal's function keys.  The word on the right side of  the  =  is
                                tested against both the full name of the terminal and the portion of the terminal name before the first -.  This allows sun to match both sun and sun-cmd, for instance.

                         application
                                The  application construct is used to include application-specific settings.  Each program using the readline library sets the application name, and an initialization file can test for a
                                particular value.  This could be used to bind key sequences to functions useful for a specific program.  For instance, the following command adds a key sequence that quotes  the  current
                                or previous word in bash:

                                $if Bash
                                # Quote the current or previous word
                                "\C-xq": "\eb\"\ef\""
                                $endif

                  $endif This command, as seen in the previous example, terminates an $if command.

                  $else  Commands in this branch of the $if directive are executed if the test fails.

                  $include
                         This directive takes a single filename as an argument and reads commands and bindings from that file.  For example, the following directive would read /etc/inputrc:

                         $include  /etc/inputrc
