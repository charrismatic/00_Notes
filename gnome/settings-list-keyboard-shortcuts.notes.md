1. 
gsettings list-recursively | awk '/hotkey/||/keybinding/||/media-key/'

2.
dconf dump / | awk '/keybindings/ || /media-keys/{print; getline; print }'



combine them into single text file

gsettings list-recursively | awk '/hotkey/||/keybinding/||/media-key/' > ~/keyboard-shortcuts; dconf dump / | awk '/keybindings/ || 	/media-keys/{print; getline; print }' >> keyboard-shortcuts
ge;ng
