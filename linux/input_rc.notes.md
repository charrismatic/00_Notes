set completion-ignore-case On


http://www.tcsh.org/tcsh.html/Completion_and_listing.html
################ BASH AUTO COMPLETION ##################

completion-prefix-display-length The length in characters of the common prefix of a list of possible completions that is displayed without modification. When set to a value greater than zero, common prefixes longer than this value are replaced with an ellipsis when displaying possible completions.
set completion-prefix-display-length 2

How can I make bash tab completion behave like vim tab completion and cycle through matching matches?

default TAB is bound to the complete readline command. Your desired behavior would be menu-complete instead. You can change your readlines settings by editing ~/.inputrc. To rebind TAB, add this line
Put bind TAB:menu-complete in .bashrc
	bind TAB:menu-complete
For more details see the READLINE section in man bash



Thanks to @sth I found what works best for me:
To keep normal bash tab completion, and then use ctl-f to cycle through when needed using menu-complete
put this in your .inputrc file:
Terminal autocomplete: cycle through suggestions
	"\C-f": menu-complete


set show-all-if-ambiguous on
If you have this in your /etc/inputrc or ~/.inputrc, you will no longer have to hit the <Tab> key twice to produce a list of all possible completions. A single <Tab> will suffice. This setting is highly recommended.



set visible-stats on
Adding this to your /etc/inputrc or ~/.inputrc will result in a character being appended to any file-names returned by completion, in much the same way as ls -F works.



ome people prefer the non-incremental style of history completion, as opposed to the incremental style offered by C-r and C-s. This is the style of history completion offered by csh.

bash offers bindings for this, but they are unbound by default.

Set the following in your /etc/inputrc or ~/.inputrc:

"\ep": history-search-backward
"\en": history-search-forward

Henceforth, ESC-p and ESC-n (or M-p and M-n) will give you non-incremental history completion backwards and forwards, respectively.



You probably want to add that to your ~/.bashrc. Alternatively, you could configure it for all readline completions (not just bash) in ~/.inputrc.



While bash does not have a perfect match for the zsh completion menu, you can cut down on screen clutter with menu-complete bindings in your .bashrc:

bind '\C-n:menu-complete'
bind '\C-p:menu-complete-previous'
These bindings cycle through completions on the commmand line with Ctrl+N and Ctrl+P (without showing the complete list). Your system may already have these keys bound; to check:

bind -p | grep menu-complete

http://www.linux-magazine.com/Online/Features/Bash-Tips-Autocompletion

Beware of the Manual

Both hostname completion and user completion have a couple of pitfalls in store for the user. For example, Bash reads the hostname is from the file to which the HOSTFILE variable points. According to the Bash manual, if the HOSTFILE variable is set but empty, Bash will read from /etc/hosts. If the variable is not set, the completion list is empty.

Your Own Completion

To extend the Bash completion system, you can use the built-in Bash complete command. The function isn’t exactly trivial, as you can easily see from the level of detail the man page provides. The easiest part is word completion. A small synchronization script that I wrote accepts a profile as its only argument,

complete -W “home data images baw” syncfiles


1. View Existing bash-completion

After enabling programmable bash completion, there are set of bash completion defined. The command complete is used for defining bash completion.

To view the existing bash completion, use the complete command as shown below.

 
complete -p | less

