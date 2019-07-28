---
topic: gnome, gnome-shell 
tags: looking-glass, restart-gnome, debug, gnome-session
----


# The Gnome Shell Command Bar Shortcuts

## Launch

Activate the command bar with `Alt + F2`

## Commands 

 -`r`  Restart Gnome Shell
 - `lg`  Looking Glass Inspector (Javascript Window Debug Tool)
 - `rt`  Restart Gnome Theme 


### Looking Glass Commands


```javascript
1+1 

global.get_window_actors()

global.get_window_actors().forEach(function (w) { Tweener.addTween(w, { time: 3, transition: 'easeOutQuad', scale_x: 0.3, scale_y: 0.3 })})

global.get_window_actors().forEach(function (w) { w.set_scale(1, 1) })

global.get_window_actors()[0]

it.scale_x

```


References: 
  https://wiki.gnome.org/Projects/GnomeShell/LookingGlass

