# Magento 1.9 Shortcuts and Troubleshooting Notes

For most things you can bypass the admin login panel and several layers of menus  
directly from the command line or mysql tool.  You an also create aliases, 
scripts for these commands so you don't have to continue looking them up.

These can also be good to know if you've updated a site and can't get back into 
the admin area or get stuck in a redirect loop.

There are many resources online for php scripts that people have made to run exports,
imports, backups, and handle otherwise tedious or time consuming tasks.

---

## Template Path Hints using MySQL

* __Turn ON template hints query__

```
UPDATE core_config_data SET value = '0' WHERE path LIKE '%template_hints%';
```


* __Turn OFF template hints query__

```
UPDATE core_config_data SET value = '0' WHERE path LIKE '%template_hints%';
```

---

## Working with the cache

* __Disable ALL Magento cache from MySQL__

```
UPDATE `core_cache_option` SET value=0;
```

* __Set Cache Rules Individually__

```
select * from core_cache_option;
```

```
+-------------+-------+
| code        | value |
+-------------+-------+
| block_html  |     1 |
| collections |     1 |
| config      |     1 |
| config_api  |     1 |
| config_api2 |     1 |
| eav         |     1 |
| full_page   |     0 |
| layout      |     1 |
| translate   |     1 |
+-------------+-------+
```

__From Terminal__

* Disable Cache

```
mysql -h $DBHOST -u $DBUSER -p$DBPASS -e "UPDATE core_cache_option SET value=0;" $DBNAME
```

* Enable Cache 

```
mysql -h $DBHOST -u $DBUSER -p$DBPASS -e "UPDATE core_cache_option SET value=1;" $DBNAME
```

_Cache Enable/Disable/Clear Script:_ https://gist.github.com/seangreen/d9557726b479e066d71f


### Clearing the temp & cache files

* Main site cache 

```
rm -rf <project>/public_html/var/cache/*
```

* Clearing session cache

```
 rm -rf var/session/*
```

__Other cache directories with that can become very large__

* Logs: `./public_html/var/log`

Logs files can grow out of control to multiple gigabytes if you do not set the 
log clearing rulescorrectly. Make sure to enable the cron task in the admin panel

* Media: `./public_html/media/catalog/product/cache/`

Be careful pulling in media files from a server.  Magento produces a lot of cache
files for media resources. You could be waiting a very long time for a backup 
to finish if  you don't exclude those directories first.

* Known cache locations

```
public_html/downloader/.cache/
public_html/downloader/pearlib/cache/
public_html/downloader/pearlib/download/
public_html/media/css/
public_html/media/css_secure/
public_html/media/import/
public_html/media/js/
public_html/var/cache/
public_html/var/locks/
public_html/var/log/
public_html/var/report/
public_html/var/session/
public_html/var/tmp/
```

---

## Update Magento's Base_Uri from MySQL

https://magento.stackexchange.com/questions/39752/how-do-i-fix-my-base-urls-so-i-can-access-my-magento-site
 
Another useful one when moving things between dev/staging/production. 

I've used these to get back into the admin area after doing database migrations

__Find the bad config records__

```
vagrant ssh
```

```
mysql -uUSERNAME -pPASSWORD 
```

```
use <project_database>;
```

```
select * from `core_config_data` where `value` like '%<www.wrong.com>%';
```

_Alternatively_

```
select * from `core_config_data` where `path` like '%_url%';
```

RESULTS: 
```
+-----------+---------+----------+-----------------------------+--------------------------+
| config_id | scope   | scope_id | path                        | value                    |
+-----------+---------+----------+-----------------------------+--------------------------+
|    817    | default |     0    | web/unsecure/base_url       | http://wrong.com/        |
|    818    | default |     0    | web/unsecure/base_link_url  | http://wrong.com/        |
|    819    | default |     0    | web/unsecure/base_skin_url  | http://wrong.com/skin/   |
|    820    | default |     0    | web/unsecure/base_media_url | http://wrong.com/media/  |
|    821    | default |     0    | web/unsecure/base_js_url    | http://wrong.com/js/     |
|    822    | default |     0    | web/secure/base_url         | https://wrong.com/       |
|    823    | default |     0    | web/secure/base_link_url    | https://wrong.com/       |
|    824    | default |     0    | web/secure/base_skin_url    | https://wrong.com/skin/  |
|    825    | default |     0    | web/secure/base_media_url   | https://wrong.com/media/ |
|    826    | default |     0    | web/secure/base_js_url      | https://wrong.com/js/    |
+-----------+---------+----------+-----------------------------+--------------------------+
```

* Update to the new url: 

https://magento.stackexchange.com/questions/80373/base-url-error-when-localhost

Use `http://127.0.0.1/` for local development

```
UPDATE `core_config_data` SET `value` = 'http://127.0.0.1/' WHERE config_id = <THE_ID>>;
```
_or_
```
UPDATE `core_config_data` SET `value` = 'http://127.0.0.1/' WHERE path = 'web/unsecure/base_url';
```

