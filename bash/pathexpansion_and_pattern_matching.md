Pathname Expansion
       After word splitting, unless the -f option has been set, bash scans each word for the characters *, ?, and [.  If one of these characters appears, then the word is regarded as a pattern, and  replaced
       with  an  alphabetically sorted list of filenames matching the pattern (see Pattern Matching below).  If no matching filenames are found, and the shell option nullglob is not enabled, the word is left
       unchanged.  If the nullglob option is set, and no matches are found, the word is removed.  If the failglob shell option is set, and no matches are found, an error message is printed and the command is
       not  executed.   If  the shell option nocaseglob is enabled, the match is performed without regard to the case of alphabetic characters.  Note that when using range expressions like [a-z] (see below),
       letters of the other case may be included, depending on the setting of LC_COLLATE.  When a pattern is used for pathname expansion, the character ``.''  at the start of a name or immediately  following
       a  slash  must be matched explicitly, unless the shell option dotglob is set.  When matching a pathname, the slash character must always be matched explicitly.  In other cases, the ``.''  character is
       not treated specially.  See the description of shopt below under SHELL BUILTIN COMMANDS for a description of the nocaseglob, nullglob, failglob, and dotglob shell options.

       The GLOBIGNORE shell variable may be used to restrict the set of filenames matching a pattern.  If GLOBIGNORE is set, each matching filename that also matches one of  the  patterns  in  GLOBIGNORE  is
       removed  from  the  list of matches.  If the nocaseglob option is set, the matching against the patterns in GLOBIGNORE is performed without regard to case.  The filenames ``.''  and ``..''  are always
       ignored when GLOBIGNORE is set and not null.  However, setting GLOBIGNORE to a non-null value has the effect of enabling the dotglob shell option, so all other filenames beginning with a  ``.''   will
       match.   To  get  the  old behavior of ignoring filenames beginning with a ``.'', make ``.*''  one of the patterns in GLOBIGNORE.  The dotglob option is disabled when GLOBIGNORE is unset.  The pattern
       matching honors the setting of the extglob shell option.

       Pattern Matching

       Any character that appears in a pattern, other than the special pattern characters described below, matches itself.  The NUL character may not occur in a pattern.  A backslash  escapes  the  following
       character; the escaping backslash is discarded when matching.  The special pattern characters must be quoted if they are to be matched literally.

       The special pattern characters have the following meanings:

              *      Matches  any  string,  including the null string.  When the globstar shell option is enabled, and * is used in a pathname expansion context, two adjacent *s used as a single pattern will
                     match all files and zero or more directories and subdirectories.  If followed by a /, two adjacent *s will match only directories and subdirectories.
              ?      Matches any single character.
              [...]  Matches any one of the enclosed characters.  A pair of characters separated by a hyphen denotes a range expression; any character that falls  between  those  two  characters,  inclusive,
                     using the current locale's collating sequence and character set, is matched.  If the first character following the [ is a !  or a ^ then any character not enclosed is matched.  The sort‐
                     ing order of characters in range expressions is determined by the current locale and the values of the LC_COLLATE or LC_ALL shell variables, if set.  To obtain the traditional  interpre‐
                     tation  of range expressions, where [a-d] is equivalent to [abcd], set value of the LC_ALL shell variable to C, or enable the globasciiranges shell option.  A - may be matched by includ‐
                     ing it as the first or last character in the set.  A ] may be matched by including it as the first character in the set.

                     Within [ and ], character classes can be specified using the syntax [:class:], where class is one of the following classes defined in the POSIX standard:
                     alnum alpha ascii blank cntrl digit graph lower print punct space upper word xdigit
                     A character class matches any character belonging to that class.  The word character class matches letters, digits, and the character _.

                     Within [ and ], an equivalence class can be specified using the syntax [=c=], which matches all characters with the same collation weight (as defined by the current locale) as the  char‐
                     acter c.

                     Within [ and ], the syntax [.symbol.] matches the collating symbol symbol.

       If  the extglob shell option is enabled using the shopt builtin, several extended pattern matching operators are recognized.  In the following description, a pattern-list is a list of one or more pat‐
       terns separated by a |.  Composite patterns may be formed using one or more of the following sub-patterns:

              ?(pattern-list)
                     Matches zero or one occurrence of the given patterns
              *(pattern-list)
                     Matches zero or more occurrences of the given patterns
              +(pattern-list)
                     Matches one or more occurrences of the given patterns
              @(pattern-list)
                     Matches one of the given patterns
              !(pattern-list)
                     Matches anything except one of the given patterns

   Quote Removal
       After the preceding expansions, all unquoted occurrences of the characters \, ', and " that did not result from one of the above expansions are removed.
