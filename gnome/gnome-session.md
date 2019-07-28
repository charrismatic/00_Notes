 MANWIDTH=120 man2html gnome-session | _send2md
node /data/0/projects/mandown/bin/../index.js
MANWIDTH=140 man --no-hyphenation --no-justification --encoding utf8 --troff-device=html gnome-session     p { margin-top: 0; margin-bottom: 0; vertical-align: top } pre { margin-top: 0; margin-bottom: 0; vertical-align: top } table { margin-top: 0; margin-bottom: 0; vertical-align: top } h1 { text-align: center }  GNOME-SESSION

# GNOME-SESSION

[NAME](#NAME)  
[SYNOPSIS](#SYNOPSIS)  
[DESCRIPTION](#DESCRIPTION)  
[OPTIONS](#OPTIONS)  
[SESSION DEFINITION](#SESSION DEFINITION)  
[ENVIRONMENT](#ENVIRONMENT)  
[FILES](#FILES)  
[BUGS](#BUGS)  
[SEE ALSO](#SEE ALSO)  

---

## NAME

gnome-session - Start the GNOME desktop environment

## SYNOPSIS

**gnome-session \[-a|--autostart=DIR\] \[--session=SESSION\] \[--failsafe|-f\] \[--debug\] \[--whale\]**

## DESCRIPTION

The _gnome-session_ program starts up the GNOME desktop environment. This command is typically executed by your login manager (either gdm, xdm, or from your X startup scripts). It will load either your saved session, or it will provide a default session for the user as defined by the system administrator (or the default GNOME installation on your system).

The default session is defined in **gnome.session**, 
  a .desktop-like file that is looked for in 
  **$XDG\_CONFIG\_HOME/gnome-session/sessions**, 
  **$XDG\_CONFIG\_DIRS/gnome-session/sessions** and
  **$XDG\_DATA\_DIRS/gnome-session/sessions**.

When saving a session, _gnome-session_ saves the currently running applications in the 
  **$XDG\_CONFIG\_HOME/gnome-session/saved-session** directory.

_gnome-session_ is an X11R6 session manager. It can manage GNOME applications as well as any X11R6 SM compliant application.

## OPTIONS

The following options are supported:_  
\--autostart=DIR_

Start all applications defined in _DIR_, 
  instead of starting the applications defined in 
  **gnome.session**, 
  or via the _\--session_ option. 
  Multiple _\--autostart_ options can be passed.

_\--session=SESSION_

Use the applications defined in **SESSION.session**. 
If not specified, **gnome.session** will be used.

_\--failsafe_

Run in fail-safe mode. User-specified applications will not be started.

_\--debug_

Enable debugging code.

_\--whale_

Show the fail whale in a dialog for debugging it.

## SESSION DEFINITION

Sessions are defined in **.session** files, that are using a .desktop-like format, with the following keys in the **GNOME Session** group:

_Name_

Name of the session. This can be localized.

_RequiredComponents_

List of component identifiers (desktop files) that are required by the session. The required components will always run in the session.

Here is an example of a session definition:

\[GNOME Session\]  
Name=GNOME  
RequiredComponents=gnome-shell;gnome-settings-daemon;

The **.session** files are looked for in 
  **$XDG\_CONFIG\_HOME/gnome-session/sessions**, 
  **$XDG\_CONFIG\_DIRS/gnome-session/sessions** and
  **$XDG\_DATA\_DIRS/gnome-session/sessions**.

## ENVIRONMENT

_gnome-session_ sets several environment variables for the use of its child processes:

**SESSION\_MANAGER**

This variable is used by session-manager aware clients to contact gnome-session.

**DISPLAY**

This variable is set to the X display being used by _gnome-session_. 
Note that if the _\--display_ option is used this might be different
 from the setting of the environment variable when gnome-session is invoked.

## FILES

  **$XDG\_CONFIG\_HOME/config/autostart**
  **$XDG\_CONFIG\_DIRS/config/autostart**
  **/usr/share/gnome/autostart**

The applications defined in those directories will be started on login. 
_gnome-session-properties(1)_ can be used to easily configure them.

  **$XDG\_CONFIG\_HOME/gnome-session/sessions** 
  **$XDG\_CONFIG\_DIRS/gnome-session/sessions**
  **$XDG\_DATA\_DIRS/gnome-session/sessions**

These directories contain the **.session** files that can be used with the _\--session_ option.

  **$XDG\_CONFIG\_HOME/gnome-session/saved-session**

This directory contains the list of applications of the saved session.

## BUGS

If you find bugs in the _gnome-session_ program, please report these on https://bugzilla.gnome.org.

## SEE ALSO

**gnome-session-properties(1) gnome-session-quit(1)**

---



        /usr/share/gnome-session/sessions/gnome.session,
        /usr/share/applications/org.gnome.Shell.desktop.
 

