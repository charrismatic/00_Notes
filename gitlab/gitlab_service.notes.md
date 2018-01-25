gitlab-ctl. You can find it into the following paths :

/usr/bin/gitlab-ctl 
/opt/gitlab/bin/gitlab-ctl

for example
exec /usr/bin/gitlab-ctl start
exec /usr/bin/gitlab-ctl stop

or?
/opt/gitlab/embedded/bin/omnibus-ctl






//https://askubuntu.com/questions/575249/how-do-i-setup-services-to-start-when-gitlab-is-ready
How do I setup services to start when Gitlab is ready?

I have a few Upstart services that I would like to have started once Gitlab is started and ready to serve repositories.

There is a gitlab-runsvdir Upstart service (came with the gitlab package) that starts Gitlab on bootup, however using

start on started gitlab-runsvdir
did not prove to help, as Gitlab was still not ready when that service was started.

How can I setup Upstart services to start when Gitlab is ready to serve repositories?

Contents of /etc/init/gitlab-runsvdir.conf, as requested:
start on runlevel [2345]
stop on shutdown
respawn
post-stop script
   # To avoid stomping on runsv's owned by a different runsvdir
   # process, kill any runsv process that has been orphaned, and is
   # now owned by init (process 1).
   pkill -HUP -P 1 runsv$
end script
exec /opt/gitlab/embedded/bin/runsvdir-start
As far as I know, this came with the gitlab package.
