<h2>Apache</h2>
<h3>Logs</h3>
<p>sudo tail -f /var/log/apache2/error.log</p>
<p>sudo tail -f /var/log/apache2/access.log</p>
OR
<p>sudo tail -f /var/log/httpd/error_log</p>
<p>sudo tail -f /var/log/httpd/access_log</p>

<h3>Restart apache</h3>
sudo service apache2 restart

<h3>Set localhost to document root</h3>
/etc/apache2/sites-enabled/000-default.conf





<h2>Vagrant</h2>
<h3>Fix Sendfile Error</h3>
<?php
echo "<pre>";
echo "\$bashlaunch = <<SCRIPT" . "<br>";
echo 'sed -e "s/#EnableSendfile off/EnableSendfile off/" /etc/httpd/conf/httpd.conf > /tmp/httptmp'. "<br>";
echo "&#9;cat /tmp/httptmp > /etc/httpd/conf/httpd.conf". "<br>";
echo "&#9;/etc/init.d/httpd restart". "<br>";
echo "SCRIPT". "<br>";
echo '&#9;config.vm.provision "shell",'. "<br>";
echo "&#9;inline: \$bashlaunch# FIX PROBLEM WITH FILES NOT SENDING". "<br>";
echo "</pre>";
?>

<h3>Fix Problem with SSH</h3>
<p>config.ssh.insert_key = false</p>

<h2>MySQL</h2>
<h3>Dump DB to File</h3>
<p>mysqldump -P 3306 -h [ip_address] -u [uname] -p [pass] db_name > db_backup.sql</p>

<h3>Import SQL File into DB</h3>
<p>mysql -P 3306 -h [ip_address] -u [uname] -p [pass] db_name < db_import.sql</p>

<h3>Get Size of Tables in DB</h3>
<pre>
SELECT
&#9;table_schema as `Database`,
&#9;table_name AS `Table`,
&#9;round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB`
FROM information_schema.TABLES
ORDER BY (data_length + index_length) DESC;
</pre>

<h2>BASH</h2>
<h3>Optimize Images in Folder</h3>
<pre>
DIRECTORY = optimzed
if [ ! -d "$DIRECTORY" ]; then
&#9;mkdir optimized
fi

for f in *.png
do
&#9;echo "${f%%.*}"
&#9;convert $f -sample 1920x -quality 80 ./optimized/"${f%%.*}".jpg ; done
done
</pre>

<h3>Bulk Rename Files</h3>
<pre>
<strong>rename</strong> - Renames a file
<strong>replace</strong> - String-replace utility
rename "s/SEARCH/REPLACE/g"  *.jpg

EX 1: Move to same location, new name
for f in *.png; do mv "$f" "${f#image}"; done

EX 2: With find tool and sed
find . -type f -name '*.jpg' | while read FILE ; do
&#9;newfile="$(echo ${FILE} | sed -e 's/SEARCH/REPLACE/')" ;
&#9;mv "${FILE}" "${newfile}" ;
done

EX 3: Using string replacement
rename "s/SEARCH/REPLACE/g"  *.jpg
</pre>


<h2>Linux</h2>
<h3>List installed pacakges</h3>
<p>sudo dpkg -l | grep [packagename]</p>

<h2>.htaccess Rules</h2>
<pre>
&lt;IfModule mod_expires.c&gt;
############################################
## Cache Expires Rules
&#9;ExpiresActive On
# Media Files
&#9;ExpiresByType image/jpg "access plus 1 month"
&#9;ExpiresByType image/jpeg "access plus 1 month"
&#9;ExpiresByType image/gif "access plus 1 month"
&#9;ExpiresByType image/png "access plus 1 month"
&#9;ExpiresByType application/pdf "access plus 1 month"

# CSS and JavaScript
&#9;ExpiresByType text/css "access plus 1 month"
&#9;ExpiresByType text/javascript "access plus 1 month"
&#9;ExpiresByType text/x-javascript "access plus 1 month"

# Webfonts
&#9;ExpiresByType application/x-font-ttf "access plus 1 month"
&#9;ExpiresByType font/opentype "access plus 1 month"
&#9;ExpiresByType application/x-font-woff "access plus 1 month"
&#9;ExpiresByType image/svg+xml "access plus 1 month"
&#9;ExpiresByType application/vnd.ms-fontobject "access plus 1 month"
&#9;ExpiresByType image/x-icon "access plus 1 year"

# Other
&#9;ExpiresByType application/x-shockwave-flash "access plus 1 month"
&#9;ExpiresDefault "access plus 2 days"
&#9;ExpiresDefault "access plus 1 year"
&lt;/IfModule&gt;

&lt;IfModule mod_deflate.c&gt;
############################################
## Use Compression
&#9;AddOutputFilterByType DEFLATE text/html text/plain text/xml text/javascript text/css application/javascript
&lt;/IfModule&gt;
</pre>
