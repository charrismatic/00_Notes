MAGENTO NOTES AND SOLUTIONS TO COMMON PROBLEMS

1. DISABLE MAGENTO CACHE - FROM MYSQL (IF YOU CAN'T GET INTO THE ADMIN AREA)

REF: ttps://stackoverflow.com/questions/18542559/magento-disable-cache-from-database 


* SET ALL CACHE OPTIONS TO 0 IN THE DATABASE
----
UPDATE `core_cache_option` SET value=0;
----


* MAKE SURE TO DELETE YOUR ./var/cache folder
---
rm -rf <from the appropriate folder>/var/cache/*
---



2. FIX MAGENTO HARD CODED PATHS DURING MIGRATION - FROM MYSQL 
REF: https://magento.stackexchange.com/questions/39752/how-do-i-fix-my-base-urls-so-i-can-access-my-magento-site

TABLE: 'core_config_data'

EXAMPLE TARGET SETTINGS:
PATH                         VALUE
web/unsecure/base_url        http://www.example.com/
web/unsecure/base_link_url   {{unsecure_base_url}}
web/unsecure/base_skin_url   {{unsecure_base_url}}skin/
web/unsecure/base_media_url  {{unsecure_base_url}}media/
web/unsecure/base_js_url     {{unsecure_base_url}}js/
web/secure/base_url         https://www.example.com/
web/secure/base_link_url    {{secure_base_url}}
web/secure/base_skin_url    {{secure_base_url}}skin/
web/secure/base_media_url   {{secure_base_url}}media/
web/secure/base_js_url      {{secure_base_url}}js/


** BEFORE **

mysql> select * from `core_config_data` where `value` like '%www.klsecurity.com%';
or
mysql> select * from `core_config_data` where `path` like '%_url%';

+-----------+---------+----------+-----------------------------+-----------------------------------+
| config_id | scope   | scope_id | path                        | value                             |
+-----------+---------+----------+-----------------------------+-----------------------------------+
|       817 | default |        0 | web/unsecure/base_url       | http://wrong.com/        |
|       818 | default |        0 | web/unsecure/base_link_url  | http://wrong.com/        |
|       819 | default |        0 | web/unsecure/base_skin_url  | http://wrong.com/skin/   |
|       820 | default |        0 | web/unsecure/base_media_url | http://wrong.com/media/  |
|       821 | default |        0 | web/unsecure/base_js_url    | http://wrong.com/js/     |
|       822 | default |        0 | web/secure/base_url         | https://wrong.com/       |
|       823 | default |        0 | web/secure/base_link_url    | https://wrong.com/       |
|       824 | default |        0 | web/secure/base_skin_url    | https://wrong.com/skin/  |
|       825 | default |        0 | web/secure/base_media_url   | https://wrong.com/media/ |
|       826 | default |        0 | web/secure/base_js_url      | https://wrong.com/js/    |
+-----------+---------+----------+-----------------------------+-----------------------------------+


* EXAMPLE UPDATE QUERIES 
----
UPDATE `core_config_data` SET `value` = 'http://127.0.0.1/' WHERE config_id = 817;
----
UPDATE `core_config_data` SET `value` = '{{base_path}}js' WHERE config_id = 820;
----


use fujita_f
UPDATE `core_config_data` SET `value` = 'http://127.0.0.1/' WHERE config_id = 817;





https://127.0.0.1/' WHERE config_id = 822;






** SET http://127.0.0.1/ FOR LOCALHOST 
REF: https://magento.stackexchange.com/questions/80373/base-url-error-when-localhost


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
