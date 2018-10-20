

        FUNCTIONS
               A shell function, defined as described above under SHELL GRAMMAR, stores a series of commands for later execution.  When the name of a shell function is used as a simple command name, the list of com‐
               mands  associated  with  that function name is executed.  Functions are executed in the context of the current shell; no new process is created to interpret them (contrast this with the execution of a
               shell script).  When a function is executed, the arguments to the function become the positional parameters during its execution.  The special parameter # is updated to reflect  the  change.   Special
               parameter 0 is unchanged.  The first element of the FUNCNAME variable is set to the name of the function while the function is executing.

               All  other  aspects  of the shell execution environment are identical between a function and its caller with these exceptions: the DEBUG and RETURN traps (see the description of the trap builtin under
               SHELL BUILTIN COMMANDS below) are not inherited unless the function has been given the trace attribute (see the description of the declare builtin below) or the -o  functrace  shell  option  has  been
               enabled with the set builtin (in which case all functions inherit the DEBUG and RETURN traps), and the ERR trap is not inherited unless the -o errtrace shell option has been enabled.

               Variables local to the function may be declared with the local builtin command.  Ordinarily, variables and their values are shared between the function and its caller.

               The FUNCNEST variable, if set to a numeric value greater than 0, defines a maximum function nesting level.  Function invocations that exceed the limit cause the entire command to abort.

               If  the  builtin  command  return is executed in a function, the function completes and execution resumes with the next command after the function call.  Any command associated with the RETURN trap is
               executed before execution resumes.  When a function completes, the values of the positional parameters and the special parameter # are restored to the values they had prior to  the  function's  execu‐
               tion.

               Function  names  and definitions may be listed with the -f option to the declare or typeset builtin commands.  The -F option to declare or typeset will list the function names only (and optionally the
               source file and line number, if the extdebug shell option is enabled).  Functions may be exported so that subshells automatically have them defined with the -f option to the export builtin.   A  function definition may be deleted using the -f option to the unset builtin.  Note that shell functions and variables with the same name may result in multiple identically-named entries in the environment
               passed to the shell's children.  Care should be taken in cases where this may cause a problem.

               Functions may be recursive.  The FUNCNEST variable may be used to limit the depth of the function call stack and restrict the number of function invocations.  By default, no limit is  imposed  on  the
               number of recursive calls.
