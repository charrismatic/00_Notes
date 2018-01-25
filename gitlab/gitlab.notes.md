https://docs.gitlab.com/omnibus/settings/nginx.html#nginx-settings
IMAGES DONT LOAD
# Warning 
#
# To ensure that user uploads are accessible your Nginx user (usually www-data) should be added 
# to the gitlab-www group. This can be done using the following command:
#
# sudo usermod -aG gitlab-www www-data
# 



Templates


MAIN COMMANDS:
sudo gitlab-ctl
sudo gitlab-ctl reconfigure -- TO UPDATE CHANGES
sudo gitlab-ctl restart

NOTE:  CAN'T USE GIT PUSH/PULL WITH THE SAME ACCOUNT AS THE WEBSITE OWNER. -- USER DEPLOY KEY INSTEAD AND CREATE A NEW ACCOUNT
#http://askubuntu.com/questions/762541/ubuntu-16-04-ssh-sign-and-send-pubkey-signing-failed-agent-refused-operation/762558#762558

--SHORT VERSION -- CANT BE SYSTEM / OWNER / AND USER ALL AT THE SAME TIME, USE A DEPLOY KEY, AND MAKE A NON OWNER USER
https://bugs.launchpad.net/serverguide/+bug/1569019


# http://localhost/gitlab/help/ssh/README

Note: Log into root user on the machine, create ssh-key, add to root/system ssh-add keyring
----> upload key to admin/owner user account on gitlab/repositories/deploy key (this is now the deploy key)
 
l
# SOME SCRIPT TO HELP WITH THIS
#https://github.com/dainnilsson/scripts/blob/master/base-install/gpg.sh

**If on Git clone you are prompted for a password like git@gitlab.com's password:
something is wrong with your SSH setup.

**Ensure that you generated your SSH key pair correctly and added the public SSH
key to your GitLab profile
**Try manually registering your private SSH key using ssh-agent as documented 
earlier in this document
**Try to debug the connection by running ssh -Tv git@example.com
(replacing example.com with your GitLab domain)

http://localhost/gitlab/help/ssh/README
note: Deploy keys

Deploy keys allow read-only or read-write (if enabled) access to one or
multiple projects with a single SSH key pair.

This is really useful for cloning repositories to your Continuous
Integration (CI) server. By using deploy keys, you don't have to setup a
dummy user account.

If you are a project master or owner, you can add a deploy key in the
project settings under the section 'Deploy Keys'. Press the 'New Deploy
Key' button and upload a public SSH key. After this, the machine that uses
the corresponding private SSH key has read-only or read-write (if enabled) 
access to the project.

You can't add the same deploy key twice with the 'New Deploy Key' option.
If you want to add the same key to another project, please enable it in the
list that says 'Deploy keys from projects available to you'. All the deploy
keys of all the projects you have access to are available. This project
access can happen through being a direct member of the project, or through
a group.

Deploy keys can be shared between projects, you just need to add them to each
project.


# GITLAB SETTIGNS 
SOME of GitLab's features can be customized through gitlab.yml. 
Changing gitlab.yml and application.yml settings
https://docs.gitlab.com/omnibus/settings/gitlab.yml.html

path: 
etc/gitlab/gitlab.rb
var/opt/gitlab/gitlab-rails/etc/gitlab.yml
### https is here, http settings, host name, email config, gitlab pages enables, gravatar
### FILE PATHS are set here, backups, repo seettings, shell-settings

Adding a new setting to gitlab.yml 
Don't forget to update the following 3 files when adding a new setting:

the gitlab.rb.template file to expose the setting to the end user via /etc/gitlab/gitlab.rb
the default.rb file to provide a sane default for the new setting
the gitlab.yml.example file to actually use the setting's value from gitlab.rb
https://gitlab.com/gitlab-org/gitlab-ce/blob/master/config/gitlab.yml.example


# MAINTENENCE AND TASKS FOR MANAGING THE SITE
https://docs.gitlab.com/ce/administration/raketasks/maintenance.html

# LOGS
#https://docs.gitlab.com/omnibus/settings/logs.html

# CONFIG BASED ON LOGIN USER/DIRECTORY
Setting up LDAP sign-in 
https://docs.gitlab.com/omnibus/settings/ldap.html


# CHANGE THE PORT / HTTP SETTINGS / HTTPS
NGINX settings (NGINX IS THE NEW APACHE)
https://docs.gitlab.com/omnibus/settings/nginx.html


WHAT DO THESE DO IN GITLAB: REDIS, POSTGRE, NGINX, UNICORN, LDAP, 

config - /var/www/gitlab/gitlab.rb

###! **We do not recommend changing these directories.**
# gitlab_rails['dir'] = "/var/opt/gitlab/gitlab-rails"
# gitlab_rails['log_directory'] = "/var/log/gitlab/gitlab-rails"

#### Enable or disable automatic database migrations
# gitlab_rails['auto_migrate'] = true

### GitLab application settings
# gitlab_rails['uploads_directory'] = "/var/opt/gitlab/gitlab-rails/uploads"
# gitlab_rails['rate_limit_requests_per_period'] = 10
# gitlab_rails['rate_limit_period'] = 60


