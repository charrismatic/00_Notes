rsync --omit-dir-times
 --no-owner and --no-group flags and a --checksum flag

rsync -avz --no-owner --no-group --exclude="error_log" --exclude=".htaccess" --exclude="wp-config.php" --omit-dir-times --checksum html/ /var/www/dev/html/

