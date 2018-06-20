# Getting information about your operating system

## Linux or Kernel Version

```shell
$ uname -r
3.8.1
```

```shell
$ uname -mrsn
Linux localhost 3.8.11 x86_64
```


```shell
uname -a 
Linux localhost 3.8.11 #1 SMP Mon Aug 21 20:04:45 PDT 2017 x86_64 x86_64 x86_64 GNU/Linux
```


## Get kernel version from file

```shell
cat /proc/version

Linux version 3.8.11 (chrome-bot@cros-beefy223-c2) (gcc version 4.9.x 20150123 (prerelease) (4.9.2_cos_gg_4.9.2-r154-32c89c19b042a12b5a1bf0153299154ea5435c03_4.9.2-r154) ) #1 SMP Mon Aug 21 20:04:45 PDT 2017
```

## Finding your distribution release

```shell
lsb_release -a
```

