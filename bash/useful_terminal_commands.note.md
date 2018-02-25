# Useful Terminal Commands

notify-send  -  a program to send desktop notifications

man tput


terminfo - terminal capability data base

/etc/terminfo/*/*


setleds - set the keyboard leds

zenity - display GTK+ dialogs and return (either in the return code, or on standard output)


logger - enter messages into the system log



man setterm

man smbclient


man bash

@hourly  DISPLAY=:0.0 /home/vivek/scripts/monitor.stock.sh

echo $BASH_VERSION
```
lsb_release -d
```


```
echo &gt;/dev/tcp/localhost/22 &amp;&amp; echo "ssh open"
```

```
awk '/BSE LIVE/ { gsub(",", "", $5); gsug("\.[0-9]", "", $5); print $5}'
```

```
sed -n -e '/BSE LIVE/{s/.* .* \(.*\)\.[0-9]*/\1/;s/,//gp}'
``

```
gsub(/,|\.[0-9]+/, "");
```

HTML INPUT TYPE=COLOR 

LITTLE BOX FOR A DEV SITE
https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/color
```
<input type="color">
```


https://phantomjs.org/examples/
https://runkit.com/npm/gotomark
https://github.com/KevinGrandon/ghostjs
https://www.linuxjournal.com/content/tech-tip-get-notifications-your-scripts-notify-send
https://gist.github.com/mjharris2407/6f9b76737a29c6170e8f907046469445
https://atom.io/packages/atom-html-templates
https://github.com/AlexeySokolov/atom-smart-template
https://atom.io/packages/template-generator
