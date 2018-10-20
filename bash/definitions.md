
 DEFINITIONS
        The following definitions are used throughout the rest of this document.
        blank  A space or tab.
        word   A sequence of characters considered as a single unit by the shell.  Also known as a token.
        name   A word consisting only of alphanumeric characters and underscores, and beginning with an alphabetic character or an underscore.  Also referred to as an identifier.
        metacharacter
               A character that, when unquoted, separates words.  One of the following:
               |  & ; ( ) < > space tab newline
        control operator
               A token that performs a control function.  It is one of the following symbols:
               || & && ; ;; ;& ;;& ( ) | |& <newline>

 RESERVED WORDS
        Reserved words are words that have a special meaning to the shell.  The following words are recognized as reserved when unquoted and either the first word of a simple command (see SHELL GRAMMAR below)
        or the third word of a case or for command:

        ! case  coproc  do done elif else esac fi for function if in select then until while { } time [[ ]]

 SHELL GRAMMAR
    Simple Commands
        A simple command is a sequence of optional variable assignments followed by blank-separated words and redirections, and terminated by a control operator.  The first word specifies the  command  to  be
        executed, and is passed as argument zero.  The remaining words are passed as arguments to the invoked command.

        The return value of a simple command is its exit status, or 128+n if the command is terminated by signal n.

    Pipelines
        A pipeline is a sequence of one or more commands separated by one of the control operators | or |&.  The format for a pipeline is:

               [time [-p]] [ ! ] command [ [|⎪|&] command2 ... ]

        The standard output of command is connected via a pipe to the standard input of command2.  This connection is performed before any redirections specified by the command (see REDIRECTION below).  If |&
        is used, command's standard error, in addition to its standard output, is connected to command2's standard input through the pipe; it is shorthand for 2>&1 |.  This implicit redirection of  the  stan‐
        dard error to the standard output is performed after any redirections specified by the command.

        The  return  status  of a pipeline is the exit status of the last command, unless the pipefail option is enabled.  If pipefail is enabled, the pipeline's return status is the value of the last (right‐
        most) command to exit with a non-zero status, or zero if all commands exit successfully.  If the reserved word !  precedes a pipeline, the exit status of that pipeline is the logical negation  of  the
        exit status as described above.  The shell waits for all commands in the pipeline to terminate before returning a value.

        If the time reserved word precedes a pipeline, the elapsed as well as user and system time consumed by its execution are reported when the pipeline terminates.  The -p option changes the output format
        to that specified by POSIX.  When the shell is in posix mode, it does not recognize time as a reserved word if the next token begins with a `-'.  The TIMEFORMAT variable may be set to a format  string
        that specifies how the timing information should be displayed; see the description of TIMEFORMAT under Shell Variables below.

        When  the  shell  is in posix mode, time may be followed by a newline.  In this case, the shell displays the total user and system time consumed by the shell and its children.  The TIMEFORMAT variable
        may be used to specify the format of the time information.

        Each command in a pipeline is executed as a separate process (i.e., in a subshell).

    Lists
        A list is a sequence of one or more pipelines separated by one of the operators ;, &, &&, or ||, and optionally terminated by one of ;, &, or <newline>.

        Of these list operators, && and || have equal precedence, followed by ; and &, which have equal precedence.

        A sequence of one or more newlines may appear in a list instead of a semicolon to delimit commands.

        If a command is terminated by the control operator &, the shell executes the command in the background in a subshell.  The shell does not wait for the command to finish, and the return  status  is  0.
        Commands separated by a ; are executed sequentially; the shell waits for each command to terminate in turn.  The return status is the exit status of the last command executed.

        AND and OR lists are sequences of one or more pipelines separated by the && and || control operators, respectively.  AND and OR lists are executed with left associativity.  An AND list has the form

               command1 && command2

        command2 is executed if, and only if, command1 returns an exit status of zero.

        An OR list has the form

               command1 || command2

        command2 is executed if and only if command1 returns a non-zero exit status.  The return status of AND and OR lists is the exit status of the last command executed in the list.

    Compound Commands
        A  compound command is one of the following.  In most cases a list in a command's description may be separated from the rest of the command by one or more newlines, and may be followed by a newline in
        place of a semicolon.

        (list) list is executed in a subshell environment (see COMMAND EXECUTION ENVIRONMENT below).  Variable assignments and builtin commands that affect the shell's environment  do  not  remain  in  effect
               after the command completes.  The return status is the exit status of list.

        { list; }
               list is simply executed in the current shell environment.  list must be terminated with a newline or semicolon.  This is known as a group command.  The return status is the exit status of list.
               Note that unlike the metacharacters ( and ), { and } are reserved words and must occur where a reserved word is permitted to be recognized.  Since they do not cause a word break, they  must  be
               separated from list by whitespace or another shell metacharacter.

        ((expression))
               The  expression is evaluated according to the rules described below under ARITHMETIC EVALUATION.  If the value of the expression is non-zero, the return status is 0; otherwise the return status
               is 1.  This is exactly equivalent to let "expression".

        [[ expression ]]
               Return a status of 0 or 1 depending on the evaluation of the conditional expression expression.  Expressions are composed of the primaries described below under CONDITIONAL  EXPRESSIONS.   Word
               splitting  and  pathname  expansion  are not performed on the words between the [[ and ]]; tilde expansion, parameter and variable expansion, arithmetic expansion, command substitution, process
               substitution, and quote removal are performed.  Conditional operators such as -f must be unquoted to be recognized as primaries.

               When used with [[, the < and > operators sort lexicographically using the current locale.

        See the description of the test builtin command (section SHELL BUILTIN COMMANDS below) for the handling of parameters (i.e.  missing parameters).

        When the == and != operators are used, the string to the right of the operator is considered a pattern and matched according to the rules described below under Pattern  Matching,  as  if  the  extglob
        shell  option  were  enabled.   The = operator is equivalent to ==.  If the nocasematch shell option is enabled, the match is performed without regard to the case of alphabetic characters.  The return
        value is 0 if the string matches (==) or does not match (!=) the pattern, and 1 otherwise.  Any part of the pattern may be quoted to force the quoted portion to be matched as a string.

        An additional binary operator, =~, is available, with the same precedence as == and !=.  When it is used, the string to the right of the operator is  considered  an  extended  regular  expression  and
        matched  accordingly  (as  in  regex(3)).  The return value is 0 if the string matches the pattern, and 1 otherwise.  If the regular expression is syntactically incorrect, the conditional expression's
        return value is 2.  If the nocasematch shell option is enabled, the match is performed without regard to the case of alphabetic characters.  Any part of the pattern may be quoted to force  the  quoted
        portion  to  be  matched  as  a  string.  Bracket expressions in regular expressions must be treated carefully, since normal quoting characters lose their meanings between brackets.  If the pattern is
        stored in a shell variable, quoting the variable expansion forces the entire pattern to be matched as a string.  Substrings matched by parenthesized subexpressions within the  regular  expression  are
        saved  in  the  array variable BASH_REMATCH.  The element of BASH_REMATCH with index 0 is the portion of the string matching the entire regular expression.  The element of BASH_REMATCH with index n is
        the portion of the string matching the nth parenthesized subexpression.

        Expressions may be combined using the following operators, listed in decreasing order of precedence:

               ( expression )
                      Returns the value of expression.  This may be used to override the normal precedence of operators.
               ! expression
                      True if expression is false.
               expression1 && expression2
                      True if both expression1 and expression2 are true.
               expression1 || expression2
                      True if either expression1 or expression2 is true.

               The && and || operators do not evaluate expression2 if the value of expression1 is sufficient to determine the return value of the entire conditional expression.

        for name [ [ in [ word ... ] ] ; ] do list ; done
               The list of words following in is expanded, generating a list of items.  The variable name is set to each element of this list in turn, and list is executed each time.  If the in word is  omit‐
               ted, the for command executes list once for each positional parameter that is set (see PARAMETERS below).  The return status is the exit status of the last command that executes.  If the expan‐
               sion of the items following in results in an empty list, no commands are executed, and the return status is 0.

        for (( expr1 ; expr2 ; expr3 )) ; do list ; done
               First, the arithmetic expression expr1 is evaluated according to the rules described below under ARITHMETIC EVALUATION.  The arithmetic expression expr2 is then evaluated  repeatedly  until  it
               evaluates  to  zero.  Each time expr2 evaluates to a non-zero value, list is executed and the arithmetic expression expr3 is evaluated.  If any expression is omitted, it behaves as if it evalu‐
               ates to 1.  The return value is the exit status of the last command in list that is executed, or false if any of the expressions is invalid.

        select name [ in word ] ; do list ; done
               The list of words following in is expanded, generating a list of items.  The set of expanded words is printed on the standard error, each preceded by a number.  If the in word is  omitted,  the
               positional  parameters  are  printed (see PARAMETERS below).  The PS3 prompt is then displayed and a line read from the standard input.  If the line consists of a number corresponding to one of
               the displayed words, then the value of name is set to that word.  If the line is empty, the words and prompt are displayed again.  If EOF is read, the command completes.  Any other  value  read
               causes  name  to  be  set to null.  The line read is saved in the variable REPLY.  The list is executed after each selection until a break command is executed.  The exit status of select is the
               exit status of the last command executed in list, or zero if no commands were executed.

        case word in [ [(] pattern [ | pattern ] ... ) list ;; ] ... esac
               A case command first expands word, and tries to match it against each pattern in turn, using the same matching rules as for pathname expansion (see  Pathname  Expansion  below).   The  word  is
               expanded  using  tilde  expansion, parameter and variable expansion, arithmetic expansion, command substitution, process substitution and quote removal.  Each pattern examined is expanded using
               tilde expansion, parameter and variable expansion, arithmetic expansion, command substitution, and process substitution.  If the nocasematch shell option is  enabled,  the  match  is  performed
               without regard to the case of alphabetic characters.  When a match is found, the corresponding list is executed.  If the ;; operator is used, no subsequent matches are attempted after the first
               pattern match.  Using ;& in place of ;; causes execution to continue with the list associated with the next set of patterns.  Using ;;& in place of ;; causes the shell to test the next  pattern
               list  in the statement, if any, and execute any associated list on a successful match.  The exit status is zero if no pattern matches.  Otherwise, it is the exit status of the last command exe‐
               cuted in list.

        if list; then list; [ elif list; then list; ] ... [ else list; ] fi
               The if list is executed.  If its exit status is zero, the then list is executed.  Otherwise, each elif list is executed in turn, and if its exit status is zero, the corresponding then  list  is
               executed and the command completes.  Otherwise, the else list is executed, if present.  The exit status is the exit status of the last command executed, or zero if no condition tested true.

        while list-1; do list-2; done
        until list-1; do list-2; done
               The  while  command  continuously  executes  the list list-2 as long as the last command in the list list-1 returns an exit status of zero.  The until command is identical to the while command,
               except that the test is negated: list-2 is executed as long as the last command in list-1 returns a non-zero exit status.  The exit status of the while and until commands is the exit status  of
               the last command executed in list-2, or zero if none was executed.

    Coprocesses
        A  coprocess  is  a shell command preceded by the coproc reserved word.  A coprocess is executed asynchronously in a subshell, as if the command had been terminated with the & control operator, with a
        two-way pipe established between the executing shell and the coprocess.

        The format for a coprocess is:

               coproc [NAME] command [redirections]

        This creates a coprocess named NAME.  If NAME is not supplied, the default name is COPROC.  NAME must not be supplied if command is a simple command (see above); otherwise, it is  interpreted  as  the
        first word of the simple command.  When the coprocess is executed, the shell creates an array variable (see Arrays below) named NAME in the context of the executing shell.  The standard output of com‐
        mand is connected via a pipe to a file descriptor in the executing shell, and that file descriptor is assigned to NAME[0].  The standard input of command is connected via a pipe to a  file  descriptor
        in  the  executing shell, and that file descriptor is assigned to NAME[1].  This pipe is established before any redirections specified by the command (see REDIRECTION below).  The file descriptors can
        be utilized as arguments to shell commands and redirections using standard word expansions.  The file descriptors are not available in subshells.  The process ID of the shell spawned  to  execute  the
        coprocess is available as the value of the variable NAME_PID.  The wait builtin command may be used to wait for the coprocess to terminate.

        Since the coprocess is created as an asynchronous command, the coproc command always returns success.  The return status of a coprocess is the exit status of command.

    Shell Function Definitions
        A shell function is an object that is called like a simple command and executes a compound command with a new set of positional parameters.  Shell functions are declared as follows:

        name () compound-command [redirection]
        function name [()] compound-command [redirection]
               This  defines a function named name.  The reserved word function is optional.  If the function reserved word is supplied, the parentheses are optional.  The body of the function is the compound
               command compound-command (see Compound Commands above).  That command is usually a list of commands between { and }, but may be any command listed under Compound Commands above, with one excep‐
               tion: If the function reserved word is used, but the parentheses are not supplied, the braces are required.  compound-command is executed whenever name is specified as the name of a simple com‐
               mand.  When in posix mode, name may not be the name of one of the POSIX special builtins.  Any redirections (see REDIRECTION below) specified when a function is defined are performed  when  the
               function is executed.  The exit status of a function definition is zero unless a syntax error occurs or a readonly function with the same name already exists.  When executed, the exit status of
               a function is the exit status of the last command executed in the body.  (See FUNCTIONS below.)
