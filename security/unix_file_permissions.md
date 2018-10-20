# Permissions







```sh
    The chmod() and fchmod() system calls change a files mode bits.  (The file mode consists of the file permission bits plus the set-user-ID, set-group-ID, and sticky bits.)  These system calls differ only in how the file is specified:
 
    * chmod() changes the mode of the file specified whose pathname is given in pathname, which is dereferenced if it is a symbolic link.
 
    * fchmod() changes the mode of the file referred to by the open file descriptor fd.
 
    The new file mode is specified in mode, which is a bit mask created by ORing together zero or more of the following:
 
    S_ISUID  (04000)  set-user-ID (set process effective user ID on execve(2))
 
    S_ISGID  (02000)  set-group-ID (set process effective group ID on execve(2); mandatory locking, as described in fcntl(2); take a new file's group from parent directory, as described in chown(2) and mkdir(2))
 
    S_ISVTX  (01000)  sticky bit (restricted deletion flag, as described in unlink(2))
 
    S_IRUSR  (00400)  read by owner
 
    S_IWUSR  (00200)  write by owner
 
    S_IXUSR  (00100)  execute/search by owner ("search" applies for directories, and means that entries within the directory can be accessed)
 
    S_IRGRP  (00040)  read by group
 
    S_IWGRP  (00020)  write by group
    * chmod() changes the mode of the file specified whose pathname is given in pathname, which is dereferenced if it is a symbolic link.
 
    * fchmod() changes the mode of the file referred to by the open file descriptor fd.
 
    The new file mode is specified in mode, which is a bit mask created by ORing together zero or more of the following:
 
    S_ISUID  (04000)  set-user-ID (set process effective user ID on execve(2))
 
    S_ISGID  (02000)  set-group-ID (set process effective group ID on execve(2); mandatory locking, as described in fcntl(2); take a new file's group from parent directory, as described in chown(2) and mkdir(2))
 
    S_ISVTX  (01000)  sticky bit (restricted deletion flag, as described in unlink(2))
 
    S_IRUSR  (00400)  read by owner
 
    S_IWUSR  (00200)  write by owner
 
    S_IXUSR  (00100)  execute/search by owner ("search" applies for directories, and means that entries within the directory can be accessed)
 
    S_IRGRP  (00040)  read by group
 
    S_IWGRP  (00020)  write by group
 
    S_IXGRP  (00010)  execute/search by group
 
    S_IROTH  (00004)  read by others
 
    S_IWOTH  (00002)  write by others
 
    S_IXOTH  (00001)  execute/search by others
```
