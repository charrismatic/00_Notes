
## CONDITIONAL EXPRESSIONS

Conditional expressions are used by the **\[\[** compound command and the **test** and **\[** builtin commands to test file attributes and perform string and arithmetic comparisons. Expressions are formed from the following unary or binary primaries. **Bash** handles several filenames specially when they are used in expressions. If the operating system on which **bash** is running provides these special files, bash will use them; otherwise it will emulate them internally with this behavior: If any _file_ argument to one of the primaries is of the form _/dev/fd/n_, then file descriptor _n_ is checked. If the _file_ argument to one of the primaries is one of _/dev/stdin_, _/dev/stdout_, or _/dev/stderr_, file descriptor 0, 1, or 2, respectively, is checked.

Unless otherwise specified, primaries that operate on files follow symbolic links and operate on the target of the link, rather than the link itself.

When used with **\[\[**, the **<** and **\>** operators sort lexicographically using the current locale. The **test** command sorts using ASCII ordering.**  
\-a** _file_

True if _file_ exists.

**\-b** _file_

True if _file_ exists and is a block special file.

**\-c** _file_

True if _file_ exists and is a character special file.

**\-d** _file_

True if _file_ exists and is a directory.

**\-e** _file_

True if _file_ exists.

**\-f** _file_

True if _file_ exists and is a regular file.

**\-g** _file_

True if _file_ exists and is set-group-id.

**\-h** _file_

True if _file_ exists and is a symbolic link.

**\-k** _file_

True if _file_ exists and its ’’sticky’’ bit is set.

**\-p** _file_

True if _file_ exists and is a named pipe (FIFO).

**\-r** _file_

True if _file_ exists and is readable.

**\-s** _file_

True if _file_ exists and has a size greater than zero.

**\-t** _fd_

True if file descriptor _fd_ is open and refers to a terminal.

**\-u** _file_

True if _file_ exists and its set-user-id bit is set.

**\-w** _file_

True if _file_ exists and is writable.

**\-x** _file_

True if _file_ exists and is executable.

**\-G** _file_

True if _file_ exists and is owned by the effective group id.

**\-L** _file_

True if _file_ exists and is a symbolic link.

**\-N** _file_

True if _file_ exists and has been modified since it was last read.

**\-O** _file_

True if _file_ exists and is owned by the effective user id.

**\-S** _file_

True if _file_ exists and is a socket.

_file1_ **\-ef** _file2_

True if _file1_ and _file2_ refer to the same device and inode numbers.

_file1_ -**nt** _file2_

True if _file1_ is newer (according to modification date) than _file2_, or if _file1_ exists and _file2_ does not.

_file1_ -**ot** _file2_

True if _file1_ is older than _file2_, or if _file2_ exists and _file1_ does not.



**\-o** _optname_

True if the shell option _optname_ is enabled. See the list of options under the description of the **\-o** option to the **set** builtin below.



**\-v** _varname_

True if the shell variable _varname_ is set (has been assigned a value).



**\-R** _varname_

True if the shell variable _varname_ is set and is a name reference.



**\-z** _string_

True if the length of _string_ is zero.



_string_

**\-n** _string_

True if the length of _string_ is non-zero.



_string1_ **\==** _string2  
string1_ **\=** _string2_

True if the strings are equal. **\=** should be used with the **test** command for POSIX conformance. When used with the **\[\[** command, this performs pattern matching as described above (**Compound Commands**).



_string1_ **!=** _string2_

True if the strings are not equal.



_string1_ **<** _string2_

True if _string1_ sorts before _string2_ lexicographically.



_string1_ **\>** _string2_

True if _string1_ sorts after _string2_ lexicographically.

_arg1_ **OP** _arg2_

**OP** is one of **\-eq**, **\-ne**, **\-lt**, **\-le**, **\-gt**, or **\-ge**. These arithmetic binary operators return true if _arg1_ is equal to, not equal to, less than, less than or equal to, greater than, or greater than or equal to _arg2_, respectively. _Arg1_ and _arg2_ may be positive or negative integers.