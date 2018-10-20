
JOB CONTROL
       Job control refers to the ability to selectively stop (suspend) the execution of processes and continue (resume) their execution at a later point.  A user typically employs this facility via an inter‐
       active interface supplied jointly by the operating system kernel's terminal driver and bash.

       The shell associates a job with each pipeline.  It keeps a table of currently executing jobs, which may be listed with the jobs command.  When bash starts a job asynchronously (in the background),  it
       prints a line that looks like:

              [1] 25647

       indicating  that  this  job is job number 1 and that the process ID of the last process in the pipeline associated with this job is 25647.  All of the processes in a single pipeline are members of the
       same job.  Bash uses the job abstraction as the basis for job control.

       To facilitate the implementation of the user interface to job control, the operating system maintains the notion of a current terminal process group ID.  Members of this process group (processes whose
       process  group  ID  is  equal  to the current terminal process group ID) receive keyboard-generated signals such as SIGINT.  These processes are said to be in the foreground.  Background processes are
       those whose process group ID differs from the terminal's; such processes are immune to keyboard-generated signals.  Only foreground processes are allowed to read from or, if the user so specifies with
       stty  tostop, write to the terminal.  Background processes which attempt to read from (write to when stty tostop is in effect) the terminal are sent a SIGTTIN (SIGTTOU) signal by the kernel's terminal
       driver, which, unless caught, suspends the process.

       If the operating system on which bash is running supports job control, bash contains facilities to use it.  Typing the suspend character (typically ^Z, Control-Z) while a  process  is  running  causes
       that  process to be stopped and returns control to bash.  Typing the delayed suspend character (typically ^Y, Control-Y) causes the process to be stopped when it attempts to read input from the termi‐
       nal, and control to be returned to bash.  The user may then manipulate the state of this job, using the bg command to continue it in the background, the fg command to continue it in the foreground, or
       the kill command to kill it.  A ^Z takes effect immediately, and has the additional side effect of causing pending output and typeahead to be discarded.

       There  are  a  number  of ways to refer to a job in the shell.  The character % introduces a job specification (jobspec).  Job number n may be referred to as %n.  A job may also be referred to using a
       prefix of the name used to start it, or using a substring that appears in its command line.  For example, %ce refers to a stopped ce job.  If a prefix matches more than one job, bash reports an error.
       Using  %?ce,  on the other hand, refers to any job containing the string ce in its command line.  If the substring matches more than one job, bash reports an error.  The symbols %% and %+ refer to the
       shell's notion of the current job, which is the last job stopped while it was in the foreground or started in the background.  The previous job may be referenced using %-.  If there is only  a  single
       job,  %+  and %- can both be used to refer to that job.  In output pertaining to jobs (e.g., the output of the jobs command), the current job is always flagged with a +, and the previous job with a -.
       A single % (with no accompanying job specification) also refers to the current job.

       Simply naming a job can be used to bring it into the foreground: %1 is a synonym for ``fg %1'', bringing job 1 from the background into the foreground.  Similarly, ``%1 &'' resumes job 1 in the  back‐
       ground, equivalent to ``bg %1''.

       The shell learns immediately whenever a job changes state.  Normally, bash waits until it is about to print a prompt before reporting changes in a job's status so as to not interrupt any other output.
       If the -b option to the set builtin command is enabled, bash reports such changes immediately.  Any trap on SIGCHLD is executed for each child that exits.

       If an attempt to exit bash is made while jobs are stopped (or, if the checkjobs shell option has been enabled using the shopt builtin, running), the shell prints a warning message, and, if the  check‐
       jobs  option  is  enabled, lists the jobs and their statuses.  The jobs command may then be used to inspect their status.  If a second attempt to exit is made without an intervening command, the shell
       does not print another warning, and any stopped jobs are terminated.
