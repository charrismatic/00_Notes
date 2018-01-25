FILE LOCATION
       Normally the config file will be ~/.config/terminator/config, but it may be overridden with $XDG_CONFIG_HOME (in which case it
       will be $XDG_CONFIG_HOME/terminator/config)


  use_custom_command = True
  custom_command = "echo \"foo#bar\"" #Final comment 

if use_custom_command is set to True.  Default value: Nothing


layouts
       This  describes the layouts section of the config file. Like with the profiles, each layout should be defined as a sub-section
       with a name formatted like: [[name]].

       Each object in a layout is a named sub-sub-section with various properties:

       [layouts]
         [[default]]
           [[window0]]
             type = Window
           [[child1]]
             type = Terminal
             parent = window0

       Window objects may not have a parent attribute. Every other object must specify a parent. This is how  the  structure  of  the
       window is determined.

