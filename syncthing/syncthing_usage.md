https://docs.syncthing.net/users/syncthing.html



# 2.1. Syncthing

## 2.1.1. Synopsis

```
syncthing [-audit] [-auditfile=<file|-|-->] [-browser-only] [device-id]
          [-generate=<dir>] [-gui-address=<address>] [-gui-apikey=<key>]
          [-home=<dir>] [-logfile=<filename>] [-logflags=<flags>]
          [-no-browser] [-no-console] [-no-restart] [-paths] [-paused]
          [-reset-database] [-reset-deltas] [-unpaused] [-upgrade]
          [-upgrade-check] [-upgrade-to=<url>] [-verbose] [-version]

```

## 2.1.2. Description

Syncthing lets you synchronize your files bidirectionally across multiple devices. This means the creation, modification or deletion of files on one machine will automatically be replicated to your other devices. We believe your data is your data alone and you deserve to choose where it is stored. Therefore Syncthing does not upload your data to the cloud but exchanges your data across your machines as soon as they are online at the same time.

## 2.1.3. Options

- `-audit```

  Write events to timestamped file `audit-YYYYMMDD-HHMMSS.log`.


- `-auditfile``=<file|-|-->`

  Use specified file or stream (`"-"` for stdout, `"--"` for stderr) for audit events, rather than the timestamped default file name.


- `-browser-only```

  Open the web UI in a browser for an already running Syncthing instance.


- `-device-id```

  Print device ID to command line.


- `-generate``=<dir>`

  Generate key and config in specified dir, then exit.


- `-gui-address``=<address>`

  Override GUI listen address.


- `-home``=<dir>`

  Set configuration directory. The default configuration directory is`$HOME/.config/syncthing` (Unix-like), `$HOME/Library/Application Support/Syncthing` (Mac) and `%LOCALAPPDATA%\Syncthing` (Windows).


- `-logfile``=<filename>`

  Set destination filename for logging (use `"-"` for stdout, which is the default option).


- `-logflags``=<flags>`

  Select information in log line prefix. The `-logflags` value is a sum of the following:1: Date2: Time4: Microsecond time8: Long filename16: Short filenameTo prefix each log line with date and time, set `-logflags=3` (1 + 2 from above). The value 0 is used to disable all of the above. The default is to show time only (2).


- `-no-browser```

  Do not start a browser.


- `-no-console```

  Hide the console window. (On Windows only)


- `-no-restart```

  Disable the Syncthing monitor process which handles restarts for some configuration changes, upgrades, crashes and also log file writing (stdout is still written).


- `-paths```

  Print the paths used for configuration, keys, database, GUI overrides, default sync folder and the log file.


- `-paused```

  Start with all devices and folders paused.


- `-reset-database```

  Reset the database, forcing a full rescan and resync. Create .stfolder folders in each sync folder if they do not already exist. **Caution**: Ensure that all sync folders which are mountpoints are already mounted. Inconsistent versions may result if the mountpoint is later mounted and contains older versions.


- `-reset-deltas```

  Reset delta index IDs, forcing a full index exchange.


- `-unpaused```

  Start with all devices and folders unpaused.


- `-upgrade```

  Perform upgrade.


- `-upgrade-check```

  Check for available upgrade.


- `-upgrade-to``=<url>`

  Force upgrade directly from specified URL.


- `-verbose```

  Print verbose log output.


- `-version```

  Show version.

## 2.1.4. Exit Codes

- 0

  Success / Shutdown

- 1

  Error

- 2

  Upgrade not available

- 3

  Restarting

- 4

  Upgrading

Some of these exit codes are only returned when running without a monitor process (with environment variable `STNORESTART` set). Exit codes over 125 are usually returned by the shell/binary loader/default signal handler. Exit codes over 128+N on Unix usually represent the signal which caused the process to exit. For example, `128 + 9 (SIGKILL) = 137`.

## 2.1.5. Proxies

Syncthing can use a SOCKS, HTTP, or HTTPS proxy to talk to the outside world. The proxy is used for outgoing connections only - it is not possible to accept incoming connections through the proxy. The proxy is configured through the environment variable `all_proxy`. Somewhat unusually, this variable must be named in lower case - it is not “ALL_PROXY”. For example:

