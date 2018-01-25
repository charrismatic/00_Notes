# Colored GCC warnings and errors
#export GCC_COLORS='error=01;31:warning=01;35:note=01;36:caret=01;32:locus=01:quote=01'


sequence	Colour
\[\033[0;30m\]	black
\[\033[1;30m\]	Dark gray
\[\033[0;31m\]	red
\[\033[1;31m\]	Bright red
\[\033[0;32m\]	green
\[\033[1;32m\]	Light green
\[\033[0;33m\]	brown
\[\033[1;33m\]	yellow
\[\033[0;34m\]	blue
\[\033[1;34m\]	Light Blue
\[\033[0;35m\]	Dunkellila
\[\033[1;35m\]	Bright purple
\[\033[0;36m\]	Dark turkish
\[\033[1;36m\]	turquoise
\[\033[0;37m\]	Light gray
\[\033[1;37m\]	White
\[\033[0m\]	colorless


If you want to change the background color, you can find the corresponding escape sequences here:
sequence	Background color
\[\033[XXm\]	No background color
\[\033[40;XXm\]	Black Background
\[\033[41;XXm\]	Red background
\[\033[42;XXm\]	Green background
\[\033[43;XXm\]	Light brown background
\[\033[44;XXm\]	Blue background
\[\033[45;XXm\]	Purple background
\[\033[46;XXm\]	Turquoise background
\[\033[47;XXm\]	Light gray background



# CLI colors
export CLICOLOR=true
# a black
# b red
# c green
# d brown
# e blue
# f magenta
# g cyan
# h light grey
# A bold black, usually shows up as dark grey
# B bold red
# C bold green
# D bold brown, usually shows up as yellow
# E bold blue
# F bold magenta
# G bold cyan
# H bold light grey; looks like bright white
# x default foreground or background
# Order: dir - symlink - socket - pipe - exec - block special - char special - exec setuid - exec setgid - public dir sticky bit - public dir no sticky bit
export LSCOLORS='exfxcxdxbxegedabagacad'

#Prompt and prompt colors
# 30m - Black
# 31m - Red
# 32m - Green
# 33m - Yellow
# 34m - Blue
# 35m - Purple
# 36m - Cyan
# 37m - White
# 0 - Normal
# 1 - Bold

function prompt {
  local BLACK="\[\033[0;30m\]"
  local BLACKBOLD="\[\033[1;30m\]"
  local RED="\[\033[0;31m\]"
  local REDBOLD="\[\033[1;31m\]"
  local GREEN="\[\033[0;32m\]"
  local GREENBOLD="\[\033[1;32m\]"
  local YELLOW="\[\033[0;33m\]"
  local YELLOWBOLD="\[\033[1;33m\]"
  local BLUE="\[\033[0;34m\]"
  local BLUEBOLD="\[\033[1;34m\]"
  local PURPLE="\[\033[0;35m\]"
  local PURPLEBOLD="\[\033[1;35m\]"
  local CYAN="\[\033[0;36m\]"
  local CYANBOLD="\[\033[1;36m\]"
  local WHITE="\[\033[0;37m\]"
  local WHITEBOLD="\[\033[1;37m\]"
export PS1="\n\[\e]0;\u@\h: \w\a\]${debian_chroot:+($debian_chroot)}$BLACKBOLD[\t]$PURPLEBOLD \u@\h\[\033[00m\]:$BLUEBOLD\w\[\033[00m\] \\$ "
}






# 			COLORED MAN PAGES AND LOG FILES
#	http://linuxmanage.com/colored-man-pages-log-files.html
######################################################
'\e[0;30m' # Black - Regular
'\e[0;31m' # Red
'\e[0;32m' # Green
'\e[0;33m' # Yellow
'\e[0;34m' # Blue
'\e[0;35m' # Purple
'\e[0;36m' # Cyan
'\e[0;37m' # White

'\e[1;30m' # Black - Bold
'\e[1;31m' # Red
'\e[1;32m' # Green
'\e[1;33m' # Yellow
'\e[1;34m' # Blue
'\e[1;35m' # Purple
'\e[1;36m' # Cyan
'\e[1;37m' # White

'\e[4;30m' # Black - Underline
'\e[4;31m' # Red
'\e[4;32m' # Green
'\e[4;33m' # Yellow
'\e[4;34m' # Blue
'\e[4;35m' # Purple
'\e[4;36m' # Cyan
'\e[4;37m' # White

'\e[40m'   # Black - Background
'\e[41m'   # Red
'\e[42m'   # Green
'\e[43m'   # Yellow
'\e[44m'   # Blue
'\e[45m'   # Purple
'\e[46m'   # Cyan
'\e[47m'   # White
'\e[0m'    # Text Reset

#


PS1='\[\033[0;31m\]\u\[\033[1;31m\]@\[\033[1;32m\]\h:\[\033[1;35m\]\w\[\033[1;31m\]\$\[\033[0m\] '


					LESS COMMAND
############################################3
If you are using less application for viewing man pages you can add below variables to your .bashrc file. After that reload .bashrc variables with command: source /home/user/.bashrc and you will see colored man pages.

export LESS_TERMCAP_mb=$'\E[01;31m'
export LESS_TERMCAP_md=$'\E[01;31m'
export LESS_TERMCAP_me=$'\E[0m'
export LESS_TERMCAP_se=$'\E[0m'
export LESS_TERMCAP_so=$'\E[01;44;33m'
export LESS_TERMCAP_ue=$'\E[0m'
export LESS_TERMCAP_us=$'\E[01;32m'
For log files use perl syntax with your combined regex:

 tail -f  /var/log/mail.log | perl -pe 's/(fatal|error|panic|success)/\e[1;31m$&\e[0m/g'

#						GREP
###########################################
Last colored trick. Use grep command with --color switch.



