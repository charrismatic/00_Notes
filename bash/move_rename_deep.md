find folders names TARGET

__SOURCE__

`%P` - folder path without leading `./`

__MARKER__
`\n\t` - start a newline and add a tab character we will use as the conditional marker for the replacement operation  


__DESTINATION__ 

`%h` - file path including leading `./` for safe moving (so we do not accidentally end up at root / when sed replaces characters)

note: I ended up removing this in sed in the second operation but it still provided a reliable  replacement target ) 





find . -type d -path "*/$TARGET" -printf '%P\n\t%h\n' 




find . -type d -path "*/build" -printf '%P\n\t%h\n' | sed -E '/^\t/{ s/^\t\.\///  ;  s/[/]/_/g ; s/(.*)/\L\1/g }' | xargs -n2 echo



find . -type d -path "*/build" -printf '%P\n\t%h\n' | sed -E '/^\t/{ s/[/]/_/g ; s/^\t\._/\.bldtemp\// ; s/(.*)/\L\1/g }' | xargs -n2 mv





halfway


```
Config/dev_backup/libs/googleplayservices_lib/build
.build/config_dev_backup_libs_googleplayservices_lib
Config/dev_backup/libs/openMXPlayer/build
.build/config_dev_backup_libs_openmxplayer
GitRepoRtE2/googleplayservices_lib/build
.build/gitreporte2_googleplayservices_lib
GitRepoRtE2/openMXPlayer/build
.build/gitreporte2_openmxplayer
GitRepoRtE2/recordTheEarth/build
.build/gitreporte2_recordtheearth
Archive/GitRepoRtE/googleplayservices_lib/build
.build/archive_gitreporte_googleplayservices_lib
Archive/GitRepoRtE/openMXPlayer/build
.build/archive_gitreporte_openmxplayer
Archive/GitRepoRtE/recordTheEarth/build
.build/archive_gitreporte_recordtheearth
RtE3/googleplayservices_lib/build
.build/rte3_googleplayservices_lib
RtE3/openMXPlayer/build
.build/rte3_openmxplayer
RtE3/recordTheEarth/build
.build/rte3_recordtheearth
RtE-v2.1/googleplayservices_lib/build
.build/rte-v2.1_googleplayservices_lib
RtE-v2.1/openMXPlayer/build
.build/rte-v2.1_openmxplayer
RtE-v2.1/recordTheEarth/build
.build/rte-v2.1_recordtheearth
RtE-2016-02-01/googleplayservices_lib/build
.build/rte-2016-02-01_googleplayservices_lib
RtE-2016-02-01/openMXPlayer/build
.build/rte-2016-02-01_openmxplayer
RtE-2016-02-01/recordTheEarth/build
.build/rte-2016-02-01_recordtheearth
RtE/googleplayservices_lib/build
.build/rte_googleplayservices_lib
RtE/openMXPlayer/build
.build/rte_openmxplayer
RtE/recordTheEarth/build
.build/rte_recordtheearth

````





almost 

```

find . -type d -path "*/build" -printf '%P\n\t%h\n' | sed -E '/^\t/{ s/[/]/_/g ; s/^\t\._/\.build\// ; s/(.*)/\L\1/g }' | xargs -n2 echo 
Config/dev_backup/libs/googleplayservices_lib/build .build/config_dev_backup_libs_googleplayservices_lib
Config/dev_backup/libs/openMXPlayer/build .build/config_dev_backup_libs_openmxplayer
GitRepoRtE2/googleplayservices_lib/build .build/gitreporte2_googleplayservices_lib
GitRepoRtE2/openMXPlayer/build .build/gitreporte2_openmxplayer
GitRepoRtE2/recordTheEarth/build .build/gitreporte2_recordtheearth
Archive/GitRepoRtE/googleplayservices_lib/build .build/archive_gitreporte_googleplayservices_lib
Archive/GitRepoRtE/openMXPlayer/build .build/archive_gitreporte_openmxplayer
Archive/GitRepoRtE/recordTheEarth/build .build/archive_gitreporte_recordtheearth
RtE3/googleplayservices_lib/build .build/rte3_googleplayservices_lib
RtE3/openMXPlayer/build .build/rte3_openmxplayer
RtE3/recordTheEarth/build .build/rte3_recordtheearth
RtE-v2.1/googleplayservices_lib/build .build/rte-v2.1_googleplayservices_lib
RtE-v2.1/openMXPlayer/build .build/rte-v2.1_openmxplayer
RtE-v2.1/recordTheEarth/build .build/rte-v2.1_recordtheearth
RtE-2016-02-01/googleplayservices_lib/build .build/rte-2016-02-01_googleplayservices_lib
RtE-2016-02-01/openMXPlayer/build .build/rte-2016-02-01_openmxplayer
RtE-2016-02-01/recordTheEarth/build .build/rte-2016-02-01_recordtheearth
RtE/googleplayservices_lib/build .build/rte_googleplayservices_lib
RtE/openMXPlayer/build .build/rte_openmxplayer
RtE/recordTheEarth/build .build/rte_recordtheearth

```
