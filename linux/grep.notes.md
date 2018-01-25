```
@OPTIONS
-r or -R is recursive,
-n is line number, and
-w stands for match the whole word.
-l (lower-case L) can be added to just give the file name of matching files.
--exclude
--include
--exclude-dir
--include-dir
@ENDOPTIONS
```
# Search for string in files
grep -rnw './' -e "string"


# LOOK IN MY NOTES FOLDER FOR COMMANDS I'VE BOOKMARKED
grep -rnw '~/00_dev/' -e "find"


grep -rnw '' -e "config.vm.box"


# FIND ALL VAGRANT FILES, PRINT ALL VAGRANT BOXES IN ORDER
find ./ -maxdepth 3 -name "*Vagrantfile" -exec grep -H 'config.vm.box =' {} \; | sed 's/^.*= \(.*\)$/\1/' | sort
find ./ -maxdepth 3 -name "*Vagrantfile" -exec grep -H 'config.vm.box' {} \; | sed 's/^{.*#|\/\/} \(.*\)$/\0' | sort

		# 	THEN REPLACE THINGS
find ./ -maxdepth 3 -name "*Vagrantfile" -exec grep -H 'config.vm.box' {} \; | sed s'/[=]/,/g;s/[" "|.]//g;s/[:]/,/;s/\/Vagrantfile//g'

