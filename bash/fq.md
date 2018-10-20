# If not running interactively, don't do anything
[ -z "$PS1" ] && return

- Following on from the last point, be sparing with the use of
   external processes whenever you can. Completion functions need to be
   fast, so sacrificing some code legibility for speed is acceptable.

   For example, judicious use of sed(1) can save you from having to
   call grep(1) and pipe the output to cut(1), which saves a fork(2)
   and exec(3).

   Sometimes you don't even need sed(1) or other external programs at
   all, though. Use of constructs such as ${parameter#word},
   ${parameter%word} and ${parameter/pattern/string} can provide you a
   lot of power without having to leave the shell.

   For example, if $foo contains the path to an executable, ${foo##*/}
   will give you the basename of the program, without having to call
   basename(1). Similarly, ${foo%/*} will give you the dirname, without
   having to call dirname(1).

   As another example,

     bar=$( echo $foo | sed -e 's/bar/baz/g' )

   can be replaced by:

     bar=${foo//bar/baz}


     5. What is /etc/bash.bashrc? It doesn't seem to be documented.

       The Debian version of bash is compiled with a special option (-DSYS_BASHRC) that
          makes bash read /etc/bash.bashrc before ~/.bashrc for interactive non-login shells.

        So, on Debian systems,
          /etc/bash.bashrc is to ~/.bashrc as
          /etc/profile is to ~/.bash_profile
