# Wget - The non-interactive network downloader

more: 
The Ultimate Wget Download Guide With 15 Awesome Examples 
http://www.thegeekstuff.com/2009/09/the-ultimate-wget-download-guide-with-15-awesome-examples
 

### USAGE

```
wget [option]... [URL]...

```


### EXAMPLES
```
wget -r --tries=10 http://fly.srk.fer.hr/ -o log
wget -drc <URL> 
wget -o log -- -x
wget -X " -X /~nobody,/~somebody
```

### OPTIONS
```
-b 
  --background
-e command 
  --execute command
-o logfile 
  --output-file=logfile
-a logfile 
  --append-output=logfile
-d 
  --debug
-q 
  --quiet
-v 
  --verbose
-nv 
  --no-verbose

--report-speed=type

-i file 
  --input-file=file
  --force-html is not specified, then file should consist of a series of URLs, one per line.
  --input-metalink=file
  --keep-badhash
  --metalink-over-http
  --metalink-index=number
  --preferred-location
-F 
  --force-html
-B URL 
  --base=URL
  --config=FILE
  --rejected-log=logfile
```

### Download Options
```
--bind-address=ADDRESS
--bind-dns-address=ADDRESS
--dns-servers=ADDRESSES
-t number
--tries=number
-O file
--output-document=file
-nc
  --no-clobber
  --backups=backups
-c
   --continue
  --start-pos=OFFSET
  --start-pos has higher precedence over --continue.  When --start-pos and --continue are both specified,
  --progress=type
  --progress=type:parameter1:parameter2.
  --progress=bar:force:noscroll.
  --show-progress
  
-N
  --timestamping
  --no-if-modified-since
  --no-use-server-timestamps
  --no-use-server-timestamps option has been provided.

-S 
  --server-response
  --spider

-T seconds
 --timeout=seconds
  --connect-timeout, and --read-timeout, all at the same time.
  --dns-timeout=seconds
  --connect-timeout=seconds
  --read-timeout=seconds
  --limit-rate=amount
  --limit-rate=2.5k is a legal value.

-w seconds
  --wait=seconds
  --waitretry=seconds
  --random-wait
  --no-proxy
  
-Q quota
  --quota=quota
  --no-dns-cache
  --restrict-file-names=modes
-4 
  --inet4-only
-6 
  --inet6-only

--prefer-family=none/IPv4/IPv6
--retry-connrefused
--user=user
--password=password
--http-password options for HTTP connections.
--ask-password
--use-askpass=command
--no-iri
--local-encoding=encoding
--remote-encoding=encoding
--unlink
```

### Directory Options
```
-nd 
  --no-directories
-x 
  --force-directories
-nH 
  --no-host-directories
  --protocol-directories
  
  --cut-dirs=number
    No options        -> ftp.xemacs.org/pub/xemacs/
    -nH               -> pub/xemacs/
    -nH --cut-dirs=1  -> xemacs/
    -nH --cut-dirs=2  -> .
    --cut-dirs=1      -> ftp.xemacs.org/xemacs/

-P.  However, unlike -nd, --cut-dirs does not lose with subdirectories---for instance, with -nH
--cut-dirs=1, a beta/ subdirectory will be placed to xemacs/beta, as one would expect.
-P prefix
--directory-prefix=prefix
```

### HTTP Options
```
--default-page=name

-E
  --adjust-extension
  --http-user=user
  --http-password=password
  --no-http-keep-alive
  --no-cache
  --no-cookies
  --load-cookies file
  --save-cookies file
  --keep-session-cookies
  --ignore-length
  --header=header-line
  --max-redirect=number
  --proxy-user=user
  --proxy-password=password
  --referer=url
  --save-headers

-U agent-string
  --user-agent=agent-string
  --post-data=string
  --post-file=file
  --save-cookies will not save them (and neither will browsers) and the cookies.txt file will be empty.  In
  --method=HTTP-Method
  --method as the HTTP Method to the server.
  --body-data=Data-String
  --body-file=Data-File
  --method.  --body-data sends string as data, whereas --body-file sends the contents of file.  Other than
  --post-data are followed.
  --content-disposition
  --content-on-error
  --trust-server-names
  --auth-no-challenge
  --retry-on-http-error=code[,code,...]

HTTPS (SSL/TLS) Options
--secure-protocol=protocol
--https-only
--no-check-certificate
--certificate=file
--certificate-type=type
--private-key=file
--private-key-type=type
--ca-certificate=file
--ca-directory=directory
--crl-file=file
--pinnedpubkey=file/hashes
--random-file=file

```

### EXAMPLES 
```
wget https://raw.github.com/colmjude/Projectus/master/_js/script.js -O assets/script.js
wget https://raw.github.com/colmjude/Projectus/master/_naked.html -O index.html
``` 
    
Download all the URLs mentioned in the url-list.txt file

# cat url-list.txt | xargs wget –c

