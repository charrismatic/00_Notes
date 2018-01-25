linux find

#files with pattern <> 
find . -name "pattern"

#string in files 
find [/path/to/start ||  .] -type f -exec grep -H 'text-to-find-here' {} \;

find ./ -maxdepth 1 -name "*.<something>" -exec <command> -t {} \;
# find . -name '*.note*' -exec grep -H 'tcp' {} \;


 find ./ -maxdepth 3 -name "*Vagrantfile" -exec grep -H 'config.vm.box =\|config.vm.box_' {} \; | sed s'/[=]/,/g;s/[" "|.]//g;s/[:]/,/;s/\/Vagrantfile//g' | column -t -s ,


## @RELATED

# LOCATE -- FIND BY FILENAME 
locate <pattern>
locate file | grep /home/user

# DPKG -- FIND PACKAGES 
dpkg -L packagename

# GREP RECURSIVE 
grep -rnw 'path' -e 'pattern'

# FIND COMMANDS 
man -k <pattern>