```
$ export all_proxy=socks://192.0.2.42:8081

```

## 2.1.6. Development Settings

The following environment variables modify Syncthing’s behavior in ways that are mostly useful for developers. Use with care. If you start Syncthing from within service managers like systemd or supervisor, path expansion may not be supported.

- STTRACE

  Used to increase the debugging verbosity in specific or all facilities, generally mapping to a Go package. Enabling any of these also enables microsecond timestamps, file names plus line numbers. Enter a comma-separated string of facilities to trace. `syncthing -help` always outputs an up-to-date list. The valid facility strings are:Main and operational facilities:configConfiguration loading and saving.dbThe database layer.mainMain package.modelThe root hub; the largest chunk of the system. File pulling, index transmission and requests for chunks.scannerFile change detection and hashing.versionerFile versioning.Networking facilities:beaconMulticast and broadcast UDP discovery packets: Selected interfaces and addresses.connectionsConnection handling.dialerDialing connections.discoverRemote device discovery requests, replies and registration of devices.natNAT discovery and port mapping.pmpNAT-PMP discovery and port mapping.protocolThe BEP protocol.relayRelay interaction (`strelaysrv`).upnpUPnP discovery and port mapping.Other facilities:fsFilesystem access.eventsEvent generation and logging.httpREST API.sha256SHA256 hashing package (this facility currently unused).statsPersistent device and folder statistics.syncMutexes. Used for debugging race conditions and deadlocks.upgradeBinary upgrades.walkfsFilesystem access while walking.allAll of the above.

- STBLOCKPROFILE

  Write block profiles to `block-$pid-$timestamp.pprof` every 20 seconds.

- STCPUPROFILE

  Write a CPU profile to `cpu-$pid.pprof` on exit.

- STDEADLOCKTIMEOUT

  Used for debugging internal deadlocks; sets debug sensitivity. Use only under direction of a developer.

- STDEADLOCKTHRESHOLD

  Used for debugging internal deadlocks; sets debug sensitivity. Use only under direction of a developer.

- STGUIASSETS

  Directory to load GUI assets from. Overrides compiled in assets. Useful for developing webgui, commonly use `STGUIASSETS=gui bin/syncthing`.

- STHASHING

  Specify which hashing package to use. Defaults to automatic based on performance. Specify “minio” (compatibility) or “standard” for the default Go implementation.

- STHEAPPROFILE

  Write heap profiles to `heap-$pid-$timestamp.pprof` each time heap usage increases.

- STNODEFAULTFOLDER

  Don’t create a default folder when starting for the first time. This variable will be ignored anytime after the first run.

- STNORESTART

  Equivalent to the `-no-restart` flag. Disable the Syncthing monitor process which handles restarts for some configuration changes, upgrades, crashes and also log file writing (stdout is still written).

- STNOUPGRADE

  Disable automatic upgrades.

- STPROFILER

  Set to a listen address such as “127.0.0.1:9090” to start the profiler with HTTP access, which then can be reached at <http://localhost:9090/debug/pprof>. See `go tool pprof` for more information.

- STPERFSTATS

  Write running performance statistics to `perf-$pid.csv`. Not supported on Windows.

- STRECHECKDBEVERY

  Time before folder statistics (file, dir, … counts) are recalculated from scratch. The given duration must be parseable by GO’s time.ParseDuration. If missing or not parseable, the default value of 1 month is used. To force recalculation on every startup, set it to `0`.

- GOMAXPROCS

  Set the maximum number of CPU cores to use. Defaults to all available CPU cores.

- GOGC

  Percentage of heap growth at which to trigger GC. Default is 100. Lower numbers keep peak memory usage down, at the price of CPU usage (i.e. performance).

## 2.1.7. See Also

*syncthing-config(5)*, *syncthing-stignore(5)*, *syncthing-device-ids(7)*, *syncthing-security(7)*,*syncthing-networking(7)*, *syncthing-versioning(7)*, *syncthing-faq(7)*