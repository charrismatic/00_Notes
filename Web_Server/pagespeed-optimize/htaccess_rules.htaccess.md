<IfModule mod_expires.c>

############################################
## Add default Expires header
## http://developer.yahoo.com/performance/rules.html#expires

    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
    ExpiresByType image/gif "access plus 1 month"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType text/x-javascript "access plus 1 month"
    ExpiresByType application/x-shockwave-flash "access plus 1 month"
    ExpiresByType image/x-icon "access plus 1 year"
    ExpiresDefault "access plus 2 days"
    ExpiresDefault "access plus 1 year"

</IfModule>

##############################################
## ENABLE COMPRESSION
###############################

<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/javascript text/css application/javascript
</IfModule>



#######################################
## MORE CACHE DETAILED OPTIONS
#
## Media: images, video, audio
#  ExpiresByType image/gif                 "access plus 1 month"
#  ExpiresByType image/png                 "access plus 1 month"
#  ExpiresByType image/jpeg                "access plus 1 month"
#  ExpiresByType video/ogg                 "access plus 1 month"
#  ExpiresByType audio/ogg                 "access plus 1 month"
#  ExpiresByType video/mp4                 "access plus 1 month"
#  ExpiresByType video/webm                "access plus 1 month"
#
## HTC files  (css3pie)
#  ExpiresByType text/x-component          "access plus 1 month"
#
## Webfonts
#  ExpiresByType application/x-font-ttf    "access plus 1 month"
#  ExpiresByType font/opentype             "access plus 1 month"
#  ExpiresByType application/x-font-woff   "access plus 1 month"
#  ExpiresByType image/svg+xml             "access plus 1 month"
#  ExpiresByType application/vnd.ms-fontobject "access plus 1 month"
#
## CSS and JavaScript
#  ExpiresByType text/css                  "access plus 1 year"
#  ExpiresByType application/javascript    "access plus 1 year"
