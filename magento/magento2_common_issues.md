Work in progress
( merging with multiple docs )



#### Run Magento commands from any directory

```
export PATH=$PATH:/vagrant/public/bin/
```


#### Magento Index is invalid

To manually reindex the magento tables

There isnt a simple way in the Magento2  admin area to force reindexing.
You will need to  run the reindex command from the terminal

```
php bin/magento indexer:reindex
```


#### Accidentally deleted Magento Database


To check magento database status

```
setup:db:status
```

To reinstall the databse schema
```
magento setup:db-schema:upgrade
```


#### The page shows up but all assets are missing

This one can be tricky. After running  every command available in magento you  will learn that in the 'default' and 'developer' mode static content deployment is not required. This means it will not do anything when you run the command and it will give you very little feedback.  

To fix this problem you have  ( MAYBE )  to add the -f [--force] command no make  magento move over the files that it think you don't need.

```
magento setup:static-content:deploy -f
```

If you are working in the VM you may need need to run this version of the command

```
 php -d memory_limit=1024M bin/magento setup:static-content:deploy -f
```



After this you will need to compile magento setup
once again. Run

```
magento setup:di:compile
```

OR the problem can be caused by the apache server rules.

See this page on magento for background.

After installing, images and stylesheets do not load; only text displays, no graphics

http://devdocs.magento.com/guides/v2.2/install-gde/trouble/tshoot_no-styles.html


#### Run Magento commands from any directory

```
export PATH=$PATH:/vagrant/public/bin/
```

Important: Apache rewrites and .htaccess

http://devdocs.magento.com/guides/v2.2/install-gde/prereq/apache.html#apache-help-rewrite


```
<Directory /var/www/>
Options Indexes FollowSymLinks MultiViews
AllowOverride [value from Apache site]
Order allow,deny
Allow from all
<Directory>
```


__*When nothing else works, start over__

Kill it and start over, Magento2 offers a fairly safe fallback. The uninstall command resets the database and project config to the initial setup stage and if you have any backups or modules stored outside the project they can be reinstalled easily through `composer update`

In Magento2 everything is a module. So your files or data should be safe independent of the magento2 core installation.

Be sure to keep this in mind while you build out your modules.

```
magento setup:uninstall
```

Backup often and keep good notes.



---





#### Composer install failed

If composer install fails due to 'the requested PHP extension soap is missing'

```
sudo yum install -y php-soap
```

#### Run magento commands from any directory

```
export PATH=$PATH:/vagrant/public/bin/
```


#### Magento Index is invalid

To manually reindex the magento tables

There isnt a simple way in the Magento2  admin area to force reindexing.
You will need to  run the reindex command from the terminal

```
php bin/magento indexer:reindex
```

#### PHP out of memory error


To get current memory limit run

```
php -r "echo ini_get('memory_limit').PHP_EOL;"
```

To run a single command with a higher memory limit

```
php -d memory_limit=512M /vagran/public/magento  <some_command>
```

Check https://getcomposer.org/doc/articles/troubleshooting.md#memory-limit-errors for more info on how to handle out of memory errors.




#### Accidentally deleted Magento Database


To check magento database status

```
setup:db:status
```

To reinstall the databse schema
```
magento setup:db-schema:upgrade
```



#### The page shows up but all assets are missing

This one can be tricky. After running  every command available in magento you  will learn that in the 'default' and 'developer' mode static content deployment is not required. This means it will not do anything when you run the command and it will give you very little feedback.

To fix this problem you have  ( MAYBE )  to add the -f [--force] command no make  magento move over the files that it think you don't need.

```
magento setup:static-content:deploy -f

```

If you are working in the VM you may need need to run this version of the command

```
 php -d memory_limit=1024M bin/magento setup:static-content:deploy -f
```



After this you will need to compile magento setup
once again. Run

```
magento setup:di:compile
```

OR the problem can be caused by the apache server rules.

See this page on magento for background.

After installing, images and stylesheets do not load; only text displays, no graphics

http://devdocs.magento.com/guides/v2.2/install-gde/trouble/tshoot_no-styles.html


Important: Apache rewrites and .htaccess

