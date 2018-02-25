REF: 
# ~/.bashrc: executed by bash(1) for non-login shells.
# see /usr/share/doc/bash/examples/startup-files (in the package bash-doc)

### A SHORTER COMMAND LINE

```
PS1='\u:\W\$ '
```

http://askubuntu.com/questions/145618/how-can-i-shorten-my-command-line-bash-prompt

```
if [ "$color_prompt" = yes ]; then
    PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '
else
    PS1='${debian_chroot:+($debian_chroot)}\u@\h:\w\$ '
fi
```

### Remove the @\h, and replace the \w with an uppercase \W, so that it becomes
```
if [ "$color_prompt" = yes ]; then
    PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u\[\033[00m\]:\[\033[01;34m\]\W\[\033[00m\]\$ '
else
    PS1='${debian_chroot:+($debian_chroot)}\u:\W\$ '
fi
```

### Only 3 dirs

Run this code in the current terminal

```
PROMPT_DIRTRIM=3
```

Now the bash prompt will show only the last 3 directory names. 

You can choose 1 to show only current directory. 

More information is available in the GNU documentation.

The effect:

/var/lib/apt/lists # PROMPT_DIRTRIM=3
/.../lib/apt/lists # 

If you want to make it permanently, add the following line to ~/.bashrc in the beginning:

```
PROMPT_DIRTRIM=3
```

Any number greater than zero.
