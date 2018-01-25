Atom Editor v1.18.0

Usage: atom [options] [path ...]

One or more paths to files or folders may be specified. If there is an
existing Atom window that contains all of the given folders, the paths
will be opened in that window. Otherwise, they will be opened in a new
window.

Environment Variables:

  ATOM_DEV_RESOURCE_PATH  The path from which Atom loads source code in dev mode.
                          Defaults to `~/github/atom`.

  ATOM_HOME               The root path for all configuration files and folders.
                          Defaults to `~/.atom`.

Options:
  -1, --one                  This option is no longer supported.  [boolean]
  --include-deprecated-apis  This option is not currently supported.  [boolean]
  -d, --dev                  Run in development mode.  [boolean]
  -f, --foreground           Keep the main process in the foreground.  [boolean]
  -h, --help                 Print this usage message.  [boolean]
  -l, --log-file             Log all output to file.  [string]
  -n, --new-window           Open a new window.  [boolean]
  --profile-startup          Create a profile of the startup execution time.  [boolean]
  -r, --resource-path        Set the path to the Atom source directory and enable dev-mode.  [string]
  --safe                     Do not load packages from ~/.atom/packages or ~/.atom/dev/packages.  [boolean]
  --benchmark                Open a new window that runs the specified benchmarks.  [boolean]
  --benchmark--test          Run a faster version of the benchmarks in headless mode.
  -t, --test                 Run the specified specs and exit with error code on failures.  [boolean]
  -m, --main-process         Run the specified specs in the main process.  [boolean]
  --timeout                  When in test mode, waits until the specified time (in minutes) and kills the process (exit code: 130).  [string]
  -v, --version              Print the version information.  [boolean]
  -w, --wait                 Wait for window to be closed before returning.  [boolean]
  --clear-window-state       Delete all Atom environment state.  [boolean]
  -a, --add                  Open path as a new project in last used window.  [boolean]

