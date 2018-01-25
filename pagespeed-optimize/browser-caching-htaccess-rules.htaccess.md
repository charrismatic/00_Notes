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
############################################
## Use Compression
	AddOutputFilterByType DEFLATE text/html text/plain text/xml text/javascript text/css application/javascript
</IfModule>