###! **Do not change the following 3 settings unless you know what you are
###!   doing**
# gitlab_rails['registry_api_url'] = "http://localhost:5000"
# gitlab_rails['registry_key_path'] = "/var/opt/gitlab/gitlab-rails/certificate.key"
# gitlab_rails['registry_issuer'] = "omnibus-gitlab-issuer"


################################################################################
## GitLab User Settings
##! Modify default git user.
##! Docs: https://docs.gitlab.com/omnibus/settings/configuration.html#changing-the-name-of-the-git-user-group
################################################################################

# user['username'] = "git"
# user['group'] = "git"
# user['uid'] = nil
# user['gid'] = nil

##! The shell for the git user
# user['shell'] = "/bin/sh"

##! The home directory for the git user
# user['home'] = "/var/opt/gitlab"

# user['git_user_name'] = "GitLab"
# user['git_user_email'] = "gitlab@#{node['fqdn']}"



################################################################################
## GitLab Unicorn
##! Tweak unicorn settings.
##! Docs: https://docs.gitlab.com/omnibus/settings/unicorn.html
################################################################################

# unicorn['worker_timeout'] = 60
###! Minimum worker_processes is 2 at this moment
###! See https://gitlab.com/gitlab-org/gitlab-ce/issues/18771
# unicorn['worker_processes'] = 2

### Advanced settings
# unicorn['listen'] = '127.0.0.1'
# unicorn['port'] = 8080
# unicorn['socket'] = '/var/opt/gitlab/gitlab-rails/sockets/gitlab.socket'
# unicorn['pidfile'] = '/opt/gitlab/var/unicorn/unicorn.pid'
# unicorn['tcp_nopush'] = true
# unicorn['backlog_socket'] = 1024

###! **Make sure somaxconn is equal or higher then backlog_socket**
# unicorn['somaxconn'] = 1024

###! **We do not recommend changing this setting**
# unicorn['log_directory'] = "/var/log/gitlab/unicorn"

### **Only change these settings if you understand well what they mean**
###! Docs: https://about.gitlab.com/2015/06/05/how-gitlab-uses-unicorn-and-unicorn-worker-killer/
###!       https://github.com/kzk/unicorn-worker-killer
# unicorn['worker_memory_limit_min'] = "400 * 1 << 20"
# unicorn['worker_memory_limit_max'] = "650 * 1 << 20"


################################################################################
## GitLab Sidekiq
################################################################################

# sidekiq['log_directory'] = "/var/log/gitlab/sidekiq"
# sidekiq['shutdown_timeout'] = 4
# sidekiq['concurrency'] = 25

################################################################################
## gitlab-shell
################################################################################

# gitlab_shell['audit_usernames'] = false
# gitlab_shell['log_level'] = 'INFO'
# gitlab_shell['http_settings'] = { user: 'username', password: 'password', ca_file: '/etc/ssl/cert.pem', ca_path: '/etc/pki/tls/certs', self_signed_cert: false}
# gitlab_shell['log_directory'] = "/var/log/gitlab/gitlab-shell/"
# gitlab_shell['custom_hooks_dir'] = "/opt/gitlab/embedded/service/gitlab-shell/hooks"

# gitlab_shell['auth_file'] = "/var/opt/gitlab/.ssh/authorized_keys"

### Git trace log file.
###! If set, git commands receive GIT_TRACE* environment variables
###! Docs: https://git-scm.com/book/es/v2/Git-Internals-Environment-Variables#Debugging
###! An absolute path starting with / – the trace output will be appended to
###! that file. It needs to exist so we can check permissions and avoid
###! throwing warnings to the users.
# gitlab_shell['git_trace_log_file'] = "/var/log/gitlab/gitlab-shell/gitlab-shell-git-trace.log"

##! **We do not recommend changing this directory.**



POSTGRE--
# Backup/Archive settings
# default['gitlab']['postgresql']['archive_mode'] = "off"
# default['gitlab']['postgresql']['archive_command'] = nil
# default['gitlab']['postgresql']['archive_timeout'] = "60"




################################################################################
## GitLab Logging
##! Docs: https://docs.gitlab.com/omnibus/settings/logs.html
################################################################################

# logging['svlogd_size'] = 200 * 1024 * 1024 # rotate after 200 MB of log data
# logging['svlogd_num'] = 30 # keep 30 rotated log files
# logging['svlogd_timeout'] = 24 * 60 * 60 # rotate after 24 hours
# logging['svlogd_filter'] = "gzip" # compress logs with gzip
# logging['svlogd_udp'] = nil # transmit log messages via UDP
# logging['svlogd_prefix'] = nil # custom prefix for log messages
# logging['logrotate_frequency'] = "daily" # rotate logs daily
# logging['logrotate_size'] = nil # do not rotate by size by default
# logging['logrotate_rotate'] = 30 # keep 30 rotated logs
# logging['logrotate_compress'] = "compress" # see 'man logrotate'
# logging['logrotate_method'] = "copytruncate" # see 'man logrotate'
# logging['logrotate_postrotate'] = nil # no postrotate command by default
# logging['logrotate_dateformat'] = nil # use date extensions for rotated files rather than numbers e.g. a value of "-%Y-%m-%d" would give rotated files like production.log-2016-03-09.gz

################################################################################
## Logrotate
##! Docs: https://docs.gitlab.com/omnibus/settings/logs.html#logrotate
##! You can disable built in logrotate feature.
################################################################################
# logrotate['enable'] = true

################################################################################

