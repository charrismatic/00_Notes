vboxmanage list runningvms | sed -r 's/.​*\{(.*​)\}/\1/' | xargs -L1 -I {} VBoxManage controlvm {} poweroff
