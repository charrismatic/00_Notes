### For security reasons, Option followsymlinks cannot be overridden.

```ruby
Options +FollowSymLinks
Options +SymLinksIfOwnerMatch
```

###  mod_rewrite in use

```ruby
RewriteEngine On
RewriteCond %{HTTP_HOST} !^example.com$ [NC]
RewriteCond %{REQUEST_URI} !^/[0-9]+\..+\.cpaneldcv$
RewriteCond %{REQUEST_URI} !^/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteRule ^(.*)$ http://example.com/$1 [L,R=301]
```

## Rewrite rules to block out common exploits

__Deny access to extension xml files (uncomment out to activate)__

```
<Files ~ "\.xml$">
Order allow,deny
Deny from all
Satisfy all
</Files>
```



```ruby
RewriteCond %{QUERY_STRING} mosConfig_[a-zA-Z_]{1,21}(=|\%3D) [OR]
```

__Block out any script trying to base64_encode crap to send via URL__

```ruby
RewriteCond %{QUERY_STRING} base64_encode.*\(.*\) [OR]
```

__Block out any script that includes a `<script>` tag in URL__

```ruby
RewriteCond %{QUERY_STRING} (\<|%3C).*script.*(\>|%3E) [NC,OR]
```

__Block out any script trying to set a PHP GLOBALS variable via URL__

`RewriteCond %{QUERY_STRING} GLOBALS(=|\[|\%[0-9A-Z]{0,2}) [OR]`

__Block out any script trying to modify a _REQUEST variable via URL__

`RewriteCond %{QUERY_STRING} _REQUEST(=|\[|\%[0-9A-Z]{0,2})`

__Send all blocked request to homepage with 403 Forbidden error!__

```ruby
RewriteCond %{REQUEST_URI} !^/[0-9]+\..+\.cpaneldcv$
RewriteCond %{REQUEST_URI} !^/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteRule ^(.*)$ index.php [F,L]
```

__Webserver URL is not directly related to physical file paths__

```ruby
RewriteBase /
```


__Rewrite rules__

```ruby
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !^/index.php
RewriteCond %{REQUEST_URI} (/|\.php|\.html|\.htm|\.feed|\.pdf|\.raw|/[^.]*)$  [NC]
RewriteCond %{REQUEST_URI} !^/[0-9]+\..+\.cpaneldcv$
RewriteCond %{REQUEST_URI} !^/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteRule (.*) index.php
RewriteCond %{REQUEST_URI} !^/[0-9]+\..+\.cpaneldcv$
RewriteCond %{REQUEST_URI} !^/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},L]
```

__Compression Rules__

```ruby
<ifModule mod_gzip.c>
mod_gzip_on Yes
mod_gzip_dechunk Yes
mod_gzip_item_include file .(html?|txt|css|js|php|pl)$
mod_gzip_item_include handler ^cgi-script$
mod_gzip_item_include mime ^text/.*
mod_gzip_item_include mime ^application/x-javascript.*
mod_gzip_item_exclude mime ^image/.*
mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</ifModule>
```

__Cache Rules__

http://developer.yahoo.com/performance/rules.html#expires

```ruby
<IfModule mod_expires.c>

    ## Cache Expires Rules
    ExpiresActive On

    # Media Files
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
    ExpiresByType image/gif "access plus 1 month"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"

    # CSS and JavaScript
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType text/x-javascript "access plus 1 month"

    # Webfonts
    ExpiresByType application/x-font-ttf "access plus 1 month"
    ExpiresByType font/opentype "access plus 1 month"
    ExpiresByType application/x-font-woff "access plus 1 month"
    ExpiresByType image/svg+xml "access plus 1 month"
    ExpiresByType application/vnd.ms-fontobject "access plus 1 month"
    ExpiresByType image/x-icon "access plus 1 year"

    # Other
    ExpiresByType application/x-shockwave-flash "access plus 1 month"
    ExpiresDefault "access plus 2 days"
    ExpiresDefault "access plus 1 year"

</IfModule>

<IfModule mod_deflate.c>
    ## Use Compression
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/javascript text/css application/javascript
</IfModule>
```

__Cannonical URL__

```ruby
RewriteEngine On
RewriteCond %{HTTPS} OFF
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}
```

__Force HTTPS__
```ruby
RewriteCond %{REQUEST_URI} !^/[0-9]+\..+\.cpaneldcv$
RewriteCond %{REQUEST_URI} !^/\.well-known/pki-validation/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
RewriteEngine On 
RewriteCond %{SERVER_PORT} 80 
RewriteRule ^(.*)$ https://www.example.com/$1 [R=301,L]
```


https://stackoverflow.com/questions/13977851/htaccess-redirect-to-https-www
This answer from stack overflow 

"To first force HTTPS, you must check the correct environment variable %{HTTPS} off, but your rule above then prepends the www. Since you have a second rule to enforce www., don't use it in the first rule."

```ruby
RewriteEngine On
RewriteCond %{HTTPS} off
# First rewrite to HTTPS:
# Don't put www. here. If it is already there it will be included, if not
# the subsequent rule will catch it.
RewriteRule .* https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
# Now, rewrite any request to the wrong domain to use www.
# [NC] is a case-insensitive match
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule .* https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

About proxying
"When behind some forms of proxying, whereby the client is connecting via HTTPS to a proxy, load balancer, Passenger application, etc., the %{HTTPS} variable may never be on and cause a rewrite loop. This is because your application is actually receiving plain HTTP traffic even though the client and the proxy/load balancer are using HTTPS. In these cases, check the X-Forwarded-Proto header instead of the %{HTTPS} variable"
 This answer shows the appropriate process
https://stackoverflow.com/questions/26620670/apache-httpx-forwarded-proto-in-htaccess-is-causing-redirect-loop-in-dev-envir
