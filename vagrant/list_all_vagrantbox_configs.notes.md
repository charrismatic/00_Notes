## Get all vagrant box config boxtypes and their urls

---
find ./ -maxdepth 3 -name "*Vagrantfile" -exec grep -H 'config.vm.box =\|config.vm.box_' {} \; | sed s'/[=]/,/g;s/[" "|.]//g;s/[:]/,/;s/\/Vagrantfile//g' | column -t -s ,
---


Example: 
---
/projectA   configvmbox      new_box
/projectA   configvmbox_url  http://host/box_v4box
/projectB   configvmbox      new_box
/projectB   configvmbox_url  http://host/box_v4box
/projectC   configvmbox      OldBox
/projectC   configvmbox_url  http://host/box_Oldbox
---

