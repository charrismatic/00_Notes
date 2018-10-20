# /etc/profile: system-wide .profile file for the Bourne shell (sh(1))
# and Bourne compatible shells (bash(1), ksh(1), ash(1), ...).

if [ "$PS1" ]; then
  if [ "$BASH" ] && [ "$BASH" != "/bin/sh" ]; then
    # The file bash.bashrc already sets the default PS1.
    # PS1='\h:\w\$ '
    if [ -f /etc/bash.bashrc ]; then
      . /etc/bash.bashrc
    fi
  else
    if [ "`id -u`" -eq 0 ]; then
      PS1='# '
    else
      PS1='$ '
    fi
  fi
fi

if [ -d /etc/profile.d ]; then
  for i in /etc/profile.d/*.sh; do
    if [ -r $i ]; then
      . $i
    fi
  done
  unset i
fi


HOME/.hushlogin


/bin/bash
       The bash executable
/etc/profile
       The systemwide initialization file, executed for login shells
/etc/bash.bashrc
       The systemwide initialization file, executed for login shells
/etc/bash.bashrc



/bin/bash
       The bash executable
/etc/profile
       The systemwide initialization file, executed for login shells
/etc/bash.bashrc
       The systemwide per-interactive-shell startup file
/etc/bash.bash.logout
       The systemwide login shell cleanup file, executed when a login shell exits
~/.bash_profile
       The personal initialization file, executed for login shells
~/.bashrc
       The individual per-interactive-shell startup file
~/.bash_logout
       The individual login shell cleanup file, executed when a login shell exits
~/.inputrc
       Individual readline initialization file




       /bin/bash
              The bash executable
       /etc/profile
              The systemwide initialization file, executed for login shells
       /etc/bash.bashrc
       ulimit [-HSabcdefiklmnpqrstuvxPT [limit]]
              Provides control over the resources available to the shell and to processes started by it, on systems that allow such control.  The -H and -S options specify that the hard or soft limit is  set
              for the given resource.  A hard limit cannot be increased by a non-root user once it is set; a soft limit may be increased up to the value of the hard limit.  If neither -H nor -S is specified,
              both the soft and hard limits are set.  The value of limit can be a number in the unit specified for the resource or one of the special values hard, soft, or unlimited, which stand for the cur‐
              rent  hard  limit, the current soft limit, and no limit, respectively.  If limit is omitted, the current value of the soft limit of the resource is printed, unless the -H option is given.  When
              more than one resource is specified, the limit name and unit are printed before the value.  Other options are interpreted as follows:
              -a     All current limits are reported
              -b     The maximum socket buffer size
              -c     The maximum size of core files created
              -d     The maximum size of a process's data segment
              -e     The maximum scheduling priority ("nice")
              -f     The maximum size of files written by the shell and its children
              -i     The maximum number of pending signals
              -k     The maximum number of kqueues that may be allocated
              -l     The maximum size that may be locked into memory
              -m     The maximum resident set size (many systems do not honor this limit)
              -n     The maximum number of open file descriptors (most systems do not allow this value to be set)
              -p     The pipe size in 512-byte blocks (this may not be set)
              -q     The maximum number of bytes in POSIX message queues
              -r     The maximum real-time scheduling priority
              -s     The maximum stack size
              -t     The maximum amount of cpu time in seconds
              -u     The maximum number of processes available to a single user
              -v     The maximum amount of virtual memory available to the shell and, on some systems, to its children
              -x     The maximum number of file locks
              -P     The maximum number of pseudoterminals
              -T     The maximum number of threads

              If limit is given, and the -a option is not used, limit is the new value of the specified resource.  If no option is given, then -f is assumed.  Values are in 1024-byte increments,  except  for
              -t,  which  is in seconds; -p, which is in units of 512-byte blocks; -P, -T, -b, -k, -n, and -u, which are unscaled values; and, when in Posix mode, -c and -f, which are in 512-byte increments.
              The return status is 0 unless an invalid option or argument is supplied, or an error occurs while setting a new limit.

       umask [-p] [-S] [mode]
              The user file-creation mask is set to mode.  If mode begins with a digit, it is interpreted as an octal number; otherwise it is interpreted as a symbolic mode mask similar to that  accepted  by
              chmod(1).   If mode is omitted, the current value of the mask is printed.  The -S option causes the mask to be printed in symbolic form; the default output is an octal number.  If the -p option
              is supplied, and mode is omitted, the output is in a form that may be reused as input.  The return status is 0 if the mode was successfully changed or if no  mode  argument  was  supplied,  and
              false otherwise.

       unalias [-a] [name ...]
              Remove each name from the list of defined aliases.  If -a is supplied, all alias definitions are removed.  The return value is true unless a supplied name is not a defined alias.

       unset [-fv] [-n] [name ...]
              For  each  name,  remove  the corresponding variable or function.  If the -v option is given, each name refers to a shell variable, and that variable is removed.  Read-only variables may not be
              unset.  If -f is specified, each name refers to a shell function, and the function definition is removed.  If the -n option is supplied, and name is a variable with the nameref attribute,  name
              will  be  unset  rather  than the variable it references.  -n has no effect if the -f option is supplied.  If no options are supplied, each name refers to a variable; if there is no variable by
              that name, any function with that name is unset.  Each unset variable or function is removed from the environment passed to subsequent commands.  If any  of  COMP_WORDBREAKS,  RANDOM,  SECONDS,
              LINENO, HISTCMD, FUNCNAME, GROUPS, or DIRSTACK are unset, they lose their special properties, even if they are subsequently reset.  The exit status is true unless a name is readonly.

       wait [-n] [n ...]
              Wait  for  each  specified  child process and return its termination status.  Each n may be a process ID or a job specification; if a job spec is given, all processes in that job's pipeline are
              waited for.  If n is not given, all currently active child processes are waited for, and the return status is zero.  If the -n option is supplied, wait  waits  for  any  job  to  terminate  and
              returns its exit status.  If n specifies a non-existent process or job, the return status is 127.  Otherwise, the return status is the exit status of the last process or job waited for.

       unset [-fv] [-n] [name ...]
              For  each  name,  remove  the corresponding variable or function.  If the -v option is given, each name refers to a shell variable, and that variable is removed.  Read-only variables may not be
              unset.  If -f is specified, each name refers to a shell function, and the function definition is removed.  If the -n option is supplied, and name is a variable with the nameref attribute,  name
              will  be  unset  rather  than the variable it references.  -n has no effect if the -f option is supplied.  If no options are supplied, each name refers to a variable; if there is no variable by
              that name, any function with that name is unset.  Each unset variable or function is removed from the environment passed to subsequent commands.  If any  of  COMP_WORDBREAKS,  RANDOM,  SECONDS,
              LINENO, HISTCMD, FUNCNAME, GROUPS, or DIRSTACK are unset, they lose their special properties, even if they are subsequently reset.  The exit status is true unless a name is readonly.

       wait [-n] [n ...]
              Wait  for  each  specified  child process and return its termination status.  Each n may be a process ID or a job specification; if a job spec is given, all processes in that job's pipeline are
              waited for.  If n is not given, all currently active child processes are waited for, and the return status is zero.  If the -n option is supplied, wait  waits  for  any  job  to  terminate  and
              returns its exit status.  If n specifies a non-existent process or job, the return status is 127.  Otherwise, the return status is the exit status of the last process or job waited for.




              RESTRICTED SHELL
                     If bash is started with the name rbash, or the -r option is supplied at invocation, the shell becomes restricted.  A restricted shell is used to set up an environment more controlled than the standard
                     shell.  It behaves identically to bash with the exception that the following are disallowed or not performed:

                     ·      changing directories with cd

                     ·      setting or unsetting the values of SHELL, PATH, ENV, or BASH_ENV

                     ·      specifying command names containing /

                     ·      specifying a filename containing a / as an argument to the .  builtin command

                     ·      specifying a filename containing a slash as an argument to the -p option to the hash builtin command

                     ·      importing function definitions from the shell environment at startup

                     ·      parsing the value of SHELLOPTS from the shell environment at startup

                     ·      redirecting output using the >, >|, <>, >&, &>, and >> redirection operators

                     ·      using the exec builtin command to replace the shell with another command

                     ·      adding or deleting builtin commands with the -f and -d options to the enable builtin command

                     ·      using the enable builtin command to enable disabled shell builtins

                     ·      specifying the -p option to the command builtin command

                     ·      turning off restricted mode with set +r or set +o restricted.

                     These restrictions are enforced after any startup files are read.

                     When a command that is found to be a shell script is executed (see COMMAND EXECUTION above), rbash turns off any restrictions in the shell spawned to execute the script.

              SEE ALSO



              set [+abefhkmnptuvxBCEHPT] [+o option-name] [arg ...]
                     Without  options, the name and value of each shell variable are displayed in a format that can be reused as input for setting or resetting the currently-set variables.  Read-only variables can‐
                     not be reset.  In posix mode, only shell variables are listed.  The output is sorted according to the current locale.  When options are specified, they set or unset shell attributes.  Any argu‐
                     ments remaining after option processing are treated as values for the positional parameters and are assigned, in order, to $1, $2, ...  $n.  Options, if specified, have the following meanings:
                     -a      Each variable or function that is created or modified is given the export attribute and marked for export to the environment of subsequent commands.
                     -b      Report the status of terminated background jobs immediately, rather than before the next primary prompt.  This is effective only when job control is enabled.
                     -e      Exit immediately if a pipeline (which may consist of a single simple command), a list, or a compound command (see SHELL GRAMMAR above), exits with a non-zero status.  The shell does not
                             exit if the command that fails is part of the command list immediately following a while or until keyword, part of the test following the if or elif reserved words, part of any  command
                             executed  in  a  &&  or || list except the command following the final && or ||, any command in a pipeline but the last, or if the command's return value is being inverted with !.  If a
                             compound command other than a subshell returns a non-zero status because a command failed while -e was being ignored, the shell does not exit.  A trap on ERR, if set, is executed before
                             the shell exits.  This option applies to the shell environment and each subshell environment separately (see COMMAND EXECUTION ENVIRONMENT above), and may cause subshells to exit before
                             executing all the commands in the subshell.

                             If a compound command or shell function executes in a context where -e is being ignored, none of the commands executed within the compound command or function body will be  affected  by
                             the -e setting, even if -e is set and a command returns a failure status.  If a compound command or shell function sets -e while executing in a context where -e is ignored, that setting
                             will not have any effect until the compound command or the command containing the function call completes.
                     -f      Disable pathname expansion.
                     -h      Remember the location of commands as they are looked up for execution.  This is enabled by default.
                     -k      All arguments in the form of assignment statements are placed in the environment for a command, not just those that precede the command name.
                     -m      Monitor mode.  Job control is enabled.  This option is on by default for interactive shells on systems that support it (see JOB CONTROL above).  All processes run in a separate  process
                             group.  When a background job completes, the shell prints a line containing its exit status.
                     -n      Read commands but do not execute them.  This may be used to check a shell script for syntax errors.  This is ignored by interactive shells.
                     -o option-name
                             The option-name can be one of the following:
                             allexport
                                     Same as -a.
                             braceexpand
                                     Same as -B.
                             emacs   Use an emacs-style command line editing interface.  This is enabled by default when the shell is interactive, unless the shell is started with the --noediting option.  This also
                                     affects the editing interface used for read -e.
                             errexit Same as -e.
                             errtrace
                                     Same as -E.
                             functrace
                                     Same as -T.
                             hashall Same as -h.
                             histexpand
                                     Same as -H.
                             history Enable command history, as described above under HISTORY.  This option is on by default in interactive shells.
                             ignoreeof
                                     The effect is as if the shell command ``IGNOREEOF=10'' had been executed (see Shell Variables above).
                             keyword Same as -k.
                             monitor Same as -m.
                             noclobber
                                     Same as -C.
                                     Same as -C.
                             noexec  Same as -n.
                             noglob  Same as -f.
                             nolog   Currently ignored.
                             notify  Same as -b.
                             nounset Same as -u.
                             onecmd  Same as -t.
                             physical
                                     Same as -P.
                             pipefail
                                     If set, the return value of a pipeline is the value of the last (rightmost) command to exit with a non-zero status, or zero if all commands in the  pipeline  exit  successfully.
                                     This option is disabled by default.
                             posix   Change  the  behavior  of  bash where the default operation differs from the POSIX standard to match the standard (posix mode).  See SEE ALSO below for a reference to a document
                                     that details how posix mode affects bash's behavior.
                             privileged
                                     Same as -p.
                             verbose Same as -v.
                             vi      Use a vi-style command line editing interface.  This also affects the editing interface used for read -e.
                             xtrace  Same as -x.
                             If -o is supplied with no option-name, the values of the current options are printed.  If +o is supplied with no option-name, a series of set commands to  recreate  the  current  option
                             settings is displayed on the standard output.
                     -p      Turn  on privileged mode.  In this mode, the $ENV and $BASH_ENV files are not processed, shell functions are not inherited from the environment, and the SHELLOPTS, BASHOPTS, CDPATH, and
                             GLOBIGNORE variables, if they appear in the environment, are ignored.  If the shell is started with the effective user (group) id not equal to the real  user  (group)  id,  and  the  -p
                             option  is  not  supplied,  these  actions  are taken and the effective user id is set to the real user id.  If the -p option is supplied at startup, the effective user id is not reset.
                             Turning this option off causes the effective user and group ids to be set to the real user and group ids.
                     -t      Exit after reading and executing one command.
                     -u      Treat unset variables and parameters other than the special parameters "@" and "*" as an error when performing parameter expansion.  If expansion is attempted on an  unset  variable  or
                             parameter, the shell prints an error message, and, if not interactive, exits with a non-zero status.
                     -v      Print shell input lines as they are read.
                     -x      After  expanding  each  simple command, for command, case command, select command, or arithmetic for command, display the expanded value of PS4, followed by the command and its expanded
                             arguments or associated word list.
                     -B      The shell performs brace expansion (see Brace Expansion above).  This is on by default.
                     -C      If set, bash does not overwrite an existing file with the >, >&, and <> redirection operators.  This may be overridden when creating output files by using the  redirection  operator  >|
                             instead of >.
                     -E      If set, any trap on ERR is inherited by shell functions, command substitutions, and commands executed in a subshell environment.  The ERR trap is normally not inherited in such cases.
                     -H      Enable !  style history substitution.  This option is on by default when the shell is interactive.
                     -P      If  set,  the  shell does not resolve symbolic links when executing commands such as cd that change the current working directory.  It uses the physical directory structure instead.  By
                             default, bash follows the logical chain of directories when performing commands which change the current directory.
                     -T      If set, any traps on DEBUG and RETURN are inherited by shell functions, command substitutions, and commands executed in a subshell environment.  The DEBUG and RETURN traps are  normally
                             not inherited in such cases.
                     --      If no arguments follow this option, then the positional parameters are unset.  Otherwise, the positional parameters are set to the args, even if some of them begin with a -.
                     -       Signal  the end of options, cause all remaining args to be assigned to the positional parameters.  The -x and -v options are turned off.  If there are no args, the positional parameters
                             remain unchanged.

                     The options are off by default unless otherwise noted.  Using + rather than - causes these options to be turned off.  The options can also be specified as arguments  to  an  invocation  of  the
                     shell.  The current set of options may be found in $-.  The return status is always true unless an inva


                     or mark all jobs; the -r option without a jobspec argument restricts operation to running jobs.  The return value is 0 unless a jobspec does not specify a valid job.

echo [-neE] [arg ...]
Output  the  args, separated by spaces, followed by a newline.  The return status is 0 unless a write error occurs.  If -n is specified, the trailing newline is suppressed.  If the -e option is
given, interpretation of the following backslash-escaped characters is enabled.  The -E option disables the interpretation of these escape characters, even on systems where they are interpreted
by  default.   The  xpg_echo  shell  option  may  be used to dynamically determine whether or not echo expands these escape characters by default.  echo does not interpret -- to mean the end of
options.  echo interprets the following escape sequences:
\a     alert (bell)
\b     backspace
\c     suppress further output
\e
\E     an escape character
\f     form feed
\n     new line
\r     carriage return
\t     horizontal tab
\v     vertical tab
\\     backslash
\0nnn  the eight-bit character whose value is the octal value nnn (zero to three octal digits)
\xHH   the eight-bit character whose value is the hexadecimal value HH (one or two hex digits)
\uHHHH the Unicode (ISO/IEC 10646) character whose value is the hexadecimal value HHHH (one to four hex digits)
\UHHHHHHHH
       the Unicode (ISO/IEC 10646) character whose value is the hexadecimal value HHHHHHHH (one to eight hex digits)





       dirs [-clpv] [+n] [-n]
               Without options, displays the list of currently remembered directories.  The default display is on a single line with directory names separated by spaces.  Directories are  added  to  the  list
               with the pushd command; the popd command removes entries from the list.  The current directory is always the first directory in the stack.
               -c     Clears the directory stack by deleting all of the entries.
               -l     Produces a listing using full pathnames; the default listing format uses a tilde to denote the home directory.
               -p     Print the directory stack with one entry per line.
               -v     Print the directory stack with one entry per line, prefixing each entry with its index in the stack.
               +n     Displays the nth entry counting from the left of the list shown by dirs when invoked without options, starting with zero.
               -n     Displays the nth entry counting from the right of the list shown by dirs when invoked without options, starting with zero.

               The return value is 0 unless an invalid option is supplied or n indexes beyond the end of the directory stack.



               command [-pVv] command [arg ...]
                        Run command with args suppressing the normal shell function lookup.  Only builtin commands or commands found in the PATH are executed.  If the -p option is given, the search for command is per‐
                        formed using a default value for PATH that is guaranteed to find all of the standard utilities.  If either the -V or -v option is supplied, a description of command is printed.  The  -v  option
                        causes  a single word indicating the command or filename used to invoke command to be displayed; the -V option produces a more verbose description.  If the -V or -v option is supplied, the exit
                        status is 0 if command was found, and 1 if not.  If neither option is supplied and an error occurred or command cannot be found, the exit status is 127.  Otherwise, the exit status of the  com‐
                        mand builtin is the exit status of command.

                 compgen [option] [word]
                        Generate  possible  completion  matches for word according to the options, which may be any option accepted by the complete builtin with the exception of -p and -r, and write the matches to the
                        standard output.  When using the -F or -C options, the various shell variables set by the programmable completion facilities, while available, will not have useful values.

                        The matches will be generated in the same way as if the programmable completion code had generated them directly from a completion specification with the same flags.  If word is specified, only
                        those completions matching word will be displayed.

                        The return value is true unless an invalid option is supplied, or no matches were generated.

                        cd [-L|[-P [-e]] [-@]] [dir]
                                 Change  the  current  directory  to  dir.  if dir is not supplied, the value of the HOME shell variable is the default.  Any additional arguments following dir are ignored.  The variable CDPATH
                                 defines the search path for the directory containing dir: each directory name in CDPATH is searched for dir.  Alternative directory names in CDPATH are separated by a colon (:).  A null  direc‐
                                 tory name in CDPATH is the same as the current directory, i.e., ``.''.  If dir begins with a slash (/), then CDPATH is not used.  The -P option causes cd to use the physical directory structure
                                 by resolving symbolic links while traversing dir and before processing instances of .. in dir (see also the -P option to the set builtin command); the -L option forces symbolic links to be fol‐
                                 lowed  by resolving the link after processing instances of .. in dir.  If .. appears in dir, it is processed by removing the immediately previous pathname component from dir, back to a slash or
                                 the beginning of dir.  If the -e option is supplied with -P, and the current working directory cannot be successfully determined after a successful directory change, cd will  return  an  unsuc‐
                                 cessful status.  On systems that support it, the -@ option presents the extended attributes associated with a file as a directory.  An argument of - is converted to $OLDPWD before the directory
                                 change is attempted.  If a non-empty directory name from CDPATH is used, or if - is the first argument, and the directory change is successful, the absolute pathname of the new  working  direc‐
                                 tory is written to the standard output.  The return value is true if the directory was successfully changed; false otherwise.


                                 The return value is 0 unless an unrecognized option is given or an error occurred.

                          break [n]
                                 Exit from within a for, while, until, or select loop.  If n is specified, break n levels.  n must be ≥ 1.  If n is greater than the number of enclosing loops, all enclosing  loops  are  exited.
                                 The return value is 0 unless n is not greater than or equal to 1.

                          builtin shell-builtin [arguments]
                                 Execute  the  specified  shell builtin, passing it arguments, and return its exit status.  This is useful when defining a function whose name is the same as a shell builtin, retaining the func‐
                                 tionality of the builtin within the function.  The cd builtin is commonly redefined this way.  The return status is false if shell-builtin is not a shell builtin command.

                          caller [expr]
                                 Returns the context of any active subroutine call (a shell function or a script executed with the . or source builtins).  Without expr, caller displays the line number and  source  filename  of
                                 the current subroutine call.  If a non-negative integer is supplied as expr, caller displays the line number, subroutine name, and source file corresponding to that position in the current exe‐
                                 cution call stack.  This extra information may be used, for example, to print a stack trace.  The current frame is frame 0.  The return value is 0 unless the shell is not executing a subroutine
                                 call or expr does not correspond to a valid position in the call stack.



history
Event Designators
     An event designator is a reference to a command line entry in the history list.  Unless the reference is absolute, events are relative to the current position in the history list.

     !      Start a history substitution, except when followed by a blank, newline, carriage return, = or ( (when the extglob shell option is enabled using the shopt builtin).
     !n     Refer to command line n.
     !-n    Refer to the current command minus n.
     !!     Refer to the previous command.  This is a synonym for `!-1'.
     !string
            Refer to the most recent command preceding the current position in the history list starting with string.
     !?string[?]
            Refer to the most recent command preceding the current position in the history list containing string.  The trailing ? may be omitted if string is followed immediately by a newline.
     ^string1^string2^
            Quick substitution.  Repeat the previous command, replacing string1 with string2.  Equivalent to ``!!:s/string1/string2/'' (see Modifiers below).
     !#     The entire command line typed so far.

 Word Designators
     Word designators are used to select desired words from the event.  A : separates the event specification from the word designator.  It may be omitted if the word designator begins with a ^, $,  *,  -,
     or %.  Words are numbered from the beginning of the line, with the first word being denoted by 0 (zero).  Words are inserted into the current line separated by single spaces.

     0 (zero)
            The zeroth word.  For the shell, this is the command word.
     n      The nth word.
     ^      The first argument.  That is, word 1.
     $      The last word.  This is usually the last argument, but will expand to the zeroth word if there is only one word in the line.
     %      The word matched by the most recent `?string?' search.
     x-y    A range of words; `-y' abbreviates `0-y'.
     *      All of the words but the zeroth.  This is a synonym for `1-$'.  It is not an error to use * if there is just one word in the event; the empty string is returned in that case.
     x*     Abbreviates x-$.
     x-     Abbreviates x-$ like x*, but omits the last word.

     If a word designator is supplied without an event specification, the previous command is used as the event.

 Modifiers
     After the optional word designator, there may appear a sequence of one or more of the following modifiers, each preceded by a `:'.

     h      Remove a trailing filename component, leaving only the head.
     t      Remove all leading filename components, leaving the tail.
     r      Remove a trailing suffix of the form .xxx, leaving the basename.
     e      Remove all but the trailing suffix.
     p      Print the new command but do not execute it.
     q      Quote the substituted words, escaping further substitutions.
     x      Quote the substituted words as with q, but break into words at blanks and newlines.
     s/old/new/
            Substitute  new for the first occurrence of old in the event line.  Any delimiter can be used in place of /.  The final delimiter is optional if it is the last character of the event line.  The
            delimiter may be quoted in old and new with a single backslash.  If & appears in new, it is replaced by old.  A single backslash will quote the &.  If old is null, it is set  to  the  last  old
            substituted, or, if no previous history substitutions took place, the last string in a !?string[?]  search.
     &      Repeat the previous substitution.
     g      Cause  changes  to be applied over the entire event line.  This is used in conjunction with `:s' (e.g., `:gs/old/new/') or `:&'.  If used with `:s', any delimiter can be used in place of /, and
            the final delimiter is optional if it is the last character of the event line.  An a may be used as a synonym for g.
     G      Apply the following `s' modifier once to each word in the event line.
