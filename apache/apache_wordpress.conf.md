# SET URL REWRITES FOR WORDPRESS



# STARTING WITH DEFAULT.CONF SETUP

```
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/public_html
    ServerName wordpress_site
```

ENABLE OVERRIDES IN THE PUBLIC_HTML FOLDER
```
    <Directory /var/www/public_html/>
        AllowOverride All
    </Directory>
```
 # ... 
 
 
# make sure that the rewrite module is enabled

```
sudo a2enmod rewrite
```
 
