To clear all your history, use

```shell
history -c
```



To delete a single line, use

```shell
history -d linenumber
```

# Preventative measures

If you want to run a command without saving it in history, prepend it with an extra space

```
$ echo saved
$  echo not saved \
> #     ^ extra space
```

For this to work you need either `ignorespace` or `ignoreboth` in `HISTCONTROL`. For example, run

```
HISTCONTROL=ignorespace
setopt HIST_IGNORE_SPACE
HIST_NO_STORE
HIST_NO_FUNCTIONS
HISTIGNORE="*secret.server.com*"
HISTCONTROL=ignorespace
```

To make this setting persistent, put it in your `.bashrc`.



# Post-mortem clean-up

If you've already run the command, and want to remove it from history, first use

```
history
```

to display the list of commands in your history. Find the number next to the one you want to delete (e.g. 1234) and run

```
history -d 1234
```



files 

``~/.bash_history``



FUNTIONS

```
rmhist() {
    start=$1
    end=$2
    count=$(( end - start ))
    while [ $count -ge 0 ] ; do
        history -d $start
        ((count--))
    done
}
```

****Setting `HISTFILE=` is enough. From `bash(1)`: *If unset, the command history is not saved when a shell exits*