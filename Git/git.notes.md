
### ENABLE GIT AUTOCOMPLETE

```
# ~./bashrc

if [ -f $(brew --prefix)/etc/bash_completion ]; then
  . $(brew --prefix)/etc/bash_completion
fi
```


# MULTIPLE USERS

(Using hooks and templates to switch git config settings)[https://orrsella.com/2013/08/10/git-using-different-user-emails-for-different-repositories/]

http://stackoverflow.com/questions/4220416/can-i-specify-multiple-users-for-myself-in-gitconfig

https://gist.github.com/RichardBronosky/dc0ced21d6dc7be7d196

```
git remote set-url origin git@<host-in-ssh-config>:<username>/<repo>
```

## EDIT GIT CONFIG FILE
`$ git config --global --edit`

```
Host repo1.github.com
  HostName github.com
  User git
  IdentityFile /home/alice/.ssh/repo1.alice_github.id_rsa
  IdentitiesOnly yes

Host repo2.github.com
  HostName github.com
  User git
  IdentityFile /home/alice/.ssh/repo2.alice_github.id_rsa
  IdentitiesOnly yes
```

`git config --[global,local,system] -e `
`git config --local -e ==  git config --includes -e`


# LET GIT READ FROM SSH CONFIG
http://stackoverflow.com/questions/4565700/specify-private-ssh-key-to-use-when-executing-shell-command-with-or-without-ruby/11251797#11251797

```
# ~/.ssh/config

Host <SERVERNAME>
    Hostname        remote.server.com
    IdentityFile    ~/.ssh/id_rsa.github
    IdentitiesOnly yes # see NOTES below
```

``` 
# ~/<PROJECT_FOLDER>/
git remote add origin git@gitserv:myrepo.git
git push -v origin master
```


### OVERRIDE DEFAULT COMAND
`GIT_SSH_COMMAND="ssh -i ~/.ssh/id_rsa_example" git clone example`

`help.autocorrect`

### TEMPLATES 

`git config --global commit.template ~/.gitmessage.txt`

### GLOBAL IGNORE

`core.excludesfile`

```
# ~/.gitconfig

user.name=Name
user.email=user@email.com
user.signingkey=git_rsa
core.editor=nano
core.whitespace=trailing-space,space-before-tab
core.excludesfile=~/.gitignore
color.ui=auto
diff.renames=copies
branch.autosetupmerge=true
rerere.enabled=true
merge.stat=true
```



## References

(THE GIT BOOK | BRANCHES / MERGE / REBASE)[https://git-scm.com/book/en/v2/Git-on-the-Server-The-Protocols]
(GREAT TIPS AND TRICKS FOR SETTING UP GIT)[http://nuclearsquid.com/writings/git-tricks-tips-workflows/]
(SETUP GIT FOR MULTIPLE USER ACCOUNTS / PROJECTS)[http://anthony.liekens.net/index.php/Computers/Git]
(CUSTOMIZING GIT CONFIG)[https://git-scm.com/book/tr/v2/Customizing-Git-Git-Configuration]