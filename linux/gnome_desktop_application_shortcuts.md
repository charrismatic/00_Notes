# Gnome desktop application custom actions 



There are a handful of programs that I use every day in ways that I am doing the same actions over and over again, and which eventually becomes easier to start from the terminal vs. using the favorites launcher.  Most of those items end up becoming aliases or custom functions, but when  steps are simple enough you can also add a custom action to the desktop icons context menu. 

For example, Opening a notebook application to a specific folder with a few parameters. 

To do this all you need to do is edit the gnome applications desktop file, and  add a few extra lines for the name and command. 

Gnome application.desktop files live in the following location 

- System wide applications: `/usr/share/applications/`
- Single user applications:  `~/.local/share/applications/`

Example `.desktop` file 

```ini
[Desktop Entry]
Version=1.1
Type=Application
Name=Foo Viewer
DBusActivatable=true
MimeType=image/x-foo;
Exec=gapplication launch org.example.fooview %F
Actions=gallery;create;

[Desktop Action gallery]
Name=Browse Gallery
Exec=gapplication action org.example.fooview gallery

[Desktop Action create]
Name=Create a new Foo!
Exec=gapplication action org.example.fooview create
```



### Exec Arguments 

Command line arguments in the `Exec` key can be signified with the following variables:

- `%f` a single filename.
- `%F` multiple filenames.
- `%u` a single URL.
- `%U` multiple URLs.
- `%d` a single directory. Used in conjunction with `%f` to locate a file.
- `%D` multiple directories. Used in conjunction with `%F` to locate files.
- `%n` a single filename without a path.
- `%N` multiple filenames without paths.
- `%k` a URI or local filename of the location of the desktop file.
- `%v` the name of the Device entry.

Note that `~` or environmental variables like `$HOME` are not expanded within desktop files, so any executables referenced must either be in the `$PATH` or referenced via their absolute path.

__See:__ 

`man File::DesktopEntry`



There are also some built-in tools to help with managing desktop applications

`desktop-file-edit`, `desktop-file-validate`, `update-desktop-database`, `gapplications` 

Some of these routines can also be useful for altering icons, application categories, mime types, or refreshing the application database/cache 



Note: You will need to restart your session for changes to take effect. One way to do this without logging out is 

- `Alt + F2`
- `r`
- 'enter'





## Gnome desktop application, defaults, and settings 

from `xdg-utils`

`xdg-open`, `xdg-mime`, `xdg-settings`

xdg-open opens a file or URL in the user's preferred application. If a URL is provided the URL will be opened in the user's preferred web browser. If a file is provided the file will be opened in the preferred application for files of that type. `xdg-open` supports file, ftp, http and https URLs. 

`xdg-open` is for desktop session only. Do not run `xdg-open` root.



### References: 

[freedesktop.org | MIME applications associations specification](http://www.freedesktop.org/wiki/Specifications/mime-apps-spec)

[GNOME Developers | Desktop Entry Specification](https://developer.gnome.org/desktop-entry-spec/)

[Stack Overflow | How can I add an application to the GNOME window manager?](https://unix.stackexchange.com/questions/103213/how-can-i-add-an-application-to-the-gnome-window-manager)

[GNOME Developers | Desktop files: putting your application in the desktop menus](https://developer.gnome.org/integration-guide/stable/desktop-files.html.en)

https://askubuntu.com/questions/13758/how-can-i-edit-create-new-launcher-items-in-unity-by-hand

https://wiki.archlinux.org/index.php/GNOME/Tips_and_tricks