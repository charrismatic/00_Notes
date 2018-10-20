SYNOPSIS
        bash [options] [command_string | file]

 COPYRIGHT
        Bash is Copyright (C) 1989-2016 by the Free Software Foundation, Inc.

 DESCRIPTION
        Bash  is  an  sh-compatible command language interpreter that executes commands read from the standard input or from a file.  Bash also incorporates useful features from the Korn and C shells (ksh and
        csh).

        Bash is intended to be a conformant implementation of the Shell and Utilities portion of the IEEE POSIX specification (IEEE Standard 1003.1).  Bash can be configured to be POSIX-conformant by default.

 OPTIONS
        All of the single-character shell options documented in the description of the set builtin command can be used as options when the shell is invoked.  In addition, bash interprets the following options
        when it is invoked:

        -c        If  the -c option is present, then commands are read from the first non-option argument command_string.  If there are arguments after the command_string, the first argument is assigned to $0
                  and any remaining arguments are assigned to the positional parameters.  The assignment to $0 sets the name of the shell, which is used in warning and error messages.
        -i        If the -i option is present, the shell is interactive.
        -l        Make bash act as if it had been invoked as a login shell (see INVOCATION below).
        -r        If the -r option is present, the shell becomes restricted (see RESTRICTED SHELL below).
        -s        If the -s option is present, or if no arguments remain after option processing, then commands are read from the standard input.  This option allows the positional parameters to be  set  when
                  invoking an interactive shell.
        -v        Print shell input lines as they are read.
        -x        Print commands and their arguments as they are executed.
        -D        A  list  of  all  double-quoted  strings  preceded by $ is printed on the standard output.  These are the strings that are subject to language translation when the current locale is not C or
                  POSIX.  This implies the -n option; no commands will be executed.
        [-+]O [shopt_option]
                  shopt_option is one of the shell options accepted by the shopt builtin (see SHELL BUILTIN COMMANDS below).  If shopt_option is present, -O sets the value of that option; +O  unsets  it.   If
                  shopt_option  is  not  supplied, the names and values of the shell options accepted by shopt are printed on the standard output.  If the invocation option is +O, the output is displayed in a
                  format that may be reused as input.
        --        A -- signals the end of options and disables further option processing.  Any arguments after the -- are treated as filenames and arguments.  An argument of - is equivalent to --.

        Bash also interprets a number of multi-character options.  These options must appear on the command line before the single-character options to be recognized.

        --debugger
               Arrange for the debugger profile to be executed before the shell starts.  Turns on extended debugging mode (see the description of the extdebug option to the shopt builtin below).
        --dump-po-strings
               Equivalent to -D, but the output is in the GNU gettext po (portable object) file format.
        --dump-strings
               Equivalent to -D.
        --help Display a usage message on standard output and exit successfully.
        --init-file file
        --rcfile file
               Execute commands from file instead of the system wide initialization file /etc/bash.bashrc and the standard personal initialization file ~/.bashrc if the shell is  interactive  (see  INVOCATION
               below).

        --login
               Equivalent to -l.

        --noediting
               Do not use the GNU readline library to read command lines when the shell is interactive.

        --noprofile
               Do  not read either the system-wide startup file /etc/profile or any of the personal initialization files ~/.bash_profile, ~/.bash_login, or ~/.profile.  By default, bash reads these files when
               it is invoked as a login shell (see INVOCATION below).

        --norc Do not read and execute the system wide initialization file /etc/bash.bashrc and the personal initialization file ~/.bashrc if the shell is interactive.  This option is on  by  default  if  the
               shell is invoked as sh.

        --posix
               Change  the  behavior  of bash where the default operation differs from the POSIX standard to match the standard (posix mode).  See SEE ALSO below for a reference to a document that details how
               posix mode affects bash's behavior.

        --restricted
               The shell becomes restricted (see RESTRICTED SHELL below).

        --verbose
               Equivalent to -v.

        --version
               Show version information for this instance of bash on the standard output and exit successfully.

 ARGUMENTS
        If arguments remain after option processing, and neither the -c nor the -s option has been supplied, the first argument is assumed to be the name of a file  containing  shell  commands.   If  bash  is
        invoked in this fashion, $0 is set to the name of the file, and the positional parameters are set to the remaining arguments.  Bash reads and executes commands from this file, then exits.  Bash's exit
        status is the exit status of the last command executed in the script.  If no commands are executed, the exit status is 0.  An attempt is first made to open the file in the current directory,  and,  if
        no file is found, then the shell searches the directories in PATH for the script.

 INVOCATION
        A login shell is one whose first character of argument zero is a -, or one started with the --login option.

        An  interactive  shell  is  one started without non-option arguments (unless -s is specified) and without the -c option whose standard input and error are both connected to terminals (as determined by
        isatty(3)), or one started with the -i option.  PS1 is set and $- includes i if bash is interactive, allowing a shell script or a startup file to test this state.

        The following paragraphs describe how bash executes its startup files.  If any of the files exist but cannot be read, bash reports an error.  Tildes are expanded in filenames as described below  under
        Tilde Expansion in the EXPANSION section.

        When  bash is invoked as an interactive login shell, or as a non-interactive shell with the --login option, it first reads and executes commands from the file /etc/profile, if that file exists.  After
        reading that file, it looks for ~/.bash_profile, ~/.bash_login, and ~/.profile, in that order, and reads and executes commands from the first one that exists and is readable.  The  --noprofile  option
        may be used when the shell is started to inhibit this behavior.

        When an interactive login shell exits, or a non-interactive login shell executes the exit builtin command, bash reads and executes commands from the file ~/.bash_logout, if it exists.

        When  an  interactive shell that is not a login shell is started, bash reads and executes commands from /etc/bash.bashrc and ~/.bashrc, if these files exist.  This may be inhibited by using the --norc
        option.  The --rcfile file option will force bash to read and execute commands from file instead of /etc/bash.bashrc and ~/.bashrc.

        When bash is started non-interactively, to run a shell script, for example, it looks for the variable BASH_ENV in the environment, expands its value if it appears there, and uses the expanded value as
        the name of a file to read and execute.  Bash behaves as if the following command were executed:
               if [ -n "$BASH_ENV" ]; then . "$BASH_ENV"; fi
        but the value of the PATH variable is not used to search for the filename.

        If  bash  is  invoked  with the name sh, it tries to mimic the startup behavior of historical versions of sh as closely as possible, while conforming to the POSIX standard as well.  When invoked as an
        interactive login shell, or a non-interactive shell with the --login option, it first attempts to read and execute commands from /etc/profile and ~/.profile, in that order.  The --noprofile option may
        option.  The --rcfile file option will force bash to read and execute commands from file instead of /etc/bash.bashrc and ~/.bashrc.

        When bash is started non-interactively, to run a shell script, for example, it looks for the variable BASH_ENV in the environment, expands its value if it appears there, and uses the expanded value as
        the name of a file to read and execute.  Bash behaves as if the following command were executed:
               if [ -n "$BASH_ENV" ]; then . "$BASH_ENV"; fi
        but the value of the PATH variable is not used to search for the filename.

        If  bash  is  invoked  with the name sh, it tries to mimic the startup behavior of historical versions of sh as closely as possible, while conforming to the POSIX standard as well.  When invoked as an
        interactive login shell, or a non-interactive shell with the --login option, it first attempts to read and execute commands from /etc/profile and ~/.profile, in that order.  The --noprofile option may
        be  used  to inhibit this behavior.  When invoked as an interactive shell with the name sh, bash looks for the variable ENV, expands its value if it is defined, and uses the expanded value as the name
        of a file to read and execute.  Since a shell invoked as sh does not attempt to read and execute commands from any other startup files, the --rcfile option has  no  effect.   A  non-interactive  shell
        invoked with the name sh does not attempt to read any other startup files.  When invoked as sh, bash enters posix mode after the startup files are read.

        When bash is started in posix mode, as with the --posix command line option, it follows the POSIX standard for startup files.  In this mode, interactive shells expand the ENV variable and commands are
        read and executed from the file whose name is the expanded value.  No other startup files are read.

        Bash attempts to determine when it is being run with its standard input connected to a network connection, as when executed by the remote shell daemon, usually rshd, or the secure shell  daemon  sshd.
        If  bash  determines  it  is  being run in this fashion, it reads and executes commands from ~/.bashrc and ~/.bashrc, if these files exist and are readable.  It will not do this if invoked as sh.  The
        --norc option may be used to inhibit this behavior, and the --rcfile option may be used to force another file to be read, but neither rshd nor sshd generally invoke the shell  with  those  options  or
        allow them to be specified.

        If  the  shell is started with the effective user (group) id not equal to the real user (group) id, and the -p option is not supplied, no startup files are read, shell functions are not inherited from
        the environment, the SHELLOPTS, BASHOPTS, CDPATH, and GLOBIGNORE variables, if they appear in the environment, are ignored, and the effective user id is set to the real user id.  If the -p  option  is
        supplied at invocation, the startup behavior is the same, but the effective user id is not reset.
