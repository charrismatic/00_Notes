SIGNALS
       When  bash is interactive, in the absence of any traps, it ignores SIGTERM (so that kill 0 does not kill an interactive shell), and SIGINT is caught and handled (so that the wait builtin is interrupt‐
       ible).  In all cases, bash ignores SIGQUIT.  If job control is in effect, bash ignores SIGTTIN, SIGTTOU, and SIGTSTP.

       Non-builtin commands run by bash have signal handlers set to the values inherited by the shell from its parent.  When job control is not in effect, asynchronous commands ignore SIGINT and  SIGQUIT  in
       addition to these inherited handlers.  Commands run as a result of command substitution ignore the keyboard-generated job control signals SIGTTIN, SIGTTOU, and SIGTSTP.

       The  shell  exits  by  default  upon  receipt  of a SIGHUP.  Before exiting, an interactive shell resends the SIGHUP to all jobs, running or stopped.  Stopped jobs are sent SIGCONT to ensure that they
       receive the SIGHUP.  To prevent the shell from sending the signal to a particular job, it should be removed from the jobs table with the disown builtin (see SHELL BUILTIN COMMANDS below) or marked  to
       not receive SIGHUP using disown -h.

       If the huponexit shell option has been set with shopt, bash sends a SIGHUP to all jobs when an interactive login shell exits.

       If  bash  is waiting for a command to complete and receives a signal for which a trap has been set, the trap will not be executed until the command completes.  When bash is waiting for an asynchronous
       command via the wait builtin, the reception of a signal for which a trap has been set will cause the wait builtin to return immediately with an exit status greater than 128,  immediately  after  which
       the trap is executed.
