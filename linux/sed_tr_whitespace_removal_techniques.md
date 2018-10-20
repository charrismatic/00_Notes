https://askubuntu.com/questions/537956/sed-to-delete-blank-spaces





Q: Does anyone know how to use Sed to delete all blank spaces in a text file? I haven been trying to use the "d" delete command to do so, but can't seem to figure it out

# Sed to delete blank spaces - Ask Ubuntu

---------------------------
## What kind of "space"?

To "delete all blank spaces" can mean one of different things:

1.  delete all occurrences of the space character, code `0x20`.
2.  ___httpsdelete all horizo___httpsntal space, including the horizontal tab character, "`\t`"
3.  delete all whitespace, including newline, "`\n`" and others

## The right tool for the job

If `sed` it not a requirement for some hidden reason, better use the right tool for the job.

The command `tr` has the main use in translating (hence the name "tr") a list of characters to a list of other characters. As an corner case, it can translate to the empty list of characters; The option `-d` (`--delete`) will delete characters that appear in the list.

The list of characters can make use of character classes in the `[:...:]` syntax.

1.  `tr -d ' ' < input.txt > no-spaces.txt`
2.  `tr -d '[:blank:]' < input.txt > no-spaces.txt`
3.  `tr -d '[:space:]' < input.txt > no-spaces.txt`

## When insisting on `sed`___https

With sed, the `[:...:]` syntax for character classes needs to be combined with the syntax for character sets in regexps, `[...]`, resulting in the somewhat confusing `[[:...:]]`:

1.  `sed 's/ //g' input.txt > no-spaces.txt`
2.  `sed 's/[[:blank:]]//g' input.txt > no-spaces.txt`
3.  `sed 's/[[:space:]]//g' input.txt > no-spaces.txt`
    html2md:1 undefined





---



- Great hint to use tr for this task, works great. Only thing I had to adjust was that tr reads input from stdin, so what worked for me was `tr -d ' ' < input.txt > no-spaces.txt`. – [Sky](https://askubuntu.com/users/590698/sky) [Sep 4 '16 at 18:50](https://askubuntu.com/questions/537956/sed-to-delete-blank-spaces#comment1245413_538771)
- 

 



You can use this to remove all whitespaces in `file`:

```
 sed -i "s/ //g" file
```



- I use `sed "s: ::g"` when i'm `grep`ing things, what's the difference between the two expression notations? – [starscream_disco_party](https://askubuntu.com/users/412779/starscream-disco-party) [Apr 20 '17 at 1:13](https://askubuntu.com/questions/537956/sed-to-delete-blank-spaces#comment1424311_537964)

  

- starscream_disco_party: it‘s the same. You can replace all 3`/` with a different character, e.g.: `sed "ss ssg"` – [Cyrus](https://askubuntu.com/users/336375/cyrus) [Apr 20 '17 at 5:17](https://askubuntu.com/questions/537956/sed-to-delete-blank-spaces#comment1424372_537964)

 



---



https://www.cyberciti.biz/tips/delete-leading-spaces-from-front-of-each-word.html

# sed tip: Remove / Delete All Leading Blank Spaces / Tabs ( whitespace ) From Each Line - nixCraft

---------------------------
# sed tip: Remove / Delete All Leading Blank Spaces / Tabs ( whitespace ) From Each Line

last updated December 30, 2007 in Categories [Howto](https://www.cyberciti.biz/tips/category/howto), [Linux](https://www.cyberciti.biz/tips/category/linux), [Shell scripting](https://www.cyberciti.biz/tips/category/shell-scripting), [UNIX](https://www.cyberciti.biz/tips/category/unix)

[![](https://www.cyberciti.biz/media/new/category/old/terminal.png)](//www.cyberciti.biz/tips/category/shell-scripting "See all Bash/Shell scripting related tips/articles")

The sed (Stream Editor) is very powerful tool. Each line of input is copied into a pattern space. You can run editing commands on each input line to delete or change the input. For example, delete lines containing word DVD, enter:  
__cat input.txt | sed ‘/DVD/d’__

(adsbygoogle = window.adsbygoogle || \[\]).push({});

To Print the lines between each pair of words pen and pencil, inclusive, enter:  
`$ cat input.txt sed -e '/^PEN/,/^PENCIL/p'`

To remove all blank lines, enter:  
`$ cat /etc/rssh.conf | sed '/^$/d' > /tmp/output.file`

sed is very handy tool for editing and deleting unwanted stuff. Following echo statements printed lots of whitespace from left side:  
`echo "     This is a test"`  
Output:

```
This is a test
```

To remove all whitespace (including tabs) from left to first word, enter:  
`echo "     This is a test" | sed -e 's/^[ \t]*//'`  
Output:

```
This is a test
```

Where,

-   __s/__ : Substitute command ~ replacement for pattern (^\[ \\t\]*) on each addressed line
-   __^\[ \\t\]*__ : Search pattern ( ^ – start of the line; \[ \\t\]* match one or more blank spaces including tab)
-   __//__ : Replace (delete) all matched pattern

Following sample script reads some data from text file and generate a formatted output. It delete all leading whitespace from front of each line so that text get aligned to left:

| 
```shell
#!/bin/bash
FILE=url.dump.txt
DOMAIN=yourdomain.com
exec 3<&0
exec 0<$FILE
while read line
do
	url=$(echo "http://${DOMAIN}${line}")
        title="$(lynx -dump -source ${url} | grep '<title>' | awk -F '<title>' '{ print $2 }' | cut -d'<' -f1|sed 's/^\[ \\t\]*//')"
        echo "<li>${title}</li>"
done
exec 0<&3	
```

To delete trailing whitespace from end of each line, enter: 
`$ cat input.txt | sed 's/[ \t]*$//' > output.txt`  
Better remove all leading and trailing whitespace from end of each line:  
`$ cat input.txt | sed 's/^[ \t]*//;s/[ \t]*$//' > output.txt`

## Posted by: Vivek Gite

The author is the creator of nixCraft and a seasoned sysadmin, DevOps engineer, and a trainer for the Linux operating system/Unix shell scripting. Get the __latest tutorials on SysAdmin, Linux/Unix and open source topics via [RSS/XML feed](https://www.cyberciti.biz/atom/atom.xml)__ or [weekly email newsletter](https://www.cyberciti.biz/subscribe-to-weekly-linux-unix-newsletter-for-sysadmin/).