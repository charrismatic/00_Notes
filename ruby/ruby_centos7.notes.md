               after printing its version.

ENVIRONMENT
     RUBYLIB         A colon-separated list of directories that are added to Ruby's library load path ($:). Directories from this environment variable are searched before the standard load path is searched.

                     e.g.:
                           RUBYLIB="$HOME/lib/ruby:$HOME/lib/rubyext"

     RUBYOPT         Additional Ruby options.

                     e.g.
                           RUBYOPT="-w -Ke"

                     Note that RUBYOPT can contain only -d, -E, -I, -K, -r, -T, -U, -v, -w, -W, --debug, --disable-FEATURE and --enable-FEATURE.

     RUBYPATH        A colon-separated list of directories that Ruby searches for Ruby programs when the -S flag is specified.  This variable precedes the PATH environment variable.

     RUBYSHELL       The path to the system shell command.  This environment variable is enabled for only mswin32, mingw32, and OS/2 platforms.  If this variable is not defined, Ruby refers to COMSPEC.

     PATH            Ruby refers to the PATH environment variable on calling Kernel#system.

/usr/share/locale/gem
/usr/share/gems/usr/share/gems
/usr/local/lib/ruby/gems
/usr/local/bin/gem