```
UPDATE `core_config_data` SET `value` = 'https://the_correct.com/' WHERE path = 'web/secure/base_url';
```

You can now set the the remaining paths to be relative to the base.
Pay close attention to the location of slashes.

```
{{base_url}}
{{base_url}}skin/
{{base_url}}media/
{{base_url}}js/
{{base_url}} 
{{base_url}}skin/
{{base_url}}media/
{{base_url}}js/
```

_THIS CONFIG WORKS ON LOCALHOST_

```
| config_id | scope     | scope_id  | path                        | value               |
|:---------:|:---------:|:---------:|:--------------------------- | :-------------------|
|   817     |  default  |        0  | web/unsecure/base_url       | http://127.0.0.1/   |
|   818     |  default  |        0  | web/unsecure/base_link_url  | {{base_url}}        |
|   819     |  default  |        0  | web/unsecure/base_skin_url  | {{base_url}}skin/   |
|   820     |  default  |        0  | web/unsecure/base_media_url | {{base_url}}media/  |
|   821     |  default  |        0  | web/unsecure/base_js_url    | {{base_url}}js/     |
|   822     |  default  |        0  | web/secure/base_url         | {{base_url}}        |
|   823     |  default  |        0  | web/secure/base_link_url    | {{base_url}}        |
|   824     |  default  |        0  | web/secure/base_skin_url    | {{base_url}}skin/   |
|   825     |  default  |        0  | web/secure/base_media_url   | {{base_url}}media/  |
|   826     |  default  |        0  | web/secure/base_js_url      | {{base_url}}js/     |
```


__\*In a production environment it may be better to set the actual url than a relative path.__



---

## Pruning bloated Magento Databases


### HOW BIG ARE MY DB TABLES 

[https://stackoverflow.com/questions/9620198/how-to-get-the-sizes-of-the-tables-of-a-mysql-database]/


```
SELECT 
    table_name AS `Table`, 
    round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` 
FROM information_schema.TABLES 
WHERE table_schema = "$DB_NAME"
    AND table_name = "$TABLE_NAME";
or this query to list the size of every table in every database, largest first:
```

OR

```
SELECT 
     table_schema as `Database`, 
     table_name AS `Table`, 
     round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` 
FROM information_schema.TABLES 
ORDER BY (data_length + index_length) DESC;
```


EXAMPLE OUTPUT
```
+-----------+---------------------------------+-----------+
| Database  | Table                           | Size (MB) |
+-----------+---------------------------------+-----------+
| fujita_f  | log_url_info                    |     21.56 |
| fujita_f  | core_url_rewrite                |     18.97 |
| fujita_f  | log_url                         |     16.55 |
| fujita_f  | log_visitor_info                |     16.55 |
| fujita_f  | log_visitor                     |     10.52 |
| fujita_f  | report_viewed_product_index     |     10.09 |
| fujita_f  | catalog_product_entity_varchar  |      9.58 |
| fujita_f  | cms_page                        |      9.56 |
| fujita_f  | catalog_product_entity_text     |      6.16 |
| fujita_f  | catalogsearch_result            |      5.55 |
| fujita_f  | dataflow_batch_import           |      3.63 |
| fujita_f  | index_event                     |      1.80 |
| fujita_f  | review_detail                   |      1.69 |
| fujita_f  | sales_flat_quote_item_option    |      1.58 |
| fujita_f  | catalog_product_entity_int      |      1.56 |
| fujita_f  | catalogsearch_fulltext          |      1.24 |
| fujita_f  | report_event                    |      1.03 |
| fujita_f  | catalog_product_entity_datetime |      1.00 |
| fujita_f  | catalog_category_product_index  |      1.00 |
```

 

## VARIOUS DB CLEANING METHODS 

http://www.magikcommerce.com/blog/how-to-clean-up-your-magento-stores-database-logs-for-faster-performance/

__Cleaning Logs via Magento Admin Panel_

* Log on to your Magento Admin Panel.
* Go to System => Configuration
* On the left under Advanced click on System (Advanced = > System)
* Under system you will see “Log Cleaning” option
* Fill the desired “Log Cleaning” option values and click Save.


__Cleaning Logs Directly__

Clean the following tables

```
dataflow_batch_export
dataflow_batch_import
log_customer
log_quote
log_summary
log_summary_type
log_url
log_url_info
log_visitor
log_visitor_info
log_visitor_online
report_viewed_product_index
report_compared_product_index
report_event
```

_Log clearing script:_ https://www.crucialhosting.com/knowledgebase/magento-log-cache-maintenance


---

Data Import Export

IMPORTANT:
in case you need the original content of some static blocks or pages
XML files with all static blocks and pages can be found in the following directory:
app/code/local/<package>/<theme>/etc/import/

There is a tool in the config interface to generate custom export / import profiles 
