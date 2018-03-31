# Magento 2.2.x TECHNOLOGY REQUIREMENTS AND CONFIG


## QUICK LINKS

* [Magento 2.0.x technology stack requirements](http://devdocs.magento.com/guides/v2.2/install-gde/system-requirements-tech.html)
* [MySQL Guildlines](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/mysql.html)
* [Required PHP settings](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-settings.html)
* [Optional Setup](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/optional.html)
* [SELinux and iptables](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/security.html)
* [Install, configure, verify memcached on CentOS](http://devdocs.magento.com/guides/v2.2/config-guide/memcache/memcache_centos.html)
[Use Redis for the Magento page and default cache](http://devdocs.magento.com/guides/v2.2/config-guide/redis/redis-pg-cache.html)
[Apache Setup](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/apache.html)


---

_\*Skip below if you have not set up your Magento2 Server Environment Yet*_

---


## PERFORMANCE AND TUNING

[Best performance for Magento 2 development](https://www.yireo.com/blog/1842-best-performance-for-magento-2-development)


__1.File System__
- Don't use the Vagrant shared folder solution.
- Use NFS, Unison or dockersync.
- SSHFS is slower than the 3 above.

__2.Webserver__
- Use Nginx.
- Don't use Apache.
- Don't use anything lower than PHP 7.
- Install Zend OPCache on top of PHP 7.
- In most cases it is already installed by default, but it might be disabled.
- Make sure Zend OPCache is enabled.
- Don't turn off timestamp validation, because you are going to change files.
- Increase the memory usage of Zend OPCache a bit.

__3.MySQL__
- Increase `query_cache_size`
- Remember \*this tricks is for development
- On production spend time on tuning the InnoDB settings correctly
- Too much cache and it will cause CPU lockup when the cache is flushed
- It is best to keep this value between 32Mb and 256Mb on production
- For development I set it to be 1Gb
- CPU freeze only affects the developer and it will only last a few seconds

__4.Cache Pages with Redis__
- Its common to disable caching in development
- If you are experienced keep all caches enabled and keep track that some changes will require refreshing the cache.
- It will also help you troubleshoot caching issues in live sites
- If you spend most of the time in PHP, caching does not affect you.
- Keep the Full Page Cache disabled though
- Disable the Block Cache, if you are not sure
- To use Redis Cache configure the app/etc/env.php file

__5.Memory and SSD__
- Give Magento plenty of memory
- Most of the tricks above rely on your machine having plenty of memory
- A laptop or desktop of 4Gb will be just enough, at least 8Gb is reccommended
- Use SSD storage. SSD is much much faster than a regular HDD.
- You can also tune your filesystem a little bit by removing logging of access times (noatime)

__6.Keep Magento 2 Updated__
- There are still really slow tasks - Grunt/gulp compilation of LESS files, static view file processing, DI compilation
- Magento is working on improving this, keeping up-to-date with composer is definitely recommended
- We've seen real changes between 2.0 and 2.1, and expect more  performance to come from upcoming 2.2 release


---

## PACKAGE SETTINGS

#### Magento2 Server Requirements

Memory requirement: 2GB (min)

---

#### PACKAGE MANAGEMENT

__Required:__
- Composer - (latest stable version)

_Optional:_
- NodeJS
- Grunt / Gulp

---

#### WEB SERVER SETTINGS

__Required:__
- Apache2 - 2.2 or 2.4
- ApacheMods - mod_rewrite
- Nginx - 1.8 (or latest mainline version)  
- SSL
- SMTP

_Optional:_
- Redis - 3.2
- Varnish - 4.x or 5.0


__\*Important__

__Apache rewrites and .htaccess__


* Solving 403 (Forbidden) errors

If 403 Forbidden errors occur trying to access the Magento site, you can update your Apache configuration or your virtual host configuration to fix the problem.

Note the last line is different Apache 2.4 or 2.2
```
<Directory /var/www/>
	Options Indexes FollowSymLinks MultiViews
	AllowOverride <value from Apache site>
	Order allow,deny
  # Allow from all     # Apache 2.2
	Require all granted  # Apache 2.4
</Directory>
```

_Note: The preceding values for Order might not work in all cases. For more information, see the [Apache documentation](https://httpd.apache.org/docs/2.4/mod/mod_access_compat.html#order)._


---

#### DATABASE SETTINGS
__Required:__
- MySQL - 5.6 (MariaDB and Percona are compatible)

__\*Important__

__Magento strongly recommends you observe the following standard when you set up your Magento database__
- Magento uses MySQL database triggers to improve database access during reindexing.
- Magento does not support any custom triggers in the Magento database. This can introduce incompatibilities with future releases.
- Be aware of potential MySQL trigger limitations.
- If you use MySQL database replication, be aware that Magento ONLY supports row-based replication.

__MySQL Settings__
- If you expect to import large numbers of products, increase default value for `max_allowed_packet` ( default = 16MB ).

```
vi /etc/mysql/mysql.cnf
```
Increase the value to XX, save, exit.

If it does not exist, add it before `[mysqld_safe]`.


```
service mysql restart
```

Configure your database as appropriate for your business.

Note:

Indexers require higher `tmp_table_size` and `max_heap_table_size` values (e.g., 64M).

For optimal performance, make sure all MySQL and Magento index tables can be kept in memory (e.g., configure `innodb_buffer_pool_size`).

---

#### PHP & SERVER MOD CONFIG

__PHP SETTINGS__
- PHP - 7.0.2 or 7.0.6-7.0.x or 5.6.x

__PHP extensions__
- curl
- gd
- ImageMagick 6.3.7 (or later) or both
- intl
- mbstring
- mcrypt
- mhash
- openssl
- PDO/MySQL
- SimpleXML
- soap
- xml
- xsl
- zip

_PHP7.0 Only_
- json
- iconv


---


#### PHP Config
__Required__
- memory_limit = 2G
- date.timezone = set
- asp_tags = OFF
  
_Optional:_
- \*PHP OPcache - enabled
- \*PHP xDebug - php_xdebug2.2.0
- PHPUnit (cli) - 4.1.0

\*Recommended
  
__NTP - Network Time Protocol__
NTP synchronizes system clocks with globally available pool servers. Magento recommends using NTP for multiple Magento hosts. NTP guarantees clock synchronization, independent of time zone. Cron-related tasks depend on the server clock being accurate.
