apt-get install gitlab-ce

cat endosec-mattharris-gitlab.pubcat /etc/gitlab/gitlab-secrets.jsoncd ../.gitlab/
cat /etc/gitlab/gitlab.rb
cat /etc/gitlab/gitlab-secrets.json

cd .gitlab/
cd gitlab/
cd gitlab/gitlab-rails/shared/
cd /var/opt/gitlab/
cd /var/opt/gitlab/nginx/
cd /var/www/gitlab/

chown -R $USER:$USER ./gitlab

cp 000-default2.conf gitlab-es-sub.conf
cp /etc/gitlab/gitlab.rb gitlab.rb.backup.original
cp gitlab.rb.backup.original gitlab.rb


find /var/opt/gitlab/ -name *production.rb*
find /var/opt/gitlab/ -name *unicorn*
find /var/opt/gitlab/ -name *.yml

git-add endosec-mattharris-gitlab

git config user.signingkey=esmharris@gitlab
git config user.signingkey=~/profiles/es_matt.harris/ssh/endosec-mattharris-gitlab.pub


gitlab-ctl
gitlab-ctlgitlab-ctl cat  gitlab-rails
gitlab-ctl -h
gitlab-ctl --help
gitlab-ctl log
gitlab-ctl reconfigure
gitlab-ctl restart
gitlab-ctl service-list
gitlab-ctl services-list
gitlab-ctl services-list show
gitlab-ctl stop
gitlab-ctl  stop

gitlabctl-stop

gitlab-ctl tail gitlab-rails
gitlab-ctl tail -n 200 gitlab-rails
gitlab-ctl tail ngnix/gitlab_error.log
gitlab-stop

ls -R | grep ":gitlab" | sed -e 's/:gitlab//' -e 's/[^-][^\/]*\//--/g' -e 's/^/ /' -e 's/-/|/'
ls -R | grep ":gitlab" | sed -e 's/:gitlab//' -e 's/[^-][^\/]*\//--/g' -e 's/^/ /' -e 's/-/|/'"

ls /etc/gitlab/
ls /etc/gitlab/gitlab-secrets.json
ls /etc/gitlab/gitlab-secrets.jsonll gitlab/gitlab-rails/shared/

ls /var/opt/gitlab/
ls /var/opt/gitlab/gitlab-ci/
ls /var/opt/gitlab/gitlab-ci/
ls /var/opt/gitlab/gitlab-ci/builds/
ls /var/opt/gitlab/gitlab-rails/
ls /var/opt/gitlab/gitlab-rails/etc/
ls /var/opt/gitlab/gitlab-rails/shared/
ls /var/opt/gitlab/gitlab-rails/shared/artifacts/
ls /var/opt/gitlab/gitlab-rails/shared/lfs-objects/
ls /var/opt/gitlab/gitlab-rails/uploads/
ls /var/opt/gitlab/gitlab-workhorse/
ls /var/opt/gitlab/.ssh/
ls /var/opt/gitlab/gitlab-rails/shared/artifacts/
ls -ald  /var/opt/gitlab/gitlab-rails/uploads

man gitlab-ctl
man gitlab-ctrl
man gitlab-monitor

nano /etc/gitlab/gitlab.rb
nano /etc/gitlab/gitlab.rbnano gitlab.rb
nano gitlab.rb
nano gitlab_rsa.pub
nano gitlab_rsa.pub/opt/gitlab/embedded/bin/omnibus-ctl
nano /var/opt/gitlab/.gitconfig
nano /var/opt/gitlab/gitlab-rails/etc/gitlab.yml
nano /var/opt/gitlab/gitlab-rails/etc/unicorn.rb

