AUTO-SEARCH YOUR HISTORY
CTRL + R

View you history file 
:>history

Search you history
>history | grep [keyword]

SUDO THE PREVIOUS COMMAND
>sudo !!



http://unix.stackexchange.com/questions/48713/how-can-i-remove-duplicates-in-my-bash-history-preserving-order
really enjoying using control+r to recursively search my command history. I've found a few good options I like to use with it:

# ignore duplicate commands, ignore commands starting with a space
export HISTCONTROL=erasedups:ignorespace

# keep the last 5000 entries
export HISTSIZE=5000

# append to the history instead of overwriting (good for multiple connections)
shopt -s histappend
The only problem for me is that erasedups only erases sequential duplicates - so that with this string of commands:

ls
cd ~
ls
The ls command will actually be recorded twice. I've thought about periodically running w/ cron:

> cat .bash_history | sort | uniq > temp.txt
> mv temp.txt .bash_history

This would achieve removing the duplicates, but unfortunately the order would not be preserved. If I don't sort the file first I don't believe uniq can work properly.


