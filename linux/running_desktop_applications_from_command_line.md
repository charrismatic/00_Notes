 Starting desktop applications from the command line

Tags: linux, desktop, gnome, nohub, background-process

This is something that comes up often and is a minor inconvenience that I usually bypass to switching from the terminal to the a desktop icon to launch certain applications. However there are a handful of programs that I use regularly enough to create aliases for. In this case its useful to know the correct way start a gui application without locking up one of you terminal sessions.



    nohup <command> >/dev/null &
    

Explanation
Explanation

From Stack Overflow 

When you run

     gedit filename

the process in foreground, to send it to the background and continue using terminal, use

    gedit filename &

Note that  gedit will run as a sub-process of your terminal, however when you exit the terminal it will also exit gedit since it is attached.

So to run the program 'gracefully', use

    nohup gedit >/dev/null &

nohup will run gedit detached from terminal and so that it is immune to hangups. >/dev/nullredirects the stdout to dev/null,  preventing the creation of a nohup.out file.

See man nohup and this question for more information."

---

How to recover an unresponsive terminal session after running a window application

After launching a desktop application in the terminal, your session is now locked. To regain control use the following steps

In an unresponsive terminal:

1. Ctrl+Z
2. bg 
3. disown 

In the unresponsive terminal, hit Ctrl+Z, this will pause the process and return the console control to you. However, you'll notice that the program becomes unresponsive and you can't use it.

Note: if you execute the command jobs, you'll notice that it'll show as "Stopped" for the command, which is why you can't use it.

To continue running the job successfully in the background execute the command bg. You'll now be able to use the application, and at regain control of the terminal.

Note: now executing jobs, will show the process as "Running".

Sources

Stack Overflow | When I open gedit from terminal I an unable to use the terminal for anything else

Stack Overflow | I can't use the terminal while gedit command is running



