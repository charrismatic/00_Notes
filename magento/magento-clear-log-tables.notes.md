* MAGENTO LOGS GET TO BE VERY VERY BIG



** HOW TO KNOW HOW BIG THE TABLES ARE
https://stackoverflow.com/questions/9620198/how-to-get-the-sizes-of-the-tables-of-a-mysql-database

SELECT 
    table_name AS `Table`, 
    round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` 
FROM information_schema.TABLES 
WHERE table_schema = "$DB_NAME"
    AND table_name = "$TABLE_NAME";
or this query to list the size of every table in every database, largest first:

----------
OR
----------

SELECT 
     table_schema as `Database`, 
     table_name AS `Table`, 
     round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` 
FROM information_schema.TABLES 
ORDER BY (data_length + index_length) DESC;


EXAMPLE OUT
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




http://www.magikcommerce.com/blog/how-to-clean-up-your-magento-stores-database-logs-for-faster-performance/

** Cleaning Logs via Magento Admin Panel

This method is easier for non technical store owners who don’t want’ to mess directly with the Magento store’s database. To activate log cleaning option in Magento just do the following:

* Log on to your Magento Admin Panel.
* Go to System => Configuration
* On the left under Advanced click on System (Advanced = > System)
* Under system you will see “Log Cleaning” option
* Fill the desired “Log Cleaning” option values and click Save.



** Cleaning Logs via phpMyAdmin

If you are comfortable with mysql and queries then this method is more efficient and quicker than default Magento Log Cleaning tool. This method also allows your to clean whatever you like, you can even clean tables which aren’t included in default Magento’s Log Cleaning tool.

Open the database in phpMyAdmin
In the right frame, click on the boxes for the following tables:
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
Look to the bottom of the page, then click the drop down box that says “with selected” and click empty.
Click Yes on confirmation screen, and this will truncate all the selected tables.


** NOW WITH MYSQL (BE SURE YOU GET A BACKUP FIRST)
> TRUNCATE [TABLE] tbl_name


NOT MAKE IT A SCRIPT; 
https://www.crucialhosting.com/knowledgebase/magento-log-cache-maintenance


<?php
/**
 * Magento Maintenance Script
 *
 * @version    3.0.1
 * @author     Crucial Web Hosting <sales@crucialwebhost.com>
 * @copyright  Copyright (c) 2006-2013 Crucial Web Hosting, Ltd.
 * @link       http://www.crucialwebhost.com  Crucial Web Hosting
 */

switch($_GET['clean']) {
    case 'log':
        clean_log_tables();
    break;
    case 'var':
        clean_var_directory();
    break;
}

function clean_log_tables() {
    $xml = simplexml_load_file('./app/etc/local.xml', NULL, LIBXML_NOCDATA);
    
    if(is_object($xml)) {
        $db['host'] = $xml->global->resources->default_setup->connection->host;
        $db['name'] = $xml->global->resources->default_setup->connection->dbname;
        $db['user'] = $xml->global->resources->default_setup->connection->username;
        $db['pass'] = $xml->global->resources->default_setup->connection->password;
        $db['pref'] = $xml->global->resources->db->table_prefix;
        
        $tables = array(
            'aw_core_logger',
            'dataflow_batch_export',
            'dataflow_batch_import',
            'log_customer',
            'log_quote',
            'log_summary',
            'log_summary_type',
            'log_url',
            'log_url_info',
            'log_visitor',
            'log_visitor_info',
            'log_visitor_online',
            'index_event',
            'report_event',
            'report_viewed_product_index',
            'report_compared_product_index',
            'catalog_compare_item',
            'catalogindex_aggregation',
            'catalogindex_aggregation_tag',
            'catalogindex_aggregation_to_tag'
        );
        
        mysql_connect($db['host'], $db['user'], $db['pass']) or die(mysql_error());
        mysql_select_db($db['name']) or die(mysql_error());
        
        foreach($tables as $table) {
            @mysql_query('TRUNCATE `'.$db['pref'].$table.'`');
        }
    } else {
        exit('Unable to load local.xml file');
    }
}

function clean_var_directory() {
    $dirs = array(
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
    );
    
    foreach($dirs as $dir) {
        exec('rm -rf '.$dir);
    }
}

?>


IF NEEDED SET THIS UP AS A CRON TASK
"curl -s -o /dev/null http://www.domain.com/cleanup.php?clean=log"
OR
"curl -s -o /dev/null http://www.domain.com/cleanup.php?clean=var"

A KEY SHOULD BE ADDED TO THE URL PARAMETER TO PREVENT THIS FROM BEING RUN UNWANTEDLY 

(THIS COULD BE SET UP THROUGH AN SFP MAGENTO DASHBOARD