http://devdocs.magento.com/guides/v2.2/install-gde/prereq/apache.html#apache-help-rewrite

\*Refer to Magento_Help/magento2_server_config.md @apache2_settings

#### REINSTALL

__*When that doesnt work, one built in command is guaranteed to work__


Kill it and start over.


```
magento setup:uninstall
```

Magento uninstall rewinds you back to the initial setup screen.

Backup often and keep good notes.




#### AFTER REINSTALL MAGENTO ADMIN AND/OR HOME RESULTS IN 404 ERROR

 https://community.magento.com/t5/Installing-Magento-2/Magento-2-Localhost-Admin-url-returning-404-error/td-p/21435

This usually happens due to a misplaced .htacess file that seems go missing
during the reinstall process.

To fix copy the .htaccess file from /project/magento_install/pub/.htacces down to the magento root folder.

```
cp pub/.htacess .
```





#### Vagrant Up Issues

__Memory Issues__

Base install and compilation has worked with as little as 1G dedicated to the the vm, but you may have difficulty working on a larger project if your machine does not meet this requirement.

Adjust the vm.config settings in the Vagrantfile before you initialize the virtual machine.


__Synced Folder Does Not Exist__

Make sure that the public folder or any others in your Host project folder exist before you run vagrant up or it can result in error.


__Chef and Centos7 Guest Additions Bug__

Virtualbox and Chef require guest editions, but the `rhel/centos` box does not not include them with the distribution box.

To install `vagrant-vbguest` plugin.

```
vagrant plugin install vagrant-vbguest
```

Vagrant plugins install globally, to uninstall the plugin run
```
vagrant plugin uninstall vagrant-vbguest
```

Plugin Reference: [https://github.com/dotless-de/vagrant-vbguest](https://github.com/dotless-de/vagrant-vbguest)


### Magento Install Issues

__Composer Failed Due To Missing Dependencies__

A common issue causing install to fail has been 'the requested PHP extension *soap* is missing'.

If this one or more php extensions is missing attempt to install them using the yum package manager.

Example:
```
sudo yum install -y php-soap
```

If you package is not found right away try updating the repository list

```
sudo yum update
```

and searching for the extension

```
sudo yum search missing_name
```

```
yum list | grep missing_name
```


__PHP Ran Out Of Memory Error__

To print the current memory limit

```
php -r "echo ini_get('memory_limit').PHP_EOL;"
```

You can run a single command with a higher memory limit from the command line.

```
php -d memory_limit=512M /vagran/public/magento <some_command>
```

Check [Composer Troubleshooting - Memory limit errors](https://getcomposer.org/doc/articles/troubleshooting.md#memory-limit-errors) for more info on handling out of memory errors.

---

## Magento Tips and Hints


__List all Magento cli commands__

```
vagrant/bin/magento list
```

__Run Magento commands from any directory__
```
export PATH=$PATH:/vagrant/public/bin/
```

Additionally you can add the path in vagrant user ~/.bash_profile file for persistence.



#### INSTALL OPTIONAL MAGENTO STARTER DATA MODULES


Note that once the data is installed, the documentation says that it can NOT be removed.

Only install the sample data on development sites.


To install Magento sample data
```
php bin/magento sampledata:deploy
```

After installing the sample data you have to run Magento upgrade for it to take effect

```
php bin/magento setup:upgrade
```


After upgrade you may also need to recompile assets, to do this run.

```
php bin/magento setup:di:compile
```


__\*Good example modules to have a look at when getting started include:__
- sample-module-theme
- sample-module-webflow
- sample-module-newpage
- sample-module-modifycontent
- sample-module-minimal
- sample-module-form-uicomponent
- sample-module-command
- sample-module-sample-scss


---

### INSTALL OPTIONAL MAGENTO2 SAMPLE MODULES EXAMPLE MODULES

Samples modules are available in the Magento Repository for many types of development packages.

If missing you can add the magento core repo to the composer config.

```
composer config repositories.magento composer http://repo.magento.com/
```

After that you can install any of the modules to or you can install `sample-bundle-all` to get everything.


Currently only compatible with Magneto 2.0.0 for composer install but the example modules are still available on github.

Ref: https://github.com/magento/magento2-samples

---
