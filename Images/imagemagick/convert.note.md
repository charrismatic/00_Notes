---
https://superuser.com/questions/71028/batch-converting-png-to-jpg-in-linux
---


#1 image
```
convert image.png image.jpg
```

#overwrite image
```
mogrify -format jpg *.png
```

to convert PNG's with transparent background, use the following command: 

```
mogrify -format jpg -background black -flatten *.png
```

couple more solutions.

The simplest solution is like most already posted. A simple bash for loop.

`for i in *.png ; do convert "$i" "${i%.*}.jpg" ; done`

For some reason I tend to avoid loops in bash so here is a more unixy xargs approach, using bash for the name-mangling.

`ls -1 *.png | xargs -n 1 bash -c 'convert "$0" "${0%.*}.jpg"'`

The one I use. It uses GNU Parallel to run multiple jobs at once, giving you a performance boost. 

It is installed by default on many systems and is almost definitely in your repo (it is a good program to have around).

`ls -1 *.png | parallel convert '{}' '{.}.jpg'`


The number of jobs defaults to the number of processes you have. I found better CPU usage using 3 jobs on my dual-core system.

`ls -1 *.png | parallel -j 3 convert '{}' '{.}.jpg'`

And if you want some stats (an ETA, jobs completed, average time per job...)

ls -1 *.png | parallel --eta convert '{}' '{.}.jpg'
There is also an alternative syntax if you are using GNU Parallel.

parallel convert '{}' '{.}.jpg' ::: *.png
And a similar syntax for some other versions (including debian).

parallel convert '{}' '{.}.jpg' -- *.png
